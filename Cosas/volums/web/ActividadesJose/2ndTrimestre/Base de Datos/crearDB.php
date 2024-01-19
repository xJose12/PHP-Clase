<?php
include "connect_db.php";

try {
    echo "<br>";
    $sql = "CREATE DATABASE DatosFormulario";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database created successfully<br>";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
