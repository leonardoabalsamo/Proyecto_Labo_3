<?php
define("SERVER","localhost");
define("USUARIO","root");
define("PASS","");
define("BASE","empleados");

    $mysqli = new mysqli(SERVER,USUARIO,PASS,BASE);

    $codigo = $_GET["codigo"];

    $sql = "select * from persona where codigo = '$codigo'";

    if( ! ($resultado=$mysqli->query($sql)) ){
        die();
    };

    $persona=[];

    while($fila = $resultado->fetch_assoc()){
        $objPersona = new stdClass();
        $objPersona->codigo=$fila['codigo'];
        $objPersona->apellido=$fila['apellido'];
        $objPersona->edad=$fila['edad'];
        $objPersona->alta=$fila['alta'];
        $objPersona->puesto=$fila['puesto'];
        $objPersona->area=$fila['area'];
        array_push($persona,$objPersona);
    }

    $objPersonas = new stdClass();
    $objPersonas->persona = $persona;

    $salidaJson = json_encode($objPersonas);

    $mysqli->close();

    echo $salidaJson;
?>
