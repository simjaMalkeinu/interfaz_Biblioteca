<?php
    session_start();
    // cerrar la sesion
    session_destroy();
    header('Location: index.php');
?>