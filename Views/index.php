<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
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
    <!--Slick-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <title>E-commerce</title>
    <!--Fuentes-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Condensed&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400&display=swap" rel="stylesheet">
</head>
<body>
    <?php include("../Views/layouts/navbar.php") ?>
    
    <main class="products__content">
        <div class="banner">
            <div class="capa__banner">

            </div>
            <div class="capa__banner2">

            </div>
            <div class="info__banner">
                <h1 class="titulo__banner">Bienvenidos a <h1 class="nombre__tienda__banner">LikeStyle</h1></h1>
                <p class="parrafo__banner">Lideres en ofertas, destacando la calidad de nuestros productos & servicios. Te invitamos a formar parte de nuestros clientes contentos.</p>
                <a href="products.php?sccat=0" class="link__banner">COMPRAR AHORA</a>
            </div>
        </div>
        <div class="seccion__categorias--index container--flex">
            
            <div class="barra__horizontal--cat"></div>

            <div class="container__moda container__categoria column--33">
                <a class="link__categoria--index" href="#">
                    <div class="img__container--cat">
                        <div class="info__categoria">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, aliquid!</p>
                        </div>
                        <h1 class="img__titulo--cat">MODA</h1>
                        <img class="img__categoria" src="./img/moda-cat.jpg" alt="articulos de moda">
                    </div>
                </a>
            </div>

            <div class="container__belleza container__categoria column--33">
                <a class="link__categoria--index" href="#">
                    <div class="img__container--cat">
                        <div class="info__categoria">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, aliquid!</p>
                        </div>
                        <h1 class="img__titulo--cat">ACCESORIOS</h1>
                        <img class="img__categoria" src="./img/accesorios-cat.jpg" alt="Accesorios para vestir">
                    </div>
                </a>
            </div>

            <div class="container__accesorio container__categoria column--33">
                <a class="link__categoria--index" href="#">
                    <div class="img__container--cat">
                        <div class="info__categoria">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, aliquid!</p>
                        </div>
                        <h1 class="img__titulo--cat">BELLEZA</h1>
                        <img class="img__categoria" src="./img/belleza-cat.jpg" alt="Articulos de belleza - cosmeticos">
                    </div>
                </a>
            </div>

        </div>
        <div class="container__sections container--flex">
            <div class="section__title container-adapt">
                <h2>Más populares</h2>
                <p class="parraf__section__title">Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
            </div>
            <div class="product__section center" id="product_mts_list">
                <!--En conde...-->
            </div>
        </div>
        <div class="container__sections container--flex">
            <div class="section__title container-adapt">
                <h2>Novedades</h2>
                <p class="parraf__section__title">Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
            </div>
            <div class="product__section center" id="product_novedades_list">
                <!--Productos novedades-->
                <div class="product__item column--25">               
                    <img class="img__product" src="../views/img/gorro-pescador-negro.png" alt="${data.datos[i].nom_pro}">
                    <div class="product__title">Gorra Pescador</div>
                    <div class="product__price">$11000</div>
                    <div class="product__options">
                        <a class="ref__details" href = "details-product.php?p=${data.datos[i].cod_pro}">
                            Comprar ahora            
                        </a>
                    </div>   
                </div>

                <div class="product__item column--25">               
                    <img class="img__product" src="../views/img/blusa-mujer.png" alt="${data.datos[i].nom_pro}">
                    <div class="product__title">Blusa Mujer</div>
                    <div class="product__price">$7500</div>
                    <div class="product__options">
                        <a class="ref__details" href = "details-product.php?p=${data.datos[i].cod_pro}">
                            Comprar ahora
                        </a>
                    </div>   
                </div>


                <div class="product__item column--25">               
                    <img class="img__product" src="../views/img/gorro-pescador-negro.png" alt="${data.datos[i].nom_pro}">
                    <div class="product__title">Gorra Pescador</div>
                    <div class="product__price">$11000</div>
                    <div class="product__options">
                        <a class="ref__details" href = "details-product.php?p=${data.datos[i].cod_pro}">
                            Comprar ahora            
                        </a>
                    </div>   
                </div>

                <div class="product__item column--25">               
                    <img class="img__product" src="../views/img/gorro-pescador-negro.png" alt="${data.datos[i].nom_pro}">
                    <div class="product__title">Gorra Pescador</div>
                    <div class="product__price">$11000</div>
                    <div class="product__options">
                        <a class="ref__details" href = "details-product.php?p=${data.datos[i].cod_pro}">
                            Comprar ahora            
                        </a>
                    </div>   
                </div>
            </div>
        </div>
        <div class="hero_section">
            <div class="hero__img">
                <div class="capa1__hero"></div>
                <div class="triangulo__hero1"></div>
                <div class="triangulo__hero2"></div>
            </div>
        </div>
        <div class="noticas__section">
            <div class="container__noticias">
                <h2 class="titulo__noticias">NOTICIAS</h2>
                <p class="parrafo__noticias">Suscribete y mantente informado sobre nuestros productos y descuentos</p>
                <div class="noticias__input--contenedor">
                    <input class="inpt__noticias" type="text">
                    <button class="btn__noticias">SUSCRIBIRSE</button>
                </div>
            </div>
        </div>
        <div class="marcas__section">
            <div class="container__marcas container-adapt">
                <img src="../views/img/marcas/adidas_logo.png" alt="" class="img__marca--index ">
                <img src="../views/img/marcas/nike_logo.png" alt="" class="img__marca--index ">
                <img src="../views/img/marcas/zara_logo.png" alt="" class="img__marca--index ">
                <img src="../views/img/marcas/chanel_logo.png" alt="" class="img__marca--index ">
                <img src="../views/img/marcas/lacoste_logo.png" alt="" class="img__marca--index">
            </div>
        </div>
    </main>

    <?php include("../Views/layouts/footer.php") ?>
    <!--Main js-->   
    <script src="../Controller/main.js"></script>

    <!--Slick-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
