<?php

/*
 *  CONEXIÓN A LA BASE DE DATOS
 */
$servidor = 'localhost';
$usuario = 'root';
$password = '';
$database = 'blog';

$db = mysqli_connect($servidor, $usuario, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'"); 

// Iniciar la sesion
if(!isset($_SESSION)){   
    session_start();
}

?>
