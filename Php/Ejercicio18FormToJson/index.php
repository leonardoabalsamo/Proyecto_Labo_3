<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Formulario en Ventana Modal</title>
    <link rel="stylesheet" href="./estiloesp15.css">
  </head>

  <body>

  <div id="contenedor">
    <h1>Ventana Modal</h1>
      <button style="margin-left:100px;" id="btnmdl">Abre DIV modal</button>

  </div>

  <div id="modal">

    <header><h1>Form to Json</h1></header>

    <div class="contform"><br>
        <div class="interno">
          <label for="usuario">ID Usuario:</label><br>
          <input type="text" name="usuario" id="usuario" required ><br>
        </div>
        <div class="interno">
          <label for="login">Login:</label><br>
          <input type="text" name="login" id="login" required><br>
        </div>
        <div class="interno">
          <label for="apellido">Apellido:</label><br>
          <input type="text" name="apellido" id="apellido" required><br>
        </div>
        <div class="interno">
          <label for="nombre">Nombres:</label><br>
          <input type="text" name="nombre" id="nombre" required><br>
        </div>
        <div class="interno">
          <label for="edad">Edad:</label><br>
          <input type="number" name="edad" id="edad" required><br>
        </div>
        <div class="interno">
          <input type="submit" id="enviar" value="Enviar">
        </div>
        <div id="Resultado"></div>
    </div>
    <footer><h2>Pie del formulario</h2></footer>

  </div>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="./esp15.js" type="text/javascript"></script>

  </body>
</html>
