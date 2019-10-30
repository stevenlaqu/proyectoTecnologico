<?php
require_once realpath(__DIR__ . '/../app/ReglasNegocio/brRegistroHumedad.php');
$msg = file_get_contents("php://input");

$values = json_decode($msg, true);
$id = null;
if($values !== null){
    $obrRegistroHumedad = new brRegistroHumedad();
    $id = $obrRegistroHumedad->InsertarLectura($values);
    echo json_encode($id);
}else{
    echo "Aviso: debe enviar un objeto JSON válido -> RegisroHumedadSensor";
}


?>

