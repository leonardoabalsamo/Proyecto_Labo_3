<?php


    sleep(1);
    /*Vinculación con la BD del servidor // Conexión */
    define("SERVER","b1wxrcvtq9n5vzkulrp3-mysql.services.clever-cloud.com");
    define("USUARIO","uumcnhlukgml0fs3");
    define("PASS","uumcnhlukgml0fs3");
    define("BASE","b1wxrcvtq9n5vzkulrp3");

    $mysqli = new mysqli(SERVER,USUARIO,PASS,BASE); // Bbjeto que define la conexión con la BD


    /**************************************************************************************************************************************************************************************/

    $sql="select * from persona "; // Seleccionamos la BD según el orden enviado en el objeto $orden

    if (!( $resultado = $mysqli->query($sql))) { //Devuelve un objeto $resultado que si es Null cierra la conexión con la BD
        die();
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
