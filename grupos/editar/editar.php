<?php 
    require("../../../config/config.inc");
    if(!isset($_SESSION['usuario'])){
        header ("location: ../../../login/index.php");
    }else{
        $usuario = $_SESSION['usuario'];
    }
?>
<!DOCTYPE html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edicion de Grupo</title>
</head>
<body style="background-color: #fd7e14;">

<div class="container">
  <div class="row">
    <div class="col">
    </div>
    <div class="col">
        <div class="text-center">
        
            <h1>Editar Grupo</h1>

            <div class="editar">
                <label for="codigo_editar">Codigo del Grupo</label>
                <br>
                <input type="text" name="codigo_editar" id="codigo_editar" readonly></input>
                <br><br>

                <label for="fecha_editar">Fecha de Creacion </label>
                <br>
                <input type="text" name="fecha_editar" id="fecha_editar" readonly></input>
                <br><br>

                <label for="hora_editar">Hora de Creacion</label>
                <br>
                <input type="text" name="hora_editar" id="hora_editar" readonly></input>
                <br><br>

                <label for="descripcion_editar">Descripcion</label>
                <br>
                <input type="text" name="descripcion_editar" id="descripcion_editar"></input>
                <br><br>


                <button id="btn-actualizar" class="btn btn-primary" type="boton" name="btn-actualizar">Actualizar</button>
                <br><br>
                <button id="regresar" class="btn btn-danger" type="boton" name="regresar">Regresar</button>

            </div>
        </div>
       </div>
    <div class="col">
    </div>
  </div>
</div>
</body>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src= "script.js"></script>
</html>