<?php

include_once 'RepositorioProducto.inc.php';

class validador_producto_actualizado {

    private $aviso_inicio;
    private $avios_cierre;
    private $nombre;
    private $provedor;
    private $cantidad;
    private $precio;
    private $tipo_producto;
    private $fecha_caducidad;
    private $error_nombre;
    private $error_provedor;
    private $error_cantidad;
    private $error_precio;
    private $error_tipo_producto;
    private $error_fecha_caducidad;

    public function __construct($nombre, $provedor, $cantidad, $precio, $tipo_producto, $fecha_caducidad, $conexion) {
        $this->aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
        $this->avios_cierre = "</div>";


        $this->nombre = '';
        $this->provedor = '';
        $this->cantidad = '';
        $this->precio = '';
        $this->tipo_producto = '';
        $this->fecha_caducidad = '';


        $this->error_nombre = $this->validar_nombre($conexion, $nombre);
        $this->error_provedor = $this->validar_provedor($conexion, $provedor);
        $this->error_cantidad = $this->validar_cantidad($conexion, $cantidad);
        $this->error_precio = $this->validar_precio($conexion, $precio);
        $this->error_tipo_producto = $this->validar_tipo_producto($conexion, $tipo_producto);
        $this->error_fecha_caducidad = $this->validar_fecha_caducidad($conexion, $fecha_caducidad);
    }

    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    private function validar_nombre($conexion, $nombre) {
        if (!$this->variable_iniciada($nombre)) {
            return "Debes escribir un producto";
        } else {
            $this->nombre = $nombre;
        }
        if (strlen($nombre) < 3) {
            return "El nombre debe de ser mayor que 3 caracteres";
        }
        if (strlen($nombre) > 15) {
            return "el nombre no puede ocupar mas de 15 caracteres";
        }
        return "";
    }

    private function validar_provedor($conexion, $provedor) {
        if (!$this->variable_iniciada($provedor)) {
            return "Debes escribir un provedor";
        } else {
            $this->provedor = $provedor;
        }
        if (strlen($provedor) < 3) {
            return "El provedor debe de ser mayor que 3 caracteres";
        }
        if (strlen($provedor) > 20) {
            return "El provedor no puede ocupar mas de 20 caracteres";
        }
        return "";
    }

    private function validar_cantidad($conexion, $cantidad) {
        if (!$this->variable_iniciada($cantidad)) {
            return "Debes escribir una cantidad";
        } else {
            $this->cantidad = $cantidad;
        }
        if (!is_numeric($cantidad)) {
            return "Esta no es una cantidad valida";
        }
        if ($cantidad <= 0) {
            return "Por favor ingresa una cantidada mayor a 0";
        }
        if ($cantidad >= 999) {
            return "Ingresa una cantidad menor a 999.";
        }
        return "";
    }

    private function validar_precio($conexion, $precio) {
        if (!$this->variable_iniciada($precio)) {
            return "Debes escribir un precio";
        } else {
            $this->precio = $precio;
        }
        if (!is_numeric($precio)) {
            return "Esta no es una catidad vailida";
        }
        if ($precio <= 0) {
            return "Por favor ingresa un precio valido, (mayor a 0).";
        }
        return "";
    }

    private function validar_tipo_producto($conexion, $tipo_producto) {
        if (!$this->variable_iniciada($tipo_producto)) {
            return "Debes ingresar un tipo de producto";
        } else {
            $this->tipo_producto = $tipo_producto;
        }
        if (strlen($tipo_producto) < 3) {
            return "El tipo de producto no es valido";
        }
        return "";
    }

    private function validar_fecha_caducidad($conexion, $fecha_caducidad) {
        if (!$this->variable_iniciada($fecha_caducidad)) {
            return "Debes ingresar un fecha de caducidad";
        } else {
            $this->fecha_caducidad = $fecha_caducidad;
        }
        $valores = explode('/', $fecha_caducidad);
        if (!count($valores) == 3 && !checkdate($valores[1], $valores[0], $valores[2])) {
            return "Esta fecha de caducidad no es valida";
        }
        return "";
    }

    public function obtener_nombre() {
        return $this->nombre;
    }

    public function obtener_provedor() {
        return $this->provedor;
    }

    public function obtener_cantidad() {
        return $this->cantidad;
    }

    public function obtener_precio() {
        return $this->precio;
    }

    public function obtener_tipo_producto() {
        return $this->tipo_producto;
    }

    public function obtener_fecha_caducidad() {
        return $this->fecha_caducidad;
    }

    public function obtener_error_nombre() {
        return $this->error_nombre;
    }

    public function obtener_error_provedor() {
        return $this->error_provedor;
    }

    public function obtener_error_cantidad() {
        return $this->error_cantidad;
    }

    public function obtener_error_precio() {
        return $this->error_precio;
    }

    public function obtener_error_tipo_producto() {
        return $this->error_tipo_producto;
    }

    public function obtener_error_fecha_caducidad() {
        return $this->error_fecha_caducidad;
    }

    //Mostrar producto y errores

    public function mostrar_nombre() {
        if ($this->nombre !== "") {
            echo 'value="' . $this->nombre . '"';
        }
    }

    public function mostrar_error_nombre() {
        if ($this->error_nombre !== "") {
            echo $this->aviso_inicio . $this->error_nombre . $this->avios_cierre;
        }
    }

    public function mostrar_provedor() {
        if ($this->provedor !== "") {
            echo 'value="' . $this->provedor . '"';
        }
    }

    public function mostrar_error_provedor() {
        if ($this->error_provedor !== "") {
            echo $this->aviso_inicio . $this->error_provedor . $this->avios_cierre;
        }
    }

    public function mostrar_error_catidad() {
        if ($this->error_cantidad !== "") {
            echo $this->aviso_inicio . $this->error_cantidad . $this->avios_cierre;
        }
    }

    public function mostrar_cantidad() {
        if ($this->cantidad !== "") {
            echo 'value="' . $this->cantidad . '"';
        }
    }

    public function mostrar_error_precio() {
        if ($this->error_precio !== "") {
            echo $this->aviso_inicio . $this->error_precio . $this->avios_cierre;
        }
    }

    public function mostrar_precio() {
        if ($this->precio !== "") {
            echo 'value="' . $this->precio . '"';
        }
    }

    public function mostrar_tipo_producto() {
        if ($this->tipo_producto !== "") {
            echo $this->tipo_producto;
        }
    }

    public function mostrar_error_tipo_producto() {
        if ($this->error_tipo_producto !== "") {
            echo $this->aviso_inicio . $this->error_tipo_producto . $this->avios_cierre;
        }
    }

    public function mostrar_error_fecha_caducidad() {
        if ($this->error_fecha_caducidad !== "") {
            echo $this->aviso_inicio . $this->error_fecha_caducidad . $this->avios_cierre;
        }
    }

    public function mostrar_fecha_caducidad() {
        if ($this->fecha_caducidad !== "") {
            echo 'value="' . $this->fecha_caducidad . '"';
        }
    }

    // registro valido
    public function registro_valido_producto() {
        if ($this->error_nombre === "" && $this->error_provedor === "" && $this->error_cantidad === "" && $this->error_precio === "" && $this->error_tipo_producto === "" && $this->error_fecha_caducidad === "") {
            return true;
        } else {
            return false;
        }
    }

}
