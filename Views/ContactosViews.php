<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <?php
    require_once __DIR__ . '/../Controllers/ContactosController.php';

    $contactosController = new ContactosController();

    if (!$_POST) {
    ?>

        <?php include_once __DIR__ . '/PlantillaFormulario.php'; ?>
    <?php
    } else {
    ?>
    <?php
        if (isset($_POST['listar']) && !empty($_POST['listar'])) {
            include_once __DIR__ . '/PlantillaTablaContactos.php';
        } elseif (isset($_POST['insertar']) && !empty($_POST['insertar'])) {
            include_once __DIR__ . '/PlantillaInsertContacto.php';
            // Hacer que al dar a modificar o borrar sin un usuario seleccionado muestre que no ha seleccionado ningún usuario
        } elseif (isset($_POST['modificar']) && !empty($_POST['contactos'])) {
            include_once __DIR__ . '/PlantillaModificarContacto.php';
        } elseif (isset($_POST['borrar']) && isset($_POST['contactos'])) {
            include_once __DIR__ . '/PlantillaBorrarContacto.php';
        } else {
            include_once __DIR__ . '/PlantillaTablaContactos.php';
        }

        // Comprobar que se quiere insertar un contacto
        if (isset($_POST['infoInsert']) && !empty($_POST['infoInsert'])) {
            echo "Insertando... <br>";
            $contactosController->insertContact($_POST['nombre'], $_POST['email'], $_POST['tlf'], $_POST['direccion']);
            $_POST = [];
            include_once __DIR__ . '/PlantillaTablaContactos.php';
        } elseif (isset($_POST['infoModificar']) && !empty($_POST['infoModificar'])) {
            echo "Modificando... <br>";
            foreach ($_POST['contactos'] as $id => $datos) {
                $contactosController->modifyContact(
                    $id,
                    $datos['nombre'],
                    $datos['email'],
                    $datos['tlf'],
                    $datos['direccion']
                );
            }
            $_POST = [];
            include_once __DIR__ . '/PlantillaTablaContactos.php';
        } elseif (isset($_POST['confirmarBorrar']) && !empty($_POST['confirmarBorrar'])) {
            echo "Borrando... <br>";
            foreach ($_POST['contactos'] as $id => $datos) {
                $contactosController->deleteContacts($id);
            }
            $_POST = [];
            include_once __DIR__ . '/PlantillaTablaContactos.php';
        } elseif (isset($_POST['datosGurdadosModificar']) && !empty($_POST['datosGurdadosModificar'])) {
            include_once __DIR__ . '/PlantillaBorrarContacto.php';
        } elseif (isset($_POST['datosGurdadosBorrar']) && !empty($_POST['datosGurdadosBorrar'])) {
            include_once __DIR__ . '/PlantillaModificarContacto.php';
        }
    }
    ?>
</form>