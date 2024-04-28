<?php
    $alert = '';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = $_POST['user'];
        $password = $_POST['password'];

        // servidor para local
        // $servername = "localhost";
        // servidor para la nube
        $servername = "192.168.1.2";
        // nombre de la base de datos
        $database = "biblioteca";

        try {
            // Create a connection with PDO
            $conn = new PDO("mysql:host=$servername;dbname=$database", $user, $password);
            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Connected successfully with user $user";
            
            // iniciar una sesion en php
            $_SESSION['user'] = $user;

            // guardar la conexion en una variable de sesion
            $_SESSION['conexion_bd'] = array(
                'dsn' => "mysql:host=$servername;dbname=$database",
                'user' => $user,
                'pwd' => $password
            );

            // redirigir a la pagina de inicio del dashboard
            //header('Location: dashboard.php');
        
        } catch (Exception $e) {
            echo "Connection error: " . $e->getMessage();
            $alert = 'Usuario o contraseña incorrectos';
        }
        
    }

    if (isset($_SESSION['user'])) {
        header('Location: dashboard.php');
    }
?>