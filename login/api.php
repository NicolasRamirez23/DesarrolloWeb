<?php

$user = $_POST["user"];
$clave = $_POST["pass"];

$usuarios = parse_ini_file('config.inc');

$flag = false;


foreach ($usuarios as $usuario => $contrasena) {
    if($user == $usuario && $clave == $contrasena){
        $flag=true;
    }
}

if($flag==true){
    echo "Exito";
}else{
    echo "Error";
}




?>  