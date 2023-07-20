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
    <title>Edicion de Usuario</title>
</head>
<body>
<h1>Editar Usuario</h1>

<div class="editar">
    <label for="folio">Folio del Perfil</label>
    <br>
    <input type="text" name="folio" id="folio" readonly></input>
    <br><br>

    <label for="fecha_editar">Fecha de Creacion </label>
    <br>
    <input type="text" name="fecha_editar" id="fecha_editar" readonly></input>
    <br><br>

    <label for="hora_editar">Hora de Creacion</label>
    <br>
    <input type="text" name="hora_editar" id="hora_editar" readonly></input>
    <br><br>

    <label for="usuario_editar">Usuario</label>
    <br>
    <select name="usuario_editar" id="usuario_editar"></select>
    <br><br>

    <label for="grupo_editar">Grupo</label>
    <br>
    <select name="grupo_editar" id="grupo_editar"></select>
    <br><br>

    <br><br>

    <button class="btn-actualizar" type="boton" name="btn-actualizar">Actualizar</button>
    <br><br>
    <button class="regresar" type="boton" name="regresar">Regresar</button>

</div>
</body>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src= "script.js"></script>
</html>