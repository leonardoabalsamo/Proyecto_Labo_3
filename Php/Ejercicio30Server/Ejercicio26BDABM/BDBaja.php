<?php


define("SERVER","b1wxrcvtq9n5vzkulrp3-mysql.services.clever-cloud.com");
define("USUARIO","uumcnhlukgml0fs3");
define("PASS","R87rmtX6idkwQIDZeisO");
define("BASE","b1wxrcvtq9n5vzkulrp3");
$mysqli = new mysqli(SERVER,USUARIO,PASS,BASE); // Bbjeto que define la conexión con la BD

$mysqli = new mysqli(SERVER,USUARIO,PASS,BASE); // Bbjeto que define la conexión con la BD

$codBaja = $_POST['codigo'];

$sql = "delete from persona where codigo ='$codBaja'";

$resultado ="";


if( ! ($resultado=$mysqli->query($sql)) ){
        die();
    };

      mysqli_close($mysqli);
?>
