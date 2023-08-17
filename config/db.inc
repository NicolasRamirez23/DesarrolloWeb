<?php
/*
$server = "132.148.79.103";
$user = "adminscbapps_ssat";
$pass = ")=%I.]CZkI*}";
$db = "adminscbapps_ssat";
*/
$server = "localhost";
$user = "root";
$pass = "nerp_uni@db2023";
$db = "pruebas";

$conexion = new mysqli($server,$user,$pass,$db);


if(!$conexion){
   
    die("conexion fallida " . $conexion->connect_errno); 
}

