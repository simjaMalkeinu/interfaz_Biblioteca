<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: index.php');
    }

    $user = $_SESSION['user'];
    $libros = array();

    try {
        // Create a connection with PDO y la conexion guardada en la variable de sesion
        $conn = new PDO($_SESSION['conexion_bd']['dsn'], $_SESSION['conexion_bd']['user'], $_SESSION['conexion_bd']['pwd']);
        
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // hacer una consulta a la tabla libros
        $stmt = $conn->prepare("SELECT * FROM libros");
        $stmt->execute();
        $libros = $stmt->fetchAll();

    
    } catch (Exception $e) {
        echo "Connection error: " . $e->getMessage();
        $alert = 'Usuario o contraseña incorrectos';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>

    <!-- CDN PARA CSS -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- CDN PARA ICONOS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <nav>
        <div class="nav-wrapper cyan lighten-1">
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li style="margin-right: 0.5em; font-size:1.5em;"><b><?php echo strtoupper($user) ?></b> </li>
                <li  style="margin-right: 0.5em; font-size:1.5em;"><i class="large material-icons">person</i></li>
                <li><a href="logout.php">Cerrar Sesion</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col s12 m12 ">
                <h1 style="text-align: center;" >Libros</h1>
                <!-- Mostrar los libros -->
                <?php if (count($libros) > 0) { ?>
                    <table class="striped">
                        <thead>
                            <tr>
                                <th>ISBN</th>
                                <th>Titulo</th>
                                <th>Autor</th>
                                <th>Editorial</th>
                                <th>Edicion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($libros as $libro) { ?>
                            <tr>
                                <td><?php echo $libro['ISBN']; ?></td>
                                <td><?php echo $libro['Titulo']; ?></td>
                                <td><?php echo $libro['NombreAutor'] . " ". $libro['ApePatAutor']. " ". $libro['ApeMatAutor']; ?></td>
                                <td><?php echo $libro['FechaPublicacion']; ?></td>
                                <td><?php echo $libro['Existencias']; ?></td>
                                <td><?php echo $libro['DescripcionC']; ?></td>
                                <td><?php echo $libro['Disponible']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                <div class="card-panel
                    cyan lighten-5">No hay libros registrados</div>
                <?php } ?>


            </div>
        </div>
    </div>

</body>

</html>