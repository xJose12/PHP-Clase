<!DOCTYPE HTML>
<html>

<body>
    <form action="processar_prova1.php" method="get">
        <fieldset>
            <legend>
                <h2>Ejercici1</h2>
            </legend>
            <h3>Nombres y Apellidos</h3>
            Nom: <input type="text" name="nom"><br>
            Llinatge1: <input type="text" name="llinatge1"><br>
            Llinatge2: <input type="text" name="llinatge2"><br><br>
            <input type="submit"><br>
        </fieldset>
    </form>

    <form action="processar_prova1.php" method="get">
        <fieldset>
            <legend>
                <h2>Ejercici2</h2>
            </legend>
            <h3>Nombres y Apellidos</h3>
            Nom: <input type="text" name="nom"><br>
            Llinatge1: <input type="text" name="llinatge1"><br>
            Llinatge2: <input type="text" name="llinatge2"><br>
            <h3>Ciudad</h3>
            <input type="radio" id="ciudad1" name="ciudad" value="Inca">
            <label for="ciudad1">Inca</label>
            <input type="radio" id="ciudad2" name="ciudad" value="Palma">
            <label for="ciudad2">Palma</label>
            <input type="radio" id="ciudad3" name="ciudad" value="Manacor">
            <label for="ciudad3">Manacor</label><br><br>
            <input type="submit"><br>
        </fieldset>
    </form>

    <form action="processar_prova1.php" method="get">
        <fieldset>
            <legend>
                <h2>Ejercici3</h2>
            </legend>
            <h3>Nombres y Apellidos</h3>
            Nom: <input type="text" name="nom"><br>
            Llinatge1: <input type="text" name="llinatge1"><br>
            Llinatge2: <input type="text" name="llinatge2"><br>
            <h3>Ciudad</h3>
            <input type="radio" id="ciudad1" name="ciudad" value="Inca">
            <label for="ciudad1">Inca</label>
            <input type="radio" id="ciudad2" name="ciudad" value="Palma">
            <label for="ciudad2">Palma</label>
            <input type="radio" id="ciudad3" name="ciudad" value="Manacor">
            <label for="ciudad3">Manacor</label><br>
            <h3>Aficiones</h3>
            <input type="checkbox" id="aficion1" name="aficion1" value="Jugar">
            <label for="aficion1"> Jugar</label><br>
            <input type="checkbox" id="aficion2" name="aficion2" value="Pasear">
            <label for="aficion2"> Pasear</label><br>
            <input type="checkbox" id="aficion3" name="aficion3" value="Dormir">
            <label for="aficion3"> Dormir</label><br><br>
            <input type="submit"><br>
        </fieldset>
    </form>

    <form action="processar_prova1.php" method="get">
        <fieldset>
            <legend>
                <h2>Ejercici4</h2>
            </legend>
            <h3>Nombres y Apellidos</h3>
            Nom: <input type="text" name="nom"><br>
            Llinatge1: <input type="text" name="llinatge1"><br>
            Llinatge2: <input type="text" name="llinatge2"><br>
            <h3>Ciudad</h3>
            <input type="radio" id="ciudad1" name="ciudad" value="Inca">
            <label for="ciudad1">Inca</label>
            <input type="radio" id="ciudad2" name="ciudad" value="Palma">
            <label for="ciudad2">Palma</label>
            <input type="radio" id="ciudad3" name="ciudad" value="Manacor">
            <label for="ciudad3">Manacor</label><br>
            <h3>Aficiones</h3>
            <input type="checkbox" id="aficion1" name="aficion1" value="Jugar">
            <label for="aficion1"> Jugar</label><br>
            <input type="checkbox" id="aficion2" name="aficion2" value="Pasear">
            <label for="aficion2"> Pasear</label><br>
            <input type="checkbox" id="aficion3" name="aficion3" value="Dormir">
            <label for="aficion3"> Dormir</label><br><br>
            <h3>Centro Escolar</h3>
            <label for="centre">Selecciona tu Centro:</label><br>
            <select id="centre" name="centre">
                <option value="IES MANACOR">IES MANACOR</option>
                <option value="IES PAU CASESNOVES">IES PAU CASESNOVES</option>
                <option value="IES BERENGUER">IES BERENGUER</option>
            </select><br><br>
            <input type="submit"><br>
        </fieldset>
    </form>

    <form action="processar_prova1.php" method="get">
        <fieldset>
            <legend>
                <h3>Array</h3>
            </legend>
            <input type="checkbox" id="vehicle1" name="vehicle[]" value="Bicicleta">
            <label for="vehicle1"> Tenc una bicicleta</label><br>
            <input type="checkbox" id="vehicle2" name="vehicle[]" value="Cotxe">
            <label for="vehicle2">Tenc un cotxe</label><br>
            <input type="checkbox" id="vehicle3" name="vehicle[]" value="Vaixell">
            <label for="vehicle3">Tenc un vaixell</label><br><br>
            <input type="submit"><br>
        </fieldset>
    </form>

    <form method="get" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <fieldset>
            <legend>
                <h2>Ejercici 5</h2>
            </legend>
            <h3>Nombres y Apellidos</h3>
            Nom: <input type="text" name="nom"><br>
            Llinatge1: <input type="text" name="llinatge1"><br>
            Llinatge2: <input type="text" name="llinatge2"><br>
            <h3>Ciudad</h3>
            <input type="radio" id="ciudad1" name="ciudad" value="Inca">
            <label for="ciudad1">Inca</label>
            <input type="radio" id="ciudad2" name="ciudad" value="Palma">
            <label for="ciudad2">Palma</label>
            <input type="radio" id="ciudad3" name="ciudad" value="Manacor">
            <label for="ciudad3">Manacor</label><br>
            <h3>Aficiones</h3>
            <input type="checkbox" id="aficion1" name="aficion[]" value="Jugar">
            <label for="aficion1"> Jugar</label><br>
            <input type="checkbox" id="aficion2" name="aficion[]" value="Pasear">
            <label for="aficion2"> Pasear</label><br>
            <input type="checkbox" id="aficion3" name="aficion[]" value="Dormir">
            <label for="aficion3"> Dormir</label><br><br>
            <h3>Centro Escolar</h3>
            <label for="centre">Selecciona tu Centro:</label><br>
            <select id="centre" name="centre">
                <option value="IES MANACOR">IES MANACOR</option>
                <option value="IES PAU CASESNOVES">IES PAU CASESNOVES</option>
                <option value="IES BERENGUER">IES BERENGUER</option>
            </select><br><br>
            <input type="submit"><br>


            <?php

            // define variables and set to empty values
            $nom = $llinatge1 = $llinatge2 = $ciudad = $aficiones = $centre = "";

            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $nom = test_input($_GET["nom"]);
                $llinatge1 = test_input($_GET["llinatge1"]);
                $llinatge2 = test_input($_GET["llinatge2"]);
                $ciudad = test_input($_GET["ciudad"]);
                if (test_input($_GET["aficion"] != null)) {
                    $aficiones = test_input(implode(', ', $_GET["aficion"]));
                }
                $centre = test_input($_GET["centre"]);
            }

            function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            ?>

            <?php
            echo "<h2>Your Input:</h2>";
            echo "Tu nombre es: $nom";
            echo "<br>";
            echo "Tu primer apellido es: $llinatge1";
            echo "<br>";
            echo "Tu segundo apellido es: $llinatge2";
            echo "<br>";
            echo "Tu ciudad es: $ciudad";
            echo "<br>";
            echo "Tus aficiones son: $aficiones";
            echo "<br>";
            echo "Tu centro escolar es: $centre";
            ?>

        </fieldset>
    </form>

</body>

</html>