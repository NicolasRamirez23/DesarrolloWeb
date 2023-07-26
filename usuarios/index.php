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
        <link rel= "stylesheet" href="style.css">
    |    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
    <title>Usuarios</title>
    </head>
    <body  style="background-color: #fd7e14;">

    <div class="container">
  <div class="row">
    <div class="col">
    </div>
    <div class="col">
       
       <div class="text-center">
            <h1>Tabla de usuarios</h1>

            <br>

            <div class="contenedor">
                <table class="table table-bordered border-primary" 
                style="background-color: #A0FCFF;" id="data"></table>
            </div>

            <br><br><br><br><br><br><br><br><br><br><br><br><br><br>

            <button id="registro" type="boton" class="btn btn-primary" name="registro">Registrar</button>
            <br>
            <br>


            <button id="regresar" class="btn btn-danger" type="boton">Regresar</button>

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