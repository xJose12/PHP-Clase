<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION["usuari"] = "cristina";
$_SESSION["idioma"] = "cat";
echo "Session variables are set.";
?>
<a href="2_mostrar_variables_sessio.php"> Mostrar variables sessió </a>

</body>
</html>