<?php 
    session_start();
	include '../php/database.php'; 
	include '../php/language.php';
	include '../php/webtxt.php';
    global $db;

	echo "<html>";
    ?>

    <head>
    <meta charset="utf-8" />
    <link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
    <link rel="stylesheet" href="../style.css" />
    <title><?=$titre_header_social_myfriends?></title>
    </head>

    <?php

    echo "<body id=social>";
    
    echo "<div id='header'>
    <h1>
    <center>
    ".$titre_header_social_myfriends."
    <center>
    </h1>
    </div>";
    
    include 'nav.php';

    include 'aside.php';

    echo "<div id='social-element'>";
     
    if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {

    $q = $db->prepare("SELECT * FROM sociale_compte_statue WHERE name_compte=:name_compte AND statue_friends=:statue_friends AND actif=:actif");
	$q->execute([
    'name_compte' => $_SESSION['pseudo'],
    'statue_friends' => 'friends',
    'actif' => 'yes'
	]);
	$number_friends_statue = $q->rowCount();

	if ($number_friends_statue == 0) {
    echo "<div class='social-content'>";
    echo "<p>".$message_social_compte_friends_undefined."</p>";
    echo "</div>";
	}else{

        echo "<div class='social-content'>";
        echo "<h2>".$titre_social_friends."</h2>";
        echo"<hr/><br/>";
    
    while($result_friends_statue = $q->fetch(PDO::FETCH_ASSOC)){

        $f = $db->prepare("SELECT * FROM users WHERE pseudo=:pseudo AND actif=:actif");
	    $f->execute([
        'pseudo' => $result_friends_statue['with_compte'],
        'actif' => 'yes'
        ]);
        
        $result_friends = $f->fetch();

        echo "<a href='social_profil.php?id_profil=".$result_friends['pseudo']."'><div class='boxsocialprofil'>";
    
        echo "<div class='boxsocialelements'>" . $result_friends['profil_picture'] . "</div>";
          
        echo "<div class='boxsocialelements'><h2>" . $result_friends['prenom'] . " - " . $result_friends['nom'] . "</h2></div>";
          
        echo "</div></a><br/>";
          
        }

        echo "</div>";
    
   }

   $q = $db->prepare("SELECT * FROM sociale_compte_statue WHERE with_compte=:with_compte AND statue_friends=:statue_friends");
   $q->execute([
   'with_compte' => $_SESSION['pseudo'],
   'statue_friends' => 'invitation'
   ]);
   $number_friends_statue = $q->rowCount();

   if ($number_friends_statue == 0) {
   echo "<div class='social-content'>";
   echo "<p>".$message_social_compte_invitation_undefined."</p>";
   echo "</div>";
   }else{

       echo "<div class='social-content'>";
       echo "<h2>".$titre_social_invitation."</h2>";
       echo"<hr/><br/>";
   
   while($result_friends_statue = $q->fetch(PDO::FETCH_ASSOC)){

       $f = $db->prepare("SELECT * FROM users WHERE pseudo=:pseudo AND actif=:actif");
       $f->execute([
       'pseudo' => $result_friends_statue['name_compte'],
       'actif' => 'yes'
       ]);
       
       $result_friends = $f->fetch();

       echo "<a href='social_profil.php?id_profil=".$result_friends['pseudo']."'><div class='boxsocialprofil'>";
   
       echo "<div class='boxsocialelements'>" . $result_friends['profil_picture'] . "</div>";
         
       echo "<div class='boxsocialelements'><h2>" . $result_friends['prenom'] . " - " . $result_friends['nom'] . "</h2></div>";
         
       echo "</div></a><br/>";

       echo "<div class='btn-content-invitation'>";

    echo "<form action='compte_statue_edit.php?id_compte=".$result_friends['pseudo']."&statue_edit=trueinvite' method='post'>
    <input type='submit' name='truefriend' value='".$text_button_invitation_accept."'>
    </form>";


    echo "<form action='compte_statue_edit.php?id_compte=".$result_friends['pseudo']."&statue_edit=falseinvite' method='post'>
    <input type='submit' name='falsefriend' value='".$text_button_invitation_refuse."'>
    </form>";

    echo "</div>";

    }

    echo "</div>";
   
  }

}else{
    echo "<div class='social-content'>";
    echo '<p>'.$message_social_friends_compte_undefined.'</p>';
    echo "</div>";
}

    echo "</div>";
	 
    echo "</body>
    </html>";
?>