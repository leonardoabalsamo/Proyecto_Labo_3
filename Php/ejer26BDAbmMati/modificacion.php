<?php

define("SERVER","localhost");
define("USUARIO","root");
define("PASS","");
define("BASE","empleados");

    //apertura de conexion con la base de datos para datos que no son blob
    $mysqli = new mysqli(SERVER,USUARIO,PASS,BASE);

    //creo variables con los datos
    $codigo = $_POST['codigo'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $alta = $_POST['alta'];
    $puesto = $_POST['puesto'];
    $area = $_POST['area'];

    $sql = "update persona set codigo=?,apellido=?,edad=?,alta=?,puesto=?,area=? where codigo=?";

    $respuesta = "";

    if ( ! ($sentencia = $mysqli->prepare($sql)) ) {
        $respuesta = $respuesta . "<br/> Fallo la preparacion del Template: ('. $mysqli->errno .') " . $mysqli->error;
    }else{

        if ( ! $sentencia->bind_param('sssssis',$codigo,$apellido,$edad,$alta,$puesto,$edad,$area) ) {
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

    //apertura de conexion con la base de datos para datos que SON blob
    $mysqli = new mysqli(SERVER,USUARIO,PASS,BASE);

    //creo variables con los datos
    if ( ! isset($_FILES['pdf'] )) {
        $respuesta = $respuesta . "<br/> No esta inicializada la variable:";
    }else{
        if ( empty($_FILES['pdf']['name']) ) {
            $respuesta = $respuesta . "<br/> No ha sido ningun archivo para enviar!";
        }else{
            $respuesta = $respuesta . "<br/> Trae PDF asociado a codJug:" . $codjug;
            $respuesta = $respuesta . "<br/> Nombre original del archivo subido:" . $_FILES['pdf']['name'];
            $contenidoPdf = file_get_contents($_FILES['pdf']['tmp_name']);
        }
    }

    $sql = "update persona set pdf=? where codigo=?";

    $respuesta = "";

    if ( ! ($sentencia = $mysqli->prepare($sql)) ) {
        $respuesta = $respuesta . "<br/> Fallo la preparacion del Template: ('. $mysqli->errno .') " . $mysqli->error;
    }else{

        if ( ! $sentencia->bind_param('bs',$contenidoPdf,$codjug) ) {
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
