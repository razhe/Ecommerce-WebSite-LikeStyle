<?php
    //Sesiones y conexion a la BD
    session_start();
    include('../_conexion.php');
    //Instancia de carrito
    $arreglo = $_SESSION['carrito'];
    //insertar a la base de datos
    $total = 0;
    $fecha = date('Y-m-d h:m:s');
    for ($i=0; $i < count($arreglo) ; $i++) {
        $total += ($arreglo[$i]['precio'] * $arreglo[$i]['cantidad']);
    }
    //Sql
    $sqlVenta= ("insert into venta (cod_usu, tot_ven, fec_ven)
                values (1, $total, '$fecha')");
    mysqli_query($connection,$sqlVenta);

    $sqlIdVenta = ("select max(cod_ven) as codigo from venta");
    $idVentaResponse = mysqli_query($connection,$sqlIdVenta);
    while ($row=mysqli_fetch_array($idVentaResponse)) {
        $idVentas =$row['codigo']; 
    }

    for ($i=0; $i < count($arreglo); $i++) { 
        $sqlVentaProd = ("insert into venta_producto (cod_ven,cod_pro, can_ven_pro, pre_ven_pro, stotal_ven_pro)
                        values ($idVentas,
                                ".$arreglo[$i]['id'].",
                                ".$arreglo[$i]['cantidad'].",
                                ".$arreglo[$i]['precio'].",
                                ".$arreglo[$i]['cantidad'] * $arreglo[$i]['precio']."
                                ) ");
        mysqli_query($connection,$sqlVentaProd);
    }
    unset($_SESSION['carrito']);
    echo "Se ha comprado con exito!";
?>