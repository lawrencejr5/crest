<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "../../../phpMailer/src/PHPMailer.php";
include "../../../phpMailer/src/SMTP.php";
include "../../../phpMailer/src/Exception.php";

class Mailer
{
    function sendMyMail($toEmail, $toName, $subject, $body)
    {
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'server212.web-hosting.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'support@yfincs.com';                     //SMTP username
        $mail->Password   = 'Yield123##00';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->setFrom('support@yfincs.com', 'Crest-Asset Trading');
        $mail->addReplyTo('support@yfincs.com', 'Crest-Asset Trading');
        $mail->addAddress($toEmail, $toName);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->IsHTML(true);
        try {
            ob_end_clean();
            if ($mail->send()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->errorMessage();
        }
    }
}
$mailer = new Mailer();
// $mailer->sendMyMail('oputalawrence@gmail.com', 'ify', "verify email", '12345678');
