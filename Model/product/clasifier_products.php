<?php

include('../_conexion.php');

$response = new stdClass();

$datos = [];

$contador = 0;

function clasificarConsulta()
{
    if (!empty($_POST['marca'])) {
        $query = "SELECT * FROM PRODUCTO WHERE marca = '".$_POST['marca']."' ORDER BY ".$_POST['clasificar']." ".$_POST['ordenar'].";";
    }
    else
    {
        $query = "SELECT * FROM PRODUCTO ORDER BY ".$_POST['clasificar']." ".$_POST['ordenar'].";";
    }

    return $query;
}

$resultado = mysqli_query($connection, clasificarConsulta());

while($filas = mysqli_fetch_array($resultado)){
    $obj = new stdClass();

    $obj->cod_pro=$filas['cod_pro'];
    $obj->nom_pro=$filas['nom_pro'];
    $obj->des_pro=$filas['des_pro'];
    $obj->pre_pro=$filas['pre_pro'];
    $obj->rutima_pro=$filas['rutima_pro'];
    $obj->estado=$filas['estado'];
    $obj->stock=$filas['stock'];
    $obj->marca=$filas['marca'];
    //Al array de datos se va agregando por el indicador de posicion i con los datos de la clase $obj
    $datos[$contador] = $obj;
    $contador++;
}
$response -> datos = $datos;

mysqli_close($connection);

header('Content-Type: application/json');
echo json_encode($response);
?>