<?php

/* Redirección para las páginas que solo puedan usarse estando registrado */

if(!isset($_SESSION)){   
    session_start();
}

if(!isset($_SESSION['usuario'])){
    header('Location: index.php');
}

?>
