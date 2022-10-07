<?php
$database = include Chemins::CONFIGS . 'config.class.php';
session_start();
if(isset($_SESSION['mail'])){
    $mailp = $_SESSION["mail"];
    $pass = ($_SESSION["pass"]);
}else{
    $mailp = $_POST["mail"];
    $pass = ($_POST["pass"]);
}
try
{
  $mysqlClient = new PDO('mysql:host='.$database['host'].';dbname='.$database['name'].';charset=utf8', $database['user'], $database['pass']);
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}

$stmt = $mysqlClient->prepare("SELECT pass, validate FROM user WHERE (mail = :email)");
$stmt->bindParam(':email', $mailp);
$stmt->execute();
$result = $stmt -> fetch();

if(isset($_SESSION['mail'])){
    if(isset($result["pass"])){
        if($result["pass"] == $_SESSION['pass']){
            $url = "index.php?controleur=admin&action=afficherDashboard";
        }else{
            session_destroy();
            setcookie('mail', $mailp, time() - 365*24*3600);
            setcookie('pass', $result["pass"], time() - 365*24*3600);
            $url = $database["url"]."/Connexion/connexion.php?error=3";
        }
    }else{
        session_destroy();
        setcookie('mail', $mailp, time() - 365*24*3600);
        setcookie('pass', $result["pass"], time() - 365*24*3600);
        $url = $database["url"]."/Connexion/connexion.php?error=3";
    }
}else{
    if(isset($result["pass"])){
        if (password_verify($pass, $result["pass"])) {
            if($result["validate"] == 1){
                if(isset($_POST["rmm"])){
                    setcookie('mail', $mailp, time() + 365*24*3600);
                    setcookie('pass', $result["pass"], time() + 365*24*3600);
                    $_SESSION['mail'] = $mailp;
                    $_SESSION['pass'] = $result["pass"];
                    $url = "index.php?controleur=admin&action=afficherDashboard";
                }else{
                    $_SESSION['mail'] = $mailp;
                    $_SESSION['pass'] = $result["pass"];
                    $url = "index.php?controleur=admin&action=afficherDashboard";
                }
            }else{
                $url = $database["url"]."/Connexion/not-verified.php";
            }
        } else {
            $url = $database["url"]."/Connexion/connexion.php?error=2";
        }
    }else{
        $url = "/Connexion/connexion.php?error=1";
    }
}
echo $_SESSION['mail'];
echo $_SESSION['pass'];
echo $url;
$scriptTag = '<script type="text/javascript">window.location = "'.$url.'";</script>';
print $scriptTag;