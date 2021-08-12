<?php
	 session_start();
	 include '../php/database.php';
     include '../php/infoclient.php';
     include '../php/language.php';
	 include '../php/webtxt.php';
     global $db;

	echo "<html>
    <head>";
    
    echo "<meta charset='utf-8' />
    <link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
    <link rel='stylesheet' href='../style.css'/>
    <title>".$titre_header_blog."</title>
    </head>";
    
    echo "<body id=blog>";
    
    echo 
    "<div id='header-blog'>
    <h1>
    <center>
    ".$titre_header_blog."
    <center>
    </h1>
    </div>";
    
    include 'nav.php';
     
    include 'aside.php';
	
	echo "<div id='blog-element'>";
   
    $q = $db->prepare("SELECT * FROM blog_poste WHERE actif=:actif AND langue=:langue");
  	$q->execute([
  	'actif' => "yes",
    'langue' => $set_language
	]);
	$nb_sujets = $q->rowCount();

	if ($nb_sujets == 0) {
	echo "<div class='blog-content'>";
	echo "<p>".$message_blog_undefined."</p>";
	echo "</div>";
	}else{
	
	$i=0;
	
	while($result = $q->fetch(PDO::FETCH_ASSOC)){
	
	$i = $i +1;
	
	echo "<div class='blog-content'><a href='./article.php?id_article_a_lire=".$result['id_article']."'>";

    echo "<h2>".$result['titre']." - ".$result['auteur']."</h2>";
	
	echo "<p>" . $i." - ".$result['date_article']."</p></a><br/>";
    
    if(isset($_SESSION['class'])){
    if($_SESSION['class'] == 'administrateur'){

	
	echo "<form action='del_article.php?id_article_a_supprimer=".$result['id_article']."' method='post'>
	<input type='submit' name='del_article".$result['id_article']."' value='".$text_button_del."'>
	</form>";

    
    }
    }

	echo "</div>";

	}		
	}
     
    echo "</div>";

	 echo "
    </body>
    </html>";

?>