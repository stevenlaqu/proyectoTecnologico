<?php
require_once realpath(__DIR__ . '/../app/ReglasNegocio/brgeneric.php');
header('Content-type: application/json');

$msg = file_get_contents("php://input");

$objjson = json_decode($msg, true);
echo $objjson["fecha"];exit;

$method = $objjson["method"];
$table = $objjson["table"];
$columns = isset($objjson["columns"])?$objjson["columns"]:false;
if($columns){
    $columns = explode(",",$columns);
}



$data = null;
$obr = new brGeneric();
if($objjson !== null){
    switch ($method){
        case "create":
            $data = $obr->insertar($table,$columns,$objjson);
            echo json_encode($data);
            break;
        case "update":
            $data = $obr->actualizar($table,$columns,$objjson);
            echo json_encode($data);
            break;
        case "delete":
            $data = $obr->eliminar($table,$columns,$objjson);
            echo json_encode($data);
            break;
        case "read":
            $data = $obr->leer($table);
            echo json_encode($data);
            break;
        case "read_id":
            $data = $obr->leerPorId($table,$columns,$objjson);
            echo json_encode($data);
            break;
    }        
}else{
    echo "";
}

