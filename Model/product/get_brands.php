<?php

include('../_conexion.php');

$response = new stdClass();

$datos = [];

$contador = 0;
function selectQuery(){
    if ($_POST['categoria'] != 0) {
        $query = "SELECT marca, COUNT(marca) AS cantidad FROM producto WHERE cod_categoria = ".$_POST['categoria']." GROUP BY marca;";
    }
    else{
        $query = "SELECT marca, COUNT(marca) AS cantidad FROM producto GROUP BY marca;";
    }
    return $query;
}


$resultado = mysqli_query($connection, selectQuery());

while($filas = mysqli_fetch_array($resultado)){
    $obj = new stdClass();
    $obj->marca=$filas['marca'];
    $obj->cantidad=$filas['cantidad'];
    //Al array de datos se va agregando por el indicador de posicion i con los datos de la clase $obj
    $datos[$contador] = $obj;
    $contador++;
}
$response -> datos = $datos;

mysqli_close($connection);

header('Content-Type: application/json');
echo json_encode($response);
?>