<!DOCTYPE html>
<html>
<head>

  <title>Bienvenida</title>

  <link rel= "stylesheet" href="../css/style.css">

</head>

<body>
  <script src="script.js"></script>
  
    <div class="contenedor">
    
        <div class="col" id="login1">
            
        </div>
      
        <div class="col" id="login2">
          <img src="../logo.jpg" width="100">
          <br>
          <h1 class="titulo">Bienvenido</h1>
          <br>
          
            <form action="index.php" method="POST">
              

              <!---Label Usuario e Input-->
              <br>
              <h4 class="texto">Nombre de Usuario</h4>
              <input class="input" type="text" id="usuario" name="usuario" placeholder="ej. Pepe123" required>
                
              <br>
              <br>
              <br>
            

              <!--Label Clave e Input-->
              <h4 class="texto">Contraseña</h4>
              <input class="input" type="password" id="clave" name="clave" placeholder="Contraseña" required>
              
              <br>
              <br>
              <br>

              <button class="btn" type="boton" name="boton" onclick="hicieronClick()">Ingresar</button>
            </form>
        </div>
    </div>
</body>
</html>