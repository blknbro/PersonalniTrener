<?php

function redirect($path)
{
    header("Location:" . ROOT . "/" . $path);
    die;
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

function sendMail(){
//    $mail = new PHPMailer(true);
//
//    try {
//        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
//        $mail->isSMTP();
//        $mail->Host = 'mail.nm.stud.vts.su.ac.rs';
//        $mail->SMTPAuth = true;
//        $mail->Username = 'nm';
//        $mail->Password = 'u76tVYucyaaf3lI';
//        $mail->SMTPSecure = 'tls';
//        $mail->Port = 587;
//        $mail->setFrom('nm@nm.stud.vts.su.ac.rs', 'Webmaster');
//        $mail->addAddress('duledule17113@gmail.com');
//        $mail->isHTML(true);
//        $mail->Subject = 'Neuspeh';
//        $mail->Body = '<h1>Došlo do još jednog neuspešnog prijavljivanja.</h1>';
//        $mail->AltBody = 'Došlo do još jednog neuspešnog prijavljivanja.';
//        $mail->send();
//        header("Location:index.php?error=Invalid user!");
//    } catch (Exception $e) {
//        echo "Message could not be sent. Mailer error {$mail->ErrorInfo}";
//    }
}