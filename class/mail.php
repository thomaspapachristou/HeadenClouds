<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    class mail{
        // USING MAILTRAP.IO 
static function sendMail($recipient, $subject, $body){

    
    try {
        $mail = new PHPMailer(true);                                // true pour voir les erreurs false pour ne pas en voir
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.mailtrap.io';                     // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'f7b5a0d32fe169';                       // SMTP username
        $mail->Password   = 'bb06254d8cd55b';                       // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 2525;                                   // TCP port to connect to, use 465 for `PHPMailer::ENCRY

        //Set who the message is to be sent from
        $mail->setFrom('from@example.com', 'First Last');//osef
        //Set an alternative reply-to address
        $mail->AddAddress($recipient);
        //Set the subject line
        $mail->Subject = $subject;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->Body    = $body;
        return $mail->send();

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     }
   }
 }