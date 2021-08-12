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
    <title><?=$titre_header_social_mypostes?></title>
    </head>

    <?php

    echo "<body id=social>";
    
    echo "<div id='header'>
    <h1>
    <center>
    ".$titre_header_social_mypostes."
    <center>
    </h1>
    </div>";
    
    include 'nav.php';

    include 'aside.php';

    echo "<div id='social-element'>";
     
    if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {

    $q = $db->prepare("SELECT * FROM sociale_poste WHERE auteur=:auteur ORDER BY date_poste ASC");
	$q->execute([
    'auteur' => $_SESSION['pseudo'],
	]);
	$nb_postes = $q->rowCount();

	if ($nb_postes == 0) {
    echo "<div class='social-content'>";
    echo "<p>".$message_social_undefined."</p>";
    echo "</div>";
	}else{
    
    while($result = $q->fetch(PDO::FETCH_ASSOC)){
	
        sscanf($result['date_poste'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde); 
        
        echo "<div class='social-content'>";
        
        echo "<p>" . $result['poste'] . "</p>";

        echo "<br/>";

        echo "<p>" . $message_social_poste_date . $annee . " - " . $mois . " - " . $jour . "</p>";

        echo "<br/>";

        echo "<div class='btn-content'>";
	
	    echo "<form action='del_poste.php?id_poste_a_supprimer=".$result['id_poste']."' method='post'>
        <input type='submit' name='del_poste".$result['id_poste']."' value='".$text_button_del."'>
        </form>";

	echo "</div>";

        echo "</div>";
    
        }
    
   }
}else{
    echo "<div class='social-content'>";
    echo '<p>'.$message_social_poste_compte_undefined.'</p>';
    echo "</div>";
}

    echo "</div>";
	 
    echo "</body>
    </html>";
?>