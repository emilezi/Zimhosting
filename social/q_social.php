<?php
session_start();
include '../php/database.php'; 
include '../php/language.php';
include '../php/webtxt.php';
global $db;
?>
<html>
    <head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../img/icones/zimhostingicone.png">
    <link rel="stylesheet" href="../style.css"/>
    <title><?=$titre_header_social_search?></title>
    </head>
    
    <body id=social>

    <div id="header">
    
    <center><h1><?=$titre_header_social_search?></h1></center>
    
    </div>
    
    <?php 
    
    include 'nav.php';

    include 'aside.php';

    echo "<div id='social-element'>";
  
    if(isset($_GET['q_social']) && !empty($_GET['q_social'])) {
    $q_social = htmlspecialchars($_GET['q_social']);
    $qv = $db->prepare("SELECT * FROM users WHERE pseudo=:pseudo AND actif=:actif ORDER BY id DESC");
    $qv->execute([
       'pseudo'=> $q_social,
       'actif' => 'yes'
       ]);
    $qw = $db->prepare("SELECT * FROM users WHERE prenom=:prenom AND actif=:actif ORDER BY id DESC");
    $qw->execute([
        'prenom'=> $q_social,
        'actif' => 'yes'
        ]);
    $qx = $db->prepare("SELECT * FROM users WHERE nom=:nom AND actif=:actif ORDER BY id DESC");
    $qx->execute([
        'nom'=> $q_social,
        'actif' => 'yes'
        ]);
    if($qv->rowCount() == !0) {
      $search_data = $qv;
    }elseif($qw->rowCount() == !0){
      $search_data = $qw;
    }else{
      $search_data = $qx;
    }

    if($search_data->rowCount() == 0){

      echo "<div class='social-content'>";
      echo "<h2>".$titre_social_search_profil."</h2>";
      echo"<hr/>";
      echo "<p>" . $message_social_search_profil_noresult . $_GET['q_social'] . "...</p>";
      echo "</div>";

      }else{

        echo "<div class='social-content'>";
        echo "<h2>".$titre_social_search_profil."</h2>";
        echo"<hr/><br/>";

        while($q_result = $search_data->fetch(PDO::FETCH_ASSOC)){

        echo "<a href='social_profil.php?id_profil=".$q_result['pseudo']."'><div class='boxsocialprofil'>";

        echo "<div class='boxsocialelements'>" . $q_result['profil_picture'] . "</div>";
      
        echo "<div class='boxsocialelements'><h2>" . $q_result['prenom'] . " - " . $q_result['nom'] . "</h2></div>";
      
        echo "</div></a><br/>";
      
        }

        echo "</div>";
         
    }
 }else{
  echo "<div class='social-content'>";

   echo "<form method='GET'>
   <input id=search-barre type='search' name='q_social' placeholder='".$message_social_search_q."' style='float:left; width:85%;' required/>
   <input type='submit' value='".$text_button_search."' style='float:right' />
  </form>";

  echo "<br/>";

  echo "</div>";

 }

 ?>
	 
    </body>
</html>
