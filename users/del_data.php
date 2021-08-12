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
   <title>".$titre_header_compte_data_del."</title>
  	</head>";
  
  	echo "<body id=accueil>";
    
   if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {
    
   if(isset($_GET['fichier_a_supprimer'])){

	echo
	"<div id='header'>
	<h1>
	<center>
	".$titre_header_compte_data_del."
	<center>
	</h1>
	</div>";
				 
	include 'nav.php';
			   
	echo "<div class='contenue-small'>";
   		  	
   	$c = $db->prepare("SELECT * FROM users_data WHERE id_data=:id_data");
   	$c->execute([
   	'id_data'=> $_GET['fichier_a_supprimer']
   	]);
	$result = $c->fetch();
   		  	
   	if($result == true){
   	if(($result['auteur']) == ($_SESSION['pseudo'])){

    echo "<h3>Information</h3>";
    echo "<hr/>";
  	echo "<p>".$message_data_del."</p>";
  
  	echo "<form method='post'>
   <input type='radio' name='delradio' value='".$text_form_no."' checked />".$text_form_no."
   <input type='radio' name='delradio' value='".$text_form_yes."' />".$text_form_yes."<br/><br/>
   <input type='submit' name='submit' value='".$text_button_validate."'>
   </form>";
   
   if(isset($_POST["submit"])){
   	extract($_POST);
   if($delradio == $text_form_yes)
   {
   		  	$f = $db->prepare("DELETE FROM `users_data` WHERE id_data=:id_data");
   		  	$f->execute([
   		  	'id_data' => $_GET['fichier_a_supprimer']
   		  	]);
			
			$link = $result['data_link'] ;

			if(!is_dir($link)){

				unlink($link);

			}

   		  	if($result['type'] == 'picture'){
					header('Location: my_picture.php');
				 }else{
					header('Location: my_movie.php');
				 }
   		  	}else{
			if($result['type'] == 'picture'){
				header('Location: my_picture.php');
			 }else{
				header('Location: my_movie.php');
			 }
   	}
	}
  
  	echo "</div>";
  
  	}else{	
    echo "<h3>".$titre_compte_information."</h3>";
    echo "<hr/>";
  	echo "<p>".$message_data_undefined."</p>";
  	}
  	}else{
    echo "<h3>".$titre_compte_information."</h3>";
    echo "<hr/>";
	echo "<p>".$message_data_undefined."</p>";
  	}
  	}else{
    echo "<h3>".$titre_compte_information."</h3>";
    echo "<hr/>";
	echo "<p>".$message_data_undefined."</p>";
  	}
  	}else{
	header('Location: ../index.php');
	}
  
  	echo "</div>";
  
  echo
  "</body>
  </html>";
  
?>
