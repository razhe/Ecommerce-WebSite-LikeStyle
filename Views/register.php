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
    <link rel="stylesheet" href="../Views/css/estilos-register.css">
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
    <main class="register__section">
        <div class="contenedor__registro">
            <div class="contenedor__titulo--registro">
                <h2 class="titulo__registro">REGISTRO</h2>
            </div>
            <div class="contenedor__form__registro">
                <form action="" class="form__registro">
                    <div class="nom__app--registro">
                        <div class="nom__section--registro column--50 container-adapt"><label for="nom-id">Nombre</label><br><input class="nombre__inpt--register" type="text" name="nombre" id="nom-id"></div>
                        <div class="app__section--registro column--50 container-adapt"><label for="app-id">Apellido</label><br><input class="app__inpt--register"  type="text" name="apellido" id="app-id"></div>
                    </div>
                    
                    <div class="ema__section--registro"><label for="ema-id">Correo</label><br><input class="nombre__correo--register" type="email" name="email" id="ema-id"></div>
                    <div class="pass__section--registro"><label for="pass-id">Contraseña</label><br><input class="pass__inpt--register" type="password" name="contraseña" id="pass-id"></div>
                    <div class="phone__section--registro"><label for="phone-id">Telefono / celular</label><br><input class="phone__inpt--register" type="number" name="telefono" id="phone-id"></div>
                    <input class="inpt__enviar--registro" type="submit" value="Enviar">
                </form>
                <div class="txt__container--registro">
                    <p class="txt__registrado">¿Ya estas registrado?</p><a class="link__registrado" href="login.php">Inicia sesión aquí</a>
                </div>                
            </div>
        </div>
    </main>
    
</body>
</html>