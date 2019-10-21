<?php
include_once 'app/Conexion.inc.php';
include_once 'app/producto.inc.php';
include_once 'app/RepositorioProducto.inc.php';
include_once 'app/validar_producto_actualizado.inc.php';
include_once 'app/Redireccion.inc.php';


$titulo = 'Registro Productos';

include_once 'plantillas/documento-apertura.inc.php';
include_once 'plantillas/barra-navegacion-empleado.inc.php';

if (isset($_POST['btn_actualizar'])) {
    Conexion::abrir_conexion();

    $validador = new validador_producto_actualizado($_POST['txtnombre'], $_POST['txtprovedor'], $_POST['txtcantidad'], $_POST['txtprecio'], $_POST['txttipo_producto'], $_POST['txtfecha_caducidad'], Conexion::obtener_conexion());

    if ($validador->registro_valido_producto()) {
        $cod = htmlspecialchars($_POST['codigo']);
        $nombre_producto = htmlspecialchars($_POST['txtnombre']);
        $provedor_nombre = htmlspecialchars($_POST['txtprovedor']);
        $cantidad_producto = htmlspecialchars($_POST['txtcantidad']);
        $precio_producto = htmlspecialchars($_POST['txtprecio']);
        $producto_tipo = htmlspecialchars($_POST['txttipo_producto']);
        $fecha_producto = htmlspecialchars($_POST['txtfecha_caducidad']);

        $producto = new Producto($cod, $nombre_producto, $provedor_nombre, $cantidad_producto, $precio_producto, $producto_tipo, $fecha_producto, '','');
        $producto_actualizado = RepositorioProducto::actualizar_producto(Conexion::obtener_conexion(), $producto);
        if ($producto_actualizado) {
            Redireccion::redirigir(RUTA_ACTUALIZAR_PRODUCTO_CORRECTO);
        }
    }
    Conexion::cerrar_conexion();
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-3 text-center">

        </div>
        <div class="col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Actualizar Producto
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <?php
                        if (isset($_POST['btn_actualizar'])) {
                            include_once 'plantillas/registro_actualizar_validaddo.inc.php';
                        } else {
                            include_once 'plantillas/registro_actualizar_vacio.inc.php';
                        }
                        ?>
                        <input type="hidden" name="funcion" value="modificar">
                        <input type="hidden" name="codigo" value="<?php echo $id_producto; ?>">
                    </form>
                </div>
                <br>
                <a href="<?php echo RUTA_PAGINA_EMPLEADO ?>" class="btn btn-default btn-danger">
                    <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> Cancelar
                </a>
                <br>
                <br>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>
