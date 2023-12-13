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
        <div class="wrapper">
            <h1>PAGINA 9</h1>
            <h2>Ordenación alfabética de videojuegos</h2>
        </div>
    </header>
    <nav>
        <?php
        include 'funciones.php';
        referencias_menu();
        ?>
    </nav>
    <main>
        <div class="wrapper">
            <?php
            $videojuegos = array();
            cargarVideojuegos("games.json", $videojuegos);
            ficheroOrdenado($videojuegos);
            imprimirTabla($videojuegos);
            ?>
        </div>
    </main>
</body>

</html>