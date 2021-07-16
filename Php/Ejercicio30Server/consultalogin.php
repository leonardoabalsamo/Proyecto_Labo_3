<?php

define("SERVER","bl6yeqpr4m8fftwgsnti-mysql.services.clever-cloud.com");
define("USUARIO","ugxsgko02xlc52mk");
define("PASS","CDN6FhDlPoQBcboSkhfz");
define("BASE","bl6yeqpr4m8fftwgsnti");
$mysqli = new mysqli(SERVER,USUARIO,PASS,BASE); // Bbjeto que define la conexión con la BD


    // el usuario es el orden
      $usuario =$_POST['usuario'];
      $clave =$_POST['clave'];
      $clavemd5=md5($clave);


      $sql = "select * from login where usuario LIKE ? and clave LIKE ? ";

      $respuesta = "";
      $resultado ="";

          if ( ! ($sentencia = $mysqli->prepare($sql)) ) {
              $respuesta = $respuesta . "<br/> Fallo la preparacion del Template: ('. $mysqli->errno .') " . $mysqli->error;
          }else{

              if ( ! $sentencia->bind_param('ss', $usuario, $clavemd5) ) {
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
