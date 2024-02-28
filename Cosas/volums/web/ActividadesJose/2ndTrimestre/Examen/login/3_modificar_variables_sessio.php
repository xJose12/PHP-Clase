<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// to change a session variable, just overwrite it
$_SESSION["idioma"] = "cas";
?>
<a href="2_mostrar_variables_sessio.php"> Mostrar variables sessió </a>
</body>
</html>