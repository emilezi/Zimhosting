<?php 
session_start();
include '../php/language.php';
include '../php/webtxt.php';
$name_page = 'Comment réaliser son propre chargeur USB, Chapitre 1';
$id_page = 'zdgtuto3-1';
?>
<html>
    <head>
    <meta name="google-site-verification" content="l9Ej9sm0nEmflUOzZPmM-c31fKoqkZ4Js4HeVvsrgzU" />
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="../img/icones/zdgicone.png">
    <link rel="stylesheet" href="../style.css" />
    <title>Comment réaliser son propre chargeur USB, Chapitre 1</title>
    </head>
    <body id=zdg>
    
    <div id="header">
    <h1>
    <center>
    Comment réaliser son propre chargeur USB, Chapitre 1
    <center>
    </h1>
    </div>
    
    <?php include 'nav.php';?>

    <div id="zdg-aside" class="indisplay">
    <h2>
    tutoriels
    </h2>
    <hr/>
    <br/>   
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
    
    </div>
    
    <div id="zdg-content">
    
    <div class="zdg-content">
    <h2>
    Introduction
    </h2>
    <hr/>
    <p>
    Hey les Web viewer comment allez-vous en ce moment. Bon il y a peu de
    temps sur ce site je vous avais fait un cours sur &quot;comment
    coder une page en HTML&quot; ,je vous est parlé des bases
    du langage. Et bien la, accrochée vous bien parce que aujourd’hui
    nous allons parler électronique et principalement, je
    vais vous montrer comment réaliser un chargeur USB.
    </p>
    <div class="boximageszdg">
    <div class="image">
     <a href="images/tuto3/photo32.jpg">
     <img src="images/tuto3/photo32.jpg" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/photo31.jpg">
     <img src="images/tuto3/photo31.jpg" height="200">
     </a>
     </div>
     </div>
     </div>
    
     <div class="zdg-content">
    <p>
    Bon je pense que j'ai pas
    besoin de vous parler de ce que c'est. Mais vous savez ce sont ces
    objets avec lesquels vous allez charger votre téléphone et tout
    au type appareils avec un port USB
    </p>
    <div class="boximageszdg">
    <div class="image">
     <a href="images/tuto3/photo4.jpg">
     <img src="images/tuto3/photo4.jpg" height="200">
     </a>
     </div>
     </div>
     </div>
    
    <div class="zdg-content">
    <p>
    Préparer vous parce que je
    vais vous expliquer de A à Z comment en créé un.
    </p>
    <p>
    Alors il faut savoir que ce
    cours sera diviser en plusieurs chapitre. Il y aura le premier
    chapitre dans lequel je vais tout d'abord vous parler de l'intérêt
    que cela peut avoir. Ensuit-il y aura le deuxième chapitre qui
    concernera tout la partie théorie sur l'électronique. Je vais
    principalement vous parler du connecteur USB avec les différentes
    façons de réaliser un circuit électronique, les choses à faire
    et à ne surtout pas faire afin d’éviter
    d’avoir des problèmes derrière. Et après pour finir il y aura
    bien sur le troisième et dernier chapitre de ce cours qui
    consistera principalement à parler de la réalisation du produit
    avec les finitions qu’il y a avec.
    </p>
    </div>
    
    <div class="zdg-content">
    <h2>
    Introduction à la réalisation
    </h2>
    <hr/>
    <p>
    Concernant la réalisation,
    c'est pas la première fois que j'en réalise un. Pour ceux qui me
    suivent sur mon compte Instagram principal, j'en avais déjà
    partagé quelques photos d’un prototype que j'avais fait y a
    quelques années à peu près. Soit 3 ans à l'heure ou je publie
    ce cours.
    </p>
    <div class="boximageszdg">
    <div class="image">
     <a href="images/tuto3/photo1.jpg">
     <img src="images/tuto3/photo1.jpg" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/photo2.jpg">
     <img src="images/tuto3/photo2.jpg" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/photo3.jpg">
     <img src="images/tuto3/photo3.jpg" height="200">
     </a>
     </div>
     </div>
    <p>
    Au niveau de son électronique,il dispose, de 4 ports USB, d’une petite led
    permettent d’indiquer le bon fonctionnement du circuit avec
    bien-sûr des résistances, des diodes afin d’assurer la
    protection du circuit, le tout avec un module convertisseur à
    découpage qui a pour but de convertir des tensions d’entrée de
    10 a 30v afin de générer du 5v.
    </p>
    <p>
    Concernant la norme des ports USB du chargeur, on est sur des
    ports de recharge classique comme l'on retrouve sur les chargeurs
    de téléphone (2 ampères), ce qui est idéal pour un chargeur
    USB.
    </p>
    <p>
    Sachant que j'ai prévu de m'en refaire un qui est beaucoup plus puissant avec lesquels on
    pourra brancher vraiment beaucoup de chose dessus et bien j'en
    profite pour vous partager tout ça.
    </p>
    </div>
    <div class="zdg-content">
    <h2>
    L’intérêt que cela apporte
    </h2>
    <hr/>
    <p>
    Réalisé c'est chargeur maison peut avoir plusieurs intérêts, déjà ça permet d’avoir
    un chargeur qui possède beaucoup de port USB pour pouvoir
    charger beaucoup d’appareil quand en est chez soit ou en
    déplacement. Mais aussi vu qu'ils sont équipé de module à découpage
    qui régule des tensions sur des plages d’allant de 10 a 30v en
    5v et bien ils permettent aussi d’avoir une source de courant
    stable depuis n’importe quel courant respectent ces tensions. Oui
    parce qu’il peut très bien servir sur une prise allume cigares
    d’une voiture ou d’un camion, sur un parc de pile ou de
    batterie n’excédant pas 30v , depuis un panneau solaire par
    exemple pour un camping, ou même sur les prises laboratoire que
    vous pouvait trouver à l'arrière des tables de votre salle de
    sciences du lycée si vous avez envie de vous amuser avec.
    </p>
    </div>
    <div class="zdg-content">
    <h2>
    Passons à la réalisation mais avant.
    </h2>
    <hr/>
    <p>
    Nous allons pouvoir passer
    à la réalisation du chargeur mais avant faut que je vous parle un
    petit peu de théorie en électronique afin de mieux comprendre
    comment tout ça se réalise.
    </p>
    <p>
    Je vous invite donc à voir le chapitre suivent entièrement consacré à ça
    </p>
    <p>
    Je vais principalement vous parler de la fameuse norme USB avec les différentes technologies
    qui peut avoir dessus et qui pourront bien-sûr servir avec les choses à faire et à ne pas faire afin
    d’éviter d'avoir des problèmes sachant que l'électronique et
    bien ça reste assez délicat surtout quand on a très peut de
    connaissance dans le domaine.
    </p>
    <p>
    <a href="comment-réaliser-son-propre-chargeur-usb-chapitre2.php">
    Suite : Réaliser son propre chargeur USB, Chapitre 2
    </a>
    </p>
    </div>
     
    <div class="zdg-content">
     
     <?php include '../comment/commentaire.php';?>
     
     </div>
     <div class="zdg-content">
     
     <?php include '../comment/commentairepost.php';?>
     
     
     </div>
     
     </div>
    
    </body>
</html>
