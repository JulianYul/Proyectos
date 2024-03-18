<?php require_once 'includes/redireccion.php'; ?> 
<?php require_once 'includes/cabecera.php'; ?>       
<?php require_once 'includes/sidebar.php'; ?> 



<!-- Caja PRINCIPAL -->
<div id="principal">
    <h1>Crear categorías</h1>
    <p>
        Añade una nueva categoría al blog
    </p>
    <br/>
    <form action="guardar-categoria.php" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" />
        
       <input type="submit" value="Crear" />
    </form>
      
</div> <!-- Fin de Caja PRINCIPAL -->
<?php require_once 'includes/footer.php'; ?>