<?php
define("SERVER","localhost");
define("USUARIO","root");
define("PASS","");
define("BASE","empleados");
$mysqli = new mysqli(SERVER,USUARIO,PASS,BASE); // Bbjeto que define la conexión con la BD


    $sql = "select area from area";

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
    $objAreas->areas = $areas;

    $salidaJson = json_encode($objAreas);

    $mysqli->close();

    echo $salidaJson;
?>
