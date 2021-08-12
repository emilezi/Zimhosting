<?php 
	session_start();
	include '../php/database.php'; 
    include '../php/language.php';
	include '../php/webtxt.php';
    global $db;
	
	echo
	"<html>";
	
	echo
  	"<head>
	  <meta charset='utf-8' />
	  <link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
   <link rel='stylesheet' href='../style.css' />
   <title>".$titre_header_blog_myarticle."</title>
   </head>";
  
  	echo "<body id=blog>";
    
   echo "<div id='header-blog'>";
    
   echo "<h1><center>".$titre_header_blog_myarticle."</center></h1>";
    
   echo "</div>";
    
   include 'nav.php';

   include 'aside.php';
    
	echo "<div id='blog-element'>";
  
  	if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
  	{
  	
  	$q = $db->prepare("SELECT * FROM blog_poste WHERE auteur=:auteur");
  	$q->execute([
  	'auteur' => $_SESSION['pseudo'],
	]);
	$nb_sujets = $q->rowCount();

	if ($nb_sujets == 0) {
	echo "<div class='blog-content'>";
	echo '<p>'.$message_blog_compte_article_undefined.'</p>';
	echo "</div>";
	}else{
	
	$i=0;
	
	while($result = $q->fetch(PDO::FETCH_ASSOC)){
	
	$i = $i +1;
	
	echo "<div class='blog-content'><a href='./article.php?id_article_a_lire=".$result['id_article']."'>";

	echo "<h2>".$result['titre']."</h2>";
	
	echo "<p>" . $i." - ".$result['date_article']."</p></a><br/>";
	
	echo "<form action='del_article.php?id_article_a_supprimer=".$result['id_article']."' method='post'>
	<input type='submit' name='del_article".$result['id_article']."' value='".$text_button_del."'>
	</form>";

	
	echo "</div>";

	}		
	}
	}else{
	echo "<div class='blog-content'>";
	echo "<p>".$message_blog_article_compte_undefined."</p>";
	echo "</div>";
	}
	
	echo "</div>";
  
  	echo
  	"</body>
	</html>";
	
?>