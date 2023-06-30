<?php

$user = $_POST["user"];
$pass = $_POST["pass"];

if((include 'config.inc')==TRUE){
    echo(file_get_contents('config.inc',false,null,0,null));
    
}
    
    



?>  