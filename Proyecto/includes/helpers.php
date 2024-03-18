<?php

/* LIBRERIA DE FUNCIONES*/ 


// Mostrar errores en los campos del formulario de REGISTRO
function mostrarError($errores, $campo){
    
    $alerta = '';
        if(isset($errores[$campo]) && !empty($campo)){
            $alerta = "<div class='alerta alerta-error'>".$errores[$campo].'</div>';     
        }
    
    return $alerta;    
}

// Eliminar los errores
function borrarErrores(){
    if(isset($_SESSION['errores']) || isset($_SESSION['completado'])){
        $borrado = session_unset();    
    }else{
        $borrado = null;
    }
    return $borrado;          
}


// LISTAR CATEGORIAS
function conseguirCategorias($conexion){
    
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $categorias = mysqli_query($conexion, $sql);
    
    $resultado = array();
    if($categorias && mysqli_num_rows($categorias) >= 1){
        $resultado = $categorias;
    }
    
    return $resultado;
    
}

// LISTAR ENTRADAS
function conseguirUltimasEntradas($conexion){
    
    $sql = "SELECT e.*, c.NOMBRE AS 'CATEGORIA' FROM entradas e ".
            "INNER JOIN categorias c ON e.categoria_id = c.id ".
            "ORDER BY e.id DESC LIMIT 4;";
    $entradas = mysqli_query($conexion, $sql);
    
    $resultado = array();
    if($entradas && mysqli_num_rows($entradas) >= 1){
        $resultado = $entradas;
    }
    
    return $resultado;    
}



?>
