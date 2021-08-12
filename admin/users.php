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
   <title>".$titre_header_admin."</title>
   </head>";
  
   echo "<body id=accueil>";
  
   echo "<div id='header'>";
    
   echo "<h1><center>".$titre_header_admin_users."</center></h1>";
    
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

   $st = $db->prepare("SELECT * FROM users WHERE actif=:actif");
  $st->execute([
    'actif' => "yes"
  ]);
   $st_value = $st->rowCount();

   echo "<p>" . $message_admin_statistique_users . $st_value . "</p>";

   	echo "<br/><br/>";
	 
	echo "<h3>".$titre_admin_action."</h3>";

   echo "<hr/>";

   echo "<p><a href='usersdelete.php'>".$message_admin_users_deleted."</a></p>";

   echo "</div>";
    
   echo "<div id='admin-element'>";
  	
  	$q = $db->prepare("SELECT * FROM users");
  	$q->execute();

	$c = $db->prepare("SELECT * FROM users");
	$c->execute();
	$nb_sujets = $c->rowCount();

	if ($nb_sujets == 0) {
	echo "<div class='admin-content'>";
	echo '<p>'.$message_admin_users_undefined.'</p>';
	echo "</div>";
	}else{
	
	while($result = $q->fetch(PDO::FETCH_ASSOC)){
	
	if($result['actif'] == "del"){
	
	}else{

	echo "<div class='admin-content'>";
	
	echo "<h2>" . $result['pseudo'] . "</h2>";
	
	echo "<p>Nom complet :" . $result['prenom'] . "-" . $result['nom'] . "<br/><p>";
	
	echo "<p>Email :" . $result['email'] . "<p>";
	
	echo "<p>Actif :" . $result['actif'] . "<p>";
	
	echo "<form action='delusers.php?nom_du_compte_a_supprimer=".$result['pseudo']."' method='post'>
	<input type='submit' name='delusers".$result['pseudo']."' value='".$text_button_del."'>
	</form>";

	echo "</div>";
	
	}

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
  
	echo "</body>
	</html>";

?>