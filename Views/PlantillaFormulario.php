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
    </form>
</body>

</html>