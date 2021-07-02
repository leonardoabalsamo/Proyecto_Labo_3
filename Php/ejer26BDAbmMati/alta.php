<?php

    define("SERVER","localhost");
    define("USUARIO","root");
    define("PASS","");
    define("BASE","empleados");

    $mysqli = new mysqli(SERVER,USUARIO,PASS,BASE);

    $codigo = $_GET['codigo'];
    $apellido = $_GET['apellido'];
    $edad = $_GET['edad'];
    $alta = $_GET['alta'];
    $puesto = $_GET['puesto'];
    $area = $_GET['area'];
    $pdf = $_GET['pdf'];

    $sql = "insert into persona (codigo,apellido,edad,alta,puesto,area,pdf) values (?,?,?,?,?,?,?)";

    $respuesta = "";

    if ( ! ($sentencia = $mysqli->prepare($sql)) ) {
        $respuesta = $respuesta . "<br/> Fallo la preparacion del Template: ('. $mysqli->errno .') " . $mysqli->error;
    }else{

        if ( ! $sentencia->bind_param('ssisssb',$codigo,$apellido,$edad,$alta,$puesto,$area,$pdf) ) {
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

    $mysqli->close();
?>
