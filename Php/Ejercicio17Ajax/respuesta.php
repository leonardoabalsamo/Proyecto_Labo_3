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
    sleep(3);
    $claveEncriptadamd5 = md5($_POST['clave']);
    $claveEncriptadasha = sha1($_POST['clave']);

          echo "      <h3>Encriptación MD5 y SHA</h3>";
          echo '      Variable Encriptada md5: ' .  $claveEncriptadamd5; echo "<br>";
          echo '      Variable Encriptada Sha: ' .  $claveEncriptadasha; echo "<br>";
      ?>

  </body>
</html>
