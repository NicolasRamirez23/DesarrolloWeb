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

    <title>Edicion de Usuario</title>
</head>
<body style="background-color: #fd7e14;">

<div class="container">
  <div class="row">
    <div class="col">
    </div>
    <div class="col">
       <div class="text-center">
       <div class="editar" style="background-color: #A0FCFF;">
    <h1>Editar Usuario</h1>
    <label for="folioeditar">ID del usuario</label>
    <br>
    <input type="text" name="folio-editar" id="folio-editar" readonly></input>
    <br><br>

    <label for="fecha-editar">Fecha de Creacion </label>
    <br>
    <input type="text" name="fecha-editar" id="fecha-editar" readonly></input>
    <br><br>

    <label for="hora-editar">Hora de Creacion</label>
    <br>
    <input type="text" name="hora-editar" id="hora-editar" readonly></input>
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

    <button id="btn-actualizar" class="btn btn-primary" type="boton" name="btn-actualizar">Actualizar</button>
    <br><br>
    <button id="regresar" type="boton" name="regresar" class="btn btn-danger">Regresar</button>

</div>
            
        </div>
       </div>
    <div class="col">
      
    </div>
  </div>
</div>


</body>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src= "script.js"></script>
</html>