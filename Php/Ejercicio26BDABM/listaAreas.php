<?php
define("SERVER","b1wxrcvtq9n5vzkulrp3-mysql.services.clever-cloud.com");
define("USUARIO","uumcnhlukgml0fs3");
define("PASS","R87rmtX6idkwQIDZeisO");
define("BASE","b1wxrcvtq9n5vzkulrp3");
$mysqli = new mysqli(SERVER,USUARIO,PASS,BASE); // Bbjeto que define la conexión con la BD


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
    $objAreas->areas = $areas;

    $salidaJson = json_encode($objAreas);

    $mysqli->close();

    echo $salidaJson;
?>
