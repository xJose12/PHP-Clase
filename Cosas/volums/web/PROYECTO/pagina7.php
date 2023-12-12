<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina 7</title>
</head>

<body>
    <?php    
    include 'funciones.php';
    referencias_menu();
    //Convertimos en array el archivo
    $videojuegos = array();
    cargarVideojuegos("games.json", $videojuegos);
    ficheroEliminarRepetidos($videojuegos);
    ?>
</body>

</html>