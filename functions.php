<?php 

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function debug ($errors) {

    echo '<span class="d-block p-2 bg-dark text-red" style="position: relative; top : 10%; color: aliceblue;">'. print_r($errors, true).'</span>';
}

function string_random ($length) {
   $alphaNum = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";

   return substr(str_shuffle(str_repeat($alphaNum, $length)), 0, $length);
}

function alert_access() {

    if (session_status () == PHP_SESSION_NONE) {
        session_start();
    }

    if(!isset($_SESSION['auth'])) {
        $_SESSION['flash']['danger'] = "Vous ne pouvez pas accéder à cette page !";
        header('Location: connexion.php');
        exit();

    }
}

function verification_cookie() {

    if (session_status () == PHP_SESSION_NONE) {
        session_start(); }

// Vérification si l'utilisateur a des cookies en mémoire
  if(isset($_COOKIE['remember']) && !isset($_SESSION['auth'])) {
    require_once 'db/DB.php';
        if(!isset($pdo)) {
            global $pdo;
        }
    $remember_token = $_COOKIE['remember'];
 // On réalise l'inverse de la création des cookies pour récupérer les données cryptées   
    $partsCookie = explode('==', $remember_token);
    $user_id = $partsCookie[0];
    $request = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $request->execute([$user_id]);
// Récupération des données de $user ...    
    $user = $request->fetch();

    if($user) {
      $expectedCookie = $user_id . '==' . $user->remember_token . sha1($user_id . 'wolfouf' );
      
      if($expectedCookie == $remember_token) {
        session_start();
        $_SESSION['auth'] = $user;
        $_SESSION['flash']['success'] = 'Vous étiez déjà connecté ... Tentative de reconnexion en cours, veuillez actualiser.';
        setcookie('remember', $remember_token, time() + 60 * 60 * 24 * 7);   
    } else {
        setcookie('remember', null, -1);
    }
      } else {
          setcookie('remember', null, -1);
      }
    }
  }


// USING MAILTRAP.IO 
function sendMail($recipient, $subject, $body){

    
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