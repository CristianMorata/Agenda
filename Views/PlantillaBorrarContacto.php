<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="submit" value="Listar contactos" name="listar">
    <input type="submit" value="Insertar contacto" name="insertar">
    <input type="submit" value="Modificar contacto" name="datosGuardadosBorrar">
    <br><br>

    <?php
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    if (!empty($_POST['contactos']) && !isset($_POST['datosGuardadosModificar'])) {
        foreach ($_POST['contactos'] as $id_contacto => $value) {
            echo "<p>$id_contacto</p>";
            echo '<input type="hidden" name="contactos[' . $id_contacto . ']" value="' . $id_contacto . '">';
        }
    } elseif (isset($_POST['datosGuardadosModificar']) && !empty($_POST['datosGuardadosModificar'])) {
        foreach ($_POST['contactos'] as $id_contacto => $value) {
            echo "<p>Estas seguro de que desea eliminar al contacto <b>" . $value['nombre'] . "</b></p>";
            echo '<input type="hidden" name="contactos[' . $id_contacto . ']" value="' . $id_contacto . '">';
        }
    }
    ?>
    <input type="submit" value="Confirmar borrado" name="confirmarBorrar">
    <button>
        <a href="./">Cancelar borrado</a>
    </button>
</form>