<?php

class ControleurPrincipal {

    public function __construct() {
    }

    public function afficherAccueil() {
        require_once Chemins::VUES . 'v_accueil.inc.php';        
    } 
    
    public function afficherFAQ() {
        require_once Chemins::VUES . 'v_FAQ.inc.php';        
    }    
    public function afficherMention() {
        require Chemins::VUES . 'v_Mention-legale.inc.php';        
    }
    public function afficherContact() {
        require Chemins::VUES . 'v_Nous-contacter.inc.php';        
    }
    public function afficherPropos() {
        require Chemins::VUES . 'v_aPropos.inc.php';        
    }
    public function afficherCondition() {
        require Chemins::VUES . 'v_cguCgv.inc.php';        
    }
    public function afficherPolitiqueConf() {
        require Chemins::VUES . 'v_politiqueconfidentialite.inc.php';        
    }
    public function afficherStatutService() {
        require Chemins::VUES . 'v_statutservice.inc.php';        
    }
}

?>
