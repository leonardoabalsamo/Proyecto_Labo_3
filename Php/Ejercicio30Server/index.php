
<html>
    <body>
        <?php
            session_start();

            if (!isset($_SESSION['usuario'])) {
                header('location: FormLogin.html');
            }else{
              header('location: ./Ejercicio26BDABM.php');
                  }

/*


            // Comprobamos que nos llega los datos del formulario
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Variables que teóricamente estarían en una base de datos
                $usuarioOK = 'admnistrador';
                $passOK = 'administrador';

                // Variables del formulario
                $usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : null;
                $pass = isset($_REQUEST['pass']) ? $_REQUEST['pass'] : null;

                // Comprobamos si los datos son correctos
                if ($usuarioOK == $usuario && $passOK == $pass) {
                    // Si son correctos, creamos la sesión
                    session_start();
                    $_SESSION['usuario'] = $_REQUEST['usuario'];
                    // Redireccionamos a la página segura
                    header('Location: ./Ejercicio26BDABM.php');
                    die();
                } else {
                    // Si no son correctos, informamos al usuario
                    echo '<p style="color: red">El apodo o la contraseña es incorrecta.</p>';
                }
            }
        <h1 style="border:solid; text-align:center;">INICIO DE SESION</h1>
        <br><br>
*/
    ?>

    </body>
</html>
