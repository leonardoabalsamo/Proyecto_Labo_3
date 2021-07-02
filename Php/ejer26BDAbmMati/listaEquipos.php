<?php
define("SERVER","localhost");
define("USUARIO","root");
define("PASS","");
define("BASE","empleados");

    $mysqli = new mysqli(SERVER,USUARIO,PASS,BASE);
    $sql = "select area from persona";

    if( ! ($resultado=$mysqli->query($sql)) ){
        die();
    };

    $areas=[];

    while($fila = $resultado->fetch_assoc()){
        $objArea = new stdClass();
        $objArea->area=$fila['area'];
        array_push($areas,$objArea);
    }

    $objAreas = new stdClass();
    $objAreas->area = $areas;

    $salidaJson = json_encode($objAreas);

    $mysqli->close();

    echo $salidaJson;
?>
