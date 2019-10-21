<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioProducto.inc.php';
include_once 'app/Redireccion.inc.php';

Conexion::abrir_conexion();
$total_productos = RepositorioProducto::obtener_productos_administrador(Conexion::obtener_conexion());
Conexion::cerrar_conexion();

$titulo = 'Sistema Empleado';

include_once 'plantillas/documento-apertura.inc.php';
include_once 'plantillas/barra-navegacion-empleado.inc.php';
?>
<br>
<div class="container">
    <div class="jumbotron">
        <h1>Bienvenido, <?php echo ' ' . $_SESSION['nombre']; ?></h1>
        <p>Dedicandonos a vender productos, 100% de calidad</p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <span class="glyphicon glyphicon-apple" aria-hidden="true"></span> Lista de productos
                </div>
                <div class="panel-body text-center">
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Provedor</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Tipo de Producto</th>
                                <th>Fecha de Caducidad</th>
                                <th>Fecha de Registro</th>
                                <th>Fecha de Actualizacion</th>
                                <th>Modificar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($total_productos as $item):
                                ?>
                                <tr>
                                    <td><?php echo $item['id_producto']; ?></td>
                                    <td><?php echo $item['nombre']; ?></td>
                                    <td><?php echo $item['provedor']; ?></td>
                                    <td><?php echo $item['cantidad']; ?></td>
                                    <td>$<?php echo $item['precio']; ?></td>
                                    <td><?php echo $item['tipo_producto']; ?></td>
                                    <td><?php echo $item['fecha_caducidad']; ?></td>
                                    <td><?php echo $item['fecha_registro']; ?></td>
                                    <td><?php echo $item['fecha_actualizacion']; ?></td>
                                    <td>
                                        <a href="<?php echo RUTA_ACTUALIZAR_PRODUCTO ?>?id=<?php echo $item['id_producto']; ?>" 
                                           class="btn btn-default btn-primary">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo RUTA_ELIMINAR_PRODUCTO ?>?id=<?php echo $item['id_producto']; ?>" 
                                           class="btn btn-default btn-primary">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>