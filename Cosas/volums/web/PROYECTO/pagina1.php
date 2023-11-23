<!DOCTYPE html>
<html lang="en">

<head>
    <title>Funcion 1</title>
</head>

<body>
    <?php
    //Convertimos en array el archivo
    include 'funciones.php';
    $videojuegos = array();
    cargarVideojuegos("games.json", $videojuegos);

    //Hacemos la función para imprimir la tabla
   

    imprimirTabla($videojuegos);

    ?>
</body>

</html>