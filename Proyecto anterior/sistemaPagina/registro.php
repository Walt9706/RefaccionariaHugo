<?php
include_once 'app/Conexion.inc.php';
include_once 'app/usuario.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/validador_registro.inc.php';
include_once 'app/Redireccion.inc.php';
if (isset($_POST['enviar'])) {
    Conexion::abrir_conexion();
    $validador = new validadorregistro($_POST['nombre'], $_POST['email'], $_POST['clave1'], $_POST['clave2'], Conexion::obtener_conexion());

    if ($validador->registro_valido()) {
        $usuario = new Usuario('', $validador->obtener_nombre(), $validador->obtener_email(), password_hash($validador->obtener_clave(), PASSWORD_DEFAULT), '', '');
        $usuario_insertado = RepositorioUsuario::insertar_usuario(Conexion::obtener_conexion(), $usuario);

        if ($usuario_insertado) {
            //usuario insertado redirigir a login
            Redireccion :: redirigir(RUTA_REGISTRO_CORRECTO . '?nombre=' . $usuario->obtener_nombre());
        }
    }
}
Conexion::cerrar_conexion();

$titulo = 'Registro';

include_once 'plantillas/documento-apertura.inc.php';
include_once 'plantillas/barra-navegacion.inc.php';
?>

<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Formulario de Registro</h1>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Instrucciones
                    </h3>
                </div>
                <div class="panel-body">
                    <p class="text-justify">
                        Para un registro correcto Introduce<br>
                        <br>
                        - Nombre de Usuario<br>
                        - Email correcto<br>
                        - Contraseña<br>
                        <br>
                        El email que escribas debera ser real ya que lo necesitaras para gestionar tu cuenta<br>
                        Te recomendamos que uses una contraseña que contenga<br>
                        - Letras minusculas y mayusculas<br>
                        - Numeros y simbolos<br>
                        <br>
                    </p>
                    <a href="<?php echo RUTA_LOGIN ?>">¿Ya estas registrado?</a>
                    <br>
                    <br>
                    <a href="#">¿Olvidaste tu contraseña?</a>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Introduce tus datos
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <?php
                        if (isset($_POST['enviar'])) {
                            include_once 'plantillas/registro_validado.inc.php';
                        } else {
                            include_once 'plantillas/registro_vacio.inc.php';
                        }
                        ?>
                    </form>
                </div>
                <a href="<?php echo SERVIDOR ?>" 
                   class="btn btn-default btn-primary">
                    <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> Regresar
                </a>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>