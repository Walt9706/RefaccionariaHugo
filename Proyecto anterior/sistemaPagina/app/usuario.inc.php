<?php

class Usuario {

    private $id_usuario;
    private $nombre;
    private $email;
    private $password;
    private $fecha_registro;
    private $activo;

    public function __construct($id_usuario, $nombre, $email,$password, $fecha_registro, $activo) {
        $this->id_usuario=$id_usuario;
        $this->nombre=$nombre;
        $this->email=$email;
        $this->password=$password;
        $this->fecha_registro=$fecha_registro;
        $this->activo=$activo;
    }

    public function obtener_id_usuario() {
        return $this->id_usuario;
    }
    public function obtener_nombre() {
        return $this->nombre;
    }
    public function obtener_email() {
        return $this->email;
    }
    public function obtener_password() {
        return $this->password;
    }
    public function obtener_fecha_registro() {
        return $this->fecha_registro;
    }
    public function esta_activo() {
        return $this->activo;
    }
    
    public function cambiar_nombre($nombre) {
        return $this->nombre=$nombre;
    }
    public function cambiar_email($email) {
        return $this->email=$email;
    }
    public function cambiar_password($password) {
        return $this->password=$password;
    }
    public function cambiar_activo($activo) {
        return $this->activo=$activo;
    }
}
