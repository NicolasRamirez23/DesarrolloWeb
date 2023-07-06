<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "formulario";

$conexion = new mysqli($server,$user,$pass,$db);


if($conexion->connect_errno){
    die("conexion fallida " . $conexion->connect_errno);
}else{
    /*Creacion de los 100 usuarios
    for($i = 1; $i<101; $i++){
        $sql = $conexion -> query(" insert into usuarios(usuario,nombre,clave)values('test$i','nombre$i','clave$i')");

    }*/
}


?>