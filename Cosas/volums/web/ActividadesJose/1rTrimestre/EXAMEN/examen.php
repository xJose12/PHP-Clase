<?php

$datesNaixement = array(
    "123456789" => "1990-05-15",
    "987654321" => "1985-08-22",
    "456789012" => "1998-03-10",
    "321098765" => "1976-11-28",
    "789012345" => "2002-07-05",
    "543210987" => "1994-02-18",
    "210987654" => "1980-09-03",
    "876543210" => "2005-12-12",
    "234567890" => "1999-06-25",
    "890123456" => "1972-04-07"
);

$noms = array(
    "123456789" => "Mora Barceló, Joana",
    "456789012" => "Barceló Adrover, Maria",
    "321098765" => "Sànchez López, Margalida",
    "789012345" => "Oliver Montserrat, Paula",
    "210987654" => "Mora Llaneres, Falou",
    "876543210" => "Nadal Barceló, Miquel",
    "234567890" => "Sastre Julià, Joana",
    "543210987" => "Mora Ferrà, Toni",
    "987654321" => "Nicolau Martorell, Xim",
    "890123456" => "Bibiloni Sagreres, Bàrbara"
);
   
// EJERCICIO 1
echo "<h1>Ejercicio 1</h1>";

function ejercicio1($datesNaixement, $noms, &$año1, &$año2) {

$resultat = array();

    foreach($datesNaixement as $x => $x_value) {
        $añoArray=date("Y", strtotime($x_value));
        foreach($noms as $y => $y_value) {
            if ($x == $y && $añoArray >= $año1 && $añoArray <= $año2) {
                $resultat[$y] = $y_value;
            }
          }
      }
      return $resultat;
}
$año1 = "1990";
$año2 = "2010";

print_r (ejercicio1($datesNaixement, $noms, $año1, $año2));

// EJERCICIO 2
echo "<h1>Ejercicio 2</h1>";

$resultat = array();
function ejercicio2($datesNaixement, $noms, $resultat) {

    foreach($datesNaixement as $x => $x_value) {
        foreach($noms as $y => $y_value) {
            if ($x == $y) {
                $resultat[$y] = $x_value . $y_value;
            }
          }
      }
      return $resultat;
}

print_r (ejercicio2($datesNaixement, $noms, $resultat));

// EJERCICIO 3
echo "<h1>Ejercicio 3</h1>";

$notes = array(
    "123456789" => 8,
    "456789012" => 5,
    "321098765" => 9,
    "789012345" => 7,
    "210987654" => 6,
    "876543210" => 4,
    "234567890" => 2,
    "543210987" => 7,
    "987654321" => 9,
    "890123456" => 1
);

function ejercicio3($notes) {

    $resultado = array();
    $contador = 0;

    for ($i = 0; $i <= 10; $i++) {
        foreach($notes as $dni => $nota) {
            if ($i == $nota) {
                $contador++;
            }
        }
        $resultado[] = $contador;
        $contador = 0;
    }
    print_r($resultado);
}

ejercicio3($notes);

// EJERCICIO 4
echo "<h1>Ejercicio 4</h1>";

function cargarJson($nombreArchivo, &$notasAlumnos) {
    $jsonString = file_get_contents($nombreArchivo);

    $notasAlumnos = json_decode($jsonString, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        die('Error  JSON: ' . json_last_error_msg());
    }
}

cargarJson('notes.json', $notasAlumnos);


// OTRA POSIBLE SOLUCION, PERO FALTA ARREGLAR LAS NOTAS, ESTE SI MUESTRA LAS 3 ASIGNATURAS A LA VEZ JUNTO CON DNI
// function ejercicio4($notasAlumnos) {
//     foreach($notasAlumnos as $arrayPrincipal => $multiplesArray) {
//         foreach($multiplesArray as $valores) {
//             echo $valores["nom"] . "<br>";
//             foreach($valores["alumnes"] as $nombreAsignatura => $nota) {
//                 echo $nombreAsignatura . ": " .  $nota . "<br>";
//             }
//             echo "<br>";
//         }
//     }
// }

function ejercicio4($notasAlumnos) {
    foreach($notasAlumnos as $arrayPrincipal => $multiplesArray) {
        foreach($multiplesArray as $valores) {
            foreach($valores["alumnes"] as $dni => $nota) {
                echo "<b>$dni</b>" . "<br>";
                echo $valores["nom"] . ": " . $nota . "<br>";
                echo "<br>";
            }

            echo "<br>";
        }
    }
}

ejercicio4($notasAlumnos);

// EJERCICIO 5
echo "<h1>Ejercicio 5</h1>";

function crearJSON(&$notasAlumnos, $nombreArchivo)
{
    // GUARDA LA VARIABLE &$videojuegos EN UN ARCHIVO JSON
    $notasAlumnos = array_values($notasAlumnos);
    $json_datos = json_encode($notasAlumnos, JSON_PRETTY_PRINT);
    file_put_contents($nombreArchivo, $json_datos);
}

cargarJson('notes.json', $notasAlumnos);

function ejercicio5($notasAlumnos) {

    $mediana = 0;
    $porcentajeAprobados = 0;
    $porcentajeSuspendidos = 0;
    $notaMinima = 0;
    $notaMaxima = 0;

    foreach($notasAlumnos as $arrayPrincipal => $multiplesArray) {
        foreach($multiplesArray as $valores) {
            foreach($valores["alumnes"] as $dni => $nota) {

                
            }
        }
    }

    crearJSON($notasAlumnos, 'notesCalcul.json');

}

ejercicio5($notasAlumnos);

?>