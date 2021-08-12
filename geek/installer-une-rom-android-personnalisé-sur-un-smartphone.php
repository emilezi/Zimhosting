<?php
session_start();
include '../php/language.php';
include '../php/webtxt.php';
$name_page = 'Installer une rom Android personnalisé sur un smartphone';
$id_page = 'zdgtuto1';
?>
<html>
    <head>
    <meta name="google-site-verification" content="l9Ej9sm0nEmflUOzZPmM-c31fKoqkZ4Js4HeVvsrgzU" />
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="../img/icones/zdgicone.png">
    <link rel="stylesheet" href="../style.css" />
    <title>Installer une rom Android personnalisé sur un smartphone</title>
    </head>
    <body id=zdg>
    
    <div id="header">
    <h1>
    <center>
    Installer une rom Android personnalisé sur un smartphone
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
    <a href="installer-une-rom-android-personnalisé-sur-un-smartphone.php">
    tutoriel : Installer une rom open source sur un téléphone
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
    Personnaliser
    votre téléphone Android par une version personnaliser d’Android
    vous intéresserait, alors que vous connaissez rien en ce type de
    manipulation. Ce tutoriel est donc fait pour vous et c'est le
    moment de vous l'apprendre.
    </p>
    <p>
    Commençons par parler du
    principal intérêts que peut avoir ce type de manipulation. Vous
    pensez sens doute au routage de votre téléphone ou encore à la
    personnalisation de l'interface de votre téléphone Android. Et
    bien en vérité c'est encore mieux, car le procéder consiste a
    tous simplement changer la version Android de bases du téléphone
    propre au constructeur par une version Android opensource comme
    Lineageos ou encore Cyanogenmod. Cela permet en plus de la
    customisation d'avoir une version Android plus récente que celle
    qui nous est proposés par le constructeur ce qui peut donc nous
    permettre d'avoir une meilleure optimisation avec les nouvelles
    applications actuelles et aussi permettre d’avoirs des petites
    fonctionnalités sur votre ancien téléphone (Bluetooth, filtre
    lumière bleu).
    </p>
    </div>
    
    <div class="zdg-content">
    
    <div class="boximageszdg">
    
    <div class="image">
     <a href="images/tuto1/image1.JPG">
     <img src="images/tuto1/image1.JPG" height="200">
     </a>
     </div>
     
     <div class="image">
     <a href="images/tuto1/image2.JPG">
     <img src="images/tuto1/image2.JPG" height="200">
     </a>
     </div>
     
     <div class="image">
     <a href="images/tuto1/image3.JPG">
     <img src="images/tuto1/image3.JPG" height="200">
     </a>
     </div>
     
     </div>
     </div>
     
     <div class="zdg-content">
     <h2>
     Maintenant
     que je vous ai expliqué tout ça, comment fait on pour formater la mémoire interne du téléphone
     pour pouvoir y mettre la nouvelle version Android Opensource ?
     </h2>
     <hr/>
     <p>
     Et bien il faut savoir que
     tous les téléphones, à côté de la version Android de bases qui
     est installée dessus, ils ont ce qu'ont appel un recovery. 
     </p>
     </div>
     
     <div class="zdg-content">
     <h2>
     Un recovery, qu’est-ce que c’est ?
     </h2>
     <hr/>
     <p>
     C'est tous simplement une
     interface permettent de gérer tous les paramètres de bases du
     téléphone comme la réinitialisation à l’état d’usine ou
     encore pour effectuer des tâches avancées comme le formatage de
     la mémoire interne. Si vous voulez, c'est un peu comme le bios de
     votre ordinateur sauf que le recovery dispose d’outils plus
     avancé concernant le formatage de la mémoire internet du
     téléphone. Et contrairement au ordinateur ou vous allez installer
     un système d’exploitation depuis un support externe sur votre
     pc, et bien sur votre téléphone le recovery vas le faire
     lui-même.
     </p>
     <p>
     Sauf que...
     </p>
     <p>
     le recovery que
     nous avons sur notre téléphone dépend principalement du
     constructeur, il reste donc très limité pour faire des
     manipulations avancées comme installer une nouvelle version
     Android opensources
     </p>
     <p>
     Il va donc falloir aussi
     changer le recovery de bases par un recovery opensources afin de
     pouvoir installer une rom personnaliser sur notre téléphone.
     </p>
     <p>
     Et c'est justement ce que
     nous allons voir dans la première parties du tutoriel. Dans un
     premier temps je vais vous montrer la manipulation avec TWRP mais
     après vous verrez aussi maintenant que certains développeurs de
     versions customisée d’Android comme Lineagoes commencent eux
     aussi a faire leur propre recovery.
     </p>
     </div>
     
     <div class="zdg-content">
     <h2>
     Le matériel
     </h2>
     <hr/>
     <p>
     Alors pour commencer il
     vous faudra un téléphone (moi en occurrence je vais vous montrer
     la manipulation avec un Galaxie s4), un câble USB adapté, d'une micro sd et puis d'un ordinateur qui servira
     principalement à installer le recovery open source et à
     télécharger les fichiers nécessaires pour l'installation. 
     </p>
     
     <div class="boximageszdg">
    
    <div class="image">
     <a href="images/tuto1/image5.JPG">
     <img src="images/tuto1/image5.JPG" height="200">
     </a>
     </div>
     </div>
     
     <p>
     Sur votre ordinateur, téléchargez depuis internet les images du recovery open sources. 
     </p>
     <p>
     <a href=https://twrp.me/>
     Site officiel du recovery TWRP
     </a>
     </p>
     
     <div class="boximageszdg">
    
    <div class="image">
     <a href="images/tuto1/image5-1.png">
     <img src="images/tuto1/image5-1.png" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto1/image5-2.png">
     <img src="images/tuto1/image5-2.png" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto1/image5-3.png">
     <img src="images/tuto1/image5-3.png" height="200">
     </a>
     </div>
     </div>
     <p>
     Après ça, installez les logiciels nécessaires pour l'installation du recovery sur votre PC. 
     </p>
     <p>
     Si vous êtes sous Windows
     téléchargez odin, installer les driver nécessaire pour pouvoir
     transférer l'image du recovery sur votre téléphone. En revanche
     si vous êtes sous Linux il faudra utiliser Heimdall.
     </p>
     </div>
     
     <div class="zdg-content">
     <h2>
     Pour windows
     </h2>
     <hr/>
     <p>
     (cours encore en construction)
     </p>
     </div>
     
     <div class="zdg-content">
     <h2>
     Pour Linux
     </h2>
     <hr/>
     <p>
     Heimdall est intégrée au
     dépôts d’Ubuntu depuis la version 14.04. Peut-être installer
     depuis la Logitech, ou encore depuis le terminale de commande en
     installant les paquets heimdall-flash heimdall-flash-frontend avec
     la commande « apt-get install ».
     </p>
     
     
     <div class="boximageszdg">
    
    <div class="image">
     <a href="images/tuto1/image6.png">
     <img src="images/tuto1/image6.png" height="200">
     </a>
     </div>
     
     <div class="image">
     <a href="images/tuto1/image7.png">
     <img src="images/tuto1/image7.png" height="200">
     </a>
     </div>
     
     <div class="image">
     <a href="images/tuto1/image8.png">
     <img src="images/tuto1/image8.png" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto1/image8.png">
     <img src="images/tuto1/image9.png" height="200">
     </a>
     </div>
     </div>
     <p>
     Bon là d’après les
     screen j’avais déjà fait la manipulation avant de vous faire ce
     tuto. Du coup ne vous inquiétez pas s’il vous dit qu’il n’est
     pas installé, c'est normal.
     </p>
     
     <p>
     <a href=https://doc.ubuntu-fr.org/heimdall>
     Documentation Ubuntu
     </a>
     </p>
     </div>
     
     <div class="zdg-content">
     <p>
     Une fois installée, vous
     brancherez votre téléphone sur votre ordinateur avec le câble
     USB qui lui est adapté. Et il suffira tous simplement de démarrer
     en mode dowload en appuyant simultanément sur les différents
     boutons
     </p>
     <p>
     Alors concernant les
     différents boutons, il s'agira principalement de se servir du
     bouton volume bas avec le bouton power et le bouton home. Mais
     après la configuration des boutons peuvent varier selon les
     différents constructeurs et les différents modèles des
     téléphones
     </p>
     
     <div class="boximageszdg">
    
    <div class="image">
     <a href="images/tuto1/image10.JPG">
     <img src="images/tuto1/image10.JPG" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto1/image11.JPG">
     <img src="images/tuto1/image11.JPG" height="200">
     </a>
     </div>
     
     </div>
     
     <p>
     Bien branché sur votre
     ordinateur en mode dowload, exécutez les logiciels nécessaires
     pour le transfère du recovery (TWRP).
     </p>
     
     </div>
     
     <div class="zdg-content">
     <h2>
     C’est quoi le mode download ?
     </h2>
     <hr/>
     <p>
     Et bien le mode dowload,
     c’est un mode qui se trouve juste a coté du recovery. C’est
     lui qui permet de mettre a jours le recovery c'est aussi lui par
     lesquels les constructeurs vont injecter le système Android sur
     le téléphone. Tout est fait via un câble USB depuis un
     ordinateur
     </p>
     </div>
     
     <div class="zdg-content">
     <h2>
     Dans tous
     ça y a besoin de rooter le téléphone pour pouvoir installer un
     recovery avec un système Android open source ?
     </h2>
     <hr/>
     <p>
     Et bien la principale
     réponse est non car rooter son téléphone consiste tout
     simplement à se permettre de faire des choses sur la version
     Android du téléphone que nous ne pouvons pas faire de bases.
     Tandis que la nous allons carrément remplacer la version du
     système de bases par une version Android open sources. Du coup il
     y a pas réellement de problème à avoir là-dessus. Cependant
     avant toute manipulation il frauda quand même faire attention que
     le deboguage USB soit bien activée pour que vous puisiez vous
     servir du mode dowload, notamment sur les nouveaux téléphones
     (Galaxy s8, Galaxy 9, etc...).
     </p>
     
     </div>
     
     <div class="zdg-content">
     <h2>
     Pour Windows
     </h2>
     <hr/>
     <p>
     (cours encore en construction)
     </p>
     </div>
     
     <div class="zdg-content">
     <h2>
     Pour Linux
     </h2>
     <hr/>
     <p>
     Ouvrez le terminal de
     commandes afin de pouvoir utiliser Heimdall pour nous permettre de
     transférer l’image du recovery sur le téléphone grâce à la
     commande si dessous.
     </p>
     
     <p>
     « heimdall flash
     --RECOVERY twrp-3.0.2-0-jfltexx.img » avec «
     twrp-3.0.2-0-jfltexx.img » représentent la source du fichier
     sélectionné.
     </p>
     
     <p>
     Exécutez la commande pour transférer le recovery sur le téléphone.
     </p>
     
     <div class="boximageszdg">
    
    <div class="image">
     <a href="images/tuto1/image12.png">
     <img src="images/tuto1/image12.png" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto1/image12-1.png">
     <img src="images/tuto1/image12-1.png" height="200">
     </a>
     </div>
     
     </div>
     
     <p>
     Attention : lors de
     l’installation du recovery sur votre téléphone assurez-vous
     toujours de prendre une version qui soit correctement adapté au
     model de votre téléphone. Sinon vous risquerez d’avoir des
     problèmes de compatibilité et le recovery risquerait de ne pas
     pouvoir fonctionner.
     </p>
     
     </div>
     
     <div class="zdg-content">
     <h2>
     Téléchargez les fichiers nécessaires pour l'installation.
     </h2>
     <hr/>
     
     <p>
     Téléchargez le fichier
     zip de la version Android que vous souhaitez installer sur votre
     téléphone. Alors mois en occurrence je vais vous montrer le
     principe avec le Lineageos mais après il en existe plein d'autres
     que vous pouvez installer par vous-même depuis la petite liste
     ci-dessous.
     </p>
     <div class="boximageszdg">
    
    <div class="image">
     <a href="images/tuto1/image13.png">
     <img src="images/tuto1/image13.png" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto1/image14.png">
     <img src="images/tuto1/image14.png" height="200">
     </a>
     </div>
     </div>
     <p>
     Liste des meilleurs roms Android customisée à installer :
     </p>
     <p>
     <a href=https://lineageos.org/>
     Site officiel de LineageOS
     </a>
     </p>
     <p>
     <a href=https://www.resurrectionremix.com//>
     Site officiel de Resurrection Remix OS
     </a>
     </p>
     <p>
     <a href=https://dirtyunicorns.com//>
     Site officiel de Dirty Unicorns
     </a>
     </p>
     <p>
     N'oubliez pas aussi de
     télécharger aussi les outils open_gapps-arm afin de vous
     permettre d’avoir les fonctionnalités Google (play stor, etc..).
     </p>
     
     <p>
     <a href=https://opengapps.org/>
     Site officiel de OpenGAPPS
     </a>
     </p>
     
     <div class="boximageszdg">
     <div class="image">
     <a href="images/tuto1/image15.png">
     <img src="images/tuto1/image15.png" height="200">
     </a>
     </div>
     
     </div>
     </div>
     
     <div class="zdg-content">
     <h2>
     Une fois les fichiers téléchargés
     </h2>
     <hr/>
     <p>
     Copier les ensuite vers une
     micro sd externe que vous insérerez dans votre téléphone.
     </p>
     
     <div class="boximageszdg">
    
    <div class="image">
     <a href="images/tuto1/image16.JPG">
     <img src="images/tuto1/image16.JPG" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto1/image17.JPG">
     <img src="images/tuto1/image17.JPG" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto1/image16-1.png">
     <img src="images/tuto1/image16-1.png" height="200">
     </a>
     </div>
     </div>
     
     <p>
     Redémarrer votre téléphone
     en mode recovery. Pour effectuer mon démarrage il s’agira
     principalement d'appuyer simultanément sur les boutons volume
     haut, power et home. (configuration qui varient là aussi selon le
     type de téléphone). Et vous arriverez bien sur nouveau recovery,
     à la place de l'ancien qui était propre a au constructeur.
     </p>
     
     <div class="boximageszdg">
    
    <div class="image">
     <a href="images/tuto1/image18.JPG">
     <img src="images/tuto1/image18.JPG" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto1/image19.JPG">
     <img src="images/tuto1/image19.JPG" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto1/image20.JPG">
     <img src="images/tuto1/image20.JPG" height="200">
     </a>
     </div>
     
     </div>
     
     </div>
     
     <div class="zdg-content">
     <h2>
     Dans le recovery
     </h2>
     <hr/>
     <p>
     Faites un formatage complet
     du téléphone en allant dans les paramètres « wipe ».
     </p>
     
     <div class="boximageszdg">
    
    <div class="image">
     <a href="images/tuto1/image21.JPG">
     <img src="images/tuto1/image21.JPG" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto1/image22.JPG">
     <img src="images/tuto1/image22.JPG" height="200">
     </a>
     </div>
     </div>
     
     <p>
    Allez ensuite dans les
    paramètres « install » afin de pouvoir installer les fichiers
    que nous avons mis sur notre micro sd. 
     </p>
     
     <div class="boximageszdg">
    
    <div class="image">
     <a href="images/tuto1/image23.JPG">
     <img src="images/tuto1/image23.JPG" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto1/image24.JPG">
     <img src="images/tuto1/image24.JPG" height="200">
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
    Pour les dernières rom de
    Lineageos utilisez les recovery propres au constructeurs, vous
    risqueriez d’avoir des problèmes de compatibilités avec trwp
    sinon. Pour pouvoir l’installer sur votre téléphone le procédés
    est le même que pour trwp et pour installer la rom le procéder
    est aussi le même comme le montre les photos si dessous
     </p>
     
     <div class="boximageszdg">
    
    <div class="image">
     <a href="images/tuto1/image25.JPG">
     <img src="images/tuto1/image25.JPG" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto1/image26.JPG">
     <img src="images/tuto1/image26.JPG" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto1/image27.JPG">
     <img src="images/tuto1/image27.JPG" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto1/image28.JPG">
     <img src="images/tuto1/image28.JPG" height="200">
     </a>
     </div>
     
     </div>
     
     <p>
    Une fois la rom bien
    installer sur le téléphone, n’oubliez pas d’installer les
    fichiers contenant les outils open_app afin d’avoir les outils
    Google (play stor, etc..).
    </p>
    
    <div class="boximageszdg">
    
    <div class="image">
     <a href="images/tuto1/image27.JPG">
     <img src="images/tuto1/image27.JPG" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto1/image29.JPG">
     <img src="images/tuto1/image29.JPG" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto1/image30.JPG">
     <img src="images/tuto1/image30.JPG" height="200">
     </a>
     </div>
     
     </div>
     </div>
     
     <div class="zdg-content">
    <h2>
    Une fois les fichiers installée.
     </h2>
     <hr/>
     <p>
     Redémarrer votre téléphone afin de profiter de votre nouvelle rom.
     </p>
     
     <div class="boximageszdg">
    
    <div class="image">
     <a href="images/tuto1/image31.JPG">
     <img src="images/tuto1/image31.JPG" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto1/image32.JPG">
     <img src="images/tuto1/image32.JPG" height="200">
     </a>
     </div>
     
     </div>
     
     <p>
     Attention : Le premier
     démarrage peut durée du temps. Pas de panique cela peu être tout
     a fait normale. Si le redémarrage persiste assurez-vous d’avoir
     pris le recovery adapté au téléphone avec la version customiser
     d’Android bien adapté au téléphone.
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
