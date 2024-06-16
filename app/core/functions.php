<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function redirect($path)
{
    header("Location:" . ROOT . "/" . $path);
    die;
}

function now(): string
{
    return (new DateTime())->format('Y-m-d H:i:s');
}

function createToken(int $length): ?string
{
    try {
        return bin2hex(random_bytes($length));
    } catch (\Exception $e) {
        // c:xampp/apache/logs/
        error_log("****************************************");
        error_log($e->getMessage());
        error_log("file:" . $e->getFile() . " line:" . $e->getLine());
        return null;
    }
}

function sendMail(string $email, string $action, $token)
{
    $mail = new PHPMailer(true);
    $link = $action === 'activate' ? ROOT . "/activate?token=" . $token : ROOT . "/reset?token=" . $token;

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
//        $mail->Host = 'mail.nm.stud.vts.su.ac.rs';
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
//        $mail->Username = 'nm';
//        $mail->Password = 'u76tVYucyaaf3lI';
        $mail->SMTPSecure = 'tls';
//        $mail->Port = 587;
        $mail->Port = 2525;
        $mail->Username = '57d4b84238770b';
        $mail->Password = 'aa9bb4c650ae89';
        $mail->setFrom('nm@nm.stud.vts.su.ac.rs', 'Webmaster');
        $mail->addAddress('duledule17113@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = $action === 'activate' ? "Activate your account" : "Reset your password";
        $mail->Body = ($action === 'activate') ? "<h1>To activate your account please click <a href='$link'>here</a>.</h1>" : "<h1>To reset your password please click <a href='$link'>here</a>.</h1>";
        $mail->AltBody = 'Došlo do još jednog neuspešnog prijavljivanja.';
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer error {$mail->ErrorInfo}";
    }
}