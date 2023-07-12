<?php 
    require("../../config/config.inc");
    if(!isset($_SESSION['usuario'])){
        header ("location: ../login/index.php");
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
    <label for="folioeditar">Ingrese ID de usuario</label>
    <br>
    <input type="text" name="folioeditar" id="folioeditar"></input>
    <br><br>


    <label for="nombreeditar">Nombre</label>
    <br>
    <input type="text" name="nombreeditar" id="nombreeditar"></input>
    <br><br>

    <label for="usuarioeditar">Usuario</label>
    <br>
    <input type="text" name="usuarioeditar" id="usuarioeditar"></input>
    <br><br>

    <label for="passeditar">Contraseña</label>
    <br>
    <input type="password" name="passeditar" id="passeditar"></input>
    <br><br>

    <button class="btnebuscar" type="boton" name="btnebuscar">Buscar</button>
    <br><br>

    <button class="btneditar" type="boton" name="btneditar">Editar</button>
    <br><br>
    <button class="regresar" type="boton" name="regresar">Regresar</button>

</div>
</body>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src= "script.js"></script>
</html>