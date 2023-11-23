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

    //EJERCICIO PRUEBA
    echo "<h2>EJERCICIO DE PRUEBA</h2>";

    echo "<table border = 1px>";
    echo "<tr>";
    foreach ($arrayAsociatiu[0] as $titulos => $valor) {
        echo "<th>$titulos</th>";
    }
    echo "</tr>";

    foreach ($arrayAsociatiu as $datos) {
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