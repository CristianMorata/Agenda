<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="submit" value="Listar contactos" name="listar">
    <input type="submit" value="Insertar contacto" name="insertar">
    <input type="submit" value="Modificar contacto" name="modificar">
    <input type="submit" value="Borrar contacto" name="borrar">
    <br><br>

    <label>
        Nombre: <input type="text" name="nombre">
    </label>
    <label>
        Email: <input type="email" name="email">
    </label>
    <label>
        Telefono: <input type="text" name="tlf"  minlength="9" maxlength="9">
    </label>
    <label>
        Dirección: <input type="text" name="direccion">
    </label>

    <input type="submit" value="Insertar contacto" name="infoInsert">
</form>