<?php
require_once __DIR__ . '/../Controllers/ContactosController.php';

$contactosController = new ContactosController();

    if (!$_POST) {
        include_once __DIR__ . '/PlantillaFormulario.php';
    } else {
        if (isset($_POST['listar']) && !empty($_POST['listar'])) {
            include_once __DIR__ . '/PlantillaTablaContactos.php';
        } elseif (isset($_POST['insertar']) && !empty($_POST['insertar'])) {
            echo "Insertando... <br>";
            $contactosController->insertContact('Pedro', 'pedritoclavito@gmail.com', 234567890, 'Rosa de los vientos');
        } elseif (isset($_POST['modificar']) && !empty($_POST['modificar'])) {
            echo "Modificando... <br>";
        } elseif (isset($_POST['borrar']) && !empty($_POST['borrar'])) {
            echo "Borrando... <br>";
        } 

        // echo '<pre>';
        // print_r($_POST);
        // echo "</pre>";
    }
?>