<?php
// SIEMPRE ARRIBA EL INCLUDE
include "connect_db.php";
include "clase_cliente.php";
?>

<form method="get" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <fieldset>
        <legend>
            <h2>Ejercici 5</h2>
        </legend>
        <h3>Nombres y Apellidos</h3>
        Nom: <input type="text" name="nom"><br>
        Llinatge1: <input type="text" name="llinatge1"><br>
        Llinatge2: <input type="text" name="llinatge2"><br>
        Email: <input type="email" name="email"><br><br>

        <input type="submit"><br>

        <?php
        echo "<h2>Your Input:</h2>";
        // define variables and set to empty values
        $nom = $llinatge1 = $llinatge2 = $email = "";

        if ($_SERVER["REQUEST_METHOD"] == "GET" && test_input($_GET["nom"] != null)) {
            $nom = test_input($_GET["nom"]);
            $llinatge1 = test_input($_GET["llinatge1"]);
            $llinatge2 = test_input($_GET["llinatge2"]);
            $email = test_input($_GET["email"]);
            
            // $ciudad = test_input($_GET["ciudad"]);
            // if (test_input($_GET["aficion"] != null)) {
            //     $aficiones = test_input(implode(', ', $_GET["aficion"]));
            // }
            // $centre = test_input($_GET["centre"]);

            // try {
            //     $sql = "INSERT INTO DatosPersonas (nom, llinatge1, llinatge2, email)
            //     VALUES ('$nom', '$llinatge1', '$llinatge2', '$email')";
            //     $conn->exec($sql);
            //     echo "Se ha añadido un nuevo registro <br>";
            //     $last_id = $conn->lastInsertId();
            //     echo "Registro con exito!. El Ultimo id es: " . $last_id;
            // } catch (PDOException $e) {
            //     echo $sql . "<br>" . $e->getMessage();
            // }

            // $conn = null;

            $client = new Client();
            $client -> inserir($servername, $username, $password, $nom, $llinatge1, $llinatge2, $email);
        }

        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
    </fieldset>
</form>