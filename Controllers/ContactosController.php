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

    public function insertarContacto($nombre, $email, $tlf, $direccion)
    {
        // Comprobar que ningun campo sea nulo
        if (!empty($nombre) && !empty($email) && !empty($tlf) && !empty($direccion)) {

            // Comprobar que el campo telefono sea un numero.
            if (ctype_digit($tlf)) {
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
            } else {
                echo "<p>El numero de telefono no es un numero valido. Por favor, inserte un valor valido.</p>";
            }
        } else {
            echo "<p>Uno de los campos está vacío, por favor relleno todos los datos.</p>";
        }
    }

    public function modificarContactos($contactos)
    {
        try {
            $this->contactosModel->getConection()->begin_transaction();

            foreach ($contactos as $datos) {
                $this->contactosModel->modifyContact($datos['id'], $datos['nombre'], $datos['email'], $datos['tlf'], $datos['direccion']);
            }

            $this->contactosModel->getConection()->commit();
            echo "Transaccion completada con exito. <br>";
        } catch (Exception $ex) {
            echo 'Error en la transaccion: ' . $ex->getMessage() . "<br> Iniciando rollback... <br>";
            $this->contactosModel->getConection()->rollBack();
            echo "Rollback completado con exito. <br>";
        }
    }

    public function borrarContactos($ids)
    {
        foreach ($ids as $id) {
            $this->contactosModel->deleteContact($id);
        }
    }
}
