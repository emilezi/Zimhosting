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
   if($_SESSION['class'] == "administrateur"){

	echo "<h2>".$titre_zimhosting_warning."</h2>";
	echo "<hr/>";
  
   echo "<p>".$message_admin_users_deleted_delet."</p>";
  
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
				 
			$q = $db->prepare("DELETE FROM users WHERE actif = :actif");
   		  	$q->execute([
   		  	'actif' => $del,
   		  	]);
   		  	
   		  	$f = $db->prepare("DELETE FROM forum_sujet WHERE actif = :actif");
   		  	$f->execute([
   		  	'actif' => $del,
   		  	]);
   		  	
   		  	$c = $db->prepare("DELETE FROM forum_reponses WHERE actif = :actif");
   		  	$c->execute([
   		  	'actif' => $del,
   		  	]);
   		  	
   		  	$d = $db->prepare("DELETE FROM `commentaire` WHERE actif = :actif");
   		  	$d->execute([
   		  	'actif' => $del,
			]);
			
			$e = $db->prepare("DELETE FROM `sociale_poste` WHERE actif = :actif");
   		  	$e->execute([
   		  	'actif' => $del,
			]);
			
			$f = $db->prepare("DELETE FROM `sociale_compte_statue` WHERE actif = :actif");
   		  	$f->execute([
   		  	'actif' => $del,
			]);

			$g = $db->prepare("DELETE FROM `blog_poste` WHERE actif = :actif");
   		  	$g->execute([
   		  	'actif' => $del,
			]);

			$h = $db->prepare("DELETE FROM `search_data` WHERE actif = :actif");
   		  	$h->execute([
   		  	'actif' => $del,
			]);

			$i = $db->prepare("DELETE FROM `sociale_discussions` WHERE actif = :actif");
   		  	$i->execute([
   		  	'actif' => $del,
			]);
   		  	
   		  	header('Location: usersdelete.php');
   		  }else{
   header('Location: usersdelete.php');
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