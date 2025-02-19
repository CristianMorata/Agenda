<?php

class ConexionModel {
    private static $dbHost = 'localhost';
    private static $dbUser = 'root';
    private static $dbPass = '';
    private static $dbName = 'agenda';
    private static $conexion = null;

    public static function conectar() {
        if (self::$conexion === null) {
            self::$conexion = new mysqli(self::$dbHost, self::$dbUser, self::$dbPass, self::$dbName);
            if (self::$conexion->connect_error) {
                die("Error de conexion: " . self::$conexion->connect_error);
            }
            return self::$conexion;
        }
    }

    public static function conectarPDO() {
        self::$conexion = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName . ";charset=utf8", self::$dbUser, self::$dbPass);
    }
}

?>