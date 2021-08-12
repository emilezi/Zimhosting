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
    
   echo "<h1><center>".$titre_header_admin_connexion."</center></h1>";
    
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
   
   $st = $db->prepare("SELECT * FROM ip_client");
      $st->execute();
      $st_value = $st->rowCount();
   
   echo "<p>" . $message_admin_statistique_connexions . $st_value . "</p>";

   echo "<br/><br/>";
	 
	echo "<h3>".$titre_admin_action."</h3>";
	 
	echo "<hr/>";
	 
	echo "<a href='delinfoclient.php'><p>".$text_button_del_listing."</p></a>";
   
   echo "</div>";
       
   echo "<div id='admin-element'>";
       
   echo "<div class='admin-content'>";
  	
  	$c = $db->prepare("SELECT * FROM ip_client");
  	$c->execute();
  	$nb_sujets = $c->rowCount();
  	
  	if ($nb_sujets == 0) {
	
	echo "<p>".$message_admin_connexions_undefined."</p>";
	
	}else{
		
		echo "<h1>".$titre_admin_connexions_appareils."</h1><hr/><br/>";
	
	while($result = $c->fetch(PDO::FETCH_ASSOC)){
	
	echo "<p>Appareil : " . $result['appareil'] . " | Adresse IP : " . $result['ip'] . " | Navigateur : " . $result['navigateur'] . " | Nombre de connexions : " . $result['connexions'] . " | Dernière date de connexion : " . $result['lastconnexion'] . "<br/><br/><p>";

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