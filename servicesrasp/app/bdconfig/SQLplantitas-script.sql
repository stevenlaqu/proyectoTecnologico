-- noinspection SqlDialectInspectionForFile

-- noinspection SqlNoDataSourceInspectionForFile

CREATE DATABASE  IF NOT EXISTS `plantitas`;
USE `plantitas`;

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `apellido` varchar(200) DEFAULT NULL,  
  `dni` varchar(20) DEFAULT NULL,
  `fec_nac` datetime DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `fec_reg` datetime DEFAULT NULL,
  `flg_activo` char(1) DEFAULT NULL,  
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `usuario` VALUES (1,'robert','robert','123456','robert','downey jr','98765478','1994-10-29 00:00:00','Calle los Jazmines','2019-10-29 00:00:00','T');

CREATE TABLE `area` (
  `idarea` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `flg_exterior` char(1) DEFAULT NULL,
  `latitud` varchar(50) DEFAULT NULL,
  `longitud` varchar(50) DEFAULT NULL,
  `cant_terrenos` int(11) DEFAULT NULL,
  `dimension` varchar(50) DEFAULT NULL,
  `mapa_svg` varchar(200) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idarea`),
  KEY `area_usua_idx` (`id_usuario`),
  CONSTRAINT `area_usua` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`idusuario`) 
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `area` VALUES (1,'Casa','F','1.7','1.7',1,'1 - 1',NULL,1);

CREATE TABLE `terreno` (
  `idterreno` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `flg_exterior` char(1) DEFAULT NULL,
  `latitud` varchar(50) DEFAULT NULL,
  `longitud` varchar(50) DEFAULT NULL,
  `cant_plantas` int(11) DEFAULT NULL,
  `dimension` varchar(50) DEFAULT NULL,
  `profundidad` int(11) DEFAULT NULL,
  `tipo_suelo` varchar(200) DEFAULT NULL,
  `cant_sensores` int(11) DEFAULT NULL,
  `mapa_svg` varchar(200) DEFAULT NULL,
  `flg_drenaje` char(1) DEFAULT NULL,
  `id_area` int(11) DEFAULT NULL,
  `fec_ult_act` datetime DEFAULT NULL,
  `flg_activo` char(1) DEFAULT NULL,
  PRIMARY KEY (`idterreno`),
  KEY `terr_area_idx` (`id_area`),
  CONSTRAINT `terr_area` FOREIGN KEY (`id_area`) REFERENCES `area` (`idarea`) 
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `terreno` VALUES (1,'maseta1','F','1.7','1.7',1,'0.2 - 0.3',35,'sustrato',1,NULL,'F',1,'2019-10-29 00:00:00','T');

CREATE TABLE `fuenteagua` (
  `idfuenteagua` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `capacidadlitros` int(11) DEFAULT NULL,
  `flg_constante` char(1) DEFAULT NULL,
  `ult_fec_act` datetime DEFAULT NULL,
  `ult_fec_llenado` datetime DEFAULT NULL,
  `flg_activo` char(1) DEFAULT NULL,
  PRIMARY KEY (`idfuenteagua`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `fuenteagua` VALUES (1,'tanque1',20,'T','2019-10-29 00:00:00','2019-10-29 00:00:00','T');

CREATE TABLE `planta` (
  `idplanta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `clima` varchar(200) DEFAULT NULL,
  `tipo` varchar(200) DEFAULT NULL,
  `tamano` int(11) DEFAULT NULL,
  `origen` varchar(200) DEFAULT NULL,
  `fec_ini` datetime DEFAULT NULL,
  `fec_add` datetime DEFAULT NULL,
  `fec_fin` datetime DEFAULT NULL,
  `id_terreno` int(11) DEFAULT NULL,
  `flg_activo` char(1) DEFAULT NULL,
  PRIMARY KEY (`idplanta`),
  KEY `plan_terr_idx` (`id_terreno`),
  CONSTRAINT `plan_terr` FOREIGN KEY (`id_terreno`) REFERENCES `terreno` (`idterreno`) 
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `planta` VALUES (1,'helecho','costero - tropical','ornamental',45,'lunahuana','2019-05-22 00:00:00','2019-10-29 00:00:00',NULL,1,'T');
INSERT INTO `planta` VALUES (2,'helecho','costero - tropical','ornamental',45,'lunahuana','2019-05-22 00:00:00','2019-10-29 00:00:00',NULL,1,'T');
INSERT INTO `planta` VALUES (3,'helecho','costero - tropical','ornamental',45,'lunahuana','2019-05-22 00:00:00','2019-10-29 00:00:00',NULL,1,'T');
INSERT INTO `planta` VALUES (4,'helecho','costero - tropical','ornamental',45,'lunahuana','2019-05-22 00:00:00','2019-10-29 00:00:00',NULL,1,'T');
INSERT INTO `planta` VALUES (5,'helecho','costero - tropical','ornamental',45,'lunahuana','2019-05-22 00:00:00','2019-10-29 00:00:00',NULL,1,'T');
INSERT INTO `planta` VALUES (6,'helecho','costero - tropical','ornamental',45,'lunahuana','2019-05-22 00:00:00','2019-10-29 00:00:00',NULL,1,'T');

CREATE TABLE `sensorhumedad` (
  `idsensorhumedad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `media` double DEFAULT NULL,
  `max` double DEFAULT NULL,
  `min` double DEFAULT NULL,
  `codigo` varchar(200) DEFAULT NULL,
  `id_terreno` int(11) DEFAULT NULL,
  `intervalo_sensado_min` int(11) DEFAULT NULL,
  `ult_fec_act` datetime DEFAULT NULL,
  `ult_fec_sensado` datetime DEFAULT NULL,
  `flg_activo` char(1) DEFAULT NULL,
  PRIMARY KEY (`idsensorhumedad`),
  KEY `sh_ter_idx` (`id_terreno`),
  CONSTRAINT `sh_ter` FOREIGN KEY (`id_terreno`) REFERENCES `terreno` (`idterreno`) 
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `sensorhumedad` VALUES (1,'sensor humedad 1',120,225,10,'SHUM-001',1,20,'2019-10-29 00:00:00','2019-10-29 13:00:00','T');

CREATE TABLE `sensortemperatura` (
  `idsensortemperatura` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `media` double DEFAULT NULL,
  `max` double DEFAULT NULL,
  `min` double DEFAULT NULL,
  `codigo` varchar(200) DEFAULT NULL,
  `id_area` int(11) DEFAULT NULL,
  `intervalo_sensado_min` int(11) DEFAULT NULL,
  `ult_fec_act` datetime DEFAULT NULL,
  `ult_fec_sensado` datetime DEFAULT NULL,
  `flg_activo` char(1) DEFAULT NULL,
  PRIMARY KEY (`idsensortemperatura`),
  KEY `st_area_idx` (`id_area`),
  CONSTRAINT `st_area` FOREIGN KEY (`id_area`) REFERENCES `area` (`idarea`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `sensortemperatura` VALUES (1,'sensor temp 1',23,36,15,'STEMO-001',1,60,'2019-10-29 13:00:00','2019-10-29 13:50:50','T');

CREATE TABLE `bomba` (
  `idbomba` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `flg_exterior` char(1) DEFAULT NULL,
  `potencia_w` int(11) DEFAULT NULL,
  `modelo` varchar(200) DEFAULT NULL,
  `caudal_lps` double DEFAULT NULL,
  `id_fuente_agua` int(11) DEFAULT NULL,
  `id_fuente_energia` int(11) DEFAULT NULL,
  `cant_compuertas` int(11) DEFAULT NULL,
  `id_area` int(11) DEFAULT NULL,
  `fec_ult_act` datetime DEFAULT NULL,
  `fec_ult_trabajo` datetime DEFAULT NULL,
  `flg_activo` char(1) DEFAULT NULL,
  PRIMARY KEY (`idbomba`),
  KEY `bom_fagua_idx` (`id_fuente_agua`),
  KEY `bom_area_idx` (`id_area`),
  CONSTRAINT `bom_area` FOREIGN KEY (`id_area`) REFERENCES `area` (`idarea`) ,
  CONSTRAINT `bom_fagua` FOREIGN KEY (`id_fuente_agua`) REFERENCES `fuenteagua` (`idfuenteagua`) 
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `bomba` VALUES (1,'bomba1','F',20,'SDD-XDA',0.025,1,NULL,4,1,'2019-10-29 00:00:00','2019-10-29 00:00:00','T');

CREATE TABLE `compuerta` (
  `idcompuerta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `id_bomba` int(11) DEFAULT NULL,
  `id_terreno` int(11) DEFAULT NULL,
  `fec_ult_act` datetime DEFAULT NULL,
  `fec_ult_riego` datetime DEFAULT NULL,
  `caudal_lps` double DEFAULT NULL,
  `flg_activo` char(1) DEFAULT NULL,
  PRIMARY KEY (`idcompuerta`),
  KEY `c_bo_idx` (`id_bomba`),
  KEY `c_terr_idx` (`id_terreno`),
  CONSTRAINT `c_bo` FOREIGN KEY (`id_bomba`) REFERENCES `bomba` (`idbomba`) ,
  CONSTRAINT `c_terr` FOREIGN KEY (`id_terreno`) REFERENCES `terreno` (`idterreno`) 
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `compuerta` VALUES (1,'compuerta1',1,1,'2019-10-29 00:00:00','2019-10-29 00:00:00',0.01,'T');

CREATE TABLE `riegoprogramado` (
  `idriegoprogramado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `id_terreno` int(11) DEFAULT NULL,
  `fec_prog` datetime DEFAULT NULL,
  `fec_ult_act` datetime DEFAULT NULL,
  `id_compuerta` int(11) DEFAULT NULL,
  `fec_ini` datetime DEFAULT NULL,
  `fec_fin` datetime DEFAULT NULL,
  `tiempo_seg` int(11) DEFAULT NULL,
  `humedad_ideal` double DEFAULT NULL,
  `flg_repetitivo` char(1) DEFAULT NULL,
  `dia_semana` varchar(10) DEFAULT NULL,
  `fecha_hora_objetivo` datetime DEFAULT NULL,
  `flg_activo` char(1) DEFAULT NULL,
  PRIMARY KEY (`idriegoprogramado`),
  KEY `rp_terr_idx` (`id_terreno`),
  KEY `rp_comp_idx` (`id_compuerta`),
  CONSTRAINT `rp_comp` FOREIGN KEY (`id_compuerta`) REFERENCES `compuerta` (`idcompuerta`) ,
  CONSTRAINT `rp_terr` FOREIGN KEY (`id_terreno`) REFERENCES `terreno` (`idterreno`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `riegoprogramado` VALUES (1,'regar helecho',1,'2019-10-29 00:00:00','2019-10-29 00:00:00',1,'2019-10-29 00:00:00','2019-11-29 00:00:00',20,177.3,'T','1111111','2019-10-29 17:00:00','T');

CREATE TABLE `tr_sensorhumedad` (
  `idtr_sensorhumedad` int(11) NOT NULL AUTO_INCREMENT,
  `id_sensorhumedad` int(11) DEFAULT NULL,
  `lectura` double DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `ult_intervalo` datetime DEFAULT NULL,
  `flg_motivoriego` char(1) DEFAULT NULL,
  PRIMARY KEY (`idtr_sensorhumedad`),
  KEY `tr_sen_hum_idx` (`id_sensorhumedad`),
  CONSTRAINT `tr_sen_hum` FOREIGN KEY (`id_sensorhumedad`) REFERENCES `sensorhumedad` (`idsensorhumedad`) 
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `tr_sensortemperatura` (
  `idtr_sensortemperatura` int(11) NOT NULL AUTO_INCREMENT,
  `id_sensortemperatura` int(11) DEFAULT NULL,
  `lectura` double DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `ult_intervalo` datetime DEFAULT NULL,
  `flg_motivoriego` char(1) DEFAULT NULL,
  PRIMARY KEY (`idtr_sensortemperatura`),
  KEY `tr_sen_temp_idx` (`id_sensortemperatura`),
  CONSTRAINT `tr_sen_temp` FOREIGN KEY (`id_sensortemperatura`) REFERENCES `sensortemperatura` (`idsensortemperatura`) 
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `tr_riegoprogramado` (
  `idtr_riegoprogramado` int(11) NOT NULL AUTO_INCREMENT,
  `id_riegoprogramado` int(11) DEFAULT NULL,
  `fec_ini` datetime DEFAULT NULL,
  `duracion` int(11) DEFAULT NULL,
  `id_ini_tr_sh` int(11) DEFAULT NULL,
  `id_fin_tr_sh` int(11) DEFAULT NULL,
  `id_ini_tr_st` int(11) DEFAULT NULL,
  `id_fin_tr_st` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtr_riegoprogramado`),
  KEY `tr_riego_prog_idx` (`id_riegoprogramado`),
  KEY `trrp_trsh_ini_idx` (`id_ini_tr_sh`),
  KEY `trrp_trsh_fin_idx` (`id_fin_tr_sh`),
  KEY `trrp_trst_ini_idx` (`id_ini_tr_st`),
  KEY `trrp_trst_fin_idx` (`id_fin_tr_st`),
  CONSTRAINT `tr_riego_prog` FOREIGN KEY (`id_riegoprogramado`) REFERENCES `riegoprogramado` (`idriegoprogramado`) ,
  CONSTRAINT `trrp_trsh_fin` FOREIGN KEY (`id_fin_tr_sh`) REFERENCES `tr_sensorhumedad` (`idtr_sensorhumedad`) ,
  CONSTRAINT `trrp_trsh_ini` FOREIGN KEY (`id_ini_tr_sh`) REFERENCES `tr_sensorhumedad` (`idtr_sensorhumedad`) ,
  CONSTRAINT `trrp_trst_fin` FOREIGN KEY (`id_fin_tr_st`) REFERENCES `tr_sensortemperatura` (`idtr_sensortemperatura`) ,
  CONSTRAINT `trrp_trst_ini` FOREIGN KEY (`id_ini_tr_st`) REFERENCES `tr_sensortemperatura` (`idtr_sensortemperatura`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


