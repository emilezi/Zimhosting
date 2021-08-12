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
    <link rel="stylesheet" href="style.css" />
    <title><?=$titre_zimhosting_ip?></title>
    </head>
    
    <body id=accueil>
    
    <div id="header">
    <h1>
    <center>
    <?=$titre_header_zimhosting_ip?>
    <center>
    </h1>
    </div>
    
    <?php include 'nav.php';?>

	<div class="contenue-small">
    
   <h2><?=$titre_zimhosting_ip?> : <?= $ip; ?></h2>
   
   <hr/>
    
   <p>Navigateur internet : <?= $navigateur; ?></p>
   <p>Appareil : <?= $machine; ?></p>

    </div>
    
    <?php include 'footer.php';?>

</body>
</html>
