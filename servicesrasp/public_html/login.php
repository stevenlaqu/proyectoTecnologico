<?php
require_once realpath(__DIR__ . '/../app/ReglasNegocio/brgeneric.php');
$msg = file_get_contents("php://input");

$values = json_decode($msg, true);

$method = "read";
$table = "usuario";

$id = null;
$obr = new brGeneric();
$data="";
if($values !== null){
    if($method=="read"){
        $data = $obr->leer($table);
        echo json_encode($data);
    }
}
$username = $data[0]["username"];
$password = $data[0]["password"];





if($values !== null){
    if($values["user"] == $username && $values["pass"]==$password) {
        $arr = array('login'=> "OK");
        $values = json_encode($arr);
        echo $values;
    }else{
        $arr = array('login'=> "FAILED");
        $values = json_encode($arr);
        echo $values;
    }
}else{
    $arr = array('login'=> "REQUEST FAILED");
    echo $arr;
}

?>

