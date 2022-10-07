<?php
require Chemins::VUES_CLIENT . 'v_dashboard_header.inc.php';

?>

<!--**********************************
            Sidebar end
        ***********************************-->

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Espace utilisé </div>
                            <div class="stat-digit">
                                <?php 
                                    $maxstock = 20;
                                    $sumtaillefilestock = 0;
                                    $sumtaillefilestockpourcent = 0;
                                    $i=0;

                                    //$files = scandir($cheminstock);
                                    $filesFTP = ftp_nlist($ftp,$cheminstock);
                                    foreach($filesFTP as $fileFTP) {
                                        //$path_parts =pathinfo($file);
                                        $detaillisteFTP = ftp_mlsd($ftp,$cheminstock);
                                        $detailfileFTP= $detaillisteFTP[$i];
                                        
                                        if($detailfileFTP['type']=='file' or $detailfileFTP['type']=='dir'){
                                            if($detailfileFTP['type']=='dir'){
                                                $taillefilestock = GestionFile::GetTailleDossier($fileFTP);
                                            }
                                            else{
                                                $taillefilestock = ftp_size($ftp,$fileFTP);
                                            }
                                        
                                        $taillefilestockgo = round($taillefilestock,2);
                                        $taillefilestockpourcent = round(($taillefilestockgo*100/$maxstock));
                                        //echo($taillefilego);
                                        
                                        $sumtaillefilestock = $sumtaillefilestock + $taillefilestock ;
                                        $sumtaillefilestockgo = $sumtaillefilestock + $taillefilestock ;
                                        $sumtaillefilestockpourcent = $sumtaillefilestockpourcent + $taillefilestockpourcent/1073741824;
                                        }
                                        $i++;
                                    }

                                    if($sumtaillefilestock<=0){
                                        GestionFile::afficherTailleFile(0);
                                    }else{
                                        GestionFile::afficherTailleFile($sumtaillefilestock);
                                    }
                                
                                ?>/20Go


                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success"
                                style="width:<?php echo($sumtaillefilestockpourcent) ?>%;" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Espace restant</div>
                            <div class="stat-digit">
                                <?php
                                $restanttaille = $maxstock*1073741824 - $sumtaillefilestock;
                                $restanttaillepourcent = 100 - $sumtaillefilestockpourcent;

                               GestionFile::afficherTailleFile($restanttaille);

                                ?> /20Go</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary"
                                style="width:<?php echo($restanttaillepourcent) ?>%;" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Transfert</div>
                            <div class="stat-digit"> /100Go</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Corbeille</div>
                            <div class="stat-digit">
                                <?php 
                                    $maxcorbeille = 5;
                                    $sumtaillefilecorbeille = 0;
                                    $sumtaillefilepourcentcorbeille = 0;
                                    $i=0;
                                    //$files = scandir($chemincorbeille);

                                    $filesFTP = ftp_nlist($ftp,$chemincorbeille);
                                    foreach($filesFTP as $fileFTP) {
                                        //$path_parts =pathinfo($file);
                                        $detaillisteFTP = ftp_mlsd($ftp,$chemincorbeille);
                                        $detailfileFTP= $detaillisteFTP[$i];
                                        
                                        if($detailfileFTP['type']=='file' or $detailfileFTP['type']=='dir'){
                                            if($detailfileFTP['type']=='dir'){
                                                $taillefilecorbeille = GestionFile::GetTailleDossier($fileFTP);
                                            }
                                            else{
                                                $taillefilecorbeille = ftp_size($ftp,$fileFTP);
                                            }
                                        
                                        $taillefilecorbeille = round($taillefilecorbeille,2);
                                        $taillefilepourcentcorbeille = round(($taillefilecorbeille/1073741824*100/$maxcorbeille));

                                        $sumtaillefilecorbeille = $sumtaillefilecorbeille + $taillefilecorbeille ;
                                        $sumtaillefilepourcentcorbeille = $sumtaillefilepourcentcorbeille + $taillefilepourcentcorbeille;
                                        }
                                        $i++;
                                    }
                                    GestionFile::afficherTailleFile($sumtaillefilecorbeille);
                                    ?>/5Go</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger"
                                style="width:<?php echo($sumtaillefilepourcentcorbeille) ?>%;" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Project</h4>
                    </div>
                    <div class="card-body">
                        <div class="current-progress">
                            <div class="progress-content py-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="progress-text">Website</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="current-progressbar">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-primary w-40" role="progressbar"
                                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                    40%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-content py-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="progress-text">Android</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="current-progressbar">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-primary w-60" role="progressbar"
                                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                                    60%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-content py-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="progress-text">Ios</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="current-progressbar">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-primary w-70" role="progressbar"
                                                    aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                                    70%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-content py-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="progress-text">Mobile</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="current-progressbar">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-primary w-90" role="progressbar"
                                                    aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                                    90%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Serveurs</h4>
                    </div>
                    <div class="card-body">
                        <div class="current-progress">
                            <div class="content py-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="text">Serveur 1</div>
                                    </div>
                                    <div class="col-lg-8 ">
                                        <span class="badge badge-success">Operationnel</span>
                                    </div>
                                </div>
                            </div>
                            <div class="content py-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="text">Serveur 2</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <span class="badge badge-warning">Redémarrage</span>
                                    </div>
                                </div>
                            </div>
                            <div class="content py-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="text">Serveur 3</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <span class="badge badge-info">Bientot disponible</span>
                                    </div>
                                </div>
                            </div>
                            <div class="content py-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="text">Serveur 4</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <span class="badge badge-danger">Hors-ligne</span>
                                    </div>
                                </div>
                            </div>
                            <div class="-content py-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="text">Serveur 5</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <span class="badge badge-dark">Done</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Country</h4>
                </div>
                <div class="card-body">
                    <div id="vmap13" class="vmap"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-xl-4 col-xxl-6 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Timeline</h4>
                </div>
                <div class="card-body">
                    <div class="widget-timeline">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-badge primary"></div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>10 minutes ago</span>
                                    <h6 class="m-t-5">Youtube, a video-sharing website, goes live.</h6>
                                </a>
                            </li>

                            <li>
                                <div class="timeline-badge warning">
                                </div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>20 minutes ago</span>
                                    <h6 class="m-t-5">Mashable, a news website and blog, goes live.</h6>
                                </a>
                            </li>

                            <li>
                                <div class="timeline-badge danger">
                                </div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>30 minutes ago</span>
                                    <h6 class="m-t-5">Google acquires Youtube.</h6>
                                </a>
                            </li>

                            <li>
                                <div class="timeline-badge success">
                                </div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>15 minutes ago</span>
                                    <h6 class="m-t-5">StumbleUpon is acquired by eBay. </h6>
                                </a>
                            </li>

                            <li>
                                <div class="timeline-badge warning">
                                </div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>20 minutes ago</span>
                                    <h6 class="m-t-5">Mashable, a news website and blog, goes live.</h6>
                                </a>
                            </li>

                            <li>
                                <div class="timeline-badge dark">
                                </div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>20 minutes ago</span>
                                    <h6 class="m-t-5">Mashable, a news website and blog, goes live.</h6>
                                </a>
                            </li>

                            <li>
                                <div class="timeline-badge info">
                                </div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>30 minutes ago</span>
                                    <h6 class="m-t-5">Google acquires Youtube.</h6>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-xxl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Todo</h4>
                </div>
                <div class="card-body px-0">
                    <div class="todo-list">
                        <div class="tdl-holder">
                            <div class="tdl-content widget-todo mr-4">
                                <ul id="todo_list">
                                    <li><label><input type="checkbox"><i></i><span>Get up</span><a href='#'
                                                class="ti-trash"></a></label></li>
                                    <li><label><input type="checkbox" checked><i></i><span>Stand up</span><a href='#'
                                                class="ti-trash"></a></label></li>
                                    <li><label><input type="checkbox"><i></i><span>Don't give up the
                                                fight.</span><a href='#' class="ti-trash"></a></label></li>
                                    <li><label><input type="checkbox" checked><i></i><span>Do something
                                                else</span><a href='#' class="ti-trash"></a></label></li>
                                    <li><label><input type="checkbox" checked><i></i><span>Stand up</span><a href='#'
                                                class="ti-trash"></a></label></li>
                                    <li><label><input type="checkbox"><i></i><span>Don't give up the
                                                fight.</span><a href='#' class="ti-trash"></a></label></li>
                                </ul>
                            </div>
                            <div class="px-4">
                                <input type="text" class="tdl-new form-control"
                                    placeholder="Write new item and hit 'Enter'...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-xxl-6 col-xl-4 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product Sold</h4>
                    <div class="card-action">
                        <div class="dropdown custom-dropdown">
                            <div data-toggle="dropdown">
                                <i class="ti-more-alt"></i>
                            </div>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Option 1</a>
                                <a class="dropdown-item" href="#">Option 2</a>
                                <a class="dropdown-item" href="#">Option 3</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart py-4">
                        <canvas id="sold-product"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-xxl-6 col-lg-6 col-md-12">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                    <div class="card">
                        <div class="social-graph-wrapper widget-facebook">
                            <span class="s-icon"><i class="fa fa-facebook"></i></span>
                        </div>
                        <div class="row">
                            <div class="col-6 border-right">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1"><span class="counter">89</span> k</h4>
                                    <p class="m-0">Friends</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1"><span class="counter">119</span> k</h4>
                                    <p class="m-0">Followers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                    <div class="card">
                        <div class="social-graph-wrapper widget-linkedin">
                            <span class="s-icon"><i class="fa fa-linkedin"></i></span>
                        </div>
                        <div class="row">
                            <div class="col-6 border-right">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1"><span class="counter">89</span> k</h4>
                                    <p class="m-0">Friends</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1"><span class="counter">119</span> k</h4>
                                    <p class="m-0">Followers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                    <div class="card">
                        <div class="social-graph-wrapper widget-googleplus">
                            <span class="s-icon"><i class="fa fa-google-plus"></i></span>
                        </div>
                        <div class="row">
                            <div class="col-6 border-right">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1"><span class="counter">89</span> k</h4>
                                    <p class="m-0">Friends</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1"><span class="counter">119</span> k</h4>
                                    <p class="m-0">Followers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                    <div class="card">
                        <div class="social-graph-wrapper widget-twitter">
                            <span class="s-icon"><i class="fa fa-twitter"></i></span>
                        </div>
                        <div class="row">
                            <div class="col-6 border-right">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1"><span class="counter">89</span> k</h4>
                                    <p class="m-0">Friends</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1"><span class="counter">119</span> k</h4>
                                    <p class="m-0">Followers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div> 

</div>
</div>
</div>
<?php
require Chemins::VUES_CLIENT . 'v_dashboard_footer.inc.php';

?>