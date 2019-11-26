<?php
require_once realpath(__DIR__ . '/../app/ReglasNegocio/brgeneric.php');
$msg = file_get_contents("php://input");

$objjson = json_decode($msg, true);

$method = $objjson["method"];
$table = $objjson["table"];
$columns = $objjson["columns"];
$columns = explode(",",$columns);


$id = null;
$obr = new brGeneric();
if($objjson !== null){
    if($method=="create"){
        $id = $obr->insertar($table,$columns,$objjson);
        echo json_encode($id);
    }else if($method=="update"){
        $id = $obr->actualizar($table,$columns,$objjson);
        echo json_encode($id);
    }else if($method=="delete"){
        $id = $obr->eliminar($table,$columns,$objjson);
        echo json_encode($id);
    }else if($method=="read"){
        $data = $obr->leer($table);
        echo json_encode($data);
    }    
}else{
    echo "";
}


?>

