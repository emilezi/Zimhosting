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
    <link rel="icon" type="image/png" href="img/icones/zimhostingicone.png">
    <link rel="stylesheet" href="style.css" />
    <title>Accueil</title>
    </head>
    
    <body id=accueil>
    
    <div id="header">
    <h1>
    <center>
    Zimhosting
    <center>
    </h1>
    </div>
    
    <?php include 'nav.php';?>
     
     <div class="contenue-small">
     
     <h2>
     Sources
     </h2>
     
     <hr/><br/>
     
     <h3>
     Ubuntu Serveur
     </h3>
     <p>
     <a href=https://ubuntu.com/>
     Site officiel de'Ubuntu
     </a>
     <p>
     
     </div>
	 
     <?php include 'footer.php';?>

    </body>
</html>
