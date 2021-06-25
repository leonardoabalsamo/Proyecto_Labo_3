<?php
      define("SERVER","localhost");
      define("USUARIO","root");
      define("PASS","");
      define("BASE","empleados");
      $mysqli = new mysqli(SERVER,USUARIO,PASS,BASE); // Bbjeto que define la conexión con la BD


      $sql = "delete from empleados where codigo='$codBaja';";

      $resultado = $mysqli->query($sql);

      mysqli_close($mysqli);
?>
