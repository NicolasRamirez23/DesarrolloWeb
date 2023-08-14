<?php

/*$server = "132.148.79.103";
$user = "adminscbapps_ssat";
$pass = ")=%I.]CZkI*}";
$db = "adminscbapps_ssat";*/

$server = "localhost";
$user = "root";
$pass = "nerp_uni@db2023";
$db = "pruebas";

$conexion = new mysqli($server,$user,$pass,$db);


if(!$conexion){
   
    die("conexion fallida " . $conexion->connect_errno);
}else{
    
    /*
    $fecha_actual = date("d-m-y");
    $hora_actual = date("h:i:s");
    //Creacion de los 100 usuarios

    for($i = 1; $i<101; $i++){
        $sql = $conexion -> query("insert into sis_usuario (fecha,hora,nombre,usuario,contrasena)
        values('$fecha_actual','$hora_actual','nombre$i','usuario$i','clave$i')");

*/
    
}

