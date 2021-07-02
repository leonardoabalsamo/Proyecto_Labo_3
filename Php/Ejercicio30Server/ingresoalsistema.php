<?php


      if(isset($_POST['submit'])){
           $user = $_POST['usuario'];
           $password = $_POST['pass'];

           if (($user == "admin") AND ($password == "admin")) {
              session_start();
              $_SESSION['usuario'] = session_id();
              echo "HA INGRESADO CORRECTAMENTE, EN BREVE LO REDIGIREMOS";
              sleep(3);
              header("location: ./Ejercicio26BDABM");
           } else {
              echo "HA INGRESADO LOS DATOS INCORRECTAMENTE, SERÁ REDIRIGIDO";
              sleep(3);
              header("location: FormLogin.html");
           }
      }


 ?>
