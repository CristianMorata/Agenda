<?php
require_once __DIR__ . '/../Models/ContactosModel.php';
class ContactosController {
    private $contactosModel;

    public function __construct() {
        $this->contactosModel = new ContactosModel();
    }

    public function getContactos() {
        try {
            $this->contactosModel->getConection()->begin_transaction();

            $resultado = $this->contactosModel->getContactos();
            $contactos = [];

            while ($fila = mysqli_fetch_assoc($resultado)) {
                $contactos[$fila['id_contacto']] = $fila;
            }
            $this->contactosModel->getConection()->commit();
            // echo "Transaccion completada con exito. <br>";
            return $contactos;
        } catch(Exception $ex) {
            echo 'Error en la transaccion: ' . $ex->getMessage() . "<br> Iniciando rollback... <br>";
            $this->contactosModel->getConection()->rollBack();
            echo "Rollback completado con exito. <br>";
        }
    }

    public function comprobarAgenda() {

    }

    public function insertContact($nombre, $email, $tlf, $direccion) {
        try {
            $this->contactosModel->getConection()->begin_transaction();
            $resultado = $this->contactosModel->insertContact($nombre, $email, $tlf, $direccion);
            
            return null;
        } catch(Exception $ex) {
            echo "<b>ERROR: </b>" . $ex->getMessage() . "<br>";
        }
    }

    public function modifyContact() {

    }

    public function deleteContact() {
        
    }
}

?>