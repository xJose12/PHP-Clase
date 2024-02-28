<?php
// $servername = "db";
// $username = "root";
// $password = "politecnic";
// $dbname = "Juegos";

class BBDD
{
    private $servername;
    private $usuario;
    private $contraseña;
    private $bdname;

    public function __construct($servername, $usuario, $contraseña, $bdname)
    {
        $this->servername = $servername;
        $this->usuario = $usuario;
        $this->contraseña = $contraseña;
        $this->bdname = $bdname;
    }

    public function connectar_bd()
    {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->bdname;", $this->usuario, $this->contraseña);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Se ha conectado a la base de datos " . $this->bdname . "<br>";
        } catch (PDOException $e) {
            echo "Connection failed2: " . $e->getMessage();
        }
        return $conn;
    }

    public function borrar($desenvolupador)
    {
        $conn = $this->connectar_bd();
        try {
            $conn->exec("DELETE FROM desenvolupador WHERE id = '$desenvolupador'");
            echo "Se ha borrado un registro con la id $desenvolupador <br>";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;
    }
}

?>

<form action="POST"></form>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
    <h2>Borrar Desenvolupador</h2>
    ID: <input type="number" name="DesenvolupadorID"><br>
    <input type="submit">
</form> <br>

<?php
$desenvolupador = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && test_input($_GET["DesenvolupadorID"]!= null)) {
    $desenvolupador = test_input($_GET["DesenvolupadorID"]);

    echo "<h2>Insercciones</h2>";
    echo "Desenvolupador ID: $desenvolupador <br>";
    $bbdd = new BBDD("db", "root", "politecnic", "Juegos");
    $bbdd->borrar($desenvolupador);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>