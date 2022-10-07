<?php
if(isset($_POST['signup'])){
$pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
$login = $_POST["lastname"];
$mailp = $_POST["mail"];
$validate = 0;

try
{
  $mysqlClient = new PDO('mysql:host=thorbeorn.fr;dbname=jnxwihwg_allan;charset=utf8', 'jnxwihwg_allan', 'b3747qTyPBbU');
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}

$stmt2 = $mysqlClient->prepare("SELECT MAX(id) AS mi FROM user");
$stmt2->execute();
$result2 = $stmt2 -> fetch();
$id = $result2["mi"]+1;
$hashm1 = openssl_random_pseudo_bytes(16);
$hashm =  bin2hex($hashm1);

$stmt1 = $mysqlClient->prepare("SELECT COUNT(mail) AS c FROM user");
$stmt1->execute();
$result1 = $stmt1 -> fetch();

$stmt = $mysqlClient->prepare("SELECT COUNT(mail) AS c FROM user WHERE mail = :email");
$stmt->bindParam(':email', $mailp);
$stmt->execute();
$result = $stmt -> fetch();

if($result["c"] > 0 && $result1["c"] > 0){
    $url="index.php?controleur=admin&action=AfficherInscription&error=mailExist";
}
else{
$sql = $mysqlClient->prepare("INSERT INTO user (id, login, pass, mail, validate,token) VALUES (:id,:login,:pass,:mail,:validate,:token)");
$sql->bindValue(':id', $id);
$sql->bindValue(':login', $login);
$sql->bindValue(':pass', $pass);
$sql->bindValue(':mail', $mailp);
$sql->bindValue(':validate', $validate);
$sql->bindValue(':token', $hashm);
$sql->execute();
$link = "https://aurelien.thorbeorn.fr/index.php?controleur=admin&action=VerifierConnexion&?u=".$mailp."&l=".$hashm;
    $url = "index.php?controleur=admin&action=AfficherLinked";
    $subject = "Veuillez verifier votre addresse mail !";
    $message = "Bonjour,"."\n"."Vous souhaitez accéder aux services en ligne de thorbeorn avec l'identifiant $login"."\n"."Afin de valider votre adresse mail, cliquez sur le lien ci-dessous et connectez-vous avec le mot de passe que vous avez choisi :"."\n"."$link"."\n"."En cas de problème, veuillez nous contacter pas le formulaire de https://aurelien.thorbeorn.fr/index.php?controleur=principal&action=afficherContact ."."\n"."Cordialement."."\n"."L'administrateur des services en ligne.";
    $headers = "From:" . "noreply@thorbeorn.fr";
    mail($mailp,$subject,$message,$headers);
}
}

$scriptTag = '<script type="text/javascript">window.location = "'.$url.'";</script>';
print $scriptTag;

