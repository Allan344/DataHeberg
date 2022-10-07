<link href="<?php echo Chemins::CSS . 'styleConnexion.css'?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo Chemins::CSS . 'material-design-iconic-font.min.css'?>"> 
<main id="main">
    <section class="signup">
      <div class="container-signup">
          <div class="signup-content">
              <div class="signup-form">
                  <h2 class="form-title">Inscription</h2>
                  <form action="index.php?controleur=admin&action=afficherSignup" method="POST" class="register-form" id="register-form" onsubmit="return validateForm();">
                      <div class="form-group">
                          <label for="firstname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                          <input type="text" name="firstname" id="firstname" placeholder="Votre prénom" onkeyup="check();" required/>
                      </div>
                      <div class="form-group">
                        <label for="lastname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="lastname" id="lastname" placeholder="Votre nom" onkeyup="check();" required/>
                    </div>
                      <div class="form-group">
                          <label for="mail"><i class="zmdi zmdi-email"></i></label>
                          <input type="email" name="mail" id="mail" placeholder="Votre mail" onkeyup="check();" required/>
                      </div>
                      <div class="form-group">
                          <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                          <input type="password" name="pass" id="pass" placeholder="Mot de passe" onkeyup="check();" required/>
                      </div>
                      <div class="form-group">
                          <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                          <input type="password" name="re_pass" id="re_pass" placeholder="Retaper le mot de passe" onkeyup="check();" required/>
                      </div>
                      <div class="form-group">
                          <input type="checkbox" name="agree-term" id="agree-term" class="agree-term"/>
                          <label for="agree-term" class="label-agree-term"><span><span></span></span>J'accepte toutes les déclarations des <a href="/condition" class="term-service">Conditions d'utilisation</a></label>
                      </div>
                      <div class="form-group">
                      <?php
                      if(isset($_GET['error'])){
                        if($_GET['error']=='mailExist'){
                          echo '<p id="message" style="color: red;">Votre mail est déja utiliser !</p>';
                        }else{
                          echo '<p id="message"></p>';
                        }
                      }else{
                        echo '<p id="message"></p>';
                      }
                      ?>
                      </div>
                      <div class="form-group">
                        <p id="message2"></p>
                      </div>
                      <div class="form-group form-button">
                          <input type="hidden" name="signup" id="signup" class="form-submit" value="Inscription"/>
                      </div>
                  </form>
                  <script>
                    function ValidateEmail(mail) 
                    {
                      if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
                      {
                        return (true)
                      }
                        return (false)
                    }
                    var validateForm = function() {
                      if(document.getElementById("agree-term").checked==true){
                        return true;
                      }else{
                        document.getElementById('message').style.color = 'red';
                        document.getElementById('message').innerHTML = "vous devez d'abord accepter les conditions générales";
                        return false;
                      }
                    }
                    var check = function() {
                      if(document.getElementById('firstname').value.indexOf(' ') >= 0){
                        document.getElementById('message2').style.color = 'red';
                        document.getElementById('message2').innerHTML = "Votre prénom ne doit pas contenir d'espace";
                        document.getElementById('signup').setAttribute("type", "hidden")
                      }else if(document.getElementById('lastname').value.indexOf(' ') >= 0){
                        document.getElementById('message2').style.color = 'red';
                        document.getElementById('message2').innerHTML = "Votre nom de famille ne doit pas contenir d'espace";
                        document.getElementById('signup').setAttribute("type", "hidden")
                      }else if(!ValidateEmail(document.getElementById('mail').value)){
                        document.getElementById('message2').style.color = 'red';
                        document.getElementById('message2').innerHTML = "Votre mail doit etre valide";
                        document.getElementById('signup').setAttribute("type", "hidden")
                      }else{
                        document.getElementById('message2').innerHTML = "";
                      }

                      if(document.getElementById('pass').value.indexOf(' ') >= 0){
                        document.getElementById('message2').style.color = 'red';
                        document.getElementById('message2').innerHTML = "Votre mot de passe ne doit pas contenir d'espace";
                      }else if(document.getElementById('pass').value==""){
                        document.getElementById('message').innerHTML = '';
                      }else{
                        if(document.getElementById('pass').value.length <= 7){
                          document.getElementById('message').style.color = 'red';
                          document.getElementById('message').innerHTML = 'Votre mot de passe est trop cour, 8 charactere minimum';
                          document.getElementById('signup').setAttribute("type", "hidden")
                        }else if ((document.getElementById('pass').value != document.getElementById('re_pass').value)) {
                          document.getElementById('message').style.color = 'red';
                          document.getElementById('message').innerHTML = 'Vos mots de passes ne correspondent pas';
                          document.getElementById('signup').setAttribute("type", "hidden")
                        }else{
                          document.getElementById('message').innerHTML = '';
                          if(document.getElementById('message2').innerHTML==""){
                            document.getElementById('signup').setAttribute("type", "submit")
                          }else{
                            document.getElementById('signup').setAttribute("type", "hidden")
                          }
                        }
                      }
                    }
                  </script>
              </div>
                <div>
                    <div class="signin-image">
                        <figure><img src="<?php echo Chemins::IMAGES . 'dataheberg.png' ?>" alt="sing up image"></figure>
                        <a href="/connexion" class="signup-image-link">Je suis déjà inscrit</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
  <script src="<?php echo Chemins::JQUERY . 'jquery.min.js' ?>"></script>

