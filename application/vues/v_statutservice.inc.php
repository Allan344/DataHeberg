<link href="<?php echo Chemins::CSS . 'styleStatusServices.css'?>" rel="stylesheet">
<?php

try
{
  //#:UYnD5p/9Zb&^U#
  $mysqlClient = new PDO('mysql:host=localhost;dbname=jnxwihwg_thorbeorn;charset=utf8', 'jnxwihwg_statut-service', '#:UYnD5p/9Zb&^U#');
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}
$ALL = true;
$sqlQuery = 'SELECT * FROM Services_online';
$getState = $mysqlClient->prepare($sqlQuery);
$getState->execute();
$states = $getState->fetchAll();
foreach ($states as $state) {
  if($state['Service']=='IPPublic'){
    if($state['State']==1){
      $IPP = true;
    }else{
      $IPP = false;
      $ALL = false;
    }
  }elseif ($state['Service']=='DNSs') {
    if($state['State']==1){
      $DNSS = true;
    }else{
      $DNSS = false;
      $ALL = false;
    }
  }elseif ($state['Service']=='SiteVitrine') {
    if($state['State']==1){
      $VITRINE = true;
    }else{
      $VITRINE = false;
      $ALL = false;
    }
  }elseif ($state['Service']=='Panels') {
    if($state['State']==1){
      $PANEL = true;
    }else{
      $PANEL = false;
      $ALL = false;
    }
  }elseif ($state['Service']=='ServerStockage') {
    if($state['State']==1){
      $STORAGE = true;
    }else{
      $STORAGE = false;
      $ALL = false;
    }
  }
}
?>


  <main id="main">
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Services</h2>
<?php
if ($ALL !== false) {
  echo '<div class="ope" id="all">Tous nos services sont operationnel</div>';
}
else {
  echo '<div class="fail" id="all">Un de nos services est hors-ligne !</div>';
}
?>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
<?php
if ($IPP !== false) {
  echo '<div class="ope" id="IPPublic">Operationnel</div>';
}
else {
  echo '<div class="fail" id="IPPublic">Down</div>';
}
?>
              <h4 class="title"><a href="">IP Publics</a></h4>
              <p class="description">IP Publics, ce sont nos IP sur lesquels nous vous offrons nos services</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
<?php
if ($DNSS !== false) {
  echo '<div class="ope" id="DNS">Operationnel</div>';
}
else {
  echo '<div class="fail" id="DNS">Down</div>';
}
?>
              <h4 class="title"><a href="">DNSs</a></h4>
              <p class="description">DNSs, ce sont nos serveurs de nom pour tous les domaines "thorbeorn.fr"</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
<?php
if ($VITRINE !== false) {
  echo '<div class="ope" id="vitrine">Operationnel</div>';
}
else {
  echo '<div class="fail" id="vitrine">Down</div>';
}
?>
              <h4 class="title"><a href="">Sites vitrines</a></h4>
              <p class="description">Sites vitrines, ce sont nos sites web d'accueil(celui où vous êtes par exemple!)</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
<?php
if ($PANEL !== false) {
  echo '<div class="ope" id="panels">Operationnel</div>';
}
else {
  echo '<div class="fail" id="panels">Down</div>';
}
?>
              <h4 class="title"><a href="">Panels</a></h4>
              <p class="description">Panels, ce sont les sites d'où vous gérez vos services, transférer vos fichiers et voyer vos options</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
<?php
if($STORAGE!==false){
  echo '<div class="ope" id="serversstockage">Operationnel</div>';
}else{
  echo '<div class="fail" id="serversstockage">Down</div>';
}
?>
              <h4 class="title"><a href="">Servers de stockage</a></h4>
              <p class="description">Servers de stockage, ce sont les servers de gestions de vos fichiers</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Historique</h2>
          <p>Notre historique de pannes</p>
        </div>
<?php
$sqlQuery = 'SELECT * FROM historique_incident';
$getIncident = $mysqlClient->prepare($sqlQuery);
$getIncident->execute();
$incidents = $getIncident->fetchAll();

if(count($incidents)==0){
  echo "<div class='ope' id='all'>Aucun incident n'a encore été déclarer</div>";
}else{
  foreach ($incidents as $incident) {
    if($incident['etat']==1){
      $etat='Résolu';
    }else{
      $etat='Non résolu';
    }

?>
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Services</th>
              <th scope="col">Date</th>
              <th scope="col">Etat de l'incident</th>
            </tr>
          </thead>
          <tbody>
  <?php echo '<tr>' ?>
  <?php echo '<th scope="row">'.$incident['id'].'</th>' ?>
  <?php echo '<td>'.$incident['services'].'</td>' ?>
  <?php echo '<td>'.$incident['date'].'</td>' ?>
  <?php echo '<td>'.$etat.'</td>' ?>
          </tbody>
        </table>
<?php
  }
}
?>
      </div>
    </section>
  </main>
