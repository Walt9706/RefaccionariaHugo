<?php
include_once 'app/Config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/validador_registro.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/validador_login.inc.php';
include_once 'app/control_secion.inc.php';

if (controlsecion::secion_iniciada()) {
    Redireccion :: redirigir(SERVIDOR);
}

if (isset($_POST['login'])) {
    Conexion::abrir_conexion();

    $validador = new validadorlogin($_POST['email'], $_POST['clave'], Conexion::obtener_conexion());

    if ($validador->obtener_error() === '' && !is_null($validador->obtener_usuario())) {
        //iniciar secion
        controlsecion::iniciar_secion($validador->obtener_usuario()->obtener_id_usuario(),
                $validador->obtener_usuario()->obtener_nombre(),
                $validador->obtener_usuario()->obtener_email());
        Redireccion :: redirigir(SERVIDOR);
    }
    Conexion::cerrar_conexion();
}

$titulo = 'Login';

include_once 'plantillas/documento-apertura.inc.php';
include_once 'plantillas/barra-navegacion.inc.php';
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
                        <label for="email" class="sr-only">Email</label>
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="ejemplo_1@algo.com" 
                        <?php
                        if (isset($_POST['login']) && isset($_POST['email']) && !empty($_POST['email'])) {
                            echo 'value="' . $_POST['email'] . '"';
                        }
                        ?>
                               required autofocus>
                        <br>
                        <label for="clave" class="sr-only">Contraseña</label>
                        <label>Contaseña</label>
                        <input type="password" name="clave" id="clave" class="form-control" required>
                        <br>
                        <?php
                        if (isset($_POST['login'])) {
                            $validador->mostrar_error();
                        }
                        ?>
                        <button type="submit" name="login" class="btn btn-lg btn-primary btn-block"> Iniciar secion</button>
                    </form>
                    <br>
                    <br>
                    <div class="text-center">
                        <a href="#">¿Olvidaste tu Contraseña?</a>
                        <br>
                        <br>
                        <a href="<?php echo RUTA_LOGIN_EMPLEADO ?>">¿Eres empleado?</a>
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