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
                <h2 id="section-text">Resultados para: </h2>
            </div>
            <div class="product__section container--flex" id="product_mts_list">
                <!--En conde...-->
            </div>
        </div>
    </main>
    <!--Main js-->   
    <script src="../Controller/search.js"></script>
    <script>var seach_url = '<?php echo htmlspecialchars($_GET["srch"]); ?>';</script>
</body>
</html>
