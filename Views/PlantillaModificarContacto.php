<div class="formulario-modificar">
    <div class="botones-superiores">
        <input type="submit" value="Listar contactos" name="listar" class="boton">
        <input type="submit" value="Insertar contacto" name="insertar" class="boton">
        <input type="submit" value="Borrar contacto" name="datosGuardadosModificar" class="boton">
    </div>

    <div class="grid-contactos">
        <?php
        foreach ($_POST['contactos'] as $contacto => $datos) {
            if ($contacto) {

                $resultado = $contactosController->getContactosById($contacto);
        ?>
                <div class="tarjeta-contacto">
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
                </div>
        <?php
            }
        } ?>
        <!-- Botones inferiores -->
    </div>

    <div class="botones-inferiores">
        <input type="submit" value="Modificar contacto" name="infoModificar" class="boton">
        <button class="boton boton-cancelar">
            <a href="./">Cancelar modificación</a>
        </button>
    </div>
</div>