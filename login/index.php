<?php require("../config/config.inc");
if (isset($_SESSION['usuario'])) {
  $usuario = $_SESSION['usuario'];
  header("location: ../dashboard/index.php");
}

?>
<!DOCTYPE html>
<html>

<head>

  <title>Login</title>

  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



</head>

<body>

  <?php
  require('view.php');
  ?>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="script.js"></script>

</html>