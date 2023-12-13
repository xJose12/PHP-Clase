<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROYECTO PHP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>PAGINA 9</h1>
        <h2>Ordenación alfabética de videojuegos</h2>
        <nav>
            <?php
            include 'funciones.php';
            referencias_menu();
            ?>
        </nav>
    </header>
    <main>
        <?php
    $videojuegos = array();
    cargarVideojuegos("games.json", $videojuegos);
    ficheroOrdenado($videojuegos);
    imprimirTabla($videojuegos);
        ?>
    </main>
</body>

</html>