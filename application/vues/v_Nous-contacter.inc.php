<?php    
    if(isset($_POST['submit'])){
    $to = "aurelien34290@gmail.com"; // mail qui reçoit
    $from = $_POST['email1']; // l'email de l'envoyeur
    $name = $_POST['name1']; // nom de l'envoyeur 
    $subject = $_POST['subject']; //sujet du mail
    $message = "• Vous avez reçu un message depuis le formulaire:"."\n"."• Nom : ". $name ."\n"."• Mail : ". $from ."\n"."• Sujet : ". $subject ."\n"."• Message : ". $_POST['message'];
    $headers = "From:" . "noreply@thorbeorn.fr";
    mail($to,$subject,$message,$headers);
    }
?>
<main id="main">
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Nous contacter</h2>
          <p>contactez-nous pour tous renseignements</p>
        </div>
        <div class="row">
          <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>adresse:</h4>
                <p>1 Av. Georges Frêche, 34410 Sérignan</p>
              </div>
              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>contact@example.com</p>
              </div>
              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>appelez-nous:</h4>
                <p>+33</p>
              </div>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2905.351573011965!2d3.2838072154851905!3d43.26500987913651!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b11a930e31872d%3A0xe8fc33e08a0f4834!2sLyc%C3%A9e%20Polyvalent%20Marc%20Bloch!5e0!3m2!1sfr!2sfr!4v1642144394023!5m2!1sfr!2sfr" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
              <form method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Votre nom</label>
                  <input type="text" name="name1" class="form-control" id="name" placeholder="Entrez votre nom ici" required>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">Votre Email</label>
                  <input type="email" class="form-control" name="email1" id="email" placeholder="Entrez votre Email ici" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="name">Sujet</label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" required>
              </div>
              <div class="form-group mt-3">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">envoi en cours...</div>
                <div class="error-message"></div>
                <div class="sent-message">Votre message a été envoyé. Merci!</div>
              </div>
              <div class="text-center"><button type="submit" name="submit">Envoyer</button></div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>
