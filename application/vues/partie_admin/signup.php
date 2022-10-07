<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'require/Exception.php';
require 'require/PHPMailer.php';
require 'require/SMTP.php';

function generateRandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

$login = $_POST["login"];
$pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
$lastname = $_POST["lastname"];
$mailp = $_POST["mail"];


try
{
  //mdp
  $mysqlClient = new PDO('mysql:host=thorbeorn.fr;dbname=jnxwihwg_allan;charset=utf8', 'jnxwihwg_allan', 'b3747qTyPBbU');
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}
$stmt2 = $mysqlClient->prepare("SELECT MAX(id) AS mi FROM user");
$stmt2->execute();
$result2 = $stmt2 -> fetch();

$stmt1 = $mysqlClient->prepare("SELECT COUNT(mail) AS c FROM user");
$stmt1->execute();
$result1 = $stmt1 -> fetch();

$stmt = $mysqlClient->prepare("SELECT COUNT(mail) AS c FROM user WHERE mail = :email");
$stmt->bindParam(':email', $mailp);
$stmt->execute();
$result = $stmt -> fetch();

$url = '';
if($result["c"] > 0 && $result1["c"] > 0){
  $url = "https://www.thorbeorn.fr/Inscription/index.php?error=mailExist";
} else {
  $sql = "INSERT INTO user (id, login, pass, mail, validate) VALUES (?,?,?,?,?)";
  $mysqlClient->prepare($sql)->execute([$result2["mi"]+1, $lastname, $mailp, $pass]);
  $link = "http://www.thorbeorn.fr/Inscription/verification.php?u=".$mailp."&l=".$hashm;
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
    $mail->addAddress($mailp);

    $mail->isHTML(true);                                 
    $mail->Subject = "Veuillez verifier votre addresse mail !";
    $mail->Body    = "Bonjour,</br></br>vous souhaitez accéder aux services en ligne de thorbeorn avec l'identifiant $mailp.</br>Afin de valider votre adresse mail, cliquez sur le lien ci-dessous et connectez-vous avec le mot de passe que vous avez choisi :</br><a href='$link'>$link</a></br></br>En cas de problème, veuillez nous contacter pas le formulaire de <a href='http://thorbeorn.fr/'>contact</a>.</br></br>Cordialement.</br>L'administrateur des services en ligne.</p>";

    $mail->send();
    $url = "http://www.thorbeorn.fr/Inscription/linked.html";
  } catch (Exception $e) {
    die("Votre mail ne peut pas être envoyer. Mail erreur: {$mail->ErrorInfo}");
  }
}

$scriptTag = '<script type="text/javascript">window.location = "'.$url.'";</script>';
print $scriptTag;