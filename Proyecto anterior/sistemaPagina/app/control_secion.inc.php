<?php

class controlsecion{
    
    public static function iniciar_secion($id_usuario,$nombre_usuario,$email) {
        if (session_id()==''){
            session_start();
        }
        $_SESSION['id_usuario']=$id_usuario;
        $_SESSION['nombre_usuario']=$nombre_usuario;
        $_SESSION['email_usuario']=$email;
    }
    
    public static function cerrar_secion() {
        if (session_id()==''){
            session_start();
        }
        if (isset($_SESSION['id_usuario'])){
            unset($_SESSION['id_usuario']);
        }
        
        if (isset($_SESSION['email_usuario'])){
            unset($_SESSION['email_usuario']);
        }
        
        if (isset($_SESSION['email_usuario'])){
            unset($_SESSION['email_usuario']);
        }
        session_destroy();
    }
    
    public static function secion_iniciada() {
        if (session_id()==''){
            session_start();
        }
        
        if (isset($_SESSION['id_usuario']) && isset($_SESSION['nombre_usuario']) && isset($_SESSION['email_usuario'])){
            return true;
        }else{
            return false;;
        }
    }
}
