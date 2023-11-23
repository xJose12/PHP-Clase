<?php

// FUNCION DE IMPRIMIR MENU PRINCIPAL
function referencias_menu()
{
    echo '<a href="proyecto.php"> Pagina principal</a><br>';
    echo '<a href="funcion1.php"> Funcion 1</a><br>';
    echo '<a href="funcion2.php"> Funcion 2</a><br>';
    echo '<a href="funcion3.php"> Funcion 3</a><br>';
    echo '<a href="funcion4.php"> Funcion 4</a><br>';
    echo '<a href="funcion5.php"> Funcion 5</a><br>';
    echo '<a href="funcion6.php"> Funcion 6</a><br>';
    echo '<a href="funcion7.php"> Funcion 7</a><br>';
    echo '<a href="funcion8.php"> Funcion 8</a><br>';
    echo '<a href="funcion9.php"> Funcion 9</a><br>';
    echo '<a href="funcion10.php"> Funcion 10</a><br>';
}

// FUNCION CARGA DE JSON DE LOS VIDEOJUEGOS
function cargarVideojuegos($archivoJuegos, &$videojuegos)
{
    $jsonString = file_get_contents($archivoJuegos);
    $videojuegos = json_decode($jsonString, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        die('Error  JSON: ' . json_last_error_msg());
    }
}

// FUNCION 1
function imprimirTabla(&$videojuegos)
{
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
}
