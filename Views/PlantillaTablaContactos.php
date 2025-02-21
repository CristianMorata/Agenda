<input type="submit" value="Insertar contacto" name="insertar" class="boton">
<input type="submit" value="Modificar contacto" name="modificar" class="boton">
<input type="submit" value="Borrar contacto" name="borrar" class="boton">
<br><br>

<div class="tabla-contenedor">
    <table border="1">
        <thead>
            <tr>
                <th></th>
                <th>Id de contacto</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Direccion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $contactosController->mostrarContactos();
            ?>
        </tbody>
    </table>
</div>