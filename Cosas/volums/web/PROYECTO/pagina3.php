<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina 3</title>
</head>

<body>
    <?php
    //Convertimos en array el archivo
    include 'funciones.php';
    $videojuegos = array();
    cargarVideojuegos("games.json", $videojuegos);
    //Crear el archivo JSON_Resultat_Eliminar.json
    ficheroEliminar("2016-01-01", "2016-12-31", $videojuegos);
    imprimirTabla($videojuegos);
    ?>
</body>

</html>