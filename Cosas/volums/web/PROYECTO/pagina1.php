<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROYECTO PHP</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <header>
        <div class="wrapper">
            <h1>PAGINA 1</h1>
            <H2>Mostar los videojuegos</H2>
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
            cargarVideojuegos("games.json", $videojuegos);
            //LLAMAMOS A LA FUNCION imprimirTabla PARA IMPRIMIR NUESTRA TABLA
            imprimirTabla($videojuegos);
            ?>
        </div>
    </main>
</body>

</html>