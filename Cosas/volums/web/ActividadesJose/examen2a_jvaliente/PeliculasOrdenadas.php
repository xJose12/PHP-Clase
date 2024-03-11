<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<nav>
    <nav>
        <a href="index.php"> Pagina Inicio</a>
        <a href="alta.php"> Funcion 1</a>
        <a href="cerca.php"> Funcion 2</a>
        <a href="exporta.php"> Funcion 3</a>
    </nav>
</nav>

<body>
    <h1>Pelis Ordenadas</h1>

    <?php
    include 'clase.php';
    $conn = new basededades("db", "root", "politecnic", "peliculas");
    $consulta = $conn->listarOrdenado();
    if ($consulta != null) {
        $arrayValues = $consulta->fetchAll(PDO::FETCH_ASSOC);
        echo "<table border=1px wdith=\"100%\">\n";
        echo "<tr>\n";
        foreach ($arrayValues[0] as $key => $useless) {
            echo "<th>$key</th>";
        }
        echo "</tr>";
        foreach ($arrayValues as $row) {
            echo "<tr>";
            foreach ($row as $key => $val) {
                echo "<td>$val</td>";
            }
            echo "</tr>\n";
        }
        echo "</table>\n";
    } else {
        echo "No se encontraron valores en la base de datos";
    }
    ?>

</body>

</html>