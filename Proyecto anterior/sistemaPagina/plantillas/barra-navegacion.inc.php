<?php
include_once 'app/control_secion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Config.inc.php';

Conexion::abrir_conexion();
$total_usuarios = RepositorioUsuario::obtener_num_usuarios(Conexion :: obtener_conexion());
Conexion::cerrar_conexion();
?>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Este boton despliega la barra de navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo SERVIDOR ?>">CarlosGG</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right">
                <?php
                if (controlsecion::secion_iniciada()) {
                    ?>

                    <li>
                        <a href="<?php echo RUTA_CARIITO_COMPRAS ?>">
                            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 
                            Carrito
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo RUTA_BUSCAR_PRODUCTO ?>">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> 
                            Buscar Productos
                        </a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <?php echo ' ' . $_SESSION['nombre_usuario']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo RUTA_LOGOUT ?>">
                            <span class="glyphicon glyphicon-log-out" aria-hidden="true" ></span> 
                            Cerrar secion
                        </a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li>
                        <a href="#">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <?php
                            echo $total_usuarios;
                            ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo RUTA_LOGIN ?>">
                            <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> 
                            Iniciar sesión
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo RUTA_REGISTRO ?>">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
                            Registro
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>