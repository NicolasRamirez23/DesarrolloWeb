<?php
include("../config/config.inc");

$cs = $_POST['cs'];

if($cs==0){
    unset($_SESSION['usuario']);
    echo true; 
}


?>