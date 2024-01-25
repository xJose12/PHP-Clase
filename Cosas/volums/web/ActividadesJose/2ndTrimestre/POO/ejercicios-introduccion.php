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

    class Producto
    {
        public $nombre;
        public $precio;
        public $stock;

        function __construct($nombre, $precio, $stock)
        {
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->stock = $stock;
        }

        public function cambiarPrecio($precio) {
            $this->precio = $precio;
        }

        public function aumentarStock($precio) {
            $this->precio = $precio;
        }

    }

    class Tienda {
        public $productos = [];

        public function agregarProducto($nombre, $precio, $stock){
            $producto = new Producto($nombre, $precio, $stock);
            $this->productos[] = $producto;
        }

        public function cambiarPrecio($nombre, $precio) {
            foreach ($this->productos as $producto) {
                if ($producto->nombre == $nombre) {
                    $producto->cambiarPrecio($precio);
                    return;
                }
            }
            echo "<i>No se ha encontrado ningun producto con el nombre: <b>{$nombre}</b></i><br>";

            $this->productos[0]->cambiarPrecio($precio);
        }

        public function aumentarStock($nombre, $precio) {
            foreach ($this->productos as $producto) {
                if ($producto->nombre == $nombre) {
                    $producto->cambiarPrecio($precio);
                    return;
                }
            }
            echo "<i>No se ha encontrado ningun producto con el nombre: <b>{$nombre}</b></i><br>";

            $this->productos[0]->cambiarPrecio($precio);
        }

    }

    $tusProductos = new Tienda();
    $tusProductos->agregarProducto("Xbox", 33, 324);
    $tusProductos->agregarProducto("Playstation", 234, 2);


    $tusProductos->cambiarPrecio("PC", 100);


    ?>

</body>

</html>