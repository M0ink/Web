<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    function enviarEmail($email, $asunto, $cuerpo) 
    {
        require_once './config/config.php';
        require './phpmailer/src/PHPMailer.php';
        require './phpmailer/src/SMTP.php';
        require './phpmailer/src/Exception.php';

    $mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_OFF;     //Enable verbose debug output
    $mail->isSMTP();
    $mail->HOST       = MAIL_HOST;          //Configure el servidor SMTP para envar
    $mail->SMTPAutch  = true;               //Habilita la autenticación SMTP
    $mail->Username   = MAIL_USER;          //Usuario SMTP
    $mail->Password   = MAIL_PASS;          //Contraseña SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Habilitar el cifrado TLS, checar configuración de servidor de correos
    $mail->Port       = MAIL_PORT;          //pUERTO TCP al que conectarse, si usa 587

    //correo emisor y nombre
    $mail->setFrom(MAIL_USER, 'CDP');
    //correo receptor y nombre
    $mail->addAddress($email);

    //contenido
    $mail->isHTML(true); //formato del correo
    $mail->Subject = $asunto;  //titulo

  
    $mail->Body    = utf8_decode($cuerpo);
    $mail->setLanguage('es', './phpmailer/language/phpmailer.lang-es.php');

    if($mail->send()){
        return true;
    }else {
        return false;
    }
} catch(Exception $e) {
    echo "No se pudo enviar el mesanje. Erro de envio: {$mail->ErrorInfo}";
    return false;
    exit;
}
    }
}
