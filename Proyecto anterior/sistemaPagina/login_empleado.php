<?php
include_once 'app/Config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioEmpleado.inc.php';
include_once 'app/validador_registro.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/validarLoginEmpleado.inc.php';
include_once 'app/control_secion_empleado.inc.php';

if (controlempleado::secion_iniciada()) {
    Redireccion :: redirigir(RUTA_PAGINA_EMPLEADO);
}
if (isset($_POST['loginempleado'])) {
    Conexion::abrir_conexion();

    $validador = new validarLoginEmpleado($_POST['nombre_usuario'], $_POST['clave'], Conexion::obtener_conexion());

    if ($validador->obtener_error() === '' && !is_null($validador->obtener_empleado())) {
        //iniciar secion
        controlempleado::iniciar_secion($validador->obtener_empleado()->obtener_id_empleado(), $validador->obtener_empleado()->obtener_nombre_usuario(), $validador->obtener_empleado()->obtener_nombre());
        Redireccion :: redirigir(RUTA_PAGINA_EMPLEADO);
    }
    Conexion::cerrar_conexion();
}

$titulo = 'Login empleado';

include_once 'plantillas/documento-apertura.inc.php';
include_once 'plantillas/barra-navegacion-empleado.inc.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4>Iniciar secion</h4>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <h2>Introduce tus datos</h2>
                        <br>
                        <label for="usuario" class="sr-only">Usuario</label>
                        <label>Usuario</label>
                        <input type="text" name="nombre_usuario" class="form-control" placeholder="apellido.ejemplo12" 
                        <?php
                        if (isset($_POST['loginempleado']) && isset($_POST['nombre_usuario']) && !empty($_POST['nombre_usuario'])) {
                            echo 'value="' . $_POST['nombre_usuario'] . '"';
                        }
                        ?>
                               required autofocus>
                        <br>
                        <label for="clave" class="sr-only">Contraseña</label>
                        <label>Contaseña</label>
                        <input type="password" name="clave" id="clave" class="form-control" required>
                        <br>
                        <?php
                        if (isset($_POST['loginempleado'])) {
                            $validador->mostrar_error();
                        }
                        ?>
                        <button type="submit" name="loginempleado" class="btn btn-lg btn-primary btn-block"> Iniciar secion</button>
                    </form>
                    <br>
                    <br>
                    <div class="text-center">
                        <a href="#">¿Olvidaste tu Contraseña?</a>
                        <br>
                        <br>
                        <a href="<?php echo SERVIDOR ?>" 
                           class="btn btn-default btn-primary text-center">
                            <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> Regresar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>