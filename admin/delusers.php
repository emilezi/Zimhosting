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
    
    
	echo "<div class='contenue-small'>";
    
  
  	if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
  	{
  	if(($_SESSION['class'] == "administrateur")){
  		if(isset($_GET['nom_du_compte_a_supprimer'])){
  
  	$x = $db->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
   	$x->execute(['pseudo' => $_GET['nom_du_compte_a_supprimer']]);
   	$result = $x->fetch();
  
  	if($result == true){

	echo "<h2>".$titre_zimhosting_warning."</h2>";
	echo "<hr/>";

  	if($result['class'] == "administrateur"){
   	echo '<p>Le compte séléctionné est classé comme compte administrateur du site et ne peut donc pas être supprimer</p>';
   	}elseif($result['class'] == "officiel"){
   	echo '<p>Le compte séléctionné est classé comme compte officiel du site et ne peut donc pas être supprimer</p>';
   	}else{
  
  	echo "<p>" . $message_admin_users_delet . $_GET['nom_du_compte_a_supprimer'] . "</p>";
  
  	echo "<form method='post'>
   <input type='radio' name='delradio' value='".$text_form_no."' checked />".$text_form_no."
   <input type='radio' name='delradio' value='".$text_form_yes."' />".$text_form_yes."<br/><br/>
   <input type='submit' name='submit' value='".$text_button_validate."'>
   </form>";
  
  	$del = "del";
   
   if(isset($_POST["submit"])){
   	extract($_POST);
   if($delradio == $text_form_yes)
   	{
   	 	
		$q = $db->prepare("UPDATE users SET actif = :actif WHERE pseudo=:pseudo");
   		  	$q->execute([
   		  	'actif' => $del,
   		  	'pseudo' => $_GET['nom_du_compte_a_supprimer']
   		  	]);
   		  	
   		  	$f = $db->prepare("UPDATE forum_sujet SET actif = :actif WHERE auteur=:auteur");
   		  	$f->execute([
   		  	'actif' => $del,
   		  	'auteur' => $_GET['nom_du_compte_a_supprimer']
   		  	]);
   		  	
   		  	$c = $db->prepare("UPDATE forum_reponses SET actif = :actif WHERE auteur=:auteur");
   		  	$c->execute([
   		  	'actif' => $del,
   		  	'auteur' => $_GET['nom_du_compte_a_supprimer']
   		  	]);
   		  	
   		  	$d = $db->prepare("UPDATE `commentaire` SET actif = :actif WHERE auteur=:auteur");
   		  	$d->execute([
   		  	'actif' => $del,
   		  	'auteur' => $_GET['nom_du_compte_a_supprimer']
				 ]);
			
			$e = $db->prepare("UPDATE `sociale_poste` SET actif = :actif WHERE auteur=:auteur");
   		  	$e->execute([
   		  	'actif' => $del,
   		  	'auteur' => $_GET['nom_du_compte_a_supprimer']
				 ]);
			
			$f = $db->prepare("UPDATE `sociale_compte_statue` SET actif = :actif WHERE name_compte=:name_compte");
   		  	$f->execute([
   		  	'actif' => $del,
   		  	'name_compte' => $_GET['nom_du_compte_a_supprimer']
				 ]);
			
			$g = $db->prepare("UPDATE `sociale_compte_statue` SET actif = :actif WHERE with_compte=:with_compte");
   		  	$g->execute([
   		  	'actif' => $del,
   		  	'with_compte' => $_GET['nom_du_compte_a_supprimer']
				 ]);

			$h = $db->prepare("UPDATE `blog_poste` SET actif = :actif WHERE auteur=:auteur");
   			$h->execute([
			'actif' => $del,
			'auteur' => $_GET['nom_du_compte_a_supprimer']
				 ]);
				 
			$i = $db->prepare("UPDATE `search_data` SET actif = :actif WHERE auteur=:auteur");
   		  	$i->execute([
			'actif' => $del,
			'auteur' => $_GET['nom_du_compte_a_supprimer']
   		  	]);
			
			$j = $db->prepare("UPDATE `sociale_discussions` SET actif = :actif WHERE emetteur=:emetteur OR destinataire=:destinataire");
   		  	$j->execute([
			'actif' => "del",
			'destinataire' => $_GET['nom_du_compte_a_supprimer'],
			'emetteur' => $_GET['nom_du_compte_a_supprimer']
   		  	]);
   		  	header('Location: users.php');
   		}else{
   header('Location: users.php');
   }
 	}
 	}
 	}
 	}
 	}else{
	echo "<h2>".$titre_compte_information."</h2>";
	echo "<hr/>";
  	echo "<p>".$message_admin_compte_admin_undefined."</p>";
  	}
 	}else{
	header('Location: ../index.php');
	}
	
	echo "</div>";
  	
  	echo
   "</body>
	</html>";

?>