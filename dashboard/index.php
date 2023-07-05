<?php 
    require("../config/config.inc");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Menu Principal </title>
</head>
<body>

    <h1>¡Hola, bienvenido <?php echo $usuario ?>! </h1>

    
    <button class="btncs" action="../config/config.inc" method="post" type="submit">Cerrar sesión</button>
    
</body>
    <script src ="script.js"></script>
</html>