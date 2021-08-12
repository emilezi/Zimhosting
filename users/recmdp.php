<?php
	include '../php/database.php';
	include '../php/language.php';
	include '../php/webtxt.php';
	global $db;

	echo "<html>";
  
	echo "<head>
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
  
  	if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
  	{
  	header('Location: ../index.php');
   }else{
  
  	echo "<div class='contenue-small'>";
  
  	if((!isset($_GET['log'])) && (!isset($_GET['cle']))){
  	header('Location: ../index.php');
  	}else{
  
  	$log = $_GET['log'];
  	$cle = $_GET['cle'];
  
  	$g = $db->prepare("SELECT * FROM users WHERE pseudo=:pseudo");
  	$g->execute(['pseudo' => $log]);
  	$result = $g->fetch();
  
  	if($result == true)
  	{
  	
  	sscanf($result['recoverydate'], "%4s-%2s-%2s", $rdannee, $rdmois, $rdjour);
  	sscanf(date('Y-m-d h:i:s'), "%4s-%2s-%2s", $annee, $mois, $jour);
  	
  	if(($result['recoverycle'] == $cle) && ($rdannee == $annee) && ($rdmois == $mois) && ($rdjour == $jour))
  	{
  
   if(isset($_POST['formupassword'])){
   	
   	extract($_POST);
   	
   	if(!empty($upassword) && !empty($cupassword)){
   		
   		if($upassword == $cupassword){
   		
   		$uoptions = [
    'cost' => 12,
    ];
   		  
    	$uphashpass = password_hash($upassword, PASSWORD_BCRYPT, $uoptions);
    	$newcle = md5(microtime(TRUE)*100000);
    	
    	$q = $db->prepare("UPDATE users SET password = :password, recoverycle = :recoverycle WHERE pseudo = :pseudo");
    	$q->execute([
    	'password' => $uphashpass,
    	'recoverycle' => $newcle,
    	'pseudo' => $log
	]);
		echo "<h2>".$titre_compte_information."</h2>";
		echo "<hr/>";
		echo "<p>".$message_compte_password_info2."</p>";
    }else{
	echo "<h2>".$titre_compte_information."</h2>";
	echo "<hr/>";
    echo "<p>".$message_compte_password_erreur1."</p>";
    }
 	}else{
		echo "<h2>".$titre_compte_information."</h2>";
		echo "<hr/>";
		echo "<p>".$message_form_erreur_champs_1."</p>";
	 }
 	}else{
		echo "<h3>".$message_compte_password."</h3>
		<hr/><br/>
		  <form method='post'>
		  <input type='password' name='upassword' id='upassword' placeholder='".$text_form_newpassword."' required>
		  <input type='password' name='cupassword' id='cupassword' placeholder='".$text_form_retyppassword."' required>
		  <input type='submit' name='formupassword' id='formupassword' value='".$text_button_validate."'>
		  </form>";
	 }
 	}else{
	echo "<h2>".$titre_compte_information."</h2>";
	echo "<hr/>";
	echo "<p>".$message_compte_recovery_erreur4."</p>";
 	}
 	}else{
 	header('Location: ../index.php');
 	}
 	}
 	}
  
  	echo "</div>";
  
  	echo
  	"</body>
	</html>";

?>