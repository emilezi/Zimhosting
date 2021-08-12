<?php
	session_start();
	include '../php/database.php'; 
	include '../php/language.php';
	include '../php/webtxt.php';
	global $db;

	echo
	"<html>";
	
	echo"
  	<head>
	<meta charset='utf-8' />
	<link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
   <link rel='stylesheet' href='../style.css' />
   <title>".$titre_commentaire_del."</title>
   </head>";
  
	echo "<body id=accueil>";
    
	echo "<div class='contenue-small'>";
    
   if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {
    
   if(isset($_GET['message_a_supprimer'])){
   		  	
   		  	$c = $db->prepare("SELECT * FROM commentaire WHERE id_commentaire=:id_commentaire AND actif=:actif");
   		  	$c->execute([
   		  	'id_commentaire' => $_GET['message_a_supprimer'],
			'actif' => 'yes'
   		  	]);
   		  	$result = $c->fetch();
   		  	
   		  	if($result == true){
   		  	if((($result['auteur'] == $_SESSION['pseudo']) || ($_SESSION['class'] == "administrateur"))){
  
	  echo "<p>".$message_commentaire_del."</p>";
	  
	  echo "<hr/>";
  
  	echo "<form method='post'>
   <input type='radio' name='delradio' value='".$text_form_no."' checked />".$text_form_no."
   <input type='radio' name='delradio' value='".$text_form_yes."' />".$text_form_yes."<br/><br/>
   <input type='submit' name='submit' value='".$text_button_validate."'>
   </form>";
   
   if(isset($_POST["submit"])){
   	extract($_POST);
   if($delradio == $text_form_yes)
   	{
   	 	$d = $db->prepare("DELETE FROM `commentaire` WHERE id_commentaire=:id_commentaire");
   		  	$d->execute([
   		  	'id_commentaire' => $_GET['message_a_supprimer']
   		  	]);
   		  	
   		  	header('Location: my_comments.php');
   		  }else{
   header('Location: my_comments.php');
   }
 	}
  
  	}else{

	echo "<h2>".$titre_compte_information."</h2>";
	echo "<hr/>";
	echo "<p>".$message_commentaire_commentaire_undefined."</p>";
	  
  	}
  	}else{

	echo "<h2>".$titre_compte_information."</h2>";
	echo "<hr/>";
	echo "<p>".$message_commentaire_commentaire_undefined."</p>";
  
  	}
  	}else{

	echo "<h2>".$titre_compte_information."</h2>";
	echo "<hr/>";
	echo "<p>".$message_commentaire_commentaire_undefined."</p>";
  
  	}
  	}else{
	header('Location: ../index.php');
	}
  
  	echo "</div>";
  
  	echo
  	"</body>
  	</html>";

?>