<!DOCTYPE html>
<?php
require_once 'configs/chemins.class.php';//chemins permet de rediriger
require_once Chemins::CONFIGS . 'config.class.php';//config.class.php contient la BDD à laquelle on va se connecter pour la connexion, inscription,etc
require_once Chemins::CONFIGS . 'config2.class.php';//config2.class.php contient la BDD à laquelle on va se connecter pour l'affichage du status des services
require_once Chemins::CONFIGS . 'mysql_config.class.php';//mysql_config.class.php permet de se connecter à la BDD sur heidisql
require_once Chemins::MODELES . 'gestion_user.class.php';

require Chemins::VUES_PERMANENTES . 'v_header.inc.php';//permet d'importer le header dans l'index
require_once Chemins::CONTROLEURS . 'controleurprincipal.class.php'; //controleurprincipal va permettre de rediriger vers 


require_once Chemins::CONFIGS . 'variables_globales.class.php';


if (!isset($_REQUEST['controleur'])) { //si le controleur n'est pas récupéré, redirection vers l'accueil du site
    require_once(Chemins::VUES . "v_accueil.inc.php");
} else {
    $action = $_REQUEST['action']; //récupère le nom de l'action exemple:afficherConnexion

    $classeControleur = 'controleur' . $_REQUEST['controleur']; //récupère le nom du controleur qui est demandé par l'utilisateur par exemple: Admin
    $fichierControleur = $classeControleur . ".class.php"; //retourne le nom du controleur correspondant par exemple: controleurAdmin.class.php
    require_once(Chemins::CONTROLEURS.$fichierControleur); //lecture du controleur
    $objetControleur = new $classeControleur(); 
    $objetControleur->$action(); //execute l'action correspondante du controleur
}

require Chemins::VUES_PERMANENTES . 'v_footer.inc.php';
?>



 

 