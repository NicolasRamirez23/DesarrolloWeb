<?php

session_start();

unset($_SESSION);
if (isset($_SESSION['user'])) {

  header("Location: ../dashboard/index.php");
  

  
}else{
  if (isset($_GET['usuario'])) {
    $usuario = $_GET['usuario'];
} 
  
}


?>
