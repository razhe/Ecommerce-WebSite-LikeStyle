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
    <link rel="stylesheet" href="../Views/css/estilos-nav.css">
    <title>E-commerce</title>
    <!--Fuentes-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Condensed&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
<header class="main__header">
        <div class="container--flex container__nav">
            <div class="nav__info container--flex">
                <div class="navbar__logo column--50">
                    <a href="index.php">
                        <img class="logo__nav" src="../Views/img/logo5.png" alt="Logo empresa">
                    </a>
                </div>
                <div class="search__section column--50">
                    <form action="./product_search.php">
                        <input class="search__input" placeholder="" name="srch" type="text" id="search-input">
                        <button id="btn-search" class="btn__search">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                    <div class="shopping__bag">
                        <div class="item__user">
                            <a class="cart__link" href="order.php">
                                <i class="fas fa-shopping-bag cart__bag"></i>
                            </a>
                        </div>
                        <div class="cart__counter" id="cart-counter">
                            <div>
                            <?php 
                                if (isset($_SESSION['carrito'])) {
                                    echo count($_SESSION['carrito']);
                                }else{
                                    echo 0;
                                }
                            ?>
                            </div>
                        </div>
                    </div>
            </div>
            

            </div>
            <nav class="navbar__links container" id="navbar--links">
                <div class="options__section">
                        <div class="bars__container">
                            <i id="bars-menu" class="fas fa-bars bars__menu"></i>
                        </div>
                                        
                        <div id="content-option" class="content__options column--55">
                            <ul class="nav__products">
                                <li class="nav__item"><a href="products.php?sccat=1" class="menu__link">Ropa</a></li>
                                <li class="nav__item"><a href="products.php?sccat=2" class="menu__link">Belleza</a></li>
                                <li class="nav__item"><a href="products.php?sccat=3" class="menu__link">Calzado</a></li>
                                <li class="nav__item"><a href="products.php?sccat=4" class="menu__link">Accesorios</a></li>
                            </ul>
                        </div>
                        <div class="content__user column--25" id="content-user">
                            <?php
                                if (isset($_SESSION['codusu'])) {   
                            ?>
                            <li class="user__list">
                                <a href="#" class="user__opt" id ="user-opt">Usuario <i class="far fa-user icon-user-opt"></i></a>
                                <ul class = "drop__list" id="drop-list">
                                    <li><a class = "user__link" href="#">Drop Menu 1</a></li>
                                    <li><a class = "user__link" href="#">Drop Menu 2</a></li>
                                    <li><a class = "user__link" href="#">Drop Menu 3</a></li>
                                    <li><a class = "user__link" href="#">Drop Menu 4</a></li>
                                </ul>
                            </li>
                            <?php
                                }else{
                            ?>
                                <div class="login__register"><a class="register__link" href="register.php">Registrar </a> / <a class="login__link" href="login.php"> Login</a></div>
            
                            <?php
                                }
                            ?>
                        <?php 
                        /*
                            if (isset($_SESSION['codusu'])) {
                                echo 
                                '<div class="item__user"><i class="fas fa-house-user"></i></div>';
                                echo
                                '<p class="user__welcome">'.$_SESSION['nomusu'];'</p>';
                                
                            }else{
                                echo '                                                   
                                
                                ';
                            }
                        */
                        ?>
                        </div>
                </div>
            </nav>
        </div>
    </header>
    <!--Main js-->   
    <script src="../Controller/navbar.js"></script>
</body>
</html>