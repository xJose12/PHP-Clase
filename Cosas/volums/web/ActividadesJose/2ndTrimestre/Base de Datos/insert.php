<html>
<?php
include "connect_db.php";
try {
    $sql = "INSERT INTO DatosPersonas (nom, llinatge1, llinatge2, email)
    VALUES ('Ana Maria', 'Aguilera', 'Contreras', 'anamariaac@gmail.com')";
    $conn->exec($sql);
    echo "New record created successfully";
    $last_id = $conn->lastInsertId();
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>