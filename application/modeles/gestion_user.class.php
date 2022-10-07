<?php 
/**
 * Classe utilitaire de gestion de la Base de Données
 *
 */
class GestionUser {

/**
     * Objet de la classe PDO
     * @var PDO
     */
    private static $pdoCnxBase = null;

    /**
     * Objet de la classe PDOStatement
     * @var PDOStatement
     */
    private static $pdoStResults = null;
    private static $requete = ""; //texte de la requête
    private static $resultat = null; //résultat de la requête

// </editor-fold>
// <editor-fold defaultstate="collapsed" desc="Méthodes statiques">

    /**
     * Permet de se connecter à la base de données
     */
    public static function seConnecter() {

        if (!isset(self::$pdoCnxBase)) { //S'il n'y a pas encore eu de connexion
            try {
                self::$pdoCnxBase = new PDO('mysql:host=' . MysqlConfig::SERVEUR . ';dbname=' . MysqlConfig::BASE, MysqlConfig::UTILISATEUR, MysqlConfig::MOT_DE_PASSE);
                self::$pdoCnxBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //méthode de la classe PDO
                self::$pdoCnxBase->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); //méthode de la classe PDO
                self::$pdoCnxBase->query("SET CHARACTER SET utf8"); //méthode de la classe PDO
            } catch (Exception $e) {
                // l’objet pdoCnxBase a généré automatiquement un objet de type Exception
                echo 'Erreur : ' . $e->getMessage() . '<br />'; // méthode de la classe Exception
                echo 'Code : ' . $e->getCode(); // méthode de la classe Exception
            }
        }
    }

    public static function seDeconnecter() {
        self::$pdoCnxBase = null;
        //si on n'appelle pas la méthode, la déconnexion a lieu en fin de script
    }
    
     
    public static function getNbDataCenter() {
        self::seConnecter();

        self::$requete = "SELECT Count(*) AS nbDataCenter FROM datacenter";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        return self::$resultat->nbDataCenter;
    }

    public static function getNbClients() {
        self::seConnecter();

        self::$requete = "SELECT Count(*) AS nbClients FROM user where validate = '1'";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        return self::$resultat->nbClients;
    }
    
    public static function isClient($login, $passe) {
        self::seConnecter();

        self::$requete = "SELECT * FROM user where login=:login and pass=:pass";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('login', $login);
        self::$pdoStResults->bindValue('passe', sha1($passe));
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();

    }

    private static function getLesTuplesByTable($table) {
        self::seConnecter();

        self::$requete = "select * from $table ";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }


        /**
     * Retourne la liste des Catégories
     * @return type Tableau d'objets
     */
    public static function getLesUser() {
        return self::getLesTuplesByTable("user");
    }


public static function getLoginUserByMail($MailUser) {
        self::seConnecter();
        self::$requete = "SELECT * FROM user where user.mail = :mailUser";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('mailUser', $MailUser);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();
        self::$pdoStResults->closeCursor();
        return self::$resultat;
    }

}