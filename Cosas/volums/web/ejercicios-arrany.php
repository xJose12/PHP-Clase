<!-- 1. Generar de forma aleatòria una array unidimensional de nombres de 10 posicions. -->

<h2>1. Generar de forma aleatòria una array unidimensional de nombres de 10 posicions.</h2>

<?php

$primeraArray = array();

for ($i = 1; $i <= 10; $i++) {
    $generarNumero = rand(-10,10);
    $primeraArray[] = $generarNumero;
}

echo "Contenido del array:\n";
for ($i = 0; $i < count($primeraArray); $i++) {
    echo $primeraArray[$i] . "\n";
}

?>

<!-- 2. Cercar el nombre màxim i el nombre mínim d’aquesta array.  -->

<h2>2. Cercar el nombre màxim i el nombre mínim d’aquesta array.</h2>

<?php

echo "El maximo es: " . max($primeraArray) . "<br>";
echo "El minimo es: " . min($primeraArray);

?>

<!-- 3. Comptar quants d’elements té l’array. -->

<h2>3. Comptar quants d’elements té l’array.</h2>

<?php
$contarPosiciones = count($primeraArray); 

echo "Mi primera array tiene: $contarPosiciones posiciones.";

?>

<!-- 4. Sumar els elements d’una array. Calcular la mitjana dels elements d’una array. -->

<h2>4. Sumar els elements d’una array. Calcular la mitjana dels elements d’una array.</h2>

<?php
$sumaTotal = array_sum($primeraArray); 
echo "La suma total del array es: $sumaTotal <br>";
echo "La media es: " . $sumaTotal / count($primeraArray);

?>

<!-- 5. Tornar un string amb els elements d’una array separats per comes (ús funció implode) -->

<h2>5. Tornar un string amb els elements d’una array separats per comes (ús funció implode)</h2>

<?php
$cosas = array("coco", "palmera", "arbol");
$cosas_string = implode(", ", $cosas);

echo $cosas_string;
?>

<!-- 6. Ordenar un array de nombres de forma ascendent i de forma descendent. Mostrar els resultats dins d’un string. -->

<h2>6. Ordenar un array de nombres de forma ascendent i de forma descendent. Mostrar els resultats dins d’un string.</h2>

<?php
sort($primeraArray);
echo implode(", ", $primeraArray) . "<br>";
rsort($primeraArray);
echo implode(", ", $primeraArray);


?>
<!-- 7. Mostrar la informació de l’array ordenada de l’exercici anterior dins d’una taula HTML. -->

<h2>7. Mostrar la informació de l’array ordenada de l’exercici anterior dins d’una taula HTML.</h2>

<table border=1><tr>
<?php

sort($primeraArray);

for ($i = 0; $i < count($primeraArray); $i++) {
    echo "<td>$primeraArray[$i]</td>";
} 

?>
</tr></table>
<!-- 8. Cercar un element donat dins d’una array  -->

<h2>8. Cercar un element donat dins d’una array</h2>

<?php
$numeroBuscar = 4;

if ((array_search("$numeroBuscar",$primeraArray)) == '0' ) {
    echo "El $numeroBuscar no esta en la array";
} else {    
    echo "El $numeroBuscar esta en la array";
}

?>

<!-- 9. Eliminar elements duplicats d’una array indexada. -->

<h2>9. Eliminar elements duplicats d’una array indexada.</h2>

<?php
echo implode (", ", array_unique($primeraArray));
?>

<!-- 10. Imprimir quants números positius, negatius i zeros hi ha en l’array. -->

<h2>10. Imprimir quants números positius, negatius i zeros hi ha en l’array.</h2>

<?php

$numerosCeros = 0;
$numerosPositivos = 0;
$numerosNegativos = 0;

for ($i = 0; $i < count($primeraArray); $i++) {
    if ($primeraArray[$i] == 0) {
        $numeroCeros += 1;
    } elseif ($primeraArray[$i] < 0 ) {
        $numerosNegativos += 1;
    } else {
        $numerosPositivos += 1;
    }
} 

echo "Numero de ceros: $numerosCeros <br>";
echo "Numero de Positivos: $numerosPositivos <br>";
echo "Numero de Negativos: $numerosNegativos";

?>

<!-- 11. Afegeix 2 elements al final de l’array. -->

<h2>11. Afegeix 2 elements al final de l’array.</h2>

<?php

array_push($primeraArray, 1000, 25000);

print_r($primeraArray);

?>


<!-- 12. Elimina aquests 2 anteriors elements. -->

<h2>12. Elimina aquests 2 anteriors elements.</h2>

<?php

for ($i = 0; $i < 2; $i++) {
    array_pop($primeraArray);
}
print_r($primeraArray);

?>

<!-- 13. Practica amb array_diff, array_intersect, array_merge, array_unique.  -->

<h2>13. Practica amb array_diff, array_intersect, array_merge, array_unique.</h2>

<?php
$arrayDif1 = array("Ana", "Carlos", "David", "Elena", "Francisco");
$arrayDif2 = array("David", "Elena", "Francisco", "Gabriel", "Hilda");

$diferencia = array_diff($arrayDif1, $arrayDif2);
print_r($diferencia); // Muestra los elementos que están en $array1 pero no en $array2.

echo "<br>";

$arrayInter1 = array("Ana", "Carlos", "David", "Elena", "Francisco");
$arrayInter2 = array("David", "Elena", "Francisco", "Gabriel", "Hilda");

$interseccion = array_intersect($arrayInter1, $arrayInter2);
print_r($interseccion); // Muestra los elementos que están en ambos $array1 y $array2.

echo "<br>";

$arrayMerge1 = array("Ana", "Carlos", "David");
$arrayMerge2 = array("Elena", "Francisco", "Gabriel");

$combinado = array_merge($arrayMerge1, $arrayMerge2);
print_r($combinado); // Muestra un único array con todos los elementos de $array1 seguidos por los de $array2.

echo "<br>";

$array = array("Ana", "Carlos", "Carlos", "David", "Elena", "Elena", "Francisco");

$unicos = array_unique($array);
print_r($unicos); // Muestra un array con elementos únicos, eliminando duplicados.
?>