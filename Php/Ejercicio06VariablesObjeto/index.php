<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./base1.css">
  </head>
  <body>
    <header>
      <h1 style="margin:0%; padding:0%;">Ejercicio 6 Variables Tipo Objeto</h1>
    </header>
    <div class="cont">
      <br><br>

      <h1>Variables Tipo Objeto en PHP. Objeto Renglon de pedido</h1>
      <h1><span style="color:blue;"><?php
      $objRenglonPedido = new stdclass;
      $objRenglonPedido->codArt = "cp001";
      $objRenglonPedido->descripcion="Jaguel 800 gr";
      $objRenglonPedido->precioUnitario=2000;
      $objRenglonPedido->cantidad=2;

      echo "\$objRenglonPedido"; ?></span></h1>

      <p>Código de artículo: <?php echo $objRenglonPedido->codArt; ?> <br>
        Descripción del artículo: <?php echo $objRenglonPedido->descripcion; ?> <br>
        Precio unitario: <?php echo $objRenglonPedido->precioUnitario; ?> <br>
        Cantidad: <?php echo $objRenglonPedido->cantidad; ?> <br></p>

      <h1>Tipo de <?php echo "\$objRenglonPedido: " . gettype($objRenglonPedido);  ?></h1>

      <h1>Definamos arreglo de pedidos:</h1>

      <h2><span style="color:blue;"><?php $renglonesPedido = [];
      echo "\$renglonesPedido";
      array_push($renglonesPedido, $objRenglonPedido);
      array_push($renglonesPedido, $objRenglonPedido);

      ?></span></h2>

      <h1>Tabula <?php echo "\$renglonesPedido" ?>. Recorrer el arreglo de renglones y tabularlos con HTML:</h1>
      <?php
      foreach ( $renglonesPedido as $objRenglonPedido ) {
        echo $objRenglonPedido->codArt; echo "  ";
        echo $objRenglonPedido->descripcion; echo "  ";
        echo $objRenglonPedido->precioUnitario; echo "  ";
        echo $objRenglonPedido->cantidad; echo '<br>';
      } ?>

      <h2>Cantidad de renglones: <?php echo count($renglonesPedido); ?></h2>

      <?php
      $objRenglonesPedido = new stdClass();
      $objRenglonesPedido->renglonesPedido=$renglonesPedido;
      $objRenglonesPedido->cantidadDeRenglones=count($renglonesPedido);
       ?>
      <h1>Producción de un objeto <span style="color:blue";><?php echo "\$objRenglonesPedido" ?></span> con dos atributos array renglonesPedido y cantidadDeRenglones</h1>

      <p>Cantidad de renglones: <?php echo ($objRenglonesPedido->cantidadDeRenglones) ; ?></p>

      <h1>Producción de un JSON jsonRenglones:</h1>

      <p><?php
      $jsonRenglonesPedido= json_encode($objRenglonesPedido);
      echo $jsonRenglonesPedido;
      ?></p> 


    </div>
    <footer><br><a href="../index.html">Volver al Indice</a></footer>
  </body>
</html>
