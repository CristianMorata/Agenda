<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="submit" value="Listar contactos" name="listar">
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
    </form>
</body>

</html>