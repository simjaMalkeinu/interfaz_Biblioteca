<?php
    include_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>

    <!-- CDN PARA CSS -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- CDN PARA ICONOS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title
                        center-align">Inicio de Sesion</span>
                        <?php
                            if ($alert != '') {
                                echo "<div class='card-panel red lighten-2'>$alert</div>";
                            }
                        ?>
                        <div class="row">
                            <form class="col s12" method="POST">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="user" type="text" class="validate pl-2" name="user">
                                        <label for="user">Usuario</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="password" type="password" class="validate" name="password">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <button class="btn waves-effect waves-light right" type="submit"
                                                name="action">Iniciar Sesion
                                                <i class="material-icons right">send</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>