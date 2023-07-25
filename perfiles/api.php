<?php require("../config/db.inc");


if(isset($_POST['opcion'])){
  $opcion = $_POST['opcion'];

  if($opcion==="mostrarPerfiles"){

    $sqlPerfiles="SELECT sis_perfil.folio, sis_perfil.fecha, sis_perfil.hora, sis_usuario.nombre, cat_grupo.descripcion, sis_perfil.activo
    from sis_perfil  
    LEFT JOIN sis_usuario ON sis_perfil.usuario = sis_usuario.folio 
    LEFT JOIN cat_grupo ON sis_perfil.grupo = cat_grupo.codigo
    ORDER BY sis_perfil.folio DESC LIMIT 10";
   

    $result=mysqli_query($conexion,$sqlPerfiles);
  
    $arreglo=[];
  
  
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $arreglo[]=$row;
      }
    }
    
    $arregloLleno = json_encode($arreglo);
    
    print_r($arregloLleno);
    }
  
    if($opcion==="obtener_nombre"){
      $sql="SELECT nombre,folio from sis_usuario ORDER BY folio";
      $result=mysqli_query($conexion,$sql);
    
      $arreglo=[];
    
    
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $arreglo[]=$row;
        }
      }
      
      $arregloLleno = json_encode($arreglo);
      
      echo($arregloLleno);
      }

      if($opcion==="obtener_descripcion"){
        $sql="SELECT descripcion, codigo from cat_grupo ORDER BY codigo";
        $result=mysqli_query($conexion,$sql);
      
        $arreglo=[];
      
      
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $arreglo[]=$row;
          }
        }
        
        $arregloLleno = json_encode($arreglo);
        
        echo($arregloLleno);
        }


  if($opcion === "crear_perfil"){
    $grupos = $_POST["descripciones"];
    $folio = $_POST["folio"];

    $fecha_actual = date("d-m-y");
    $hora_actual = date("h:i:s");

    foreach ($grupos as $grupo) {
      $sql = $conexion->query("INSERT INTO sis_perfil (fecha, hora, usuario, grupo, activo) 
        VALUES ('$fecha_actual', '$hora_actual', '$folio', '$grupo', '1')");
  }
  if($sql){
    echo (1);
  }else{
    echo(0);
  }


}

if($opcion==="eliminarPerfil"){
  $folio = $_POST["folio"];
  $sql = "UPDATE  sis_perfil SET activo = 0 WHERE folio=$folio";
  if($conexion->query($sql)===TRUE){
    echo(2);
  }else{
    echo(3);
  }
  $conexion->close();
}

if($opcion==="buscarPerfil"){
  $folio = $_POST["folio"];
  $sql = "SELECT fecha,hora,usuario,grupo from sis_perfil where folio=$folio";

  $result=mysqli_query($conexion,$sql);


  $row = $result ->fetch_assoc();

  $row = json_encode($row);
  
  print_r($row);
}

if($opcion==="editarPerfil"){
  $folio=$_POST['folio'];
  $descripcion=$_POST['descripcion'];
  $usuario=$_POST['user'];
  $sql = $conexion -> query("UPDATE sis_perfil SET usuario = '$usuario', grupo = '$descripcion' where folio = $folio");
  echo(1);
}

}