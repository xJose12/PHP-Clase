<?php
/* Aquest exemple, no és el mateix que al ww3school */
/* Aquí està simplificat. No fa ús d'herència */

include "connect_db.php";
try {
    $stmt = $conn->prepare("SELECT * FROM DatosPersonas");
    $stmt->execute();
    $conn = null;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$arrayValues = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<table border=1px wdith=\"100%\">\n";
echo "<tr>\n";
// add the table headers
foreach ($arrayValues[0] as $key => $useless) {
    echo "<th>$key</th>";
}
echo "</tr>";
// display data
foreach ($arrayValues as $row) {
    echo "<tr>";
    foreach ($row as $key => $val) {
        echo "<td>$val</td>";
    }
    echo "</tr>\n";
}
// close the table
echo "</table>\n";
