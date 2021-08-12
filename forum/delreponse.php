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
   <title>".$titre_header_forum_delcommentaire."</title>
  	</head>";
  
  	echo "<body id=forum>";
    
   if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {
    
   if(isset($_GET['message_a_supprimer'])){

	echo
	"<div id='header'>
	<h1>
	<center>
	".$titre_header_forum_delcommentaire."
	<center>
	</h1>
	</div>";
				 
	include 'nav.php';
				 
	include 'aside.php';
			   
	echo "<div id='forum-element'>";
   		  	
   	$c = $db->prepare("SELECT * FROM forum_reponses WHERE id_reponses=:id_reponses");
   	$c->execute([
   	'id_reponses'=> $_GET['message_a_supprimer']
   	]);
	$result = $c->fetch();
   		  	
   	if($result == true){
   	if(($result['auteur']) == ($_SESSION['pseudo'])){

	echo "<div class='forum-content'>";
  
  	echo "<p>".$message_forum_del_image."</p>";
  
  	echo "<form method='post'>
   <input type='radio' name='delradio' value='".$text_form_no."' checked />".$text_form_no."
   <input type='radio' name='delradio' value='".$text_form_yes."' />".$text_form_yes."<br/><br/>
   <input type='submit' name='submit' value='".$text_button_validate."'>
   </form>";
   
   if(isset($_POST["submit"])){
   	extract($_POST);
   if($delradio == $text_form_yes)
   {
   		  	$f1 = $db->prepare("DELETE FROM `forum_reponses` WHERE id_reponses=:id_reponses");
   		  	$f1->execute([
   		  	'id_reponses' => $_GET['message_a_supprimer']
   		  	]);

   		  	header('Location: sujet.php?id_sujet_a_lire='.$_GET['id_sujet_a_lire']);
   		  }else{
   	header('Location: sujet.php?id_sujet_a_lire='.$_GET['id_sujet_a_lire']);
   	}
	}
  
  	echo "</div>";
  
  	}else{
  	
	echo "<div class='forum-content'>";	
  	
  	echo "<p>".$message_forum_sujet_undefined."</p>";
  
  	echo "</div>";
  	}
  	}else{
  	
	echo "<div class='forum-content'>";
  	
	echo "<p>".$message_forum_sujet_undefined."</p>";
  
  	echo "</div>";
  	}
  	}else{
  	
	echo "<div class='forum-content'>";
  	
	echo "<p>".$message_forum_sujet_undefined."</p>";
  
  	echo "</div>";
  	}
  	}else{
	header('Location: ../index.php');
	}
  
  	echo "</div>";
  
  echo
  "</body>
  </html>";
  
?>
