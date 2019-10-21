<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioProducto.inc.php';
include_once 'app/Redireccion.inc.php';

$titulo = 'Inicio Systema';

include_once 'plantillas/documento-apertura.inc.php';
include_once 'plantillas/barra-navegacion.inc.php';
if (isset($_SESSION['carrito'])) {
    if (isset($_GET['id'])) {
        $arreglo = $_SESSION['carrito'];
        $encontro = false;
        $numero = 0;
        for ($i = 0; $i < count($arreglo); $i++) {
            if ($arreglo[$i]['Id'] == $_GET['id']) {
                $encontro = true;
                $numero = $i;
            }
        }
        if ($encontro == true) {
            $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad'] + 1;
            $_SESSION['carrito'] = $arreglo;
        } else {
            $id_producto = $_GET['id'];
            $nombre = "";
            $provedor = "";
            $cantidad = "";
            $precio = "";
            $tipo_producto = "";
            $fecha_caducidad = "";
            $fecha_registro = "";
            Conexion::abrir_conexion();
            $total_productos = RepositorioProducto::obtener_todos_id(Conexion::obtener_conexion(), $id_producto);
            Conexion::cerrar_conexion();
            foreach ($total_productos as $f):
                $nombre = $f['nombre'];
                $provedor = $f['provedor'];
                $cantidad = $f['cantidad'];
                $precio = $f['precio'];
                $tipo_producto = $f['tipo_producto'];
                $fecha_caducidad = $f['fecha_caducidad'];
                $fecha_registro = $f['fecha_registro'];
            endforeach;
            $datosnuevos = array('Id' => $_GET['id'],
                'Nombre' => $nombre,
                'Provedor' => $provedor,
                'Cantidad1' => $cantidad,
                'Precio' => $precio,
                'Tipo_producto' => $tipo_producto,
                'Fecha_cad' => $fecha_caducidad,
                'Fecha_re' => $fecha_registro,
                'Cantidad' => 1);
            array_push($arreglo, $datosnuevos);
            $_SESSION['carrito'] = $arreglo;
        }
    }
} else {
    if (isset($_GET['id'])) {
        $id_producto = $_GET['id'];
        $nombre = "";
        $provedor = "";
        $cantidad = "";
        $precio = "";
        $tipo_producto = "";
        $fecha_caducidad = "";
        $fecha_registro = "";
        Conexion::abrir_conexion();
        $total_productos = RepositorioProducto::obtener_todos_id(Conexion::obtener_conexion(), $id_producto);
        Conexion::cerrar_conexion();
        foreach ($total_productos as $f):
            $nombre = $f['nombre'];
            $provedor = $f['provedor'];
            $cantidad = $f['cantidad'];
            $precio = $f['precio'];
            $tipo_producto = $f['tipo_producto'];
            $fecha_caducidad = $f['fecha_caducidad'];
            $fecha_registro = $f['fecha_registro'];
        endforeach;
        $arreglo[] = array('Id' => $_GET['id'],
            'Nombre' => $nombre,
            'Provedor' => $provedor,
            'Cantidad1' => $cantidad,
            'Precio' => $precio,
            'Tipo_producto' => $tipo_producto,
            'Fecha_cad' => $fecha_caducidad,
            'Fecha_re' => $fecha_registro,
            'Cantidad' => 1);
        $_SESSION['carrito'] = $arreglo;
    }
}

if (isset($_POST['comprar'])) {
    //unset($_SESSION['carrito']);
    Redireccion :: redirigir(RUTA_COMPRA_EXITOSA);
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-12">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Carrito de Productos
                </div>
                <div class="panel-body text-center">
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th style="text-align: center">Nombre</th>
                                <th style="text-align: center">Precio</th>
                                <th style="text-align: center">Cantidad</th>
                                <th style="text-align: center">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="tablaproducto">
                            <?php
                            $total = 0;
                            if (isset($_SESSION['carrito'])) {
                                $datos = $_SESSION['carrito'];
                                for ($i = 0; $i < count($datos); $i++) {
                                    ?>
                                    <tr>
                                        <td><?php echo $datos[$i]['Nombre']; ?></td>
                                        <td>$<?php echo $datos[$i]['Precio']; ?></td>
                                        <td><input type="number" value="<?php echo $datos[$i]['Cantidad']; ?>"
                                                   data-precio="<?php echo $datos[$i]['Precio']; ?>"
                                                   data-id="<?php echo $datos[$i]['Id']; ?>"
                                                   class="catidad"></td>
                                        <td class="subtotal">$<?php echo $datos[$i]['Cantidad'] * $datos[$i]['Precio']; ?></td>
                                        <td>
                                            <a href="#" class="btn btn-default btn-primary eliminar" 
                                               data-id="<?php echo $datos[$i]['Id']; ?>">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </a>
                                        </td>
                                        <?php
                                        $total = ($datos[$i]['Cantidad'] * $datos[$i]['Precio']) + $total;
                                    }
                                    ?>
                                </tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td id="total"><?php echo 'Total: $' . $total . ''; ?></td>
                            <td></td>
                            <?php
                        } else {
                            echo 'El carrito de compras esta vacio' . '<br>';
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                    if ($total != 0) {
                        ?>
                        <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <button type="submit" class="btn btn-default btn-success" name="comprar">
                                <span class="glyphicon glyphicon-check" aria-hidden="true"></span> Comprar
                            </button>
                        </form>
                        <br>
                        <?php
                    }
                    ?>

                    <a href="<?php echo SERVIDOR ?>" 
                       class="btn btn-default btn-primary">
                        <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> Regresar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>  
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/carritos.js"></script>
<script src="js/eliminarcar.js"></script>
</body>
</html>