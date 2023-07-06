<?php
include('../config/config.inc');
include('../config/db.inc');

$user = $_POST["user"];
$clave = $_POST["pass"];

$consulta = "SELECT*FROM usuarios where usuario = '$user' and clave = '$clave'";

$resultado = mysqli_query($conexion,$consulta);

$filas = mysqli_num_rows($resultado);

if($filas){
    $_SESSION['usuario']=$user;
    echo  true;
}

mysqli_free_result($resultado);
mysqli_close($conexion);





?>  