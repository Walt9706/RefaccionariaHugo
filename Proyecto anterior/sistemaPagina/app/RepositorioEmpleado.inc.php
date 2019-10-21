<?php

class RepositorioEmpleado {

    public static function obtener_todos($conexion) {
        $empleados = array();
        include_once 'empleado.inc.php';
        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM empleados";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchALL();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $empleados[] = new Empleado(
                                $fila['id_empleado'], $fila['nombre'], $fila['apellido_pa'], $fila['apellido_ma'], $fila['nombre_usuario'], $fila['password'], $fila['fecha_registro']
                        );
                    }
                } else {
                    print 'No hay ningun resultado';
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $empleados;
    }

    public static function insertar_empleado($conexion, $empleado) {
        $empleado_insertado = false;
        if (isset($conexion)) {
            try {
                $nombretem = $empleado->obtener_nombre();
                $apellido_patem = $empleado->obtener_apellido_pa();
                $apellido_matem = $empleado->obtener_apellido_ma();
                $nombre_usuariotem = $empleado->obtener_nombre_usuario();
                $passwordtem = $empleado->obtener_password();
                $sql = "INSERT INTO empleados(nombre,apellido_pa,apellido_ma,nombre_usuario,password,fecha_registro) VALUES(:nombre,:apellido_pa,:apellido_ma,:nombre_usuario,:password,NOW())";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nombre', $nombretem, PDO::PARAM_STR);
                $sentencia->bindParam(':apellido_pa', $apellido_patem, PDO::PARAM_STR);
                $sentencia->bindParam(':apellido_ma', $apellido_matem, PDO::PARAM_STR);
                $sentencia->bindParam(':nombre_usuario', $nombre_usuariotem, PDO::PARAM_STR);
                $sentencia->bindParam(':password', $passwordtem, PDO::PARAM_STR);
                $empleado_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'Error' . $ex->getMessage();
            }
        }
        return $empleado_insertado;
    }

    public static function nombre_usuario_existe($conexion, $nombre_usuario) {
        $nombre_usuario_existe = true;
        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM empleados WHERE nombre_usuario= :nombre_usuario";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchALL();
                if (count($resultado)) {
                    $nombre_usuario_existe = true;
                } else {
                    $nombre_usuario_existe = false;
                }
            } catch (PDOException $ex) {
                print 'Error' . $ex->getMessage();
            }
        }
        return $nombre_usuario_existe;
    }

    public static function obtener_empleado_por_usuario($conexion, $nombre_usuario) {
        $empleado = null;
        include_once 'empleado.inc.php';
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM empleados WHERE nombre_usuario= :nombre_usuario";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $empleado = new Empleado(
                            $resultado['id_empleado'], $resultado['nombre'], $resultado['apellido_pa'], $resultado['apellido_ma'], $resultado['nombre_usuario'], $resultado['password'], $resultado['fecha_registro']);
                }
            } catch (PDOException $ex) {
                print 'Error' . $ex->getMessaege();
            }
        }
        return $empleado;
    }

}
