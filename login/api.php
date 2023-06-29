<?php

   $usuario=$_POST['usuario'];
   $clave=$_POST['clave'];


    
   if($usuario == 'admin' && $clave == '1234'){
        echo("1");
    }else{
        echo("0");
    }
  
  ?>