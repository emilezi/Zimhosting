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
    <title>".$titre_header_compte_data_movie."</title>
    </head>";
  
  	echo "<body id=accueil>";
    
	echo "<div id='header''>";
    
   echo "<h1><center>".$titre_header_compte_data_movie."</center></h1>";
    
   echo "</div>";
    
   include 'nav.php';

   echo "<div id='box-data'>

	</div>";
    
   echo "<div id='compte-aside'>";

   if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {
    
	echo "<h2>".$titre_compte_profil."</h2>";
	echo "<hr/>";
    echo "<p>" . $titre_compte_name . $_SESSION['prenom']. " " . $_SESSION['nom'] . "</p>";
  	echo "<p>" . $titre_compte_pseudo . $_SESSION['pseudo'] . "</p>";
  	echo "<p>" . $titre_compte_mail . $_SESSION['email'] . "</p>";
  	
    
   }else{
    
    echo "<h2 class='indisplay'>".$titre_compte."</h2>
    <hr class='indisplay'/>
    <p>".$message_compte_undefined."</p>
    <p><a href='../users/compte.php'>".$message_compte_space."</a></p>
    ";
	
   }

   echo "</div>";
    
   echo "<div id='compte-element'>";
  
  	if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
  	{

	if(!empty($_POST['submit_img']))
	{
	if(!empty($_FILES['file']['name']))
	{
	$dossier = "../web-data/".$_SESSION['pseudo']."/";
	$fichier = basename($_FILES['file']['name']);
	$taille_maxi = 15000000;
	$taille = filesize($_FILES['file']['tmp_name']);
	$extensions = array('.mp4');
	$extension = strrchr($_FILES['file']['name'], '.'); 
	if(!in_array($extension, $extensions))
	{
		$erreur = '<p>'.$message_data_movie_erreur1.'</p>';
	}
	if($taille>$taille_maxi)
	{
		$erreur = '<p>'.$message_data_erreur.'</p>';
	}
	if(!isset($erreur))
	{
	$fichier = md5(microtime(TRUE)*1000);
	if(move_uploaded_file($_FILES['file']['tmp_name'], $dossier . $fichier . $extension))
		{
		$id = md5(microtime(TRUE)*100000);
		
		$link = $dossier . $fichier . $extension;
		
		$s = $db->prepare("INSERT INTO users_data(auteur,data_link,type,id_data) VALUES(:auteur,:data_link,:type,:id_data)");
		$s->execute([
				'auteur' => $_SESSION['pseudo'],
				'data_link' => $dossier . $fichier . $extension,
				'type'=> 'movie',
				'id_data' => $id
			]);
			echo "<div class='contenue-large'>";
			echo "<h2>".$titre_compte_information."</h2>";
			echo "<hr/>";
			echo '<p>'.$message_data_movie_posted.'</p>';
			echo "</div>";
		}
		else
		{
		echo "<div class='contenue-large'>";
		echo "<h2>".$titre_compte_information."</h2>";
		echo "<hr/>";
		echo '<p>'.$message_data_movie_erreur2.'</p>';
		echo "</div>";
		}
		}
		else
		{
			echo "<div class='contenue-large'>";
			echo "<h2>".$titre_compte_information."</h2>";
			echo "<hr/>";
			echo $erreur;
			echo "</div>";
		}
		}else{
			echo "<div class='contenue-large'>";
			echo "<h2>".$titre_compte_information."</h2>";
			echo "<hr/>";
			echo "<p>".$message_data_movie_erreur3."</p>";
			echo "</div>";
		}
	}else{

	echo "<div class='contenue-large'>";

	?>

	<h2><?=$titre_compte_data_new_movie?></h2>
	<hr/><br/>
	<form enctype="multipart/form-data" action="" method="post">
	<input type="hidden" name="MAX_FILE_SIZE" value="45000000" />
	<input type="file" name="file"/>
	<input type="submit" name="submit_img" value="<?=$text_button_poste?>" />
	</form>
		
	<?php

	echo "</div>";

	$q = $db->prepare("SELECT * FROM users_data WHERE auteur=:auteur AND type=:type");
	$q->execute([
	'type' => 'movie',
	'auteur' => $_SESSION['pseudo']
	]);
	$nb_sujets = $q->rowCount();

	echo "<div class='contenue-large'>";

	if ($nb_sujets == 0) {
	echo "<h2>".$titre_compte_data_movie."</h2>";
	echo "<hr/>";
	echo "<p>".$message_data_movie_undefined_1."</p>";
	}
	else{

	echo "<h2>".$titre_compte_data_movie."/h2>";
	echo "<hr/><br/>";
	echo "<div class='boxpicture'>";

	$i = 0;

	while($result = $q->fetch(PDO::FETCH_ASSOC)){

	echo "";

	$i++;

	echo "<video width='250px' poster onclick='VideoViewer".$i."();'><source src=".$result['data_link']." type='video/mp4'></video>";

	echo "
	<script>
	function VideoViewer".$i."(){
		var div = document.getElementById('box-data');
		div.innerHTML += '<div id=data-viewer><div id=data-content><video width=450px controls poster><source src=".$result['data_link']." type=video/mp4></video></div><div class=data-viewer-icon><a href=del_data.php?fichier_a_supprimer=".$result['id_data']."><img src=../img/icones/trash.png style=padding:15px;></a><img src=../img/icones/close.png style=padding:15px; onclick=ViewerClose();></div></div>';
		}
	</script>
	";

	echo "<script src='../JS/viewer.js'></script>";

	}

	echo "</div>";

	}

	echo "</div>";

	}

  	}else{
		echo "<div class='contenue-large'>";
		echo "<h2>".$titre_compte_information."</h2>";
		echo "<hr/>";
		echo "<p>".$message_data_compte_undefined_2."</p>";
		echo "</div>";
	}
	
	echo "</div>";
  
  echo 
  "</body>
	</html>";

?>