<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="submit" value="Listar contactos" name="listar">
    <input type="submit" value="Insertar contacto" name="insertar">
    <input type="submit" value="Modificar contacto" name="datosGurdadosBorrar">
    <br><br>

    <?php
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    foreach ($_POST['contactos'] as $contacto => $datos) {
        if ($contacto) {

            $resultado = $contactosController->getContactosById($contacto);
    ?>
            <input type="hidden" name="contactos[<?php echo $resultado['id_contacto']; ?>][id]" value="<?php echo $resultado['id_contacto']; ?>">
    <?php
        }
    }
    ?>
    <input type="submit" value="Confirmar borrado" name="confirmarBorrar">
    <button>
        <a href="./">Cancelar borrado</a>
    </button>
</form>