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
        ID: <input type="text" name="id"><br>
        Nom: <input type="text" name="nom"><br>
        Llinatge1: <input type="text" name="llinatge1"><br>
        Llinatge2: <input type="text" name="llinatge2"><br>
        Email: <input type="email" name="email"><br><br>

        <input type="submit"><br>

        <?php
        echo "<h2>Your Input:</h2>";
        $nom = $llinatge1 = $llinatge2 = $email = "";

        if ($_SERVER["REQUEST_METHOD"] == "GET" && test_input($_GET["nom"] != null)) {
            $id = test_input($_GET["id"]);
            $nom = test_input($_GET["nom"]);
            $llinatge1 = test_input($_GET["llinatge1"]);
            $llinatge2 = test_input($_GET["llinatge2"]);
            $email = test_input($_GET["email"]);

            $client = new Client();
            $client->modificar($servername, $username, $password, $id, $nom, $llinatge1, $llinatge2, $email);
            // $client->eliminar($servername, $username, $password, $id);
            // $client->inserir($servername, $username, $password, $nom, $llinatge1, $llinatge2, $email);

            $consulta = $client->consultaTots($servername, $username, $password);
            $arrayValues = $consulta->fetchAll(PDO::FETCH_ASSOC);
            echo "<table border=1px wdith=\"100%\">\n";
            echo "<tr>\n";
            foreach ($arrayValues[0] as $key => $useless) {
                echo "<th>$key</th>";
            }
            echo "</tr>";
            foreach ($arrayValues as $row) {
                echo "<tr>";
                foreach ($row as $key => $val) {
                    echo "<td>$val</td>";
                }
                echo "</tr>\n";
            }
            echo "</table>\n";

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