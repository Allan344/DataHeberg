<?php
require Chemins::VUES_CLIENT . 'v_dashboard_header.inc.php';
?>

<div class="content-body" style="padding-top:4%;">
    <!-- row -->
    <div class="container-fluid" style="padding-right:0px;padding-left:0px;padding-top:1%;">

        <?php
            if (isset($_GET['ajout']) OR isset($_GET['delete'])) {?>
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>
                        <?php 
                            //REPONSE D'AJOUT DE FICHIER
                    if (isset($_GET['ajout']) and $_GET['ajout'] == 'error') {
                        echo '<p>Ce fichier existe déjà</p>';
                    }
                    elseif (isset($_GET['ajout']) and $_GET['ajout'] == 'sucess') {
                        echo '<p>Ce fichier à bien été ajouté</p>';
                    }
                    elseif (isset($_GET['ajout']) and $_GET['ajout'] == 'errors') {
                        echo "<p>Impossible d'ajouter ce fichier</p>";
                    }

                    //REPONSE DE SUPPRESION DE FICHIER
                    elseif (isset($_GET['delete']) and $_GET['delete'] == 'sucess') {
                        echo '<p>Ce fichier à bien été supprimé</p>';
                    }
                    elseif (isset($_GET['delete']) and ($_GET['delete'] == 'error' or $_GET['delete'] == 'errors')) {
                        echo "<p>Impossible de supprimer ce fichier</p>";
                    }


                    ?>
                    </h4>
                    <p class="mb-0">
                    </p>
                </div>
            </div>
        </div>
        <?php } ?>
        <!--
            <form action="<?php echo Chemins::VUES_ADMIN . 'upload_stockage.php'?>"
                                            method="post" enctype="multipart/form-data">
                                            <input type="file" name="file" id="fileUpload" class="btn pl-5 pr-5 mb-4">
                                            <input type="submit" name="submit" value="Ajouter"
                                                class="btn btn-primary pl-5 pr-5 mr-3 mb-4">
                                        </form>
        
        <div class="row" id="listes">
            <div class="col-lg-6 card" style="padding-left:0%" ;>
                <form action="<?php echo Chemins::VUES_ADMIN . 'upload_stockage.php'?>" method="post"
                    enctype="multipart/form-data">
                    <h2>Ajouter un Fichier</h2>
                    <label for="fileUpload"></label>
                    <input type="file" name="file" id="fileUpload">
                    <input type="submit" name="submit" value="Ajouter">
                </form>
            </div>
        </div> -->
        <div class="row" id="listes">
            <div class="col-lg-6" style="padding-left:0%; width:100%" ;>
                <div>
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="min-height:350px;">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" onChange='checkall.update(this)'></th>
                                        <th>Type</th>
                                        <th>Nom</th>
                                        <th>Extension</th>
                                        <th>Taille</th>
                                        <th>Date
                                            <div class="card col-lg-4" id="addcard"
                                                style="position:absolute; display: none;">
                                                <div class="col-lg-12">
                                                    <div class="card-body">
                                                        <div class="profile-statistics">
                                                            <div class="text-center mt-4 border-bottom-1 pb-3">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h3 class="m-b-0">Ajouter un fichier</h3>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="mt-4 col">
                                                                            <?php
                                                                        if(isset($_GET['directory'])){?>
                                                                            <form
                                                                                action="<?php echo Chemins::VUES_ADMIN . 'upload_stockage.php?directory='.$_GET['directory'].'&iduser='.$idUser?>"
                                                                                method="post"
                                                                                enctype="multipart/form-data">
                                                                                <label for="fileUpload"></label>
                                                                                <input type="file" name="file"
                                                                                    id="fileUpload"
                                                                                    class="btn pl-5 pr-5 mb-4">
                                                                                <input type="submit" name="submit"
                                                                                    value="Ajouter"
                                                                                    class="btn btn-primary pl-5 pr-5 mb-4">
                                                                            </form><?php
                                                                        }
                                                                        else{?>
                                                                            <form
                                                                                action="<?php echo Chemins::VUES_ADMIN . 'upload_stockage.php?iduser='.$idUser?>"
                                                                                method="post"
                                                                                enctype="multipart/form-data">
                                                                                <label for="fileUpload"></label>
                                                                                <input type="file" name="file"
                                                                                    id="fileUpload"
                                                                                    class="btn pl-5 pr-5 mb-4">
                                                                                <input type="submit" name="submit"
                                                                                    value="Ajouter"
                                                                                    class="btn btn-primary pl-5 pr-5 mb-4">
                                                                            </form>
                                                                            <?php
                                                                        }?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </th>
                                        <th>Heure</th>
                                        <th><input type="image" src="<?php echo Chemins::ICONES . 'plus.png';?>"
                                                alt="Info" onchange="moreinfo($i)" id="addfile" style="width: 25px;">
                                            <script>
                                            add = document.getElementById('addfile');
                                            add.addEventListener("click", () => {
                                                if (getComputedStyle(addcard).display != "none") {
                                                    addcard.style.display = "none";
                                                } else {
                                                    addcard.style.display = "block";
                                                }
                                            })
                                            </script>
                                        </th>
                                    </tr>
                                </thead>
                                <script>
                                var checkall = (function() {
                                    return {
                                        update: function(t) {
                                            if ($(t).is(':checked')) {
                                                $('input[type=checkbox]').prop('checked', true);
                                            } else {
                                                $('input[type=checkbox]').prop('checked', false);
                                            }
                                        }
                                    }
                                })();
                                <?php $i =0; ?>
                                let i = <?php echo($i) ?>;
                                let togg = null;
                                let div = null;
                                let ntogg = null;
                                let ndiv = null;
                                </script>
                                <tbody><?php 
                                                //$files = scandir($cheminstock);

                                                    $filesFTP = ftp_nlist($ftp,$cheminstock);
                                                    foreach($filesFTP as $fileFTP) {  
                                                        //$taillefilestock = filesize($chemincorbeille.'/'.$fileFTP);
                                                         //$path_parts =pathinfo($file);

                                                         $detaillisteFTP = ftp_mlsd($ftp,$cheminstock);
 
                                                         $detailfileFTP= $detaillisteFTP[$i];
                                                         $namefile = strtok($detailfileFTP['name'],'.');
                                                         $extensionfile = strtok( '' ); 
                                                         $i++;
                                                             
                                                         //a changer en dessous pour enlever fichier invisible
                                                         //if(empty($path_parts['filename']) or empty($path_parts['extension'])){
                                                         //}
                                                         if($detailfileFTP['type']=='file' or $detailfileFTP['type']=='dir'){
                                                             ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="checkbox">&nbsp;&nbsp;
                                        </td>
                                        <td>
                                            <?php
                                         if($detailfileFTP['type']=='file'){
                                             ?><a href="#" class="ti-file" style="color:black ; padding-right: 20px;">
                                                <?php }
                                         elseif($detailfileFTP['type']=='dir'){?>
                                                <a href="#" class="ti-folder"
                                                    style="color:black ; padding-right: 20px;">
                                                    <?php }
                                         ?>
                                        </td>
                                        <td>
                                            <?php 
                                            if($detailfileFTP['type']=='dir'){
                                                if(isset($_GET['directory'])){?>
                                            <a
                                                href="index.php?controleur=admin&action=afficherDashboardStockage&directory=<?php echo($_GET['directory'].'/'.$namefile)?>">
                                                <?php echo($namefile); ?>
                                            </a><?php 
                                                }
                                                else{?>
                                            <a
                                                href="index.php?controleur=admin&action=afficherDashboardStockage&directory=<?php echo($namefile)?>">
                                                <?php echo($namefile); ?>
                                            </a><?php
                                                }
                                            }
                                            else{
                                                echo($namefile); 
                                            }
                                              ?>
                                            <?php //echo $path_parts['filename'], "\n"; ?>
                                        </td>
                                        <td><span>
                                                <?php //echo $path_parts['extension'], "\n"; ?>

                                                <!-- <img src="https://img.icons8.com/small/96/000000/<?php echo($path_parts['extension'])?>.png" style="height: 30px;"/> -->


                                                <?php
                                                 // $uneExtension ="https://img.icons8.com/ios/50/000000/".$path_parts['extension'].".png";
                                                 // if(@getimagesize($uneExtension)){
                                                     ?>
                                                <!-- <img src="https://img.icons8.com/ios/50/000000/<?php echo($path_parts['extension'])?>.png"
                                                     style="height: 35px;" /> -->
                                                <?php
                                             //     }
                                             //     else{?>
                                                <!-- <img src="../public/icons/iconextensionfile.png"  style="height: 35px;" /> -->
                                                <?php
                                             // }
                                             //     ?>

                                                <?php
                                                 if($detailfileFTP['type']!=='dir'){
                                                     echo($extensionfile);
                                                 }
                                                     
                                                 ?>
                                            </span></td>
                                        <td><span><?php 
                                         //GestionFile::afficherTailleFile($taillefilestock);
                                         if($detailfileFTP['type']!=='dir'){
                                             if(ftp_size($ftp,$fileFTP)<1){
                                                 echo('<1 Octets');
                                             }
                                             else{
                                             GestionFile::afficherTailleFile(ftp_size($ftp,$fileFTP));
                                             }
                                         }
                                         ?></span>
                                        </td>
                                        <?php
 
                                             $datefilemlsd= $detailfileFTP['modify'];
                                             $yearfile=substr($datefilemlsd, 0, 4);
                                             $monthfile=substr($datefilemlsd, 4, 2);
                                             $dayfile=substr($datefilemlsd, 6, 2);
                                             $hourfile=substr($datefilemlsd, 8, 2);
                                             $minutesfile=substr($datefilemlsd, 10, 2);
                                             $secondsfile=substr($datefilemlsd, 12, 2);
 
                                             $datefileday=($dayfile.'/'.$monthfile.'/'.$yearfile);
                                             $datefilehours=($hourfile.':'.$minutesfile.':'.$secondsfile);
 
 
                                         ?>
                                        <td><span>
                                                <?php 
                                                      //$filechemin=$chemincorbeille."/".$file;
                                                      //echo(date("d/m/Y", filectime($filechemin)));
                                                     
                                                      echo($datefileday);
 
                                                 ?>
                                            </span></td>
                                        <td><span>
                                                <?php 
                                                     //echo(date("H:i:s", filectime($filechemin)));
                                                     echo($datefilehours);
                                                     
                                                 ?>

                                            </span></td>
                                        <td><span>
                                                <?php
                                        if(isset($_GET['directory'])){?>
                                                <form
                                                    action="<?php echo Chemins::VUES_ADMIN . 'delete_stockage.php?action=tocorbeille&type='.$detailfileFTP['type'].'&directory='.$_GET['directory'].'&iduser='.$idUser.'&idfile='.$i?>"
                                                    method="post" enctype="multipart/form-data"
                                                    value="<?php $fileFTP?>">
                                                    <input type="image" name="file"
                                                        src="https://img.icons8.com/fluency-systems-filled/48/000000/filled-trash.png"
                                                        style="height:20px; width:20px">
                                                </form>
                                                <?php
                                        }
                                        else{?>
                                                <form
                                                    action="<?php echo Chemins::VUES_ADMIN . 'delete_stockage.php?action=tocorbeille&type='.$detailfileFTP['type'].'&iduser='.$idUser.'&idfile='.$i?>"
                                                    method="post" enctype="multipart/form-data"
                                                    value="<?php $fileFTP?>">
                                                    <input type="image" name="file"
                                                        src="https://img.icons8.com/fluency-systems-filled/48/000000/filled-trash.png"
                                                        style="height:20px; width:20px">
                                                </form><?php
                                        }
                                                ?>

                                                <input id="<?php echo("togg".$i)?>" type="image"
                                                    src="<?php echo Chemins::IMAGES . 'dots.png';?>" alt="Info"
                                                    onchange="moreinfo($i)" style="height: 25px; padding-left: 1px;">
                                                <div class="card" id="<?php echo("div".$i)?>"
                                                    style="position:absolute; display: none;">
                                                    <li style="padding: 2px 15px ;"><a href="#" class="ti-info"
                                                            style="color:black ; padding-right: 20px;"></a>Informations
                                                    </li>
                                                    <li style="padding: 2px 15px ;"><a href="#" class="ti-move"
                                                            style="color:black ; padding-right: 20px;"></a>Déplacer</li>
                                                    <li style="padding: 2px 15px ;"><a href="#" class="ti-trash"
                                                            style="color:black ; padding-right: 20px;"></a>Supprimer
                                                    </li>
                                                </div>
                                                <script>
                                                togg = 'togg'.concat(<?php echo($i) ?>);
                                                div = "div".concat(<?php echo($i) ?>);
                                                ntogg = document.getElementById(togg);
                                                ndiv = document.getElementById(div);

                                                ntogg.addEventListener("click", () => {
                                                    if (getComputedStyle(ndiv).display != "none") {
                                                        ndiv.style.display = "none";
                                                    } else {
                                                        ndiv.style.display = "block";
                                                    }
                                                })
                                                </script>
                                        </td></span>
                                    </tr>


                                    <?php 
                                     
                                     }
 
 
                                 //FIN FOREACH
                             }
                                            if(isset($_POST['delete'])){
                                               // rename($cheminstock.'/'.$file, $chemincorbeille.'/'.$file);
                                            }
                                            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <?php
require Chemins::VUES_CLIENT . 'v_dashboard_footer.inc.php';

?>