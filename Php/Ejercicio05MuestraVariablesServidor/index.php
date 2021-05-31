<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./base1.css">
  </head>
  <body>
    <header>
      <h1 style="margin:0%; padding:0%;">Ejercicio 5 Muestra Variables Servidor</h1>
    </header>
    <div class="cont">
      <br><br>

      <h1>Variables del Servidor</h1>

      <table style="border-width: 1px;border:solid;border-collapse:collapse; background-color:lightblue;">
        <tr>
          <td style="border:solid; text-align:center;border-color:grey;">SERVER_ADDR</td>
          <td style="border:solid; text-align:center;border-color:grey;"><?php echo $_SERVER['SERVER_ADDR'];?></td>
        </tr>
        <tr>
          <td style="border:solid; text-align:center;border-color:grey;">SERVER_PORT</td>
          <td style="border:solid; text-align:center;border-color:grey;"><?php echo $_SERVER['SERVER_PORT'];?></td>
        </tr>
        <tr>
          <td style="border:solid; text-align:center;border-color:grey;">SERVER_NAME</td>
          <td style="border:solid; text-align:center;border-color:grey;"><?php echo $_SERVER['SERVER_NAME'];?></td>
        </tr>
        <tr>
          <td style="border:solid; text-align:center;border-color:grey;">DOCUMENT_ROOT</td>
          <td style="border:solid; text-align:center;border-color:grey;"><?php echo $_SERVER['DOCUMENT_ROOT'];?></td>
        </tr>

      </table>
      <br><br>

      <h1>Variables de Cliente</h1>

      <table style="border-width: 1px;border:solid;border-collapse:collapse; background-color:lightblue;">
        <tr>
          <td style="border:solid; text-align:center;border-color:grey;">REMOTE_ADDR</td>
          <td style="border:solid; text-align:center;border-color:grey;"><?php echo $_SERVER['REMOTE_ADDR'];?></td>
        </tr>
        <tr>
          <td style="border:solid; text-align:center;border-color:grey;">REMOTE_PORT</td>
          <td style="border:solid; text-align:center;border-color:grey;"><?php echo $_SERVER['REMOTE_PORT'];?></td>
        </tr>
      </table>

      <br><br>
      <h1>Variables de Requerimiento</h1>
      <table style="border-width: 1px;border:solid;border-collapse:collapse; background-color:lightblue;">
        <tr>
          <td style="border:solid; text-align:center;border-color:grey;">SCRIPT_NAME</td>
          <td style="border:solid; text-align:center;border-color:grey;"><?php echo $_SERVER['SCRIPT_NAME'];?></td>
        </tr>
        <tr>
          <td style="border:solid; text-align:center;border-color:grey;">REQUEST_METHOD</td>
          <td style="border:solid; text-align:center;border-color:grey;"><?php echo $_SERVER['REQUEST_METHOD'];?></td>
        </tr>
      </table>
      <h1>Todos los valores</h1>
      <br>
      <table style="border-width: 1px;border:solid;border-collapse:collapse; background-color:lightblue;">
        <?php foreach($_SERVER as $key_name => $key_value){
          echo "<tr>";
          echo "<td style='border:solid; text-align:center;border-color:grey;'>";
          echo $key_name;
          echo "</td>";
          echo "<td style='border:solid;border-color:grey;'>";
          echo $key_value;
          echo "</td>";
          echo "<tr>";
        } ?>
      </table>

    </div>
    <footer><br><a href="../index.html">Volver al Indice</a></footer>
  </body>
</html>
