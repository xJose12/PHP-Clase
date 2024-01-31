<?php

class Persona
{
    private $nom;
    private $dataNaixement;
    private $dni;
    private $genere;

    // Constructor
    public function __construct($nom, $dataNaixement, $dni, $genere)
    {
        $this->nom = $nom;
        $this->dataNaixement = $dataNaixement;
        $this->dni = $dni;
        $this->genere = $genere;
    }

    // Mètode per saludar
    public function saludar()
    {
        $missatge = $this->nom . " (" . $this->dni . " - " . $this->dataNaixement . " - " . $this->genere . "): Hola!";
        echo $missatge;
    }

    // Mètode per calcular l'edat fent servir Date
    public function edat()
    {
        // Suposam que la dataNaixement és en format 'd/m/Y'
        $dataNaixement = date_create_from_format('d/m/Y', $this->dataNaixement);
        $dataActual = date_create();

        $diferencia = date_diff($dataActual, $dataNaixement);
        $edat = $diferencia->y;

        echo "Edat: " . $edat . " anys";
    }
}

// Exemple d'ús
$persona = new Persona("Miquel", "04/08/1999", "12345678X", "Home");
$persona->saludar();
echo "<br>";
$persona->edat();
