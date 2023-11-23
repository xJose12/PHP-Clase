<html>
<!-- 1. Investiga de quines maneres (amb quins arguments) s’ha de cridar a la funció date( ) perquè ens retorni els següents valors: -->
<h2>1. Investiga de quines maneres (amb quins arguments) s’ha de cridar a la funció date( ) perquè ens retorni els següents valors:</h2>

<?php
echo "Dia del mes amb números: " . date("d") . "<br>";
echo "Mes: " . date("m"). "<br>";
echo "Mes amb una representació textual (anglès): " . date("M"). "<br>";
echo "Any: " . date("Y") . "<br>";
echo "Dia de la setmana (anglès): " . date("l") . "<br>";
echo "Data completa en format Dia-Mes-Any: " . date("d-m-Y") . "<br>";
echo "Data completa en format Mes-Dia-Any: " . date("m-d-Y") . "<br>";
echo "Data completa en format Any-Mes-Dia: " . date("Y-m-d") . "<br>";
echo "Hora en format 24h: " . date("H") . "<br>" ;
echo "Hora en format 12h afegint “AM” o “PM: " . date("h a") . "<br>";
?>

<!-- 2. Escriu una funció en PHP que tradueixi la data i hora d’avui al català de manera automàtica, seguint el format de l’exemple: Divendres, 4 d’agost del 2023 a les 19 hores 15 minuts i 00 segons -->
<h2>2. Escriu una funció en PHP que tradueixi la data i hora d’avui al català de manera automàtica, seguint el format de l’exemple: Divendres, 4 d’agost del 2023 a les 19 hores 15 minuts i 00 segons</h2>

<?php
function decirFechaActual() {

    $dias = [
        "Monday" => "Lunes",
        "Tuesday" => "Martes",
        "Wednesday" => "Miércoles",
        "Thursday" => "Jueves",
        "Friday" => "Viernes",
        "Saturday" => "Sábado",
        "Sunday" => "Domingo"
    ];
    $meses = array(
        "January" => "Enero",
        "February" => "Febrero",
        "March" => "Marzo",
        "April" => "Abril",
        "May" => "Mayo",
        "June" => "Junio",
        "July" => "Julio",
        "August" => "Agosto",
        "September" => "Septiembre",
        "October" => "Octubre",
        "November" => "Noviembre",
        "December" => "Diciembre"
    );

    $dia = date("l");

    $mes = date("F");

    echo $dias[$dia] . ", " . date("d") . " de " . $meses[$mes] . " del " . date("Y") . " a las ". date("H") . " horas " . date("i") . " minutos i " . date("s") . " segundos". "<br>"; 
}

decirFechaActual();
?>

<!-- 3. Reescriu la funció anterior perquè tradueixi al català una data qualsevol passada per paràmetre com a “timestamp” -->
<h2>3. Reescriu la funció anterior perquè tradueixi al català una data qualsevol passada per paràmetre com a “timestamp”</h2>

<?php
function fechaConTimeStamp(&$timestamp)
{

    $dias = [
        "Monday" => "Lunes",
        "Tuesday" => "Martes",
        "Wednesday" => "Miércoles",
        "Thursday" => "Jueves",
        "Friday" => "Viernes",
        "Saturday" => "Sábado",
        "Sunday" => "Domingo"
    ];
    $meses = array(
        "January" => "Enero",
        "February" => "Febrero",
        "March" => "Marzo",
        "April" => "Abril",
        "May" => "Mayo",
        "June" => "Junio",
        "July" => "Julio",
        "August" => "Agosto",
        "September" => "Septiembre",
        "October" => "Octubre",
        "November" => "Noviembre",
        "December" => "Diciembre"
    );

    $dia = date("l", $timestamp);

    $mes = date("F", $timestamp);

    echo $dias[$dia] . ", " . date("d", $timestamp) . " de " . $meses[$mes] . " del " . date("Y", $timestamp) . " a las " . date("H", $timestamp) . " horas " . date("i", $timestamp) . " minutos i " . date("s", $timestamp) . " segundos" . "<br>";
}

$timestamp = "2012-12-13 12:12:12";
$timestamp = strtotime($timestamp);

fechaConTimeStamp($timestamp);
?>

</html>
