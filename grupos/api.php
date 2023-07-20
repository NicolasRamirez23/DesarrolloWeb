<?php
include("../config/db.inc");

if(isset($_POST['opcion'])){
    $opcion = $_POST['opcion'];
    if($opcion==="mostrar"){
        $sql="SELECT * from cat_grupo ORDER BY codigo DESC LIMIT 10";
        $result=mysqli_query($conexion,$sql);
    
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

        if($opcion === "crear"){
            $descripcion = $_POST["descripcion"];
          
            $fecha_actual = date("d-m-y");
            $hora_actual = date("h:i:s");
        
            $sql = $conexion -> query("INSERT INTO  cat_grupo (fecha,hora,descripcion) 
            values('$fecha_actual','$hora_actual','$descripcion')");
        
            echo(1);
        
        }
        
        if($opcion==="eliminar_grupo"){
          $folio = $_POST["folio"];
          $sql = "UPDATE cat_grupo SET activo = 0 where codigo = $folio";
          if($conexion->query($sql)===TRUE){
            echo(2);
          }else{
            echo(3);
          }
          $conexion->close();
        }
        
        if($opcion==="buscar"){
          $codigo = $_POST["codigo"];
          $sql = "SELECT fecha,hora,descripcion from cat_grupo where codigo=$codigo";
        
          $result=mysqli_query($conexion,$sql);
        
        
          $row = $result ->fetch_assoc();
        
          $row = json_encode($row);
          
          print_r($row);
        }
        
        if($opcion==="editar"){
          $folio=$_POST['folio'];
          $descripcion=$_POST['descripcion'];
        
          $sql = $conexion -> query("UPDATE cat_grupo SET descripcion = '$descripcion' where codigo = $folio");
          echo(1);
        }
}







?>