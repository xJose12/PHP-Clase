<!-- 1. Calculi i mostri per pantalla la suma de dos nombres.  -->

<!DOCTYPE html>
<html>

<body>
    <h2>1. Calculi i mostri per pantalla la suma de dos nombres.</h2>
    <?php
    $numero1 = 3;
    $numero2 = 5;

    echo "El numero 1 es " . $numero1 . "<br>";
    echo "El numero 2 es " . $numero2 . "<br>";
    $suma = $numero1 + $numero2;
    echo "La suma de " . $numero1 . " y " . $numero2 . " es " . $suma . "<br>";
    echo "La suma de $numero1 y $numero2 es $suma";
    ?>

    <!-- 2. Calculi l’àrea d’un cercle.  -->

    <h2>2. Calculi l’àrea d’un cercle.</h2>

    <?php
    $pi = 3.14;
    $radio = 6;
    $calcRadio = $pi * $radio * $radio;
    echo "El area de un circulo con $radio de radio es $calcRadio"
    ?>

    <!-- 3. Calculi els graus fahrenheit corresponents a una quantitat de graus centígrads. -->

    <h2>3. Calculi els graus fahrenheit corresponents a una quantitat de graus centígrads.</h2>

    <?php
    $gradosC = 42;
    $calcGrados = ($gradosC * 1.8) + 32;
    echo "Tenemos $gradosC ºC que son $calcGrados ºF"
    ?>

    <!-- 4. Concateni dos strings i tregui per pantalla el nombre de caràcters de l’string resultats.  -->

    <h2>4. Concateni dos strings i tregui per pantalla el nombre de caràcters de l’string resultats.</h2>

    <?php
    $palabra1 = "Hola";
    $palabra2 = "Jose";

    echo "La primera palabra es $palabra1 <br>";
    echo "La Segunda palabra es $palabra2 <br>";
    $juntar = $palabra1 . " " . $palabra2;
    $contarCarac = strlen($palabra1 . $palabra2);
    echo "Si las juntamos quedarian así: $juntar <br>";
    echo "El numero total de caracteres es: $contarCarac";
    ?>

    <!-- 5. Calculi el màxim de dos nombres i el mínim de dos nombres.  -->

    <h2>5. Calculi el màxim de dos nombres i el mínim de dos nombres.</h2>

    <?php
    $num1 = 7;
    $num2 = 3;
    $num3 = 543;
    $num4 = 432;

    echo "Numeros: $num1 y $num2 <br>";
    if ($num1 <=> $num2) {
        echo "$num1 es mayor que $num2 <br>";
    } else {
        echo "$num2 es mayor que $num1 <br>";
    }
    echo "<br>";
    echo "Numeros: $num3 y $num4 <br>";

    if ($num3 < $num4) {
        echo "$num3 es menor que $num4";
    } else {
        echo "$num4 es menor $num3";
    }
    ?>

    <!--6. Calcula el preu total a pagar d’unes entrades de cinema en funció del nombre d’entrades. 
    Si el número d’entrades és inferior a 5 el preu de l’entrada és 5 euros. Si el nombre d’entrades està entre 5 i 9 
    ambdós inclosos el preu de l’entrades és 4 euros. I finalment si el nombre d’entrades és igual o superior a 10 el 
    preu de l’entrada és de 3 euros.  -->

    <h2>6. Calcula el preu total a pagar d’unes entrades de cinema en funció del nombre d’entrades.
        Si el número d’entrades és inferior a 5 el preu de l’entrada és 5 euros. Si el nombre d’entrades està entre 5 i 9
        ambdós inclosos el preu de l’entrades és 4 euros. I finalment si el nombre d’entrades és igual o superior a 10 el
        preu de l’entrada és de 3 euros.</h2>

    <?php
    $numeroEntradas = 25;

    if ($numeroEntradas < 5) {
        $precio = $numeroEntradas * 5;
        echo "Tienes $numeroEntradas a 5 € que son: $precio €";
    } elseif ($numeroEntradas > 4 && $numeroEntradas < 10) {
        $precio = $numeroEntradas * 4;
        echo "Tienes $numeroEntradas a 4 € que son: $precio €";
    } else {
        $precio = $numeroEntradas * 3;
        echo "Tienes $numeroEntradas a 3 € que son: $precio €";
    }

    ?>

    <!--7. Mostra per pantalla un missatge que digui La persona és adulta, la persona és menor d’edat en funció de l’edat d’una persona.  -->

    <h2>7. Mostra per pantalla un missatge que digui La persona és adulta, la persona és menor d’edat en funció de l’edat d’una persona.</h2>

    <?php
    $edad = 18;
    echo "La persona tiene $edad años <br>";
    if ($edad >= 18) {
        echo "La persona es adulta";
    } else {
        echo "La persona es menor";
    }
    ?>

    <!--8. Ha d’endevinar el nombre entre 1 i 100 que l’usuari ha introduït. Pensa alguna forma de fer-lo més òptim que no sigui la de recórrer 
    tots els nombres de l’1 al 100. -->

    <h2>8. Ha d’endevinar el nombre entre 1 i 100 que l’usuari ha introduït. Pensa alguna forma de fer-lo més òptim que no sigui la de recórrer
        tots els nombres de l’1 al 100.</h2>

    <?php
    $nombre_introduit = 89;
    $encontrado = false;
    $intentos = 0;
    $min = 1;
    $max = 100;

    while (!$encontrado && $min <= $max) {
        $intentos++;
        $advinar = floor(($min + $max) / 2);
        echo "Es el numero $advinar? (Intentos de la maquina: $intentos)<br>";

        if ($advinar == $nombre_introduit) {
            $encontrado = true;
            echo "Oleee lo he adivinado, es el número $advinar!";
        } elseif ($advinar < $nombre_introduit) {
            $min = $advinar + 1;
        } else {
            $max = $advinar - 1;
        }
    }

    if (!$encontrado) {
        echo "El numero que me has dado no se encuentra entre el 1 y 100.";
    }
    ?>

    <!--9. Imprimir els nombres sencers entre 100 i 1.  -->

    <h2>9. Imprimir els nombres sencers entre 100 i 1.</h2>

    <?php
    for ($i = 100; $i >= 1; $i--) {
        echo $i . "-";
    }

    ?>

    <!--10. Imprimir els nombres imparells entre 1 i 20. Treu la informació dins d’una taula -->

    <h2>10. Imprimir els nombres imparells entre 1 i 20. Treu la informació dins d’una taula</h2>

    <?php
    echo "<table>";
    for ($i = 1; $i <= 20; $i++) {
        if ($i % 2 != 0) {
            echo "<th><td>$i</td></th>";
        }
    }
    echo "</table>"
    ?>

    <!--11. Imprimir els nombres múltiples de 3 que hi ha entre dues variables. Treu la informació en una llista no ordenada -->

    <h2>11. Imprimir els nombres múltiples de 3 que hi ha entre dues variables. Treu la informació en una llista no ordenada</h2>

    <?php
    $var1 = 1;
    $var2 = 60;
    echo "<ul>";
    for ($i = $var1; $i <= $var2; $i++) {
        if ($i % 3 == 0) {
            echo "<li>$i</li>";
        }
    }
    echo "</ul>";
    ?>


    <!--12. Imprimir la taula de multiplicar d’un nombre. Treu la informació dins d’una taula.  -->

    <h2>12. Imprimir la taula de multiplicar d’un nombre. Treu la informació dins d’una taula.</h2>
        <?php
        echo "<table border=1px bordercolor=black with=50px height=50px>";
        $tablaDel = 4;
        echo "<table>";
        echo "<tr>";
        echo "<th>Tabla del " . $tablaDel . "</th>";
        for ($i = 0; $i <= 10; $i++) {
            $multiplicar = $tablaDel * $i;
            echo "<tr><td>$tablaDel * $i = </td><td>$multiplicar</td></tr>";
        }
        echo "</table>";
        ?>


    <!--13. Imprimir la taula de multiplicar de tots els nombres de l’1 al 10. Treu una taula per a cada taula de multiplicar. -->

    <h2>13. Imprimir la taula de multiplicar de tots els nombres de l’1 al 10. Treu una taula per a cada taula de multiplicar.</h2>

    <?php
    $tablaDel = 1;
    for ($y = 1; $y <= 10; $y++) {
        echo "</br><table>";
        echo "<tr>";
        echo "<th>Tabla del " . $tablaDel . "</th>";
        for ($i = 0; $i <= 10; $i++) {
            $multiplicar = $tablaDel * $i;
            echo "<tr><td>$tablaDel * $i = </td><td>$multiplicar</td></tr>";
        }
        echo "</table>";
        $tablaDel++;
    }
    ?>

    <!--14. Indicar si un nombre N és un nombre primer -->

    <h2>14. Indicar si un nombre N és un nombre primer</h2>

    <?php
    $numeroPrimo = 5;

    if (esPrimo($numeroPrimo)) {
        echo "$numeroPrimo Es primo";
    } else {
        echo "$numeroPrimo No es primo";
    }

    function esPrimo($numeroPrimo)
    {
        for ($i = 2; $i < $numeroPrimo; $i++) {
            if (($numeroPrimo % $i) == 0) {
                return false;
            }
        }
        return true;
    }

    ?>

    <!--15. Imprimir els primers N nombres primers. Treu la informació dins d’una llista ordenada.  -->

    <h2>15. Imprimir els primers N nombres primers. Treu la informació dins d’una llista ordenada.</h2>

    <?php
    echo "<ol>";
    for ($i = 1; $i <= 20; $i++) {
        if (esPrimoComprobar($i)) {
            echo "<li>$i</li>";
        }
    }
    echo "</ol>";

    function esPrimoComprobar($i)
    {
        for ($y = 2; $y < $i; $y++) {
            if (($i % $y) == 0) {
                return false;
            }
        }
        return true;
    }
    ?>


</body>

</html>