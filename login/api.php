<?php
include('../config/config.inc');
include('config.inc');

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
    $_SESSION['user'] = $user;
    exit();
     
}else{
    echo "Error";
}


?>  