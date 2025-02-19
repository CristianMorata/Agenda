<?php
require_once __DIR__ . '/../Controllers/ContactosController.php';

$contactosController = new ContactosController();

if (!$_POST) {
    include_once __DIR__ . '/PlantillaFormulario.php';
} else {
    if (isset($_POST['listar']) && !empty($_POST['listar'])) {
        include_once __DIR__ . '/PlantillaTablaContactos.php';
    } elseif (isset($_POST['insertar']) && !empty($_POST['insertar'])) {
        include_once __DIR__ . '/PlantillaInsertContacto.php';
        

        // if (isset($_POST['infoInsert'])) {  
        //     echo "Insertando... <br>";
        //     $contactosController->insertContact($_POST['nombre'], $_POST['email'], $_POST['tlf'], $_POST['direccion']);
        // }
    } elseif (isset($_POST['modificar']) && !empty($_POST['modificar'])) {
        echo "Modificando... <br>";
    } elseif (isset($_POST['borrar']) && !empty($_POST['borrar'])) {
        echo "Borrando... <br>";
    }

    // print_r($_POST);
    if (isset($_POST['infoInsert']) && !empty($_POST['infoInsert'])) {
        echo "Insertando... <br>";
        $contactosController->insertContact($_POST['nombre'], $_POST['email'], $_POST['tlf'], $_POST['direccion']);
        $_POST = '';
    }

    // print_r($_POST);
    // $_POST = '';
    // print_r($_POST);
    // echo "Holoa";

    // echo '<pre>';
    // print_r($_POST);
    // echo "</pre>";
}
