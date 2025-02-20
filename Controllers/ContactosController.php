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
        $index = 1;

        while ($fila = mysqli_fetch_assoc($resultado)) {
            $contactos[$index] = $fila;
            $index++;
        }
        return $contactos;
    }

    public function getContactosById($id)
    {
        return $this->contactosModel->getContactosById($id);
    }

    public function mostrarContactos()
    {
        $contactos = $this->getContactos();

        foreach ($contactos as $contacto) {
            echo '<tr>';
            echo '<td> <input type="checkbox" name="contactos[' . $contacto['id_contacto'] . ']" value="' . $contacto['id_contacto'] . '"> </td>';
            foreach ($contacto as $key => $value) {
                echo '<td name"' . $key . '">' . $value . '</td>';
            }
            echo '</tr>';
        }
    }

    public function insertContact($nombre, $email, $tlf, $direccion)
    {
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

    public function modifyContact($id, $nombre, $email, $tlf, $direccion)
    {
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

    public function deleteContacts($id) {
        // foreach ($ids as $id) {
            $this->contactosModel->deleteContact($id);
        // }
    }
}
