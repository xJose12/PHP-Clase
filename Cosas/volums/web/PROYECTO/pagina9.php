<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina 9</title>
</head>

<body>
    <?php    
    include 'funciones.php';
    referencias_menu();
    //Convertimos en array el archivo
    $videojuegos = array();
    cargarVideojuegos("JSON_Resultat_ordenat_alfabetic.json", $videojuegos);
    ficheroOrdenado($videojuegos);
    imprimirTabla($videojuegos);
    ?>
</body>

</html>