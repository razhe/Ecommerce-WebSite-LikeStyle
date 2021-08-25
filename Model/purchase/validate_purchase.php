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
        $cod_usu = $_SESSION['codusu'];
        $cod_prod = $_POST['cod_pro'];
        $sql= "INSERT INTO PEDIDO (cod_usu, cod_pro, fec_ped, estado, dir_usu, tel_usu) VALUES ($cod_usu, $cod_prod, now(), 1, '','')";
        $result=mysqli_query($connection, $sql);
        if ($result) {
            $response -> state=true;
            $response -> detail="Product added to order";
        }else{
            $response -> state = false;
            $response -> detail = "we couldn't add the produt to the order, try later...";
        }
        
    }
    //Se cierra la coneccion
    mysqli_close($connection);
    //configurar content type del header para devolver un archivo json
    header('Content-Type: application/json');
    echo json_encode($response);
?>