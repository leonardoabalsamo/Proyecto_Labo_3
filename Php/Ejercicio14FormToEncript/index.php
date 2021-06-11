
<?php



  if (isset($_POST['clave'])) {
    $claveEncriptadamd5 = md5($_POST['clave']);
    $claveEncriptadasha = sha1($_POST['clave']);
    echo "<!DOCTYPE html>";
    echo "<html lang='es' dir='ltr'>";
    echo "  <head>";
    echo "    <meta charset='utf-8'>";
    echo "    <title></title>";
    echo "    <link rel='stylesheet' href='./base1.css'>";
    echo "  </head>";
    echo "  <body>";
    echo "    <header>";
    echo "      <h1 style='margin:0%; padding:0%;'>Ejercicio 14 Formulario para Encriptación </h1>";
    echo "    </header>";
    echo "    <div class='cont'>";
    echo "      <br><br>";
    echo "      <h1>Encriptación MD5 y SHA</h1>";
    echo '      Variable Encriptada md5: ' .  $claveEncriptadamd5; echo "<br>";
    echo '      Variable Encriptada Sha: ' .  $claveEncriptadasha; echo "<br>";
    echo "    </div>";
    echo "    <footer><br><a href='../index.html'>Volver al Indice</a></footer>";
    echo "  </body>";
    echo "</html>";
  } else {
    echo "<!DOCTYPE html>";
    echo "<html lang='es' dir='ltr'>";
    echo "  <head>";
    echo "    <meta charset='utf-8'>";
    echo "    <title></title>";
    echo "    <link rel='stylesheet' href='./base1.css'>";
    echo "  </head>";
    echo "  <body>";
    echo "    <header>";
    echo "      <h1 style='margin:0%; padding:0%;'>Ejercicio 14 Formulario para Encriptación </h1>";
    echo "    </header>";
    echo "    <div class='cont'>";
    echo "      <br><br>";
    echo "      <h1>Encriptación MD5 y SHA</h1>";

    echo "      <form action='index.php' method='post'>";
    echo "        <label for='clave'>Ingrese la clave para Encriptación:</label><br>";
    echo "        <input type='text' id='clave' name='clave' required ><br><br>";
    echo "        <button type='submit' name='encriptar'>Obtener Encriptación</button>";
    echo "      </form>";


    echo "    </div>";
    echo "    <footer><br><a href='../index.html'>Volver al Indice</a></footer>";
    echo "  </body>";
    echo "</html>";
  }

?>
