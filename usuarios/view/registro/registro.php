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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Registro</title>
</head>
<body style="background-color: #fd7e14;">

    <div class="container">
    <div class="row">
        <div class="col">
        </div>
        <div class="col">
            <div class="text-center">
                <div class="formulario" style="background-color: #A0FCFF;">
                    <h1>Registro de usuario</h1>
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

                    <button type="boton" id="btncrear" name="botoncrear" class="btn btn-primary">Crear</button>
                    <br><br>
                    <button  type="boton"id="btnregresar" name="regresar" class="btn btn-danger">regresar</button>
                </div>
            </div>
        </div>
        <div class="col">
        </div>
    </div>
    </div>


</body>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src ="script.js"></script>
</html>