<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<nav>
    <nav>
        <a href="index.php"> Pagina Inicio</a>
        <a href="alta.php"> Funcion 1</a>
        <a href="cerca.php"> Funcion 2</a>
        <a href="exporta.php"> Funcion 3</a>
    </nav>
</nav>

<body>
    <?php
    include 'clase.php';
    ?>
    <h1>FUNCIONALIDAD 1</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
        <h2>Insertar Pelicula</h2>
        Titulo: <input type="text" name="PeliculaNombre"><br>
        <h3>Pais</h3>
        <input type="radio" id="pais1" name="pais" value="SPAIN">
        <label for="ciudad1">España</label>
        <input type="radio" id="pais2" name="pais" value="ENGLAND">
        <label for="ciudad2">Inglaterra</label>
        <input type="radio" id="pais3" name="pais" value="US">
        <label for="ciudad3">America</label><br><br>
        Fecha de Lanzamiento: <input type="date" name="fecha"><br><br>
        Presupuesto: <input type="int" name="presupuesto"><br><br>
        <input type="submit" value="Insertar Pelicula">
    </form> <br>

    <?php
    $nombrePelicula = $pais = $fecha = $presupuesto = "";

    if ($_SERVER["REQUEST_METHOD"] == "GET" && test_input($_GET["PeliculaNombre"] != null) && test_input($_GET["pais"] != null) && test_input($_GET["fecha"] != null) && test_input($_GET["presupuesto"] != null)) {

        $nombrePelicula = test_input($_GET["PeliculaNombre"]);
        $pais = test_input($_GET["pais"]);
        $fecha = test_input($_GET["fecha"]);
        $presupuesto = test_input($_GET["presupuesto"]);

        echo "<h2>Insercciones</h2>";
        $bbdd = new basededades("db", "root", "politecnic", "peliculas");
        $bbdd->inserir($nombrePelicula, $fecha, $presupuesto, $pais);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
</body>

</html>