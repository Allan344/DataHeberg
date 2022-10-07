<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DataHeberg</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo Chemins::IMAGES . 'DataHeberg.png';?>">
  <link href=<?php echo Chemins::IMAGES . 'apple-touch-icon.png'; ?> rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <link href="<?php echo Chemins::CSS . 'aos.css'; ?>" rel="stylesheet">
  <link href="<?php echo Chemins::BOOTSTRAP . 'bootstrap.min.css'; ?>" rel="stylesheet">
  <link href="<?php echo Chemins::CSS . 'bootstrap-icons.css'; ?>" rel="stylesheet">
  <link href="<?php echo Chemins::CSS . 'boxicons.min.css'; ?>"  rel="stylesheet">
  <link href="<?php echo Chemins::CSS . 'glightbox.min.css'; ?>" rel="stylesheet">
  <link href="<?php echo Chemins::CSS . 'swiper-bundle.min.css'; ?>" rel="stylesheet">
  <link href="<?php echo Chemins::CSS .  'style.css'; ?>" rel="stylesheet">
</head>
<body>
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="/"><span>DataHeberg</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="ressource/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
      <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto active" href="/#accueil">Accueil</a></li>
          <li><a class="nav-link scrollto" href="/#caracteristiques">Les Caractéristiques</a></li>
          <li><a class="nav-link scrollto" href="/#pourquoi">Pourquoi nous?</a></li>
          <li><a class="nav-link scrollto" href="/#tarif">Tarif</a></li>
          <li><a class="nav-link scrollto" href="/#comparatif">Comparatif</a></li>
          <li><a class="nav-link scrollto" href="/#commentaire">Commentaire</a></li>
          <li><a class="nav-link scrollto" href="/#confiance">Ils nous font Confiance</a></li>
         
         <?php
                    if (!isset($_SESSION['mail'])){
                        ?>

          <li><a class="getstarted scrollto" href="/connexion">Connexion</a></li>
<?php 
                    }
                    else{
                      ?>
<li><a class="getstarted scrollto" href="index.php?controleur=admin&action=afficherDashboard">Panel Client</a></li>

                      <?php
                    }

?>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <link href="<?php echo Chemins::CSS . 'aos.css' ?>" rel="stylesheet">
  <link href="<?php echo Chemins::BOOTSTRAP . 'bootstrap.min.css' ?>" rel="stylesheet">
  <link href="<?php echo Chemins::CSS . 'bootstrap-icons.css' ?>" rel="stylesheet">
  <link href="<?php echo Chemins::CSS . 'boxicons.min.css' ?>"  rel="stylesheet">
  <link href="<?php echo Chemins::CSS . 'glightbox.min.css' ?>" rel="stylesheet">
  <link href="<?php echo Chemins::CSS . 'swiper-bundle.min.css' ?>" rel="stylesheet">
  <link href="<?php echo Chemins::CSS .  'style.css' ?>" rel="stylesheet">
    <!-- Vendor JS Files -->
  <script src=<?php echo Chemins::JS . 'aos.js' ?>></script>
  <script src=<?php echo Chemins::JS . 'Bootstrap/bootstrap.bundle.min.js'?>></script>
  <script src=<?php echo Chemins::JS . 'glightbox.min.js'?>></script>
  <script src=<?php echo Chemins::JS . 'isotope.pkgd.min.js'?>></script>
  <script src=<?php echo Chemins::JS . 'validate.js'?>></script>
  </header>