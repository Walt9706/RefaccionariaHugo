<?php
include_once 'app/Config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Redireccion.inc.php';


if (isset($_GET['nombre']) && !empty($_GET['nombre'])){
    $nombre= $_GET['nombre'];
}else{
    Redireccion::redirigir(SERVIDOR);
}

$titulo = 'Registro Correcto';

include_once 'plantillas/documento-apertura.inc.php';
include_once 'plantillas/barra-navegacion.inc.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Registro Correcto
                </div>
                <div class="panel-body text-center">
                    <p>Gracias por registrarte <b><?php echo $nombre; ?></b></p>
                    <br>
                    <p><a href="<?php echo RUTA_LOGIN ?>">Inicia sesion</a> Para comenzar a usar tu cuenta</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>