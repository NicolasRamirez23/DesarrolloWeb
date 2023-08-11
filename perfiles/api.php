<?php require("../config/db.inc");


if(isset($_POST['opcion'])){
  $opcion = $_POST['opcion'];

  if($opcion==="mostrarPerfiles"){

    $sqlPerfiles="SELECT
    u.folio,
    u.nombre,
    COUNT(DISTINCT p.grupo) AS total_perfiles
FROM
    sis_usuario u
LEFT JOIN
    sis_perfil p ON u.folio = p.usuario
WHERE
    u.activo = 1 and p.activo = 1
GROUP BY
    u.folio, u.nombre
ORDER BY
    u.folio
LIMIT 10;";
   

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
      $sql="SELECT sis_usuario.nombre,sis_usuario.folio, count(sis_perfil.folio) as total_perfiles
      from sis_usuario
      left join sis_perfil on sis_usuario.folio = sis_perfil.usuario
      group by (sis_usuario.folio)
      having (total_perfiles)<1";
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
        $sql="SELECT cat_grupo.codigo, cat_grupo.descripcion
              from cat_grupo
              where activo = 1";

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
    $codigos = $_POST["codigos"];
    $folio = $_POST["folio"];

    $fecha_actual = date("d-m-y");
    $hora_actual = date("h:i:s");


    for($i = 0; $i < count($codigos); $i++){
      $codigo_actual = $codigos[$i];
      $sql = $conexion -> query("INSERT INTO sis_perfil (fecha,hora,usuario,grupo,activo) 
      VALUES ('$fecha_actual','$hora_actual','$folio','$codigo_actual','1')");

    }
    
    echo(1);

}

if($opcion==="eliminarPerfil"){
  $folio = $_POST["folio"];
 
  $sql = "UPDATE sis_perfil SET activo = 0 WHERE folio=$folio";
  if($conexion->query($sql)===TRUE){
    echo(2);
  }else{
    echo(3);
  }
  
  
  $conexion->close();
}

if($opcion==="eliminar_perfil"){
  $folio = $_POST["folio"];
 
  $sql = "UPDATE sis_perfil
  set activo = 0 where sis_perfil.usuario = $folio";
  if($conexion->query($sql)===TRUE){
    echo(2);
  }else{
    echo(3);
  }
  
  
  $conexion->close();
}

if($opcion==="numPerfiles"){
  $folio = $_POST["folio"];
 
  $sql = "SELECT count(sis_perfil.usuario) as total_perfiles
  from sis_perfil
  where usuario = $folio";
  if($conexion->query($sql)===TRUE){
    echo(2);
  }else{
    echo(3);
  }
  
  
  $conexion->close();
}

if($opcion==="buscarUsuario"){
  $folio = $_POST["folio"];
  $sql = "SELECT 
  sis_usuario.folio as folio_u,
  sis_usuario.nombre as nombre_u,
  sis_usuario.fecha as fecha_u, 
  sis_usuario.hora as hora_u, 
  MAX(sis_perfil.folio) as folio_p, 
  MAX(sis_perfil.fecha) as fecha_p,
  MAX(sis_perfil.hora) as hora_p,
  cat_grupo.codigo as codigo_g,
  MAX(cat_grupo.descripcion) as descripcion_g
FROM sis_usuario
LEFT JOIN sis_perfil ON sis_usuario.folio = sis_perfil.usuario AND sis_perfil.activo = 1
LEFT JOIN cat_grupo ON sis_perfil.grupo = cat_grupo.codigo AND cat_grupo.activo = 1
WHERE sis_usuario.folio = $folio AND sis_usuario.activo = 1 AND cat_grupo.codigo IS NOT NULL
GROUP BY sis_perfil.usuario, cat_grupo.codigo
ORDER BY folio_p
";

  $result=mysqli_query($conexion,$sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $arreglo[]=$row;
    }
  }
  
  $arregloLleno = json_encode($arreglo);
  
  echo($arregloLleno);
  }


if($opcion==="actualizar_perfil"){
  $folios_p=$_POST['folios_p'];
  $codigos_p=$_POST['codigos_p'];
  $codigos=$_POST['codigos'];
  $user=$_POST['user'];
  $fecha_actual = date("d-m-y");
  $hora_actual = date("h:i:s");

  for($i=0;$i<count($folios_p);$i++){
    $sql = $conexion -> query("UPDATE sis_perfil SET grupo = '$codigos_p[$i]' where folio = $folios_p[$i]");
  }

  for($i=0;$i<count($codigos);$i++){
    $sql = $conexion -> query("INSERT INTO sis_perfil (fecha, hora, usuario, grupo, activo)
                              VALUES ('$fecha_actual', '$hora_actual', '$user','$codigos[$i]', '1')");
  }

  echo(1);
}

if($opcion==="buscar_foliop"){
$folio = $_POST["folio"];
$sql = "SELECT 
        MAX(sis_perfil.folio) as folio_p, 
        cat_grupo.codigo as codigo_g,
        MAX(cat_grupo.descripcion) as descripcion_g
        FROM sis_usuario
        LEFT JOIN sis_perfil ON sis_usuario.folio = sis_perfil.usuario AND sis_perfil.activo = 1
        LEFT JOIN cat_grupo ON sis_perfil.grupo = cat_grupo.codigo AND cat_grupo.activo = 1
        WHERE sis_usuario.folio = $folio AND sis_usuario.activo = 1 AND cat_grupo.codigo IS NOT NULL
        GROUP BY sis_perfil.usuario, cat_grupo.codigo
        ORDER BY folio_p";

  $result=mysqli_query($conexion,$sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $arreglo[]=$row;
    }
  }
  
  $arregloLleno = json_encode($arreglo);
  
  echo($arregloLleno);
  }

if($opcion==="obtener_nombre_editar"){
  $folio = $_POST["folio"];
  $sql="SELECT sis_usuario.nombre
  from sis_usuario
  where sis_usuario.folio = $folio";
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

  if($opcion==="buscar_grupos"){
    $sql="SELECT cat_grupo.codigo,cat_grupo.descripcion
    from cat_grupo";

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

    if($opcion==="buscarDescripcion"){
      $codigo = $_POST["codigo"];
      $sql="SELECT codigo,descripcion
            from cat_grupo
            where activo = 1 and codigo != $codigo";

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
}