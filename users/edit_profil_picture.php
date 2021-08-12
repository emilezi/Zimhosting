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
    <title>".$titre_header_compte_space."</title>
    </head>";
  
  	echo "<body id=accueil>";
    
	echo "<div id='header''>";
    
   echo "<h1><center>".$titre_header_compte_space."</center></h1>";
    
   echo "</div>";
    
   include 'nav.php';
    
   echo "<div id='compte-aside'>";

   if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {
    
	echo "<h2>".$titre_compte_profil."</h2>";
	echo "<hr/>";
    echo "<p>". $titre_compte_name . $_SESSION['prenom']. " " . $_SESSION['nom'] . "</p>";
  	echo "<p>". $titre_compte_pseudo . $_SESSION['pseudo'] . "</p>";
  	echo "<p>". $titre_compte_mail . $_SESSION['email'] . "</p>";
  	
    
   }else{
    
    echo "<h2>".$titre_compte_profil."</h2>
    <hr/>
    <p>".$message_compte_editpicture_erreur."</p>
    <p><a href='../users/compte.php'>".$message_compte_space."</a></p>
    ";
	
   }

   echo "</div>";

   echo "<div id='compte-element'>";

   if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom']))){
	
	if(!empty($_POST['submit_img']))
	{
	if(!empty($_FILES['file']['name']))
	{
	$dossier = "../web-data/".$_SESSION['pseudo']."/";
	$fichier = basename($_FILES['file']['name']);
	$taille_maxi = 1000000;
	$taille = filesize($_FILES['file']['tmp_name']);
	$extensions = array('.png', '.gif', '.jpg', '.jpeg');
	$extension = strrchr($_FILES['file']['name'], '.'); 
	if(!in_array($extension, $extensions))
	{
     	$erreur = '<p>'.$message_data_image_erreur1.'</p>';
	}
	if($taille>$taille_maxi)
	{
     	$erreur = '<p>'.$message_data_erreur.'</p>';
	}
	if(!isset($erreur))
	{
	$fichier = md5(microtime(TRUE)*1000);
	$files = $dossier . $fichier . $extension;
     if(move_uploaded_file($_FILES['file']['tmp_name'], $files))
     {
        $id = md5(microtime(TRUE)*100000);

		$link = "<img id='profil-picture' src='" . $files . "'>";
		  
		$qa = $db->prepare("UPDATE users SET profil_picture=:profil_picture WHERE pseudo=:pseudo");
		$qa->execute([
		  'pseudo' => $_SESSION['pseudo'],
		  'profil_picture' => $link
		]);

		$qb = $db->prepare("INSERT INTO users_data(auteur,data_link,type,id_data) VALUES(:auteur,:data_link,:type,:id_data)");
		$qb->execute([
		'auteur' => $_SESSION['pseudo'],
		'data_link' => $files,
		'type'=> 'picture',
        'id_data' => $id
		]);

		echo "<div class='contenue-large'>";
		echo "<h2>".$titre_compte_information."</h2>
		<hr/>";
		echo '<p>'.$message_data_profil_info1.'</p>';
		echo "</div>";

        exit();
          
     }
     else
     {
		echo "<div class='contenue-large'>";
		echo "<h2>".$titre_compte_information."</h2>
		<hr/>";
        echo '<p>'.$message_data_image_erreur2.'</p>';
		echo "</div>";
     }
	}
	else
	{
		echo "<div class='contenue-large'>";
		echo "<h2>".$titre_compte_information."</h2>
		<hr/>";
     	echo "<p>" . $erreur . "</p>";
		echo "</div>";
	}
	}else{

		echo "<div class='contenue-large'>";
		echo "<h2>".$titre_compte_information."</h2>
		<hr/>";
    	echo "<p>".$message_data_image_erreur3."</p>";
		echo "</div>";
	}
	}elseif(!empty($_POST['del_img']))
	{
	
	if($_SESSION['profil_picture'] <> "<img id='profil-picture' src='../img/default-icon-users.png'>"){

		$qb = $db->prepare("UPDATE users SET profil_picture=:profil_picture WHERE pseudo=:pseudo");
		$qb->execute([
		  'pseudo' => $_SESSION['pseudo'],
		  'profil_picture' => "<img id='profil-picture' src='../img/default-icon-users.png'>"
		]);

		echo "<div class='contenue-large'>";
		echo "<h2>".$titre_compte_information."</h2>
		<hr/>";
		echo '<p>'.$message_data_profil_info2.'</p>';
		echo "</div>";

	}else{

		echo "<div class='contenue-large'>";
		echo "<h2>".$titre_compte_information."</h2>
		<hr/>";
		echo "<p>Le profil ne contient pas de photos personnalisés</p>";
		echo "</div>";

	}
	}else{
	
	echo "<div class='contenue-large'>";
  
	echo "<h2>".$titre_compte_picture_profil."</h2>";
	  
	echo "<hr/><br/>";

	echo "<div class='boxusersprofil'>";

	echo $_SESSION['profil_picture'];

	echo "<form enctype='multipart/form-data' action='' method='post'>
	<input type='hidden' name='MAX_FILE_SIZE' value='250000' />
	<input type='file' name='file'/>
	<input type='submit' name='submit_img' value='".$text_button_edit."' />

	<br/><br/>
	<input type='submit' name='del_img' value='".$text_button_del_picture_profile."' />
	</form>";

	echo "</div>";

	echo "</div>";

	}

	echo "</div>";

	}else{

   	echo "<div class='contenue-large'>";

	echo "<h2>".$titre_compte_information."</h2>
	<hr/>
	<p>".$message_compte_editpicture_erreur."</p>";

	echo "</div>";

}

	echo "</div>";
  
  	echo 
  	"</body>
	</html>";

?>