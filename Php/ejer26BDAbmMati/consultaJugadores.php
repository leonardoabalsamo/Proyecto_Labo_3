<?php

    define("SERVER","localhost");
    define("USUARIO","root");
    define("PASS","");
    define("BASE","empleados");

    $mysqli = new mysqli(SERVER,USUARIO,PASS,BASE);

    $orden = $_GET["orden"];
    $filtro_codigo = $_GET['filtro_codigo'];
    $filtro_apellido = $_GET['filtro_apellido'];
    $filtro_edad = $_GET['filtro_edad'];
    $filtro_alta = $_GET['filtro_alta'];
    $filtro_puesto = $_GET['filtro_puesto'];
    $filtro_area = $_GET['filtro_area'];

    $sql = "select * from persona where ";
    $sql = $sql . "codigo LIKE ? and ";
    $sql = $sql . "apellido LIKE ? and ";
    $sql = $sql . "edad LIKE ? and ";
    $sql = $sql . "alta LIKE ? and ";
    $sql = $sql . "puesto LIKE ? and ";
    $sql = $sql . "area LIKE ?";
    $sql = $sql . " order by " . $orden;

    $respuesta = "";

    if ( ! ($sentencia = $mysqli->prepare($sql)) ) {
        $respuesta = $respuesta . "<br/> Fallo la preparacion del Template: ('. $mysqli->errno .') " . $mysqli->error;
    }else{
        $likefiltro_codigo = "%" . $filtro_codigo . "%";
        $likefiltro_apellido = "%" . $filtro_apellido . "%";
        $likefiltro_edad = "%" . $filtro_edad . "%";
        $likefiltro_alta = "%" . $filtro_alta . "%";
        $likefiltro_puesto = "%" . $filtro_puesto . "%";
        $likefiltro_area = "%" . $filtro_area . "%";

        if ( ! $sentencia->bind_param('ssisss',$likefiltro_codigo,$likefiltro_apellido,$likefiltro_edad,$likefiltro_alta,$likefiltro_puesto,$likefiltro_area) ) {
            $respuesta = $respuesta . "<br/>Falló la vinculación de parámetros simples: (' . $sentencia->errno . ') " . $sentencia->error;
        }else{
            if ( ! $sentencia->execute() ) {
                $respuesta = $respuesta . "<br/>Falló la ejecución de parametros simples: (' . $sentencia->errno . ') " . $sentencia->error;
                die();
            }else{
                $respuesta = $respuesta . "<br/>Datos obtenidos!";
                $resultado = $sentencia->get_result();
            }
        }
    }

    $cantidadRegistrosResultado = $resultado->num_rows;

    $personas=[];

    while($fila = $resultado->fetch_assoc()){
        $objPersona = new stdClass();
        $objPersona->codigo=$fila['codigo'];
        $objPersona->apellido=$fila['apellido'];
        $objPersona->edad=$fila['edad'];
        $objPersona->alta=$fila['alta'];
        $objPersona->puesto=$fila['puesto'];
        $objPersona->area=$fila['area'];
        array_push($personas,$objPersona);
    }

    $objPersonas = new stdClass();
    $objPersonas->personas = $personas;
    $objPersonas->cuentaRegistros = $cantidadRegistrosResultado;

    $salidaJson = json_encode($objPersonas);

    $mysqli->close();

    echo $salidaJson;
?>
