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
        <div class="container__sections container--flex">
            <div class="section__title container">
                
            </div>
            <div class="product__section--general container--flex" id="products_list">
                <!-- lista del filtro -->
                <div class="seccion__lista__filtro column--25">
                    <div>
                        <div class="lista__titulo--filtro">
                            <h3>Categoría</h3>
                        </div>

                        <ul class="lista__contenido--filtro">
                            <li class="item__lista--filtro">
                                <input type="checkbox" name="" id="">
                                <label for="">
                                    <span>Shoes</span>
                                    <small>(10)</small>
                                </label>
                            </li>

                            <li class="item__lista--filtro">
                                <input type="checkbox" name="" id="">
                                <label for="">
                                    <span>Bags</span>
                                    <small>(7)</small>
                                </label>
                            </li>

                            <li class="item__lista--filtro">
                                <input type="checkbox" name="" id="">
                                <label for="">
                                    <span> Accessories</span>
                                    <small>(3)</small>
                                </label>
                            </li>

                            <li class="item__lista--filtro">
                                <input type="checkbox" name="" id="">
                                <label for="">
                                    <span>Clothings</span>
                                    <small>(3)</small>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <div class="lista__titulo--filtro">
                            <h3>Brands</h3>
                        </div>

                        <ul class="lista__contenido--filtro">
                            <li class="item__lista--filtro">
                                <input type="checkbox" name="" id="">
                                <label for="">
                                    <span>Gucci</span>
                                    <small>(10)</small>
                                </label>
                            </li>

                            <li class="item__lista--filtro">
                                <input type="checkbox" name="" id="">
                                <label for="">
                                    <span>Burberry</span>
                                    <small>(7)</small>
                                </label>
                            </li>

                            <li class="item__lista--filtro">
                                <input type="checkbox" name="" id="">
                                <label for="">
                                    <span> Accessories</span>
                                    <small>(3)</small>
                                </label>
                            </li>

                            <li class="item__lista--filtro">
                                <input type="checkbox" name="" id="">
                                <label for="">
                                    <span>Valentino</span>
                                    <small>(3)</small>
                                </label>
                            </li>

                            <li class="item__lista--filtro">
                                <input type="checkbox" name="" id="">
                                <label for="">
                                    <span>Dolce & Gabbana</span>
                                    <small>(3)</small>
                                </label>
                            </li>

                            <li class="item__lista--filtro">
                                <input type="checkbox" name="" id="">
                                <label for="">
                                    <span>Hogan</span>
                                    <small>(3)</small>
                                </label>
                            </li>

                            <li class="item__lista--filtro">
                                <input type="checkbox" name="" id="">
                                <label for="">
                                    <span>Moreschi</span>
                                    <small>(3)</small>
                                </label>
                            </li>

                            <li class="item__lista--filtro">
                                <input type="checkbox" name="" id="">
                                <label for="">
                                    <span>Givenchy</span>
                                    <small>(3)</small>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- opciones del filtro -->
                <div class="column--75">
                    <div class="seccion__opciones__filtro">
                        <form class="form__opciones__filtro" action="">
                            <div class="container__clasificar item-form-ordenar">
                                <label for="sort-by">Clasificar</label>
                                <select class="select__clasificar select-filtro" name="sort-by" id="sort-by">
                                <option class="opt__select--clasificar" value="title" selected="selected">Nombre</option>
                                <option class="opt__select--clasificar" value="number">Precio</option>
                                <option class="opt__select--clasificar" value="search_api_relevance">Ofertas</option>
                                <option class="opt__select--clasificar" value="created">Novedades</option>
                                </select>
                            </div>
                            <div class="container__ordenar item-form-ordenar">
                                <label for="order-by">Ordenar</label>
                                <select class="select__ordenar select-filtro"  name="order-by" id="sort-by">
                                <option class="opt__select--ordenar" value="ASC" selected="selected">ASC</option>
                                <option class="opt__select--ordenar" value="DESC">DESC</option>
                                </select>
                            </div>
                            <div class="container__btn__filtro">
                                <a class="link__filtrar--productos item-form-ordenar" href="">Apply</a>
                            </div>
                            
                        </form>
                    </div>
                    <div class="product__section container--flex" id="product_novedades_list">
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
                            <img class="img__product" src="../views/img/blusa-mujer.png" alt="${data.datos[i].nom_pro}">
                            <div class="product__title">Blusa Mujer</div>
                            <div class="product__price">$7500</div>
                            <div class="product__options">
                                <a class="ref__details" href = "details-product.php?p=${data.datos[i].cod_pro}">
                                    Comprar ahora
                                </a>
                            </div>   
                        </div>
                    </div>
                    <!-- PAGINATION -->
                    <div class="seccion__paginacion">                      
                        <ul class="pagination">
                            <span class="first__pagination "><i class="fas fa-chevron-left icon-first"></i> first</span>
                            <span class="prev__pagination item-paginacion"><i class="fas fa-chevron-left"></i></span>
                            <span class="item-paginacion"> 1 </span>
                            <span class="item-paginacion"> 2 </span>
                            <span class="next__pagination item-paginacion"><i class="fas fa-chevron-right"></i></span>
                            <span class="last__pagination ">Last <i class="fas fa-chevron-right icon-last"></i></span>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--Main js   
    <!--<script src="../Controller/search.js"></script>-->
    <!--<script>var seach_url = '<?php echo htmlspecialchars($_GET["srch"]); ?>';</script>-->
</body>
</html>
