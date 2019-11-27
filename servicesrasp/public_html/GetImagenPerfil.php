<?php

$directory = realpath(__DIR__ . '/../app/Recursos/ImagenesUsuario/Portadas');
$img = file_get_contents($directory.'/userprof1.jpg');
$imgdata = base64_encode($img);
$arr = array('img'=> $imgdata);


$values = json_encode($arr);

if($values !== false){
    echo $values;
}else{
    echo "";
}

