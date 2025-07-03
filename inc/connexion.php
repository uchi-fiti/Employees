<?php
    ini_set('display_errors', 1);
    if($bdd = mysqli_connect('localhost' , 'root' , '' , 'employees')){
    }
    else{
        echo 'Erreur';
    }
?>