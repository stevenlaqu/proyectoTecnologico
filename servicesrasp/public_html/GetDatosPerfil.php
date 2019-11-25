<?php

$arr = array('nombre'=> "Robert D.");

$values = json_encode($arr);

if($values !== false){
    echo $values;
}else{
    echo "false";
}


?>

