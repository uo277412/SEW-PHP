<?php session_start(); // iniciar sesión ?>

<!DOCTYPE HTML>

<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Silvia Suárez Prendes" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Calculadora Milán</title>

    <link rel="stylesheet" type="text/css" href="CalculadoraMilan.css">
</head>

<body>

    <?php

    class CalculadoraMilan
    {
        private $pantalla;
        private $auxiliar;
        private $memoria;
        private $operadorPulsado; // true si un operador acaba de ser pulsado
        private $valorIzq;
        private $operador;
        private $valorActual;



        public function __construct()
        {
            $this->pantalla = "";
            $this->memoria = 0;
            $this->auxiliar = "";
            $this->operadorPulsado = false;

            $this->valorIzq = "";
            $this->operador = "";
            $this->valorActual = "";
        }

        public function getPantalla()
        {
            return $this->pantalla;
        }

        // en php se concatena con el operador .
        // this.pantalla += Number(x);
        public function numero($dig)
        {
            if ($this->operadorPulsado) {
                $this->pantalla = $dig;
                $this->auxiliar .= $dig;
            } else {
                $this->pantalla .= $dig;
                $this->auxiliar .= $dig;
            }
            $this->operadorPulsado = false;
        }

        function punto()
        {
            $this->auxiliar .= ".";
        }

        function suma()
        {
            $this->auxiliar .= "+";
            $this->operadorPulsado = true;
            $this->operador = "+";
        }

        function resta()
        {
            $this->auxiliar .= "-";
            $this->operadorPulsado = true;
            $this->operador = "-";
        }

        function multiplicación()
        {
            $this->auxiliar .= "*";
            $this->operadorPulsado = true;
            $this->operador = "*";
        }

        function división()
        {
            $this->auxiliar .= "/";
            $this->operadorPulsado = true;
            $this->operador = "/";
        }

        public function igual()
        {
            try {
                $resultado = eval("return $this->auxiliar;");
                $this->pantalla = $resultado;
            } catch (Error $error) {
                $this->pantalla = "Error" . $error->getMessage();
            } catch (Exception $error) {
                $this->pantalla = "Error" . $error->getMessage();
            } catch (ParseError $error) {
                $this->pantalla = "Error" . $error->getMessage();
            } catch (DivisionByZeroError $error) {
                $this->pantalla = "Error" . $error->getMessage();
            }
        }

        public function borrarPantalla()
        {
            $this->pantalla = "";
            $this->auxiliar = "";
            $this->valorActual = "";
        }

        public function masMenos()
        {
            $p = $this->getPantalla();
            $this->pantalla = eval("return - $p ;");
        }

        function mrc()
        {
            $this->pantalla = $this->memoria;
            $this->memoria = 0;
        }

        function mMenos()
        {
            try {
                $this->pantalla = eval("return $this->memoria - $this->pantalla ;");
                $this->memoria = $this->pantalla;
                $this->operadorPulsado = true;
            } catch (Error $e) {
                $this->pantalla = "Error: " . $e->getMessage();
            }
        }

        function mMas()
        {
            try {
                $this->pantalla = eval("return $this->memoria + $this->pantalla ;");
                $this->memoria = $this->pantalla;
                $this->operadorPulsado = true;
            } catch (Error $e) {
                $this->pantalla = "Error: " . $e->getMessage();
            }
        }

        function raizCuadrada()
        {
            $actual = $this->getAuxiliar();
            $this->pantalla = eval("return sqrt($actual) ;");
        }

        function porcentaje()
        {
            $this->operadorPulsado = true;

            $a = $this->auxiliar;
            $array = str_split($this->auxiliar, 1);

            // recorrer la array y almacenar el valor de la izquierda
            $j = count($array) - 1; // size del array - 1
            $counter = 0; // posición del último operador
            $operatorFound = false;
            $op = "";

            if ($this->operador == "+" || $this->operador == "-")
                while (!$operatorFound) {
                    if ($array[$j] == "+" || $array[$j] == "-") {
                        $op = $array[$j];
                        $counter = $j;
                        $operatorFound = true;
                    }
                    $j--;
                }

            $this->valorIzq = substr($a, 0, $counter);
            $valorDcho = substr($a, $counter, strlen($a));

            $this->valorIzq = eval("return " . $this->valorIzq . ";");

            if ($this->operador == "*") {
                $this->pantalla = eval("return " . $a . "/" . 100 . ";");
            } else if ($this->operador == "/") {
                $this->pantalla = eval("return " . $a . "*" . 100 . ";");
            } else {
                $this->valorActual = $this->valorIzq . $valorDcho . " /100" . "*" . $this->valorIzq;
                $this->valorActual = floatval($this->valorActual);
                $this->pantalla = eval("return " . $this->valorIzq . $valorDcho . " /100" . "*" . $this->valorIzq . ";");
            }
            $this->valorIzq = "";
        }

        function getAuxiliar()
        {
            return $this->auxiliar;
        }
    }


    // si la calculadora no fue creada anteriormente, crear una nueva
    if (!isset($_SESSION['calculadoraMilan'])) {
        $_SESSION['calculadoraMilan'] = new CalculadoraMilan();
    }

    $calculadora = $_SESSION['calculadoraMilan'];

    if (count($_POST) > 0) {
        if (isset($_POST['botonMRC']))
            $calculadora->mrc();
        if (isset($_POST['botonMmenos']))
            $calculadora->mMenos();
        if (isset($_POST['botonMmas']))
            $calculadora->mMas();
        if (isset($_POST['botonDivision']))
            $calculadora->división();
        if (isset($_POST['botonMasMenos']))
            $calculadora->masMenos();
        if (isset($_POST['botonSiete']))
            $calculadora->numero('7');
        if (isset($_POST['botonOcho']))
            $calculadora->numero('8');
        if (isset($_POST['botonNueve']))
            $calculadora->numero('9');
        if (isset($_POST['botonMultiplicacion']))
            $calculadora->multiplicación();
        if (isset($_POST['botonCuatro']))
            $calculadora->numero('4');
        if (isset($_POST['botonCinco']))
            $calculadora->numero('5');
        if (isset($_POST['botonSeis']))
            $calculadora->numero('6');
        if (isset($_POST['botonMenos']))
            $calculadora->resta();
        if (isset($_POST['botonUno']))
            $calculadora->numero('1');
        if (isset($_POST['botonDos']))
            $calculadora->numero('2');
        if (isset($_POST['botonTres']))
            $calculadora->numero('3');
        if (isset($_POST['botonMas']))
            $calculadora->suma();
        if (isset($_POST['botonRaiz']))
            $calculadora->raizCuadrada();
        if (isset($_POST['botonCero']))
            $calculadora->numero('0');
        if (isset($_POST['botonPunto']))
            $calculadora->numero('.');
        if (isset($_POST['botonC']))
            $calculadora->borrarPantalla();
        if (isset($_POST['botonIgual']))
            $calculadora->igual();
        if (isset($_POST['botonPorcentaje']))
            $calculadora->porcentaje();
    }

    $pantalla = $calculadora->getPantalla();


    echo " <form name='CalculadoraMilan' action='#' method='POST'>
        <fieldset>
            <textarea disabled title='Resultado' id='textAreaResultado'>$pantalla</textarea>

            <input id='botonC' type='submit' name='botonC' value='C' />
            <input id='botonMrc' type='submit' name='botonMRC' value='MRC' />
            <input id='botonMmenos' type='submit' name='botonMmenos' value='M-' />
            <input id='botonMmas' type='submit' name='botonMmas' value='M+' />

            <input id='botonMas' type='submit' name='botonMas' value='+' />
            <input id='botonMenos' type='submit' name='botonMenos' value='-' />
            <input id='botonMultiplicacion' type='submit' name='botonMultiplicacion' value='*' />
            <input id='botonDivision' type='submit' name='botonDivision' value='/' />

            <input id='botonMasMenos' type='submit' name='botonMasMenos' value='+/-' />
            <input id='botonRaiz' type='submit' name='botonRaiz' value='√' />
            <input id='botonPorcentaje' type='submit' name='botonPorcentaje' value='%' />
            <input id='botonPunto' type='submit' name='botonPunto' value='.' />

            <input id='botonSiete' type='submit' name='botonSiete' value='7' />
            <input id='botonOcho' type='submit' name='botonOcho' value='8' />
            <input id='botonNueve' type='submit' name='botonNueve' value='9' />
            <input id='botonIgual' type='submit' name='botonIgual' value='=' />
            <input id='botonCuatro' type='submit' name='botonCuatro' value='4' />
            <input id='botonCinco' type='submit' name='botonCinco' value='5' />
            <input id='botonSeis' type='submit' name='botonSeis' value='6' />

            <input id='botonUno' type='submit' name='botonUno' value='1' />
            <input id='botonDos' type='submit' name='botonDos' value='2' />
            <input id='botonTres' type='submit' name='botonTres' value='3' />
            <input id='botonCero' type='submit' name='botonCero' value='0' />
        </fieldset>
    </form>";

    ?>
</body>

</html>