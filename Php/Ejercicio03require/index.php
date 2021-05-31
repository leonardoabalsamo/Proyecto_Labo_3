<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./base1.css">
  </head>
  <body>
    <header>
      <h1 style="margin:0%; padding:0%;">Ejercicio 3 Require</h1>
    </header>
    <div class="cont">

      <h1>En este ejemplo se utiliza la funcion require() que ubica codigo php definido en el archivo ejemplo2.inc</h1>
      <h1>Antes de insertar el require las variables declaradas en el mismo no existen</h1>
      <h1>Las variables son:</h1>

      <?php echo $nombre[0] . $nombre[1] . $nombre[2] . $signo[0] . $signo[1] . $signo[2];?>

      <h1>La longitud de los arreglos es: 0</h1>

      <?php require("./archivo.inc"); ?>
      <h1>Aquí ya se ejecutó la función require(). Cuando se usa require ocurre que si el archivo 'Inc' no existe, se visualiza un  exception fatal error y la ejecución termina</h1>

      <h1>Las dos variables tipo array asociativo en el inc son:</h1>

      <table style="border:solid;border-collapse:collapse;">
        <tr>
          <td style="border:solid;"><?php echo $persona[0][0] ?></td>
          <td style="border:solid;"><?php echo $persona[0][1] ?></td>
          <td style="border:solid;"><?php echo $persona[0][2] ?></td>
        </tr>
        <tr>
          <td style="border:solid;"><?php echo $persona[1][0] ?></td>
          <td style="border:solid;"><?php echo $persona[1][1] ?></td>
          <td style="border:solid;"><?php echo $persona[1][2] ?></td>
        </tr>
      </table>

      <h1>La longitud de los arreglos es: <?php echo count($persona); ?></h1>
    </div>
    <footer><br><a href="../index.html">Volver al Indice</a></footer>
  </body>
</html>
