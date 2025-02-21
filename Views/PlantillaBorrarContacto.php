<div class="formulario">
    <input type="submit" value="Listar contactos" name="listar" class="boton">
    <input type="submit" value="Insertar contacto" name="insertar" class="boton">
    <input type="submit" value="Modificar contacto" name="datosGuardadosBorrar" class="boton">
    <br><br>

    <?php
    if (!empty($_POST['contactos']) && !isset($_POST['datosGuardadosModificar'])) {
        foreach ($_POST['contactos'] as $contacto => $datos) {
            if ($contacto) {

                $resultado = $contactosController->getContactosById($contacto);
                echo '<input type="hidden" name="contactos[' . $contacto . ']" value="' . $contacto . '">';

                $contactosController->mostrarMensajeAviso("Estas seguro de que desea eliminar al contacto <b>" . $resultado['nombre'] . "?</b>");
            }
        }
    } elseif (isset($_POST['datosGuardadosModificar']) && !empty($_POST['datosGuardadosModificar'])) {
        foreach ($_POST['contactos'] as $id_contacto => $value) {
            $contactosController->mostrarMensajeAviso("Estas seguro de que desea eliminar al contacto <b>" . $value['nombre'] . "?</b>");
            echo '<input type="hidden" name="contactos[' . $id_contacto . ']" value="' . $id_contacto . '">';
        }
    }
    ?>
    <input type="submit" value="Confirmar borrado" name="confirmarBorrar" class="boton">
    <button class="boton boton-cancelar">
        <a href="./">Cancelar borrado</a>
    </button>
</div>