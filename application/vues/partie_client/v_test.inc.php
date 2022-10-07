<h2>Bienvenue   <?php
session_start();
    if(isset($_SESSION['mail'])){
        $mailuser = $_SESSION['mail'];
echo($_SESSION['mail']);
      }?>
</h2>

<?php 
$lesUser = GestionUser::getLesUser();
foreach($lesUser as $unUser){
    
  }

  $unLogin = GestionUser::getLoginUserByMail($mailuser);
  
  var_dump($unLogin[0]->login) ; 

//var_dump($lesUser);

      ?> 

      <h2>Bienvenue² <?php 

    ?>   </h2>