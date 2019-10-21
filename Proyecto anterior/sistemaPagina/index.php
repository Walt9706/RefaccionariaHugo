<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioProducto.inc.php';

Conexion::abrir_conexion();
$total_productos = RepositorioProducto::obtener_todos_productos(Conexion::obtener_conexion());
Conexion::cerrar_conexion();

$titulo = 'Inicio Systema';

include_once 'plantillas/documento-apertura.inc.php';
include_once 'plantillas/barra-navegacion.inc.php';
?>
<br>
<?php if (!controlsecion::secion_iniciada()) { ?>
    <div class="container">
        <div class="jumbotron">
            <h1>Bienvenido</h1>
            <p>Dedicandonos a vender productos, 100% de calidad</p>
        </div>
    </div>
<?php } else { ?>
    <div class="container">
        <div class="jumbotron">
            <h1>Bienvenido, <br>Es Hora de Comprar "<?php echo $_SESSION['nombre_usuario']; ?>"</h1>
            <p>Dedicandonos a vender productos, 100% de calidad</p>
        </div>
    </div>
<?php } ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-apple" aria-hidden="true"></span> Productos
                </div>
                <div class="panel-body text-center">
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th hidden>#</th>
                                <th style="text-align: center">Nombre</th>
                                <th style="text-align: center">Provedor</th>
                                <th hidden>Cantidad</th>
                                <th style="text-align: center">Precio</th>
                                <th style="text-align: center">Tipo de Producto</th>
                                <th hidden>Fecha de Caducidad</th>
                                <th hidden>Fecha de Registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($total_productos as $item):
                                ?>
                                <tr>
                                    <td hidden><?php echo $item['id_producto']; ?></td>
                                    <td><?php echo $item['nombre']; ?></td>
                                    <td><?php echo $item['provedor']; ?></td>
                                    <td hidden><?php echo $item['cantidad']; ?></td>
                                    <td>$<?php echo $item['precio']; ?></td>
                                    <td><?php echo $item['tipo_producto']; ?></td>
                                    <td hidden><?php echo $item['fecha_caducidad']; ?></td>
                                    <td hidden><?php echo $item['fecha_registro']; ?></td>
                                    <?php if (controlsecion::secion_iniciada()) { ?>
                                        <td>
                                            <a href="<?php echo RUTA_CARIITO_COMPRAS ?>?id=<?php echo $item['id_producto']; ?>" 
                                               class="btn btn-default btn-primary">
                                                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                            </a>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php if (!controlsecion::secion_iniciada()) { ?>
                        <h2>Para comprar debes de iniciar secion</h2>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>