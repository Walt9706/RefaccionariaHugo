<?php
include_once 'app/Conexion.inc.php';
include_once 'app/producto.inc.php';
include_once 'app/RepositorioEmpleado.inc.php';
include_once 'app/validar_registro_producto.inc.php';
include_once 'app/Redireccion.inc.php';


$titulo = 'Registro Productos';

include_once 'plantillas/documento-apertura.inc.php';
include_once 'plantillas/barra-navegacion-empleado.inc.php';

if (isset($_POST['enviar'])) {
    Conexion::abrir_conexion();
    $validador = new validador_registro_producto($_POST['nombre'], $_POST['provedor'], $_POST['cantidad'], 
            $_POST['precio'],$_POST['tipoProducto'],$_POST['fechacaducidad'],Conexion::obtener_conexion());
    
    if ($validador->registro_valido()) {
        $producto=new Producto('',$validador->obtener_nombre(),
                $validador->obtener_provedor(),
                $validador->obtener_cantidad(),
                $validador->obtener_precio(),
                $validador->obtener_tipo_producto(),
                $validador->obtener_fecha_caducidad(),
                '','');
        $producto_insertado=RepositorioProducto::insertar_producto(Conexion::obtener_conexion(),$producto);
        
        if ($producto_insertado) {
            //producto insertado redirigir
            Redireccion :: redirigir(RUTA_REGISTRO_PRODUCTO_CORRECTO);
        }
    }
    }
    Conexion::cerrar_conexion();
?>
<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Formulario Registro de Productos</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-3 text-center">
            
        </div>
        <div class="col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Introduce Los datos del producto
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <?php
                        if (isset($_POST['enviar'])) {
                            include_once 'plantillas/registro_producto_validado.inc.php';
                        } else {
                            include_once 'plantillas/registro_producto_vacio.inc.php';
                        }
                        ?>
                    </form>
                </div>
                <br>
                <a href="<?php echo RUTA_PAGINA_EMPLEADO ?>" class="btn btn-danger">
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