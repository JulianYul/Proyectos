<?php require_once 'includes/redireccion.php'; ?> 
<?php require_once 'includes/cabecera.php'; ?>       
<?php require_once 'includes/sidebar.php'; ?> 



<!-- Caja PRINCIPAL -->
<div id="principal">
    <h1>Crear entradas</h1>
    <p>
        Añade una nuevas entradas al blog a una categoría
    </p>
    <br/>
    <form action="guardar-entrada.php" method="POST">
        
        <label for="titulo">Título</label>
        <input type="text" name="titulo" />
        
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" cols="100" rows="15"> </textarea>
        
        <label for="categoria">Categoría</label>
        <select name="categoria">
            <?php 
                $categorias = conseguirCategorias($db);
                if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):
                    
            ?>
                 
                <option value="<?=$categoria['ID']?>">
                    <?=$categoria['NOMBRE']?>
                </option>    
               
                
            <?php
                    endwhile;
                endif;
            ?>
        </select>
        
       <input type="submit" value="Crear" />
    </form>
      
</div> <!-- Fin de Caja PRINCIPAL -->
<?php require_once 'includes/footer.php'; ?>