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
