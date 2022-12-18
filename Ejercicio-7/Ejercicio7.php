<!DOCTYPE HTML>

<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Silvia Suárez Prendes" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Ejercicio 7</title>

    <link rel="stylesheet" type="text/css" href="Ejercicio7.css">
</head>




<body>

    <h1>Ejercicio 7 - Compra de productos</h1>

    <nav>
        <a title="Añadir producto a la cesta" accesskey="A" tabindex="1" href="#añadirProducto">Añadir producto a la
            cesta</a>
        <a title="Crear perfil de cliente" accesskey="C" tabindex="2" href="#crearPerfilCliente">Crear perfil de
            cliente</a>
        <a title="Buscar datos" accesskey="B" tabindex="3" href="#buscarProducto">Buscar producto en la cesta</a>
        <a title="Modificar cantidad de producto" accesskey="M" tabindex="4" href="#modificarCantidadProducto">Modificar
            cantidad de
            producto</a>
        <a title="Borrar producto" accesskey="E" tabindex="5" href="#borrarProducto">Borrar producto de pedido</a>
        <a title="Generar factura" accesskey="G" tabindex="6" href="#generarFactura">Generar factura</a>
    </nav>

    <section> <a id="añadirProducto"></a>
        <h2>Añadir producto a la cesta</h2>
        <p>Rellene los siguientes datos y una vez completados pulse el botón para añadir el nuevo producto a la cesta.
        </p>
        <form action='#' name='añadirProducto' method='post'>
            <p>
                <label for="txtCodigo"> Código: </label>
                <input id="txtCodigo" type="text" name="codigo_producto" />
            </p>
            <p>
                <label for="txtNombre"> Nombre del producto: </label>
                <input id="txtNombre" type="text" name="nombre_producto" />
            </p>
            <p>
                <label for="txtPrecio"> Precio: </label>
                <input id="txtPrecio" type="number" name="precio_producto" />
            </p>
            <p>
                <label for="txtCantidad"> Cantidad: </label>
                <input id="txtCantidad" type="number" name="cantidad_producto" />
            </p>
            <p>
                <label for="txtDescripcion"> Descripción: </label>
                <input id="txtDescripcion" type="text" name="descripcion_producto" />
            </p>
            <p>
                <input id='botonAñadirProducto' type='submit' name='botonAñadirProducto' value='Añadir producto' />
            </p>
        </form>
    </section>

    <section> <a id="crearPerfilCliente"></a>
        <h2>Crear perfil de cliente</h2>
        <p>Rellene los siguientes datos y una vez completados pulse el botón para crear un nuevo perfil de cliente.</p>
        <form action='#' name='crearPerfilCliente' method='post'>
            <p>
                <label for="txtCodigoCliente"> Identificador de cliente: </label>
                <input id="txtCodigoCliente" type="text" name="codigo_cliente" />
            </p>
            <p>
                <label for="txtNombreApellidos"> Nombre y apellidos: </label>
                <input id="txtNombreApellidos" type="text" name="nombreApellidos_cliente" />
            </p>
            <p>
                <input id='botonCrearPerfilCliente' type='submit' name='botonCrearPerfilCliente'
                    value='Crear perfil cliente' />
            </p>
        </form>
    </section>

    <section> <a id="buscarProducto"></a>
        <h2>Buscar producto en la cesta</h2>
        <p>Introduzca el código del producto y pulse el botón para que se muestren los datos disponibles.</p>
        <form name='buscarProducto' method='post' action="Ejercicio7.php">
            <fieldset>
                <label for="codigoBuscar"> Código: <input id="codigoBuscar" type="text" name="codigoBuscar" /> </label>
                <input id='botonBuscarProducto' type='submit' name='botonBuscarProducto' value='Buscar producto' />
            </fieldset>
        </form>
    </section>

    <section> <a id="modificarCantidadProducto"></a>
        <h2>Modificar cantidad de un producto</h2>
        <p>Introduzca el código del producto que desea modificar y la nueva cantidad que desea.</p>
        <form name='modificarCantidadProducto' method='post' action="Ejercicio7.php">
            <fieldset>
                <p>
                    <label for="txtCodigoAModificar">Código del producto:<input id="txtCodigoAModificar" type="text"
                            name="codigoParam" />
                    </label>
                </p>
                <p>
                    <label for="cantidadModificada"> Nueva cantidad: <input id="cantidadModificada" type="number"
                            name="cantidadModificada" /></label>
                </p>

                <input id='botonModificarCantidadProducto' type='submit' name='botonModificarCantidadProducto'
                    value='Modificar cantidad de producto' />
            </fieldset>
        </form>
    </section>

    <section> <a id="borrarProducto"></a>
        <h2>Borrar producto del pedido</h2>
        <p>Introduzca el código y pulse el botón para eliminar el producto del pedido.</p>
        <form name='borrarProducto' method='post' action="Ejercicio7.php">
            <fieldset>
                <label for="codigoBorrar"> Código: <input id="codigoBorrar" type="text" name="codigoBorrar" /> </label>
                <input id='botonBorrarProducto' type='submit' name='botonBorrarProducto' value='Borrar producto' />
            </fieldset>
        </form>
    </section>

    <section> <a id="importarDatos"></a>
        <h2>Importar datos desde un fichero CSV</h2>
        <p>Seleccione el archivo CSV que desea importar y pulse el botón para cargar los datos correspondientes.</p>
        <form name='importarDatos' action='#' method='post'>
            <fieldset>
                <label for="archivoACargar">Selecciona el archivo a cargar<input id='archivoACargar' type='file'
                        name='archivoACargar' /></label>
                <input id='botonImportarDatos' type='submit' name='botonImportarDatos' value='Importar datos' />
            </fieldset>
        </form>
    </section>

    <section> <a id="generarFactura"></a>
        <h2>Generar factura</h2>
        <p> Introduzca su identificador de cliente y el identificador del almacén donde desea recoger el pedido.</p>
        <form name='generarFactura' action='#' method='post'>
            <p>
                <label for="txtIDCliente"> Identificador de cliente: </label>
                <input id="txtIDCliente" type="text" name="codigo_cliente" />
            </p>
            <p>
                <label for="txtIDAlmacen"> Identificador de almacén: </label>
                <input id="txtIDAlmacen" type="text" name="idAlmacen" />
            </p>
            <fieldset>
                <input id='botonGenerarFactura' type='submit' name='botonGenerarFactura' value='Generar factura' />
            </fieldset>
        </form>
    </section>


    <?php
    class BaseDatos
    {
        private $server;
        private $usuario;
        private $contraseña;
        private $base;

        function __construct()
        {
            $this->server = "localhost";
            $this->usuario = "DBUSER2022";
            $this->contraseña = "DBPSWD2022";
            $this->base = "ejercicio7";
        }

        function añadirProducto()
        {
            // Establecer conexión al SGBD local con XAMPP con el usuario creado (server, usuario, contraseña)
            $b = new mysqli($this->server, $this->usuario, $this->contraseña);

            // Seleccionar la base de datos que vamos a utilizar
            $b->select_db($this->base);

            // Crear la tabla PruebasUsabilidad a partir de todos datos de la persona 
            $insertar = $b->prepare("INSERT INTO PRODUCTO (codigo_producto, nombre_producto, precio_producto, cantidad_producto, descripcion_producto) VALUES (?,?,?,?,?)");

            $insertar->bind_param(
                'ssiis',
                $_POST["codigo_producto"], $_POST["nombre_producto"], $_POST["precio_producto"], $_POST["cantidad_producto"], $_POST["descripcion_producto"]
            );

            $b->query($insertar);

            echo "Inserción correcta";
        }

        function crearPerfilCliente()
        {
            // Establecer conexión al SGBD local con XAMPP con el usuario creado (server, usuario, contraseña)
            $b = new mysqli($this->server, $this->usuario, $this->contraseña);

            // Seleccionar la base de datos que vamos a utilizar
            $b->select_db($this->base);

            // Crear la tabla PruebasUsabilidad a partir de todos datos de la persona 
            $insertar = $b->prepare("INSERT INTO CLIENTE (codigo_cliente, nombreApellidos_cliente) VALUES (?,?)");

            $insertar->bind_param(
                'ss',
                $_POST["codigo_cliente"], $_POST["nombreApellidos_cliente"]
            );

            $insertar->execute();

            echo "Creación de perfil cliente correcta";
        }

        function buscarProducto()
        {
            // Establecer conexión al SGBD local con XAMPP con el usuario creado (server, usuario, contraseña)
            $b = new mysqli($this->server, $this->usuario, $this->contraseña);

            $b->select_db($this->base);

            $buscar = $b->prepare('SELECT * FROM PEDIDO_PRODUCTO WHERE codigo_producto = ?');
            $buscar->bind_param('s', $_POST["codigo_producto"]);
            $buscar->execute();
            $aux = $buscar->get_result();

            // Comprobación de los datos recibidos     
            if ($aux->num_rows > 0) {
                echo "<ul>";
                while ($row = $aux->fetch_assoc()) {
                    echo "["
                        . "<li>" . $row['codigo_producto'] . "]  -  "
                        . $row['nombre_producto'] . "  -  "
                        . $row['precio_producto'] . "€  -  '"
                        . $row['cantidad_producto'] . "  -  '"
                        . $row['descripcion_producto']
                        . "'</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>El producto no está en la cesta.</p>";
            }
        }

        function modificarCantidadProducto()
        {
            // Establecer conexión al SGBD local con XAMPP con el usuario creado (server, usuario, contraseña)
            $b = new mysqli($this->server, $this->usuario, $this->contraseña);

            $b->select_db($this->base);

            $modificar = $b->prepare("UPDATE PEDIDO_PRODUCTO SET cantidad_producto = ? WHERE codigo_producto = ?");

            $modificar->bind_param(
                's',
                $_POST["cantidad_producto"]
            );

            $modificar->execute();

            $aux = $modificar->get_result();

            echo "La cantidad del producto ha sido modificada con éxito.";
        }

        function borrarProducto()
        {
            // Establecer conexión al SGBD local con XAMPP con el usuario creado (server, usuario, contraseña)
            $b = new mysqli($this->server, $this->usuario, $this->contraseña);
            $b->select_db($this->base);

            $query = $b->prepare("DELETE FROM PRODUCTO WHERE codigo_producto = ?");

            $query->bind_param('s', $_POST["codigo_producto"]);

            $query->execute();

            echo "El producto ha sido borrado correctamente.";
        }


        function cargarProductos()
        {
            // Establecer conexión al SGBD local con XAMPP con el usuario creado (server, usuario, contraseña)
            $b = new mysqli($this->server, $this->usuario, $this->contraseña);
            $b->select_db($this->base);

            $archivo = fopen($_FILES['archivoACargar']['tmp_name'], "rb");
            $linea = fgetcsv($archivo);

            while ($linea) {
                $query = $b->prepare("INSERT INTO PRODUCTO (codigo_producto, nombre_producto, precio_producto, descripcion_producto) VALUES (?,?,?,?)");

                $query->bind_param('ssis', $linea[0], $linea[1], $linea[2], $linea[3]);

                $linea = fgetcsv($archivo);
                $query->execute();
            }

            echo "El archivo ha sido cargado correctamente";
        }

        function generarFactura()
        {
            // Establecer conexión al SGBD local con XAMPP con el usuario creado (server, usuario, contraseña)
            $b = new mysqli($this->server, $this->usuario, $this->contraseña);
            $b->select_db($this->base);

            $query = $b->prepare("SELECT * FROM FACTURA WHERE codigo_cliente = ?");

            $query->bind_param('s', $_POST["codigo_cliente"]);

            $query->execute();

            $aux = $query->get_result();

            while ($i = $aux->fetch_array()) {
                echo "<p>Factura: " . $i['codigo_factura'] . "</p>
                        <p>Código de almacen:  " . $i['codigo_almacen'] . "</p>
                        <p>Importe total: " . $i['importe_factura'] . "€</p>";
            }
        }

    }

    $baseDatos = new BaseDatos();

    if (count($_POST) > 0) {
        if (isset($_POST['botonAñadirProducto']))
            $baseDatos->añadirProducto();
        if (isset($_POST['botonCrearPerfilCliente']))
            $baseDatos->crearPerfilCliente();
        if (isset($_POST['botonBuscarProducto']))
            $baseDatos->buscarProducto();
        if (isset($_POST['botonModificarCantidadProducto']))
            $baseDatos->modificarCantidadProducto();
        if (isset($_POST['botonBorrarProducto']))
            $baseDatos->borrarProducto();
        if (isset($_POST['botonImportarDatos']))
            $baseDatos->cargarProductos();
        if (isset($_POST['botonGenerarFactura']))
            $baseDatos->generarFactura();
    }



    ?>


</body>

</html>