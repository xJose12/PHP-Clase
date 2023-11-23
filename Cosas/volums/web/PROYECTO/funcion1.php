<!DOCTYPE html>
<html lang="en">

<head>
    <title>Funcion 1</title>
</head>

<body>
    <?php
    //Convertimos en array el archivo
    include 'proyecto.php';
    $videojuegos = array();
    cargarVideojuegos("games.json", $videojuegos);

    //Convertimos en tabla los datos del array
    echo "<table border = 1px>";
    echo "<tr>";
    foreach ($videojuegos[0] as $titulos => $valor) {
        echo "<th>$titulos</th>";
    }
    echo "</tr>";

    foreach ($videojuegos as $datos) {
        echo "<tr>";
        foreach ($datos as $valor) {
            echo "<td>$valor</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    ?>
</body>

</html>