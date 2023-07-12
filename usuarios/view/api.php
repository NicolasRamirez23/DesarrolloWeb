<?php
include("../../config/db.inc");

$opcion = $_POST["opcion"];

if($opcion == 1){
    $nombre = $_POST["name"];
    $usuario = $_POST["user"];
    $clave = $_POST["pass"];

    $fecha_actual = date("d-m-y");
    $hora_actual = date("h:i:s");

    $sql = $conexion -> query("insert into sis_usuario (fecha,hora,nombre,usuario,contrasena) 
    values('$fecha_actual','$hora_actual','$nombre','$usuario','$clave')");

    echo(1);

}

if($opcion==2){
  $folio = $_POST["folio"];
  $sql = "DELETE FROM sis_usuario where folio = $folio";
  if($conexion->query($sql)===TRUE){
    echo(2);
  }else{
    echo(3);
  }
  $conexion->close();
}

if($opcion==3){
  $folio = $_POST["folio"];
  $sql = "SELECT nombre,usuario,contrasena from sis_usuario where folio=$folio";

  $result=mysqli_query($conexion,$sql);


  $row = $result ->fetch_assoc();

  $row = json_encode($row);
  
  print_r($row);
}

if($opcion==4){
  $folio=$_POST['folio'];
  $nombre=$_POST['name'];
  $usuario=$_POST['user'];
  $clave = $_POST['pass'];

  $sql = $conexion -> query("UPDATE sis_usuario SET nombre = '$nombre', usuario = '$usuario', contrasena = '$clave' where folio = $folio");
  echo(1);
}