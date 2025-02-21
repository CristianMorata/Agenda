<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <?php
    require_once __DIR__ . '/../Controllers/ContactosController.php';

    $contactosController = new ContactosController();

    if (!$_POST) {
        include_once __DIR__ . '/PlantillaFormulario.php';
    } else {
        // Comprobante de si se han insertado datos cree al contacto
        if (isset($_POST['infoInsert']) && !empty($_POST['infoInsert'])) {
            $contactosController->insertarContacto($_POST['nombre'], $_POST['email'], $_POST['tlf'], $_POST['direccion']);

            $_POST = [];
            $_POST['listar'] = 'Listar contactos';

            // Comprobante de si se solicita modificar uno o varios usuarios, que sean modificados
        } elseif (isset($_POST['infoModificar']) && !empty($_POST['infoModificar'])) {
            $contactosController->modificarContactos($_POST['contactos'], 8);

            $_POST = [];
            $_POST['listar'] = 'Listar contactos';
            // Comprobante de si se solicita elminar uno o varios usuarios, que sean eliminados
        } elseif (isset($_POST['confirmarBorrar']) && !empty($_POST['confirmarBorrar'])) {
            $contactosController->borrarContactos($_POST['contactos']);

            $_POST = [];
            $_POST['listar'] = 'Listar contactos';
        }

        if (isset($_POST['listar']) && !empty($_POST['listar'])) {
            include_once __DIR__ . '/PlantillaTablaContactos.php';
        } elseif (isset($_POST['insertar']) && !empty($_POST['insertar'])) {
            include_once __DIR__ . '/PlantillaInsertContacto.php';
        } elseif (isset($_POST['modificar']) && !empty($_POST['contactos'])) {
            include_once __DIR__ . '/PlantillaModificarContacto.php';
        } elseif (isset($_POST['borrar']) && isset($_POST['contactos'])) {
            include_once __DIR__ . '/PlantillaBorrarContacto.php';
        } elseif (isset($_POST['datosGuardadosModificar']) && !empty($_POST['datosGuardadosModificar'])) {
            include_once __DIR__ . '/PlantillaBorrarContacto.php';
        } elseif (isset($_POST['datosGuardadosBorrar']) && !empty($_POST['datosGuardadosBorrar'])) {
            include_once __DIR__ . '/PlantillaModificarContacto.php';
        } else {
            $contactosController->mostrarMensajeAvisoTemporal("No se han seleccionado ningun contacto para la accion.");
            include_once __DIR__ . '/PlantillaTablaContactos.php';
        }
    }
    ?>
</form>