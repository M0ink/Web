<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

  
        require '../phpmailer/src/PHPMailer.php';
        require '../phpmailer/src/SMTP.php';
        require '../phpmailer/src/Exception.php';

    $mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_OFF;     //Enable verbose debug output
    $mail->isSMTP();
    $mail->HOST       = MAIL_HOST;          //Configure el servidor SMTP para envar
    $mail->SMTPAutch  = true;               //Habilita la autenticación SMTP
    $mail->Username   = MAIL_USER;          //Usuario SMTP
    $mail->Password   = MAIL_PASS;          //Contraseña SMTP
    $mail->SMTPSecure = PHPMailer;          //Habilitar el cifrado TLS
    $mail->Port       = MAIL_PORT;          //pUERTO TCP al que conectarse, si usa 587

    //correo emisor y nombre
    $mail->setFrom(MAIL_USER, 'CDP');
    //correo receptor y nombre
    $mail->addAddress('contacto@codigos.com', 'Contacto CDP');
    //enciar copia correo
    $mail->addReplyTo('contacto@codigos.com');

    //contenido
    $mail->isHTML(true); //formato del correo
    $mail->Subject = 'Detalles de su pedido';  //titulo

    $cuerpo = "<h4>Gracias por registrarse</h4>";
    $cuerpo .= '<p>Te damos la bienvenida<b>' . $usuario . '</b></p>';

    $mail->body    = utf8_decode($cuerpo);
    $mail->AltBody = '...';

    $mai->setLanguage('es', '../phpmailer/language/phpmailer.lang-es.php');

    $mail->send();
} catch(Exception $e) {
    echo "No se pudo enviar el mesanje. Erro de envio: {$mail->ErrorInfo}";
}
