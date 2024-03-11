<?php
//El setcookie ha d'anar abans del tag <html>
setcookie("idioma", "catala",time() + (86400 * 30), "/"); 
// 86400 segons  = 1 day.  Time torna els segons que hi ha entre
//avui i 1970
// La / indica que aquesta cookie tindrà validesa, a tot el 
// domini, no sols al directorio on està aquest arxiu
setcookie("nom", "cristina",time() + (86400 * 30), "/"); 
?>
<html>
<body>
<a href="2_mostrar_cookies.php"> Veure cookies </a>


</body>
</html>