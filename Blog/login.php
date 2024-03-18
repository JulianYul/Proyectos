<?php

// Conexión a la BD
require_once 'includes/conexion.php'; 

// Recoger datos del formulario
if(isset($_POST)){
    
    // Borrar error antiguo
    $borrado = null;
    if(isset($_SESSION['error_login'])){
        $borrado = session_unset();
    }
        
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    // Consulta para comprobar credenciales del usuario 
    $sql = "SELECT * FROM usuarios WHERE email = '$email';";
    $login = mysqli_query($db, $sql);
    
    
        if($login && mysqli_num_rows($login) == 1){
                        
            $usuario = mysqli_fetch_assoc($login);  
                        
            // Comprobar la contraseña 
            $verify = password_verify($password, $usuario['PASSWORD']);            
            
            if($verify){
                // Utilizar una sesión para guardar los datos del usuario logueado
                $_SESSION['usuario'] = $usuario;
                                                
            }else{
                // Sesión con el fallo, en caso de fallo
                $_SESSION['error_login'] = 'Login incorrecto.';                
            }
            
        }else{
            // Mensaje de error
             $_SESSION['error_login'] = 'Login incorrecto.';
        }    
}
// Redireccionar al index
header('Location: index.php');
?>
