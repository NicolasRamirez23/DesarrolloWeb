<?php
include("../config/config.inc");
include('../config/db.inc');

$user = $_POST["user"];
$clave = $_POST["pass"];

$consulta = "SELECT*FROM sis_usuario where usuario = '$user' and contrasena = '$clave'";

$resultado = mysqli_query($conexion,$consulta);

$filas = mysqli_num_rows($resultado);

if($filas){
    $_SESSION['usuario']=$user;
    echo  "1";
}else{
    echo "0";
}

mysqli_free_result($resultado);
mysqli_close($conexion);





?>  