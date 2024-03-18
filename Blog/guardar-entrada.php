<?php

if(isset($_POST)){
    // Cargar conexión a la BD
    require_once 'includes/conexion.php';
    
    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
    $usuario = $_SESSION['id'];
     
    // Array de errores
    $errores = array();
    
    // Validar datos antes de guardarlos en la BD
        // Validar titulo
        if(empty($titulo)){
            $errores['titulo'] = 'El título no es válido.';
        }
        // Validar descripción
        if(empty($descripcion)){
            $errores['descripcion'] = 'La descripción no es válida.';
        }
        // Validar categoría
        if(empty($categoria)){
            $errores['categoria'] = 'La categoría no puede estar vacía.';
        }
        var_dump($errores);
        die();
        
        if(count($errores) == 0){
            $sql = "INSERT INTO entradas VALUES(NULL, $usuario, $categoria, '$titulo', '$descripcion', CURDATE());";
            $guardar = mysqli_query($db, $sql);
           
        }else{
            $_SESSION['errores_entrada'] = $errores;
        }              
       
}

header('Location: index.php');

?>