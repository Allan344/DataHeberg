<?php
$database = include Chemins::CONFIGS . 'config.class.php';
if(isset($_COOKIE['mail'])){
  $_SESSION['mail'] = $_COOKIE['mail'];
  $_SESSION['pass'] = $_COOKIE['pass'];
}

//REDIRIGE 
if(isset($_SESSION['mail'])){
   $url = 'index.php?controleur=admin&action=afficherDashboard';
   header('Location: '.$url);
 }
 echo $_POST["mail"];
?>

    <!-- Plugin css for this page -->
  <link href="<?php echo Chemins::CSS . 'styleConnexion.css'?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo Chemins::CSS . 'material-design-iconic-font.min.css'?>"> 
</head>
  <main id="main">
    <section class="sign-in">
      <div class="containerS">
          <div class="signin-content">
              <div class="signin-image">
                  <figure><img src="<?php echo Chemins::IMAGES . 'dataheberg.png' ?>" alt="sing up image"></figure>
                  <a href="/inscription" class="signup-image-link">Crée un compte</a>
              </div>

              <div class="signin-form">
                  <h2 class="form-title">Connexion</h2>
                  <form action="index.php?controleur=admin&action=afficherSignin" method="POST" class="register-form" id="login-form" onsubmit="return validateForm();">
                      <div class="form-group">
                          <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                          <input type="email" name="mail" id="mail" onkeyup="check();" placeholder="Ton mail" required/>
                      </div>
                      <div class="form-group">
                          <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                          <input type="password" name="pass" id="pass" onkeyup="check();" placeholder="Ton mot de passe" required/>
                      </div>
                      <div class="form-group">
                          <input type="checkbox" name="rmm" id="remember-me" class="agree-term" value="true"/>
                          <label for="remember-me" class="label-agree-term"><span><span></span></span>Se souvenir de moi</label>
                      </div>
                      <div class="form-group form-button">
                          <input type="submit" name="signin" id="signin" class="form-submit" value="Se connecter"/>
                      </div>
                      <div class="form-group">
                      <?php
                      if(isset($_GET['error'])){
                        if($_GET['error']=='1'){
                          echo '<p id="message2" style="color: red;">Votre mail n\'est associer a aucun compte !</p>';
                        }else if($_GET['error']=='2'){
                          echo '<p id="message2" style="color: red;">Votre mail ou mot de passe est incorrect !</p>';
                        }else if($_GET['error']=='3'){
                          echo '<p id="message2" style="color: red;">Votre cookie de connexion/session n\'est plus valide !</p>';
                        }else{
                          echo '<p id="message2"></p>';
                        }
                      }else{
                        echo '<p id="message2"></p>';
                      }
                      ?>
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
                      if(document.getElementById("pass").value==""){
                        document.getElementById('message2').style.color = 'red';
                        document.getElementById('message2').value = "Votre mot de passe ne peux pas etre vide";
                        return false;
                      }else{
                        return true;
                      }
                    }
                    // var check = function() {
                    //   if(!ValidateEmail(document.getElementById('mail').value)){
                    //     document.getElementById('message2').style.color = 'red';
                    //     document.getElementById('message2').innerHTML = "Votre mail doit etre valide";
                    //     document.getElementById('signin').setAttribute("type", "hidden")
                    //   }else{
                    //     document.getElementById('message2').innerHTML = "";
                    //     document.getElementById('signin').setAttribute("type", "submit")
                    //   }

                      if(document.getElementById("pass").value!=""){
                        document.getElementById('message2').innerHTML = "";
                        return false;
                      }else{
                        return true;
                      }
                    //}
                  </script>
                  <div class="social-login">
                      <span class="social-label"><a href="index.php?controleur=admin&action=afficherMDPPerdu">mot de passe oublier</a></span>
                  </div>
              </div>
          </div>
      </div>
  </section>
    
  </main>

  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="<?php echo Chemins::JQUERY . 'jquery.min.js' ?>"></script>
</body>
</html>