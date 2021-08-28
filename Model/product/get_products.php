<?php
//Incuimos la clase 
include('../_conexion.php');
//Creamos una clase vacia
$response = new stdClass();
//Array para guardar datos
$datos=[];
//contadir
$i = 0;
//Consulta sql
$sql = ("SELECT * FROM PRODUCTO WHERE ESTADO = 1 AND STOCK >= 1;");
//creacion de la variable que almacena datos de la consulta
$result = mysqli_query($connection, $sql);
//Ciclo siempre que $result tenga datos
while ($row=mysqli_fetch_array($result)) {
    //Nueva clase vacia
    $obj = new stdClass();
    //Se le agregan propiedades con los valores de la consulta
    $obj->cod_pro=$row['cod_pro'];
    $obj->nom_pro=$row['nom_pro'];
    $obj->des_pro=$row['des_pro'];
    $obj->pre_pro=$row['pre_pro'];
    $obj->rutima_pro=$row['rutima_pro'];
    //Al array de datos se va agregando por el indicador de posicion i con los datos de la clase $obj
    $datos[$i] = $obj;
    $i++;
}
//Se le agrega una propiedad llamada "datos" con el array $datos
$response -> datos = $datos;
//Se cierra la coneccion
mysqli_close($connection);
//configurar content type del header para devolver un archivo json
header('Content-Type: application/json');
echo json_encode($response);
?>