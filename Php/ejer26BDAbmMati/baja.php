<?php
define("SERVER","localhost");
define("USUARIO","root");
define("PASS","");
define("BASE","empleados");

    $mysqli = new mysqli(SERVER,USUARIO,PASS,BASE);

    $codigo = $_GET["codigo"];

    $sql = "delete from persona where codigo = '$codigo'";

    if( ! ($resultado=$mysqli->query($sql)) ){
        die();
    };

    $mysqli->close();
?>
