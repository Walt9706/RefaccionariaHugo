<?php
include_once 'app/control_secion_empleado.inc.php';
include_once 'app/Config.inc.php';
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
                if (controlempleado::secion_iniciada()) {
                    ?>

                    <li>
                        <a href="<?php echo RUTA_BUSCAR ?>">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> 
                            Buscar productos
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo RUTA_INGRESO_PRODUCTOS ?>">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
                            Productos a ingresar
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
                        <a href="<?php echo RUTA_LOGIN_EMPLEADO ?>">
                            <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> 
                            Iniciar sesión Empleado
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>