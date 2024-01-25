<?php
include "connect_db.php";

try {
  
  $sql = "UPDATE DatosPersonas SET llinatge2='Valiente' WHERE id=2";

  // Prepare statement
  $stmt = $conn->prepare($sql);

  // execute the query
  $stmt->execute();

  // echo a message to say the UPDATE succeeded
  echo $stmt->rowCount() . " registro actualizado con exito!";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>