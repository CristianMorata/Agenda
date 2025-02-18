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

        self::$conexion->set_charset("utf8");
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    }
}

?>