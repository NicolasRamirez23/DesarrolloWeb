<?php 
    require("../config/config.inc");
    if(!isset($_SESSION['usuario'])){
        header ("location: ../login/index.php");
    }else{
        $usuario = $_SESSION['usuario'];
    }
?>

<!DOCTYPE html>
<html>
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Menu Principal </title>
</head>
<body style="background-color: #fd7e14;">

<div class="container">
  <div class="row">
    <div class="col">
    </div>
    <div class="col">
       <h1 class="text-center">¡Hola, bienvenido <?php echo $usuario ?>! </h1>
       <div class="text-center">
            <button id="usuarios" type="boton" name="btnusuario" class="btn btn-primary">Ver Usuarios</button>
                
                <br>
                <br>

                <button id="grupos" type="boton" name="btn_grupo" class="btn btn-primary"> Ver Grupo</button>
                <br>
                <br>

                <button id="perfiles" type="boton" name="perfiles" class="btn btn-primary"> Ver Perfiles</button>
                <br>
                <br>
                
                <button id="btncs" type="boton" name="botoncs" class="btn btn-danger">Cerrar Sesion</button>
                </div>
       </div>
    <div class="col">
    </div>
  </div>
</div>
    
</body>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src ="script.js"></script>
</html>