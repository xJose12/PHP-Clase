<!-- 1. Sumar tots els elements d’una matriu de nombres i compta quants d’elements té
La matriu és de dues dimensions de la mateixa longitud.
Feim ús d’array_colum, count, array_sum; -->

<h2>1. Sumar tots els elements d’una matriu de nombres i compta quants d’elements té la matriu és de dues dimensions de la mateixa longitud. Feim ús d’array_colum, count, array_sum;</h2>

<?php

$suma = 0;
$totalElementos = 0;

$matriz = array(
    array(5, 10),
    array(6, 3)
);

for ($i = 0; $i < count($matriz[0]); $i++) {
    $columnaActual = array_column($matriz, $i);
    $suma += array_sum($columnaActual);
    $totalElementos += count($columnaActual);
}
echo "El total de elementos es: " . $totalElementos . "<br>";
echo "El total de la suma es: " . $suma;

?>

<!-- 2. Sumar tots els elements d’una matriu de nombres i compta quants d’elements té
La matriu és de dues dimensions però no tenen perque ser de la mateixa longitud. -->

<h2>2. Sumar tots els elements d’una matriu de nombres i compta quants d’elements tél la matriu és de dues dimensions però no tenen perque ser de la mateixa longitud.</h2>

<?php

$suma = 0;
$totalElementos = 0;

$matriz2 = array(
    array(5, 10),
    array(6, 3),
    array(5, 10),
    array(6, 3)
);

for ($row = 0; $row < 4; $row++) {
    for ($col = 0; $col < 2; $col++) {
        $suma += $matriz2[$row][$col];
        $totalElementos += 1;
    }
}

echo "El total de elementos es: " . $totalElementos . "<br>";
echo "El total de la suma es: " . $suma;

?>

<!-- 3. Trobar el valor màxim d’una matriu de nombres emprant array_map passant la funció max. Fer ús d’array_map i de max -->

<h2>3. Trobar el valor màxim d’una matriu de nombres emprant array_map passant la funció max. Fer ús d’array_map i de max</h2>

<?php

$matriz = array(
    array(5, 120),
    array(5, 10),
    array(6, 3)
);

var_dump(array_map("max", $matriz)); // mayor de acada array de la matriz

echo "<br>";

var_dump(max(array_map("max", $matriz))); // mayor de toda la matriz

?>

<!-- 4. Cercar un element en una matriu fent ús de in_array. Torna si el trobes o no. Fer dues versions una amb el foreach que recorr les files i l’altra amb array_merge(...$matriu) que el que fa és convertir una array_multidimensional en unidimensional.  -->

<h2>4. Cercar un element en una matriu fent ús de in_array. Torna si el trobes o no. Fer dues versions una amb el foreach que recorr les files i l’altra amb array_merge(...$matriu) que el que fa és convertir una array_multidimensional en unidimensional. </h2>

<?php

$encontrado = false;

$matriz = array(
    array("Jose", "Ana", "Paco"),
    array("Pepe", "Manolo", "Linda"),
    array("Antonio", "Manolo", "Leo")
);

for ($i = 0; $i < count($matriz[0]); $i++) {
    if (in_array("Linda", $matriz[$i])) {
        $encontrado = true;
        break;
    }
}

if ($encontrado) {
    echo "Encontrado <br>";
} else {
    echo "No encontrado <br>";
}

// otra manera
$encontrado = false;
$nombreBuscar = "Kiko";

foreach ($matriz as $fila) {
    if (in_array($nombreBuscar, $fila, true)) {
        $encontrado = true;
        break;
    }
}

if ($encontrado) {
    echo "Encontrado <br>";
} else {
    echo "No encontrado <br>";
}

?>

<!-- 5. Cerca la posició on apareix un element dins un array bidimensional, fent ús d’array_search. Fer dues versions una amb el foreach que recorr les files i l’altra amb array_merge(...$matriu) que el que fa és convertir una array_multidimensional en unidimensional.  -->

<h2>5. Cerca la posició on apareix un element dins un array bidimensional, fent ús d’array_search. Fer dues versions una amb el foreach que recorr les files i l’altra amb array_merge(...$matriu) que el que fa és convertir una array_multidimensional en unidimensional. </h2>

<?php

$valorBuscar = 120;
$numFila = 0;

$matriz = array(
    array(5, 120),
    array(5, 10),
    array(6, 3)
);

foreach ($matriz as $fila) {
    $posision = array_search($valorBuscar, $fila, true) ;

    if ($posision != false) {
        echo "Encontrado en " . $numFila . " y columna " . $posision;
        break;
    }
    $numFila++;
}

//SEGUNDA SOLUCION

// var_dump(array_search($valorBuscar, array_merge(...$matriz, true)));

?>