<?php

require_once realpath(__DIR__ .'/../bdconfig/Config.php');
require_once realpath(__DIR__ . '/../AccesoDatos/dageneric.php');

class brGeneric {

    public function insertar($table,$columns,$objjson) {
        $id = false;
        $oda = new daRegistroHumedad();
        
        try {            
            $objMysqli = new mysqli(CONNECTION_HOST, CONNECTION_USER, CONNECTION_PASSWORD, CONNECTION_BD);
            $id = $oda->insertar($objMysqli,$table,$columns,$objjson);
            $objMysqli->close();
        } catch (Exception $error) {
            return $error;
        }
        return $id;
    }
    public function actualizar($table,$columns,$objjson) {
        $id = false;
        $oda = new daRegistroHumedad();
        
        try {            
            $objMysqli = new mysqli(CONNECTION_HOST, CONNECTION_USER, CONNECTION_PASSWORD, CONNECTION_BD);
            $id = $oda->actualizar($objMysqli,$table,$columns,$objjson);
            $objMysqli->close();
        } catch (Exception $error) {
            return $error;
        }
        return $id;
    }

    public function eliminar($table,$columns,$objjson) {
        $id = false;
        $oda = new daRegistroHumedad();
        
        try {            
            $objMysqli = new mysqli(CONNECTION_HOST, CONNECTION_USER, CONNECTION_PASSWORD, CONNECTION_BD);
            $id = $oda->eliminar($objMysqli,$table,$columns,$objjson);
            $objMysqli->close();
        } catch (Exception $error) {
            return $error;
        }
        return $id;
    }
    
    public function leer($table) {
        $oda = new daRegistroHumedad();
        
        try {            
            $objMysqli = new mysqli(CONNECTION_HOST, CONNECTION_USER, CONNECTION_PASSWORD, CONNECTION_BD);
            $data = $oda->leer($objMysqli,$table);
            $objMysqli->close();
        } catch (Exception $error) {
            return $error;
        }
        return $data;
    }
    public function leerPorId($table,$columns,$body) {
        $oda = new daRegistroHumedad();

        try {
            $objMysqli = new mysqli(CONNECTION_HOST, CONNECTION_USER, CONNECTION_PASSWORD, CONNECTION_BD);
            $data = $oda->leerPorId($objMysqli,$table,$columns,$body);
            $objMysqli->close();
        } catch (Exception $error) {
            return $error;
        }
        return $data;
    }





}
