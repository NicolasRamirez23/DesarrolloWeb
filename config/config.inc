<?php
    session_start();

    $_SESSION["juan"]="1234";
    print_r($_SESSION);
    die();  

    foreach($_SESSION as $usuario_guardado){
        if($user == $usuario_guardado){
            
            header('Location: ../dashboard/index.php');
            print_r ($_SESSION);
            break;
        }else{
            echo "No estas loggeado";
        }
    }

