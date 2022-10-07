<?php
include '../../../configs/ftp_config.class.php';
$idUser=$_GET['iduser'];

if(isset($_GET['directory'])){
    $cheminstock = 'cloud/'.$idUser.'/stockage'.'/'.$_GET['directory'].'/';
    $chemincorbeille = 'cloud/'.$idUser.'/corbeille'.'/'.$_GET['directory'].'/';
}
else{
    $cheminstock = 'cloud/'.$idUser.'/stockage'.'/';
    $chemincorbeille = 'cloud/'.$idUser.'/corbeille'.'/';
}


// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // // Vérifie si le fichier a été uploadé sans erreur.
     if(isset($_FILES["file"])){
         //Region 
    //     $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
    //     $filename = $_FILES["file"]["name"];
    //     $filetype = $_FILES["file"]["type"];
    //     $filesize = $_FILES["file"]["size"];

        // // Vérifie l'extension du fichier
        // $ext = pathinfo($filename, PATHINFO_EXTENSION);
        // if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

        // // Vérifie la taille du fichier - 5Mo maximum
        // $maxsize = 5 * 1024 * 1024;
        // if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

        // Vérifie le type MIME du fichier
//endregion
            // Vérifie si le fichier existe avant de le télécharger.
            if(file_exists($cheminstock .'/'. $_FILES["file"]["name"])){
                $url = '../../../index.php?controleur=admin&action=afficherDashboardStockage&ajout=error';
            } else{
                //move_uploaded_file($_FILES["file"]["tmp_name"], $cheminstock . '/' . $_FILES["file"]["name"]);
                if(ftp_put($ftp,$cheminstock.$_FILES["file"]["name"], $_FILES["file"]["name"], FTP_ASCII)){
                    $url = '../../../index.php?controleur=admin&action=afficherDashboardStockage&ajout=sucess';
                }
                else{
                    $url = '../../../index.php?controleur=admin&action=afficherDashboardStockage&ajout=errors';
                }
            } 
        }
        else{
            $url = '../../../index.php?controleur=admin&action=afficherDashboardStockage&ajout=errors';
        }
    } else{
        $url = '../../../index.php?controleur=admin&action=afficherDashboardStockage&ajout=errors';
    }

    $scriptTag = '<script type="text/javascript">window.location = "'.$url.'";</script>';
print $scriptTag;
?>