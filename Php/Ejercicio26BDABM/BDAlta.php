<?php
      define("SERVER","localhost");
      define("USUARIO","root");
      define("PASS","");
      define("BASE","empleados");
      $mysqli = new mysqli(SERVER,USUARIO,PASS,BASE); // Bbjeto que define la conexión con la BD


      $codAlta =$_GET['codAlta'];
      $apeAlta =$_GET['apeALta'];
      $edadAlta =$_GET['edadAlta'];
      $altaAlta =$_GET['altaAlta'];
      $puestoAlta =$_GET['puestoAlta'];
      $areaAlta =$_GET['areaAlta'];

      $sentencia = "insert into empleados (codAlta,apeAlta,edadAlta,altaAlta,puestoAlta,areaAlta) values (?,?,?,?,?,?)";

      $respuesta = "";

          if ( ! ($sentencia = $mysqli->prepare($sql)) ) {
              $respuesta = $respuesta . "<br/> Fallo la preparacion del Template: ('. $mysqli->errno .') " . $mysqli->error;
          }else{

              if ( ! $sentencia->bind_param('ssisss', $codAlta, $apeAlta, $edadAlta, $altaAlta, $puestoAlta, $areaAlta) ) {
                  $respuesta = $respuesta . "<br/>Falló la vinculación de parámetros simples: (' . $sentencia->errno . ') " . $sentencia->error;
              }else{
                  if ( ! $sentencia->execute() ) {
                      $respuesta = $respuesta . "<br/>Falló la ejecución de parametros simples: (' . $sentencia->errno . ') " . $sentencia->error;
                      die();
                  }else{
                      $respuesta = $respuesta . "<br/>Datos obtenidos!";
                      $resultado = $sentencia->get_result();
                  }
              }
          }

      mysqli_close($mysqli);
?>
