<!DOCTYPE HTML>

<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Silvia Suárez Prendes" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Ejercicio 6</title>

    <link rel="stylesheet" href="Ejercicio6.css">
</head>




<body>
    <nav>
        <a title="Crear base de datos" accesskey="C" tabindex="1" href="#crearBase">Crear base de
            datos</a>
        <a title="Crear tabla" accesskey="T" tabindex="2" href="#crearTabla">Crear tabla</a>
        <a title="Insertar datos" accesskey="I" tabindex="3" href="#insertarFila">Insertar datos</a>
        <a title="Buscar datos" accesskey="B" tabindex="4" href="#buscarDatos">Buscar datos</a>
        <a title="Modificar datos" accesskey="M" tabindex="5" href="#modificarFila">Modificar datos</a>
        <a title="Eliminar datos" accesskey="E" tabindex="6" href="#borrarDatos">Eliminar datos</a>
        <a title="Generar informe" accesskey="G" tabindex="7" href="#generarInforme">Generar informe</a>
        <a title="Exportar a CSV" accesskey="X" tabindex="8" href="#exportarDatos">Exportar a CSV</a>
        <a title="Importar CSV" accesskey="B" tabindex="9" href="#importarDatos">Importar CSV</a>
    </nav>

    <section> <a id="crearBase"></a>
        <h2>Crear base de datos</h2>
        <form action='#' name='crearBase' method='post'>
            <input type='submit' name='botonCrearBase' value='Crear base de datos' />
        </form>
    </section>


    <section> <a id="crearTabla"></a>
        <h2>Crear tabla en la base de datos</h2>
        <form action='#' name='crearTabla' method='post'>
            <input id='botonCrearTabla' type='submit' name='botonCrearTabla' value='Crear tabla' />
        </form>
    </section>


    <section> <a id="insertarFila"></a>
        <h2>Insertar una fila en la tabla</h2>
        <p>Rellene los siguientes datos y una vez completados pulse el botón para insertarlos en una nueva fila y
            añadirlos
            a la tabla.</p>
        <form action='#' name='insertarFila' method='post'>
            <p>
                <label for="txtDni"> DNI: </label>
                <input id="txtDni" type="text" name="dni" />
            </p>
            <p>
                <label for="txtNombre"> Nombre: </label>
                <input id="txtNombre" type="text" name="nombre" />
            </p>
            <p>
                <label for="txtApellidos"> Apellidos: </label>
                <input id="txtApellidos" type="text" name="apellidos" />
            </p>
            <p>
                <label for="txtEmail"> Email: </label>
                <input id="txtEmail" type="text" name="email" />
            </p>
            <p>
                <label for="txtTfno"> Teléfono: </label>
                <input id="txtTfno" type="text" name="telefono" />
            </p>
            <p>
                <label for="txtEdad"> Edad: </label>
                <input id="txtEdad" type="text" name="edad" />
            </p>
            <p>
                <label for="txtSexo"> Sexo: </label>
                <input id="txtSexo" type="text" name="sexo" />
            </p>
            <p>
                <label for="txtNivelPericia"> Nivel o pericia informática: </label>
                <input id="txtNivelPericia" type="text" name="pericia" />
            </p>
            <p>
                <label for="txtTiempo"> Tiempo que ha tardado en hacer la tarea (en segundos): </label>
                <input id="txtTiempo" type="text" name="tiempo" />
            </p>
            <p>
                <label for="txtTareaRealizada"> La tarea ha sido realizada correctamente (SI/NO): </label>
                <input id="txtTareaRealizada" type="text" name="tareaRealizada" />
            </p>
            <p>
                <label for="txtComentarios"> Comentarios: </label>
                <input id="txtComentarios" type="text" name="comentarios" />
            </p>
            <p>
                <label for="txtPropuestas"> Propuestas: </label>
                <input id="txtPropuestas" type="text" name="propuestas" />
            </p>
            <p>
                <label for="txtValoracion"> Valoracion de la aplicación (1 al 10): </label>
                <input id="txtValoracion" type="text" name="valoracion" />
            </p>
            <p>
                <input id='botonInsertarFila' type='submit' name='botonInsertarFila' value='Insertar fila' />
            </p>
        </form>
    </section>


    <section> <a id="buscarDatos"></a>
        <h2>Buscar datos en la tabla</h2>
        <p>Introduzca el DNI y pulse el botón para que se muestren los datos.</p>
        <form name='buscarDatos' method='post' action="Ejercicio6.php">
            <fieldset>
                <label for="dniBuscar">DNI:<input id="dniBuscar" type="text" name="dniBuscar" /> </label>
                <input id='botonBuscarDatos' type='submit' name='botonBuscarDatos' value='Buscar datos' />
            </fieldset>
        </form>
    </section>


    <section> <a id="modificarFila"></a>
        <h2>Modificar los datos de una fila</h2>
        <p>Introduzca el DNI para modificar sus datos. Para ello debe introducir los datos nuevos y pulsar el botón para
            modificarlos.</p>
        <form name='modificarFila' method='post' action="Ejercicio6.php">
            <fieldset>
                <p>
                    <label for="txtDniAModificar">DNI a modificar:<input id="txtDniAModificar" type="text"
                            name="dniParam" />
                    </label>
                </p>
                <p>
                    <label for="dniModificado">DNI:<input id="dniModificado" type="text" name="dniModificado" />
                    </label>
                </p>
                <p>
                    <label for="nombreModificado">Nombre: <input id="nombreModificado" type="text"
                            name="nombreModificado" />
                    </label>
                </p>
                <p>
                    <label for="apellidosModificado">Apellidos: <input id="apellidosModificado" type="text"
                            name="apellidosModificado" />
                    </label>
                </p>
                <p>
                    <label for="emailModificado">Email: <input id="emailModificado" type="text"
                            name="emailModificado" /></label>
                </p>
                <p>
                    <label for="telefonoModificado">Teléfono: <input id="telefonoModificado" type="text"
                            name="telefonoModificado" /></label>
                </p>
                <p>
                    <label for="edadModificado">Edad: <input id="edadModificado" type="number"
                            name="edadModificado" /></label>
                </p>
                <p>
                    <label for="sexoModificado">Sexo: <input id="sexoModificado" type="text"
                            name="sexoModificado" /></label>
                </p>
                <p>
                    <label for="periciaModificado">Nivel de pericia informática: <input id="periciaModificado"
                            type="number" name="periciaModificado" /></label>
                </p>
                <p>
                    <label for="tiempoModificado">Tiempo: <input id="tiempoModificado" type="number"
                            name="tiempoModificado" /></label>
                </p>
                <p>
                    <label for="tareaModificada">Tarea realizada correctamente (SI/NO): <input id="tareaModificada"
                            type="text" name="tareaModificada" /></label>
                </p>
                <p>
                    <label for="comentariosModificado">Comentarios: <input id="comentariosModificado" type="text"
                            name="comentariosModificado" /></label>
                </p>
                <p>
                    <label for="propuestasModificado">Propuestas de mejora: <input id="propuestasModificado" type="text"
                            name="propuestasModificado" /></label>
                </p>
                <p>
                    <label for="valoracionModificado">Valoracion: <input id="valoracionModificado" type="number"
                            name="valoracionModificado" /></label>
                </p>
                <p>
                    <input id='botonModificarFila' type='submit' name='botonModificarFila' value='Modificar fila' />
            </fieldset>
        </form>
    </section>

    <section> <a id="borrarDatos"></a>
        <h2>Borrar datos de una persona en la tabla</h2>
        <p>Introduzca el DNI y pulse el botón para borrar sus datos.</p>
        <form name='borrarDatos' method='post' action="Ejercicio6.php">
            <fieldset>
                <label for="dniBorrar">DNI:<input id="dniBorrar" type="text" name="dniBorrar" /> </label>
                <input id='botonBorrarDatos' type='submit' name='botonBorrarDatos' value='Borrar datos' />
            </fieldset>
        </form>
    </section>

    <section> <a id="generarInforme"></a>
        <h2>Generar el informe de estadísticas</h2>
        <p>Pulse el botón para generar el informe.</p>
        <form name='generarInforme' method='post'>
            <fieldset>
                <input id='botonGenerarInforme' type='submit' name='botonGenerarInforme' value='Generar informe' />
            </fieldset>
        </form>
    </section>

    <section> <a id="exportarDatos"></a>
        <h2>Exportar los datos a un fichero CSV</h2>
        <p>Pulse el botón para exportar los datos.</p>
        <form name='exportarDatos' method='post'>
            <fieldset>
                <input id='botonExportarDatos' type='submit' name='botonExportarDatos' value='Exportar datos' />
            </fieldset>
        </form>
    </section>

    <section> <a id="importarDatos"></a>
        <h2>Importar los datos desde un fichero CSV</h2>
        <p>Seleccione el archivo CSV que desea importar y pulse el botón para cargar los datos correspondientes.</p>
        <form name='importarDatos' action='#' method='post' enctype='multipart/form-data'>
            <fieldset>
                <label for="archivoACargar">Selecciona el archivo a cargar<input id='archivoACargar' type='file'
                        name='archivoACargar' /></label>
                <input id='botonImportarDatos' type='submit' name='botonImportarDatos' value='Importar datos' />
            </fieldset>
        </form>
    </section>



    <?php
    class BaseDatos
    {
        private $server;
        private $usuario;
        private $contraseña;

        function __construct()
        {
            $this->server = "localhost";
            $this->usuario = "DBUSER2022";
            $this->contraseña = "DBPSWD2022";
        }


        function crearBaseDeDatos()
        {
            // Establecer conexión al SGBD local con XAMPP con el usuario creado (server, usuario, contraseña)
            $base = new mysqli($this->server, $this->usuario, $this->contraseña);

            // Comprobar la conexión -> lanzar mensaje
            if ($base->connect_error) {
                exit("<p>ERROR de conexión:" . $base->connect_error . "</p>");
            } else {
                echo "<p>Conexión establecida con " . $base->host_info . "</p>";
            }

            $cadenaSQL = "CREATE DATABASE IF NOT EXISTS Ejercicio6 COLLATE utf8_spanish_ci";

            if ($base->query($cadenaSQL) === TRUE) {
                echo "<p>La base de datos ha sido creada correctamente</p>";
            } else {
                echo "<p>Ha ocurrido un error en la creación de la base de datos. Error:" . $base->error . "</p>";
                exit();
            }

            // Cerrar la conexión
            $base->close();
        }


        function crearTabla()
        {
            $bd = "Ejercicio6";

            // Establecer conexión al SGBD local con XAMPP con el usuario creado (server, usuario, contraseña)
            $base = new mysqli($this->server, $this->usuario, $this->contraseña);

            // Seleccionar la base de datos que vamos a utilizar
            $base->select_db($bd);

            // Crear la tabla PruebasUsabilidad a partir de todos datos de la persona 
            $crearTabla = "CREATE TABLE IF NOT EXISTS PruebasUsabilidad (
                DNI varchar(9) NOT NULL,
                Nombre varchar(255) NOT NULL,
                Apellidos varchar(255) NOT NULL,
                Email varchar(255) NOT NULL,
                Telefono varchar(12) NOT NULL,
                Edad int(11) NOT NULL,
                Sexo varchar(15) NOT NULL,
                Nivel_pericia int(11) NOT NULL,
                Tiempo int(11) NOT NULL,
                Tarea_realizada varchar(2) NOT NULL,
                Comentarios varchar(255) NOT NULL,
                Propuestas varchar(255) NOT NULL,
                Valoracion int(11) NOT NULL
              )";

            if ($base->query($crearTabla) === TRUE) {
                echo "<p>La tabla PruebasUsabilidad ha sido creada correctamente </p>";
            } else {
                echo "<p>Ha ocurrido un error en la creación de la tabla PruebasUsabilidad. Error: " . $base->error . "</p>";
                exit();
            }

            // Cerrar la conexión
            $base->close();
        }


        function insertarDatos()
        {
            $bd = "Ejercicio6";

            // Establecer conexión al SGBD local con XAMPP con el usuario creado (server, usuario, contraseña)
            $base = new mysqli($this->server, $this->usuario, $this->contraseña, $bd);

            // Comprobar la conexion
            if ($base->connect_error) {
                exit("<h2>Error en la conexión:" . $base->connect_error . "</h2>");
            } else {
                echo "<h2>Conexión establecida</h2>";
            }

            // Comando para insertar
            $consultaPre = $base->prepare("INSERT INTO PruebasUsabilidad (DNI, Nombre, Apellidos, Email, Telefono, Edad, Sexo, Nivel_pericia, Tiempo, Tarea_realizada, Comentarios, Propuestas, Valoracion) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");

            $consultaPre->bind_param(
                'sssssisiisssi',
                $_POST["dni"], $_POST["nombre"], $_POST["apellidos"], $_POST["email"], $_POST["telefono"], $_POST["edad"], $_POST["sexo"], $_POST["pericia"], $_POST["tiempo"], $_POST["tareaRealizada"], $_POST["comentarios"], $_POST["propuestas"], $_POST["valoracion"]
            );

            // Insertar
            $consultaPre->execute();

            // Printear los resultados de la inserción
            echo "<p>Filas añadidas: " . $consultaPre->affected_rows . "</p>";

            $consultaPre->close();

            // Cerrar la conexión
            $base->close();
        }


        function buscarDatos()
        {
            $bd = "Ejercicio6";

            // Establecer conexión al SGBD local con XAMPP con el usuario creado (server, usuario, contraseña)
            $base = new mysqli($this->server, $this->usuario, $this->contraseña, $bd);

            // Comprobar la conexion
            if ($base->connect_error) {
                exit("<h2>Error en la conexión:" . $base->connect_error . "</h2>");
            } else {
                echo "<h2>Conexión establecida</h2>";
            }

            $consulta = $base->prepare('SELECT * FROM PruebasUsabilidad WHERE DNI = ?');
            $consulta->bind_param('s', $_POST["dniBuscar"]);
            $consulta->execute();
            $aux = $consulta->get_result();

            // Comprobación de los datos recibidos     
            if ($aux->num_rows > 0) {
                echo "<p>DATOS</p>";
                echo "<p>Filas = " . $aux->num_rows . "</p>";
                echo "<ul>";
                echo "<li>" . 'id' . " - " . 'dni' . " - " . 'nombre' . " - " . 'apellidos'
                    . " - " . 'email'
                    . " - " . 'teléfono'
                    . " - " . 'edad'
                    . " - " . 'sexo'
                    . " - " . 'nivel de pericia informática'
                    . " - " . 'tiempo'
                    . " - " . 'tarea realizada correctamente'
                    . " - " . 'comentarios'
                    . " - " . 'propuestas'
                    . " - " . 'valoración' . "</li>";
                while ($row = $aux->fetch_assoc()) {
                    echo "<li>" . $row['DNI'] . " - " . $row['Nombre'] . " - " . $row['Apellidos']
                        . " - " . $row['Email']
                        . " - " . $row['Telefono']
                        . " - " . $row['Edad']
                        . " - " . $row['Sexo']
                        . " - " . $row['Nivel_pericia']
                        . " - " . $row['Tiempo']
                        . " - " . $row['Tarea_realizada']
                        . " - " . $row['Comentarios']
                        . " - " . $row['Propuestas']
                        . " - " . $row['Valoracion'] . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>La tabla está vacía. Recuento de filas = " . $aux->num_rows . "</p>";
            }

            // Cerrar la conexión
            $base->close();
        }

        function modificarDatos()
        {
            $bd = "Ejercicio6";

            // Establecer conexión al SGBD local con XAMPP con el usuario creado (server, usuario, contraseña)
            $base = new mysqli($this->server, $this->usuario, $this->contraseña, $bd);

            // Comprobar la conexion
            if ($base->connect_error) {
                exit("<h2>Error en la conexión:" . $base->connect_error . "</h2>");
            } else {
                echo "<h2>Conexión establecida</h2>";
            }

            $consulta = $base->prepare("UPDATE PruebasUsabilidad SET DNI = ?, Nombre = ?, Apellidos = ? , Email = ?, Telefono = ?, Edad = ?, Sexo = ?, Nivel_pericia = ?, Tiempo = ?, Tarea_realizada = ?, Comentarios = ?, Propuestas = ?, Valoracion = ? WHERE DNI = ?");

            $consulta->bind_param(
                'sssssisiisssis',
                $_POST["dniModificado"], $_POST["nombreModificado"], $_POST["apellidosModificado"], $_POST["emailModificado"], $_POST["telefonoModificado"], $_POST["edadModificado"], $_POST["sexoModificado"], $_POST["periciaModificado"], $_POST["tiempoModificado"], $_POST["tareaModificada"], $_POST["comentariosModificado"], $_POST["propuestasModificado"], $_POST["valoracionModificado"], $_POST["dniParam"]
            );

            $consulta->execute();

            // Mostrar los resultados
            echo "<p>Filas modificadas: " . $consulta->affected_rows . "</p>";

            $consulta->close();

            // Cerrar la conexión
            $base->close();
        }


        function eliminarDatos()
        {
            $bd = "Ejercicio6";

            // Establecer conexión al SGBD local con XAMPP con el usuario creado (server, usuario, contraseña)
            $base = new mysqli($this->server, $this->usuario, $this->contraseña, $bd);

            // Comprobar la conexion
            if ($base->connect_error) {
                exit("<h2>Error en la conexión:" . $base->connect_error . "</h2>");
            } else {
                echo "<h2>Conexión establecida</h2>";
            }

            //prepara la consulta
            $consulta = $base->prepare("SELECT * FROM PruebasUsabilidad WHERE DNI = ?");

            //obtiene los parámetros de la variable predefinida $_POST
            // s indica que dni es un string
            $consulta->bind_param('s', $_POST["dniBorrar"]);

            //ejecuta la consulta
            $consulta->execute();

            //guarda los resultados como un objeto de la clase mysqli_result
            $aux = $consulta->get_result();

            //Visualización de los resultados de la búsqueda
            if ($aux->fetch_assoc() != NULL) {
                echo "<p>Las filas de la tabla 'PruebasUsabilidad' que van a ser eliminadas son:</p>";
                $aux->data_seek(0); //Se posiciona al inicio del resultado de búsqueda
                while ($fila = $aux->fetch_assoc()) {
                    echo "<p>" . "id = " . " / dni = " . $fila["DNI"] . " / nombre = " . $fila['Nombre'] . " / apellidos = " . $fila['Apellidos'] . "</p>";
                }
                echo "</ul>";

                //Realiza el borrado
                //prepara la sentencia SQL de borrado
                $consulta = $base->prepare("DELETE FROM PruebasUsabilidad WHERE DNI = ?");
                //obtiene los parámetros de la variable almacenada
                $consulta->bind_param('s', $_POST["dniBorrar"]);
                //ejecuta la consulta
                $consulta->execute();
                // cierra la consulta
                $consulta->close();
                echo "<p>Datos borrados.</p>";
            } else {
                echo "<p>Ningun dato ha sido borrado.</p>";
            }

            //cerrar la conexión
            $base->close();
        }

        function generarInforme()
        {
            $numUsuarios = $this->obtenernumUsuarios();

            if ($numUsuarios == 0) {
                echo "<p> No hay un número de usuarios suficientes como para hacer el informe </p>";
            } else {
                // Edad media de los usuarios
                $edadMediaUsuarios = $this->obtenerValorMedioDe("Edad");

                // Frecuencia del % de cada tipo de sexo entre los usuarios
                $numUsuariosMasculino = $this->obtenernumUsuariosMasculino();
                $porcentajeNumUsuariosMasculino = ($numUsuariosMasculino / $numUsuarios) * 100;

                $numUsuariosFemenino = $this->obtenernumUsuariosFemenino();
                $porcentajeNumUsuariosFemenino = ($numUsuariosFemenino / $numUsuarios) * 100;

                // Valor medio del nivel o pericia informática de los usuarios
                $valorMedioPericia = $this->obtenerValorMedioDe("Nivel_pericia");

                // Tiempo medio para la tarea
                $valorMedioTiempo = $this->obtenerValorMedioDe("Tiempo");

                // Porcentaje de usuarios que han realizado la tarea correctamente
                $numUsuariosCorrectamente = $this->obtenernumUsuariosCorrectamente();
                $porcentajeCorrectamente = ($numUsuariosCorrectamente / $numUsuarios) * 100;

                // Valor medio de la puntuación de los usuarios sobre la aplicación
                $valorMedioPuntuacion = $this->obtenerValorMedioDe("Valoracion");

                echo "<ul>";
                echo "<li>Edad media de los usuarios: $edadMediaUsuarios años</li>";
                echo "<li>Porcentaje de usuarios masculinos: $porcentajeNumUsuariosMasculino %</li>";
                echo "<li>Porcentaje de usuarios femenino: $porcentajeNumUsuariosFemenino %</li>";
                echo "<li>Valor medio del nivel o pericia informática de los usuarios: $valorMedioPericia </li>";
                echo "<li>Tiempo medio para la tarea: $valorMedioTiempo segundos</li>";
                echo "<li>Porcentaje de usuarios que han realizado la tarea correctamente: $porcentajeCorrectamente %</li>";
                echo "<li>Valor medio de la puntuación de los usuarios sobre la aplicación: $valorMedioPuntuacion </li>";
                echo "</ul>";
            }

        }

        private function obtenerNumUsuarios()
        {

            $bd = "Ejercicio6";

            // Establecer conexión al SGBD local con XAMPP con el usuario creado (server, usuario, contraseña)
            $base = new mysqli($this->server, $this->usuario, $this->contraseña, $bd);

            $numUsuarios = $base->query('SELECT COUNT(*) AS numeroTotal FROM PruebasUsabilidad');

            $numero = null;

            if ($numUsuarios->num_rows > 0) {
                while ($row = $numUsuarios->fetch_assoc()) {
                    $numero = $row['numeroTotal'];
                }
            } else {
                echo "<p>No se pudo obtener el número</p>";
            }

            return $numero;
        }

        private function obtenerNumUsuariosMasculino()
        {

            $bd = "Ejercicio6";

            // Establecer conexión al SGBD local con XAMPP con el usuario creado (server, usuario, contraseña)
            $base = new mysqli($this->server, $this->usuario, $this->contraseña, $bd);

            $numUsuarios = $base->query('SELECT COUNT(*) AS numeroTotal FROM PruebasUsabilidad WHERE sexo="Masculino"');

            $numero = null;

            if ($numUsuarios->num_rows > 0) {
                while ($row = $numUsuarios->fetch_assoc()) {
                    $numero = $row['numeroTotal'];
                }
            } else {
                echo "<p>No se pudo obtener el número</p>";
            }

            return $numero;
        }

        private function obtenerNumUsuariosFemenino()
        {

            $bd = "Ejercicio6";

            // Establecer conexión al SGBD local con XAMPP con el usuario creado (server, usuario, contraseña)
            $base = new mysqli($this->server, $this->usuario, $this->contraseña, $bd);

            $numUsuarios = $base->query('SELECT COUNT(*) AS numeroTotal FROM PruebasUsabilidad WHERE sexo="Femenino"');

            $numero = null;

            if ($numUsuarios->num_rows > 0) {
                while ($row = $numUsuarios->fetch_assoc()) {
                    $numero = $row['numeroTotal'];
                }
            } else {
                echo "<p>No se pudo obtener el número</p>";
            }

            return $numero;
        }

        private function obtenerNumUsuariosCorrectamente()
        {

            $bd = "Ejercicio6";

            // Establecer conexión al SGBD local con XAMPP con el usuario creado (server, usuario, contraseña)
            $base = new mysqli($this->server, $this->usuario, $this->contraseña, $bd);

            $numUsuarios = $base->query('SELECT COUNT(*) AS numeroTotalCorrectamente FROM PruebasUsabilidad WHERE Tarea_realizada="SI"');

            $numero = null;

            if ($numUsuarios->num_rows > 0) {
                while ($row = $numUsuarios->fetch_assoc()) {
                    $numero = $row['numeroTotalCorrectamente'];
                }
            } else {
                echo "<p>No se pudo obtener el número</p>";
            }

            return $numero;
        }

        private function obtenerValorMedioDe($valor)
        {

            $bd = "Ejercicio6";

            // Establecer conexión al SGBD local con XAMPP con el usuario creado (server, usuario, contraseña)
            $base = new mysqli($this->server, $this->usuario, $this->contraseña, $bd);


            $valorMedio = $base->query('SELECT AVG(' . $valor . ') AS valorMedio FROM PruebasUsabilidad');

            $valor = null;

            if ($valorMedio->num_rows > 0) {
                while ($row = $valorMedio->fetch_assoc()) {
                    $valor = $row['valorMedio'];
                }
            } else {
                echo "<p>No se pudo obtener el valor medio</p>";
            }

            return $valor;
        }

        function cargarCSV()
        {
            $bd = "Ejercicio6";

            // Establecer conexión al SGBD local con XAMPP con el usuario creado (server, usuario, contraseña)
            $base = new mysqli($this->server, $this->usuario, $this->contraseña, $bd);


            $archivoTexto = fopen($_FILES['archivoACargar']['tmp_name'], "rb");

            $linea = fgetcsv($archivoTexto);

            while ($linea == true) {
                $consultaPre = $base->prepare("INSERT INTO PruebasUsabilidad (DNI, Nombre, Apellidos, Email, Telefono, Edad, Sexo, Nivel_Pericia, Tiempo, Tarea_realizada, Comentarios, Propuestas, Valoracion) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $consultaPre->bind_param(
                    'sssssisiisssi',
                    $linea[0], $linea[1], $linea[2], $linea[3], $linea[4], $linea[5], $linea[6], $linea[7], $linea[8], $linea[9], $linea[10], $linea[11], $linea[12]
                );
                $linea = fgetcsv($archivoTexto);
                $consultaPre->execute();
                $consultaPre->close();
            }
        }

        function exportarCSV()
        {

            $bd = "Ejercicio6";

            // Establecer conexión al SGBD local con XAMPP con el usuario creado (server, usuario, contraseña)
            $base = new mysqli($this->server, $this->usuario, $this->contraseña, $bd);

            $datos = $base->query('SELECT * FROM PruebasUsabilidad');

            $aEscribir = "";

            if ($datos->num_rows > 0) {
                while ($row = $datos->fetch_assoc()) {
                    $aEscribir .= $row["DNI"] . "," . $row["Nombre"] . "," . $row["Apellidos"] . "," . $row["Email"] . "," . $row["Telefono"] . "," . $row["Edad"] . "," . $row["Sexo"] . "," . $row["Nivel_pericia"] . "," . $row["Tiempo"] . "," . $row["Tarea_realizada"] . "," . $row["Comentarios"] . "," . $row["Propuestas"] . "," . $row["Valoracion"] . "\n";
                }
            }

            $base->close();
            file_put_contents("pruebasUsabilidad.csv", $aEscribir);
            echo "Se ha generado el archivo pruebasUsabilidad.csv con el contenido de la tabla";
        }
    }


    $baseDatos = new BaseDatos();

    if (count($_POST) > 0) {
        if (isset($_POST['botonCrearBase']))
            $baseDatos->crearBaseDeDatos();
        if (isset($_POST['botonCrearTabla']))
            $baseDatos->crearTabla();
        if (isset($_POST['botonInsertarFila']))
            $baseDatos->insertarDatos();
        if (isset($_POST['botonBuscarDatos']))
            $baseDatos->buscarDatos();
        if (isset($_POST['botonModificarFila']))
            $baseDatos->modificarDatos();
        if (isset($_POST['botonBorrarDatos']))
            $baseDatos->eliminarDatos();
        if (isset($_POST['botonGenerarInforme']))
            $baseDatos->generarInforme();
        if (isset($_POST['botonExportarDatos']))
            $baseDatos->exportarCSV();
        if (isset($_POST['botonImportarDatos']))
            $baseDatos->cargarCSV();
    }




    ?>
</body>

</html>