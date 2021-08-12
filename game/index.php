<?php 
session_start();
include '../php/database.php';
include '../php/infoclient.php'; 
include '../php/language.php';
include '../php/webtxt.php';
global $db;
?>

<html>
    <head>
    <meta name="google-site-verification" content="l9Ej9sm0nEmflUOzZPmM-c31fKoqkZ4Js4HeVvsrgzU" />
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../img/icones/zimhostingicone.png">
    <link rel="stylesheet" href="../style.css" />
    <title>Zone de jeux</title>
    </head>
    
    <body id="game-menu">
    
    <div id="header">
    <h1>
    <center>
    Zone de jeux
    <center>
    </h1>
    </div>

    <?php include 'nav.php';?>

    <div id='game-aside'>

    <?php

    if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {
    
    echo "<h2>Profil</h2>";
    echo "<hr/><h4>".$_SESSION['pseudo']."</h4><br/>";
    
   }else{
    
    echo "<h2>Compte</h2>
    <hr/>
    <p><a href='../users/compte.php'>Connectez vous</a></p>
    ";
	
   }
   
   ?>

    </div>
    
	<div id="game-element">
     
    <div class="boxelementgame">
     
    <a href="hextris/">
    <div class="siteapp elementgame">
    <div class="image">
    <img src="../img/icones/hextrisbig.png">
    </div>
    <hr/>
    <p><center>Hextris<center><p>
    </div>
    </a>
     
    <a href="snake/">
    <div class="siteapp elementgame">
    <div class="image">
    <img src="../img/icones/snakeicone.png">
    </div>
    <hr/>
    <p><center>Snake<center><p>
    </div>
    </a>
    
    </div>
     
	 </div>
	 
    </body>
</html>
