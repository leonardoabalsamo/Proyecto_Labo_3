<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <style media="screen">
      html,body{ height:100%; width:100%; margin:0%; padding:0%;}
    </style>
  </head>
  <body>
    <p>Valores Pasados:</p>
    <?php
      echo "Nombre:  " . $_POST['nombre']; echo "<br>";
      echo "Apellido: " . $_POST['apellido'];
      ?>

      <footer><br><a href="../index.html">Volver al Indice</a></footer>

  </body>
</html>
