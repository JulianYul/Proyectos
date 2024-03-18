<?php require_once 'includes/cabecera.php'; ?>       
<?php require_once 'includes/sidebar.php'; ?>  

<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>Últimas entradas</h1>
    <?php
        $entradas = conseguirUltimasEntradas($db);
            // Comprobar que el array de $entradas no está vacío
            if(!empty($entradas)):
                while($entrada = mysqli_fetch_assoc($entradas)):
    ?>
                <article class="entrada"> <!-- Como los DIV pero es mejor para los buscadores -->
                    <a href="">
                        <h2><?=$entrada['TITULO']?></h2>
                        <span class="fecha"><?=$entrada['CATEGORIA'].' | '.$entrada['FECHA']?></span>
                        <p>
                            <?=substr($entrada['DESCRIPCION'], 0, 174).'...'?>
                        </p>
                    </a>
                </article>
            
    <?php 
                endwhile; 
            endif;
    ?>    
    
    <div id="ver-todas">
        <a href="">
            Ver todas las entradas
        </a>
    </div>
</div> <!-- Fin de PRINCIPAL -->

<?php require_once 'includes/footer.php'; ?>
