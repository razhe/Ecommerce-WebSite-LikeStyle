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
                        <img class="logo__nav" src="../Views/img/logo2.png" alt="Logo empresa">
                    </a>
                </div>
                <div class="search__section column--50">
                    <form action="./product_search.php">
                        <input class="search__input" placeholder="" name="srch" type="text" id="search-input">
                        <button id="btn-search" class="btn__search">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                    <div class="item__user">
                        <a class="cart__link" href="order.php">
                            <i class="fas fa-shopping-cart"></i>
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
            <nav class="navbar__links container">
                <div class="options__section container">
                        <div class="bars__container">
                            <i id="bars-menu" class="fas fa-bars bars__menu"></i>
                        </div>
                                        
                        <div id="content-option" class="content__options column--55">
                            <ul class="nav__products">
                                <li class="nav__item"><a href="#" class="menu__link">Ropa</a></li>
                                <li class="nav__item"><a href="#" class="menu__link">Belleza</a></li>
                                <li class="nav__item"><a href="#" class="menu__link">Calzado</a></li>
                                <li class="nav__item"><a href="#" class="menu__link">Accesorios</a></li>
                            </ul>
                        </div>
                        <div id="user-option" class="user__option column--25">
                        <?php 
                            if (isset($_SESSION['codusu'])) {
                                echo 
                                '<div class="item__user"><i class="fas fa-house-user"></i></div>';
                                echo
                                '<p class="user__welcome">'.$_SESSION['nomusu'];'</p>';
                                
                            }else{
                                echo '                                                   
                                <div class="item__user"><i class="fas fa-users"></i></div>
                                <div class="item__user"><i class="fas fa-sign-in-alt"></i></div>
                                ';
                            }
                        ?>

                        </div>
                </div>
            </nav>
        </div>
    </header>
</body>
</html>