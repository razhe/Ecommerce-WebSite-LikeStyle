<?php
    session_start();
    $_SESSION['cantidad_selec'] = $_POST['cantidad'];
    $cantidad = $_SESSION['cantidad_selec'];

    echo $cantidad;
?>