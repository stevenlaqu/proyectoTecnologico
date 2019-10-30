<?php

class daRegistroHumedad {
    public function InsertarLectura($con, $params) {
        $values  = $params["id_sensorhumedad"]." , ";
        $values .= $params["lectura"]." , ";
        $values .= "'".$params["fecha"]."' , ";
        $values .= "'".$params["ult_intervalo"]."' , ";
        $values .= "'".$params["flg_motivoriego"]."' ";

        $id = false;
        $consulta = "insert into tr_sensorhumedad (id_sensorhumedad, lectura, fecha, ult_intervalo, flg_motivoriego) ";
        $consulta .= "values (".$values." )";
        //print_r($params).PHP_EOL;
        //echo $values.PHP_EOL;
        //echo $consulta;exit;
        $resultado = $con->query($consulta);
        if ($resultado) {
            $id = $con->insert_id;
        }
        return $id;
    }
}
