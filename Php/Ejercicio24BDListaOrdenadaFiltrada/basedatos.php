<?php
    sleep(2);
    define("SERVER","b1wxrcvtq9n5vzkulrp3-mysql.services.clever-cloud.com");
    define("USUARIO","uumcnhlukgml0fs3");
    define("PASS","R87rmtX6idkwQIDZeisO");
    define("BASE","b1wxrcvtq9n5vzkulrp3");
    $mysqli = new mysqli(SERVER,USUARIO,PASS,BASE); // Bbjeto que define la conexión con la BD

    //objeto orden que trae el orden desde el ajax
    $orden =$_GET['orden'];
    //objetos que traen los ingresos desde el ajax
    $inputCodigo =$_GET['inputCodigo'];
    $inputApellido =$_GET['inputApellido'];
    $inputEdad =$_GET['inputEdad'];
    $inputAlta =$_GET['inputAlta'];
    $inputPuesto =$_GET['inputPuesto'];
    $inputArea =$_GET['inputArea'];

    //$resultado;
    //$respuesta;

    $sql="select * from persona where ";
    $sql=$sql . "codigo LIKE ? and ";
    $sql=$sql . "apellido LIKE ? and ";
    $sql=$sql . "edad LIKE ? and ";
    $sql=$sql . "alta LIKE ? and ";
    $sql=$sql . "puesto LIKE ? and ";
    $sql=$sql . "area LIKE ?";
    $sql=$sql . " order by " . $orden;

    $respuesta="";
    if ( !($sentencia = $mysqli->prepare($sql)) ) {
            $respuesta = $respuesta . "<br/>Falló la preparación del template: (" . $mysqli->errno . ") " . $mysqli->error;
            }else {
            $likeVarcodigo ="%" . $inputCodigo . "%";
            $likeVarapellido ="%" . $inputApellido . "%";
            $likeVaredad ="%" . $inputEdad . "%";
            $likeVaralta ="%" . $inputAlta . "%";
            $likeVarpuesto ="%" . $inputPuesto . "%";
            $likeVararea ="%" . $inputArea . "%";

            if ( !$sentencia->bind_param('ssssss',$likeVarcodigo,$likeVarapellido,$likeVaredad,$likeVaralta,$likeVarpuesto,$likeVararea) ) {
                    $respuesta = $respuesta . "<br/>Falló la vinculación de parámetros simples: (" . $sentencia->errno . ") " . $sentencia->error;
                    }
            else {
                    if ( !$sentencia->execute() ) {  $respuesta = $respuesta . "<br/>Falló la ejecución de parametros simples: (" . $sentencia->errno . ") " . $sentencia->error;
                        die();
                        }
                  else {   $respuesta = $respuesta . "<br/>Datos obtenidos!";  $resultado = $sentencia->get_result();    }
            }
            }


    $resultadoCuentaPersonas = $resultado->num_rows; // Almacenamos el nro de Filas en la variable $resultadoCuentaRegistros
    $personas=[]; // Creamos un array de personas para almacenar los datos de las filas correspondientes

    while($fila=$resultado->fetch_assoc()) { // El método fetch_assoc() aplicado al objeto resultado devuelve cada fila de la consulta en un formato de arreglo asociativo $fila[‘nombreAtributo’]
        $objPersona = new stdClass(); // Instancio un objeto que va a representar la fila en cuestión
        $objPersona->codigo=$fila['codigo'];  //['codigo'] la columna de base de datos   -    $objPersona->codigo para el js
        $objPersona->apellido=$fila['apellido'];
        $objPersona->edad=$fila['edad'];
        $objPersona->alta=$fila['alta'];
        $objPersona->puesto=$fila['puesto'];
        $objPersona->area=$fila['area']; // Lo que esta entre corchetes representa exactamente lo escrito en la columna de la BD
        array_push($personas,$objPersona); // Inserto la fila en el array de personas
        }

  $objPersonas = new stdClass(); // Instancio un objeto que contendrá el array de personas + cantidad de registros
  $objPersonas->personas=$personas;
  $objPersonas->cuenta=$resultadoCuentaPersonas;
  $salidaJson = json_encode($objPersonas); // Genera un Json que incluye los registros + la cantidad de registros.
  $mysqli->close();
  echo $salidaJson;
?>
