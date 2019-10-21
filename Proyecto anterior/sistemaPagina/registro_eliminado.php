<?php
include_once 'app/Config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioProducto.inc.php';
include_once 'app/Redireccion.inc.php';


if (isset($_POST['eliminar'])) {
    Conexion::abrir_conexion();
    $id_producto = htmlspecialchars($_POST['id_producto']);
    if (!is_numeric($id_producto)) {
        Redireccion :: redirigir(RUTA_PAGINA_EMPLEADO);
    } else {
        $producto_eliminar = RepositorioProducto::eliminar_producto(Conexion::obtener_conexion(), $id_producto);
        if ($producto_eliminar) {
            echo 'Producto eliminado';
            Redireccion :: redirigir(RUTA_PAGINA_EMPLEADO);
        }
    }
}
Conexion::cerrar_conexion();

$titulo = 'Producto eliminado';

include_once 'plantillas/documento-apertura.inc.php';
include_once 'plantillas/barra-navegacion-empleado.inc.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Seguro
                </div>
                <div class="panel-body text-center">
                    <?php if (isset($_GET['id'])): ?>
                        <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">

                            <p> Seguro que quieres Eliminar el producto con id <?php echo htmlspecialchars($_GET["id"]) ?></p>
                            <br>
                            <input type="hidden" name="id_producto" value="<?php echo htmlspecialchars($_GET["id"]) ?>">
                            <br>
                            <button type="submit" class="btn btn-default btn-primary" name="eliminar">Eliminar</button>
                            <br>
                            <br>
                            <a href="<?php echo RUTA_PAGINA_EMPLEADO ?>" class="btn btn-danger"> Cancelar</a>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>





<?php
include_once 'plantillas/documento-cierre.inc.php';
?>