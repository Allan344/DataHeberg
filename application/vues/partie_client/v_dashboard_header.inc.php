<style type="text/css">
header {
    visibility: hidden;
}
</style>
<style type="text/css">
footer {
    visibility: hidden;
}
</style>
<!DOCTYPE html>
<html lang="fr">

<?php
require CHEMINS::MODELES . 'gestion_file.class.php';
include Chemins::CONFIGS . 'ftp_config.class.php';

// $chemin = 'D:\wamp\www\DataHeberg\DataHebergMVC1.4\cloud\6';
// $cheminstock = $chemin.'/stockage';
// $chemincorbeille=$chemin.'/corbeille';
$mailuser = $_SESSION['mail'];

$unUser = GestionUser::getLoginUserByMail($mailuser);
$loginUser= $unUser[0]->login; 
$idUser = $unUser[0]->id; 


if(isset($_GET['directory'])){
    $cheminstock = 'cloud/'.$idUser.'/stockage'.'/'.$_GET['directory'].'/';
    $chemincorbeille = 'cloud/'.$idUser.'/corbeille'.'/'.$_GET['directory'].'/';
}
else{
    $cheminstock = 'cloud/'.$idUser.'/stockage'.'/';
    $chemincorbeille = 'cloud/'.$idUser.'/corbeille'.'/';
}


$type = (!isset($_REQUEST['type'])) ? '' : $_REQUEST['type'];

//  if(!isset($_SESSION['mail'])){
//      $url = 'index.php?controleur=admin&action=afficherConnexion';
//      $scriptTag = '<script type="text/javascript">window.location = "'.$url.'";</script>';
//      print $scriptTag;
//    }
 
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo Chemins::IMAGES . 'DataHeberg.png';?>">
    <link rel="stylesheet" href="<?php echo Chemins::CSS . 'owl.carousel.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo Chemins::CSS . 'owl.theme.default.min.css'; ?>">
    <link href="<?php echo Chemins::CSS . 'style2.css'; ?>" rel="stylesheet"> 





