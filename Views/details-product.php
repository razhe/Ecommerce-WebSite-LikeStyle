<?php
    session_start();
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

    <main class="main__content">
        <div class="conainer__details container--flex">
            <div class="detail__tittle container">
                <h2 id="title-product-detail" value="" name="title-product"></h2>
            </div>
            <section class="detail__section container">
                <div class="detail__preview column--75">
                    <img id="img-product-detail" value="" name="img-product" class="img__detail" src="" alt="imagen-producto-detalle">
                </div>
                <div class="purchase__detail column--25">
                    <h3>Precio:</h2>
                    <h3 id ="price-product-detail" value="" name="product-price"></h3> 
                    <p>(IVA incluido)</p>
                    <div class="tittle__quant">
                            <h3>Cantidad:</h3>
                    </div>
                    <div class="group__buttons">                     
                        <div class="quant__btn"><button id="sub-quant-btn" class="sub__quant btn-group-quant"><i class="fas fa-minus"></i></button></div>
                        <div class="quant__input"><input id="quant-inpt" class="quant__inpt btn-group-quant" value="1" type="text"></div>
                        <div class="quant__btn"><button id="add-quant-btn" class="add__quant btn-group-quant"><i class="fas fa-plus"></i></button></div>
                    </div>
                    <div class="btn__section__cart">
                        <a href="order.php?p=<?php echo htmlspecialchars($_GET["p"]); ?>">
                            <button class = "add__cart" id="btn-add-cart"><i class="fas fa-cart-plus"></i> Comprar</button>
                        </a>
                    </div>                   
                </div>
            </section>
            <section class="description__section container">
                <div class="description__title">
                    <h2>Descripcion del articulo</h2>
                </div>
                <div class="description__content">
                    <p id ="desc-product-detail" value=""></p>
                </div>    
            </section>
        </div>
    </main>
    <!--detail js-->
    <script>var p_url = '<?php echo htmlspecialchars($_GET["p"]); ?>';</script>
    <script src="../Controller/details.js"></script>
</body>
</html>