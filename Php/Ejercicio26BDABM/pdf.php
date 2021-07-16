<?php
      /*define("SERVER","b1wxrcvtq9n5vzkulrp3-mysql.services.clever-cloud.com");
      define("USUARIO","uumcnhlukgml0fs3");
      define("PASS","R87rmtX6idkwQIDZeisO");
      define("BASE","b1wxrcvtq9n5vzkulrp3");
      $mysqli = new mysqli(SERVER,USUARIO,PASS,BASE); // Bbjeto que define la conexión con la BD*/

      define("SERVER","localhost");
      define("USUARIO","root");
      define("PASS","");
      define("BASE","empleados");
      $mysqli = new mysqli(SERVER,USUARIO,PASS,BASE); // Bbjeto que define la conexión con la BD


      $codigo =$_GET['codigo'];

      $sql = "select pdf from persona where codigo = '$codigo'";


    if( ! ($resultado=$mysqli->query($sql)) ){
        die();
    };

    while($fila = $resultado->fetch_assoc()){
        $objPdf = new stdClass();
        $objPdf->pdf=base64_encode($fila['pdf']);
    }

    $mysqli->close();

    $salidaJson = json_encode($objPdf,JSON_INVALID_UTF8_SUBSTITUTE);

    echo $salidaJson;
?>
