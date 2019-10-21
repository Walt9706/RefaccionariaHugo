<?php

class Producto {

    private $id_producto;
    private $nombre;
    private $provedor;
    private $cantidad;
    private $precio;
    private $tipo_producto;
    private $fecha_caducidad;
    private $fecha_registro;
    private $fecha_actualizacion;
            
    function __construct($id_producto,$nombre,$provedor,$cantidad,$precio,$tipo_producto,$fecha_caducidad,$fecha_registro,$fecha_actualizacion) {
        $this->id_producto=$id_producto;
        $this->nombre=$nombre;
        $this->provedor=$provedor;
        $this->cantidad=$cantidad;
        $this->precio=$precio;
        $this->tipo_producto=$tipo_producto;
        $this->fecha_caducidad=$fecha_caducidad;
        $this->fecha_registro=$fecha_registro;
        $this->fecha_actualizacion=$fecha_actualizacion;
        
    }
    
    public function obtener_id_producto() {
        return $this->id_producto;
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
    
    public function obtener_fecha_registro() {
        return $this->fecha_registro;
    }
    
    public function obtener_fecha_actualizacion(){
        return $this->fecha_actualizacion;
    }


    //cambiar 
    public function cambiar_id($id_producto) {
        return $this->id_producto;
    }
    public function cambiar_nombre($nombre) {
        return $this->nombre=$nombre;
    }
    
    public function cambiar_provedor($provedor) {
        return $this->provedor=$provedor;
    }
    
    public function cambiar_cantidad($cantidad) {
        return $this->cantidad=$cantidad;
    }
    
    public function cambiar_precio($precio) {
        return $this->precio=$precio;
    }
    
    public function cambiar_tipo_producto($tipo_producto) {
        return $this->tipo_producto=$tipo_producto;
    }
    
    public function cambiar_fecha_caducidad($fecha_caducidad) {
        return $this->fecha_caducidad=$fecha_caducidad;
    }
    
    public function functionName($fecha_actualizacion) {
        return $this->fecha_actualizacion=$fecha_actualizacion;
    }
}
