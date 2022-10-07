<section id="accueil" class="d-flex align-items-center">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <?php


                if(isset($_GET["l"]) && isset($_GET["?u"])){
                    $hashm = $_GET["l"];
                    $mailv = $_GET["?u"];
                    try
                    {
                        $mysqlClient = new PDO('mysql:host=thorbeorn.fr;dbname=jnxwihwg_allan;charset=utf8', 'jnxwihwg_allan', 'b3747qTyPBbU');
                    }
                    catch(Exception $e)
                    {
                        echo "<h1>Votre compte n'a pas pu etre créer</h1>";
                        echo "<h2>Une erreur c'est produite.</h2>";
                        echo "<h2>Veuillez nous contacter par le formulaire de contact<h2>";
                        die('Erreur : '.$e->getMessage());
                    }

                    $stmt = $mysqlClient->prepare("SELECT id,validate AS va, token as v FROM user WHERE mail = :email");
                    $stmt->bindParam(':email', $mailv);
                    $stmt->execute();
                    $result1 = $stmt -> fetch();

                    if($result1['va'] == 1){
                      echo "<h1>Votre compte a etait créer avec succés</h1>";
                      echo "<h2>Votre compte etait deja activer.</h2>";
                      echo "<h2>Vous pouvez dés a present vous connecter a votre compte ou sinon Vous pouvez revenir sur la <a href=\"http://www.thorbeorn.fr\">page d'accueil</a><h2>";
                    }else{
                        $token = $result1[v];
                        $id = $result1[id];
                      if($hashm == $token){
                          $sql = $mysqlClient->prepare("UPDATE user SET validate = 1 WHERE id = :id");
                          $sql->bindValue(':id', $id);
                          $sql->execute();


                          echo "<h1>Votre compte a etait créer avec succés</h1>";
                          echo "<h2>Votre compte est maintenant activer.</h2>";
                          echo "<h2>Vous pouvez dés a present vous connecter a votre compte ou sinon Vous pouvez revenir sur la <a href=\"http://www.thorbeorn.fr\">page d'accueil</a><h2>";
                      }else{
                          echo "<h1>Votre compte n'a pas pu etre créer</h1>";
                          echo "<h2>Votre lien de confirmation n'est pas ou plus valide.</h2>";
                          echo "<h2>Veuillez nous contacter par le formulaire de contact ou sinon Vous pouvez revenir sur la <a href=\"http://www.thorbeorn.fr\">page d'accueil</a><h2>";
                      }
                    }
                }else{
                    echo "<h1>Votre compte n'a pas pu etre créer</h1>";
                    echo "<h2>Votre lien de confirmation n'est pas ou plus valide.</h2>";
                    echo "<h2>Veuillez nous contacter par le formulaire de contact ou sinon vous pouvez revenir sur la <a href=\"http://www.thorbeorn.fr\">page d'accueil</a><h2>";
                }
            ?>
        <div>
      </div>
    </div>
    <div class="col-lg-6 order-1 order-lg-2 hero-img">
        <img src="<?php echo Chemins::IMAGES . 'hero-img.svg'; ?>" class="img-fluid animated" alt="">
    </div>
  </div>
    </div>

  </section>
