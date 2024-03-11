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
    <h1>FUNCIONALIDAD 3</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
        <input type="submit" value="Insertar JSON de Peliculas" name="importar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && test_input($_GET["importar"] != null)) {
        $bbdd = new basededades("db", "root", "politecnic", "peliculas");
        $bbdd->importarJson("pelis.json");
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