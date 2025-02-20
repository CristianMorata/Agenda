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

    public function getContactosById($id) {
        $consulta = 'SELECT * FROM contactos WHERE id_contacto = ?';
        // $consulta = 'SELECT nombre, email, tlf, direccion FROM contactos WHERE id_contacto = ?';

        $stmt = $this->conexionBD->prepare($consulta);
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            $resultado = $stmt->get_result(); // Obtiene el resultado de la consulta
            return $resultado->fetch_assoc(); // Devuelve un array asociativo con los datos
        }

        return null;
    }

    public function insertContact($nombre, $email, $tlf, $direccion) {
        $consulta = 'INSERT INTO contactos (nombre, email, tlf, direccion) VALUES (?,?,?,?)';

        $stmt = $this->conexionBD->prepare($consulta);
        $stmt->bind_param('ssis', $nombre, $email, $tlf, $direccion);

        return $stmt->execute();
    }

    public function modifyContact($id, $nombre, $email, $tlf, $direccion) {
        $consulta = 'UPDATE contactos SET nombre = ?, email = ?, tlf = ?, direccion = ? WHERE id_contacto = ?';

        $stmt = $this->conexionBD->prepare($consulta);
        $stmt->bind_param('ssisi', $nombre, $email, $tlf, $direccion, $id);
    
        return $stmt->execute();
    }
    
    public function deleteContact($id) {
        $consulta = 'DELETE FROM contactos WHERE id_contacto = ?';
        
        $stmt = $this->conexionBD->prepare($consulta);
        $stmt->bind_param('i', $id);
    
        return $stmt->execute();
    }
}

?>