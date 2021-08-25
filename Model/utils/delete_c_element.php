<?php

    session_start();
    $arreglo = $_SESSION['carrito'];
    for($i=0;$i<count($arreglo);$i++){
        if ($arreglo[$i]['id'] != $_POST['id']) {
            $arregloNuevo[] = array(
                'id' => $arreglo[$i]['id'],
                'nombre' => $arreglo[$i]['nombre'],
                'precio' => $arreglo[$i]['precio'],
                'imagen' => $arreglo[$i]['imagen'],
            );
        }
    }
    if (isset($arregloNuevo)) {
        $_SESSION['carrito']=$arregloNuevo;
    }else{
        // quiere decir que el registro a eliminar era el unico
        unset($_SESSION['carrito']);
    }
    echo "listo";
?>