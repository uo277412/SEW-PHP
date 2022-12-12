<?php session_start(); ?>

<!DOCTYPE HTML>

<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Silvia Suárez Prendes" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Calculadora científica</title>

    <link rel="stylesheet" href="CalculadoraCientifica.css">
</head>

<body>
    <?php

    class CalculadoraMilan
    {
        protected $pantalla;
        protected $auxiliar;
        private $memoria;
        private $operadorPulsado; // true si un operador acaba de ser pulsado
        private $valorIzq;
        protected $operador;
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

        function multiplicacion()
        {
            $this->auxiliar .= "*";
            $this->operadorPulsado = true;
            $this->operador = "*";
        }

        function division()
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
            $p = $this->pantalla;
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


    class CalculadoraCientifica extends CalculadoraMilan
    {

        private $parte1;

        function __construct()
        {
            $this->parte1 = "";
        }

        function borrarPantalla()
        {
            $this->pantalla = "";
        }

        function borrarTodo()
        {
            $this->pantalla = "";
            $this->auxiliar = "";
            $this->valorActual = "";
        }

        function suma()
        {
            $this->operador = "+";

            $this->pantalla .= $this->operador;
            $this->parte1 = "";
        }

        function resta()
        {
            $this->operador = "-";

            $this->pantalla .= $this->operador;
            $this->parte1 = "";
        }

        function multiplicacion()
        {
            $this->operador = "*";

            $this->pantalla .= $this->operador;
            $this->parte1 = "";
        }


        function division()
        {
            $this->operador = "/";

            $this->pantalla .= $this->operador;
            $this->parte1 = "";
        }

        public function numero($dig)
        {
            $this->pantalla .= $dig;
            $this->auxiliar .= $dig;
        }

        function porcentaje()
        {
            $this->operadorPulsado = true;

            $a = $this->pantalla;
            $array = str_split($this->pantalla, 1);

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


        function mr()
        {
            $this->pantalla = $this->auxiliar;
        }

        function ms()
        {
            $this->memoria = $this->pantalla;
        }

        function elevarAlCuadrado()
        {
            $a = $this->getPantalla();
            $this->pantalla = eval("return pow($a, 2) ;");
        }

        function elevarXaY()
        {
            $a = $this->getPantalla();
            $this->pantalla = $a . "**";
        }

        function sin()
        {
            $a = $this->getPantalla();
            $this->pantalla = eval("return sin($a) ;");
        }

        function cos()
        {
            $a = $this->getPantalla();
            $this->pantalla = eval("return cos($a) ;");
        }

        function tan()
        {
            $a = $this->getPantalla();
            $this->pantalla = eval("return tan($a) ;");
        }

        function log()
        {
            $a = $this->getPantalla();
            $this->pantalla = eval("return log10($a) ;");
        }

        function potenciaDeDiez()
        {
            $a = $this->getPantalla();
            $this->pantalla = eval("return pow(10, $a) ;");
        }

        function factorial()
        {
            $a = $this->getPantalla();
            $this->pantalla = $this->calcularFactorial(floatval($a));
        }

        function calcularFactorial($n)
        {
            $res = 1;
            for ($i = 1; $i < $n; $i++) {
                $res *= $i;
            }
            return $res;
        }

        function pi()
        {
            $a = $this->getPantalla();
            $this->pantalla = $a . "3.14";
        }

        function exp()
        {
            $a = $this->getPantalla();
            $this->pantalla = eval("return exp($a) ;");
        }

        function del()
        {
            $a = $this->getPantalla();
            $this->pantalla = substr($a, 0, -1);
        }

        function abrirParentesis()
        {
            $this->pantalla .= "(";
        }

        function cerrarParentesis()
        {
            $this->pantalla .= ")";
        }


    }


    // si la calculadora no fue creada anteriormente, crear una nueva
    if (!isset($_SESSION['calculadoraCientifica'])) {
        $_SESSION['calculadoraCientifica'] = new CalculadoraCientifica();
    }

    $calculadora = $_SESSION['calculadoraCientifica'];

    if (count($_POST) > 0) {
        if (isset($_POST['botonMRC']))
            $calculadora->mrc();
        if (isset($_POST['botonMmenos']))
            $calculadora->mMenos();
        if (isset($_POST['botonMmas']))
            $calculadora->mMas();
        if (isset($_POST['botonMR']))
            $calculadora->mr();


        if (isset($_POST['botonMas']))
            $calculadora->suma();
        if (isset($_POST['botonMenos']))
            $calculadora->resta();
        if (isset($_POST['botonMultiplicacion']))
            $calculadora->multiplicacion();
        if (isset($_POST['botonDivision']))
            $calculadora->division();
        if (isset($_POST['botonMasMenos']))
            $calculadora->masMenos();


        if (isset($_POST['botonExp']))
            $calculadora->exp();
        if (isset($_POST['botonElevarAlCuadrado']))
            $calculadora->elevarAlCuadrado();
        if (isset($_POST['botonElevarXaY']))
            $calculadora->elevarXaY();
        if (isset($_POST['botonPotenciaDeDiez']))
            $calculadora->potenciaDeDiez();

        if (isset($_POST['botonCero']))
            $calculadora->numero('0');
        if (isset($_POST['botonUno']))
            $calculadora->numero('1');
        if (isset($_POST['botonDos']))
            $calculadora->numero('2');
        if (isset($_POST['botonTres']))
            $calculadora->numero('3');
        if (isset($_POST['botonCuatro']))
            $calculadora->numero('4');
        if (isset($_POST['botonCinco']))
            $calculadora->numero('5');
        if (isset($_POST['botonSeis']))
            $calculadora->numero('6');
        if (isset($_POST['botonSiete']))
            $calculadora->numero('7');
        if (isset($_POST['botonOcho']))
            $calculadora->numero('8');
        if (isset($_POST['botonNueve']))
            $calculadora->numero('9');


        if (isset($_POST['botonRaiz']))
            $calculadora->raizCuadrada();
        if (isset($_POST['botonPunto']))
            $calculadora->numero('.');
        if (isset($_POST['botonIgual']))
            $calculadora->igual();
        if (isset($_POST['botonPorcentaje']))
            $calculadora->porcentaje();


        if (isset($_POST['botonC']))
            $calculadora->borrarPantalla();
        if (isset($_POST['botonCE']))
            $calculadora->borrarTodo();
        if (isset($_POST['botonPi']))
            $calculadora->pi();
        if (isset($_POST['botonDel']))
            $calculadora->del();

        if (isset($_POST['botonSIN']))
            $calculadora->sin();
        if (isset($_POST['botonCOS']))
            $calculadora->cos();
        if (isset($_POST['botonTAN']))
            $calculadora->tan();


        if (isset($_POST['botonFactorial']))
            $calculadora->factorial();


        if (isset($_POST['botonAbrirParentesis']))
            $calculadora->abrirParentesis();
        if (isset($_POST['botonCerrarParentesis']))
            $calculadora->cerrarParentesis();
        if (isset($_POST['botonLog']))
            $calculadora->log();

    }

    $pantalla = $calculadora->getPantalla();





    echo " <form name='CalculadoraMilan' action='#' method='POST'>
        <fieldset>
            <textarea disabled title='Resultado' id='textAreaResultado'>$pantalla</textarea>

            <input id='botonC' type='submit' name='botonC' value='C' />
            <input name='botonCE' type='submit' value='CE' />
            <input name='botonDel' type='submit' value='DEL' />
            <input name='botonPi' type='submit' value='π' />


            <input id='botonMrc' type='submit' name='botonMRC' value='MRC' />
            <input id='botonMmenos' type='submit' name='botonMmenos' value='M-' />
            <input id='botonMmas' type='submit' name='botonMmas' value='M+' />
            <input id='botonMr' type='submit' name='botonMmenos' value='MR' />


            <input name='botonSin' type='submit' value='SIN'/>
            <input name='botonCos' type='submit' value='COS'/>
            <input name='botonTan' type='submit' value='TAN'/>
            <input name='botonFactorial' type='submit' value='n!' />


            <input name='botonAbrirParentesis' type='submit' value='(' />
            <input name='botonCerrarParentesis' type='submit' value=')' />
            <input name='botonLog' type='submit' value='LOG' />
            <input name='botonRaiz' type='submit' value='√' />


            <input name='botonExp' type='submit' value='EXP' />
            <input name='botonElevarAlCuadrado' type='submit' value='x^2'/>
            <input name='botonElevarXaY' type='submit' value='x^y'/>
            <input name='botonPotenciaDeDiez' type='submit' value='10^x' />
            
            
            <input name='botonMasMenos' type='submit' value='+/-' />
            <input name='botonPorcentaje' type='submit' value='%' />
            <input name='botonPunto' type='submit'value='.' />
            <input name='botonIgual' type='submit' name='botonIgual' value='=' />

            
            <input name='botonMas' type='submit' value='+' />
            <input name='botonSiete' type='submit' name='botonSiete' value='7' />
            <input name='botonOcho' type='submit' name='botonOcho' value='8' />
            <input name='botonNueve' type='submit' name='botonNueve' value='9' />


            <input name='botonMenos' type='submit' value='-' />
            <input name='botonCuatro' type='submit' name='botonCuatro' value='4' />
            <input name='botonCinco' type='submit' name='botonCinco' value='5' />
            <input name='botonSeis' type='submit' name='botonSeis' value='6' />


            <input name='botonMultiplicacion' type='submit' value='*' />
            <input name='botonUno' type='submit' name='botonUno' value='1' />
            <input name='botonDos' type='submit' name='botonDos' value='2' />
            <input name='botonTres' type='submit' name='botonTres' value='3' />


            <input name='botonDivision' type='submit' value='/' />
            <input name='botonCero' type='submit' name='botonCero' value='0' />

        </fieldset>
    </form>";

    ?>
</body>

</html>