<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina 1</title>
</head>

<body>
    <?php
    referencias_menu();
    //CONVERTIMOS EN ARRAY EN ARCHIVO 
    include 'funciones.php';
    $videojuegos = array();
    cargarVideojuegos("games.json", $videojuegos);

    //LLAMAMOS A LA FUNCION imprimirTabla PARA IMPRIMIR NUESTRA TABLA
    imprimirTabla($videojuegos);

    ?>
</body>

</html>