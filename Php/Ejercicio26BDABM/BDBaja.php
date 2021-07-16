<?php

define("SERVER","localhost");
define("USUARIO","root");
define("PASS","");
define("BASE","empleados");
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
