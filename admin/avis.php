<?php
	session_start();
	include '../php/database.php'; 
	include '../php/language.php';
	include '../php/webtxt.php';
	global $db;

	echo "<html>";
   
   echo
   "<head>
   <meta charset='utf-8' />
   <link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
   <link rel='stylesheet' href='../style.css' />
   <title>".$titre_header_admin."</title>
   </head>";
  
   echo "<body id=accueil>";
  
   echo "<div id='header'>";
    
   echo "<h1><center>".$titre_header_admin_avis."</center></h1>";
    
   echo "</div>";
  
   include 'nav.php';
 
   if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {
   if($_SESSION['class'] == "administrateur"){

	echo "<div id='admin-nav'>";

   	echo "<h3>".$titre_admin."</h3>";

   	echo "<hr/>";

   	echo "<a href='index.php'><p>".$message_admin_return_index."</p></a>";

   	echo "<br/><br/>";

   	echo "<h3>".$titre_admin_statisiques."</h3>";

   	echo "<hr/>";

   	$st1 = $db->prepare("SELECT * FROM avis WHERE repondue=:repondue");
	$st1->execute([
	'repondue' => "yes"
	]);
	$st_value1 = $st1->rowCount();

	$st2 = $db->prepare("SELECT * FROM avis WHERE repondue=:repondue");
	$st2->execute([
	'repondue' => "no"
	]);
	$st_value2 = $st2->rowCount();

	echo "<p>" . $message_admin_statistique_avis_not_answered . $st_value2 . "</p>";

   echo "<p>" . $message_admin_statistique_avis_answered . $st_value1 . "</p>";

   echo "<p>" . $message_admin_statistique_avis_total . ($st_value1+$st_value2) . "</p>";

   echo "</div>";
    
  echo "<div id='admin-element'>";
  	
  	echo "<div class='admin-content'>";
  	
	  echo "<h1>".$titre_admin_avis."</h1>";
	  echo "<hr/>";

	$c = $db->prepare("SELECT * FROM avis WHERE repondue=:repondue");
	$c->execute([
	'repondue' => "no"
	]);
	$nb_sujets = $c->rowCount();

	if ($nb_sujets == 0) {
	echo "<p>".$message_admin_avis_undefined."</p>";
	}
	else{
	
	while($result = $c->fetch(PDO::FETCH_ASSOC)){
		
	sscanf($result['date'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);
	
	echo '<h2>' . $result['prenom'] . ' - ' . $result['nom'] . '</h2>';
	
	echo '<p>' . $result['email'] . '<br/><p>';
	
	echo '<p>' . $result['commentaire'] . '<br/><br/><p>';
	
	echo "<p>" . $jour . " - " . $mois . " - " . $annee . " " . $heure . " : " . $minute . "<p>";
	
	echo "<form action='editavis.php?avis_a_valider=".$result['id_avis']."' method='post'>";
	echo "<input type='submit' name='editavis".$result['id_avis']."' value='".$text_button_reply."'>";
	echo "</form>";
	
	}
	}
  	
  	echo "</div>";
  	
  	echo "<div class='admin-content'>";
  	
	  echo "<h1>".$titre_admin_avis_answered."</h1>";
	  
	  echo "<hr/>";

	$c = $db->prepare("SELECT * FROM avis WHERE repondue=:repondue");
	$c->execute([
	'repondue' => "yes"
	]);
	$nb_sujets = $c->rowCount();

	if ($nb_sujets == 0) {
	echo '<p>'.$message_admin_avis_undefined.'</p>';
	}
	else {
	
	while($result = $c->fetch(PDO::FETCH_ASSOC)){
		
	sscanf($result['date'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);
	
	echo '<h2>' . $result['prenom'] . ' - ' . $result['nom'] . '</h2>';
	
	echo '<p>' . $result['email'] . '<br/><p>';
	
	echo '<p>' . $result['commentaire'] . '<br/><br/><p>';
	
	echo "<p>" . $jour . " - " . $mois . " - " . $annee . " " . $heure . " : " . $minute . "<p>";
	
	}
	}
  	
  	echo "</div>";

	echo "</div>";
  	
  	}else{

	echo "<div id='admin-nav'>";

	echo "<h3>".$titre_admin."</h3>";
 
	echo "<hr/>";
 
	echo "<p>".$message_admin_compte_admin_undefined_2."</p>";
 
	echo "</div>";

	echo "<div id='admin-element'>";
  		
	echo "<div class='admin-content'>";	
  		
  	echo "<p>".$message_admin_compte_admin_undefined."</p>";
  	
  	echo "</div>";

	echo "</div>";
  	
  	}
    }else{
    header('Location: ../index.php');
    }
  
   echo
   "</body>
   </html>";

?>
