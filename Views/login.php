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
    <link rel="stylesheet" href="../Views/css/estilos-login.css">
    <title>E-commerce</title>
    <!--Fuentes-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Condensed&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <main class="main__login">
        <div class="contenedor__formulario">
            <form class="form__login" action="../Model/user/login.php" method="POST">
                <h2 class="login__tittle">LOGIN</h2>
                <div class="correo__login">
                    <label for="id-correo" class="default__labelform">Correo:</label><br>
                    <input type="email" name="user_email" id="id-correo" class="inpt__correo input-default-form">
                </div>
                <div class="pass__login">
                    <label for="id-pass" class="default__labelform">Contraseña:</label><br>
                    <input type="password" name="user_pass" id="id-pass" class="inpt__pass input-default-form">
                </div>
                <?php
                    if(isset($_GET['e'])){
                        switch ($_GET['e']) {
                            case '1':
                                echo '<p class="error__item">Ops... Ha ocurrido un error con la conexión... intente más tarde. <i class="fas fa-skull-crossbones"></i></p>';
                                break;
                            case '2':
                                echo '<p class="error__item">Email inválido, intente otra vez. <i class="fas fa-skull-crossbones"></i></p>';
                                break;
                            case '3':
                                echo '<p class="error__item">Contraseña incorrecta, intente nuevamente. <i class="fas fa-skull-crossbones"></i></p>';
                                break;
                            case '4':
                                echo '<p class="warning__item">Debe completar con sus credenciales. <i class="fas fa-exclamation-triangle"></i></p>';
                                break;    
                            default:
                                break;
                        }
                    }
                ?>
                <button class="btn__send" id="btn-send-login" type="submit">Enviar <i class="fas fa-sign-in-alt"></i></button>
                <div class="register__now">
                    <p class="no__account">¿No tienes una cuenta? <a href="" class="no__account__link"> registrese ahora</a></p>
                </div>
            </form>
        </div>
    </main>
    
</body>
</html>