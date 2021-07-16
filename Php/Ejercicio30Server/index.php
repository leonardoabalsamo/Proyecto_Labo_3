
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./estilo30Server.css">

  </head>
  <body>
    <?php
        session_start();
        if (isset($_SESSION['usuario'])) {
          header("Location: ./app_modulo1");
        }else {
          header("Location: ./FormLogin.html");
        }

    ?>
  </body>
</html>
