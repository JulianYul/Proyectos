<?php
    
    // Iniciar la sesión
    session_start();
    
    // Destruir la sesión
    if(isset($_SESSION['usuario'])){
        session_destroy();
    }
    
    // Redireccionar al index
    header('Location: index.php');
    
?>
