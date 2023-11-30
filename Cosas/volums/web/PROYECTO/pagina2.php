<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina 2</title>
</head>

<body>
    <?php
    referencias_menu();
    //CONVERTIMOS EN ARRRAY EL ARCHIVO
    include 'funciones.php';
    $videojuegos = array();
    cargarVideojuegos("games.json", $videojuegos);

    asignarCodigo('games.json',$videojuegos);
    imprimirTabla($videojuegos);
    ?>
</body>

</html>