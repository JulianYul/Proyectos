<?php
// Si existen datos en POST
if(isset($_POST)){
    
    // Cargar conexión a la BD
    require_once 'includes/conexion.php';
    
    // Iniciar la sesión
    if(!isset($_SESSION)){
        session_start(); 
    }
    
    // Recoger valores del formulario de registro con operadores ternarios
    // mysqli_real_escape_string => interpreta todo lo que le pasen por parámetro como si fuese un string (Para poder pasar comillas en los campos)
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;   
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false; /* trim() para que se guarde sin espacios */
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;
    
    // Array de errores
    $errores = array();
    
    // Validar datos antes de guardarlos en la BD
        // Validar nombre
        if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
            $nombre_validado = true;
        }else{
            $nombre_validado = false;
            $errores['nombre'] = 'El nombre no es válido.';
        }
    
        // Validar apellidos
        if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
            $apellidos_validado = true;
        }else{
            $apellidos_validado = false;
            $errores['apellidos'] = 'Los apellidos no son válidos.';
        }
        
        // Validar email
        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_validado = true;
        }else{
            $email_validado = false;
            $errores['email'] = 'El email no es válido.';
        }
        
        // Validar password
        if(!empty($password)){
            $password_validado = true;
        }else{
            $password_validado = false;
            $errores['password'] = 'La contraseña está vacía.';
        }

        // Comprobar que no hay errores en los campos del formulario
        $guardar_usuario = false;
        
        if(count($errores) == 0){
            $guardar_usuario = true;
                        
            // CIFRAR LA CONTRASEÑA
            $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]); // cost => nº de veces que realiza el cifrado sobre el cifrado ya hecho
                        
            // INSERTAR USUARIO en la tabla de la BD
            $sql = "INSERT INTO usuarios VALUES(NULL, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
            $guardar = mysqli_query($db, $sql);            
                                   
                if($guardar){
                    $_SESSION['completado'] = 'El registro se ha completado con éxito.';
                }else{
                    $_SESSION['errores']['general'] = 'Fallo al guardar el usuario.';
                }           
            
        //Si hay error, no se introducen los datos           
        }else{
            $_SESSION['errores'] = $errores;           
        }
}

// Redirección a la cabecera
header('Location: index.php'); 
 
?>
