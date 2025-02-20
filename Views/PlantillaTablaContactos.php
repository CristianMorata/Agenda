<input type="submit" value="Insertar contacto" name="insertar">
<input type="submit" value="Modificar contacto" name="modificar">
<input type="submit" value="Borrar contacto" name="borrar">
<br><br>

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