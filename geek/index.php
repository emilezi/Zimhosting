<?php
include '../php/database.php'; 
include '../php/infoclient.php';
include '../php/language.php';
include '../php/webtxt.php';
global $db;
?>
  
<html>
    <head>
    <meta name="google-site-verification" content="l9Ej9sm0nEmflUOzZPmM-c31fKoqkZ4Js4HeVvsrgzU" />
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="../img/icones/zdgicone.png">
    <link rel="stylesheet" href="../style.css" />
    <title>Zone du Geek</title>
    </head>
    <body id=zdg>
    
    <div id="header">
    <h1>
    <center>
    Zone du Geek
    <center>
    </h1>
    </div>
    
    <?php include 'nav.php';?>

    <div id="zdg-element">

    <h2 class='display'>A la une</h2>
    <hr class='display'/>
    
    <div class="boxapp">
    <div class="siteapp">
    <div class="image">
    <center>
    <a href="installer-une-rom-android-personnalisé-sur-un-smartphone.php">
    <img src="icones/iconetuto1.png">
    </a>
    </center>
    </div>
    <br/><hr/>
    <p><center>Installer une rom open source sur un téléphone</center></p>
    </div>
    <div class="siteapp">
    <div class="image">
    <center>
    <a href="comment-réaliser-son-propre-chargeur-usb-chapitre1.php">
    <img src="icones/iconetuto3.png">
    </a>
    </center>
    </div>
    <br/><hr/>
    <p><center>Réaliser son propre chargeur USB</center></p>
    </div>
    <div class="siteapp">
    <div class="image">
    <center>
    <a href="developper-un-site-web-en-html-css-php-et-javascript-chapitre1.php">
    <img src="icones/iconetuto2.png">
    </a>
    </center>
    </div>
    <br/><hr/>
    <p><center>Developper un site web en html, css, php et JS</center></p>
    </div>
    </div>
    </div>

    <div id="zdg-aside">
    <h2>
    Sommaires
    </h2>
    <hr/>
    <br/>
    <h3>
    Android, Smartphone
    </h3>    
    <p>
    <a href="installer-une-rom-android-personnalisé-sur-un-smartphone.php">
    tutoriel : Installer une rom open source sur un téléphone
    </a>
    </p>
    <h3>
    Bricolage, éléctronique
    </h3>    
    <p>
    <a href="comment-réaliser-son-propre-chargeur-usb-chapitre1.php">
    tutoriel : Réaliser son propre chargeur USB, Chapitre 1
    </a>
    </p>
    <p>
    <a href="comment-réaliser-son-propre-chargeur-usb-chapitre2.php">
    tutoriel : Réaliser son propre chargeur USB, Chapitre 2
    </a>
    </p>
    <p>
    <a href="comment-réaliser-son-propre-chargeur-usb-chapitre3.php">
    tutoriel : Réaliser son propre chargeur USB, Chapitre 3
    </a>
    </p>

    <h3>
    Développement Web, hebergements
    </h3>    
    <p>
    <a href="developper-un-site-web-en-html-css-php-et-javascript-chapitre1.php">
    tutoriel : Developper un site web en html,css,php et javascript, Chapitre 1
    </a>
    </p>
    <br/>
    
    </div>
    
    </body>
</html>
