<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <?php
    foreach ($_POST['contactos'] as $contacto => $datos) {
        if ($contacto) {

            $resultado = $contactosController->getContactosById($contacto);
    ?>
            <input type="hidden" name="contactos[<?php echo $resultado['id_contacto']; ?>][id]" value="<?php echo $resultado['id_contacto']; ?>">
            <label>
                Nombre: <input type="text" name="contactos[<?php echo $resultado['id_contacto']; ?>][nombre]" value="<?php echo $resultado['nombre']; ?>" required>
            </label>
            <label>
                Email: <input type="email" name="contactos[<?php echo $resultado['id_contacto']; ?>][email]" value="<?php echo $resultado['email']; ?>" required>
            </label>
            <label>
                Teléfono: <input type="text" name="contactos[<?php echo $resultado['id_contacto']; ?>][tlf]" value="<?php echo $resultado['tlf']; ?>" required minlength="9" maxlength="9">
            </label>
            <label>
                Dirección: <input type="text" name="contactos[<?php echo $resultado['id_contacto']; ?>][direccion]" value="<?php echo $resultado['direccion']; ?>" required>
            </label>
            <br>
    <?php
        } else {
            echo "No hacemos";
        }
    }
    ?>
    <input type="submit" value="Modifcar contacto" name="infoModificar">
    <button>
        <a href="./">Cancelar modificacion</a>
    </button>
</form>