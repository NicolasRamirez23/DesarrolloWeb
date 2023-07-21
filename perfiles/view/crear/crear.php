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
    <title>Crear Perfil</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Creacion de Perfiles</h1>

    <div class="formulario">
        <label for="usuario">Usuario</label>
        <br>

        <select name="usuario" id = "nombresComboBox"></select>
        
        <br><br>

        <label for="grupo">Grupo</label>
    

        <br><br>

        <button class="btn_agregar_grupo" type="boton" name="btn_agregar_grupo">Agregar Grupo</button>
        <br><br>

        <div class="contenedor">
            <table id="data" >


            </table>
        </div>

        <button class="btncrear" type="boton" name="botoncrear">Crear</button>
        <br><br>
        <button class="regresar" type="boton" name="regresar">regresar</button>
    </div>

</body>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src ="script.js"></script>
</html>