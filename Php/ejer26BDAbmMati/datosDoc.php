<?php
define("SERVER","localhost");
define("USUARIO","root");
define("PASS","");
define("BASE","empleados");

    $mysqli = new mysqli(SERVER,USUARIO,PASS,BASE);

    $codigo = $_GET["codigo"];

    $sql = "select pdf from persona where codigo = '$codigo'";

    if( ! ($resultado=$mysqli->query($sql)) ){
        die();
    };

    while($fila = $resultado->fetch_assoc()){
        $objPdf = new stdClass();
        $objPdf->documentoPdf=base64_encode($fila['pdf']);
    }

    $mysqli->close();

    $salidaJson = json_encode($objPdf,JSON_INVALID_UTF8_SUBSTITUTE);

    echo $salidaJson;
?>
