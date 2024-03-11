<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page
echo "L'usuari connectat es " . $_SESSION["usuari"] . ".<br>";
echo "L'idioma amb el que s'ha connectat és " . $_SESSION["idioma"] . ".";
?>
<br>
<a href="1_session_start.php"> Inici sessió</a>
<br>
<a href="3_modificar_variables_sessio.php">Modificar variables sessió</a>
<br>
<a href="4_eliminar_variables_sessio.php"> Eliminar variables sessió </a>
</body>
</html>