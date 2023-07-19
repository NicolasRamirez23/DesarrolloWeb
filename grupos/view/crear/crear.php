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
    <title>Crear Grupo</title>
</head>
<body>

    <h1>Creacion de Grupo</h1>

    <div class="formulario">
        <label for="descripcion">Descripcion</label>
        <br>
        <input type="text" name="descripcion" id="descripcion" placeholder="Ej. Usuario" required></input>

        <br><br>
        <button class="btncrear" type="boton" name="botoncrear">Crear</button>
        <br><br>
        <button class="regresar" type="boton" name="regresar">regresar</button>
    </div>

</body>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src ="script.js"></script>
</html>