<?php session_start(); ?>

<!DOCTYPE HTML>

<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Silvia Suárez Prendes" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Calculadora científica</title>

    <link rel="stylesheet" href="CalculadoraRPN.css">
</head>

<body>
    <?php

    class PilaLIFO
    {
        protected $ultimo;
        protected $elementos;

        function __construct()
        {
            $this->ultimo = -1; // índice del último elemento añadido
            $this->elementos = [];
        }

        function push($valor)
        {
            array_push($this->elementos, $valor);
            $this->ultimo++;
        }

        function pop()
        {
            if (!$this->estaVacia()) {
                $this->ultimo -= 1;
                $elemento = $this->elementos[$this->size() - 1];
                array_pop($this->elementos);
                return $elemento;
            }
        }

        function size()
        {
            return count($this->elementos); // numero de elementos en la pila 
        }

        function mostrar()
        {
            $a = "";
            $indice = $this->size();

            for ($i = $indice; $i > 0; $i--) {
                $a .= $i . ":" . $this->elementos[$i - 1] . "\n";
            }

            return $a;
        }

        function get($x)
        {
            if ($x >= $this->size() - 1) {
                return $this->elementos[$x];
            }
        }

        function estaVacia()
        {
            return $this->ultimo < 0;
        }

        function vaciar()
        {
            for ($indice = 0; $indice < $this->size(); $indice++) {
                array_pop($this->elementos);
            }

            $this->ultimo = -1;
        }
    }

    class CalculadoraRPN
    {

        private $pila;
        private $pantallaPila;
        private $pantalla;

        function __construct()
        {
            $this->pila = new PilaLIFO();

            $this->pantallaPila = "";
            $this->pantalla = "";

        }

        function borrar()
        {
            $this->pila->vaciar();
            $this->pantalla = "";
        }

        function del()
        {
            $aux = $this->pantalla;
            $this->pantalla = substr($aux, 0, -1);
        }

        function masMenos()
        {
            if ($this->pila->size() >= 1) {
                $this->pila->push($this->pila->pop() * (-1));
                $this->mostrarEnPantalla();
            }
        }


        function numero($x)
        {
            $this->pantalla .= floatval($x);
        }

        function multiplicacion()
        {
            if ($this->pila->size() >= 2) {
                $this->pila->push($this->pila->pop() * $this->pila->pop()); // dos últimos elementos añadidos
                $this->mostrarEnPantalla();
            }
        }

        function division()
        {
            if ($this->pila->size() >= 2) {
                $dcha = $this->pila->pop();
                $izq = $this->pila->pop();
                $res = $izq / $dcha;
                $this->pila->push($res); // dos últimos elementos añadidos
                $this->mostrarEnPantalla();
            }
        }

        function resta()
        {
            if ($this->pila->size() >= 2) {
                $dcha = $this->pila->pop();
                $izq = $this->pila->pop();
                $this->pila->push($izq - $dcha);
                $this->mostrarEnPantalla();
            }
        }

        function suma()
        {
            if ($this->pila->size() >= 2) {
                $this->pila->push($this->pila->pop() . $this->pila->pop());
                $this->mostrarEnPantalla();
            }
        }

        function punto()
        {
            $this->pantalla .= ".";
        }


        function sin()
        {
            if ($this->pila->size() >= 1) {
                $n = $this->pila->pop();
                $this->pila->push(sin($n));
                $this->mostrarEnPantalla();
            }
        }

        function cos()
        {
            if ($this->pila->size() >= 1) {
                $n = $this->pila->pop();
                $this->pila->push(cos($n));
                $this->mostrarEnPantalla();
            }
        }

        function tan()
        {
            if ($this->pila->size() >= 1) {
                $n = $this->pila->pop();
                $this->pila->push(tan($n));
                $this->mostrarEnPantalla();
            }
        }

        function arcsin()
        {
            if ($this->pila->size() >= 1) {
                $n = $this->pila->pop();
                $this->pila->push(asin($n));
                $this->mostrarEnPantalla();
            }
        }

        function arctan()
        {
            if ($this->pila->size() >= 1) {
                $n = $this->pila->pop();
                $this->pila->push(acos($n));
                $this->mostrarEnPantalla();
            }
        }

        function arccos()
        {
            if ($this->pila->size() >= 1) {
                $n = $this->pila->pop();
                $this->pila->push(atan($n));
                $this->mostrarEnPantalla();
            }
        }


        function enter()
        {
            $this->pila->push(floatval($this->pantalla));

            $this->pantalla = "";

            $this->mostrarEnPantalla();
        }

        function mostrarEnPantalla()
        {
            if (!$this->pila->estaVacia()) {
                $this->pantallaPila = $this->pila->mostrar();
            }
        }


        function getPantalla()
        {
            return $this->pantalla;
        }

        function getPantallaPila()
        {
            return $this->pantallaPila;
        }
    }







    // si la calculadora no fue creada anteriormente, crear una nueva
    if (!isset($_SESSION['calculadoraRPN'])) {
        $_SESSION['calculadoraRPN'] = new CalculadoraRPN();
    }

    $calculadora = $_SESSION['calculadoraRPN'];

    if (count($_POST) > 0) {
        if(isset($_POST['botonArcSin'])) $calculadora->arcsin();
        if(isset($_POST['botonArcCos'])) $calculadora->arccos();
        if(isset($_POST['botonArcTan'])) $calculadora->arctan();
        if(isset($_POST['botonTan'])) $calculadora->tan();

        if(isset($_POST['botonSin'])) $calculadora->sin();
        if(isset($_POST['botonCos'])) $calculadora->cos();
        if(isset($_POST['botonDEL'])) $calculadora->del();
        if(isset($_POST['botonEnter'])) $calculadora->enter();

        if(isset($_POST['botonSiete'])) $calculadora->numero('7');
        if(isset($_POST['botonOcho'])) $calculadora->numero('8');
        if(isset($_POST['botonNueve'])) $calculadora->numero('9');
        if(isset($_POST['botonDivision'])) $calculadora->division();

        if(isset($_POST['botonCuatro'])) $calculadora->numero('4');
        if(isset($_POST['botonCinco'])) $calculadora->numero('5');
        if(isset($_POST['botonSeis'])) $calculadora->numero('6');
        if(isset($_POST['botonMultiplicacion'])) $calculadora->multiplicacion();

        if(isset($_POST['botonUno'])) $calculadora->numero('1');
        if(isset($_POST['botonDos'])) $calculadora->numero('2');
        if(isset($_POST['botonTres'])) $calculadora->numero('3');
        if(isset($_POST['botonMenos'])) $calculadora->resta();

        if(isset($_POST['botonCero'])) $calculadora->numero('0');
        if(isset($_POST['botonComa'])) $calculadora->punto();
        if(isset($_POST['botonBorrar'])) $calculadora->borrar();
        if(isset($_POST['botonMas'])) $calculadora->suma();
    }


    $pantalla = $calculadora->getPantalla();
    $pantallaPila = $calculadora->getPantallaPila();





    echo " <form name='CalculadoraMilan' action='#' method='POST'>
        <fieldset>
                    <textarea disabled title='taPantalla' name='taPantalla'>$pantalla</textarea>
					<textarea disabled title='taPantallaPila' name='taPantallaPila'>$pantallaPila</textarea>

					<input id='botonArcSin' type='submit' name='botonArcSin' value='ASIN'/>
					<input id='botonArcCos' type='submit' name='botonArcCos' value='ACOS'/>
					<input id='botonArcTan' type='submit' name='botonArcTan' value='ATAN'/>
					<input id='botonTan' type='submit' name='botonTan' value='TAN'/>

					<input id='botonSin' type='submit' name='botonSin' value='SIN'/>
					<input id='botonCos' type='submit' name='botonCos' value='COS'/>
					<input id='botonDEL' type='submit' name='DEL' value='Atrás'/>
					<input id='botonEnter' type='submit' name='botonEnter' value='Enter'/>
					

					<input id='botonSiete' type='submit' name='botonSiete' value='7'/>
					<input id='botonOcho' type='submit' name='botonOcho' value='8'/>
					<input id='botonNueve' type='submit' name='botonNueve' value='9'/>
					<input id='botonDivision' type='submit' name='botonDivision' value='/'/>

					
					<input id='botonCuatro' type='submit' name='botonCuatro' value='4'/>
					<input id='botonCinco' type='submit' name='botonCinco' value='5'/>
					<input id='botonSeis' type='submit' name='botonSeis' value='6'/>
					<input id='botonMultiplicacion' type='submit' name='botonMultiplicacion' value='*'/>

					
					<input id='botonUno' type='submit' name='botonUno' value='1'/>
					<input id='botonDos' type='submit' name='botonDos' value='2'/>
					<input id='botonTres' type='submit' name='botonTres' value='3'/>
					<input id='botonMenos' type='submit' name='botonMenos' value='-'/>

					
					<input id='botonCero' type='submit' name='botonCero' value='0'/>
					<input id='botonComa' type='submit' name='botonComa' value='.'/>
					<input id='botonBorrar' type='submit' name='botonBorrar' value='Borrar'/>
					<input id='botonMas' type='submit' name='botonMas' value='+'/>

</fieldset>
</form>";

    ?>
</body>

</html>