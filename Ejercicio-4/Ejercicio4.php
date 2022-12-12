<!DOCTYPE HTML>

<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Silvia Suárez Prendes" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Ejercicio 4</title>

    <link rel="stylesheet" href="Ejercicio4.css">
</head>

<body>

    <h1>Ejercicio 4 - Consumo de servicios Web de precios del oro</h1>
    <?php

    class InfoOro
    {

        private $access_key;
        private $base;
        private $moneda;
        private $url;
        private $datos;

        function __construct()
        {
            $this->datos = "";
            $this->access_key = '1z51wqxzxckpduf2toz2y23d4zd5zr4d1id350rjtj0re0aj4u0yu0q1m9n1';
            $this->base = 'XAU';

            $this->url = 'https://metals-api.com/api/latest?access_key=' . $this->access_key . '&base=XAU' . $this->base;
            
            $this->cargarDatos();
        }


        function cargarDatos(){
            $this->datos = file_get_contents($this->url);
            $json = json_decode($this->datos);

            if($json==null) {
                echo "<p>Ha ocurrido un error en el archivo JSON</p>";
            }

            echo "<ul>";
            echo "<li> Fecha en la que los datos fueron recibidos: " . $json->date . "</li>";
            echo "<li> Precio en € (euros): " . $json->rates->EUR . "</li>";
            echo "<li> Precio en libras esterlinas: " . $json->rates->GBP . "</li>";
            echo "<li> Precio en $ (dólares): " . $json->rates->USD . "</li>";
            echo "<li> Precio en yen japonés: " . $json->rates->JPY . "</li>";
            echo "<li> Precio en leu rumano: " . $json->rates->RON . "</li>";
            echo "<li> Precio en rublo ruso: " . $json->rates->RUB . "</li>";
            echo "<li> Precio en dírham de los EAU: " . $json->rates->AED . "</li>";
            echo "<li> Precio en bitcoin: " . $json->rates->BTC . "</li>";
            echo "</ul>";
        }
    }

    $info = new InfoOro();


    ?>
</body>

</html>