
    <?php
    sleep(3);
    // Creo un objeto persona
    $objPersona = new stdclass;
    // tomo los datos del formulario y los guardo en los campos del objeto

    $objPersona->usuario = $_POST["usuario"];
    $objPersona->login = $_POST['login'];
    $objPersona->apellido = $_POST['apellido'];
    $objPersona->nombre = $_POST['nombre'];
    $objPersona->edad = $_POST['edad'];


    echo "{"; echo "id:"; echo '"'; echo $objPersona->usuario; echo '"'; echo ",";
    echo "login:"; echo '"'; echo $objPersona->login; echo '"'; echo ",";
    echo "apellido:"; echo '"'; echo $objPersona->apellido; echo '"'; echo ",";
    echo "nombre:"; echo '"'; echo $objPersona->nombre; echo '"'; echo ",";
    echo "edad:"; echo '"'; echo $objPersona->edad; echo '"'; echo "}";


    ?>
