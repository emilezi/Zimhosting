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
   <meta name='google-site-verification' content='l9Ej9sm0nEmflUOzZPmM-c31fKoqkZ4Js4HeVvsrgzU' />
   <meta charset='utf-8'/>
   <link rel="icon" type="image/png" href="../img/icones/zimhostingicone.png">
   <link rel='stylesheet' href='../style.css' />
   <title><?=$titre_header_forum?></title>
   </head>
   <?php
    
   echo "<body id=forum>";
    
    echo
    "<div id='header'>
    <h1>
    <center>
    ".$titre_header_forum."
    <center>
    </h1>
    </div>";
    
    include 'nav.php';
    
    include 'aside.php';
    
    echo "<div id='forum-element'>";

	$q = $db->prepare("SELECT * FROM forum_sujet WHERE actif=:actif AND langue=:langue");
	$q->execute([
	'actif' => "yes",
    'langue' => $set_language
	]);
	$nb_sujets = $q->rowCount();

	if ($nb_sujets == 0) {
    echo "<div class='forum-content'>";
    echo '<p>'.$message_forum_undefined.'</p>';
    echo "</div>";
	}
	else {
	
	while($result = $q->fetch(PDO::FETCH_ASSOC)){
	
    sscanf($result['date_derniere_reponse'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde); 
    
    echo "<div class='forum-content'><a href='./sujet.php?id_sujet_a_lire=" . $result['id_sujet'] . "'>";
	
    echo "<h2>" . $result['titre'] . " - " . $result['categorie'] . "</h2>";
	
	echo "<p>" . $result['auteur'] . " - " . $jour . " - " . $mois . " - " . $annee . " " . $heure . " : " . $minute . "</p></a><br/>";
	
	if(isset($_SESSION['pseudo']) && ($_SESSION['class'] == "administrateur")){
	
	echo "<form action='delsujet.php?id_sujet_a_supprimer=".$result['id_sujet']."' method='post'>
	<input type='submit' name='delsujet".$result['id_sujet']."' value='".$text_button_del."'>
	</form>";
    }
    
    echo "</div>";

	}
	}

	echo "</div>";

	echo
	"</body>
	</html>";

?>