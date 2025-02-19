<?php
require_once __DIR__ . '/../Models/ContactosModel.php';
class ContactosController
{
    private $contactosModel;

    public function __construct()
    {
        $this->contactosModel = new ContactosModel();
    }

    public function getContactos()
    {
        $resultado = $this->contactosModel->getContactos();
        $contactos = [];

        while ($fila = mysqli_fetch_assoc($resultado)) {
            $contactos[$fila['id_contacto']] = $fila;
        }
        return $contactos;
    }

    public function insertContact($nombre, $email, $tlf, $direccion) {
        try {
            $this->contactosModel->getConection()->begin_transaction();

            $this->contactosModel->insertContact($nombre, $email, $tlf, $direccion);

            $this->contactosModel->getConection()->commit();
            echo "Transaccion completada con exito. <br>";
        } catch (Exception $ex) {
            echo 'Error en la transaccion: ' . $ex->getMessage() . "<br> Iniciando rollback... <br>";
            $this->contactosModel->getConection()->rollBack();
            echo "Rollback completado con exito. <br>";
        }
    }

    public function modifyContact($id, $nombre, $email, $tlf, $direccion) {
        try {
            $this->contactosModel->getConection()->begin_transaction();

            $this->contactosModel->modifyContact($id, $nombre, $email, $tlf, $direccion);

            $this->contactosModel->getConection()->commit();
            echo "Transaccion completada con exito. <br>";
        } catch (Exception $ex) {
            echo 'Error en la transaccion: ' . $ex->getMessage() . "<br> Iniciando rollback... <br>";
            $this->contactosModel->getConection()->rollBack();
            echo "Rollback completado con exito. <br>";
        }
    }

    public function deleteContact() {}
}
