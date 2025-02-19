<?php
require_once __DIR__ . '/ConexionModel.php';

class ContactosModel {
    private $conexionBD;

    public function __construct() {
        $this->conexionBD = ConexionModel::conectar();
    }

    public function getConection() {
        return $this->conexionBD;
    }

    // Metodos de base de datos
    public function getContactos() {
        $consulta = 'SELECT * FROM contactos';

        return mysqli_query($this->conexionBD, $consulta);
    }

    public function insertContact($nombre, $email, $tlf, $direccion) {
        $consulta = 'INSERT INTO contactos (nombre, email, tlf, direccion) VALUES (?,?,?,?)';

        $stmt = $this->conexionBD->prepare($consulta);
        $stmt->bind_param('ssis', $nombre, $email, $tlf, $direccion);

        return $stmt->execute();
    }

    public function modifyContact($id, $nombre, $email, $tlf, $direccion) {

    }

    public function deleteContact() {
        
    }
}

?>