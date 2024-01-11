<!DOCTYPE html>
<html>
<body>
<?php

$jsonString = file_get_contents('prova_json.json');


$arrayAsociatiu = json_decode($jsonString, true);

// Verifica si hay errores durante la decodificación
if (json_last_error() !== JSON_ERROR_NONE) {
    die('Error  JSON: ' . json_last_error_msg());
}

//EJERCICIO PRUEBA
echo "<h2>EJERCICIO DE PRUEBA</h2>";

echo "<table border = 1px>";
echo "<tr>";
foreach($arrayAsociatiu[0] as $titulos => $valor) {
        echo "<th>$titulos</th>";
    }
echo "</tr>";

foreach($arrayAsociatiu as $datos) {
    echo "<tr>";
        foreach($datos as $valor) {
            echo "<td>$valor</td>";
        }
    echo "</tr>";
}
echo "</table>";

// EJERCICIO 1
echo "<h2>EJERCICIO 1</h2>";

function cargarJson($nombreArchivo, &$miArray) {
    $jsonString = file_get_contents($nombreArchivo);


    $miArray = json_decode($jsonString, true);

    // Verifica si hay errores durante la decodificación
    if (json_last_error() !== JSON_ERROR_NONE) {
        die('Error  JSON: ' . json_last_error_msg());
    }
}

$nombreArchivo = 'prueba_jose.json';

$arrayJose = array();

cargarJson($nombreArchivo, $arrayJose);

print_r($arrayJose);


// EJERCICIO 2
echo "<h2>EJERCICIO 2</h2>";

function imprimirArray(&$tuArray) {
    echo "<table border = 1px>";
    echo "<tr>";
    foreach($tuArray[0] as $titulos => $valor) {
            echo "<th>$titulos</th>";
        }
    echo "</tr>";

    foreach($tuArray as $datos) {
        echo "<tr>";
            foreach($datos as $valor) {
                echo "<td>$valor</td>";
            }
        echo "</tr>";
    }
    echo "</table>";
}

imprimirArray($arrayJose);

// EJERCICIO 3
echo "<h2>EJERCICIO 3</h2>";

function devolverNombrePersonas(&$tuarray, &$nombres) {
    foreach ($tuarray as $fila) {
        array_push($nombres, $fila["nom"]);
    }
}

$resultadoNombres = array();

devolverNombrePersonas($arrayJose, $resultadoNombres);

print_r($resultadoNombres);


// EJERCICIO 4
echo "<h2>EJERCICIO 4</h2>";

function buscarNombre(&$tuarray, &$nombreaBuscar) {
    if (array_search($nombreaBuscar, $tuarray) !== false) {
        echo "1";
    } else {
        echo "0";
    }
}

$nombre = "Pepe";

buscarNombre($resultadoNombres, $nombre);

/*Exercici1 */
function carregaFitxerAArray ($nomfitxer, &$arrayAsso)
{
    $jsonString = file_get_contents($nomfitxer);
    $arrayAsso = json_decode($jsonString, true);

    if (json_last_error() !== JSON_ERROR_NONE) 
    {
        die('Error  JSON: ' . json_last_error_msg());
    }
}

function carregaArrayAFitxer ($nomfitxer,$arrayAsso)
{

// Convertir array a format JSON
$json_dades = json_encode($arrayAsso, JSON_PRETTY_PRINT);

echo "array convertit a json";
// Desar el format JSON a un arxiu JSON
file_put_contents($nomfitxer, $json_dades);

}

// Provam càrrega fitxer a array
$persones = array();
carregaFitxerAArray("prova_json.json",$persones);
print_r ($persones);

//Provam càrrega array a fitxer
carregaArrayAFitxer("output.json", $persones);
echo "Comprova que el fitxer output.json ha estat
creat amb dades";
?> 


?>
</body>
</html>