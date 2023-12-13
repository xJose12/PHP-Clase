<!-- Ana Maria Aguilera Contreras -->
<!-- Jose Antonio Valiente Guerrero -->

<?php

//FUNCION DE IMPRIMIR MENU PRINCIPAL
function referencias_menu()
{
    //IMPRIMIR Y REDIRIGIR A LAS PAGINAS QUE CONTIENEN LAS FUNCIONES QUE VAMOS A CREAR
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

//FUNCION CARGA DE JSON DE LOS VIDEOJUEGOS
function cargarVideojuegos($archivoJuegos, &$videojuegos)
{
    //CREACION DE VARIABLES Y ASIGNACIÓN DE LOS VALORES
    $videojuegos = array();

    //EJECUCIÓN DEL CODIGO
    $jsonString = file_get_contents($archivoJuegos);
    $videojuegos = json_decode($jsonString, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        die('Error  JSON: ' . json_last_error_msg());
    }
}

//FUNCION DE CREACION DE ARCHIVOS JSON
function crearJSON(&$videojuegos, $nombreArchivo)
{
    // GUARDA LA VARIABLE &$videojuegos EN UN ARCHIVO JSON
    $videojuegos = array_values($videojuegos);
    $json_datos = json_encode($videojuegos, JSON_PRETTY_PRINT);
    file_put_contents($nombreArchivo, $json_datos);
}

//FUNCION 1
//CREACIÓN DE LA FUNCIÓN "IMPRIMIR TABLA" PASADO POR PARAMETRO EL ARRAY "VIDEOJUEGOS" 
function imprimirTabla(&$videojuegos)
{
    //EJECUCIÓN DEL CODIGO
    //IMPRIMIMOS LA TABLA AYUDANDONOS DEL FOREACH PARA RECORRER LA VARIABLE VALOR POR VALOR, CREANDO LA CABEZERA Y LAS FILAS UNA POR UNA
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
//CREACION DE LA FUNCION "ASIGNAR CODIGO" LA CUAL ASIGNA CODIGO SI ES NECESARIO
function asignarCodigo(&$videojuegos)
{
    //CREACION DE VARIABLES Y ASIGNACIÓN DE LOS VALORES
    $contador = 1;
    $valorMaximo = null;

    //EJECUCIÓN DEL CODIGO
    //RECORRE EL ARRAY 
    foreach ($videojuegos as &$titulos) {
        //CRECION DE LA VARIABLE DONDE SE HARA UNA INSERCCION DE LA COLUMNA CODIGO CON SUS VALORES
        $codigo = $titulos['Codigo'];
        if ($valorMaximo == null || $codigo > $valorMaximo) {
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

    //ORDENAMOS LOS VIDEOJUEGOS POR CODIGO EN ESTE CASO, NUMERICAMENTE DE MENOR A MAYOR
    sort($videojuegos);

    //CREACION DEL NUEVO JSON QUE ALMACENARÁ EN "games.json" la variable &$videojuegos con la asignación de los codigos
    crearJSON($videojuegos, "games.json");

    //LLAMAMOS A LA FUNCION imprimirTabla PARA IMPRIMIR NUESTRA TABLA
    imprimirTabla($videojuegos);
}

//FUNCION 3
//CREACION DE LA FUNCION "FICHERO ELIMINAR" NECESITARA QUE SE LE PASE POR PARAMETRO EL ARRAY "VIDEOJUEGOS" U OTRO JUNTO A LAS FECHAS
function ficheroEliminar($fecha1, $fecha2, &$videojuegos)
{
    //EJECUCIÓN DEL CODIGO    
    //RECORRE EL ARRAY Y ELIMINA UN INTERVALO DE FECHAS DEL ARRAY
    foreach ($videojuegos as $titulos => $valor) {
        if ($valor['Llançament'] >= $fecha1 && $valor['Llançament'] <= $fecha2) {
            unset($videojuegos[$titulos]);
        }
    }
    //CREACION DEL NUEVO JSON QUE ALMACENARÁ EN "JSON_Resultat_Eliminar.json" LA VARIABLE &$videojuegos CON LOS JUEGOS QUE NO ESTAN ENTRE LAS 2 FECHAS
    crearJSON($videojuegos, "JSON_Resultat_Eliminar.json");

    //LLAMAMOS A LA FUNCION imprimirTabla PARA IMPRIMIR NUESTRA TABLA
    imprimirTabla($videojuegos);
}

//FUNCION 4
//CREACION DE LA FUNCION "FICHERO EXPIRACION" LA CUAL AGREGA UNA NUEVA COLUMNA DE FECHAS DE EXPERACIÓN CON 5 AÑOS SOBRE LA FECHA DE LANZAMIENTO
function ficheroExpiracion(&$videojuegos)
{
    //EJECUCIÓN DEL CODIGO
    foreach ($videojuegos as &$titulos) {
        $lanzamiento = $titulos['Llançament'];
        $fechaLanzamiento = new DateTime($lanzamiento);
        $fechaLanzamiento->modify('+5 years');
        $titulos['Expiracion'] = $fechaLanzamiento->format('Y-m-d');
    }

    //CREACION DEL NUEVO JSON QUE ALMACENARÁ EN "JSON_Resultat_Data_Expiració.json" LA VARIABLE &$videojuegos CON LOS JUEGOS Y LA FECHA DE EXPIRACION (+ 5 AÑOS)
    crearJSON($videojuegos, "JSON_Resultat_Data_Expiració.json");

    //LLAMAMOS A LA FUNCION imprimirTabla PARA IMPRIMIR NUESTRA TABLA
    imprimirTabla($videojuegos);
}

//FUNCION 5
//CREACION DE LA FUNCION "COMPROBAR REPETIDOS" QUE COMPRUEBA LOS REPETIDOS Y MUESTRA POR PANTALLA SI HAY NO REGISTROS REPETIDOS
function comprobarRepetidos(&$videojuegos)
{
    //CREACION DE VARIABLES Y ASIGNACIÓN DE LOS VALORES
    $nombres = array();

    //EJECUCIÓN DEL CODIGO
    foreach ($videojuegos as &$titulos) {
        $nombre = $titulos['Nom'];

        if (in_array($nombre, $nombres)) {
            echo "<h2>Hay registros repetidos</h2>";
            echo "<img src=https://media.tenor.com/WsmiS-hUZkEAAAAj/verify.gif>";
            return 1;
        } else {
            $nombres[] = $nombre;
        }
    }
    echo "<h2>No hay registros repetidos</h2>";
    echo "<img src=https://images.emojiterra.com/google/noto-emoji/unicode-15/animated/274c.gif width = 20%>";
    return 0;
}

//FUNCION 6
//CREACION DE LA FUNCION "FICHERO REPETIDOS" QUE COGE LOS VALORES REPETIDOS Y LOS IMPRIME POR PANTALLA
function ficheroRepetidos(&$videojuegos)
{
    //CREACION DE VARIABLES Y ASIGNACIÓN DE LOS VALORES
    $nombres = array();
    $repetidos = array();

    //EJECUCIÓN DEL CODIGO
    foreach ($videojuegos as $titulos) {
        $nombre = $titulos['Nom'];

        if (in_array($nombre, $nombres)) {
            $repetidos[] = $titulos;
        } else {
            $nombres[] = $nombre;
        }
    }

    echo "<h2>En caso de haya repetidos se imprimirá la tabla, de lo contrario no.</h2>";

    //CREACION DEL NUEVO JSON QUE ALMACENARÁ EN "JSON_Resultat_repetits.json" LA VARIABLE &$videojuegos CON LOS VIDEOJUEGOS QUE SE REPITEN
    crearJSON($repetidos, "JSON_Resultat_repetits.json");

    //COMPROBADOR SI HAY REPETIDOS PARA IMPRIMIRLO EN LA PANTALLA, DE LO CONTRARIO NO LO HARA, ESTO SE HACE PARA EVITAR UN ERROR EN CASO DE QUE NO HAYA NINGUNO Y SE LLAME A LA FUNCION "IMPRIMIR TABLA"
    if ($repetidos != null) {
        imprimirTabla($repetidos);
    }
}

//FUNCION 7
//CREACION DE LA FUNCION "FICHERO ELIMINAR REPETIDOS" QUE APARTA LOS VALORES REPETIDOS Y IMPRIME TODOS LOS DEMAS
function ficheroEliminarRepetidos(&$videojuegos)
{
    //CREACION DE VARIABLES Y ASIGNACIÓN DE LOS VALORES
    $nombres = array();
    $repetidos = array();
    $noRepetidos = array();

    //EJECUCIÓN DEL CODIGO
    foreach ($videojuegos as $titulos) {
        $nombre = $titulos['Nom'];

        if (in_array($nombre, $nombres)) {
            $repetidos[] = $titulos;
        } else {
            $nombres[] = $nombre;
            $noRepetidos[] = $titulos;
        }
    }

    //CREACION DEL NUEVO JSON QUE ALMACENARÁ EN "JSON_Resultat_eliminar_repetits.json" LA VARIABLE &$videojuegos CON TODOS LOS JUEGOS MENOS LOS QUE SE REPITEN
    crearJSON($noRepetidos, "JSON_Resultat_eliminar_repetits.json");

    echo "<h2>En la siguiente tabla se ha eliminado cualquier registro repetido que pudiera contener.</h2>";

    //LLAMAMOS A LA FUNCION imprimirTabla PARA IMPRIMIR NUESTRA TABLA
    imprimirTabla($noRepetidos);
}

//FUNCION 8
//CREACION DE LA FUNCION "MODERNO ANTIGUO" QUE ALMACENA EL PRIMERO JUEGO DEL ARRAY Y LO VA COMPARANDO CON LOS DEMAS PARA VER CUAL ES EL MAS ANTIGUO O MODERNO
function ModernoAntiguo(&$videojuegos)
{
    //CREACION DE VARIABLES Y ASIGNACIÓN DE LOS VALORES
    $juegoAntiguo = null;
    $juegoModerno = null;

    //EJECUCIÓN DEL CODIGO
    foreach ($videojuegos as $titulos) {
        $fechas = $titulos['Llançament'];
        $fechaLanzamiento = new DateTime($fechas);

        if ($juegoModerno == null || $fechaLanzamiento < $juegoAntiguo['Llançament']) {
            $juegoAntiguo = $titulos;
            $juegoAntiguo['Llançament'] = $fechaLanzamiento;
        }

        if ($juegoModerno == null || $fechaLanzamiento > $juegoModerno['Llançament']) {
            $juegoModerno = $titulos;
            $juegoModerno['Llançament'] = $fechaLanzamiento;
        }
    }

    //IMPRIMIMOS 2 TABLAS PARA MOSTRAR EL JUEGO MAS ANTIGUO Y MODERNO, ADJUNTANDO EL NOMBRE Y FECHAS DE LANZAMIENTO CORRESPONDIENTES
    echo "<table border='1'>";
    echo "<tr><th>Nombre del Juego Más Antiguo</th><th>Fecha de Lanzamiento</th></tr>";
    echo "<tr><td>{$juegoAntiguo['Nom']}</td><td>{$juegoAntiguo['Llançament']->format('Y-m-d')}</td></tr>";
    echo "</table>";

    echo "<br>";

    echo "<table border='1'>";
    echo "<tr><th>Nombre del Juego Más Moderno</th><th>Fecha de Lanzamiento</th></tr>";
    echo "<tr><td>{$juegoModerno['Nom']}</td><td>{$juegoModerno['Llançament']->format('Y-m-d')}</td></tr>";
    echo "</table>";
}

//FUNCION 9
//CREACION DE LA FUNCION "FICHERO ORDENADO" LA CUAL CREA UN FICHERO DONDE SE ALMACENAN Y ORDENAN ALFABETICAMENTE LOS VIDEOJUEGOS
function ficheroOrdenado(&$videojuegos)
{
    //CREACION DE VARIABLES Y ASIGNACIÓN DE LOS VALORES
    $nombres = array_column($videojuegos, 'Nom');

    //EJECUCIÓN DEL CODIGO
    array_multisort($nombres, $videojuegos);


    //CREACION DEL NUEVO JSON QUE ALMACENARÁ EN "JSON_Resultat_ordenat_alfabetic.json" LA VARIABLE &$videojuegos CON LOS JUEGOS ORDENAOS POR NOMBRE ALFABETICAMENTE
    crearJSON($videojuegos, "JSON_Resultat_ordenat_alfabetic.json");

    //LLAMAMOS A LA FUNCION imprimirTabla PARA IMPRIMIR NUESTRA TABLA
    imprimirTabla($videojuegos);
}

//FUNCION 10
//CREACION DE LA FUNCION "CONTAR VIDEOJUEGOS" QUE BASICAMENTE EXTRAE AÑO POR AÑO DE LA ARRAY Y A SU VEZ VA AUMENTANDO UN VALOR QUE SE LE ASIGNA AL AÑO
function contarVideojuegos(&$videojuegos)
{
    //CREACION DE VARIABLES Y ASIGNACIÓN DE LOS VALORES
    $años = array();

    //EJECUCIÓN DEL CODIGO
    foreach ($videojuegos as $titulos) {
        $añoLanzamiento = date("Y", strtotime($titulos['Llançament']));

        if ($años[$añoLanzamiento]) {
            $años[$añoLanzamiento]++;
        } else {
            $años[$añoLanzamiento] = 1;
        }
    }
    ksort($años);

    //CREAMOS UNA TABLA PARA MOSTRAR CADA AÑO Y EL NUMERO DE JUEGOS QUE TIENE, HACIENDO USO DE LA VARIABLE $años
    echo "<table border='1'>";
    echo "<tr><th>Año</th><th>Cantidad de Videojuegos</th></tr>";

    foreach ($años as $año => $cantidad) {
        echo "<tr>";
        echo "<td>$año</td><td>$cantidad</td>";
        echo "</tr>";
    }

    echo "</table>";
}