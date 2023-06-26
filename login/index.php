<!DOCTYPE html>
<html>
<head>

  <title>Log in</title>

  <link rel="stylesheet" href="../css/style.css">

</head>

<body>
  <div id="login1">
    <h1 id="bienvenida">Ingresa los datos que se te pidan</h1>

    <form action="index.php" method="POST">
      <!---Label Usuario e Input-->
      <label for="usuario">Usuario</label>
      <br>
      <input type="text" id="usuario" name="usuario" placeholder="ej. pepe123" 
      required>
      
      <br>
      <br>
      
      <!--Label Clave e Input-->
      <label for="clave">Clave</label>
      <br>
      <input type="password" id="clave" name="clave" placeholder="Contraseña"
      required>
    
      <br>
      <br>

      <button type="submit" name="submit">Ingresar</button>
  </div>
</form>
  
<?php

  // funcion isset sirve para verificar si se ha enviado el formulario
  if (isset($_POST['submit'])) {
    // Obtener los valores del formulario
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    if($usuario == 'admin' && $clave == '1234'){
      echo("datos correctos");
      header("Location: http://localhost/DesarrolloWeb/dashboard/index.php");
      
    }else{
      echo("datos incorrectos");
    }
  }
  ?>
  
</body>
</html>