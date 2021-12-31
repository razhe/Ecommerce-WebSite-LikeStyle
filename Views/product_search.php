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
</head>
<body>
    <?php include("../Views/layouts/navbar.php") ?>
    
    <main class="products__content">
        <div class="container__sections container--flex">
            <div class="section__title container">
                
            </div>
            <div class="product__section--general container--flex" id="products_list">
                <!-- lista del filtro -->
                <div class="seccion__lista__filtro column--25 container-adapt">
                    <div>
                        <form action="#" method="POST" class="form__filtro" id="form-filtro">  
                            <div class="seccion__opciones__filtro">
                                <h3>Parámetros</h3>
                                <div class="container__clasificar item-form-ordenar">
                                    <label for="sort-by">Clasificar</label>
                                    <select class="select__clasificar select-filtro" name="clasificar" id="sort-by">
                                    <option class="opt__select--clasificar" value="nom_pro" selected="selected">Nombre</option>
                                    <option class="opt__select--clasificar" value="pre_pro">Precio</option>
                                    <!--<option class="opt__select--clasificar" value="Ofertas">Ofertas</option>-->
                                    <option class="opt__select--clasificar" value="Novedades">Novedades</option>
                                    </select>
                                </div>
                                <div class="container__ordenar item-form-ordenar">
                                    <label for="order-by">Ordenar</label>
                                    <select class="select__ordenar select-filtro"  name="ordenar" id="sort-by">
                                    <option class="opt__select--ordenar" value="ASC" selected="selected">ASC</option>
                                    <option class="opt__select--ordenar" value="DESC">DESC</option>
                                    </select>
                                </div>           
                            </div>
                            <div class="lista__titulo--filtro">
                                <h3>Marcas</h3>
                            </div>
                                                    
                                <ul class="lista__contenido--filtro" id="lista-contenido-filtro">
                                    <!--En code-->
                                </ul>
                                <div class="container__btn__filtro" id='container-btn-filtro'>
                                    
                                </div>
                        </form>
                    </div>
                </div>
                <!-- opciones del filtro -->
                <div class="column--75">
                    <h2 id="section-text">Resultados para: </h2>
                    <div class="product__section container--flex" id="product-list">
                        
                    </div>
                    <!-- PAGINATION -->
                    <div class="seccion__paginacion">                      
                        <ul class="pagination">
                            <div class="numeros__paginacion" id="num-paginacion">
                                <!--Encode-->
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--Main js-->   
    <script src="../Controller/search.js"></script>
    <script>var seach_url = '<?php echo htmlspecialchars($_GET["srch"]); ?>';</script>
</body>
</html>
