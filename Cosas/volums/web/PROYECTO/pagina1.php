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
        <h1>PAGINA 1</h1>
        <H2>Mostar los videojuegos</H2>
        <nav>
            <?php
            include 'funciones.php';
            referencias_menu();
            ?>
        </nav>
    </header>
    <main>
        <?php
            //CONVERTIMOS EN ARRAY EN ARCHIVO 
            $videojuegos = array();
            cargarVideojuegos("games.json", $videojuegos);

            //LLAMAMOS A LA FUNCION imprimirTabla PARA IMPRIMIR NUESTRA TABLA
            imprimirTabla($videojuegos);
        ?>
    </main>
</body>

</html>
