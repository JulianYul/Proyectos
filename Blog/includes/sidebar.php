<!-- SIDEBAR / BARRA LATERAL -->
            <aside id="sidebar">
                
                <!-- Bloque de usuario logueado -->
                <?php if(isset($_SESSION['usuario'])): ?>                             
                    <div id="usuario-logueado" class="bloque">
                        <!-- Mensaje de bienvenida -->
                        <h3 class="bienvenido">Bienvenido, <?=$_SESSION['usuario']['NOMBRE'].' '.$_SESSION['usuario']['APELLIDOS'];?></h3>
                        
                        <!-- Botones de usuario -->
                        <a href="crear-entradas.php" class="boton boton-verde">Crear entradas</a>
                        <a href="crear-categoria.php" class="boton">Crear categoría</a>
                        <a href="index.php" class="boton boton-naranja">Mi perfil</a>
                                                
                        <!-- Cerrar sesion -->
                        <a href="cerrar.php" class="boton boton-rojo">Cerrar sesión</a>
                    </div>
                <?php endif; ?>   
                
                <!-- Si NO existe usuario, mostrar estos bloques(Login y Registro) -->
                <?php if(!isset($_SESSION['usuario'])): ?>
                
                    <!-- Bloque de identificacion -->              
                    <div id="login" class="bloque">
                        <h3>Identifícate</h3>
                        
                    <!-- Login incorrecto -->		
                    <?php if(isset($_SESSION['error_login'])): ?>
                            <div class="alerta alerta-error">
                                <?=$_SESSION['error_login'];?>
                            </div>
                    <?php endif; ?>
                    
                        <!-- Formulario de login -->
                        <form action="login.php" method="POST">
                            <label for="email">Email</label>
                            <input type="email" name="email" />

                            <label for="password">Contraseña</label>
                            <input type="password" name="password" />

                            <input type="submit" value="Entrar" />
                        </form>
                    </div>
                
                    <div id="registro" class="bloque">

                        <h3>Regístrate</h3>

                        <!-- MOSTRAR ERRORES O ÉXITO -->
                        <?php 
                            if(isset($_SESSION['completado'])) : ?>
                                <div class="alerta alerta-exito">
                                   <?=$_SESSION['completado']?>
                                </div>                        
                        <?php elseif(isset($_SESSION['errores']['general'])): ?> <!-- error en el registro -->                            
                                <div class="alerta alerta-error">
                                    <?=$_SESSION['errores']['general']?>
                                </div>                        
                            <?php endif; ?> 
                        
                        <!-- Bloque de registro -->
                        <form action="registro.php" method="POST">

                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" />
                            <!-- Error en el nombre -->
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

                            <label for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos" />
                            <!-- Error en el apellido -->
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>                        

                            <label for="email">Email</label>
                            <input type="email" name="email" />
                            <!-- Error en el email -->
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>                        

                            <label for="password">Contraseña</label>
                            <input type="password" name="password" />
                            <!-- Error en la contraseña -->
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>                        

                            <input type="submit" name="submit" value="Registrar" />

                        </form>
                        
                    <!-- Eliminar los errores que se han mostrado -->
                    <?php borrarErrores(); ?> 
                    
                    </div> <!-- Fin del bloque de registro -->
                    
                <?php endif; ?><!-- Fin de la condición de los bloques (Login y Registro) -->
            </aside>