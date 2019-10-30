<?php

require_once realpath(__DIR__ . '/../bdconfig/Config.php');
require_once realpath(__DIR__ . '/../AccesoDatos/daRegistroHumedad.php');

class brRegistroHumedad {

    public function InsertarLectura($params) {
        $id = false;
        try {
            $con = new mysqli(CONNECTION_HOST, CONNECTION_USER, CONNECTION_PASSWORD, CONNECTION_BD);
            $odaRegistroHumedad = new daRegistroHumedad();
            $id = $odaRegistroHumedad->InsertarLectura($con,$params);
            $con->close();
        } catch (Exception $error) {
            return $error;
        }
        return $id;
    }

}
