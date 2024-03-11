<?php
// set the expiration date to one hour ago
setcookie("nom", "", time() - 3600,"/");
setcookie("idioma", "", time() - 3600,"/");
?>
<html>
<body>


<a href="2_mostrar_cookies.php"> Mostrar cookies </a>
<br>


</body>
</html>