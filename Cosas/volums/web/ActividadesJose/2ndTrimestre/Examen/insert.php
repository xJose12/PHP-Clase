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

    public function inserir($desenvolupador)
    {
        $conn = $this->connectar_bd();
        try {
            $conn->exec("INSERT INTO desenvolupador (nombre) VALUES ('$desenvolupador')");
            echo "Se ha añadido un nuevo registro <br>";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;
    }
}

?>

<form action="POST"></form>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
    <h2>Inserir Desenvolupador</h2>
    Nombre: <input type="text" name="DesenvolupadorNombre"><br>
    <input type="submit">
</form> <br>

<?php
$desenvolupador = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && test_input($_GET["DesenvolupadorNombre"]!= null)) {
    $desenvolupador = test_input($_GET["DesenvolupadorNombre"]);

    echo "<h2>Insercciones</h2>";
    echo "Desenvolupador Nombre: $desenvolupador <br>";
    $bbdd = new BBDD("db", "root", "politecnic", "Juegos");
    $bbdd->inserir($desenvolupador);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>