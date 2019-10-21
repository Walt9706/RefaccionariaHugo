<?php

include_once 'Conexion.inc.php';
include_once 'RepositorioProducto.inc.php';
include_once 'Redireccion.inc.php';

Conexion::abrir_conexion();
$buscar = RepositorioProducto::obtener_productos_administrador(Conexion::obtener_conexion());
Conexion::cerrar_conexion();
$salida = "";


if (isset($_POST['consulta'])) {
    $producto = $_POST['consulta'];
    Conexion::abrir_conexion();
    $buscar = RepositorioProducto::obtener_buscados_administrador(Conexion::obtener_conexion(), $producto);
    Conexion::cerrar_conexion();
}
if (count($buscar)) {
    $salida .= "<table class='table table-striped table-responsive'>
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
                        <tbody>";
    foreach ($buscar as $item):
        $salida .= "<tr>
                                        <td>".$item['id_producto']."</td>
                                        <td>".$item['nombre']."</td>
                                        <td>".$item['provedor']."</td>
                                        <td>".$item['cantidad']."</td>
                                        <td>$".$item['precio']."</td>
                                        <td>".$item['tipo_producto']."</td>
                                        <td>".$item['fecha_caducidad']."</td>
                                        <td>".$item['fecha_registro']."</td>
                                        <td>".$item['fecha_actualizacion']."</td>
                                        <td>
                                            <a href='".RUTA_ACTUALIZAR_PRODUCTO."?id=".$item['id_producto']."' 
                                               class='btn btn-default btn-primary'>
                                                <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
                                            </a>
                                        </td>
                                        <td>
                                            <a href='".RUTA_ELIMINAR_PRODUCTO."?id=".$item['id_producto']."' 
                                               class='btn btn-default btn-primary'>
                                                <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
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
