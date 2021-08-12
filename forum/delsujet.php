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
   <title>".$titre_header_forum_delsujet."</title>
   </head>";
   
   echo "<body id=forum>";

   echo
    "<div id='header'>
    <h1>
    <center>
    ".$titre_header_forum_delsujet."
    <center>
    </h1>
    </div>";
    
    include 'nav.php';
    
    include 'aside.php';

   echo "<div id='forum-element'>";
    
   if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {
    
   if(isset($_GET['id_sujet_a_supprimer'])){
   		  	
   		  	$c = $db->prepare("SELECT * FROM forum_sujet WHERE id_sujet=:id_sujet");
   		  	$c->execute([
   		  	'id_sujet'=> $_GET['id_sujet_a_supprimer']
   		  	]);
   		  	$result = $c->fetch();
   		  	
   		  	if($result == true){
   		  	if((($result['auteur'] == $_SESSION['pseudo']) || ($_SESSION['class'] == "administrateur"))){
    
  
	echo "<div class='forum-content'>";
  
  
  	echo "<p>".$message_forum_del_sujet."</p>";
  
  	echo "<form method='post'>
   <input type='radio' name='delradio' value='".$text_form_no."' checked />".$text_form_no."
   <input type='radio' name='delradio' value='".$text_form_yes."' />".$text_form_yes."<br/><br/>
   <input type='submit' name='submit' value='".$text_button_validate."'>
   </form>";
   
   if(isset($_POST["submit"])){
   	extract($_POST);
   if($delradio == $text_form_yes)
   	{
   	 	$d = $db->prepare("DELETE FROM `forum_sujet` WHERE titre=:titre");
   		  	$d->execute([
   		  	'titre' => $result['titre']
   		  	]);
   		  	
   		  	$f = $db->prepare("DELETE FROM `forum_reponses` WHERE correspondance_sujet=:correspondance_sujet");
   		  	$f->execute([
   		  	'correspondance_sujet' => $result['titre']
			]);
			
			$h = $db->prepare("DELETE FROM search_data WHERE article=:article");
			$h->execute([
			'article' => $result['titre']
			]);
   		  	
   		  	header('Location: my_sujets.php');
   		  }else{
   header('Location: my_sujets.php');
   }
 	}
  
  	echo "</div>";
  
  	}else{
  	
	echo "<div class='forum-content'>";
  	
  	echo "<p>".$message_forum_sujet_undefined."</p>";
  
  	echo "</div>";
  	}
  	}else{
  	
	echo "<div class='forum-content'>";
  	
  	echo "<p>".$message_forum_sujet_undefined."</p>";
  
  	echo "</div>";
  	}
  	}else{
  	
	echo "<div class='forum-content'>";
  	
  	echo "<p>".$message_forum_sujet_undefined."</p>";
  
  	echo "</div>";
  	}
  	}else{
	header('Location: ../index.php');
	}
  
  	echo "</div>";
  	
  	echo
  	"</body>
  	</html>";

?>
