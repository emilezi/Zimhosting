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
    <title><?=$titre_header_social_discussion?></title>
    </head>

    <?php

    echo "<body id=social>";
    
    echo "<div id='header'>
    <h1>
    <center>
    ".$titre_header_social_discussion."
    <center>
    </h1>
    </div>";
    
    include 'nav.php';

    include 'aside.php';

    echo "<div id='social-element'>";
     
    if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom']))){
    
        $x = $db->prepare("SELECT DISTINCT pseudo,prenom,nom,profil_picture FROM users INNER JOIN sociale_discussions ON users.pseudo = sociale_discussions.emetteur OR users.pseudo = sociale_discussions.destinataire WHERE emetteur=:compte AND users.actif=:actif AND sociale_discussions.actif=:actif OR destinataire=:compte AND users.actif=:actif AND sociale_discussions.actif=:actif");
        $x->execute([
        'compte' => $_SESSION['pseudo'],
        'actif' => 'yes'
        ]);
        $nb_message = $x->rowCount();
    
        if ($nb_message == 0) {
        echo "<div class='social-content'>";
        echo "<p>".$message_social_compte_discussions_undefined."</p>";
        echo "</div>";
        }else{
        
        while($result = $x->fetch(PDO::FETCH_ASSOC)){

            if($result['pseudo'] <> $_SESSION['pseudo']){

            echo "<div class='social-content'>";
            
            echo "<a href='messages.php?id_profil=".$result['pseudo']."'><div class='boxsocialprofil'>";

            echo "<div class='boxsocialelements'>" . $result['profil_picture'] . "</div>";
      
            echo "<div class='boxsocialelements'><h2>" . $result['prenom'] . " - " . $result['nom'] . "</h2></div>";
      
            echo "</div></a><br/>";
    
            echo "</div>";
        
        }
    
        }
    }
    }else{
        echo "<div class='social-content'>";
        echo "<p>".$message_compte_undefined."</p>";
        echo "</div>";
    }

    echo "</div>";
	 
    echo "</body>
    </html>";
?>