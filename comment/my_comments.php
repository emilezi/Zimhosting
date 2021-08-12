<?php
	session_start();
	include '../php/database.php'; 
	include '../php/language.php';
	include '../php/webtxt.php';
	global $db;


	echo "<html>";
  
	echo "<head>
	<meta charset='utf-8' />
	<link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
    <link rel='stylesheet' href='../style.css' />
    <title>".$titre_header_compte_space."</title>
    </head>";
  
  	echo "<body id=accueil>";
    
	echo "<div id='header''>";
    
   echo "<h1><center>".$titre_header_compte_space."</center></h1>";
    
   echo "</div>";
    
   include 'nav.php';
    
   echo "<div id='compte-aside'>";

   if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {
    
	echo "<h2>".$titre_compte_profil."</h2>";
	echo "<hr/>";
    echo "<p>" . $titre_compte_name . $_SESSION['prenom']. " " . $_SESSION['nom'] . "</p>";
  	echo "<p>" . $titre_compte_pseudo . $_SESSION['pseudo'] . "</p>";
  	echo "<p>" . $titre_compte_mail . $_SESSION['email'] . "</p>";
  	
    
   }else{
    
    echo "<h2 class='indisplay'>".$titre_compte."</h2>
    <hr class='indisplay'/>
    <p><a href='../users/compte.php'>".$message_commentaire_compte_undefined."</a></p>
    ";
	
   }

   echo "</div>";
    
   echo "<div id='compte-element'>";

   echo "<div class='contenue-large'>";
  
  	if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
  	{
  	$q = $db->prepare("SELECT * FROM commentaire WHERE auteur=:auteur AND actif=:actif");
  	$q->execute([
  	'actif' => "yes",
  	'auteur' => $_SESSION['pseudo']
	]);
	$nb_sujets = $q->rowCount();

	if ($nb_sujets == 0) {
	echo "<h2>".$titre_compte_commentaire."</h2>";
	echo "<hr/>";
	echo "<p>".$message_commentaire_compte_commentaire_undefined."</p>";
	}
	else {
	
	echo "<h2>".$titre_compte_commentaire."</h2>";
	echo "<hr/><br/>";
	
	while($result = $q->fetch(PDO::FETCH_ASSOC)){
	
	echo "<p>Poster sur : &lt;&lt; " . $result['name_page'] . " &gt;&gt;<p>";
	
	echo "<p>Commentaire : " . $result['message'] . "<p>";

	echo "<hr/ class='hr-form'><br/>";
	
	echo "<form action='delcomments.php?message_a_supprimer=".$result['id_commentaire']."' method='post'>
	<input type='submit' name='delcomments".$result['id_commentaire']."' value='".$text_button_del."'>
	</form>";

	echo "<br/>";
	
	if (isset ($_POST["del".$result['id_commentaire']])){
	
	header('Location: delcomments.php?message_a_supprimer='.$result['id_commentaire']);
   exit;	
	
	}
	}
	}
	}else{
	echo "<h2>".$titre_compte_information."</h2>";
	echo "<hr/>";
	echo "<p>".$message_commentaire_commentaire_compte_undefined."</p>";
	}
	
	echo "</div>";
	
	echo "</div>";
  
  echo 
  "</body>
	</html>";

?>