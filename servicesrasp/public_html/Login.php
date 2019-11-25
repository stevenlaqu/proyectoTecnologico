<?php
$msg = file_get_contents("php://input");

$values = json_decode($msg, true);
if($values !== null){
    if($values["user"] == "robert" && $values["pass"]=="123456") {
        $arr = array('login'=> "OK");
        $values = json_encode($arr);
        echo $values;
    }else{
        $arr = array('login'=> "FAILED");
        $values = json_encode($arr);
        echo $values;
    }
}else{
    $arr = array('login'=> "$msg");
    echo $arr;
}

?>

