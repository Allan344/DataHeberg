<?php
$serveur_ftp="thorbeorn.fr";
$login_ftp="allan@thorbeorn.fr";
$mp_ftp='2-d$gXeT4;D@';

$ftp = ftp_connect($serveur_ftp, 21) or die("Couldn't connect to $ftp_server");

// Tentative d'identification
if (@ftp_login($ftp, $login_ftp, $mp_ftp)) {
    //echo "Connecté en tant que $login_ftp@$serveur_ftp\n";
} else {
    //echo "Connexion impossible en tant que $login_ftp\n";
}


$chemin_extraction="./cloud/6/";

?>