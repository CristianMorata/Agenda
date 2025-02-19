<?php
require_once __DIR__ . '/../Controllers/ContactosController.php';

$contactosController = new ContactosController();

if (!$_POST) {
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <?php include_once __DIR__ . '/PlantillaFormulario.php'; ?>
    </form>
    <?php
} else {
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <?php
    include_once __DIR__ . '/PlantillaFormulario.php';
    if (isset($_POST['listar']) && !empty($_POST['listar'])) {
        include_once __DIR__ . '/PlantillaTablaContactos.php';
    } elseif (isset($_POST['insertar']) && !empty($_POST['insertar'])) {
        include_once __DIR__ . '/PlantillaInsertContacto.php';
    // Hacer que al dar a modificar o borrar sin un usuario seleccionado muestre que no ha seleccionado ningún usuario
    } elseif (isset($_POST['modificar']) && isset($_POST['contactos'])) {
        include_once __DIR__ . '/PlantillaModificarContacto.php';
    } elseif (isset($_POST['borrar']) && isset($_POST['contactos'])) {
        include_once __DIR__ . '/PlantillaBorrarContacto.php';
    }

    // Comprobar que se quiere insertar un contacto
    if (isset($_POST['infoInsert']) && !empty($_POST['infoInsert'])) {
        echo "Insertando... <br>";
        $contactosController->insertContact($_POST['nombre'], $_POST['email'], $_POST['tlf'], $_POST['direccion']);
        $_POST = '';
    }

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}
?>
</form>