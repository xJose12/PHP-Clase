<?php
include "connect_db.php";
include "clase_cliente.php";

$consulta = new Client();
$resultado = $consulta->consultaTots("db", "root", "politecnic");
$arrayValues = $resultado->fetchAll(PDO::FETCH_ASSOC);
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
?>