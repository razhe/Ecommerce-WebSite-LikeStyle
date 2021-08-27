<?php
    include('../_conexion.php');

    $i = 0;
    $respuesta = new stdClass();
    $datos = [];
    $sql = ("SELECT * FROM REGION");
    $result = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_array($result)){
        $obj = new stdClass();
        $obj->cod_region=$row['cod_region'];
        $obj->nom_region=$row['nom_region'];

        $datos[$i] = $obj;
        $i++;
    }
    $respuesta -> datos = $datos;
    mysqli_close($connection);
    //configurar content type del header para devolver un archivo json
    header('Content-Type: application/json');
    echo json_encode($respuesta);

?>