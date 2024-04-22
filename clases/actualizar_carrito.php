<?php

require '../config/config.php';
require '../config/database.php';

if (isset($_POST['action'])) {

    $action = $_POST['action'];
    $Id_prod = isset($_POST['Id_prod']) ? $_POST['Id_prod'] : 0;

    if($action == 'agregar'){
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
        $respuesta = agregar($Id_prod, $cantidad);
        if($respuesta>0){
            $datos['ok'] =  true;
        }  else {
            $datos['ok'] =  false;
        }
        $datos['sub'] = MONEDA . number_format($respuesta, 2, '.', ',');
    } else if($action == 'eliminar') {
        $datos['ok'] = eliminar($Id_prod);
    }
        else {
        $datos['ok'] =  false;
    }
} else {
    $datos['ok'] =  false;
}

echo json_encode($datos);

function agregar($Id_prod, $cantidad){

    $res = 0;
    if($Id_prod > 0 && $cantidad > 0 && is_numeric(($cantidad))){
        if(isset($_SESSION['carrito']['productos'][$Id_prod])){
            $_SESSION['carrito']['productos'][$Id_prod] = $cantidad;

            $db = new Database();
            $con = $db ->conectar();
            $sql = $con->prepare("SELECT precio FROM productos WHERE Id_prod=?");
            $sql ->execute([$Id_prod]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $precio = $row['precio'];
            $res = $cantidad * $precio;

            return $res;
        }
    } else{
        return $res;
    }

}

function eliminar($Id_prod){
    if($Id_prod > 0){
        if(isset($_SESSION['carrito']['productos'][$Id_prod])){
            unset($_SESSION['carrito']['productos'][$Id_prod]);
            return true;
        }
    } else {
        return false;
    }
}