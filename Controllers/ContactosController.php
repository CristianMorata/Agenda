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

    public function mostrarContactos()
    {
        $contactos = [];
        for ($i = 1; $i < count($this->getContactos()) + 1; $i++) {
            $contactos[$i] = $this->getContactos()[$i];

            if ($contactos[$i] === $this->getContactos()[$i]) {
                echo '<tr>';
                echo '<td> <input type="checkbox" name="contactos[' . $contactos[$i]['id_contacto'] . ']" id="' . $contactos[$i]['id_contacto'] . '"> </td>';
                foreach ($contactos[$i] as $key => $value) {
                    echo '<td name"' . $key . '">' . $value . '</td>';
                }
                echo '</tr>';
            }
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

    public function deleteContact() {}
}
