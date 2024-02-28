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
            echo "Se ha conectado a la base de datos " . $this->bdname;
        } catch (PDOException $e) {
            echo "Connection failed2: " . $e->getMessage();
        }
        return $conn;
    }

    public function consultar_bd($tablaConsultar) {
        $conn = $this->connectar_bd();
        try {
            $resultado = $conn->prepare("SELECT * FROM $tablaConsultar");
            $resultado->execute();
            $conn = null;
            return ($resultado);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $arrayValues = $resultado->fetchAll(PDO::FETCH_ASSOC);
        echo "<table border=1px wdith=\"100%\">\n";
        echo "<tr>\n";
        // add the table headers
        foreach ($arrayValues[0] as $key => $useless) {
            echo "<th>$key</th>";
        }
        echo "</tr>";
        // display data
        foreach ($arrayValues as $row) {
            echo "<tr>";
            foreach ($row as $key => $val) {
                echo "<td>$val</td>";
            }
            echo "</tr>\n";
        }
        // close the table
        echo "</table>\n";
    }
}

$tablaConsultar = "desenvolupador";

$conn = new BBDD("db", "root", "politecnic", "Juegos");
$consulta = $conn->consultar_bd($tablaConsultar);


$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
    <label for="eliminar">Elige tu Desenvolupador:</label><br>
    <select name="eliminar" id="eliminar">
        <option value="" selected>Selecciona tu desenvolupador</option>
        <?php
        foreach ($resultado as $row) {
            echo '<option value="' . $row["nombre"] . '">' . $row["nombre"] . '</option>';
        }
        ?>
    </select>
    <input type="submit" value="Eliminar">
</form>
