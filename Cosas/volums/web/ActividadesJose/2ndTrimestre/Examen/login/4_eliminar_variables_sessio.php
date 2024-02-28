<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>
<a href="2_mostrar_variables_sessio.php"> Mostrar variables sessió </a>
</body>
</html>