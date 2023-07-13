<?php require("../config/db.inc");

$opcion = $_POST["opcion"];

if($opcion == "mostrar"){
  
  $sql="SELECT * from sis_usuario ORDER BY folio DESC LIMIT 10";
  $result=mysqli_query($conexion,$sql);

  $arreglo=[];


  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $arreglo[]=$row;
    }
  }
  $arrayDeArrays = json_encode($arreglo);
  print_r($arrayDeArrays);
}



if($opcion == "registrar"){
    $nombre = $_POST["name"];
    $usuario = $_POST["user"];
    $clave = $_POST["pass"];

    $fecha_actual = date("d-m-y");
    $hora_actual = date("h:i:s");

    $sql = $conexion -> query("insert into sis_usuario (fecha,hora,nombre,usuario,contrasena) 
    values('$fecha_actual','$hora_actual','$nombre','$usuario','$clave')");

    echo(1);

}

if($opcion=="eliminar"){
  $folio = $_POST["folio"];
  $sql = "DELETE FROM sis_usuario where folio = $folio";
  if($conexion->query($sql)===TRUE){
    echo(2);
  }else{
    echo(3);
  }
  $conexion->close();
}

if($opcion=="buscar"){
  $folio = $_POST["folio"];
  $sql = "SELECT nombre,usuario,contrasena from sis_usuario where folio=$folio";

  $result=mysqli_query($conexion,$sql);


  $row = $result ->fetch_assoc();

  $row = json_encode($row);
  
  print_r($row);
}

if($opcion=="editar"){
  $folio=$_POST['folio'];
  $nombre=$_POST['name'];
  $usuario=$_POST['user'];
  $clave = $_POST['pass'];

  $sql = $conexion -> query("UPDATE sis_usuario SET nombre = '$nombre', usuario = '$usuario', contrasena = '$clave' where folio = $folio");
  echo(1);
}