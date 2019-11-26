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
$body=false;
if($values !== null){
    if($method=="read"){
        $data = $obr->leerPorId($table,$columns,$body);
        $body = array("idusuario"=>$data["idusuario"],"fec_reg"=>$hoy);
        $sdsd = $obr->actualizar($table,$columns, $body);
    }
}
$jsonresult = json_encode($data);
echo $jsonresult;

/*
{
	"user": "robert",
    "pass": "123456"
}
 */


