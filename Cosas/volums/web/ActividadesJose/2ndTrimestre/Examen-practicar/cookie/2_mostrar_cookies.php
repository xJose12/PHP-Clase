<?php
if(isset($_COOKIE["idioma"])) {
    echo "Cookie idioma val ". $_COOKIE["idioma"];
} 
else
{
    echo "Cookie idioma no desada";
}
echo "<br>";
if (isset($_COOKIE["nom"]))
{
    echo "Cookie nom val ". $_COOKIE["nom"];
}
else
{
    echo "Cookie nom no desada";
}

?>
<br>
<a href="1_crear_cookie.php" > Crear cookies </a>
<br>
<a href="3_modificar_cookie.php" > Modificar cookies </a>
<br>
<a href="4_borrar_cookie.php" > Borrar cookie </a>