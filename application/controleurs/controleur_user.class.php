<?php
class ControleurUser {

    public function __construct() {
    }

    public function afficher() {
        $lesUsers = GestionUser::getLesUser();
    }

}

?>