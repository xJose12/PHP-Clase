<!DOCTYPE html>
<html lang="en">
<head>
    <title>Funcion 1</title>
</head>
<body>
    <?php
    include 'proyecto.php';
    $videojuegos = array();
    cargarVideojuegos("games.json", $videojuegos);
    ?>
</body>
</html>