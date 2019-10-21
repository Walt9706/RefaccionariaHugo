<?php

class controlempleado {

    public static function iniciar_secion($id_empleado, $nombre_usuario,$nombre) {
        if (session_id() == '') {
            session_start();
        }
        $_SESSION['id_empleado'] = $id_empleado;
        $_SESSION['nombre']=$nombre;
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        
    }

    public static function cerrar_secion() {
        if (session_id() == '') {
            session_start();
        }
        if (isset($_SESSION['id_empleado'])) {
            unset($_SESSION['id_empleado']);
        }

        if (isset($_SESSION['nombre_usuario'])) {
            unset($_SESSION['nombre_usuario']);
        }
        
        if (isset($_SESSION['nombre'])) {
            unset($_SESSION['nombre']);
        }
        
        session_destroy();
    }

    public static function secion_iniciada() {
        if (session_id() == '') {
            session_start();
        }

        if (isset($_SESSION['id_empleado']) && isset($_SESSION['nombre_usuario']) && isset($_SESSION['nombre'])) {
            return true;
        } else {
            return false;
        }
    }

}
