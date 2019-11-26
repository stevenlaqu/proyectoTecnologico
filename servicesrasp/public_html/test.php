<?php
$msg = file_get_contents("php://input");
echo $msg;
error_log( $msg);