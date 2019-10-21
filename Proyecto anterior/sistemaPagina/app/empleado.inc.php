<?php

class Empleado {

    private $id_empleado;
    private $nombre;
    private $apellido_pa;
    private $apellido_ma;
    private $nombre_usuario;
    private $password;
    private $fecha_registro;
    
    public function __construct($id_empleado,$nombre,$apellido_pa,$apellido_ma,$nombre_usuario,$password,$fecha_registro) {
        $this->id_empleado=$id_empleado;
        $this->nombre=$nombre;
        $this->apellido_pa=$apellido_pa;
        $this->apellido_ma=$apellido_ma;
        $this->nombre_usuario=$nombre_usuario;
        $this->password=$password;
        $this->fecha_registro=$fecha_registro;
        
    }
    
    public function obtener_id_empleado() {
        return $this->id_empleado;
    }
    
    public function obtener_nombre() {
        return $this->nombre;
    }
    
    public function obtener_apellido_pa() {
        return $this->apellido_pa;
    }
    
    public function obtener_apellido_ma() {
        return $this->apellido_ma;
    }
    
    public function obtener_nombre_usuario() {
        return $this->nombre_usuario;
    }
    
    public function obtener_password() {
        return $this->password;
    }
    
    public function obtener_fecha_registro() {
        return $this->fecha_registro;
    }
    
    
    public function cambiar_nombre($nombre) {
        return $this->nombre=$nombre;
    }
    
    public function cambiar_apellido_pa($apellido_pa) {
        return $this->apellido_pa=$apellido_pa;
    }
    
    public function cambiar_apellido_ma($apellido_ma) {
        return $this->apellido_ma=$apellido_ma;
    }
    
    public function cambiar_nombre_usuario($nombre_usuario) {
        return $this->nombre_usuario=$nombre_usuario;
    }
    
    public function cambiar_password($password) {
        return $this->password=$password;
    }
}
