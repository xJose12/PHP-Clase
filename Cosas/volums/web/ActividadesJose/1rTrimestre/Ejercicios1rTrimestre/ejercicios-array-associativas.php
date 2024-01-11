<html>

<!-- 1. Crea un array associatiu que emmagatzemi el stock de le següents fruites: poma(9), taronja(25), llimona(5), pera(8), plàtan(12), pinya(3), meló(4), síndria(5), albercoc(7) i maduixa(14) -->
    <h2>1. Crea un array associatiu que emmagatzemi el stock de le següents fruites: poma(9), taronja(25), llimona(5), pera(8), plàtan(12), pinya(3), meló(4), síndria(5), albercoc(7) i maduixa(14)</h2>

    <?php
    $fruteria = array('poma' => 9, 'taronja' => 25, 'llimona' => 5, 'pera' => 8, 'plàtan' => 12,  'pinya' =>  3, 'meló' => 4, 'síndria' => 5, 'albercoc' => 7, 'maduixa' => 14);
    print_r($fruteria);
    ?>

<!-- 2. Mostra el stock de cada fruita amb el format: -->
	<!-- poma: 10 -->
	<!-- taronja: 25 -->
	<!-- llimona: 5 -->
	<!-- . . . -->

    <h2>2. Mostra el stock de cada fruita amb el format:</h2>

    <?php
    foreach($fruteria as $fruta => $cantidad) {
        echo $fruta . ': ' . $cantidad . '</br>';
    };

    ?>

<!-- 3. Afegeix 10 mangos al stock de fruites -->
    <h2>3. Afegeix 10 mangos al stock de fruites</h2>

    <?php
    $fruteria['mango'] = '10';
    print_r($fruteria);
    ?>


<!-- 4. Duplica el stock de cada fruita -->
    <h2>4. Duplica el stock de cada fruita</h2>

    <?php
    foreach($fruteria as $fruta => $cantidad) {
        $fruteria[$fruta] = $cantidad * 2;
    };
    print_r($fruteria);
    ?>

<!-- 5. Ordena l’array associatiu de fruites per nom de manera ascendent i descendent -->
    <h2>5. Ordena l’array associatiu de fruites per nom de manera ascendent i descendent</h2>

    <?php
    ksort($fruteria);
    print_r($fruteria);
    echo "<br>";
    krsort($fruteria);
    print_r($fruteria);
    ?>

<!-- 6. Ordena l’array associatiu de fruites per stock de manera ascendent i descendent -->
    <h2>6. Ordena l’array associatiu de fruites per stock de manera ascendent i descendent</h2>

    <?php
    asort($fruteria);
    print_r($fruteria);
    echo "<br>";
    arsort($fruteria);
    print_r($fruteria);
    ?>

<!-- 7. Calcula el total de stock entre totes les fruites -->
    <h2>7. Calcula el total de stock entre totes les fruites</h2>

    <?php
    $total = 0;
    foreach($fruteria as $fruta => $cantidad) {
        $total += $cantidad;
    };
    echo $total;
    ?>

<!-- 8. Elimina el stock de peres -->
    <h2>8. Elimina el stock de peres</h2>
    
    <?php
    unset($fruteria['pera']);
    print_r($fruteria);
    ?>

<!-- 9. Practica amb les funcions array_diff(), array_interserct() i array_merge() sobre un altre array associatiu de fruites amb: mango(10), meló(4), maduixa(14), kiwi(6) -->
    <h2>9. Practica amb les funcions array_diff(), array_interserct() i array_merge() sobre un altre array associatiu de fruites amb: mango(10), meló(4), maduixa(14), kiwi(6)</h2>

    <?php
    $fruteria2 = array('mango' => 10 , 'meló' => 4, 'maduixa' => 14, 'kiwi' => 6);

    print_r($fruteria);
    echo "<br>";
    print_r($fruteria2);

    echo "<br><br> Diferencias: <br>";
    print_r(array_diff($fruteria, $fruteria2));

    echo "<br><br> Intersect devuelve los que coinciden en ambas: <br>";
    print_r(array_intersect($fruteria,$fruteria2));

    echo "<br><br> Merge junta ambas menos las repetidas: <br>";
    print_r(array_merge($fruteria,$fruteria2));

    ?>
    
</html>