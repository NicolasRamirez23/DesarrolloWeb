<?php require("../config/db.inc");

if(isset($_POST['opcion'])){
    $opcion = $_POST['opcion'];

    if($opcion === 'buscar_developers'){
        
    $sql="SELECT sis_perfil.usuario as folio, sis_usuario.nombre as nombre
    from sis_perfil
    LEFT JOIN sis_usuario on sis_usuario.folio = sis_perfil.usuario
    where grupo=2";
   
    $result=mysqli_query($conexion,$sql);  
  
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $arreglo[]=$row;
      }
    }
    
    $arreglo = json_encode($arreglo);
    
    print_r($arreglo);
    }

    if($opcion === 'developers'){
      $dev = $_POST['dev'];
        
      $sql="SELECT sis_perfil.usuario as folio, sis_usuario.nombre as nombre
      from sis_perfil
      LEFT JOIN sis_usuario on sis_usuario.folio = sis_perfil.usuario
      where grupo=2
      order by sis_perfil.usuario=$dev desc";

      $result=mysqli_query($conexion,$sql);  
    
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $arreglo[]=$row;
        }
      }
      
      $arreglo = json_encode($arreglo);
      
      print_r($arreglo);
      }

    if($opcion === 'buscar_PM'){
        
        $sql="SELECT sis_perfil.usuario as folio, sis_usuario.nombre as nombre
        from sis_perfil
        LEFT JOIN sis_usuario on sis_usuario.folio = sis_perfil.usuario
        where grupo=13";
       
        $result=mysqli_query($conexion,$sql);  
      
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $arreglo[]=$row;
          }
        }
        
        $arreglo = json_encode($arreglo);
        
        print_r($arreglo);
        }

      if($opcion === 'crear_tarea'){
          $folio = $_POST['folio'];
          $dev = $_POST['dev'];
          $titulo = $_POST['titulo'];
          $desc = $_POST['desc'];
          $fecha = $_POST['fecha'];
      
          $sql= $conexion -> query("INSERT INTO sis_tarea (encargado,developer,titulo,
          descripcion,fecha_entrega)
          VALUES ('$folio','$dev','$titulo','$desc','$fecha')");
          
          echo(1);
        }
      
        if($opcion === 'mostrar_tareas'){
        
          $sql="SELECT sis_tarea.folio, sis_tarea.encargado, sis_usuario.folio as dev_folio, sis_usuario.nombre as developer, sis_tarea.titulo, 
          sis_tarea.descripcion, sis_tarea.fecha_entrega
          FROM sis_tarea 
          LEFT JOIN sis_usuario on sis_tarea.developer = sis_usuario.folio
          WHERE sis_tarea.activo = '1'
          LIMIT 10;";
         
          $result=mysqli_query($conexion,$sql);  
        
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $arreglo[]=$row;
            }
          }
          
          $arreglo = json_encode($arreglo);
          
          print_r($arreglo);
          }

          if($opcion === 'mostrar_tareas_dev'){
            $folio = $_POST["folio"];
        
            $sql="SELECT sis_tarea.folio, sis_usuario.nombre as encargado, sis_tarea.titulo, 
            sis_tarea.descripcion, sis_tarea.fecha_entrega
            FROM sis_tarea 
            LEFT JOIN sis_usuario on sis_tarea.encargado = sis_usuario.folio
            WHERE sis_tarea.activo = '1' and sis_tarea.developer= 103
            LIMIT 10;";
           
            $result=mysqli_query($conexion,$sql);  
          
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $arreglo[]=$row;
              }
            }
            
            $arreglo = json_encode($arreglo);
            
            print_r($arreglo);
            }

          if($opcion === 'editar_tarea'){
            $folio = $_POST['folio'];
            $sql="SELECT sis_tarea.folio, sis_tarea.encargado, sis_usuario.folio as dev_folio, sis_usuario.nombre as developer, sis_tarea.titulo, 
            sis_tarea.descripcion, sis_tarea.fecha_entrega
            FROM sis_tarea 
            LEFT JOIN sis_usuario on sis_tarea.developer = sis_usuario.folio
            WHERE sis_tarea.folio = $folio and sis_tarea.activo = '1'";
           
            $result=mysqli_query($conexion,$sql);  
          
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $arreglo[]=$row;
              }
            }
            
            $arreglo = json_encode($arreglo);
            
            print_r($arreglo);
            }

          if($opcion==="eliminar_tarea"){
            $folio = $_POST["folio"];
           
            $sql = "UPDATE sis_tarea
            set activo = 0 where sis_tarea.folio = $folio";
            if($conexion->query($sql)===TRUE){
              echo(2);
            }else{
              echo(3);
            }
            
            
            $conexion->close();
          }

          if($opcion==="actualizar_tarea"){
            $folio = $_POST["folio"];
            $dev = $_POST["dev"];
            $titulo = $_POST["titulo"];
            $desc = $_POST["desc"];
            $fecha = $_POST["fecha"];
           
            $sql = "UPDATE sis_tarea
            SET developer = '$dev', titulo = '$titulo',descripcion = '$desc', fecha_entrega = '$fecha'
            where folio = '$folio'";
            if($conexion->query($sql)===TRUE){
              echo(1);
            }else{
              echo(2);
            }
            
            
            $conexion->close();
          }

          if($opcion === 'buscar_tarea'){
            $folio = $_POST['folio'];

            $sql="SELECT sis_usuario.nombre as encargado, sis_tarea.titulo, sis_tarea.descripcion, sis_tarea.fecha_entrega
                  from sis_tarea
                  LEFT JOIN sis_usuario on sis_tarea.encargado = sis_usuario.folio";
           
            $result=mysqli_query($conexion,$sql);  
          
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $arreglo[]=$row;
              }
            }
            
            $arreglo = json_encode($arreglo);
            
            print_r($arreglo);
            }
}