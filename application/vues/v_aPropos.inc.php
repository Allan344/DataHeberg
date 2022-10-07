<?php $Datacenter = GestionUser::getNbDataCenter()?>
<?php $Client = GestionUser::getNbClients()?>
<section id="accueil" class="d-flex align-items-center about">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
            <img src="<?php echo Chemins::IMAGES . 'about-img.svg'?>" class="img-fluid" alt="" data-aos="zoom-in">
        </div>
        <div class="col-lg-6 pt-5 pt-lg-0">
          <h3 data-aos="fade-up">thorbeorn en quelques chiffres</h3>
          <p data-aos="fade-up" data-aos-delay="100">Découvrez les chiffres clés de thorbeorn depuis son lancement.</p>
          <div class="row">
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-cube-alt"></i>
              <h4>Thorbeorn</h4>
              <ul>
                <li>Création en 2021</li>
                <li><?php echo $Datacenter ?> DataCenter de production</li>
              </ul>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-receipt"></i>
              <h4>Nos ressource</h4>
              <ul>
                <li>Plus de 1000<?php echo $Client  ?> inscrit</li>
                <li>Plus de 20000 fichier téléverser</li>
                <li>Plus de 255To installer</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <main id="main">
    <section id="portfolio" class="portfolio services">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Services</h2>
          <p>Découvrez les excellents services que nous offrons</p>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">Notre force</a></h4>
              <p class="description">Thorbeorn a été créé en 2021 et a su s'adapter aux différentes solutions techniques. Aujourd'hui la force de thorbeorn est sans aucun doute la flexibilité et l'adaptation au client.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Notre support</a></h4>
              <p class="description">Nous connaissons dans les moindres détails tous les logiciels que nous utilisons afin de vous proposer un meilleur suivi clients..</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Dynamisme</a></h4>
              <p class="description">Grâce à notre système de gestion et d’intervention unique, nous vous garantissons un support rapide et efficace.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="">Nos fournisseur</a></h4>
              <p class="description">Nous travaillons uniquement avec des fournisseurs de marque afin de pouvoir vous proposer une qualité de service (Samsung, IBM, Cisco, HP, Dell, etc.)</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  