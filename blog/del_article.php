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
   <title>".$titre_header_blog_delarticle."</title>
  	</head>";
  
  	echo "<body id=blog>";
    
   if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {

	echo
    "<div id='header-blog'>
    <h1>
    <center>
    ".$titre_header_blog_delarticle."
    <center>
    </h1>
    </div>";
    
    include 'nav.php';
    
    include 'aside.php';
  
	echo "<div id='blog-element'>";
    
   if(isset($_GET['id_article_a_supprimer'])){
   		  	
   		  	$c = $db->prepare("SELECT * FROM blog_poste WHERE id_article=:id_article");
   		  	$c->execute([
   		  	'id_article'=> $_GET['id_article_a_supprimer']
   		  	]);
   		  	$result = $c->fetch();
   		  	
   		  	if($result == true){
   		  	if(($result['auteur'] == $_SESSION['pseudo']) || ($_SESSION['class'] == 'administrateur')){

	echo "<div class='blog-content'>";
  
  	echo "<p>".$message_blog_del_article."</p>";
  
  	echo "<form method='post'>
   <input type='radio' name='delradio' value='".$text_form_no."' checked />".$text_form_no."
   <input type='radio' name='delradio' value='".$text_form_yes."' />".$text_form_yes."<br/><br/>
   <input type='submit' name='submit' value='".$text_button_validate."'>
   </form>";
   
   if(isset($_POST["submit"])){
   	extract($_POST);
   if($delradio == $text_form_yes)
   {
   		  	$f = $db->prepare("DELETE FROM blog_poste WHERE id_article=:id_article");
   		  	$f->execute([
                'id_article'=> $_GET['id_article_a_supprimer']
			]);
				 
			$h = $db->prepare("DELETE FROM search_data WHERE id_sujet=:id_sujet");
			$h->execute([
			'id_sujet' => $_GET['id_article_a_supprimer']
			]);
   		  	
   		  	header('Location: my_article.php');
   		  }else{
			header('Location: my_article.php');
   	}
	}
  
  	echo "</div>";
  
  	}else{
  	
		echo "<div class='blog-content'>";	
  	
  	echo "<p>".$message_blog_article_undefined."</p>";
  
  	echo "</div>";
  	}
  	}else{
  	
		echo "<div class='blog-content'>";
  	
        echo "<p>".$message_blog_article_undefined."</p>";
  
  	echo "</div>";
  	}
  	}else{
  	
		echo "<div class='blog-content'>";
  	
        echo "<p>".$message_blog_article_undefined."</p>";
  
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
