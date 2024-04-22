<?php
require '../config/config.php';


if (isset($_POST['Id'])) {
    $Id = $_POST['Id'];
    $token = $_POST['token'];
    $num = $_POST['num'];
    //$idcol = $_POST['Id_col'];


    $token_tmp = hash_hmac('sha1', $Id, KEY_TOKEN);


    if ($token == $token_tmp) {
        if (isset($_SESSION['carrito']['productos'][$Id])) {
            $_SESSION['carrito']['productos'][$Id]['num'] += min($num, 10);
        } else {
            $_SESSION['carrito']['productos'][$Id] = array(
                'num' => min($num, 10),
            );
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

