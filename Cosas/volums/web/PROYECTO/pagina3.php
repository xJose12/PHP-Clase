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
            <h1>PAGINA 3</h1>
            <h2>Eliminar entre 2 fechas</h2>
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
            //Convertimos en array el archivo
            $videojuegos = array();
            cargarVideojuegos("games.json", $videojuegos);
            //Crear el archivo JSON_Resultat_Eliminar.json
            ficheroEliminar("2016-01-01", "2020-12-31", $videojuegos);
            ?>
        </div>
    </main>
</body>

</html>