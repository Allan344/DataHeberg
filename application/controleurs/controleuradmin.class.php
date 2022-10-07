<?php

class ControleurAdmin {

    public function __construct() {
    }
    
    public function afficherConnexion() {
        require Chemins::VUES . 'v_connexion.inc.php';        
    }

    public function afficherInscription() {
        require Chemins::VUES . 'v_inscription.inc.php';        
    }
    
    public function afficherLinked(){
        require Chemins::VUES_ADMIN . 'linked.php';
    }

    public function afficherSignin() {
        require_once Chemins::VUES_ADMIN . 'signin.php';        
    }
    
    public function afficherSignup(){
        require Chemins::VUES_ADMIN . 'testsignup.php';
    }

    public function afficherDashboard() {
        require Chemins::VUES_CLIENT . 'v_dashboard.inc.php';        
    }
    
    public function afficherDashboardStockage() {
        require Chemins::VUES_CLIENT . 'v_dashboard_stockage.php';
    }

    public function afficherDashboardCorbeille() {
        require Chemins::VUES_CLIENT . 'v_dashboard_corbeille.php';
    }
    
    public function afficherMDPPerdu() {
        require Chemins::VUES_ADMIN . 'passwordLost.php';
    }
    
    public function afficherContact() {
        require chemins::VUES_ADMIN . 'v_contact.inc.php';
    }
    
    public function afficherException() {
        require chemins::VUES_ADMIN . 'Exception.php';
    }
    
    public function afficherPHPMailer() {
        require chemins::VUES_ADMIN . 'PHPMailer.php';
    }
    
    public function afficherSMTP() {
        require chemins::VUES_ADMIN . 'SMTP.php';
    }
    
    public function VerifierConnexion() {
        require Chemins::VUES_ADMIN . 'verification.php';
    }
    public function afficherLETEST(){
        require Chemins::VUES_ADMIN . 'signin2.php';
    }
    
}

?>
