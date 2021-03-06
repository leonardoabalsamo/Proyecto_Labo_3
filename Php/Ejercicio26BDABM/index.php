<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ejercicio 26 ABM</title>
    <link rel="stylesheet" href="./estiloesp10.css">
  </head>
  <body>
    <div id="contenedorModal">

    <div id="contenedor">
      <h1>Empleados Empresa</h1>
      <input readonly type="text"id="orden">
      <button style="margin-left:100px;" id="cargar">Cargar Datos</button>
      <button id="vaciar">Vaciar Datos</button>
      <button id="btnalta">Alta Registro</button>
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
            <th campo-dato="btnpdf" >Pdf</th>
            <th campo-dato="btnmodi">Modi</th>
            <th campo-dato="btnborrar">Borrar</th>
          </tr>
          <tr>
            <th campo-dato="codigo"><input type="text" id="inputCodigo"></th>
            <th campo-dato="apellido"><input type="text" id="inputApellido"></th>
            <th campo-dato="edad"><input type="text" id="inputEdad"></th>
            <th campo-dato="alta"><input type="text" id="inputAlta"></th>
            <th campo-dato="puesto"><input type="text" id="inputPuesto"></th>
            <th campo-dato="area"><input type="text" id="inputArea"></th>
            <th campo-dato="btnpdf" ></th>
            <th campo-dato="btnmodi"></th>
            <th campo-dato="btnborrar"></th>
          </tr>
        </thead>
        <tbody id="bodytabla"></tbody>
      </table>
      <footer><div id="totalRegistros"></div><a style="position:absolute;margin-left: 300px; text-align:center;padding:0.5%;color:black;border:solid;border-width:1px;border-color:black;"href="../index.html">Volver al Indice</a></footer>
    </div>

      <div id="modalAlta">
              <header class="headermodal">
                <h2>Formulario para Alta - Empleados Empresa</h2><button id="botoncerrarAlta">X</button>
              </header>
              <div class="contform">

                <form id="formalta" method="post" enctype="multipart/form-data">

                        <div class="interno">
                          <label for="codigo">Codigo:</label><br>
                          <input type="text" name="codigo" id="codAlta" required="required" ><br>
                        </div>
                        <div class="interno">
                          <label for="apellido">Apellido:</label><br>
                          <input type="text" name="apellido" id="apeAlta" ><br>
                        </div>
                        <div class="interno">
                          <label for="edad">Edad:</label><br>
                          <input type="text" name="edad" id="edadAlta" ><br>
                        </div>
                        <div class="interno">
                          <label for="alta">Fecha de Alta:</label><br>
                          <input type="date" name="alta" id="altaAlta" ><br>
                        </div>
                        <div class="interno">
                          <label for="puesto">Puesto:</label><br>
                          <input type="text" name="puesto" id="puestoAlta" ><br>
                        </div>
                        <div class="interno">
                          <label for="area">Area:</label><br>
                          <select name="area" id="areaAlta" ></select>
                        </div>
                        <div class="interno">
                          <label for="archivo">PDF:</label><br>
                          <input type="file" id="btnArchivoAlta" name="documentoPdf"/>
                        </div>
                        <div class="interno">
                          <input type="submit" name="" id="EnviarAlta">
                        </div>
                  </form>
      </div></div>

      <div id="modalModi">
                        <header class="headermodal">
                          <h2>Formulario para Modi - Empleados Empresa</h2><button id="botoncerrarModi">X</button>
                        </header>

                        <div class="contform">
                          <form id="formModi" method="post" enctype="multipart/form-data">

                        <div class="interno">
                          <label for="codigo">Codigo:</label><br>
                          <input type="text" name="codigo" id="codModi" required="required" ><br>
                        </div>
                        <div class="interno">
                          <label for="apellido">Apellido:</label><br>
                          <input type="text" name="apellido" id="apeModi" ><br>
                        </div>
                        <div class="interno">
                          <label for="edad">Edad:</label><br>
                          <input type="text" name="edad" id="edadModi" ><br>
                        </div>
                        <div class="interno">
                          <label for="alta">Fecha de Alta:</label><br>
                          <input type="date" name="alta" id="altaModi" ><br>
                        </div>
                        <div class="interno">
                          <label for="puesto">Puesto:</label>
                          <input type="text" name="puesto" id="puestoModi" ><br>
                        </div>
                        <div class="interno">
                          <label for="area">Area:</label><br>
                          <select name="area" id="areaModi" ></select>
                        </div>
                        <div class="interno">
                          <label for="archivo">PDF:</label><br>
                          <input type="file" id="btnArchivoModi" name="documentoPdf"/>
                        </div>
                        <div class="interno">
                          <input type="submit" name="" id="EnviarModi" value="EnviarModi">
                        </div></form>
                    </div>
      </div>

      <div id="modalServer">
        <div id="contServer">

        </div>
      </div>

      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
      <script src="./esp10.js" type="text/javascript"></script>
  </body>
</html>
