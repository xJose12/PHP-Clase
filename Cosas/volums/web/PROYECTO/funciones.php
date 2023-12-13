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

//FUNCION DE CREACION DE ARCHIVOS JSON
function crearJSON(&$videojuegos, $nombreArchivo) 
{
    $videojuegos = array_values($videojuegos);
    $json_datos = json_encode($videojuegos, JSON_PRETTY_PRINT);
    // Desar el format JSON a un arxiu JSON
    file_put_contents($nombreArchivo, $json_datos);    
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
function asignarCodigo(&$videojuegos)
{
    $contador = 1;
    $valorMaximo = null;
    foreach ($videojuegos as &$titulos) {
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
    sort($videojuegos);
    crearJSON($videojuegos, "games.json"); 
}

//FUNCION 3
// Convertir array a format JSON
function ficheroEliminar($fecha1, $fecha2, &$videojuegos)
{
    foreach ($videojuegos as $titulos => $valor) {
        if ($valor['Llançament'] >= $fecha1 && $valor['Llançament'] <= $fecha2) {
            unset($videojuegos[$titulos]);
        }
    }
    crearJSON($videojuegos, "JSON_Resultat_Eliminar.json");
}

//FUNCION 4
function ficheroExpiracion(&$videojuegos)
{
    foreach ($videojuegos as &$titulos) {
        $lanzamiento = $titulos['Llançament'];
        $fechaLanzamiento = new DateTime($lanzamiento);
        $fechaLanzamiento->modify('+5 years');
        $titulos['Expiracion'] = $fechaLanzamiento->format('Y-m-d');
    }
    crearJSON($videojuegos,"JSON_Resultat_Data_Expiració.json");
}

//FUNCION 5
function comprobarRepetidos(&$videojuegos)
{
    $nombres = array();
    foreach ($videojuegos as &$titulos) {
        $nombre = $titulos['Nom'];
        
        if (in_array($nombre, $nombres)) {
            echo "Hay registros repetidos";
            return 1;
        } else {
            $nombres[] = $nombre;
        }
    } 
    echo "No hay registros repetidos";
    return 0;   
}

//FUNCION 6
function ficheroRepetidos(&$videojuegos) {
    $nombres = array();
    $repetidos = array();

    foreach ($videojuegos as $titulos) {
        $nombre = $titulos['Nom'];

        if (in_array($nombre, $nombres)) {
            $repetidos[] = $titulos;
        } else {
            $nombres[] = $nombre;
        }
    } 

    echo "<h2>En caso de haya repetidos se imprimirá la tabla, de lo contrario no.</h2>";

    crearJSON($repetidos,"JSON_Resultat_repetits.json");
    
    if ($repetidos != null) {
        imprimirTabla($repetidos);
    }
}

//FUNCION 7
function ficheroEliminarRepetidos(&$videojuegos) {
    $nombres = array();
    $repetidos = array();
    $noRepetidos = array();

    foreach ($videojuegos as $titulos) {
        $nombre = $titulos['Nom'];

        if (in_array($nombre, $nombres)) {
            $repetidos[] = $titulos;
        } else {
            $nombres[] = $nombre;
            $noRepetidos[] = $titulos;
        }
    } 
    crearJSON($noRepetidos,"JSON_Resultat_eliminar_repetits.json");

    echo "<h2>En la siguiente tabla se ha eliminado cualquier registro repetido que pudiera contener.</h2>";
    imprimirTabla($noRepetidos);
}

//FUNCION 8
function ModernoAntiguo(&$videojuegos) {
    $juegoAntiguo = null;
    $juegoModerno = null;

    foreach($videojuegos as $titulos) {
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
    echo "Juego antiguo:";
    print_r($juegoAntiguo);
    echo "<br>", "<br>";
    echo "Juego Moderno";
    print_r($juegoModerno);
}

//FUNCION 9
function ficheroOrdenado(&$videojuegos) {
    $nombres = array_column($videojuegos, 'Nom');
    array_multisort($nombres, $videojuegos);
    
    crearJSON($videojuegos, "JSON_Resultat_ordenat_alfabetic.json");
}

//FUNCION 10
function contarVideojuegos(&$videojuegos) {
    $años = [];
    foreach($videojuegos as $titulos) {
        $añoLanzamiento = date("Y", strtotime($titulos['Llançament']));
        
        if ($años[$añoLanzamiento] ) {
            $años[$añoLanzamiento]++ ;
        } else {
            $años[$añoLanzamiento] = 1;
        }
    }
    ksort($años);
    
    echo "<table border='1'>";
    echo "<tr><th>Año</th><th>Cantidad de Videojuegos</th></tr>";
    
    foreach($años as $año => $cantidad) {
        echo "<tr>";
        echo "<td>$año</td><td>$cantidad</td>";
        echo "</tr>";
    }
    
    echo "</table>";
}
