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
    <title><?=$titre_header_social_myfollow?></title>
    </head>

    <?php

    echo "<body id=social>";
    
    echo "<div id='header'>
    <h1>
    <center>
    ".$titre_header_social_myfollow."
    <center>
    </h1>
    </div>";
    
    include 'nav.php';

    include 'aside.php';

    echo "<div id='social-element'>";
     
    if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {

    $q = $db->prepare("SELECT * FROM sociale_compte_statue WHERE name_compte=:name_compte AND statue_follow=:statue_follow AND actif=:actif");
	$q->execute([
    'name_compte' => $_SESSION['pseudo'],
    'statue_follow' => 'follow',
    'actif' => 'yes'
	]);
	$number_follow_statue = $q->rowCount();

	if ($number_follow_statue == 0) {
    echo "<div class='social-content'>";
    echo "<p>".$message_social_compte_follow_undefined."</p>";
    echo "</div>";
	}else{

        echo "<div class='social-content'>";
        echo "<h2>".$titre_social_follow."</h2>";
        echo"<hr/><br/>";
    
    while($result_follow_statue = $q->fetch(PDO::FETCH_ASSOC)){

        $f = $db->prepare("SELECT * FROM users WHERE pseudo=:pseudo AND actif=:actif");
	    $f->execute([
        'pseudo' => $result_follow_statue['with_compte'],
        'actif' => 'yes'
        ]);
        
        $result_follow = $f->fetch();

        echo "<a href='social_profil.php?id_profil=".$result_follow['pseudo']."'><div class='boxsocialprofil'>";
    
        echo "<div class='boxsocialelements'>" . $result_follow['profil_picture'] . "</div>";
          
        echo "<div class='boxsocialelements'><h2>" . $result_follow['prenom'] . " - " . $result_follow['nom'] . "</h2></div>";
          
        echo "</div></a><br/>";
          
        }

        echo "</div>";
    
   }

}else{
    echo "<div class='social-content'>";
    echo '<p>'.$message_social_compte_follow_undefined.'</p>';
    echo "</div>";
}

    echo "</div>";
	 
    echo "</body>
    </html>";
?>