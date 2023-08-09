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
  
    <title>Edicion de Perfiles</title>
</head>
<body  style="background-color: #fd7e14;">

    <div class="container">
  <div class="row">
    <div class="col">
    </div>
    <div class="col">
       
       <div class="text-center" >
          <h1>Editar perfiles de usuario</h1>

            <div class="editar">
                <label for="folio">Folio del Usuario</label>
                <br>
                <input type="text" name="folio" id="folio" readonly></input>
                <br><br>

                <label for="fecha_editar">Fecha de Creacion </label>
                <br>
                <input type="text" name="fecha_editar" id="fecha_editar" readonly></input>
                <br><br>

                <label for="hora_editar">Hora de Creacion</label>
                <br>
                <input type="text" name="hora_editar" id="hora_editar" readonly></input>
                <br><br>

                <label for="usuario_editar">Nombre</label>
                <br>
                <input type="usuario_editar" name="usuario_editar" id="usuario_editar" readonly></input>
                <br><br>

                <div class="contenedor">
                    <table class="table table-bordered border-primary" 
                    style="background-color: #A0FCFF;" id="data">
                    
                    </table>
                </div>
                <br><br><br><br><br><br><br><br>

                <br><br>

                <button class="btn-actualizar" type="boton" name="btn-actualizar">Actualizar</button>
                <br><br>
                <button class="regresar" type="boton" name="regresar">Regresar</button>

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