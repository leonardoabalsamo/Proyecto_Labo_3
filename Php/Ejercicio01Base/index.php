<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./base1.css">
  </head>
  <body>
    <header>
      <h1 style="margin:0%; padding:0%;">Ejercicio 1 Base</h1>
    </header>
    <div class="cont">

      <h4>Todo lo escrito fuera de las marcas de php es entregado en la respuesta http sin pasar por el procesador php</h4><br><hr><br>

      <h4>Todo texto y/o html <span style='color:blue;'>entregado por el procesador php</span> usando la sentencia echo</h4><br><hr><br>
      <?php $mivariable="valor1"; ?>
      <h4>Sin usar concatenador <span style='color:blue;'>$mivariable : <?php echo $mivariable; ?></span></h4>
      <h4>Usando concatenador <span style='color:blue;'><?php echo "\$mivariable: " . $mivariable;  ?></span></h4><br><hr><br>
      <?php $mivariable=true; ?>
      <h4>Variable tipo booleanas o lógicas (verdadero) <span style='color:blue;'><?php echo "\$mivariable: " . $mivariable; ?></span></h4>
      <?php $mivariable=false; ?>
      <h4>Variable tipo booleanas o lógicas (falso) <span style='color:blue;'><?php "\$mivariable: " .  $mivariable; ?></span>:</h4><br><hr><br>
      <?php define("MICONSTANTE" , "valorConstante"); ?>
      <h4><span style='color:blue;'><?php echo "MICONSTANTE: " . MICONSTANTE; ?></span>: valorConstante</h4>
      <h4>Tipo de <span style='color:blue;'><?php echo "MICONSTANTE: " . gettype(MICONSTANTE); ?></span></h4><br><hr><br>

      <h4>Arreglos:</h4>

      <?php $aPalabra = ["hola" , "hello"]; ?>

      <h4><span style='color:blue;'><?php  echo "\$aPalabra[0]: " . $aPalabra[0];?></span></h4>
      <h4><span style='color:blue;'><?php  echo "\$aPalabra[1]: " . $aPalabra[1];?></span></h4>
      <h4>Tipo de <span style='color:blue;'><?php echo "\$aPalabra: "  . gettype($aPalabra); ?></span></h4>
      <h4>Se agregan por programa dos elementos nuevos</h4>
      <?php array_push($aPalabra,'chao'); array_push($aPalabra,'bonjour');?>
      <h3>Todos los elementos Originales y agregados</h3>
      <ul>
        <li><?php echo $aPalabra[0]; ?></li>
        <li><?php echo $aPalabra[1]; ?></li>
        <li><?php echo $aPalabra[2]; ?></li>
        <li><?php echo $aPalabra[3]; ?></li>
      </ul>
      <br><hr><br>

      <h3>Arreglo de dos dimensiones (diccionario)</h3>
      <?php $aDiccionarioBasico = [];
      array_push($aDiccionarioBasico,$aPalabra);
      $aadios = ['adios' , 'goodbye' , 'arrivedenci' , 'au revoir'];
      $acasa = ['casa' , 'home' , 'casa' , 'maison'];
      array_push($aDiccionarioBasico, $aadios);
      array_push($aDiccionarioBasico, $acasa); ?>
      <h4>La variable $aDiccionarioBasico tiene el siguiente tipo: <?php echo gettype($aDiccionarioBasico); ?></h4>

      <table style="border-collapse:collapse;">
        <tr>
          <td>Español</td>
          <td>Ingles</td>
          <td>Italiano</td>
          <td>Frances</td>
        </tr>
        <tr>
          <td style="border-width:1px;border:solid;background-color:lightblue;"><?php echo $aDiccionarioBasico[0][0] ?></td>
          <td style="border-width:1px;border:solid;background-color:lightblue;"><?php echo $aDiccionarioBasico[0][1] ?></td>
          <td style="border-width:1px;border:solid;background-color:lightblue;"><?php echo $aDiccionarioBasico[0][2] ?></td>
          <td style="border-width:1px;border:solid;background-color:lightblue;"><?php echo $aDiccionarioBasico[0][3] ?></td>
        </tr>
        <tr>
          <td style="border-width:1px;border:solid;background-color:lightblue;"><?php echo $aDiccionarioBasico[1][0] ?></td>
          <td style="border-width:1px;border:solid;background-color:lightblue;"><?php echo $aDiccionarioBasico[1][1] ?></td>
          <td style="border-width:1px;border:solid;background-color:lightblue;"><?php echo $aDiccionarioBasico[1][2] ?></td>
          <td style="border-width:1px;border:solid;background-color:lightblue;"><?php echo $aDiccionarioBasico[1][3] ?></td>
        </tr>
        <tr>
          <td style="border-width:1px;border:solid;background-color:lightblue;"><?php echo $aDiccionarioBasico[2][0] ?></td>
          <td style="border-width:1px;border:solid;background-color:lightblue;"><?php echo $aDiccionarioBasico[2][1] ?></td>
          <td style="border-width:1px;border:solid;background-color:lightblue;"><?php echo $aDiccionarioBasico[2][2] ?></td>
          <td style="border-width:1px;border:solid;background-color:lightblue;"><?php echo $aDiccionarioBasico[2][3] ?></td>
        </tr>
      </table>

      <h3>Tambien asi se puede expresar el valor de <?php echo "\$aDiccionarioBasico[1][3]: " . $aDiccionarioBasico[1][3]; ?></h3>
      <h3>Cantidad de elementos de diccionario: <?php echo count($aDiccionarioBasico); ?></h3><br><hr><br>

      <h2>Variable tipo arreglo asociativo</h2>

      <?php $articulo = ["codigoart" => "cp001" , "descripcion" => "jaguel" , "precio" =>20 , "cantidad" => 2]; ?>
      <p>Codigo de artículo: <?php echo $articulo['codigoart']; ?> <br>
      Descripción del articulo: <?php echo $articulo['descripcion']; ?>  <br>
      Precio unitario: <?php echo $articulo['precio']; ?>  <br>
      Cantidad: <?php echo $articulo['cantidad']; ?> </p>

      <p>Cantidad de elementos: <?php echo count($articulo); ?>  <br>
      Tipo de dato: <?php echo gettype($articulo); ?>  </p><br><hr><br>


      <h4>Expresiones aritméticas</h4>
      <?php       $x=3;      $y=4;
      $z = ($x + $y) ;
      $m = $x * $y ;
      $d = $x / $y ;
      ?>
      <h4>La variable $x tiene el siguiente valor: <?php echo $x; ?></h4>
      <h4>La variable $y tiene el siguiente valor: <?php echo $y; ?></h4>
      <h4>La variable $x tiene el siguiente tipo: <?php echo gettype($x); ?></h4>
      <h4>La variable $y tiene el siguiente tipo: <?php echo gettype($y); ?></h4>
      <h4>Así se imprime una expresión aritmética por ejemplo de Suma: ($x + $y) = <?php echo $z; ?></h4>
      <h4>Así se imprime una expresión aritmética por ejemplo de Multiplicación: $x * $y = <?php echo $m; ?></h4>
      <h4>Así se imprime una expresión aritmética por ejemplo de División: $x / $y = <?php echo $d; ?></h4>



    </div>
    <footer><br><a href="../index.html">Volver al Indice</a></footer>
  </body>
</html>
