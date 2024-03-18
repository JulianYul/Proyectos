 <?php require_once 'conexion.php'; ?>
 <?php require_once 'helpers.php'; ?>

<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="./assets/css/estilos.css"/>
        <title>Blog de Videojuegos</title>
    </head>
    <body>
        
        <!-- CABECERA -->
        <header id="cabecera">
            <!-- LOGO -->
                <div id="logo">
                    <a href="index.php">
                    Blog de Videojuegos
                    </a>
                </div>
              
            <!-- MENU -->            
            <nav id="menu">
                <ul>
                    <li>
                        <a href="index.php">Inicio</a>
                    </li>
                    
                    <!-- Crear una categoria por cada categoria de la BD -->
                    <?php 
                        $categorias = conseguirCategorias($db);
                        // Comprobar que el array de $categorias no está vacío
                        if(!empty($categorias)):
                            while($categoria = mysqli_fetch_assoc($categorias)):
                    ?>                    
                                <li>
                                <a href="categoria.php?id=<?=$categoria['ID']?>"><?=$categoria['NOMBRE']?></a>
                                </li>                        
                    <?php 
                            endwhile; 
                        endif;
                    ?>
                        
                    <li>
                        <a href="index.php">Sobre mí</a>
                    </li>
                    <li>
                        <a href="index.php">Contacto</a>
                    </li>
                </ul>            
            </nav>
            
            <!-- Eliminar espacios en blanco -->
            <div class="clearfix">                 
            </div>
            
        </header>   
        <div id="contenedor">
