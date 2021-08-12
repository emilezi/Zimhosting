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
    
   echo "<h1><center>".$titre_header_admin_comment."</center></h1>";
    
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

   $st = $db->prepare("SELECT * FROM commentaire WHERE actif=:actif");
	$st->execute([
	'actif' => "yes"
	]);
	$st_value = $st->rowCount();

   echo "<p>" . $message_admin_comment . $st_value . "</p>";

   echo "</div>";
    
  echo "<div id='admin-element'>";

	$c = $db->prepare("SELECT * FROM commentaire WHERE actif=:actif");
	$c->execute([
	'actif' => "yes"
	]);
	$nb_sujets = $c->rowCount();

	if ($nb_sujets == 0) {
	echo "<div class='admin-content'>";
	echo '<p>'.$message_admin_comment_undefined.'</p>';
	echo "</div>";
	}
	else {
	
	while($result = $c->fetch(PDO::FETCH_ASSOC)){

	echo "<div class='admin-content'>";
	
	echo '<h2>' . $result['name_page'] . '</h2>';

	echo '<hr/>';
	
	echo '<p>Posté par : ' . $result['auteur'] . '<p>';
	
	echo '<p>Commentaire : ' . $result['message'] . '<p>';

	echo '<p>Poster le : ' . $result['date'] . '<p>';

	echo "<hr/ class='hr-form'><br/>";
	
	echo "<form action='../comment/delcomments.php?message_a_supprimer=".$result['id_commentaire']."' method='post'>
	<input type='submit' name='delcomments".$result['id_commentaire']."' value='".$text_button_del."'>
	</form>";

	echo "</div>";
	
	}
	}

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