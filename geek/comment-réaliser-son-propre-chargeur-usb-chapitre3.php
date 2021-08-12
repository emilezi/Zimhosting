<?php
session_start();
include '../php/language.php';
include '../php/webtxt.php';
$name_page = 'Comment réaliser son propre chargeur USB, Chapitre 3';
$id_page = 'zdgtuto3-3';
?>
<html>
    <head>
    <meta name="google-site-verification" content="l9Ej9sm0nEmflUOzZPmM-c31fKoqkZ4Js4HeVvsrgzU" />
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="../img/icones/zdgicone.png">
    <link rel="stylesheet" href="../style.css" />
    <title>Comment réaliser son propre chargeur USB, Chapitre 3</title>
    </head>
    <body id=zdg>
    
    <div id="header">
    <h1>
    <center>
    Comment réaliser son propre chargeur USB, Chapitre 3
    <center>
    </h1>
    </div>
    
    <?php include 'nav.php';?>

    <div id="zdg-aside" class="indisplay">
    <h2>
    Tutoriels
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
    Hey me revoilà de retours. Dans le chapitre précédent je vous avais
    parlé de la théorie sur la réalisation d'un chargeur USB et donc
    c'est parti nous allons passer à la face de
    réalisation de la carte avec les finitions du produit finale
    </p>
    </div>
    
    <div class="zdg-content">
    <h2>
    Commençons par réaliser notre circuit imprimé.
    </h2>
    <hr/>
    <p>
    Pour la réalisation de notre chargeur, Commencent à réaliser son éléments de base.
    C'est à dire son circuit imprimé.
    </p>
    <p>
    Aujourd’hui, il existe différentes façon d'en réaliser un.
    </p>
    <p>
    Vous pouvait dans une première façon entièrement le réalisé vous-même en vous
    munissent de petits cartes électroniques sur laquelle vous allez
    placer les composents que vous allez souder et tracer des pistes
    avec de l'étain à l'aide d'un fer à souder.
    </p>
    <div class="boximageszdg">
    <div class="image">
     <a href="images/tuto3/photo18.jpg">
     <img src="images/tuto3/photo18.jpg" height="200">
     </a>
     </div>
     </div>
     </div>
    
     <div class="zdg-content">
    <p>
    Mais vous pouvait aussi d'une deuxième façon réalisé vous-même vos propres circuit
    imprimé depuis certains logiciels de modélisation PC pour ensuite
    les faires faire par une entreprise.
    </p>
    <div class="boximageszdg">
    <div class="image">
     <a href="images/tuto3/image8.png">
     <img src="images/tuto3/image8.png" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/image9.png">
     <img src="images/tuto3/image9.png" height="200">
     </a>
     </div>
     </div>
     </div>
    
     <div class="zdg-content">
    <p>
    Sachant qu’on peut avoir des résultats plus propre et plus précis en faisant faire nos
    cartes électroniques par des entreprises. Nous allons donc dans ce
    cours réalisé le chargeur de cette façon mais après libre à
    vous de la réalisée comme vous le souhaitait 
    </p>
    </div>
    
    <div class="zdg-content">
    <h2>
    La conception
    </h2>
    <hr/>
    <p>
    Pour pouvoir réaliser depuis cette méthode, vous allez vous servir de votre PC sur
    lesquels vous installeraient les logiciels nécessaires pour la
    modalisation.
    </p>
    <p>
    Concernant les logiciels ils en existent pleins, mais je peux vous en conseiller un de bien
    qui s'appelle Pcbnew créer par kidcad avec lesquels vous pourrait
    faire pas mal de chose avec et nous retrouveront tout un tas
    d'éléments vraiment bien.
    </p>
    <p>
    <a href="https://kicad.org/">
    Site officiel de KiCad PcbNew
    </a>
    </p>
    </div>
    
    <div class="zdg-content">
    <p>
    Au niveau de son interface, on dispose d’outils permettant de tracer
    des pistes, d'une bibliothèque dans lesquels vous trouverait
    certains emplacements prédéfinis pour y mettre les composents avec d’autres outils comme la
    visualisation 3d permettant d’avoir une vue d'ensemble de la carte.
    </p>
    <div class="boximageszdg">
    <div class="image">
     <a href="images/tuto3/image1.png">
     <img src="images/tuto3/image1.png" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/image2.png">
     <img src="images/tuto3/image2.png" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/image3.png">
     <img src="images/tuto3/image3.png" height="200">
     </a>
     </div>
     </div>
    </div>
    
    <div class="zdg-content">
    <p>
    Commencent par ouvrir le logiciel Pcbnew avec lesquel nous allons réalisé l'intégralité de notre
    circuit imprimé.
    </p>
    </div>
    
    <div class="zdg-content">
    <p>
    Commencent par tracé les délimitations de la carte avec les outils de tracer et les propriété 'Edge.cuts'.
    </p>
    <div class="boximageszdg">
     <div class="image">
     <a href="images/tuto3/image4.png">
     <img src="images/tuto3/image4.png" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/image5.png">
     <img src="images/tuto3/image5.png" height="200">
     </a>
     </div>
     </div>
     </div>
    
     <div class="zdg-content">
    <p>
    Placez ensuite les différents composents comme les emplacements des ports USB des
    résistances des entrées sortie grâce à la fameuse bibliothèque.
    </p>
    <div class="boximageszdg">
     <div class="image">
     <a href="images/tuto3/image6.png">
     <img src="images/tuto3/image6.png" height="200">
     </a>
     </div>
     </div>
     </div>
    
     <div class="zdg-content">
    <p>
    Et pour finir tracez les différentes piste entre chaque composant
    tout en configurent la largeur des pistes dans priorité afin de permettre à la carte de supporter
    suffisamment d'ampères pour des utilisation élévé.
    </p>
    <div class="boximageszdg">
     <div class="image">
     <a href="images/tuto3/image7.png">
     <img src="images/tuto3/image7.png" height="200">
     </a>
     </div>
     </div>
     </div>
    
     <div class="zdg-content">
    <p>
    Et puis voilà le résultat
    </p>
    <div class="boximageszdg">
     <div class="image">
     <a href="images/tuto3/image8.png">
     <img src="images/tuto3/image8.png" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/image9.png">
     <img src="images/tuto3/image9.png" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/image10.png">
     <img src="images/tuto3/image10.png" height="200">
     </a>
     </div>
     </div>
    </div>
    <div class="zdg-content">
    <h2>
    Sa circuiterie
    </h2>
    <hr/>
    <p>
    Concernant le circuit de réaliser on reste sur un chargeur USB assez classique avec 8 ports
    USB dessus comme je le citais au début de la vidéo. On va
    retrouver une zone principale sur les extrémités du circuit qui
    va amener le +5 volt sur chaque port USB. On va retrouver une masse
    commune sur le contour de la carte avec un pont diviseur de
    résistance permettant d'obtenir du 2.5 volt pour les bornes d+ et
    d- de chaque port USB. On va retrouver différents emplacement de
    diode 1 ampère et 10 ampères afin de protéger le circuit avec
    une diode verte permettant d'assurer le fonctionnement de la carte
    et puis différents emplacements afin d’y connecter différents
    fils comme :
    </p>
    <p>
    Les fils d’alimentations de la carte
    </p>
    <p>
    Une sortie 5 volt permettant d'ajouter d’autres extensions dessus.
    </p>
    <p>
    Ou encore un module permettant de convertir le courant d'arriver en 5 volts
    </p>
    </div>
    <div class="zdg-content">
    <h2>
    La réalisation
    </h2>
    <hr/>
    <p>
    Nous avons fini de modéliser la carte et du coup maintenant il va falloir la
    réalisée. Pour cela et bien nous allons nous servir d'Internet et
    plus précisément d'un site qui s'appelle JLCPCB sur lequel nous
    allons pouvoir soumettre notre projet pour qu’ils puissent
    l’imprimer et nous le livré chez nous.
    </p>
    <p>
    <a href="https://jlcpcb.com/">
    Site officiel JLCPCB
    </a>
    </p>
    <div class="boximageszdg">
     <div class="image">
     <a href="images/tuto3/image13.png">
     <img src="images/tuto3/image13.png" height="200">
     </a>
     </div>
     </div>
     </div>
    
    <div class="zdg-content">
    <p>
    Pour ça, vous allez dans un premier temps aller sur le logiciel afin de faire ce que l'on
    appel un plot, cela va permettre de générer les fichiers
    d’impression qui vont servir pour la carte électronique. Et puis vous allez dans un
    deuxième temps, mettre tout ça dans une archive que
    vous allez upload sur le site et puis tout est réglé.
    </p>
    <div class="boximageszdg">
     <div class="image">
     <a href="images/tuto3/image11.png">
     <img src="images/tuto3/image11.png" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/image12.png">
     <img src="images/tuto3/image12.png" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/image14.png">
     <img src="images/tuto3/image14.png" height="200">
     </a>
     </div>
     </div>
     </div>
    
     <div class="zdg-content">
    <p>
    Une fois importé, le site vous affichera normalement un petit aperçu de la maquette réaliser
    afin de voir que votre circuit prêt à être imprimé soit bien correcte.
    </p>
    <div class="boximageszdg">
     <div class="image">
     <a href="images/tuto3/image15.png">
     <img src="images/tuto3/image15.png" height="200">
     </a>
     </div>
     </div>
     </div>
    
    <div class="zdg-content">
    <p>
    Vous aurait juste à vous faire livrer chez vous et puis voilà le résultat de nos belles
    petites cartes.
    </p>
    <div class="boximageszdg">
     <div class="image">
     <a href="images/tuto3/photo19.jpg">
     <img src="images/tuto3/photo19.jpg" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/photo20.jpg">
     <img src="images/tuto3/photo20.jpg" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/photo21.jpg">
     <img src="images/tuto3/photo21.jpg" height="200">
     </a>
     </div>
     </div>
    </div>
    <div class="zdg-content">
    <h2>
    Attention
    </h2>
    <hr/>
    <p>
    Lorsque vous commandez des choses sur le site faîte attention au prix. L'impression des
    cartes ne coûtent pas très cher pour des cartes comme celle-ci
    mais vue que le site n’est pas français et que tout est imprimé
    depuis l'étranger notamment la Chine et bien les livraisons risque
    d’être super cher. Du coup faite attention soyer sûr de ce que
    vous imprimer.
    </p>
    <div class="boximageszdg">
     <div class="image">
     <a href="images/tuto3/image16.png">
     <img src="images/tuto3/image16.png" height="200">
     </a>
     </div>
     </div>
    </div>
    <div class="zdg-content">
    <h2>
    La mise en place des différents éléments
    </h2>
    <hr/>
    <p>
    Bon, jusqu’à là, nous avons notre beau circuit imprimé, mais il nous manque encore
    quelques choses. Ce sont les fameux composent qu’ils pourraient
    avoir dessus.
    </p>
    <div class="boximageszdg">
     <div class="image">
     <a href="images/tuto3/photo22.jpg">
     <img src="images/tuto3/photo22.jpg" height="200">
     </a>
     </div>
     </div>
     </div>
    
     <div class="zdg-content">
    <p>
    Pour cela vous prendrait les composants nécessaires que vous souderait sur la
    carte au bon emplacement avec un fer à souder.
    </p>
    <div class="boximageszdg">
     <div class="image">
     <a href="images/tuto3/photo23.jpg">
     <img src="images/tuto3/photo23.jpg" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/photo25.jpg">
     <img src="images/tuto3/photo25.jpg" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/photo26.jpg">
     <img src="images/tuto3/photo26.jpg" height="200">
     </a>
     </div>
     </div>
    <p>
    Concernant les composants, vous pouvait en récupérer soit en les désoudant depuis de petite
    carte électronique ou les achetés sur internet pour des prix
    dérisoires.
    <p>
    <a href="https://fr.banggood.com/search/electronique.html?from=nav">
    Banggood
    </a>
    </p>
    <p>
    <a href="https://www.amazon.fr/s?k=sodial+electronique&__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&ref=nb_sb_noss_1">
    Amazon
    </a>
    </p>
    </p>
    </div>
    
    <div class="zdg-content">
    <h2>
    La réalisation du boîtier
    </h2>
    <hr/>
    <p>
    Concernant la réalisation du boîtier vous allez vous servir de différentes plaque en
    plastique que vous découperez à l'aide d'un cuter à la dimension
    précise de la carte.
    </p>
    <div class="boximageszdg">
     <div class="image">
     <a href="images/tuto3/photo28.jpg">
     <img src="images/tuto3/photo28.jpg" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/photo29.jpg">
     <img src="images/tuto3/photo29.jpg" height="200">
     </a>
     </div>
     </div>
    <p>
    Vous collerez ensuite le tout avec de la colle chaude
    </p>
    </div>
    
    <div class="zdg-content">
    <p>
    Et puis voilà le résultat
    </p>
    <div class="boximageszdg">
     <div class="image">
     <a href="images/tuto3/photo31.jpg">
     <img src="images/tuto3/photo31.jpg" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/photo32.jpg">
     <img src="images/tuto3/photo32.jpg" height="200">
     </a>
     </div>
     </div>
    </div>
    
    <div class="zdg-content">
    <p>
    Alors voilà les Web viewer, c'était tout pour ce cours. J'espère qu'il vous à appris des
    choses. Si vous avez des question n'hésitez pas à les posée dans l'espace commentaires
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
