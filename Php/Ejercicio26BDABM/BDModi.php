<?php


define("SERVER","b1wxrcvtq9n5vzkulrp3-mysql.services.clever-cloud.com");
define("USUARIO","uumcnhlukgml0fs3");
define("PASS","R87rmtX6idkwQIDZeisO");
define("BASE","b1wxrcvtq9n5vzkulrp3");
$mysqli = new mysqli(SERVER,USUARIO,PASS,BASE); // Bbjeto que define la conexión con la BD


      $codModi =$_POST['codModi'];
      $apeModi =$_POST['apeModi'];
      $edadModi =$_POST['edadModi'];
      $altaModi =$_POST['altaModi'];
      $puestoModi =$_POST['puestoModi'];
      $areaModi =$_POST['areaModi'];

      $sentencia = "update into empleados (codAlta,apeAlta,edadAlta,altaAlta,puestoAlta,areaAlta) values (?,?,?,?,?,?)";
      $respuesta = "";

        if ( ! ($sentencia = $mysqli->prepare($sql)) ) {
            $respuesta = $respuesta . "<br/> Fallo la preparacion del Template: ('. $mysqli->errno .') " . $mysqli->error;
        }else{

            if ( ! $sentencia->bind_param('ssissss',$codModi,$apeModi,$edadModi,$altaModi,$puestoModi,$areaModi,$codModi) ) {
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

        $mysqli->close();


        ?>
