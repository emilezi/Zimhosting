<?php
	session_start();
	include '../php/database.php'; 
	include '../php/language.php';
	include '../php/webtxt.php';
	global $db;

	 echo "
	 <html>
  	 <head>";
    
	echo "<meta charset='utf-8' />
	<link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
    <link rel='stylesheet' href='../style.css' />
    <title>".$titre_header_admin."</title>
  	 </head>";
  
  	 echo "<body id=accueil>";
  
  	 echo "<div id='header'>";
    
    echo "<h1><center>".$titre_header_admin_users_delet."</center></h1>";
    
    echo"</div>";
    
	include 'nav.php';
 
  	 if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
  	 {
  	 if($_SESSION['class'] == "administrateur"){

	echo "<div id='admin-nav'>";

	echo "<h3>".$titre_admin."</h3>";
	 
	echo "<hr/>";
	 
	echo "<a href='index.php'><p>".$message_admin_return_index."</p></a>";
	 
	echo "<br/><br/>";
	 
	echo "<h3>".$titre_admin_action."</h3>";
	 
	echo "<hr/>";
	 
	echo "<a href='delusersdelete.php'><p>".$text_button_del_listing."</p></a>";
	 
	echo "</div>";

	echo "<div id='admin-element'>";
  	
  	 $q = $db->prepare("SELECT * FROM users WHERE actif = :actif");
  	 $q->execute(['actif' => "del"]);
	 $nb_utilisateurs = $q->rowCount();

	 if ($nb_utilisateurs == 0) {
	echo "<div class='admin-content'>";
	echo '<p>'.$message_admin_users_deleted_undefined.'</p>';
	echo "</div>";
	 }else{
	
	 while($result = $q->fetch(PDO::FETCH_ASSOC)){

	echo "<div class='admin-content'>";
	
	echo "<h2>".$result['pseudo']."</h2>";
	
	echo "<p>Nom complet : ".$result['prenom']." - ".$result['nom']."<br/><p>";
	
	echo "<p>Email : ".$result['email']."<br/><br/><p>";

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