<?php
class Calculadora
{
    // Mètode per sumar dos nombres
    public function sumar($a, $b)
    {
        return $a + $b;
    }

    // Mètode per restar dos nombres
    public function restar($a, $b)
    {
        return $a - $b;
    }

    // Mètode per multiplicar dos nombres
    public function multiplicar($a, $b)
    {
        return $a * $b;
    }

    // Mètode per dividir dos nombres
    public function dividir($a, $b)
    {
        // Verifiquem si el divisor és diferent de zero per evitar la divisió per zero
        if ($b != 0) {
            return $a / $b;
        } else {
            return "No es pot dividir per zero";
        }
    }

    // Mètode per calcular la potència d'un nombre a una determinada potència
    public function potencia($base, $exponent)
    {
        return pow($base, $exponent);
    }

    // Mètode per calcular el factorial d'un nombre
    public function factorial($n)
    {
        if ($n == 0 || $n == 1) {
            return 1;
        } else {
            return $n * $this->factorial($n - 1);
        }
    }
}

// Creem una instància de la classe Calculadora
$calculadora = new Calculadora(3,3);

// Realitzem algunes operacions de prova
echo "Suma: " . $calculadora->sumar(5, 3) . "<br>";
echo "Resta: " . $calculadora->restar(8, 2) . "<br>";
echo "Multiplicació: " . $calculadora->multiplicar(4, 6) . "<br>";
echo "Divisió: " . $calculadora->dividir(10, 2) . "<br>";
echo "Potència: " . $calculadora->potencia(2, 3) . "<br>";
echo "Factorial: " . $calculadora->factorial(5) . "<br>";
