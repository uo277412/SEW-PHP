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
        private $memoria;

        public function __construct()
        {
            $this->pantalla = "";
            $this->memoria = 0;
        }

        public function getPantalla()
        {
            return $this->pantalla;
        }

        // en php se concatena con el operador .
        // this.pantalla += Number(x);
        public function numero($dig)
        {
            $this->pantalla .= $dig;
        }

        function punto()
        {
            $this->pantalla .= ".";
        }

        function suma()
        {
            $this->pantalla .= "+";
        }

        function resta()
        {
            $this->pantalla .= "-";
        }

        function multiplicación()
        {
            $this->pantalla .= "*";
        }

        function división()
        {
            $this->pantalla .= "/";
        }

        public function igual()
        {
            try {
                $resultado = eval("return $this->pantalla;");
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
                $this->memoria = $this->memoria - eval("return $this->pantalla ;");
            } catch (Error $e) {
                $this->pantalla = "Error: " . $e->getMessage();
            }
        }

        function mMas()
        {

            try {
                $this->memoria = $this->memoria + eval("return $this->pantalla ;");
            } catch (Error $e) {
                $this->pantalla = "Error: " . $e->getMessage();
            }
        }

        function raizCuadrada()
        {
            $pantallaActual = $this->getPantalla();
            $this->pantalla = eval("return sqrt($pantallaActual) ;");
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
    }

    $pantalla = $calculadora->getPantalla();


    echo " <form name='CalculadoraMilan' method='post'>
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