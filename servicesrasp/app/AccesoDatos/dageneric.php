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
        $resultado = $objmysqli->query($aux);        
        return $resultado;
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
        $data = false;
        if($resultado!==false){
            $data = $resultado->fetch_array(MYSQLI_ASSOC);;
        }        
        return $data;
    }
    
    public function leerC1($table,$columns,$objjson) {
        $aux = "select * from ".$table." ";
        foreach($columns as &$valor) {
            $aux .= $valor . ",";
        }       
        unset($valor);
        $aux = substr($aux,0,-1);
        
        $aux.= " where ".$columns[0]."=".$objjson[$columns[0]];              
        
        $resultado = "";
        return $resultado;
    }
}
