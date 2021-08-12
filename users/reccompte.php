<?php
	session_start();
	include '../php/database.php';
	include '../php/language.php';
	include '../php/webtxt.php';
	global $db;

	echo"<html>";

	echo
	"<head>
	<meta charset='utf-8' />
	<link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
	<link rel='stylesheet' href='../style.css' />
	<title>".$titre_compte_recovery."</title>
	</head>";
  
  	echo "<body id=accueil>";
  
  	echo "<div id='header'>";
  
  	echo "<h1><center>".$titre_compte_recovery."</center></h1>";
  
  	echo "</div>";
  
	include 'nav.php';
  
  		echo "<div class='contenue-small'>";
  
  		if(isset($_POST['formrec'])){
    
    	extract($_POST);
    
    	if(!empty($email))
    	{
    	
    	if (preg_match("#^[a-z0-9.]+@[a-z0-9.]+$#i", $email)){
    
    	$q = $db->prepare("SELECT * FROM users WHERE email = :email");
    	$q->execute(['email' => $email]);
    	$result = $q->fetch();
    
    	if($result == true)
    	{
    	
    	$cle = md5(microtime(TRUE)*100000);
    	$date = date('Y-m-d h:i:s');
    
    	$q = $db->prepare("UPDATE users SET recoverycle = :recoverycle, recoverydate = :recoverydate WHERE email = :email");
    	$q->execute([
    	'email' => $email,
    	'recoverycle' => $cle,
    	'recoverydate' => $date
    	]);

    	$destinataire = $email;
    	$sujet = $titre_mail_recupération;
    	$entete = "From: services@zimhosting.fr" ;
    
    	$message = $message_mail_recupération_info1."
	
		http://zimhosting.fr/users/recmdp.php?log=".urlencode($result['pseudo'])."&cle=".urlencode($cle)."
    
    	---------------
    	".$message_mail_recupération_info2;
    
    	mail($destinataire, $sujet, $message, $entete);
	
		echo "<h2>".$titre_compte_information."</h2>";
    	echo "<hr/>";
    	echo "<p>".$message_compte_recovery_info2."</p>";
    	
     	}else{
		echo "<h2>".$titre_compte_information."</h2>";
    	echo "<hr/>";
    	echo "<p>".$message_compte_recovery_erreur1."</p>";
     	}
  		}else{
		echo "<h2>".$titre_compte_information."</h2>";
		echo "<hr/>";
  		echo "<p>".$message_compte_recovery_erreur3."</p>";
  		}
  		}else{
		echo "<h2>".$titre_compte_information."</h2>";
		echo "<hr/>";
		echo "<p>".$message_compte_recovery_erreur2."</p>";
  		}
  		}else{
	
		echo "<h3>".$message_compte_recovery_info1."</h3>";
		echo "<hr/><br/>";
  		echo "<form method='post'>
		<input type='email' name='email' id='email' placeholder='".$text_form_mail."' required><br/>
  		<p></p>
  		<input type='submit' name='formrec' id='formrec' value='".$text_button_validate."'>
  		</form>";
  
  	}
  
  	echo "</div>";
  
  echo
  "</body>
  </html>";

?>