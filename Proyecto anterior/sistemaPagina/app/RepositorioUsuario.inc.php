<?php

class RepositorioUsuario {

    public static function obtener_todos($conexion) {
        $usuarios = array();
        include_once 'usuario.inc.php';
        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM usuarios";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchALL();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $usuarios[] = new Usuario(
                                $fila['id_usuario'], $fila['nombre'], $fila['email'], $fila['password'], $fila['fecha_registro'], $fila['activo']
                        );
                    }
                } else {
                    print 'No hay ningun resultado';
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $usuarios;
    }

    public static function obtener_num_usuarios($conexion) {
        $total_usuarios = null;

        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) AS total FROM usuarios";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                $total_usuarios = $resultado['total'];
            } catch (Exception $exc) {
                print 'ERROR' . $exc->getMessage();
            }
        }
        return $total_usuarios;
    }

    public static function insertar_usuario($conexion, $usuario) {
        $usuario_insertado = false;
        if (isset($conexion)) {
            try {
                $nombretem = $usuario->obtener_nombre();
                $emailtem = $usuario->obtener_email();
                $passwordtem = $usuario->obtener_password();
                $sql = "INSERT INTO usuarios(nombre,email,password,fecha_registro,activo) VALUES(:nombre,:email,:password,NOW(),0)";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nombre', $nombretem, PDO::PARAM_STR);
                $sentencia->bindParam(':email', $emailtem, PDO::PARAM_STR);
                $sentencia->bindParam(':password', $passwordtem, PDO::PARAM_STR);

                $usuario_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'Error' . $ex->getMessage();
            }
        }
        return $usuario_insertado;
    }

    public static function nombre_existe($conexion, $nombre) {
        $nombre_existe = true;
        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM usuarios WHERE nombre= :nombre";
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

    public static function email_existe($conexion, $email) {
        $email_existe = true;
        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM usuarios WHERE email= :email";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchALL();
                if (count($resultado)) {
                    $email_existe = true;
                } else {
                    $email_existe = false;
                }
            } catch (PDOException $ex) {
                print 'Error' . $ex->getMessage();
            }
        }
        return $email_existe;
    }

    public static function obtener_usuario_por_email($conexion, $email) {
        $usuario = null;
        include_once 'usuario.inc.php';
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM usuarios WHERE email= :email";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $usuario = new Usuario($resultado['id_usuario'], $resultado['nombre'], $resultado['email'], $resultado['password'], $resultado['fecha_registro'], $resultado['activo']);
                }
            } catch (PDOException $ex) {
                print 'Error' . $ex->getMessaege();
            }
        }
        return $usuario;
    }

}
