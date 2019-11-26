<?php
require_once realpath(__DIR__ . '/../app/ReglasNegocio/brgeneric.php');
$msg = file_get_contents("php://input");

$values = json_decode($msg, true);

$method = "read";
$table = "usuario";
$columns = array("idusuario","fec_reg");
$hoy = date("Y-m-d H:i:s");

$id = null;
$obr = new brGeneric();
$data="";
if($values !== null){
    if($method=="read"){
        $data = $obr->leer($table);
        $objjson = array("idusuario"=>$data["idusuario"],"fec_reg"=>$hoy);
        $sdsd = $obr->actualizar($table,$columns, $objjson);
    }
}
$username = $data["username"];
$password = $data["password"];


//



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

