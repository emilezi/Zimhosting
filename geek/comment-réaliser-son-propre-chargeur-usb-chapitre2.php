<?php
session_start();
include '../php/language.php';
include '../php/webtxt.php';
$name_page = 'Comment réaliser son propre chargeur USB, Chapitre 2';
$id_page = 'zdgtuto3-2';
?>
<html>
    <head>
    <meta name="google-site-verification" content="l9Ej9sm0nEmflUOzZPmM-c31fKoqkZ4Js4HeVvsrgzU" />
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="../img/icones/zdgicone.png">
    <link rel="stylesheet" href="../style.css" />
    <title>Comment réaliser son propre chargeur USB, Chapitre 2</title>
    </head>
    <body id=zdg>
    
    <div id="header">
    <h1>
    <center>
    Comment réaliser son propre chargeur USB, Chapitre 2
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
    Dans le chapitre précédent je vous est parlé du principal intérêt
    que créer son propre chargeur pouvait avoir et du coup dans ce
    chapitre il est temps que je vous parle de toute la partie
    théorique concernant la réalisation du chargeur.
    </p>
    </div>
    <div class="zdg-content">
    <h2>
    L’USB qu’est-ce que c’est
    </h2>
    <hr/>
    <p>
    Le nom que porte le fameux connecteur USB sont les initiales d'un nom anglais qui est
    &quot;Universal Serial Bus&quot;. Il a été spécifié par sept
    partenaires industriels (Compaq, DEC, IBM, Intel, Microsoft, NEC et
    Northern Telecom) et il a pour principal intérêt de remplacer
    tout les connecteurs qui y avait avant à l'époque comme les ports
    série, les ports parallèle, les ports PS/2 et puis autre bien-sûr
    tout en étant beaucoup plus simple et plus compact.
    </p>
    <div class="boximageszdg">
    <div class="image">
     <a href="images/tuto3/photo5.jpg">
     <img src="images/tuto3/photo5.jpg" height="200">
     </a>
     </div>
     </div>
    <p>
    Sa tout première version à été conçu en 1996 et elle était capable de transmettre des
    informations sur des débit moyennant le 1 mbit.
    </p> 
    <p>
    4 ans après il y a eu la version 2.0 qui avait la particularité d’être plus rapide avec
    lesquels on pouvait atteindre des débits allant jusqu’à 600 mbit
    qui s’est énormément démocratisé et puis 10 ans et 15 ans
    après y a eu l'USB 3 et puis l'USB 3.1 qui est aujourd'hui 10 a 20 fois
    plus rapide avec lequel on peut atteindre en théorie
    le Go à la seconde.
    </p> 
    </div>
    <div class="zdg-content">
    <p>
    Le connecteur de base est principalement composé de 4 broches. Il possède 2 broches
    concernant l'alimentation comprenant un +5v avec la masse et des
    broches d+ et d- servent au transfert de l'information. 
    </p>
    <div class="boximageszdg">
    <div class="image">
     <a href="images/tuto3/image17.jpg">
     <img src="images/tuto3/image17.jpg" height="200">
     </a>
     </div>
    <div class="image">
     <a href="images/tuto3/photo6.jpg">
     <img src="images/tuto3/photo6.jpg" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/image18.jpg">
     <img src="images/tuto3/image18.jpg" height="200">
     </a>
     </div>
     </div>
     </div>
     <div class="zdg-content">
    <p>
    Mais le brochage peut varier selon les 
    différentes normes.Parce que oui,
    certaines normes comme l'USB 3.0 ou 3.1 vont posséder 5 broche en 
    plus des 4 afin de faire circuler l'information beaucoup plus vite.
    </p>
    <div class="boximageszdg">
    <div class="image">
     <a href="images/tuto3/photo7.jpg">
     <img src="images/tuto3/photo7.jpg" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/photo8.jpg">
     <img src="images/tuto3/photo8.jpg" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/image19.jpg">
     <img src="images/tuto3/image19.jpg" height="200">
     </a>
     </div>
     </div>
     </div>
     <div class="zdg-content">
    <p>
    Sachant que l'USB que nous
    retrouvons sur la plupart des chargeurs de téléphones reste
    classique. Nous allons juste nous concentrer sur leurs brochage de
    base.
    </p>
    <div class="boximageszdg">
    <div class="image">
     <a href="images/tuto3/photo9.jpg">
     <img src="images/tuto3/photo9.jpg" height="200">
     </a>
     </div>
     </div>
    </div>
    <div class="zdg-content">
    <p>
    L'USB que nous retrouvons
    aujourd’hui sur nos vieux ordinateurs, et sous tous les petits
    appareils comme les lecteurs mp3 ou encore les vieux téléphones et
    iPod sont principalements équipés d’USB 2.0. Il a la
    particularité de délivrer jusqu’à un courant 500 mA ce qui est
    idéal pour pouvoir les alimenter.
    </p>
    <p>
    Mais sauf que comment fait-on pour chargé certains appareils comme ceux de la marque
    Apple ou encore avoir 2 ampères sur certain ports USB comme c’est le cas des
    chargeurs de smartphone moderne. Parce oui que il peut être
    possible de créer un chargeur USB en relient juste le pôle plus
    et moins du chargeur à une source d’alimentation 5 volt mais
    c'est pas comme ça que nous allons avoir un chargement optimal
    pour certains appareils.
    </p>
    </div>
    <div class="zdg-content">
    <h2>
    l'USB est ses technologies
    </h2>
    <hr/>
    <p>
    L’USB de base que nous connaissons actuellement est remplie de technologie. Déjà parce
    que parce dans son utilisation normale le fils d+ et d- ont la
    particularité de transporter tout un tas d’information par plein
    de protocoles différents. Et bien ils ont aussi un rôle majeur
    sur les ports USB de chargement car c’est grâce à eux
    que nous allons aussi pouvoir définir si c'est un port compatible
    recharge rapide, le rendre compatible avec les appareils Apple ou
    encore lui mettre des technologies plus avancées et beaucoup plus
    complexe comme le quick charge que l'on retrouve aujourd’hui sur
    les chargeurs de téléphone à partir du Galaxy s6
    </p>
    <p>
    Bon quand je vous dis que c'est une technologie très complexe. Voilà un schéma
    </p>
    <div class="boximageszdg">
    <div class="image">
     <a href="images/tuto3/image20.png">
     <img src="images/tuto3/image20.png" height="200">
     </a>
     </div>
     </div>
    <p>
    Durant tout ce cours c'est une technologie qui ne sera d’ailleurs pas intégrée au chargeur
    à cause de sa complexité. Mais avec les technologies de base que
    je vous est cité dessus on devrait quand même rester sur un
    chargeur assez potable avec lesquels on pourrait charger pas mal
    d'appareils avec.
    </p>
    </div>
    <div class="zdg-content">
    <h2>Les tests</h2>
    <hr/>
    <p>
    Je vous ai parlé de la norme USB en détail donc maintenant je vais pouvoir vous montrer
    des tests de fonctionnement afin de vous montrer comment ces
    technologies fonctionnement.
    </p>
    <p>
    Pour ça je me suis donc munie d’une labdec avec un connecteur USB et une vieille
    alimentation d'ordinateurs qui a la particularité de me délivrer
    une tension extrêmement stable tout en délivrant un courant
    extrêmement propre. Et puis je câble le tout.
    </p>
    <p>
    Je place le port USB sur ma plaque d'essai relier entre le 5 volt et la masse du convertisseur et vous
    remarquerez que l'appareil se met à recharger.
    </p>
    <div class="boximageszdg">
    <div class="image">
     <a href="images/tuto3/photo12.jpg">
     <img src="images/tuto3/photo12.jpg" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/photo10.jpg">
     <img src="images/tuto3/photo10.jpg" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/photo13.jpg">
     <img src="images/tuto3/photo13.jpg" height="200">
     </a>
     </div>
     </div>
    </div>
    
    <div class="zdg-content">
    <h2>
    Mais…
    </h2>
    <hr/>
    <p>
    Comment fait-on pour rendre
    notre prototype compatible avec les appareils Apple sachant
    qu’ils ont fait une magouille pour qu’on puise utilisé leur
    propre chargeur a l'époque ?
    </p>
    <p>
    Eh bien pour faire ça et bien faut tout simplement regarder comment sont conçu leur
    chargeur.
    </p>
    <div class="boximageszdg">
    <div class="image">
     <a href="images/tuto3/image21.png">
     <img src="images/tuto3/image21.png" width="310" height="180">
     </a> 
     </div>
     <div class="image">
     <a href="images/tuto3/image22.png">
     <img src="images/tuto3/image22.png" width="310" height="180">
     </a>
     </div>
     </div>
    <p>
    Sur un chargeur USB classique qui est fait pour délivrer grand max 500 mA et bien
    lorsque nous analysons la tension que nous avons à la sortie de
    chaque files on a une tension de 5 volts entre le + et la masse et
    une tension nulle entre le fils d+, d- et la masse. Tendit que sur
    un chargeur de la marque Apple, elle n'est pas nul sur ces files là.
    On peut remarquer que nous obtenons une tension environ
    2.5 volts entres les bornes des files en question
    </p>
    <p>
    Il va falloir aussi injecté
    du 2.5 volt sur c'est borne afin de pouvoir rendre notre chargeur
    compatible avec.
    </p>
    <p>
    Et pour cela nous allons tout simplement utiliser un pont diviseur de tension composé de deux
    résistances mis en série que nous allons relier entre le 5 volt
    et la masses afin d'obtenir une tension environ égale à 2.5
    volts.
    </p>
    <div class="boximageszdg">
    <div class="image">
     <a href="images/tuto3/photo11.jpg">
     <img src="images/tuto3/photo11.jpg" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto3/photo2.jpg">
     <img src="images/tuto3/photo2.jpg" height="200">
     </a>
     </div>
     </div>
    <p>
    Autres petit détail très important concernant la recharge rapide, afin de permettre au
    appareils de délivrer plus de 500 mA comme c'est le cas avec les
    chargeur 2 ampère. Nous allons en même temps en profiter pour
    relier les fils data+ et data- ensemble comme c'est le cas sur le schema si dessus
    </p>
    </div>
    <div class="zdg-content">
    <h2>
    Attention
    </h2>
    <hr/>
    <p>
    On va pouvoir passer à la réalisation du vrai produit mais avant faut que je vous parle de
    certaines règles de sécurité. Oui parce que tous les appareils
    sont de plus en plus bourrés d’électronique. Et leur circuit
    sont si complexes qu’ils peuvent être très sensible à la moindre
    anomalie et il serait dommage d'endommager un iPhone XII tout
    simplement parce que vous vous être trompé de polarité dans les
    câblages sur votre port USB ou vous avez injecté une tension trop
    élevée (supérieur à 5.2 v).
    </p>
    <p>
    Testez donc impérativement votre port USB avant de brancher des appareils dessus.
    </p>
    <p>
    Ce que je vous conseille de faire
    </p>
    <p>
    Munissez-vous d'un câble USB entièrement dénudé avec lequel vous placerez un multimètre
    au bout. Vous y placerait le files rouge sur l'entrée du multimètre
    et la masse sur le COM
    </p>
    <p>
    Cela permettra de voir si la tension qu'il y a la sortie de votre port USB soit bien correcte
    et d'assurer que la polarité est bonne en fonction de la tension si elle est positive ou négatif.
    </p>
    <div class="boximageszdg">
    <div class="image">
     <a href="images/tuto3/photo16.jpg">
     <img src="images/tuto3/photo16.jpg" height="200">
     </a>
     </div>
    <div class="image">
     <a href="images/tuto3/photo15.jpg">
     <img src="images/tuto3/photo15.jpg" height="200">
     </a>
     </div>
     </div>
    <p>
    Si vous avez bricolé des
    objets comme c'est le cas de ce fameux dispositif d'éclairage UV
    fonctionnement avec des LED insensible à l'inversion de polarité
    et étant alimenté en USB, ceci peut aussi être un moyen de
    tester le circuit du chargeur
    </p>
    <div class="boximageszdg">
     <div class="image">
     <a href="images/tuto3/photo17.jpg">
     <img src="images/tuto3/photo17.jpg" height="200">
     </a>
     </div>
     </div>
    </div>
    <div class="zdg-content">
    <p>
    Bon, dans ce chapitre, j'ai
    fini de vous parler de la partie théorique, je n'hésiterait
    donc pas à m’attarder dans le chapitre suivant à vous montrer
    la réalisation finale du produit
    </p>
    <p>
    <a href="comment-réaliser-son-propre-chargeur-usb-chapitre3.php">
    Suite : Réaliser son propre chargeur USB, Chapitre 3
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
