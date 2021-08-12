<?php
session_start();
include '../php/database.php'; 
include '../php/language.php';
include '../php/webtxt.php';
global $db;

echo "<html>
<head>";

echo "<meta charset='utf-8' />
  <link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
  <link rel='stylesheet' href='../style.css' />
  <title>".$titre_header_admin."</title>
  </head>";
  
echo "<body id=accueil>";
    
echo "<div id='header'>";
    
echo "<h1><center>".$titre_header_admin."</center></h1>";
    
echo "</div>";
  
include 'nav.php';
 
if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
{
  if($_SESSION['class'] == "administrateur"){

  echo "<div id='admin-nav'>";

  echo "<h3 class='indisplay'>".$titre_admin_statisiques."</h3>";

  echo "<hr class='indisplay'/>";
  
  $st1 = $db->prepare("SELECT * FROM users WHERE actif=:actif");
  $st1->execute([
    'actif' => "yes"
  ]);
   $st_value1 = $st1->rowCount();
   
  echo "<p>" . $message_admin_statistique_users . $st_value1 . "</p>";

  $st2 = $db->prepare("SELECT * FROM ip_client");
  $st2->execute();
  $st_value2 = $st2->rowCount();

  echo "<p>" . $message_admin_statistique_connexions . $st_value2 . "</p>";

  $st3 = $db->prepare("SELECT * FROM commentaire WHERE actif=:actif");
	$st3->execute([
	'actif' => "yes"
	]);
  $st_value3 = $st3->rowCount();

  echo "<p>" . $message_admin_statistique_comment . $st_value3 . "</p>";
  
  $st4 = $db->prepare("SELECT * FROM avis");
	$st4->execute([]);
  $st_value4 = $st4->rowCount();
  
  echo "<p>" . $message_admin_statistique_avis . $st_value4 . "</p>";
  
  echo "</div>";
    
  echo "<div id='admin-element'>";
  	
  ?>
    
   <div class="boxelementadmin">
  
   <a href="users.php">
   <div class="siteapp elementadmin">
   <div class="image">
   <img src="../img/icones/usersicone.png">
   </div>
   <p><center><?=$titre_admin_app_users?><center><p>
   </div>
   </a>
     
   <a href="commentaires.php">
   <div class="siteapp elementadmin">
   <div class="image">
   <img src="../img/icones/commentairesicone.png">
   </div>
   <p><center><?=$titre_admin_app_comment?><center><p>
   </div>
   </a>
     
   <a href="connexion.php">
   <div class="siteapp elementadmin">
   <div class="image">
   <img src="../img/icones/connexionicone.png">
   </div>
   <p><center><?=$titre_admin_app_connexions?><center><p>
   </div>
   </a>
     
   <a href="security.php">
   <div class="siteapp elementadmin">
   <div class="image">
   <img src="../img/icones/securiteicone.png">
   </div>
   <p><center><?=$titre_admin_app_security?><center><p>
   </div>
   </a>
     
   <a href="avis.php">
   <div class="siteapp elementadmin">
   <div class="image">
   <img src="../img/icones/avisicone.png">
   </div>
   <p><center><?=$titre_admin_app_avis?><center><p>
   </div>
   </a>
     
   </div>
     
   <?php

    echo "</div>";
  	
  	}else{

      echo "<div id='admin-nav'>";

	    echo "<h3>".$titre_admin."</h3>";
 
	    echo "<hr/>";
 
	    echo "<p>".$message_admin_compte_admin_undefined_2."</p>";
 
	    echo "</div>";

    	echo "<div id='admin-element'>";
  		
	    echo "<div class='admin-content'>";	
  		
  	  echo "<p>".$message_admin_compte_admin_undefined."</p>";
  	
  	  echo "</div>";

	    echo "</div>";

  	}
    }else{
    header('Location: ../index.php');
    }
    
   ?>
  
  </body>
</html>
