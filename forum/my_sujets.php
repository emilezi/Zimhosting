<?php 
	session_start();
	include '../php/database.php'; 
	include '../php/language.php';
	include '../php/webtxt.php';
	global $db;
	
	echo
	"<html>";
	
	echo
  	"<head>
	<meta charset='utf-8' />
	<link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
   <link rel='stylesheet' href='../style.css' />
   <title>".$titre_header_forum_mysujet."</title>
   </head>";
  
  	echo "<body id=forum>";
    
   echo "<div id='header'>";
    
   echo "<h1><center>".$titre_header_forum_mysujet."</center></h1>";
    
   echo "</div>";
    
   include 'nav.php';

   include 'aside.php';
    
	echo "<div id='forum-element'>";
  
  	if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
  	{
  	
  	$q = $db->prepare("SELECT * FROM forum_sujet WHERE auteur=:auteur AND actif=:actif");
  	$q->execute([
	  'auteur' => $_SESSION['pseudo'],
	  'actif' => 'yes'
	]);
	$nb_sujets = $q->rowCount();

	if ($nb_sujets == 0) {
	echo "<div class='forum-content'>";
	echo '<p>'.$message_forum_compte_sujet_undefined.'</p>';
	echo "</div>";
	}
	else{
	
	$i = 0;
	
	while($result = $q->fetch(PDO::FETCH_ASSOC)){
	
	$i = $i +1;
	
	echo "<div class='forum-content'><a href='./sujet.php?id_sujet_a_lire=".$result['id_sujet']."'>";

	echo "<h2>".$result['titre']." - ".$result['categorie']."</h2>";
	
	echo "<p>".$i." - ".$result['date_derniere_reponse']."</p></a><br/>";
	
	echo "<div class='btn-content'>";
	
	echo "<form action='edit_sujet.php?id_sujet_a_modifier=".$result['id_sujet']."' method='post'>
	<input type='submit' name='edit_sujet".$result['id_sujet']."'value='".$text_button_edit."'>
	</form>";
	
	echo "<form action='delsujet.php?id_sujet_a_supprimer=".$result['id_sujet']."' method='post'>
	<input type='submit' name='delsujet".$result['id_sujet']."' value='".$text_button_del."'>
	</form>";

	echo "</div>";
	
	echo "</div>";

	}		
	}
	}else{
	echo "<div class='forum-content'>";
	echo "<p>".$message_forum_sujet_compte_undefined."</p>";
	echo "</div>";
	}
	
	echo "</div>";
  
  	echo
  	"</body>
	</html>";
	
?>
