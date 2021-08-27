<?php
    //Sesiones y conexion a la BD
    session_start();
    include('../_conexion.php');
    //Instancia de carrito

    $sqlIdVenta = ("select max(cod_ven) as codigo from venta");
    $idVentaResponse = mysqli_query($connection,$sqlIdVenta);
    while ($row=mysqli_fetch_array($idVentaResponse)) {
        $idVentas =$row['codigo']; 
    }

    $sqlDireccionCliente =  ("insert into envio (pais_envio, dir_envio, dir_envio2, cod_ven, cod_comuna, comentario)
                            values
                             ('Chile',
                              '".$_POST['direccion1']."',
                              '".$_POST['direccion2']."',
                              $idVentas,
                              '".$_POST['cod_comuna']."',
                              '".$_POST['comentario']."'
                              )");

    mysqli_query($connection,$sqlDireccionCliente);

    mysqli_close($connection);

    echo "Se ha comprado con exito!";
?>