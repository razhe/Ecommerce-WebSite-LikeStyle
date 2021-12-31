<?php

include('../_conexion.php');

$response = new stdClass();

$datos = [];

$contador = 0;


function clasificarConsulta()
{
    /*
    if (!empty($_POST['marca'])) {
        $query = "SELECT * FROM PRODUCTO WHERE marca = '".$_POST['marca']."' ORDER BY ".$_POST['clasificar']." ".$_POST['ordenar']." limit 10;";
    }
    else
    {
        $query = "SELECT * FROM PRODUCTO ORDER BY ".$_POST['clasificar']." ".$_POST['ordenar']."  limit 10;";
    }
    */
    if ($_POST['categoria'] != 0 && empty($_POST['marca'])) {
        $sql = ("SELECT * FROM PRODUCTO WHERE ESTADO = 1 AND STOCK >= 1 and cod_categoria = ".$_POST['categoria']." ORDER BY ".$_POST['clasificar']." ".$_POST['ordenar']." limit ".$_POST['limite'].",10;");
        
    }
    elseif ($_POST['categoria'] != 0 && !empty($_POST['marca'])) {
        $sql = ("SELECT * FROM PRODUCTO WHERE MARCA = '".$_POST['marca']."' AND ESTADO = 1 AND STOCK >= 1 and cod_categoria = ".$_POST['categoria']." ORDER BY ".$_POST['clasificar']." ".$_POST['ordenar']." limit ".$_POST['limite'].",10;");
    }
    elseif ($_POST['categoria'] == 0 && !empty($_POST['marca'])) {
        $sql = ("SELECT * FROM PRODUCTO WHERE MARCA = '".$_POST['marca']."' AND ESTADO = 1 AND STOCK >= 1 limit ".$_POST['limite'].",10;");
    }
    else{
        $sql = ("SELECT * FROM PRODUCTO WHERE ESTADO = 1 AND STOCK >= 1 ORDER BY ".$_POST['clasificar']." ".$_POST['ordenar']." limit ".$_POST['limite'].",10;");
    }
    return $sql;
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
function selectQueryBtn(){
    if (!empty($_POST['marca'])) {
        $sqlCount = "SELECT COUNT(*) FROM PRODUCTO WHERE MARCA = '".$_POST['marca']."';";
    }
    else{
        $sqlCount = "SELECT COUNT(*) FROM PRODUCTO";
    }
    return $sqlCount;
}

$respuestaCount = mysqli_query($connection, selectQueryBtn());
$totalProductos = mysqli_fetch_row($respuestaCount);

//Se le agrega una propiedad llamada "datos" con el array $datos
$response -> datos = $datos;
$response -> conteo = $totalProductos;

mysqli_close($connection);

header('Content-Type: application/json');
echo json_encode($response);
?>