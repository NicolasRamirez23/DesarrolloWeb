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
        <title>Usuarios</title>

        <link rel= "stylesheet" href="style.css">
    </head>
    <body>
        <h1>Tabla de usuarios</h1>

        <br>

        <div class="contenedor">
            <table id="data" >


            </table>
        </div>
        
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>

        <button id="registro" type="boton" name="registro">Registrar</button>
        <br>
        <br>


        <button id="regresar" type="boton">Regresar</button>

    </body>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src ="script.js"></script>
</html>