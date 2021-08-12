<?php
	session_start();
	include '../php/database.php'; 
    include '../php/language.php';
	include '../php/webtxt.php';
    global $db;
	
	if (!isset($_GET['id_article_a_lire'])){

	echo "<html>";
	
    echo
    "<head>
   <meta charset='utf-8'/>
   <link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
   <link rel='stylesheet' href='../style.css' />
   <title>".$message_blog_article_undefined."</title>
   </head>";
    
   echo "<body id=blog>";

   echo "<div id='header-blog'>
    <h1>
    <center>
    ".$message_blog_article_undefined."
    <center>
    </h1>
    </div>";
    
   include 'nav.php';

	echo"
	<div id='blog-element-article'>
	<div class='blog-content'>
	<p>".$message_blog_article_undefined."</p>
	</div>
	</div>";
   
   }else{
   	
  	$p = $db->prepare("SELECT * FROM blog_poste WHERE id_article=:id_article AND actif=:actif");
  	$p->execute([
      'id_article'=> $_GET['id_article_a_lire'],
      'actif' => 'yes'
  	]);
  
  	$result = $p->fetch();
  
  	if($result ==  true){
  
  	echo
  	"<html>
    <head>
	<meta charset='utf-8'/>
	<link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
    <link rel='stylesheet' href='../style.css' />
    <title>" . $result['titre'] . "</title>
    </head>";
    
   echo "<body id='blog-custom' style='background-image: url(".$result['fonds'].");'>";
   	
	echo "<div id='header-blog'>
    <h1>
    <center>
    " . $result['titre'] . "
    <center>
    </h1>
    </div>";
    
   include 'nav.php';

    echo "<div id='blog-element-article'>";
	
    echo "<div class='blog-content'>";

    echo "<div class='center'>".$result['article']."</div>";
    
    echo "</div>";

    echo "</div>";
	
	}else{

    echo
    "<html>
    <head>
    <meta charset='utf-8'/>
    <link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
    <link rel='stylesheet' href='../style.css' />
    <title>".$message_blog_article_undefined."</title>
    </head>
      
    <body id=blog>";
         
    echo "<div id='header-blog'>
    <h1>
    <center>
    ".$message_blog_article_undefined."
    <center>
    </h1>
    </div>";
      
    include 'nav.php';

    echo "<div id='blog-element-article'>";

    echo "<div class='blog-content'>";

    echo "<p>".$message_blog_article_undefined."</p>";

    echo "</div>";

    echo "</div>";

    }

	}

	echo
	"</body>
	</html>";

?>