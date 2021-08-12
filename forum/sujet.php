<?php
	session_start();
	include '../php/database.php'; 
	include '../php/language.php';
	include '../php/webtxt.php';
	global $db;
	
	if (!isset($_GET['id_sujet_a_lire'])) {

	echo "<html>";
	
	echo
	"<head>
   <meta charset='utf-8'/>
   <link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
   <link rel='stylesheet' href='../style.css' />
   <title>".$message_forum_sujet_undefined."</title>
   </head>";
    
   echo "<body id=forum>";

   echo "<div id='header'>
    <h1>
    <center>
    ".$message_forum_sujet_undefined."
    <center>
    </h1>
    </div>";
    
   include 'nav.php';
	
   include 'aside.php';

	echo"
	<div id='forum-element'>
	<div class='forum-content'>
	<p>".$message_forum_sujet_undefined."</p>
	</div>
	</div>";
   
   }else{
   	
  	$p = $db->prepare("SELECT * FROM forum_sujet WHERE id_sujet=:id_sujet AND actif=:actif");
  	$p->execute([
	  'id_sujet'=> $_GET['id_sujet_a_lire'],
	  'actif' => 'yes'
  	]);
  
  	$presult = $p->fetch();
  
  	if($presult ==  true){
  
  	echo
  	"<html>
    <head>
	<meta charset='utf-8'/>
	<link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
    <link rel='stylesheet' href='../style.css' />
    <title>" . $presult['titre'] . "</title>
    </head>
    
   <body id=forum>";
   	
	echo "<div id='header'>
    <h1>
    <center>
    " . $presult['titre'] . "
    <center>
    </h1>
    </div>";
    
   include 'nav.php';

   include 'aside.php';
  
  	$q = $db->prepare("SELECT * FROM forum_reponses WHERE correspondance_sujet=:correspondance_sujet AND actif=:actif ORDER BY date_reponse ASC");
  	$q->execute([
  	'correspondance_sujet'=> $presult['titre'],
  	'actif'=> "yes"
  	]);
  
  	$i = 0;
  	
  	echo "<div id='forum-element'>";
	
	while($result = $q->fetch(PDO::FETCH_ASSOC)){
	
	sscanf($result['date_reponse'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);
	
	$i=$i+1;

	if($result['type'] == "img"){

	echo "<div class='forum-content'>";
	
	echo "<p style='float:left;'>" . $result['auteur'] . "</p>";

	echo "<p style='float:right;'>" . $jour . "-" . $mois . "-" . $annee . " " . $heure . ":" . $minute . "</p><br/><br/>";

	echo "<div class='forum-content-img'>";

	echo "<p>" . $result['message'] . "</p><br/>";

	echo "</div>";
	
	if($i == 1){
	}elseif((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])) && ($result['auteur'] == $_SESSION['pseudo'])){
		
		echo "<form action='delreponse.php?message_a_supprimer=".$result['id_reponses']."&id_sujet_a_lire=".$_GET['id_sujet_a_lire']."' method='post'>
		<input type='submit' name='delreponse".$result['id_reponses']."' value='Supprimer'>
		</form>";
			
		}
	
	echo "</div>";

	}else{
	
	echo "<div class='forum-content'>";

	echo "<p style='float:left;'>" . $result['auteur'] . "</p>";

	echo "<p style='float:right;'>" . $jour . "-" . $mois . "-" . $annee . " " . $heure . ":" . $minute . "</p><br/><br/>";

	echo "<p>" . $result['message'] . "</p><br/>";
	
	if($i == 1){
	}elseif((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])) && ($result['auteur'] == $_SESSION['pseudo'])){
	
	echo "<div class='btn-content'>";
	
	echo "<form action='edit_message.php?message_a_modifier=".$result['id_reponses']."' method='post'>
	<input type='submit' name='edit_reponses".$result['id_reponses']."' value='".$text_button_edit."'>
	</form>";
	
	echo "<form action='delreponse.php?message_a_supprimer=".$result['id_reponses']."&id_sujet_a_lire=".$_GET['id_sujet_a_lire']."' method='post'>
	<input type='submit' name='delreponse".$result['id_reponses']."' value='".$text_button_del."'>
	</form>";
	
	echo "</div>";
	
	}
	
	echo "</div>";

	}
	}
	
	if(isset($result)){ 

	echo "<div class='forum-content'>";

	include 'new_reponse.php'; 

	echo "</div>";

	echo "<div class='forum-content'>";

	include 'new_picture.php'; 

	echo "</div>";
	
	}
	
	echo "</div>";
	
	echo "</div>";
	
	}else{
		echo "<html>";
	
		echo
		"<head>
	   <meta charset='utf-8'/>
	   <link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
	   <link rel='stylesheet' href='../style.css' />
	   <title>".$message_forum_sujet_undefined."</title>
	   </head>";
		
	   echo "<body id=forum>";
	
	   echo "<div id='header'>
		<h1>
		<center>
		".$message_forum_sujet_undefined."
		<center>
		</h1>
		</div>";
		
	   include 'nav.php';
		
	   include 'aside.php';
	
		echo"
		<div id='forum-element'>
		<div class='forum-content'>
		<p>".$message_forum_sujet_undefined."</p>
		</div>
		</div>";
	}
	
}

	echo
	"</body>
	</html>";

?>
