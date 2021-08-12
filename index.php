<?php 
session_start();
include 'php/database.php';
include 'php/infoclient.php';
include 'php/language.php';
include 'php/webtxt.php';
global $db;
?>

<html>
    <head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="img/icones/zimhostingicone.png">
    <link rel="stylesheet" href="style.css"/>
    <title>Zimhosting.fr</title>
    </head>
    
    <body id=accueil>
    
    <div id="header">
    
    <center><h1>Zimhosting</h1></center>
    
    </div>
    
    <?php include 'nav.php';?>
    
    <div id="slideshow">

<div id="container">
  <ul id="slides">
    <li class="slide">
      <div class="slide-partial slide-left"><img src="img/banniere/zimhosting-left.png"/></div>
      <div class="slide-partial slide-right"><img src="img/banniere/zimhosting-right.png"/></div>
      <h1 class="title"><span class="title-text">Zimhosting.fr</span></h1>
      <h3 class="info"><span class="title-text"><?=$message_zimhosting_slide_1?></span></h3>
    </li>
    <li class="slide">
      <div class="slide-partial slide-left"><img src="img/banniere/zdg-left.png"/></div>
      <div class="slide-partial slide-right"><img src="img/banniere/zdg-right.png"/></div>
      <h1 class="title"><span class="title-text"><?=$titre_zimhosting_app_zdg?></span></h1>
      <h3 class="info"><span class="title-text"><?=$message_zimhosting_slide_2?></span></h3>
    </li>
  </ul>
  <ul id="slide-select">
    <li class="btn btn-prev"><</li>
    <div id="slides-button">
    <li class="selector"></li>
    <li class="selector"></li>
    </div>
    <li class="btn btn-next">></li>
  </ul>
</div>
<script src='JS/jquery.min.js'></script><script  src="JS/slideshow.js"></script>

</div>
    
    <div class="site-content">
	 
	 <div class='contenue-small-accueil'>
	 
	 <h2><?=$titre_zimhosting_site?></h2>
	 
	 <hr/>
	 
	 <div class="boxapp">
    <div class="siteapp" style="width:200px;">
    <div class="image">
    <a href="blog/index.php">
    <img src="img/icones/blogicone.png" style="width:200px;">
    </a>
    </div>
    <p><center><?=$titre_zimhosting_app_blog?><center><p>
    </div>
     
    <div class="siteapp" style="width:200px;">
    <div class="image">
    <a href="geek/index.php">
    <img src="img/icones/zdgicone.png" style="width:200px;">
    </a>
    </div>
    <p><center><?=$titre_zimhosting_app_zdg?><center><p>
    </div>
     
    <div class="siteapp" style="width:200px;">
    <div class="image">
    <a href="forum/index.php">
    <img src="img/icones/forumicone.png" style="width:200px;">
    </a>
    </div>
    <p><center><?=$titre_zimhosting_app_forum?><center><p>
    </div>
    
    <div class="siteapp" style="width:200px;">
    <div class="image">
    <a href="game/index.php">
    <img src="img/icones/jeuxicone.png" style="width:200px;">
    </a>
    </div>
    <p><center><?=$titre_zimhosting_app_game?><center><p>
    </div>
     
    </div>
	 
	 </div>

   <div class='contenue-small-accueil'>

    <h2>New</h2>
    <hr/>
    
    <?php
   
   $qn = $db->prepare("SELECT * FROM search_data WHERE actif=:actif ORDER BY data_date DESC LIMIT 5");
   $qn->execute([
      'actif' => 'yes'
      ]);
      if($qn->rowCount() > 0) {

      while($a = $qn->fetch(PDO::FETCH_ASSOC)) { 
         
        echo "<a href='" . $a['link'] . "'><h3>". $a['article'] . "  -  " . $a['element'] . "  -  " .$a['data_date']. "</h3></a><br/>";
         
      }

      }
   ?>

    </div>
	 
	 </div>
	 
	 <?php include 'footer.php';?>
	 
    </body>
</html>
