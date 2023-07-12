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
    <title>Eliminar Usuario</title>
</head>
<body>
    <h1>Eliminar Usuario</h1>

    <div class="eliminar">
        <label for="folio">Ingrese ID de usuario</label>
        <br>
        <input type="text" name="folioeliminar" id="folioeliminar"></input>
        <br><br>

        <button class="btneliminar" type="boton" name="btneliminar">Eliminar</button>
        <br><br>
        <button class="regresar" type="boton" name="regresar">Regresar</button>
       


    </div>
</body>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src= "script.js"></script>
</html>