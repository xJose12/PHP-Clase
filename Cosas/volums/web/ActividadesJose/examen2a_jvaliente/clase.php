<?php

class basededades
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
        } catch (PDOException $e) {
            echo "Connection failed2: " . $e->getMessage();
        }
        return $conn;
    }

    public function inserir($nombrePelicula, $fecha, $presupuesto, $pais)
    {
        $conn = $this->connectar_bd();
        try {
            $resultado = $conn->query("SELECT * FROM datospeliculas WHERE titulo = '$nombrePelicula' and pais = '$pais'");

            if ($resultado->rowCount() == 0) {
                $conn->exec("INSERT INTO datospeliculas (titulo, fecha_lanzamiento, presupuesto, pais) VALUES ('$nombrePelicula', '$fecha', '$presupuesto', '$pais')");
                echo "Se ha añadido un nuevo registro <br>";
            } else {
                echo "Aquesta película ja existeix i no será donada d’alta";
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;
    }

    public function listarOrdenado()
    {
        $conn = $this->connectar_bd();
        try {
            $resultado = $conn->query("SELECT * FROM datospeliculas");
            if ($resultado->rowCount() > 0) {
            } else {
                return null;
            }
            $resultado = $conn->query("SELECT * FROM datospeliculas ORDER BY titulo");
            $conn = null;
            return ($resultado);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function listarPresupuesto()
    {
        $conn = $this->connectar_bd();
        try {
            $resultado = $conn->query("SELECT * FROM datospeliculas");
            if ($resultado->rowCount() > 0) {
            } else {
                return null;
            }
            $resultado = $conn->query("SELECT * FROM datospeliculas WHERE presupuesto < 1000000");
            $conn = null;
            return ($resultado);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function importarJson($archivo)
    {
        $peliculas = array();
        if (!file_exists($archivo)) {
            return false;
        }
        $jsonString = file_get_contents($archivo);
        $peliculas = json_decode($jsonString, true, 512, JSON_INVALID_UTF8_SUBSTITUTE);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return false;
        }
        try {
            $conn = $this->connectar_bd();

            foreach ($peliculas as $peli) {
                $titulo = $peli['Titulo'];
                $fecha = $peli['Fecha_lanzamiento'];
                $presupuesto = $peli['Presupuesto'];
                $pais = $peli['Pais'];

                $resultado = $conn->query("SELECT * FROM datospeliculas WHERE titulo = '$titulo'");
                if ($resultado->rowCount() > 0) {
                } else {
                    $conn->exec("INSERT INTO datospeliculas(titulo, fecha_lanzamiento, presupuesto, pais) VALUES ('$titulo', '$fecha', '$presupuesto', '$pais')");
                }
            }
            echo "<br>Exportació realitzada";
            $conn = null;
            return true;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return false;
        }
    }
}
