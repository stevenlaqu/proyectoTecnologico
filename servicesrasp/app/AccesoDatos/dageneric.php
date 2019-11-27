<?php

class daRegistroHumedad {
    public function insertar($objMysqli, $table,$columns,$objjson) {
        $aux = "insert into ".$table." ";
        $aux .= "(";
        foreach($columns as &$valor) {
            $aux .= $valor . ",";
        }        
        unset($valor);
        $aux = substr($aux,0,-1);
        $aux .= ") values (";
        foreach($columns as $valor) {
            if(is_string($objjson[$valor])){
                $aux .= "'".$objjson[$valor]. "',";
            } else {
                $aux .= $objjson[$valor]. ",";
            }
        } 
        unset($valor);
        $aux = substr($aux,0,-1);
        $aux .= ")";        
        $id = false;
        $resultado = $objMysqli->query($aux);
        if ($resultado)
        {
            $id = $objMysqli->insert_id;
        }
        return $id;
    }
    
    
    
    public function actualizar($objmysqli,$table,$columns,$objjson) {
        $aux = "update ".$table." set ";
        $cant = count($columns);
        for($i=1;$i<$cant;$i++) {
            $valor = $columns[$i];
            $aux .= $valor . "=";
            if(is_string($objjson[$valor])){
                $aux .= "'".$objjson[$valor]. "',";
            } else {
                $aux .= $objjson[$valor]. ",";
            }
        }        
        unset($valor);
        $aux = substr($aux,0,-1);
        $aux.= " where ".$columns[0]."=".$objjson[$columns[0]];
        echo $aux;
        $resultado = $objmysqli->query($aux);
        $rows_afected = $objmysqli->affected_rows;
        return $rows_afected;
    }
    
    
    
    public function eliminar($objmysqli,$table,$columns,$objjson) {
        $aux = "delete from ".$table." ";        
        $aux.= " where ".$columns[0]."=".$objjson[$columns[0]];
        $resultado = $objmysqli->query($aux);        
        return $resultado;
    }
    
    public function leer($objmysqli,$table) {
        $aux = "select * from ".$table;
        $resultado = $objmysqli->query($aux);    
        $data = array();
        if($resultado!==false){
            while ($fila = $resultado->fetch_assoc()) {
                $data[] = $fila;
            }
        }        
        return $data;
    }
    
    public function leerPorId($objmysqli,$table,$columns,$body) {
        $aux = "select * from ".$table." ";
        $aux.= " where ".$columns[0]."=".$body[$columns[0]];
        $resultado = $objmysqli->query($aux);
        $data = false;
        if($resultado!==false){
            $data = $resultado->fetch_assoc();
        }
        return $data;
    }
    public function leerUltimos4($objmysqli,$table,$columns,$body) {
        $aux = "select * from ".$table." ";
        $aux.= " where ".$columns[0]."=".$body[$columns[0]];
        $resultado = $objmysqli->query($aux);
        $data = false;
        if($resultado!==false){
            $data = $resultado->fetch_assoc();
        }
        return $data;
    }
}
