<?php
    //error 1 error de conexion
    //email 2 invalido
    //contraseña 3 incorrecta
    //4 sin credenciales
    include('../_conexion.php');
    $user_email=$_POST['user_email'];
    $user_pass=$_POST['user_pass'];
    $sql="select * from USUARIO where ema_usu='$user_email'";
    $result=mysqli_query($connection, $sql);
    if ($result == true) {
        $row=mysqli_fetch_array($result);
        $count=mysqli_num_rows($result);
        if ($user_pass != null and $user_email != null) {
            if ($count!=0) {
                if ($row['pass_usu'] != $user_pass) {
                    header('Location: ../../views/login.php?e=3');
                }else{
                    //Iniciamos las variables de sesion
                    session_start();
                    //Asignamos a las variables de sesion los datos de la consulta
                    $_SESSION['codusu'] = $row['cod_usu'];
                    $_SESSION['emausu'] = $row['ema_usu'];
                    $_SESSION['nomusu'] = $row['nom_usu'];
                    header('Location: ../../views/checkout.php');
                }
            }else{
                header('Location: ../../views/login.php?e=2');
            }
        }else{
            header('Location: ../../views/login.php?e=4');
        }
    }else{
        header('Location: ../../views/login.php?e=1');
    }
?>