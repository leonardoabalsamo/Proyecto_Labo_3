<?php
    define("SERVER","bax2kqxnnk1s3idf8ngv-mysql.services.clever-cloud.com");
    define("USUARIO","ufjr1niricfjywxs");
    define("PASS","fWotIYy5meVgqF9mPrta");
    define("BASE","bax2kqxnnk1s3idf8ngv");

    $mysqli = new mysqli(SERVER,USUARIO,PASS,BASE);

    $sql = "select area from empleados";

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
