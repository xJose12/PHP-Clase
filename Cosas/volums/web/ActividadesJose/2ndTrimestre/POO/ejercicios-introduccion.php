<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>

    <h2>1. Crea una classe Persona que emmagatzemi dades</h2>

    <?php

    class Persona
    {
        public $nom;
        public $data_naixement;
        public $dni;
        public $genere;

        function __construct($nom, $data_naixement, $dni, $genere)
        {
            $this->nom = $nom;
            $this->data_naixement = $data_naixement;
            $this->dni = $dni;
            $this->genere = $genere;
        }

        function saludar()
        {
            echo "{$this->nom} ({$this->dni} - {$this->data_naixement} - {$this->genere}): Hola!<br>";
        }

        function edad()
        {
            $data_actual = 2024;

            $data_naixement = new DateTime($this->data_naixement);
            $año = $data_naixement->format('Y');

            $edad = $data_actual - $año;

            echo "{$this->nom} tiene $edad años";
        }
    }

    $persona1 = new Persona("Miquel", "04/08/2002", "41622035Q", "Masculino");
    $persona1->saludar();
    $persona1->edad();


    ?>

    <h2>2. Crea una classe Calculadora que pugui realitzar operacions bàsiques sobre un o dos nombres
    </h2>

    <?php

    class Calculadora
    {
        public $num1;
        public $num2;

        function __construct($num1, $num2)
        {
            $this->num1 = $num1;
            $this->num2 = $num2;
        }

        function suma()
        {
            $suma = $this->num1 + $this->num2;
            echo "{$this->num1} + {$this->num2} = $suma<br>";
            //echo "El resultado de sumar {$this->num1} y {$this->num2} es: $suma<br>";
        }

        function resta()
        {
            $resta = $this->num1 - $this->num2;
            echo "{$this->num1} - {$this->num2} = $resta<br>";
            // echo "El resultado de restar {$this->num1} y {$this->num2} es: $resta<br>";
        }

        function division()
        {
            $dividir = $this->num1 / $this->num2;
            echo "{$this->num1} / {$this->num2} = $dividir<br>";
            // echo "El resultado de dividir {$this->num1} y {$this->num2} es: $dividir<br>";
        }

        function multiplicacion()
        {
            $multi = $this->num1 * $this->num2;
            echo "{$this->num1} * {$this->num2} = $multi<br>";
            // echo "El resultado de multiplicar {$this->num1} y {$this->num2} es: $multi<br>";
        }

        function potencia()
        {
            $potencia = pow($this->num1, $this->num2);
            echo "{$this->num1} ^ {$this->num2} = $potencia<br>";
            // echo "El resultado de {$this->num1} elevado a {$this->num2} es: $potencia<br>";
        }

        function factorial()
        {
            $resultado1 = 1;

            for ($i = 1; $i <= $this->num1; $i++) {
                $resultado1 *= $i;
            }

            echo "El factorial de {$this->num1} es: $resultado1<br>";

            $resultado2 = 1;

            for ($i = 1; $i <= $this->num2; $i++) {
                $resultado2 *= $i;
            }

            echo "El factorial de {$this->num2} es: $resultado2";
        }
    }

    $calculo1 = new Calculadora(5, 4);
    $calculo1->suma();
    $calculo1->resta();
    $calculo1->division();
    $calculo1->multiplicacion();
    $calculo1->potencia();
    $calculo1->factorial();
    ?>

    <h2>3. Volem crear una petita tenda virtual de productes</h2>

    <?php

    class Producte
    {
        public $nom;
        public $preu;
        public $stock;

        public function __construct($nom, $preu, $stock)
        {
            $this->nom = $nom;
            $this->preu = $preu;
            $this->stock = $stock;
        }
    }

    class TendaVirtual
    {
        public $productes = [];

        // Mètode per afegir un producte a la tenda
        public function afegirProducte($producte)
        {
            $this->productes[] = $producte;
            echo "Producte afegit a la tenda: {$producte->nom}<br>";
        }

        // Mètode per comprar un producte de la tenda
        public function comprarProducte($nom, $quantitat)
        {
            foreach ($this->productes as $producte) {
                if ($producte->nom == $nom) {
                    if ($producte->stock >= $quantitat) {
                        $producte->stock -= $quantitat;
                        $total = $producte->preu * $quantitat;
                        echo "Compra realitzada: {$quantitat} unitats de {$producte->nom} ({$producte->preu}€) = {$total}€ <br>";
                    } else {
                        echo "No hi ha prou estoc de {$producte->nom}<br>";
                    }
                    return;
                }
            }
            echo "Producte no trobat a la tenda<br>";
        }

        // Mètode per canviar el preu d'un producte de la tenda
        public function canviarPreuProducte($nom, $nouPreu)
        {
            foreach ($this->productes as $producte) {
                if ($producte->nom == $nom) {
                    $producte->preu = $nouPreu;
                    echo "Preu del producte {$producte->nom} actualitzat a {$nouPreu}€<br>";
                    return;
                }
            }
            echo "Producte no trobat a la tenda<br>";
        }

        // Mètode per augmentar el stock d'un producte de la tenda
        public function augmentarStockProducte($nom, $quantitat)
        {
            foreach ($this->productes as $producte) {
                if ($producte->nom == $nom) {
                    $producte->stock += $quantitat;
                    echo "Estoc del producte {$producte->nom} augmentat en {$quantitat}<br>";
                    return;
                }
            }
            echo "Producte no trobat a la tenda<br>";
        }

        // Mètode per imprimir el stock actual de la tenda
        public function imprimirStock()
        {
            echo "--------------------<br>";
            if (!empty($this->productes)) {
                foreach ($this->productes as $producte) {
                    echo "<b>{$producte->nom}</b>: {$producte->preu}€ (x{$producte->stock}) <br>";
                }
            } else {
                echo "No hi ha productes a la tenda<br>";
            }
            echo "--------------------<br>";
        }
    }

    // Creem alguns productes
    $producte1 = new Producte("Ordinador portàtil", 800, 10);
    $producte2 = new Producte("Telèfon intel·ligent", 500, 15);

    // Creem la tenda virtual
    $tenda = new TendaVirtual();
    $tenda->imprimirStock();

    // Afegim productes a la tenda
    $tenda->afegirProducte($producte1);
    $tenda->afegirProducte($producte2);
    $tenda->imprimirStock();

    // Realitzem operacions de prova
    $tenda->comprarProducte("Ordinador portàtil", 3);
    $tenda->imprimirStock();
    $tenda->canviarPreuProducte("Telèfon intel·ligent", 550);
    $tenda->imprimirStock();
    $tenda->augmentarStockProducte("Ordinador portàtil", 5);
    $tenda->imprimirStock();

    ?>

    <h2>4. Una escuela, sistema de gestion de alumnos y matriculaciones</h2>

    <?php

    class Asignatura
    {
        private $nom;
        private $hores;

        public function __construct($nom, $hores)
        {
            $this->nom = $nom;
            $this->hores = $hores;
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
        private $edad;
        private $curs;
        private $asignatures;

        public function __construct($id, $nom, $edad, $curs, $asignatures)
        {
            $this->id = $id;
            $this->nom = $nom;
            $this->edad = $edad;
            $this->curs = $curs;
            $this->asignatures = [];
        }

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getNom()
        {
            return $this->nom;
        }

        public function setNom($nom)
        {
            $this->nom = $nom;
        }

        public function getEdad()
        {
            return $this->edad;
        }

        public function setEdad($edad)
        {
            $this->edad = $edad;
        }

        public function getCurs()
        {
            return $this->curs;
        }

        public function setCurs($curs)
        {
            $this->curs = $curs;
        }

        public function getAsignatures()
        {
            return $this->asignatures;
        }

        public function setAsignatures($asignatures)
        {
            $this->asignatures = $asignatures;
        }
    }

    class Escola
    {
        private $nom;
        private $direccio;
        private $anyInaguracio;
        private $cursEscolar;
        private $llistaAlumnes;
        private $llistaAsignatures;

        public function __construct($nom, $direccio, $anyInaguracio, $cursEscolar)
        {
            $this->nom = $nom;
            $this->direccio = $direccio;
            $this->anyInaguracio = $anyInaguracio;
            $this->cursEscolar = $cursEscolar;
            $this->llistaAlumnes = [];
            $this->llistaAsignatures = [];
        }

        public function afegirAlumne(Alumne $alumne)
        {
            $this->llistaAlumnes[] = $alumne;
            echo "Alumne afegit a la escola: {$alumne->getNom()}<br>";
        }

        public function afegirAsignatura(Asignatura $asignatura)
        {
            $this->llistaAsignatures[] = $asignatura;
            echo "Asignatura afegit a la escola: {$asignatura->getNom()}<br>";
        }

        // Matricular alumne a una assignatura concreta
        public function matricularAlumne(Alumne $alumne, Asignatura $asignatures)
        {
            if ($alumne->getCurs() == $asignatures->getNom()) {
                $alumne->setAsignatures($asignatures);
                echo "Alumne matriculat a la asignatura: {$asignatures->getNom()}<br>";
            } else {
                echo "Alumne no pot matricular a la asignatura: {$asignatures->getNom()}<br>";
            }
        }

        // Mostrar les dades d’un alumne donat el seu id
        public function mostrarAlumne($id)
        {
            echo "--------------------<br>";
            foreach ($this->llistaAlumnes as $alumne) {
                if ($alumne->getId() == $id) {
                    echo "<b>{$alumne->getNom()}</b>: {$alumne->getEdad()} anys, {$alumne->getCurs()}<br>";
                    return;
                }
            }
            echo "Alumne no trobat<br>";
        }

        // Mostrar les dades d’una assignatura donat el seu nom
        public function mostrarAsignatura($nom)
        {
            foreach ($this->llistaAsignatures as $asignatura) {
                if ($asignatura->getNom() == $nom) {
                    echo "<b>{$asignatura->getNom()}</b>: {$asignatura->getHores()}h lectivas<br>";
                    return;
                }
            }
            echo "Asignatura no trobat<br>";
        }

        // Mostrar les dades completes de l’escola, amb un llistat d’alumnes per cada assignatura i un llistat final d’alumnes sense cap assignatura matriculada
        public function mostrarEscola()
        {
            echo "--------------------<br>";
            foreach ($this->llistaAsignatures as $asignatura) {
                echo "<b>{$asignatura->getNom()}</b>: {$asignatura->getHores()}<br>";
            }
            foreach ($this->llistaAlumnes as $alumne) {
                if ($alumne->getAsignatures()->getNom() == $asignatura->getNom()) {
                    echo "{$alumne->getNom()}<br>";
                }
            }
        }
    }

    // Comprobaciones de nuestra escuela
    // Afegir alumne a l’escola
    $alumne1 = new Alumne(
        1,
        "Jose",
        18,
        "Informatica",
        [new Asignatura("Informatica", 10), new Asignatura("Matemàtica", 10)]
    );
    $alumne2 = new Alumne(
        2,
        "Ana",
        22,
        "Informatica",
        [new Asignatura("Informatica", 10), new Asignatura("Fisica", 33)]
    );

    $escola = new Escola("IES MANACOR", "Avinguda 1", 2018, 2024);
    $escola->afegirAlumne($alumne1);
    $escola->afegirAlumne($alumne2);
    $escola->afegirAsignatura(new Asignatura("Informatica", 10));
    $escola->afegirAsignatura(new Asignatura("Fisica", 10));
    $escola->mostrarAlumne(1);
    $escola->mostrarAsignatura("Informatica");
    $escola->mostrarAsignatura("Matemàtica");
    $escola->mostrarEscola();

    ?>
</body>

</html>