<?php
	session_start();
	include '../php/database.php'; 
  include '../php/infoclient.php';
  include '../php/cookies.php'; 
  include '../php/language.php';
	include '../php/webtxt.php';
  global $db;
	echo "<html>";

	echo
  "<head>
   <meta charset='utf-8' />
   <link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
   <link rel='stylesheet' href='../style.css' />
   <title>".$titre_compte."</title>
  	</head>";
  
  	echo "<body id=accueil>";
  
  	if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
  	{
  
  	echo "<div id='header''>";
  
  	echo "<h1><center>".$titre_header_compte_profil."</center></h1>";
  
  	echo "</div>";
  
  	include 'nav.php';
  
    echo "<div id='compte-aside'>";
    
    echo "<center><h2>".$titre_compte."</h2></center>";

    echo "<hr/><br/>";

    echo "<center><a href='edit_profil_picture.php'>" . $_SESSION['profil_picture'] . "</a></center>";
  
  	echo "<center><p>". $titre_compte_name . $_SESSION['prenom']. " " . $_SESSION['nom'] . "</p></center>";
  	
  	echo "<center><p>". $titre_compte_pseudo . $_SESSION['pseudo'] . "</p></center>";
  	echo "<center><p>". $titre_compte_mail . $_SESSION['email'] . "</p></center>";
  	
  	echo "<br/>";
  
  	echo "<center><form method='post'>
  	<input type='submit' name='formdeconnexion' id='formdeconnexion' value='".$text_button_logout."'>
  	</form></center>";
  
  	if(isset($_POST['formdeconnexion'])){
      if(isset($_COOKIE['pseudo'])){

        setcookie("prenom", "false", (time()-3600*24*14));
        setcookie("nom", "false", (time()-3600*24*14));
        setcookie("pseudo", "false", (time()-3600*24*14));
        setcookie("email", "false", (time()-3600*24*14));
        setcookie("class", "false", (time()-3600*24*14));
        setcookie("profil_picture", "false", (time()-3600*24*14));
  
      }
  	  
      session_destroy();

  	header('Location: compte.php');
  	
  }
  
    echo "</div>";
    
    echo "<div id=compte-element>";

  	echo "<div class='contenue-large'>
  	<h2>".$titre_compte_editprofil."</h2>";
  	
  	echo "<hr/>";
  
    echo "
    <p><a href='my_picture.php'>".$message_compte_image_post_edit."</a><p>
    <p><a href='my_movie.php'>".$message_compte_movie_post_edit."</a><p>
    <p><a href='../comment/my_comments.php'>".$message_compte_comment_post_edit."</a><p>
    <p><a href='../blog/my_article.php'>".$message_compte_blog_post_edit."</a><p>
    <p><a href='../forum/my_sujets.php'>".$message_compte_forum_post_edit."</a><p>";
  	
  	echo "<br/>";
  
    echo "<p>".$message_compte_password."</p>
    <hr/><br/>
  	<form method='post'>
  	<input type='password' name='formerpassword' id='formerpassword' placeholder='".$text_form_oldpassword."' required>
  	<input type='password' name='upassword' id='upassword' placeholder='".$text_form_newpassword."' required>
    <input type='password' name='cupassword' id='cupassword' placeholder='".$text_form_retyppassword."' required>
    <br/><br/>
  	<input type='submit' name='formupassword' id='formupassword' value='".$text_button_validate."'>
  	</form>";
 
 	if(isset($_POST['formupassword'])){
   	
   	extract($_POST);
   	
   	if(!empty($formerpassword) && !empty($upassword) && !empty($cupassword)){
   		
   		$q = $db->prepare("SELECT * FROM users WHERE email = :email");
   		$q->execute(['email' => $_SESSION['email']]);
   		$result = $q->fetch();
   		
   		if(password_verify($formerpassword, $result['password'])){
   		
   		if($upassword == $cupassword){
   		
   		$uoptions = [
    'cost' => 12,
   ];
   		  
    	$uphashpass = password_hash($upassword, PASSWORD_BCRYPT, $uoptions);
    	
    	$q = $db->prepare("UPDATE users SET password = :password WHERE email = :email");
    	$q->execute([
    	'password' => $uphashpass,
    	'email' => $_SESSION['email']
   ]);
   echo "<p>".$message_compte_password_info2."</p>";
   }else{
    echo "<p>".$message_compte_password_erreur1."</p>";
    }
    } else {
    echo "<p>".$message_compte_password_erreur2."</p>";
    }
 	}
 	}
  
  	echo "</div>";
   
   if(($_SESSION['class'] == "administrateur") || ($_SESSION['class'] == "officiel")){
   	}else{
   
   echo "<div class='contenue-large'>
   <h2>".$titre_compte_editaction."</h2>
   <hr/>
   <p><a href='delcompte.php'>".$message_compte_del."</a></p>
   </div>";

   echo "</div>";
  
  	}
  	}else{

  	echo "<div id='header'>
  	<h1><center>".$titre_header_compte_login."</center></h1>
  	</div>";
  
  	include 'nav.php';
    
   echo "<div class='contenue-large'>";
   

   if(isset($_POST['formsignin'])){
    
   extract($_POST);
    
   if(!empty($npassword) && !empty($ncpassword) && !empty($nemail) && !empty($npseudo) && !empty($nnom) && !empty($nprenom)){
    	
    if (preg_match("#^[a-z0-9.]+@[a-z0-9.]+$#i", $nemail) && preg_match("#^[a-z0-9]+$#i", $npseudo) && preg_match("#^[^<>]+$#i", $nnom) && preg_match("#^[^<>]+$#i", $nprenom))
    {
    
    if($npassword == $ncpassword){
    
    $options = [
    'cost' => 12,
    ];
    
    $hashpass = password_hash($npassword, PASSWORD_BCRYPT, $options);
    
    $c = $db->prepare("SELECT email FROM users WHERE email=:email");
    $c->execute(['email' => $nemail]);
    $result1 = $c->rowCount();
    
    $x = $db->prepare("SELECT pseudo FROM users WHERE pseudo=:pseudo");
    $x->execute(['pseudo' => $npseudo]);
    $result2 = $x->rowCount();
    
    if(($result1 == 0) && ($result2 == 0)){
    
    $cle = md5(microtime(TRUE)*100000);
    $class = "classique";
    $date = date('Y-m-d h:i:s');
    	
    $q = $db->prepare("INSERT INTO users(prenom,nom,pseudo,email,password,class,profil_picture,actif,cle,recoverycle,recoverydate) VALUES(:prenom,:nom,:pseudo,:email,:password,:class,:profil_picture,:actif,:cle,:recoverycle,:recoverydate)");
    $q->execute([
    'prenom' => $nprenom,
    'nom' => $nnom,
    'pseudo'=> $npseudo,
    'email' => $nemail,
    'password' => $hashpass,
    'class' => $class,
    'profil_picture' => "<img id='profil-picture' src='../img/default-icon-users.png'>",
    'actif' => "no",
    'cle' => $cle,
    'recoverycle' => $cle,
    'recoverydate' => $date
    ]);
    if(!file_exists("../web-data/users/" . $npseudo)){
    mkdir("../web-data/users/" . $npseudo);
    }
    echo "<h2>".$titre_compte_information."</h2>";
    echo "<hr/>";
    echo "<p>".$message_compte_signin."</p>";
    
    $email = $nemail;
    $login = $npseudo;
    
    $destinataire = $email;
    $sujet = $titre_mail_activation ;
    $entete = "From: services@zimhosting.fr" ;
    
    $message = $message_mail_activation_info1."
    
    http://zimhosting.fr/users/activation.php?log=".urlencode($login)."&cle=".urlencode($cle)."
    
    ---------------
    ".$message_mail_activation_info2;
    
    mail($destinataire, $sujet, $message, $entete);
    
    }else{
    echo "<h2>".$titre_compte_information."</h2>";
    echo "<hr/>";
    echo "<p>".$message_compte_signin_erreur."</p>";
    }
    }else{
    echo "<h2>".$titre_compte_information."</h2>";
    echo "<hr/>";
    echo "<p>".$message_compte_password_erreur1."</p>";
    }
    }
    else
    {
    echo "<h2>".$titre_compte_information."</h2>";
    echo "<hr/>";
    echo "<p>".$message_form_erreur_champs_2."</p>";
    echo "<p>".$message_compte_signin_info1."</p>";
    }
 	}else{
    echo "<h2>".$titre_compte_information."</h2>";
		echo "<hr/>";
		echo "<p>".$message_form_erreur_champs_1."</p>";
   }
    }else{
  
  	echo "<h1>".$titre_compte_login."</h1>";
  	echo "<hr/><br/><br/>";
  	echo "<form method='post'>
    <input type='text' name='lemail' id='lemail' placeholder='".$text_form_login."' required><br/>
    <br/>
  	<input type='password' name='lpassword' id='lpassword' placeholder='".$text_form_password."' required><br/>
  	<br/>
    <input type='checkbox' name='cookies'  id='cookies'>
    <label for='cookies'>Se souvenir de moi</label>
    <br/><br/>
  	<input type='submit' name='formlogin' id='formlogin' value='".$text_button_login."'>
  	</form>";
  
  	echo "<p><a href='reccompte.php'>".$message_compte_password_recovery."</a></p>";
  
  	if(isset($_POST['formlogin'])){
    
    extract($_POST);
    
    if(!empty($lpassword) && !empty($lemail))
    {
    
   	if (preg_match("#^[a-z0-9.]+@[a-z0-9.]+$#i", $lemail)){
		$q = $db->prepare("SELECT * FROM users WHERE email = :email");
   	$q->execute(['email' => $lemail]);
   	$result = $q->fetch();
   	}
   	else
   	{
   	$q = $db->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
   	$q->execute(['pseudo' => $lemail]);
   	$result = $q->fetch();
   	}
    
    if($result == true)
    {
    	if($result['actif'] == "yes")
    	{
     if(password_verify($lpassword, $result['password']))
     { 
     echo "<p>".$message_compte_login."</p>";
     
     $_SESSION['prenom'] = $result['prenom'];
     $_SESSION['nom'] = $result['nom'];
     $_SESSION['pseudo'] = $result['pseudo'];
     $_SESSION['email'] = $result['email'];
     $_SESSION['class'] = $result['class'];
     $_SESSION['profil_picture'] = $result['profil_picture'];
     if(isset($_POST['cookies'])){
			  setcookie("prenom", $result['prenom'], time()+3600*24*14);
			  setcookie("nom", $result['nom'], time()+3600*24*14);
			  setcookie("pseudo", $result['pseudo'], time()+3600*24*14);
			  setcookie("email", $result['email'], time()+3600*24*14);
        setcookie("class", $result['class'], time()+3600*24*14);
        setcookie("profil_picture", $result['profil_picture'], time()+3600*24*14);
			}

     header('Location: compte.php');
     }
     else
     {
     echo "<p>".$message_compte_password_erreur3."</p>";
     }
    }elseif  ($result['actif'] == "del"){
    echo "<p>".$message_compte_login_erreur1 ."</p>";
    }else{
    echo "<p>".$message_compte_login_erreur2."</p>";
    }
    }else
    {
    echo "<p>".$message_compte_login_erreur1 ."</p>";
    }
    }
    }
  
  		echo "</div>";
  		echo "<div class='contenue-large'>";
  
  	echo "<h1>".$titre_compte_signin."</h1>";
  	echo "<hr/><br/>";
    echo "<p>".$message_compte_signin_info2."</p>";
    echo "<p><a href='../conditionsite.php'>".$titre_compte_use_condition."</a></p>";
    echo "<form method='post'>
  	<br/>
  	<input type='text' name='nprenom' id='nprenom' placeholder='".$text_form_firstname."' required><br/>
  	<br/>
  	<input type='text' name='nnom' id='nnom' placeholder='".$text_form_lastname."' required><br/>
  	<br/>
  	<input type='text' name='npseudo' id='npseudo' placeholder='".$text_form_pseudo."' required><br/>
  	<br/>
  	<input type='email' name='nemail' id='nemail' placeholder='".$text_form_mail."' required><br/>
  	<br/>
  	<input type='password' name='npassword' id='npassword' placeholder='".$text_form_newpassword."' required><br/>
  	<br/>
  	<input type='password' name='ncpassword' id='ncpassword' placeholder='".$text_form_retyppassword."' required>
  	<br/><br/>
  	<input type='submit' name='formsignin' id='formsignin' value='".$text_button_signin."'>
  	</form>";
    
   }
    
   }
  
  	echo "</div>";
  
  	echo "</div>";
  	echo "</div>";
  

  	echo
  	"</body>
	</html>";

?>