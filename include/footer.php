<?php 
	require_once 'conexion.php';
 ?>
 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear - CRUD PHP</title>
</head>
<body>
    <form action="" method="post">
        <p>
            <label for="titulo">Titulo</label>
            <input id="titulo" type="text" name="titulo">
        </p>
        <p>
            <label for="autor">Autor</label>
            <input id="autor" type="text" name="autor">
        </p>
        <p>
            <div>¿Disponible?</div>
            <input id="si-disponible" type="radio" name="disponible" value="1" checked> <label for="si-disponible">Si</label>
            <input id="no-disponible" type="radio" name="disponible" value="0"> <label for="no-disponible">No</label>
        </p>
        <p>
            <input type="submit" value="Guardar">
        </p>
    </form>
</body>
</html>