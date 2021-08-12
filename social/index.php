<?php 
    session_start();
    include '../php/database.php'; 
    include '../php/infoclient.php';
    include '../php/language.php';
	include '../php/webtxt.php';
    global $db;

    echo "<html>";
    ?>

    <head>
    <meta charset="utf-8" />
    <link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
    <link rel="stylesheet" href="../style.css" />
    <title><?=$titre_header_social?></title>
    </head>

    <?php

    echo "<body id=social>";
    
    echo "<div id='header'>
    <h1>
    <center>
    ".$titre_header_social." (Beta)
    <center>
    </h1>
    </div>";
    
    include 'nav.php';

    include 'aside.php';

    echo "<div id='social-element'>";

    if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {

    $q = $db->prepare("SELECT * FROM sociale_poste post INNER JOIN sociale_compte_statue compte ON compte.name_compte = post.auteur WHERE auteur <> :user AND statue_friends=:statue_friends AND with_compte=:user AND post.actif=:actif AND compte.actif=:actif ORDER BY date_poste ASC");
	$q->execute([
    'user' => $_SESSION['pseudo'],
    'statue_friends' => 'friends',
    'actif' => 'yes'
	]);
	$nb_postes = $q->rowCount();

	if ($nb_postes == 0) {
    echo "<div class='social-content'>";
    echo "<p>".$message_social_compte_index_undefined."</p>";
    echo "</div>";
	}else{
    
    while($result = $q->fetch(PDO::FETCH_ASSOC)){
	
        sscanf($result['date_poste'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde); 
        
        echo "<div class='social-content'>";
        
        echo "<p>" . $result['poste'] . "</p>";

        echo "<br/";

        echo "<p>" . $message_social_poste_date . $annee . " - " . $mois . " - " . $jour . "</p>";
        
        echo "</div>";
    
        }
    
   }

    }else{
    $q = $db->prepare("SELECT * FROM sociale_poste WHERE confidentiality=:confidentiality AND actif=:actif ORDER BY date_poste ASC");
	$q->execute([
    'confidentiality' => "public",
	'actif' => "yes"
	]);
	$nb_postes = $q->rowCount();

	if ($nb_postes == 0) {
    echo "<div class='social-content'>";
    echo "<p>".$message_social_index_compte_undefined."</p>";
    echo "</div>";
	}else{
    
    while($result = $q->fetch(PDO::FETCH_ASSOC)){
	
        sscanf($result['date_poste'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde); 
        
        echo "<div class='social-content'>";
        
        echo "<p>" . $result['poste'] . "</p>";

        echo "<br/";

        echo "<p>" . $message_social_poste_date . $annee . " - " . $mois . " - " . $jour . "</p>";
        
        echo "</div>";
    
        }
    
   }
}

    echo "</div>";
	 
    echo "</body>
    </html>";
?>