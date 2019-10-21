<?php

class Conexion {

    private static $conexion;

    public static function abrir_conexion() {
        if (!isset(self::$conexion)) {
            try {
                include_once 'Config.inc.php';
                //self::$conexion = new PDO('mysql:host=db4free.net;dbname=sistematesh;charset=utf8','carlosggmx','carlos12');
                self::$conexion = new PDO('mysql:host=localhost;dbname=sistema;charset=utf8','root','');
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexion->exec("SET CHARACTER SET utf8");
                
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage() . "<br>";
                die();
            }
        }
    }

    public static function cerrar_conexion(){
        if (isset(self::$conexion)) {
            self::$conexion=null;
        }
    }
    
    public static function obtener_conexion(){
        return self::$conexion;
    }
    
}
