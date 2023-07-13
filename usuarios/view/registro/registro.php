<?php 
    require("../../../config/config.inc");
    if(!isset($_SESSION['usuario'])){
        header ("location: ../login/index.php");
    }else{
        $usuario = $_SESSION['usuario'];
    }
?>
<!DOCTYPE html>
<head>
    <title>Registro</title>
</head>
<body>

    <h1>Registro de usuario</h1>

    <div class="formulario">
        <label for="nombre">Nombre</label>
        <br>
        <input type="text" name="nombre" id="nombre" placeholder="Ej. Nicolas" required></input>

        <br><br>

        <label for="usuario">Usuario</label>
        <br>
        <input type="text" name="usuario" id="usuario" placeholder="Ej. AtarusV-23" required></input>

        <br><br>

        <label for="clave">Contraseña</label>
        <br>
        <input type="password" name="clave" id="clave"></input>

        <br><br>

        <button class="btncrear" type="boton" name="botoncrear">Crear</button>
        <br><br>
        <button class="regresar" type="boton" name="regresar">regresar</button>
    </div>

</body>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src ="script.js"></script>
</html>