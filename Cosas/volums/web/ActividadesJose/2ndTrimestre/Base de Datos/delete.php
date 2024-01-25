<html>
<?php
include "connect_db.php";
try {
  
  // sql to delete a record
  $sql = "DELETE FROM DatosPersonas WHERE id=3";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Registro Borrado con exito";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>