<!DOCTYPE html>
<html>
<head>

  <title>Log in</title>

</head>

<body>

  <h1>Ingresa los datos que se te pidan</h1>

  <form action="index.php" method="POST">
    <!---Label Usuario e Input-->
    <label for="usuario">Usuario</label>
    <br>
    <input type="text" id="usuario" name="usuario" placeholder="ej. pepe123" 
    required>
    
    <br>
    <br>
    
    <!--Label Clave e Input-->
    <label for="clave">Contraseña</label>
    <br>
    <input type="password" id="clave" name="clave" placeholder="Contraseña"
    required>
   
    <br>
    <br>

    <button type="submit" name="submit">Ingresar</button>
</form>
  
<?php

  // funcion isset sirve para verificar si se ha enviado el formulario
  if (isset($_POST['submit'])) {
    // Obtener los valores del formulario
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Conexión a la base de datos
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "formulario";

    // Crear la conexión
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Verificar la conexión (preguntar)
    if ($conn->connect_error) {
      die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    // Consulta para verificar los datos de inicio de sesión
    $sql = "SELECT * FROM admin WHERE usuario='$usuario' AND clave='$clave'";
    $result = $conn->query($sql);

    // Verificar si se encontró un registro coincidente
    if ($result->num_rows == 1) {

      header("Location: http://localhost/ssat/dashboard/index.php");
      exit();
           
    } else {
        
      echo "<p>Error: Usuario o contraseña incorrectos.</p>";
    }

    $conn->close();
  }
  ?>
  
</body>
</html>