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
        <title>Grupos</title>

        <link rel= "stylesheet" href = "style.css">
    </head>
    <body>

        <h1>Asignar Grupo</h1>

        <br>

        <div class="contenedor">

            <table id="data">


            </table>



        </div>

        <button id="crear" type="boton" name="crear">Crear Grupo</button>
        <br>
        <br>


        <button id="regresar" type="boton">Regresar</button>



        
    </body>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src ="script.js"></script>
</html>