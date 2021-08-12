<?php
	include '../php/database.php'; 
	include '../php/language.php';
	include '../php/webtxt.php';
	global $db;

	echo
	"<html>";
  
	echo "<head>
    <meta charset='utf-8' />
    <link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
    <link rel='stylesheet' href='../style.css' />
    <title>".$titre_compte_activation."</title>
  </head>";
  
  echo "<body id=accueil>";
  
  echo "<div class='contenue-small'>";
  
  if((!isset($_GET['log'])) && (!isset($_GET['cle']))){
  header('Location: ../index.php');
  }else{
  
  $login = $_GET['log'];
  $cle = $_GET['cle'];
  
  $g = $db->prepare("SELECT * FROM users WHERE pseudo=:pseudo");
  $g->execute(['pseudo' => $login]);
  $resultk = $g->fetch();
  
  if($resultk == true)
  {
  if($resultk['cle'] == $cle)
  {
  
  $d = $db->prepare("SELECT * FROM users WHERE pseudo=:pseudo");
  $d->execute(['pseudo' => $login]);
  $result = $d->fetch();
  
  if($result['actif'] == "yes")
  {
  echo "<h2>".$titre_compte_information."</h2>";
  echo "<hr/>";
  echo "<p>".$message_compte_activation_erreur2."</p>";
  }elseif($result['actif'] == "del"){
  $q = $db->prepare("UPDATE users SET actif=:actif WHERE pseudo=:pseudo");
   		  	$q->execute([
   		  	'actif' => "yes",
   		  	'pseudo' => $login
   		  	]);
   		  	
   		  	$f = $db->prepare("UPDATE forum_sujet SET actif=:actif WHERE auteur=:auteur");
   		  	$f->execute([
   		  	'actif' => "yes",
   		  	'auteur' => $login
   		  	]);
   		  	
   		  	$c = $db->prepare("UPDATE forum_reponses SET actif=:actif WHERE auteur=:auteur");
   		  	$c->execute([
   		  	'actif' => "yes",
   		  	'auteur' => $login
   		  	]);
   		  	
   		  	$d = $db->prepare("UPDATE `commentaire` SET actif=:actif WHERE auteur=:auteur");
   		  	$d->execute([
   		  	'actif' => "yes",
   		  	'auteur' => $login
           ]);

          $e = $db->prepare("UPDATE `sociale_poste` SET actif = :actif WHERE auteur=:auteur");
   		  	$e->execute([
   		  	'actif' => "yes",
   		  	'auteur' => $login
				  ]);
			
			$f = $db->prepare("UPDATE `sociale_compte_statue` SET actif = :actif WHERE name_compte=:name_compte");
   		  	$f->execute([
   		  	'actif' => "yes",
   		  	'name_compte' => $login
				 ]);
			
			$g = $db->prepare("UPDATE `sociale_compte_statue` SET actif = :actif WHERE with_compte=:with_compte");
   		  	$g->execute([
   		  	'actif' => "yes",
   		  	'with_compte' => $login
				  ]);
			
			$h = $db->prepare("UPDATE `blog_poste` SET actif = :actif WHERE auteur=:auteur");
			$h->execute([
			'actif' => "yes",
			'auteur' => $login
			]);

			$i = $db->prepare("UPDATE `search_data` SET actif = :actif WHERE auteur=:auteur");
   		  	$i->execute([
			'actif' => "yes",
			'auteur' => $login
   		  	]);

			$j = $db->prepare("UPDATE `sociale_discussions` SET actif = :actif WHERE emetteur=:emetteur OR destinataire=:destinataire");
   		  	$j->execute([
			'actif' => "yes",
			'destinataire' => $login,
			'emetteur' => $login
   		  	]);

          echo "<h2>".$titre_compte_information."</h2>";
          echo "<hr/>";
   		  	echo "<p>".$message_compte_recovery."</p>";
  }else{
  	$f = $db->prepare("UPDATE users SET actif=:actif WHERE pseudo=:pseudo");
  	$f->execute(['pseudo' => $login,
  	'actif' => "yes"
    ]);
    echo "<h2>".$titre_compte_information."</h2>";
    echo "<hr/>";
  	echo "<p>".$message_compte_activation."</p>";
  	}
  }else {
    echo "<h2>".$titre_compte_information."</h2>";
    echo "<hr/>";
  	echo "<p>".$message_compte_activation_erreur1."</p>";
  	}
  }else{
  header('Location: ../index.php');
  }
  }
  
  echo "</div>";
  
  echo
  "</body>
  </html>";

?>