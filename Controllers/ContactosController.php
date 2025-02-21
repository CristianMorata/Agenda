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

                    $this->mostrarMensajeExito("Insercción de contactos completada con exito.");
                } catch (Exception $ex) {
                    $this->mostrarMensajeError('Error en la transaccion de inserccion: Iniciando rollback...');
                    $this->contactosModel->getConection()->rollBack();
                    $this->mostrarMensajeError('Rollback completado con exito.');
                }
            } else {
                $this->mostrarMensajeError("El numero de telefono no es un numero valido. Por favor, inserte un valor valido.");
            }
        } else {
            $this->mostrarMensajeError("Uno de los campos está vacío, por favor relleno todos los datos.");
        }
    }

    public function modificarContactos($contactos, $id)
    {
        // Comprobar que el array recibido no sea nulo
        if (!empty($contactos)) {
            foreach ($contactos as $datos) {
                // Comprobar que ningun campo sea nulo

                if (!empty($datos['nombre']) && !empty($datos['email']) && !empty($datos['tlf']) && !empty($datos['direccion'])) {

                    // Comprobar que el campo telefono sea un numero.
                    if (ctype_digit($datos['tlf'])) {
                        try {
                            $this->contactosModel->getConection()->begin_transaction();

                            $this->contactosModel->modifyContact($datos['id'], $datos['nombre'], $datos['email'], $datos['tlf'], $datos['direccion']);

                            $this->contactosModel->getConection()->commit();

                            $this->mostrarMensajeExito("Modificación de contactos completada con exito.");
                        } catch (Exception $ex) {
                            $this->mostrarMensajeError('Error en la transaccion de modificación: Iniciando rollback...');
                            $this->contactosModel->getConection()->rollBack();
                            $this->mostrarMensajeError('Rollback completado con exito.');
                        }
                    } else {
                        $this->mostrarMensajeError("El numero de telefono no es un numero valido. Por favor, inserte un valor valido.");
                    }
                } else {
                    $this->mostrarMensajeError("Uno de los campos está vacío, por favor relleno todos los datos.");
                }
            }
        }
    }

    public function borrarContactos($ids)
    {
        foreach ($ids as $id) {
            $this->contactosModel->deleteContact($id);
        }

        $this->mostrarMensajeExito("Contactos eliminados con exito.");
    }

    // Funciones de funcionalidad extras

    public function mostrarMensajeError($mensaje)
    {
        echo '<p id="mensaje" class="mensajeError" style="transition: opacity 1s;">' . $mensaje . '</p>
                    <script>
                        setTimeout(function() {
                            document.getElementById("mensaje").style.opacity = "0";
                            setTimeout(function() {
                                document.getElementById("mensaje").style.display = "none";
                            }, 1000);
                        }, 3000);
                    </script>';
    }

    public function mostrarMensajeAviso($mensaje)
    {
        echo '<p id="mensaje" class="mensajeAviso">' . $mensaje . '</p>';
    }

    public function mostrarMensajeAvisoTemporal($mensaje)
    {
        echo '<p id="mensaje" class="mensajeAviso" style="transition: opacity 1s;">' . $mensaje . '</p>
                    <script>
                        setTimeout(function() {
                            document.getElementById("mensaje").style.opacity = "0";
                            setTimeout(function() {
                                document.getElementById("mensaje").style.display = "none";
                            }, 1000);
                        }, 3000);
                    </script>';
    }

    public function mostrarMensajeExito($mensaje)
    {
        echo '<p id="mensaje" class="mensajeExito" style="transition: opacity 1s;">' . $mensaje . '</p>
                    <script>
                        setTimeout(function() {
                            document.getElementById("mensaje").style.opacity = "0";
                            setTimeout(function() {
                                document.getElementById("mensaje").style.display = "none";
                            }, 1000);
                        }, 3000);
                    </script>';
    }
}
