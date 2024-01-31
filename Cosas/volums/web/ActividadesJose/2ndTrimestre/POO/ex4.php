<?php
class Assignatura
{
    private $nom;
    private $hores;

    public function __construct($nom, $hores)
    {
        $this->nom = $nom;
        $this->hores = $hores;
    }

    public function mostrarAssignatura() {
        echo "Assignatura: {$this->nom} ({$this->hores}h)<br>";
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getHores()
    {
        return $this->hores;
    }

    public function setHores($hores)
    {
        $this->hores = $hores;
    }
}

class Alumne
{
    private $id;
    private $nom;
    private $edat;
    private $curs;
    private $assignatures = [];

    public function __construct($id, $nom, $edat, $curs)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->edat = $edat;
        $this->curs = $curs;
    }

    public function afegirAssignatura(Assignatura $assignatura)
    {
        $this->assignatures[] = $assignatura;
    }

    public function mostrarAlumne()
    {
        echo "<b>Alumne (#" . $this->id . ")</b><br>";
        echo "{$this->getNom()}<br>";
        echo "{$this->edat} anys<br>";
        echo "Curs: {$this->curs}<br>";
        echo "Assignatures: <br>";

        foreach ($this->assignatures as $assignatura) {
            echo "{$assignatura->getNom()}<br>";
        }
    }

    public function getID()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getEdat()
    {
        return $this->edat;
    }

    public function setEdat($edat)
    {
        $this->edat = $edat;
    }

    public function getCurs()
    {
        return $this->curs;
    }

    public function setCurs($curs)
    {
        $this->curs = $curs;
    }

    public function getAssignatures()
    {
        return $this->assignatures;
    }
}

class Escola
{
    private $id;
    private $nom;
    private $direccio;
    private $anyInauguracio;
    private $cursEscolar;
    private $llistaAlumnes = [];
    private $llistaAssignatures = [];

    public function __construct ($nom, $direccio, $anyInauguracio, $cursEscolar){
        $this->nom = $nom;
        $this->direccio = $direccio;
        $this->anyInauguracio = $anyInauguracio;
        $this->cursEscolar = $cursEscolar;
    } 

    public function afegirAlumne(Alumne $alumne)
    {
        $this->llistaAlumnes[] = $alumne;
        echo "Alumne <b>{$alumne->getNom()}</b> afegit amb èxit.<br><br>";
    }

    public function afegirAssignatura(Assignatura $assignatura)
    {
        $this->llistaAssignatures[] = $assignatura;
        echo "Assignatura <b>{$assignatura->getNom()}</b> afegida amb èxit.<br><br>";
    }

    public function matricularAlumne(Alumne $alumne, Assignatura $assignatura)
    {
        // Verifica si l'alumne i la matèria existeixen
        $estudiantExisteix = false;
        $assignaturaExisteix = false;

        foreach ($this->llistaAlumnes as $e) {
            if ($e->getNom() === $alumne->getNom()) {
                $estudiantExisteix = true;
                break;
            }
        }

        foreach ($this->llistaAssignatures as $m) {
            if ($m->getNom() === $assignatura->getNom()) {
                $assignaturaExisteix = true;
                break;
            }
        }

        if ($estudiantExisteix && $assignaturaExisteix) {
            $alumne->afegirAssignatura($assignatura);
            echo "Alumne <b>{$alumne->getNom()}</b> matriculat a <b><i>{$assignatura->getNom()}</i></b> amb èxit.<br><br>";
        } else {
            echo "Alumne o assignatura no trobats. Verifiqui els noms.<br>";
        }
    }

    public function mostrarAlumne($id)
    {

        foreach ($this->llistaAlumnes as $e) {
            if ($e->getId() === $id) {
                $e->mostrarAlumne();
                return;
            }
        }
        echo "<i>No hi ha cap alumne amb id (#{$id})</i>";
    }

    public function mostrarAssignatura($nom)
    {

        foreach ($this->llistaAssignatures as $e) {
            if ($e->getNom() === $nom) {
                $e->mostrarAssignatura();
                return;
            }
        }
        echo "<i>No hi ha cap assignatura amb el nom (#{$nom})</i>";
    }

    public function mostrarEscola()
    {
        echo "<h1>{$this->nom}</h1>";
        echo "<h2>Curs{$this->cursEscolar}</h2>";
        echo "<p>{$this->direccio} ({$this->anyInauguracio})</p>";
        echo "Llistat de matèries amb alumnes associats:<br>";
        foreach ($this->llistaAssignatures as $assignatura) {
            echo "Matèria: {$assignatura->getNom()}<br>";
            $alumnesAssociats = [];
            foreach ($this->llistaAlumnes as $alumne) {
                if (in_array($assignatura, $alumne->getAssignatures())) {
                    $alumnesAssociats[] = $alumne->getNom();
                }
            }
            echo "  Alumnes: " . implode(", ", $alumnesAssociats) . "<br>";
        }

        echo "<br>Alumnes sense matèria assignada:<br>";
        foreach ($this->llistaAlumnes as $alumne) {
            if (empty($alumne->getAssignatures())) {
                echo "  - {$alumne->getNom()}<br>";
            }
        }
    }

    public function generarID()
    {
        return ++$this->id;
    }
}

// Exemple d'ús:
$assignatura1 = new Assignatura("Matemàtiques", 20);
$assignatura2 = new Assignatura("Història", 20);

$sistemaEscola = new Escola("CEIP Blanquerna", "C/Mallorca, 4", 1990, 2024);

$sistemaEscola->afegirAssignatura($assignatura1);
$sistemaEscola->afegirAssignatura($assignatura2);
echo "----------------------------------------<br><br>";

$estudiant1 = new Alumne($sistemaEscola->generarID(), "Maria", 19, "Arquitectura");
$estudiant2 = new Alumne($sistemaEscola->generarID(), "Pau", 21, "Dret");
$estudiant3 = new Alumne($sistemaEscola->generarID(), "Noe", 20, "Periodisme");

$sistemaEscola->afegirAlumne($estudiant1);
$sistemaEscola->afegirAlumne($estudiant2);
$sistemaEscola->afegirAlumne($estudiant3);
echo "----------------------------------------<br><br>";

$sistemaEscola->matricularAlumne($estudiant1, $assignatura1);
$sistemaEscola->matricularAlumne($estudiant3, $assignatura2);
echo "----------------------------------------<br>";

$sistemaEscola->mostrarEscola();
