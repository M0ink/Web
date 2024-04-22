<?php 

define("SITE_URL", "http://localhost:8080/Tienda");
define("KEY_TOKEN", "Kie.MAI_899*");
define("MONEDA", "$");

//datos para nevio de correo
define("MAIL_HOST", "smtp.gmail.com");
define("MAIL_USER", "kideicr@gmail.com");
define("MAIL_PASS", "HikaruxKaoru_2");
define("MAIL_PORT", "587");

session_start();
$C = 0;

if(isset($_SESSION['carrito']['productos'])){
    $C = count($_SESSION['carrito']['productos']);
}
?>