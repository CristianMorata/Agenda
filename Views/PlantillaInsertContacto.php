<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <label>
        Nombre: <input type="text" name="nombre" required>
    </label>
    <label>
        Email: <input type="email" name="email" required>
    </label>
    <label>
        Telefono: <input type="text" name="tlf" required  minlength="9" maxlength="9">
    </label>
    <label>
        Dirección: <input type="text" name="direccion" required>
    </label>

    <input type="submit" value="Insertar contacto" name="infoInsert">
    <button>
        <a href="./">Cancelar inserccion</a>
    </button>
</form>