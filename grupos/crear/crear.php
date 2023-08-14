<?php 
    require("../../config/config.inc");
    if(!isset($_SESSION['usuario'])){
        header ("location: ../../../login/index.php");
    }else{
        $usuario = $_SESSION['usuario'];
    }
?>
<!DOCTYPE html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Crear Grupo</title>
</head>
<body style="background-color: #fd7e14;">

<div class="container">
  <div class="row">
    <div class="col">
    </div>
    <div class="col">
        <div class="text-center">
        <h1>Creacion de Grupo</h1>

        <div class="formulario">
            <label for="descripcion">Descripcion</label>
            <br>
            <input type="text" name="descripcion" id="descripcion" placeholder="Ej. Usuario" required></input>

            <br><br>
            <button id="btncrear" class="btn btn-primary" type="boton" name="botoncrear">Crear</button>
            <br><br>
            <button id="regresar" class="btn btn-danger" type="boton" name="regresar">regresar</button>
        </div>
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