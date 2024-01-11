<html>


<body>

    <h2>Ejercici1</h2>
    Tu Nombre es: <?php echo $_GET["nom"]; ?><br>
    Tu Apellido1 es: <?php echo $_GET["llinatge1"]; ?><br>
    Tu Apellido2 es: <?php echo $_GET["llinatge2"]; ?><br>

    <h2>Ejercici2</h2>
    Tu Nombre es: <?php echo $_GET["nom"]; ?><br>
    Tu Apellido1 es: <?php echo $_GET["llinatge1"]; ?><br>
    Tu Apellido2 es: <?php echo $_GET["llinatge2"]; ?><br>
    Tu Ciudad es: <?php echo $_GET["ciudad"]; ?><br>

    <h2>Ejercici3</h2>
    Tu Nombre es: <?php echo $_GET["nom"]; ?><br>
    Tu Apellido1 es: <?php echo $_GET["llinatge1"]; ?><br>
    Tu Apellido2 es: <?php echo $_GET["llinatge2"]; ?><br>
    Tu Ciudad es: <?php echo $_GET["ciudad"]; ?><br>
    Tu Aficiones: <?php echo $_GET["aficion1"], " ", $_GET["aficion2"], " ", $_GET["aficion3"]; ?><br>

    <h2>Ejercici4</h2>
    Tu Nombre es: <?php echo $_GET["nom"]; ?><br>
    Tu Apellido1 es: <?php echo $_GET["llinatge1"]; ?><br>
    Tu Apellido2 es: <?php echo $_GET["llinatge2"]; ?><br>
    Tu Ciudad es: <?php echo $_GET["ciudad"]; ?><br>
    Tu Aficiones: <?php echo $_GET["aficion1"], " ", $_GET["aficion2"], " ", $_GET["aficion3"]; ?><br>
    Tu Centro Escolar es: <?php echo $_GET["centre"]; ?><br>


    <h2>Array</h2>
    <?php
    $vehicles = $_GET["vehicle"];
    foreach ($vehicles as $vehicle) {
        echo $vehicle . "<br>";
    }
    ?>

</body>

</html>