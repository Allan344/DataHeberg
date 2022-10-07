<?php
if(!isset($_POST["name"])){
  die("Votre nom n'est pas correct !");
}
if(!isset($_POST["email"])){
  die("Votre email n'est pas correct !");
}
if(!isset($_POST["subject"])){
  die("Votre email n'est pas correct !");
}
if(!isset($_POST["message"])){
  die("Votre message n'est pas correct !");
}

use PHPMailer;
use SMTP;
use Exception;

require 'index.php?controleur=admin&action=afficherException';
require 'index.php?controleur=admin&action=afficherPHPMailer';
require 'index.php?controleur=admin&action=afficherSMTP';

$mail = new PHPMailer(true);

try {
  $mail->ajax = true;
  $mail->CharSet = 'UTF-8';
  $mail->SetLanguage('fr','require/language/');
  $mail->isSMTP();                                     
  $mail->Host       = 'mail.thorbeorn.fr';                
  $mail->SMTPAuth   = true;                                  
  $mail->Username   = 'noreply@thorbeorn.fr';                     
  $mail->Password   = 'dylanllodradu64230';                          
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
  $mail->Port       = 465;                                 

  $mail->setFrom('noreply@thorbeorn.fr');
  $mail->addAddress('contact@thorbeorn.fr');

  $mail->isHTML(true);                                 
  $mail->Subject = "Vous avez reçu un nouveau message dans le formulaire de contact";
  $mail->Body    = '<ul><li>Vous avez reçu un nouveau message depuis le formulaire de contact :</li><li><b>Nom: </b>'.htmlspecialchars($_POST["name"]).'</li><li><b>Mail: </b>'.htmlspecialchars($_POST["email"]).'</li><li><b>Sujet: </b>'.htmlspecialchars($_POST["subject"]).'</li><li><b>Message: </b>'.htmlspecialchars($_POST["message"]).'</li></ul>';
  $mail->AltBody = 'Nom: '.htmlspecialchars($_POST["name"]).'/Mail: '.htmlspecialchars($_POST["email"]).'/Sujet: '.htmlspecialchars($_POST["subject"]).'/Message: '.htmlspecialchars($_POST["message"]);

  $mail->send();
  echo 'OK';
} catch (Exception $e) {
  die("Votre mail ne peut pas être envoyer. Mail erreur: {$mail->ErrorInfo}");
}
?>