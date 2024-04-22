<?php
require '../config/config.php';


if (isset($_POST['Id'])) {
    $Id = $_POST['Id'];
    $token = $_POST['token'];
    $idcol = $_POST['Id_col'];


    $token_tmp = hash_hmac('sha1', $Id, KEY_TOKEN);


    if ($token == $token_tmp) {
        if (isset($_SESSION['carrito']['productos'][$Id])) {
            $_SESSION['carrito']['productos'][$Id] += 1;
        } else {
            $_SESSION['carrito']['productos'][$Id] = 1;
        }

        $datos['numero'] = count($_SESSION['carrito']['productos']);
        $datos['ok'] = true;
    } else {
        $datos['ok'] = false;
    }
} else {
    $datos['ok'] = false;
}

echo json_encode($datos);
?>