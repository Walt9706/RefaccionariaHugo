<?php

include_once 'RepositorioEmpleado.inc.php';

class validarLoginEmpleado {

    private $empleado;
    private $error;

    public function __construct($nombre_usuario, $clave, $conexion) {
        $this->error = "";

        if (!$this->variable_iniciada($nombre_usuario) || !$this->variable_iniciada($clave)) {
            $this->empleado = null;
            $this->error = "Debes ingresar tu usuario y contraseña";
        } else {
            $this->empleado = RepositorioEmpleado::obtener_empleado_por_usuario($conexion, $nombre_usuario);
            if (is_null($this->empleado) || $this->empleado->obtener_password()!=$clave) {
                $this->error = "Datos incorrectos";
            }
        }
    }

    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    public function obtener_empleado() {
        return $this->empleado;
    }

    public function obtener_error() {
        return $this->error;
    }

    public function mostrar_error() {
        if ($this->error !== '') {
            echo "<br><div class='alert alert-danger' role='alert'>";
            echo $this->error;
            echo "</div><br>";
        }
    }

}
