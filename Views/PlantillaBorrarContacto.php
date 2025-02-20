<input type="submit" value="Listar contactos" name="listar">
<input type="submit" value="Insertar contacto" name="insertar">
<input type="submit" value="Modificar contacto" name="datosGuardadosBorrar">
<br><br>

<?php
foreach ($_POST['contactos'] as $contacto => $datos) {
    if ($contacto) {

        $resultado = $contactosController->getContactosById($contacto);

        $contactosController->mostrarMensajeAviso("Estas seguro de que desea eliminar al contacto <b>" . $resultado['nombre'] . "?</b>");
    }
}
?>
<input type="submit" value="Confirmar borrado" name="confirmarBorrar">
<button>
    <a href="./">Cancelar borrado</a>
</button>