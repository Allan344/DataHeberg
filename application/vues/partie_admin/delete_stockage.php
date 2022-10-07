<?php
require_once '../../../configs/chemins.class.php';
include '../../../configs/ftp_config.class.php';
$idUser=($_GET['iduser']);
$type=($_GET['type']);

if(isset($_GET['directory'])){
    $cheminstock = 'cloud/'.$idUser.'/stockage'.'/'.$_GET['directory'].'/';
    $chemincorbeille = 'cloud/'.$idUser.'/corbeille'.'/'.$_GET['directory'].'/';
}
else{
    $cheminstock = 'cloud/'.$idUser.'/stockage'.'/';
    $chemincorbeille = 'cloud/'.$idUser.'/corbeille'.'/';
}



if(isset($_GET['action'])){
    if($_GET['action'] == 'tocorbeille'){
     if(isset($_GET['idfile'])){
        $i = ($_GET['idfile'])-1;
        $n = 0;

        //$files = scandir($cheminstock);
            $filesFTP = ftp_nlist($ftp,$cheminstock);
            foreach($filesFTP as $fileFTP) { 
                // var_dump($fileFTP['name']);
                // $path_parts =pathinfo($file);
                    $detaillisteFTP = ftp_mlsd($ftp,$cheminstock);
                    $detailfileFTP= $detaillisteFTP[$n];
                    $namefile = $detailfileFTP['name'];
                    if($detailfileFTP['type']=='file' or $detailfileFTP['type']=='dir'){
                    if($i == $n){
                            //move_uploaded_file($file, "corbeille/".$file);
                            //unlink($file);

                            
                            //$namefile = strtok($fileFTP,'/');

                            // rename($fileFTP,'cloud/'.$idUser.'/corbeille'.'/'.$namefile);
                            // ftp_rename($ftp,'cloud/'.$idUser.'/stockage'.'/'.$namefile,'cloud/'.$idUser.'/corbeille'.'/'.$namefile);
                            if($type=='file'){
                            ftp_rename($ftp,$cheminstock.$namefile,'cloud/'.$idUser.'/corbeille'.'/'.$namefile);
                            }
                            elseif($type=='dir'){
                            ftp_rename($ftp,$fileFTP,'cloud/'.$idUser.'/corbeille'.'/'.$namefile);
                            }
                            $url = '../../../index.php?controleur=admin&action=afficherDashboardStockage&delete=sucess';
                            break;
                    }
                    else{
                        $url = '../../../index.php?controleur=admin&action=afficherDashboardStockage&delete=error&id=5';
                    }
                }
                    else{
                        $url = '../../../index.php?controleur=admin&action=afficherDashboardStockage&delete=error&id=1';
                    }
                    $n++;
            }
        } 
        else{
            $url = '../../../index.php?controleur=admin&action=afficherDashboardStockage&delete=error&id=2';
        }
    }

    else if($_GET['action'] == 'delete'){
        if(isset($_GET['idfile'])){
            $i = ($_GET['idfile'])-1;
            $n = 0;
    
//Rajouter if pour savoir si i=nom == n=nom

            //$files = scandir($chemincorbeille);
            $filesFTP = ftp_nlist($ftp,$chemincorbeille);
                foreach($filesFTP as $fileFTP) { 
                    //$path_parts =pathinfo($file);
                    // $detaillisteFTP = ftp_mlsd($ftp,'cloud/'.$idUser.'/corbeille'.'/');
                    // $detailfileFTP= $detaillisteFTP[$n];
                    
                        if($i == $n){
                            if($type=='file'){
                                ftp_delete($ftp,$fileFTP);
                            }
                            elseif($type=='dir'){
                                ftp_rmdir($ftp,$fileFTP);
                            }
                                
                                //unlink($chemincorbeille.'/'.$fileFTP);
                                $url = '../../../index.php?controleur=admin&action=afficherDashboardCorbeille&delete=sucess';
                                break;
                        }
                        else{
                            $url = '../../../index.php?controleur=admin&action=afficherDashboardCorbeille&delete=error&id=1';
                        }
                    $n++;
                }
            } 
            else{
                $url = '../../../index.php?controleur=admin&action=afficherDashboardCorbeille&delete=error&id=2';
            }
    }
    else{
        $url = '../../../index.php?controleur=admin&action=afficherDashboardCorbeille&delete=error&id=3';  
}
}
    
        $scriptTag = '<script type="text/javascript">window.location = "'.$url.'";</script>';
        print $scriptTag;
?>