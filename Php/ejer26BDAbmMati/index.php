<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php26ABM</title>
    <link rel="stylesheet" href="./ejer26BDAbm.css">
</head>
<body>
    <!-- Diseño Contenedor Base -->
    <div id="contenedorBase">
        <div class="cabeceraTabla">
            <header>Tabla de datos de Empleados</header>
            <label for="orden">Orden:</label><br>
            <input type="text" readonly id="orden">
            <button id="cargarDatos">Cargar Datos</button>
            <button id="vaciar">Vaciar Datos</button>
            <button id="alta">Alta Registro</button>
        </div>
        <table id="tabla">
            <thead>
                <tr>
                    <th campo-dato="codigo" id="codigo">Codigo</th>
                    <th campo-dato="apellido" id="apellido">Apellido</th>
                    <th campo-dato="edad" id="edad">Edad</th>
                    <th campo-dato="alta" id="alta">Fecha de Alta</th>
                    <th campo-dato="puesto" id="puesto">Puesto</th>
                    <th campo-dato="area" id="area">Area</th>
                    <th campo-dato="area" id="pdf">PDF</th>
                    <th campo-dato="area" id="modificacion">Modificacion</th>
                    <th campo-dato="area" id="eliminar">Eliminar</th>
                </tr>
                <tr>
                    <th campo-dato="codigo">
                        <input type="text" id="inputCodigo">
                    </th>
                    <th campo-dato="apellido">
                        <input type="text" id="inputApellido">
                    </th>
                    <th campo-dato="edad">
                        <input type="text" id="inputEdad">
                    </th>
                    <th campo-dato="alta">
                        <input type="text" id="inputAlta">
                    </th>
                    <th campo-dato="puesto">
                        <input type="text" id="inputPuesto">
                    </th>
                    <th campo-dato="area">
                        <input type="text" id="inputArea">
                    </th>
                    <th campo-dato="area" id="pdf"></th>
                    <th campo-dato="area" id="modificacion"></th>
                    <th campo-dato="area" id="eliminar"></th>
                </tr>
            </thead>
            <tbody id="cuerpoTabla"></tbody>
        </table>
        <footer class="pieTabla">
            <div id="registros"></div>
            Pie de Pagina
            <a style="text-align: center; color:white; border: black; border-style: solid; border-width: medium; background-color: blue; text-decoration: none;" href="../index.html">Volver Atras</a>
            <a style="text-align: center; color:white; border: black; border-style: solid; border-width: medium; background-color: blue; text-decoration: none;" href="/index.php">Volver al Inicio</a>
        </footer>
    </div>

    <!-- Diseño Contenedor Modal Alta Registros -->

    <div id="modalAlta">
        <div class="cabeceraFormularioAlta">
            <header>Formulario de alta de Empleados</header>
            <button id="cerrarAlta">X</button>
        </div>
        <div class="formularioAlta">
            <div class="formInternos">
                <label for="codigoalta">Codigo:</label><br>
                <input type="text" name="codigoalta" id="codigoAlta" required>
            </div>
            <div class="formInternos">
                <label for="apellidoalta">Apellido:</label><br>
                <input type="text" name="apellidoalta" id="apellidoAlta" required>
            </div>
            <div class="formInternos">
                <label for="edadalta">Edad:</label><br>
                <input type="number" min="18" name="edadalta" id="edadAlta" required>
            </div>
            <div class="formInternos">
                <label for="altaalta">Fecha de Alta:</label><br>
                <input type="date" name="altaalta" id="altaAlta" required>
            </div>
            <div class="formInternos">
                <label for="puestoalta">Puesto:</label><br>
                <input type="text" name="puestoalta" id="puestoAlta" required>
            </div>
            <div class="formInternos">
                <label for="areaalta">Area:</label><br>
                <input type="text" name="arealta" id="areaAlta" required>
            </div>
            <div class="formInternos">
                <label for="pdf">PDF:</label><br>
                <input type="file" name="pdf" id="pdfAlta" required>
            </div>
            <div class="formInternos">
                <input type="submit" name="" id="enviarAlta" value="Enviar">
            </div>
        </div>
        <footer class="pieFormularioAlta">Pie del formulario</footer>
    </div>

    <!-- Diseño Contenedor Modal Mofificacion Registros -->

    <div id="modalModificacion">
        <div class="cabeceraFormularioModificacion">
            <header>Formulario de Modificacion de Empleados</header>
            <button id="cerrarModif">X</button>
        </div>
        <div class="formularioModificacion">
            <form id="formModificacion" method="post" enctype="multipart/form-data">
                <div class="formInternos">
                    <label for="codigomodi">Codigo:</label><br>
                    <input type="text" name="codigomodi" id="codigoModi" required>
                </div>
                <div class="formInternos">
                    <label for="apellidomodi">Apellido:</label><br>
                    <input type="text" name="apellidomodi" id="apellidoModi" required>
                </div>
                <div class="formInternos">
                    <label for="edadmodi">Edad:</label><br>
                    <input type="number" min="18" name="edadmodi" id="edadModi" required>
                </div>
                <div class="formInternos">
                    <label for="altamodi">Fecha de Alta:</label><br>
                    <input type="date" name="altamodi" id="altaModi" required>
                </div>
                <div class="formInternos">
                    <label for="puestoalta">Puesto:</label><br>
                    <input type="text" name="puestomodi" id="puestoModi" required>
                </div>
                <div class="formInternos">
                    <label for="areamodi">Area:</label><br>
                    <input type="text" name="areamodi" id="areaModi" required>
                </div>
                <div class="formInternos">
                    <label for="pdf">PDF:</label><br>
                    <input type="file" name="pdf" id="pdfModi" required>
                </div>
                <div class="formInternos">
                    <input type="submit" name="" id="enviarModificacion" value="Enviar">
                </div>
            </form>
        </div>
        <footer class="pieFormularioModificacion">Pie del formulario</footer>
    </div>

    <!-- Diseño Contenedor Modal Respuestas -->

    <div id="modalRespuesta">
        <div class="cabeceraRespuesta">
            <header>Respuesta del Servidor</header>
            <button id="cerrarRespuesta">X</button>
        </div>
        <div id="bodyRespuesta"></div>
        <footer class="pieRespuesta">Pie del formulario</footer>
    </div>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="./ejer26BDAbm.js" type="text/javascript"></script>
</body>
</html>
