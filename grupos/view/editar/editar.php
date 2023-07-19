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
    <title>Edicion de Grupo</title>
</head>
<body>
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


    <button class="btn-actualizar" type="boton" name="btn-actualizar">Actualizar</button>
    <br><br>
    <button class="regresar" type="boton" name="regresar">Regresar</button>

</div>
</body>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src= "script.js"></script>
</html>