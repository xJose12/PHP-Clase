<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina 6</title>
</head>

<body>
    <?php
    referencias_menu();
    //Convertimos en array el archivo
    include 'funciones.php';
    $videojuegos = array();
    cargarVideojuegos("games.json", $videojuegos);
    ?>
</body>

</html>