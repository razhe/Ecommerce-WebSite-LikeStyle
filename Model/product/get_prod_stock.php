<?php
    session_start();

    include ('../_conexion.php');

    $sql = "select stock from producto where cod_pro = " .$_POST['codigo_producto'];

    $result = mysqli_query($connection, $sql);
    while ($row = (mysqli_fetch_array($result))) {
        $response = $row['stock'];
    }

    echo $response;
?>