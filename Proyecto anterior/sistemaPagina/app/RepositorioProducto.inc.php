<?php

class RepositorioProducto {

    public function obtener_productos_administrador($conexion) {
        if (isset($conexion)) {
            try {

//                $sql = "SELECT p.id_producto,p.nombre,p.provedor,p.cantidad,p.precio,p.tipo_producto,p.fecha_caducidad,p.fecha_registro,p.fecha_actualizacion,e1.nombre as creador,e2.nombre as actualizador from productos as p "
//                        . "INNER JOIN empleados as e1 on p.id_empleado_cre=e1.id_empleado "
//                        . "INNER JOIN empleados as e2 on p.id_empleado_act=e2.id_empleado "
//                        . "GROUP BY p.id_producto";
                $sql="SELECT * FROM productos";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchALL();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $resultado;
    }

    public static function obtener_todos_productos($conexion) {
        include_once 'producto.inc.php';
        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM productos";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchALL();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $resultado;
    }

    public static function obtener_todos_id($conexion, $id_producto) {
        include_once 'producto.inc.php';
        $resultado = false;
        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM productos WHERE id_producto=:id_producto";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
                $sentencia->execute();
                $resultado = $sentencia->fetchALL();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $resultado;
    }

    public static function insertar_producto($conexion, $producto) {
        $producto_insertado = false;
        include_once 'producto.inc.php';
        include_once 'control_secion_empleado.inc.php';
        if (isset($conexion)) {
            try {
                $nombretem = $producto->obtener_nombre();
                $provedortem = $producto->obtener_provedor();
                $cantidadtem = $producto->obtener_cantidad();
                $preciotem = $producto->obtener_precio();
                $tipo_productotem = $producto->obtener_tipo_producto();
                $fecha_caducidadtem = $producto->obtener_fecha_caducidad();

                $sql = "INSERT INTO productos(nombre,provedor,cantidad,precio,tipo_producto,fecha_caducidad,fecha_registro,fecha_actualizacion) "
                        . "VALUES(:nombre,:provedor,:cantidad,:precio,:tipo_producto,:fecha_caducidad,NOW(),NOW())";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nombre', $nombretem, PDO::PARAM_STR);
                $sentencia->bindParam(':provedor', $provedortem, PDO::PARAM_STR);
                $sentencia->bindParam(':cantidad', $cantidadtem, PDO::PARAM_INT);
                $sentencia->bindParam(':precio', $preciotem, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo_producto', $tipo_productotem, PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_caducidad', $fecha_caducidadtem, PDO::PARAM_STR);

                $producto_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'Error' . $ex->getMessage();
            }
        }
        return $producto_insertado;
    }

    public static function nombre_existe($conexion, $nombre) {
        $nombre_existe = true;
        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM productos WHERE nombre= :nombre";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchALL();
                if (count($resultado)) {
                    $nombre_existe = true;
                } else {
                    $nombre_existe = false;
                }
            } catch (PDOException $ex) {
                print 'Error' . $ex->getMessage();
            }
        }
        return $nombre_existe;
    }

    public static function eliminar_producto($conexion, $id_producto) {
        $producto_eliminar = false;
        if (isset($conexion)) {
            try {

                $sql = "DELETE FROM productos WHERE id_producto=:id_producto";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam('id_producto', $id_producto, PDO::PARAM_INT);
                $producto_eliminar = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'Error' . $ex->getMessage();
            }
        }
        return $producto_eliminar;
    }

    public static function actualizar_producto($conexion, $producto) {
        $producto_actualizado = false;
        include_once 'producto.inc.php';

        if (isset($conexion)) {
            try {
                include_once 'control_secion_empleado.inc.php';
                $id_protem = $producto->obtener_id_producto();
                $nombretem = $producto->obtener_nombre();
                $provedortem = $producto->obtener_provedor();
                $cantidadtem = $producto->obtener_cantidad();
                $preciotem = $producto->obtener_precio();
                $tipo_productotem = $producto->obtener_tipo_producto();
                $fecha_caducidadtem = $producto->obtener_fecha_caducidad();

                $sql = "UPDATE productos SET nombre=:nombre, provedor=:provedor, cantidad=:cantidad, precio=:precio, tipo_producto=:tipo_producto, "
                        . "fecha_caducidad=:fecha_caducidad, fecha_actualizacion=NOW() WHERE id_producto=:id_producto";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_producto', $id_protem, PDO::PARAM_INT);
                $sentencia->bindParam(':nombre', $nombretem, PDO::PARAM_STR);
                $sentencia->bindParam(':provedor', $provedortem, PDO::PARAM_STR);
                $sentencia->bindParam(':cantidad', $cantidadtem, PDO::PARAM_INT);
                $sentencia->bindParam(':precio', $preciotem, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo_producto', $tipo_productotem, PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_caducidad', $fecha_caducidadtem, PDO::PARAM_STR);

                $producto_actualizado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'Error' . $ex->getMessage();
            }
        }
        return $producto_actualizado;
    }

    public static function obtener_buscados($conexion, $nombre) {
        include_once 'producto.inc.php';
        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM productos WHERE nombre LIKE :nombre or provedor LIKE :nombre or tipo_producto LIKE :nombre";
                $nombrepa = "%" . $nombre . "%";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nombre', $nombrepa, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchALL();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $resultado;
    }

    public function obtener_buscados_administrador($conexion, $nombre) {
        include_once 'producto.inc.php';
        if (isset($conexion)) {
            try {

               $sql = "SELECT * FROM productos WHERE nombre LIKE :nombre or provedor LIKE :nombre or tipo_producto LIKE :nombre";
//                $sql="SELECT p.id_producto,p.nombre,p.provedor,p.cantidad,p.precio,p.tipo_producto,p.fecha_caducidad,p.fecha_registro,p.fecha_actualizacion,e1.nombre as creador,e2.nombre as actualizador from productos as p "
//                        . "INNER JOIN empleados as e1 on p.id_empleado_cre=e1.id_empleado "
//                        . "INNER JOIN empleados as e2 on p.id_empleado_act=e2.id_empleado "
//                        . "WHERE e1.nombre like :nombre or e2.nombre like :nombre or p.nombre LIKE :nombre or p.provedor LIKE :nombre or p.tipo_producto LIKE :nombre";
                $nombrepa = "%" . $nombre . "%";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nombre', $nombrepa, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchALL();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $resultado;
    }

}
