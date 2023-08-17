<?php
include("../config/config.inc");
include('../config/db.inc');

$user = $_POST["user"];
$clave = $_POST["pass"];

$consulta = "SELECT folio,nombre FROM sis_usuario where usuario = '$user' and contrasena = '$clave'";

$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    $fila = mysqli_fetch_assoc($resultado);
    
    if ($fila) {
        $_SESSION['usuario'] = $user;
        $_SESSION['folio'] = $fila['folio']; 
        $_SESSION['nombre'] = $fila['nombre'];
        echo 1;
    } else {
        echo 0; 
    }
} else {
    echo 0; 
}
?>

