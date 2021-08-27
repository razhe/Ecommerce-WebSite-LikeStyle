<?php
    session_start();
    /*
    if (!isset($_SESSION['codusu'])) {
        header('location: index.php');
    }
    */
    
    include('../Model/_conexion.php');
    if(isset($_SESSION['carrito'])){
        //Si existe variable carrito validaremos si estaba agregado anteriormente el producto
        if(isset($_GET['p'])){
            //Eliminar la varible $_get para que no se sumen mas elementos al carrito cuando recargamos
            $_SESSION[ 'variable_get' ] = $_GET['p'];
            $id_producto = $_SESSION[ 'variable_get' ];
            header("Location: order.php");
            $cantidad = $_SESSION['cantidad_selec'];

            $arreglo = $_SESSION['carrito'];
            $encontro = false;
            $numero = 0;
            for ($i=0; $i < count($arreglo); $i++) { 
                if($arreglo[$i]['id'] == $id_producto){
                    $encontro=true;
                    $numero=$i;
                }
            }
            if($encontro == true){
                $arreglo[$numero]['cantidad'] = $arreglo[$numero]['cantidad'] + $cantidad; 
                $_SESSION['carrito']=$arreglo;
            }else{
                //No estaba el registro
                $nombre = '';
                $precio = '';
                $imagen = '';
                $cantidad = $_SESSION['cantidad_selec'];

                $sql ="select * from producto where cod_pro =" .$id_producto;
                $response = mysqli_query($connection,$sql);
                $fila = mysqli_fetch_row($response);
                $nombre=$fila[1];
                $precio=$fila[3];
                $imagen=$fila[5];
                $newArreglo = array(
                    'id'     => $id_producto,
                    'nombre' => $nombre,
                    'precio' => $precio,
                    'imagen' => $imagen,
                    'cantidad' => $cantidad 
                );
                array_push($arreglo, $newArreglo);
                $_SESSION['carrito']=$arreglo;
            }
        
        }
    }else{
        //Creamos la variable de sesión
        if(isset($_GET['p'])){
            //Eliminar la varible $_get para que no se sumen mas elementos al carrito cuando recargamos
            $_SESSION[ 'variable_get' ] = $_GET['p'];
            $id_producto = $_SESSION[ 'variable_get' ];
            header("Location: order.php");
            
            $nombre = '';
            $precio = '';
            $imagen = '';
            $cantidad = $_SESSION['cantidad_selec'];

            $sql ="select * from producto where cod_pro =" .$_GET['p'];
            $response = mysqli_query($connection,$sql);
            $fila = mysqli_fetch_row($response);
            $nombre=$fila[1];
            $precio=$fila[3];
            $imagen=$fila[5];
            
            $arreglo[] = array(
                'id'     => $_GET['p'],
                'nombre' => $nombre,
                'precio' => $precio,
                'imagen' => $imagen,
                'cantidad' => $cantidad
            );
            $_SESSION['carrito']=$arreglo;            
        }
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
<body>

    <?php include("../Views/layouts/navbar.php") ?>

    <main class="order__section">
        <div class="container__sections">
            <div class="order__container container--flex">
                <div class="cart__container column--66 container">
                    <div class="cart__title title-section">
                        <h2>CARRITO</h2>
                    </div>
                    <div class="cart__content" id="cart-content">
                    <!--Fila del carrito-->
                    <?php 
                        $totalPagar = 0;
                        if(isset($_SESSION['carrito'])){
                            $arregloCarrito = $_SESSION['carrito'];
                            for ($i=0; $i < count($arregloCarrito); $i++) {
                                $totalPagar += ($arregloCarrito[$i]['precio'] * $arregloCarrito[$i]['cantidad']);
                    ?>
                        <div class="cart__row" id="cart-row">
                            <div class="cart__img cart-item">
                                <img class="img__cart" src="../Views/img/<?php echo $arregloCarrito[$i]['imagen'] ?>" alt="<?php $arregloCarrito[$i]['imagen'] ?>">
                            </div>
                            <div class="cart__name cart-item">
                                <p><?php echo $arregloCarrito[$i]['nombre'] ?></p>
                            </div>
                            <!--<div class="cart__date cart-item">
                                <p>${data.datos[i].fec_ped}</p>
                            </div>-->
                            <div class="group__buttons">                     
                                <div class="quant__btn btn-change-quant"><button class="sub__quant btn-group-quant"><i class="fas fa-minus"></i></button></div>
                                <div class="quant__input"><input class="quant__inpt btn-group-quant" value="<?php echo $arregloCarrito[$i]['cantidad']; ?>"
                                type="text"data-precio="<?php echo $arregloCarrito[$i]['precio']; ?>"
                                           data-id="<?php echo $arregloCarrito[$i]['id']; ?>"></div>

                                <div class="quant__btn btn-change-quant"><button class="add__quant btn-group-quant"><i class="fas fa-plus"></i></button></div>
                            </div>
                            <div class="cart__price cart-item">
                                <p id="" class="total-<?php echo ($arregloCarrito[$i]['id']);?>">$<?php echo ($arregloCarrito[$i]['precio'] * $arregloCarrito[$i]['cantidad']); ?></p>
                            </div>
                            <div class="cart__action cart-item">
                                <i class="fas fa-times-circle btnEliminar" data-id="<?php echo $arregloCarrito[$i]['id']; ?>"></i>
                                
                            </div>
                        </div>
                    <?php } } ?>
                    </div>
                </div>
                <div class="summatory__container column--25 container">
                    <div class="summ__title title-section">
                        <h2>SUMATORIO</h2>
                    </div>
                    <div class="summatory__content">
                        <div class="summ__articles">
                            <div class="item__article" id="quant-articles">SUB TOTAL</div>
                            <div class="item__article" id="price-articles">$<?php echo $totalPagar; ?></div>
                        </div>
                        <div class="summ__total">
                            <div class="item__article">TOTAL (IVA)</div>
                            <div class="item__article" id="total-price">$<?php echo $totalPagar; ?></div>
                        </div>
                        <div class="btn__summ">
                            <button class="btn__pay" id="btn-process"><a class="link__checkout" href="checkout.php">PROCESAR PAGO</a></button>  
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="btn__cart">
                <button class="btn__continue"><a class="link__continue" href="index.php">CONTINUAR COMPRANDO</a></button>
            </div>                     
        </div>
    </main>

    <?php include("../Views/layouts/footer.php") ?>
    <script src="../Controller/order.js"></script>
</body>
</html>