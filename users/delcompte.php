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
	<meta charset='utf-8'/>
	<link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
    <link rel='stylesheet' href='../style.css' />
    <title>".$titre_compte_del."</title>
  	</head>";
  
  	echo "<body id=accueil>";
  
  	echo "<div class='contenue-small'>";
  
  	if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
  	{
  
 	 if($_SESSION['class'] == "administrateur"){
	echo "<h2>".$titre_compte_information."</h2>";
	echo "<hr/>";
   	echo "<p>".$message_compte_del_erreur1."</p>";
   	}elseif(($_SESSION['class'] == "officiel")){
	echo "<h2>".$titre_compte_information."</h2>";
	echo "<hr/>";
	echo "<p>".$message_compte_del_erreur2."</p>";
   	}else{

	echo "<h2>".$titre_compte_information."</h2>";
	echo "<hr/>";
  	echo "<p>".$message_compte_del_info1."</p>
  
  	<form method='post'>
   	<input type='radio' name='delradio' value='".$text_form_no."' checked />".$text_form_no."
   	<input type='radio' name='delradio' value='".$text_form_yes."' />".$text_form_yes."<br/><br/>
   	<input type='submit' name='submit' value='".$text_button_validate."'>
   	</form>";
   
   if(isset($_POST["submit"])){
   	extract($_POST);
   	
   	$q = $db->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
   	$q->execute(['pseudo' => $_SESSION['pseudo']]);
   	$result = $q->fetch();
   	
   if($delradio == $text_form_yes)
   	{
   	 	$q = $db->prepare("UPDATE users SET actif = :actif WHERE email = :email");
   		  	$q->execute([
   		  	'actif' => "del",
   		  	'email' => $_SESSION['email']
   		  	]);
   		  	
   		  	$f = $db->prepare("UPDATE forum_sujet SET actif = :actif WHERE auteur=:auteur");
   		  	$f->execute([
   		  	'actif' => "del",
   		  	'auteur' => $_SESSION['pseudo']
   		  	]);
   		  	
   		  	$c = $db->prepare("UPDATE forum_reponses SET actif = :actif WHERE auteur=:auteur");
   		  	$c->execute([
   		  	'actif' => "del",
   		  	'auteur' => $_SESSION['pseudo']
   		  	]);
   		  	
   		  	$d = $db->prepare("UPDATE `commentaire` SET actif = :actif WHERE auteur=:auteur");
   		  	$d->execute([
   		  	'actif' => "del",
   		  	'auteur' => $_SESSION['pseudo']
				 ]);
			
			$e = $db->prepare("UPDATE `sociale_poste` SET actif = :actif WHERE auteur=:auteur");
   		  	$e->execute([
   		  	'actif' => "del",
   		  	'auteur' => $_SESSION['pseudo']
				 ]);
			
			$f = $db->prepare("UPDATE `sociale_compte_statue` SET actif = :actif WHERE name_compte=:name_compte");
   		  	$f->execute([
   		  	'actif' => "del",
   		  	'name_compte' => $_SESSION['pseudo']
				 ]);
			
			$g = $db->prepare("UPDATE `sociale_compte_statue` SET actif = :actif WHERE with_compte=:with_compte");
   		  	$g->execute([
   		  	'actif' => "del",
   		  	'with_compte' => $_SESSION['pseudo']
				 ]);

			$h = $db->prepare("UPDATE `blog_poste` SET actif = :actif WHERE auteur=:auteur");
   		  	$h->execute([
			'actif' => "del",
			'auteur' => $_SESSION['pseudo']
			]);
				 
			$i = $db->prepare("UPDATE `search_data` SET actif = :actif WHERE auteur=:auteur");
   		  	$i->execute([
			'actif' => "del",
			'auteur' => $_SESSION['pseudo']
   		  	]);

			$j = $db->prepare("UPDATE `sociale_discussions` SET actif = :actif WHERE emetteur=:emetteur OR destinataire=:destinataire");
   		  	$j->execute([
			'actif' => "del",
			'destinataire' => $_SESSION['pseudo'],
			'emetteur' => $_SESSION['pseudo']
   		  	]);

   		  	echo "<p>".$message_compte_del_info2."</p>";
   		  	session_destroy();
			header('Location: compte.php');
   		  }else{
   header('Location: ../users/compte.php');
   }
 	}
 	}
 	}else{
	header('Location: ../index.php');
	}
  
  	echo "</div>";
  
  	echo "</div>";
  
  echo 
  "</body>
  </html>";

?>