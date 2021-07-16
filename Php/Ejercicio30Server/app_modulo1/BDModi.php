
<?php
define("SERVER","b1wxrcvtq9n5vzkulrp3-mysql.services.clever-cloud.com");
define("USUARIO","uumcnhlukgml0fs3");
define("PASS","R87rmtX6idkwQIDZeisO");
define("BASE","b1wxrcvtq9n5vzkulrp3");
$mysqli = new mysqli(SERVER,USUARIO,PASS,BASE); // Bbjeto que define la conexión con la BD


      $codModi =$_POST['codigo'];
      $apeModi =$_POST['apellido'];
      $edadModi=$_POST['edad'];
      $altaModi =$_POST['alta'];
      $puestoModi =$_POST['puesto'];
      $areaModi =$_POST['area'];

      if ( ! isset($_FILES['pdf'] )) {
           $respuesta = $respuesta . "<br/> No esta inicializada la variable:";
       }else{
           if ( empty($_FILES['pdf']['name']) ) {
               $respuesta = $respuesta . "<br/> No ha sido ningun archivo para enviar!";
           }else{
               $respuesta = $respuesta . "<br/> Trae PDF asociado a codJug:" . $codModi;
               $respuesta = $respuesta . "<br/> Nombre original del archivo subido:" . $_FILES['pdf']['name'];
               $contenidoPdf = file_get_contents($_FILES['pdf']['tmp_name']);
           }
       }
      $sql = "update persona set codigo=?,apellido=?,edad=?,alta=?,puesto=?,area=?,pdf=? where codigo=?";


      $respuesta = "";
      $resultado ="";

          if ( ! ($sentencia = $mysqli->prepare($sql)) ) {
              $respuesta = $respuesta . "<br/> Fallo la preparacion del Template: ('. $mysqli->errno .') " . $mysqli->error;
          }else{

              if ( ! $sentencia->bind_param('ssisssss', $codModi, $apeModi, $edadModi, $altaModi, $puestoModi, $areaModi,$contenidoPdf,$codModi) ) {
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
