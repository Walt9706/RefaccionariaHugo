<?php
include_once 'app/Config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioProducto.inc.php';
include_once 'app/Redireccion.inc.php';

$titulo = 'Producto Actualizado';

include_once 'plantillas/documento-apertura.inc.php';
include_once 'plantillas/barra-navegacion-empleado.inc.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Registro Correcto
                </div>
                <div class="panel-body text-center">
                    <p>Gracias por Actualizar el producto</p>
                    <br>
                    <p><a href="<?php echo RUTA_PAGINA_EMPLEADO ?>">Regresa a la pagina principal</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>
