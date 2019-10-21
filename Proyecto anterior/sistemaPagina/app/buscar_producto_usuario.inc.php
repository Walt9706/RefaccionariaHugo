<?php

include_once 'Conexion.inc.php';
include_once 'RepositorioProducto.inc.php';
include_once 'Redireccion.inc.php';

Conexion::abrir_conexion();
$buscar = RepositorioProducto::obtener_todos_productos(Conexion::obtener_conexion());
Conexion::cerrar_conexion();
$salida = "";


if (isset($_POST['consulta'])) {
    $producto = $_POST['consulta'];
    Conexion::abrir_conexion();
    $buscar = RepositorioProducto::obtener_buscados(Conexion::obtener_conexion(), $producto);
    Conexion::cerrar_conexion();
}
if (count($buscar)) {
    $salida .= "<table class='table table-striped table-responsive'>
                        <thead>
                            <tr>
                                <th hidden>#</th>
                                <th style='text-align: center'>Nombre</th>
                                <th style='text-align: center'>Provedor</th>
                                <th hidden>Cantidad</th>
                                <th style='text-align: center'>Precio</th>
                                <th style='text-align: center'>Tipo de Producto</th>
                                <th hidden>Fecha de Caducidad</th>
                                <th hidden>Fecha de Registro</th>
                            </tr>
                        </thead>
                        <tbody>";
    foreach ($buscar as $item):
        $salida .= "<tr>
                                        <td hidden>".$item['id_producto']."</td>
                                        <td>".$item['nombre']."</td>
                                        <td>".$item['provedor']."</td>
                                        <td hidden>".$item['cantidad']."</td>
                                        <td>$".$item['precio']."</td>
                                        <td>".$item['tipo_producto']."</td>
                                        <td hidden>".$item['fecha_caducidad']."</td>
                                        <td hidden>".$item['fecha_registro']."</td>
                                        <td>
                                            <a href='".RUTA_CARIITO_COMPRAS."?id=".$item['id_producto']."' 
                                                class='btn btn-default btn-primary'>
                                                <span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span>
                                            </a>
                                        </td>
                                    </tr>";
    endforeach;

    $salida .= "</tbody>
            </table>";
}else {
    $salida .= "NO HAY DATOS";
}

echo $salida;

