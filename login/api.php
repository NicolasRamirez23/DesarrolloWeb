<?php

include('config.inc');
include('../config/config.inc');

$user = $_POST["user"];
$clave = $_POST["pass"];

$flag = false;

foreach ($usuarios as $usuario => $contrasena) {
    if($user == $usuario && $clave == $contrasena){
        $flag=true;
        break;
    }
}

if($flag==true){
    echo $flag;
    array_push($_SESSION[$user]);
    unset($_SESSION);

  
    
}else{
    echo "Error";
}


?>  