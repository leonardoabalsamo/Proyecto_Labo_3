<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./base1.css">
  </head>
  <body>

    <header>
      <h1 style="margin:0%; padding:0%;">Ejercicio AJAX</h1>
    </header>
    <div class="cont">
            <div id="internogris">
              <h2 style="text-align:center;">Dato de entrada:</h2><br><br>
              <input type='text' id='clave' name='clave' required >
            </div>
            <div id="internoazul">
              <h2>Encriptar</h2>
              <input type="image" src="./flecha.png" id="flecha">
            </div>
            <div id="Resultado">
              <h2>Resultado</h2>
            </div>
            <div id="Estado">
              <h2>Estado del Requerimiento:</h2>
            </div>
            <div id="internoceleste">

            </div>

    </div>
    <footer><br><a href="../index.html">Volver al Indice</a></footer>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">

          $("#flecha" ).click(function() {
          $("#Resultado").empty(); //vacia el cuadro de resultado.
          $("#Resultado").addClass("estiloRecibiendo"); //le cambia provisorio de estilo del contenedor
          $("#Resultado").html("<h2>Esperando respuesta...</h2>");//Escribe mensaje provisorio
          $("#Estado").empty(); //Vacía el div que indica el estado el requerimiento
          $("#Estado").append("<h2>Estado del requerimiento: </h2>");//adiciona html al div de estado

          $.ajax({
          type:"post",
          url: "./respuesta.php",
          data: { clave: $("#clave").val()},
          success: function(respuestaDelServer,estado) {
          $("#Resultado").removeClass("estiloRecibiendo");
          $("#Resultado").html("<h1>Resultado: </h1><h4>"+respuestaDelServer+"</h4>");
          $("#Estado").append("<h2>"+estado+"</h2>");
          }
          }); //cierra ajax
          }); //cierra click
    </script>
  </body>
</html>