</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">

            <span class="brand-logo">
                <a href="index.php" aria-expanded="false" target="_blank" style="color: #4280f3;">
                    <img src="<?php echo Chemins::IMAGES . 'DataHeberg.png';?>" style="width: 40px; padding:auto;"></a>
                <!-- Panel Client &nbsp; | <a href="index.php" aria-expanded="false" target="_blank" style="color: #4280f3;">
                    &nbsp; DataHeberg</a> -->
            </span>


            <!-- <span class="brand-logo">
            <a href="index.php" aria-expanded="false" target="_blank" style="color: #4280f3;">
                    <img src="<?php echo Chemins::IMAGES . 'DataHeberg.png';?>" style="width: 40px; padding:auto;"
                    ></a>
            </span> -->

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->


        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search"
                                            aria-label="Search" name="mot">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <h2>Bienvenue <?php

      echo(ucwords($loginUser));
      ?> </h2>

                            &nbsp; <img src="<?php echo Chemins::IMAGES . 'DataHeberg.png';?>"
                                style="width: 40px; padding:auto;">

                            <!-- <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <img src="https://img.icons8.com/ios-glyphs/50/000000/user.png" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./app-profile.html" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2 dropdown-menu-left"> Compte </span>
                                    </a>
                                    <a href="./email-inbox.html" class="dropdown-item">
                                        <i class="icon-envelope-open"></i>
                                        <span class="ml-2"> Messages </span>
                                    </a>
                                    <a href="application/vues/partie_admin/logout.php" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2"> Déconnexion </span>
                                    </a>
                                </div>
                            </li> -->


                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first"></li>
                    <!-- <li><a aria-expanded="false"><span class="nav-text">&nbsp; &nbsp;&nbsp; &nbsp; <?php echo(ucwords($loginUser)); ?> &nbsp; &nbsp; | &nbsp; &nbsp; Cloud </span></a>
                         <ul aria-expanded="false">
                            <li><a href="./index.html">Dashboard 1</a></li>
                            <li><a href="./index2.html">Dashboard 2</a></li>
                        </ul> 
                    </li> -->


                    <!-- <a href="index.php?controleur=admin&action=afficherDashboard"><li class="nav-label" style="color: white;">Cloud</li></a>
                    <li><a class="has-arrow" href="index.php?controleur=admin&action=afficherDashboardStockage" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Stockage</span></a></li>
                    <li><a class="has-arrow" href="index.php?controleur=admin&action=afficherDashboardCorbeille" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Corbeille</span></a></li> -->


                    <li class="mm-active"><a class="has-arrow" href="javascript:void()" aria-expanded="true"><i
                                class="ti-cloud"></i><span class="nav-text">&nbsp;
                                &nbsp;<?php echo(ucwords($loginUser)); ?> &nbsp; &nbsp; | &nbsp; &nbsp; Cloud
                            </span></a>
                        <ul aria-expanded="false" class="mm-active mm-collapse mm-show">
                            <li><a href="index.php?controleur=admin&action=afficherDashboardStockage">Stockage</a></li>
                            <li><a href="index.php?controleur=admin&action=afficherDashboardCorbeille">Corbeille</a>
                            </li>
                        </ul>
                    </li>

                    <li class="mm-active"><a class="has-arrow" href="javascript:void()" aria-expanded="true"><i
                                class="icon icon-single-04"></i><span class="nav-text">&nbsp; &nbsp;Compte</span></a>
                        <ul aria-expanded="false" class="mm-active mm-collapse mm-show">
                            <li><a href="index.php?controleur=admin&action=afficherDashboard">Gestion du Cloud</a></li>
                            <li><a href="#">Gestion du Compte</a></li>
                            <li><a href="application/vues/partie_admin/logout.php">Déconnexion</a></li>
                        </ul>
                    </li>

                    <!-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Apps</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./app-profile.html">Profile</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                                <ul aria-expanded="false">
                                    <li><a href="./email-compose.html">Compose</a></li>
                                    <li><a href="./email-inbox.html">Inbox</a></li>
                                    <li><a href="./email-read.html">Read</a></li>
                                </ul>
                            </li>
                            <li><a href="./app-calender.html">Calendar</a></li>
                        </ul>
                    </li> -->


                    <!-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-chart-bar-33"></i><span class="nav-text">Charts</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./chart-flot.html">Flot</a></li>
                            <li><a href="./chart-morris.html">Morris</a></li>
                            <li><a href="./chart-chartjs.html">Chartjs</a></li>
                            <li><a href="./chart-chartist.html">Chartist</a></li>
                            <li><a href="./chart-sparkline.html">Sparkline</a></li>
                            <li><a href="./chart-peity.html">Peity</a></li>
                        </ul>
                    </li> -->

                    <!-- <li class="nav-label">Components</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">Bootstrap</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./ui-accordion.html">Accordion</a></li>
                            <li><a href="./ui-alert.html">Alert</a></li>
                            <li><a href="./ui-badge.html">Badge</a></li>
                            <li><a href="./ui-button.html">Button</a></li>
                            <li><a href="./ui-modal.html">Modal</a></li>
                            <li><a href="./ui-button-group.html">Button Group</a></li>
                            <li><a href="./ui-list-group.html">List Group</a></li>
                            <li><a href="./ui-media-object.html">Media Object</a></li>
                            <li><a href="./ui-card.html">Cards</a></li>
                            <li><a href="./ui-carousel.html">Carousel</a></li>
                            <li><a href="./ui-dropdown.html">Dropdown</a></li>
                            <li><a href="./ui-popover.html">Popover</a></li>
                            <li><a href="./ui-progressbar.html">Progressbar</a></li>
                            <li><a href="./ui-tab.html">Tab</a></li>
                            <li><a href="./ui-typography.html">Typography</a></li>
                            <li><a href="./ui-pagination.html">Pagination</a></li>
                            <li><a href="./ui-grid.html">Grid</a></li>

                        </ul>
                    </li> -->

                    <!-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-plug"></i><span class="nav-text">Plugins</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./uc-select2.html">Select 2</a></li>
                            <li><a href="./uc-nestable.html">Nestedable</a></li>
                            <li><a href="./uc-noui-slider.html">Noui Slider</a></li>
                            <li><a href="./uc-sweetalert.html">Sweet Alert</a></li>
                            <li><a href="./uc-toastr.html">Toastr</a></li>
                            <li><a href="./map-jqvmap.html">Jqv Map</a></li>
                        </ul>
                    </li> -->

                    <!-- <li><a href="widget-basic.html" aria-expanded="false"><i class="icon icon-globe-2"></i><span
                                class="nav-text">Widget</span></a></li>
                    <li class="nav-label">Forms</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-form"></i><span class="nav-text">Forms</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./form-element.html">Form Elements</a></li>
                            <li><a href="./form-wizard.html">Wizard</a></li>
                            <li><a href="./form-editor-summernote.html">Summernote</a></li>
                            <li><a href="form-pickers.html">Pickers</a></li>
                            <li><a href="form-validation-jquery.html">Jquery Validate</a></li>
                        </ul>
                    </li> -->

                    <!-- <li class="nav-label">Table</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text">Table</span></a>
                        <ul aria-expanded="false">
                            <li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
                            <li><a href="table-datatable-basic.html">Datatable</a></li>
                        </ul>
                    </li> -->

                    <!-- <li class="nav-label">Extra</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-copy-06"></i><span class="nav-text">Pages</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./page-register.html">Register</a></li>
                            <li><a href="./page-login.html">Login</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                                <ul aria-expanded="false">
                                    <li><a href="./page-error-400.html">Error 400</a></li>
                                    <li><a href="./page-error-403.html">Error 403</a></li>
                                    <li><a href="./page-error-404.html">Error 404</a></li>
                                    <li><a href="./page-error-500.html">Error 500</a></li>
                                    <li><a href="./page-error-503.html">Error 503</a></li>
                                </ul>
                            </li>
                            <li><a href="./page-lock-screen.html">Lock Screen</a></li>
                        </ul>
                    </li> -->

                </ul>

            </div>
        </div>