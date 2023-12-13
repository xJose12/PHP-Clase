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
        <h1>PAGINA 6</h1>
        <h2>Comprobar repetidos ampliada</h2>
        <nav>
            <?php
            include 'funciones.php';
            referencias_menu();
            ?>
        </nav>
    </header>
    <main>
        <?php
        //Convertimos en array el archivo
        $videojuegos = array();
        cargarVideojuegos("games.json", $videojuegos);
        ficheroRepetidos($videojuegos);
        ?>
    </main>
</body>

</html>