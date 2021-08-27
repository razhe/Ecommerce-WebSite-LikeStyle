<?php
    include('../_conexion.php');

    $i = 0;
    $respuesta = new stdClass();
    $datos = [];
    $sql = ("SELECT * FROM COMUNA WHERE COD_REGION = ".$_POST['region_id']." ");
    $result = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_array($result)){
        $obj = new stdClass();
        $obj->cod_comuna=$row['cod_comuna'];
        $obj->nom_comuna=$row['nom_comuna'];

        $datos[$i] = $obj;
        $i++;
    }
    $respuesta -> datos = $datos;
    mysqli_close($connection);
    //configurar content type del header para devolver un archivo json
    header('Content-Type: application/json');
    echo json_encode($respuesta);

?>