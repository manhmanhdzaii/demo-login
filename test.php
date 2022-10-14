<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


include "mail/PHPMailer/src/PHPMailer.php";
include "mail/PHPMailer/src/Exception.php";
include "mail/PHPMailer/src/SMTP.php";




function send_mail($email, $title, $body)
{
    $mail =  new PHPMailer(true);
    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'manhtb1982@gmail.com';
        $mail->Password = 'dmftnsicklaxxfxj';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        //Recipients
        $mail->setFrom('manhtb1982@gmail.com', 'Web by Manh');
        $mail->addAddress($email);
        //Content
        $mail->isHTML(true);
        $mail->CharSet = "UTF-8";
        $mail->Subject =  $title;
        $mail->Body    = $body;
        return $mail->send();
    } catch (Exception $e) {
        die($e->errorMessage());
        // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
$a = send_mail('manhtb1982000@gmail.com', 'Đăng ký tài khoản thành công', 'Đăng ký thành công');