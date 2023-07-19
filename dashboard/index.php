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
    <title>Menu Principal </title>
</head>
<body>

    <h1>¡Hola, bienvenido <?php echo $usuario ?>! </h1>

    <button id="usuarios" type="boton" name="btnusuario">Ver Usuarios</button>
    
    <br>
    <br>

    <button id="grupos" type="boton" name="btn_grupo"> Ver Grupo</button>
    <br>
    <br>

    <button id="perfiles" type="boton" name="perfiles"> Ver Perfiles</button>
    <br>
    <br>
    
    <button id="btncs" type="boton" name="botoncs">Cerrar Sesion</button>
    
</body>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src ="script.js"></script>
</html>