<?php

     $us = $_POST['usuario'];
     $cl = $_POST['pass'];


      if (!validar($us, $cl)) {
        echo "LOS DATOS SON INCORRECTOS";
        header("Location: ./FormLogin.html");

      }else {
        session_start();

        $_SESSION['idSesion'] = session_id();

        $_SESSION['usuario'] = $_POST['usuario'];

        header("Location: ./app_modulo1");
      }

      function validar($usuario, $clave){

        define("SERVER","b1wxrcvtq9n5vzkulrp3-mysql.services.clever-cloud.com");
        define("USUARIO","uumcnhlukgml0fs3");
        define("PASS","R87rmtX6idkwQIDZeisO");
        define("BASE","b1wxrcvtq9n5vzkulrp3");

        $mysqli = new mysqli(SERVER,USUARIO,PASS,BASE); // Bbjeto que define la conexión con la BD

        $mysql = "select * from login where usuario = ? and clave = ?";

        $respuesta = "";
        $total = 1;
        if ($sentencia = $mysqli->prepare($mysql)) {
          if ($sentencia->bind_param("ss", $usuario, $clave)) {
            if ($sentencia->execute()) {
                $respuesta = $sentencia->get_result();
                $total = $respuesta->num_rows;

                  if ($total == 1) {
                        return true;
                        }else {
      					               return false;
      				                   }
                               }
                             }
                           }

      }
 ?>
