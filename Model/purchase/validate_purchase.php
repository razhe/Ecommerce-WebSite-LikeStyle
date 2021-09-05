<?php
    //Activar variables de sesion
    session_start();
    //variable respuesta
    include('../_conexion.php');
    $response = new stdClass();
    if (!isset($_SESSION['codusu'])) {
        $response -> state = false;
        $response -> detail = "access denied. not logged in yet...";
        $response -> open_login = true;      
    }else{
        //Capturando variables para la insersion
        $response -> state = true;
        $response -> detail = "access granted... been redirected to checkout";
        $response -> open_login = false;
    }
    //Se cierra la coneccion
    mysqli_close($connection);
    //configurar content type del header para devolver un archivo json
    header('Content-Type: application/json');
    echo json_encode($response);
?>