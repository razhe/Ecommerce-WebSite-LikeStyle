<?php
    //Sesiones y conexion a la BD
    session_start();
    include('../Model/_conexion.php');
    //Si no está logueado lo redireccionamos
    if (!isset($_SESSION['codusu'])) {
        header('location: index.php');
    }
    //Redireccion si no está la variable carrito creada
    if (!isset($_SESSION['carrito'])) {
        header('Location: ./index.php');
    }
    //Instancia de carrito
    $arreglo = $_SESSION['carrito'];

    function comprar(){
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
        $sqlIdVenta = ("select max(cod_ven) from venta");
        for ($i=0; $i < count($arreglo); $i++) { 
            $sqlVentaProd = ("insert into venta_producto (cod_ven,cod_pro, can_ven_pro, pre_ven_pro, stotal_ven_pro)
                            values ($sqlIdVenta,".$arreglo[$i]['id'].", ".$arreglo[$i]['cantidad'].", ".$arreglo[$i]['precio'].", ".($arreglo[$i]['cantidad'] * $arreglo[$i]['precio'])."");
            mysqli_query($connection,$sqlVentaProd);
        }
        unset($_SESSION['carrito']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <!--Jquery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--Estilos-->
    <link rel="stylesheet" href="../Views/css/estilos.css">
    <title>E-commerce</title>
    <!--Fuentes-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Condensed&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<body class ="body__checkout">

<?php include("../Views/layouts/navbar.php") ?>

<main class="order__section">
    <div class="container__sections container--flex">
        <div class="section__left column--50">

            <div class="container__billing container">
                <form class = "client_form" action="#">
                    <h2 class="tittle-container-checkout">DETALLE DEL ENVIO</h2>
                    <div class="container__form container">
                        <div class="address__form">
                            <label for="cName">Dirección *</label>
                            <br>
                            <div class="street__address">  
                                <input id="inpt-address1" type="text" class="inpt__formulario inpt--100" name="sAddress" placeholder="Calle, pje, etc.">
                            </div>
                            <div class="type__address">
                                <input id="inpt-address2" type="text" class="inpt__formulario inpt--100" name="tAddress" placeholder="Departamento, casa, etc. (opcional)">
                            </div>
                        </div>
                        <div class="address2__form">
                            <div class="region__address column--50 containerW900">
                                <label for="region">Región *</label>
                                <br>
                                <select name="region" id="select-region" class="inpt__formulario inpt--50">                                 
                                </select>
                                
                            </div>
                            <div class="comuna__address column--50 containerW900">
                                <label for="comuna">Comuna *</label>
                                <br>
                                <select name="comuna" id="select-comuna" class="inpt__formulario inpt--50">
                                    <option value="1">Arica</option>
                                    <option value="2">Camarones</option>
                                    <option value="3">General Lagos</option>
                                    <option value="4">Putre</option>
                                </select>
                            </div>
                        </div>
                        <div class="commentary__form">
                            <label for="comentario">Comentario</label>
                            <br>
                            <textarea id="inpt-com" name="comentario" class="ta__comm inpt--100" cols="30" rows="10" placeholder="Añade un comentario (opcional)"></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="section__right column--50">
            <div class="container__cupon container">
                <h2 class="tittle-container-checkout">CÓDIGO DE DESCUENTO</h2>
                <div class="content__cupon">
                    <div class="parrafo__cupon">
                        <p>Ingresa un código de descuento si posees uno</p>
                    </div>
                    <div class="acciones__cupon">
                        <input class="inpt__cupon" type="text">
                        <button class="btn__cupon">APLICAR</button>
                    </div>
                    
                </div>
            </div>

            <div class="container__order container">
                <h2 class="tittle-container-checkout">ORDEN</h2>
                <!--Row...-->
                <div class="pay__section container">
                    <div class="order__row ">
                        <div class="object__section column--50">
                            <p><strong>Product</strong></p>
                        </div>
                        <div class="total__section column--50">
                            <p><strong>Total</strong></p>
                        </div> 
                    </div>                              
                    <?php
                        $total = 0; 
                        for ($i=0; $i <count($arreglo) ; $i++) { 
                            $total += ($arreglo[$i]['precio'] * $arreglo[$i]['cantidad']);
                        
                    ?>
                    <!--Row...-->                       
                    <div class="order__row">
                        <div class="object__section column--50">
                            <p><?php echo $arreglo[$i]['nombre'];?></p>
                        </div>
                        <div class="total__section column--50">
                            <p>$ <?php echo $arreglo[$i]['precio']; ?></p>
                        </div>
                    </div>  
                    <?php
                    }
                    ?>                            
                    <!--Row...-->                   
                    <div class="order__row">
                        <div class="object__section column--50">
                            <p><strong>Carrito SubTotal</strong></p>
                        </div>
                        <div class="total__section column--50">
                            <p>$ <?php echo $total ?></p>
                        </div> 
                    </div>                                              
                    <!--Row...-->
                
                    <div class="order__row">
                        <div class="object__section column--50">
                            <p><strong>Total orden</strong></p>
                        </div>
                        <div class="total__section column--50">
                            <p><strong>$ <?php echo($total);?></strong></p>
                        </div>                        
                    </div>
                    <div class="pay__row">
                        <div class="boton__transfer ">
                            <a class="btn__transfer btn-pay-order" href="#">Paypal <i class="fab fa-paypal"></i></a>
                        </div>
                    </div>
                    <div class="pay__row">
                        <div class="boton__transfer ">
                            <a class="Paypal btn-pay-order" href="#">Transferencia Bancaria <i class="fas fa-piggy-bank"></i></a>
                        </div>
                    </div>

                    <div class="placeOrder__row ">
                        <button class="btn__PlaceOrder" id="btn-place-order">REALIZAR PEDIDO</button>
                    </div>                                                          
                </div>
            </div>                         
        </div>                
    </div>
</main>
<script src="../Controller/checkout.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../Controller/sweetAlert.js"></script>
</body>
</html>