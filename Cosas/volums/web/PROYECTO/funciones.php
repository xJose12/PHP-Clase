<?php

// FUNCION DE IMPRIMIR MENU PRINCIPAL
function referencias_menu()
{
    echo '<a href="proyecto.php"> Pagina Inicio</a><br>';
    echo '<a href="pagina1.php"> Funcion 1</a><br>';
    echo '<a href="pagina2.php"> Funcion 2</a><br>';
    echo '<a href="pagina3.php"> Funcion 3</a><br>';
    echo '<a href="pagina4.php"> Funcion 4</a><br>';
    echo '<a href="pagina5.php"> Funcion 5</a><br>';
    echo '<a href="pagina6.php"> Funcion 6</a><br>';
    echo '<a href="pagina7.php"> Funcion 7</a><br>';
    echo '<a href="pagina8.php"> Funcion 8</a><br>';
    echo '<a href="pagina9.php"> Funcion 9</a><br>';
    echo '<a href="pagina10.php"> Funcion 10</a><br>';
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
    //CONVERTIR LOS DATOS EN TABLA DE ARRAY
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

//FUNCION 2
function asignarCodigo($nombreArchivo, &$videojuegos) {
    $contador = 1;
    $valorMaximo = null;
    foreach ($videojuegos as &$titulos) {
        $codigo = $titulos['Codigo'];
        if ($valorMaximo == Null || $codigo > $valorMaximo) {
            $valorMaximo = $codigo;

            if ($valorMaximo != null) {
                $contador = $valorMaximo + 1;
            }
        }
    }

    foreach ($videojuegos as &$titulos) {
        if ($titulos['Codigo'] == null) {
            $titulos = array('Codigo' => $contador) + $titulos;
            $contador++;
        }
    }
    sort($videojuegos);
    $json_videojuegos = json_encode($videojuegos, JSON_PRETTY_PRINT);

    file_put_contents($nombreArchivo, $json_videojuegos);
}

//FUNCION 3
// Convertir array a format JSON
function ficheroEliminar($fecha1, $fecha2, &$videojuegos) {
    foreach ($videojuegos as $titulos => $valor) {
        if($valor['Llançament'] >= $fecha1 && $valor['Llançament'] <= $fecha2) {
            unset($videojuegos[$titulos]);
        } 
        
    }
    $videojuegos = array_values($videojuegos);
    $json_datos = json_encode($videojuegos, JSON_PRETTY_PRINT);
    // Desar el format JSON a un arxiu JSON
    file_put_contents("JSON_Resultat_Eliminar.json", $json_datos);
}

//FUNCION4
function ficheroExpiracion(&$videojuegos) {
    foreach($videojuegos as &$titulos) {
        $lanzamiento = ($titulos['Llançament']);
        date_add($lanzamiento, date_interval_create_from_date_string("5 years"));
        $titulos['Expiracion'] = $lanzamiento;
    }
    $videojuegos = array_values($videojuegos);
    $json_datos = json_encode($videojuegos, JSON_PRETTY_PRINT);
    // Desar el format JSON a un arxiu JSON
    file_put_contents("JSON_Resultat_Data_Expiració.json", $json_datos);
}