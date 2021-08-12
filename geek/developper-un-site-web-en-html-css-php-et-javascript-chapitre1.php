<?php
session_start();
include '../php/language.php';
include '../php/webtxt.php';
$name_page = 'Developper un site web en html, css, php et JS, Chapitre 1';
$id_page = 'zdgtuto2-1';
?>

<html>
    <head>
    <meta name="google-site-verification" content="l9Ej9sm0nEmflUOzZPmM-c31fKoqkZ4Js4HeVvsrgzU" />
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="../img/icones/zdgicone.png">
    <link rel="stylesheet" href="../style.css" />
    <title>Developper un site web en html,css,php et javascript, Chapitre 1</title>
    </head>
    <body id=zdg>
    
    <div id="header">
    <h1>
    <center>
    Developper un site web en html, css, php et JS, Chapitre 1
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
    <a href="developper-un-site-web-en-html-css-php-et-javascript-chapitre1.php">
    tutoriel : Developper un site web en html,css,php et javascript, Chapitre 1
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
    Hey les internautes, comment allez-vous aujourd’hui. Bon je pense que
    si vous avez découvert mon site internet et bien vous
    avez été curieux de découvrir ce qu’il y avait dessus. Mais
    vous vous êtes déjà demandé comment il était programmé. Et
    bien c'est ce que nous allons voir dans ce tutoriel.
    </p>
    <p>
    Je pense que vous êtes pressée de savoir quels sont les différents
    éléments que nous allons avoir besoin afin de réaliser un site
    et bien préparez vous. Oui car c'est ce que nous allons voir dans le tutoriel
    d’aujourd’hui.
    </p>
    <p>
    Commencent par parler des principaux langages composent la base d'un site.
    Parmi ces différents langages nous allons retrouver le
    HTML, le CSS, le PHP et puis le JavaScript. Sachant que le HTML
    reste le langage le plus fondamental concernent la réalisation d'une
    pages web et bien pour commencer ce cours et nous
    allons principalement nous concentrer sur ce langage. Mais après
    nous verront aussi le CSS, PHP et le JavaScript. Parce que oui vous
    verrez que chacun de ces langages à un rôle particulier dans un
    site web.
    </p>
    </div>
     
    <div class="zdg-content">
     <h2>
     Le HTML qu’est-ce que c’est ?
     </h2>
     <hr/>
     <p>
     Comme son nom l'indique, le HTML sont les initiales de &quot;Hypertext
     Markup Language&quot;. Il a été créer en 1992 par &quot;World
     Wide Web Consortium&quot; et a pour principal intérêt de réaliser
     des pages Web. C'est lui que nous retrouvons au cœur d’un site
     web. C’est le langage de base qu’un navigateur va interpréter
     pour organiser notre fameuse pages web.
     </p>
     </div>
     
     <div class="zdg-content">
     <h2>
     Mais comment code-t-on du HTML.
     </h2>
     <hr/>
     <p>
     Et bien pour vous expliquer tout ça, le HTML est un langage faisant
     partie de la classe des langages de balisages. En effet il est
     principalement composé de balise permettant de définir du texte,
     des images, des liens et de faire plein d’autres chose avec.
     </p>
     <p>
     Par exemple :
     </p>
     <p>&#139;p&#155;Exemple de texte&#139;/p&#155; : pour afficher du texte</p>
     <p>&#139;img src="Lien vers une image"&#155; : pour afficher une images</p>
     <p>&#139;a href="Lien de la cible"&#155; &#139;type de balise&#155;Éléments que vous souhaitait convertir en lien
     ça peut être soit du texte ou de l'image</type de balise> &#139;/a&#155; : pour transformer un éléments
     en lien</p>
     <p>&#139;center&#155;&#139;type de balise&#155;Éléments que vous souhaitait centré au milieu de la page&#139;/type de
     balise&#155;&#139;/center&#155; : pour centrer un éléments au centre de la page
     </p>
     <p>
     Excepté ras
     </p>
     <p>
     Et ce sont c’est balise qui définissent le début et la fin de
     l'élément que vous souhaitait mettre. Lorsque nous allons coder
     notre site, nous allons définir chaque élément sur chaque ligne
     afin de nous simplifier la tâche mais si vous définissait tous
     les éléments de votre site sur une seule ligne comme le montre la
     photo si dessous. Le résultat sera le même.
     </p>
     <div class="boximageszdg">
    <div class="image">
     <a href="images/tuto2/image1.png">
     <img src="images/tuto2/image1.png" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto2/image2.png">
     <img src="images/tuto2/image2.png" height="200">
     </a>
     </div>
     </div>
     </div>
     
     <div class="zdg-content">
     <h2>
     Commencent à codé
     </h2>
     <hr/>
     <p>
     Munissez-vous d’un fichier texte sur votre PC ou vous lui définirait
     l'extension .html. Ouvrez-le ensuite avec un éditeur de texte. Et
     puis commencez à coder.
     </p>
     
     <div class="boximageszdg">
    
    <div class="image">
     <a href="images/tuto2/image3.png">
     <img src="images/tuto2/image3.png" height="200">
     </a>
     </div>
     
     </div>
     
     </div>
     <div class="zdg-content">
     
     <h2>
     Les éditeurs de textes.
     </h2>
     <hr/>
     <p>
     Concernant les éditeurs ils en existent plein. Il est même tout à fait
     possible de le faire depuis le bloc-note de Windows mais après je
     recommande d’utiliser certains éditeurs comme VS code car sinon
     cela risquera de vite devenir compliqué.
     </p>
     <a href="https://code.visualstudio.com/">
     <p>
     Site officiel de VS code
     </p>
     </a>
     </div>
     
     <div class="zdg-content">
     <h2>Commencent à réalisé notre première page Web</h2>
     <hr/>
     <p>
     Inscrivez dans votre page Web les balises &#139;html&#155;&#139;body&#155;&#139;/html&#155;&#139;/body&#155; comme le montre
     l'image ci dessous
     </p>
     
     <div class="boximageszdg">
    
    <div class="image">
     <a href="images/tuto2/image4.png">
     <img src="images/tuto2/image4.png" height="200">
     </a>
     </div>
     
     </div>
     
     <p>
     Mettez ensuite les éléments que vous souhaitait inscrire.
     </p>
     
     </div>
     
     <div class="zdg-content">
     <h2>
     Commencent à réaliser différents titres
     </h2>
     <hr/>
     <p>
     Tout à l'heure, je vous avait parlée des balises &#139;p&#155;&#139;/p&#155; qui permettait de définir du texte.
     Mais vous verrez par la suite de ce cours qu'il en existe plein d'autres déjà prédéfini
     permettant de réalisée des titres comme les balise : &#139;h1&#155;&#139;/h1&#155;, &#139;h2&#155;&#139;/h2&#155;,&#139;h3&#155;&#139;/h3&#155; et etc…
     </p>
     <p>
     Ils ont exactement le même principe que les balises &#139;p&#155;&#139;/p&#155; mais ils ont une petite particularité.
     C'est qu'ils peuvent mettre en valeur certains élements comme la taille du texte
     </p>
     <p>
     Exemple :
     </p>
     <div class="boximageszdg">
    
    <div class="image">
     <a href="images/tuto2/image5.png">
     <img src="images/tuto2/image5.png" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto2/image6.png">
     <img src="images/tuto2/image6.png" height="200">
     </a>
     </div>
     </div>
     
     <p>
     Je pense que vous m’avez compris, pour commencer à réaliser des
     titres, nous allons tout simplement nous servir de ces balises.
     </p>
     
     </div>
     <div class="zdg-content">
     <h2>
     Titre principale
     </h2>
     <hr/>
     <p>
     Mettez tout d’abord un titre principal, par exemple pour notre page,
     dans notre exemple, nous allons le nommé, &quot;le site du Geek&quot;.
     </p>
     
     <div class="boximageszdg">
     
     <div class="image">
     <a href="images/tuto2/image7.png">
     <img src="images/tuto2/image7.png" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto2/image8.png">
     <img src="images/tuto2/image8.png" height="200">
     </a>
     </div>
     </div>
     
     </div>
     <div class="zdg-content">
     <h2>
     Sous titre
     </h2>
     <hr/>
     <p>
     Réalisés ensuite différents sous titre
     </p>
     
     <div class="boximageszdg">
     
     <div class="image">
     <a href="images/tuto2/image9.png">
     <img src="images/tuto2/image9.png" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto2/image10.png">
     <img src="images/tuto2/image10.png" height="200">
     </a>
     </div>
     </div>
     
     </div>
     <div class="zdg-content">
     <h2>
     Les différents éléments
     </h2>
     <hr/>
     <p>
     Et pour finir mettez différents éléments comme du texte, des
     images, des liens et etc…
     </p>
     
     <div class="boximageszdg">
     
     <div class="image">
     <a href="images/tuto2/image11.png">
     <img src="images/tuto2/image11.png" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto2/image12.png">
     <img src="images/tuto2/image12.png" height="200">
     </a>
     </div>
     </div>
     
     <p>
     Et puis voilà notre résultat de notre petite page
     </p>
     
     </div>
     
     <div class="zdg-content">
     <p>
     Bon Jusqu’à la, nous avons réussi à faire une page web avec un
     titre, des sous-titres, des éléments et tout, mais sauf qu’il
     va falloir pofiner le tout afin que ce soit plus présentable et
     pour cela nous allons tout simplement nous servir d’autres
     balise.
     </p>
     <p>
     Dans la dernière partie nous avons vue des balises permettent de
     définir des titres, mais il en existe aussi pour modifier la forme
     du texte et la mise en page du site. C’est ce que nous allons
     voir dans cette partie avec la fameuse liste de balise si dessous
     comme
     </p>
     <p>
     Exemple :
     </p>
     <p>&#139;b&#155;Exemple de texte&#139;/b&#155; : pour mettre en gras</p>
     <p>&#139;i&#155;Exemple de texte&#139;/i&#155; : pour mettre en italic</p>
     <p>&#139;u&#155;Exemple de texte&#139;/u&#155; : pour souligner</p>
     <p>
     Et exceptera
     </p>
     </div>
     
     <div class="zdg-content">
     <p>
     Pour notre site, utilisons certains de ces balise de la liste comme &#139;b&#155;&#139;/b&#155;, &#139;center&#155;&#139;/center&#155;.
     Mettons ces différents balise afin de mettre en gras et centré les titre, les sous titre avec les images
     qui vont avec
     </p>
     
     <div class="boximageszdg">
     
     <div class="image">
     <a href="images/tuto2/image13.png">
     <img src="images/tuto2/image13.png" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto2/image14.png">
     <img src="images/tuto2/image14.png" height="200">
     </a>
     </div>
     </div>
     
     <p>
     Et puis voilà le résultat
     </p>
     
     </div>
     
     <div class="zdg-content">
     <h2>
     La partie &#139;head&#155;
     </h2>
     <hr/>
     <p>
     Bon, nous avons fini de réaliser la petite page avec nos différents
     éléments mais avant de finir ce chapitre il nous manque quelques
     éléments.
     </p>
     <p>
     C'est cette fameuse partie composé de balise &#139;head&#155;&#139;/head&#155;. 
     </p>
     <p>
     Hum, à quoi sert cette partie ?
     </p>
     <p>
     Head,
     en anglais voulant dire corps. C’est tout simplement une partie
     qui va stocker certaines informations concernant la page Web. Il
     s’agit principalement de certains paramètres comme le titre, ou
     encore l'icône de notre page.
     </p>
     <div class="boximageszdg">
     
     <div class="image">
     <a href="images/tuto2/image15.png">
     <img src="images/tuto2/image15.png" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto2/image16.png">
     <img src="images/tuto2/image16.png" height="200">
     </a>
     </div>
     
     </div>
     <p>
     Nous pouvont les modifié c'est paramètre dedans grâce à certains éléments comme &#139;title&#155;Titre principale de la page&#139;/title&#155; comme le montre les images si dessous
     </p>
     <p>
     Mais
     ils peuvent aussi servir à référencer notre site dans les
     moteurs de recherche ou accepter certain caractère.
     </p>
     <p>
     Parce que oui dans le HTML il y a certains détails qu’il ne faut pas
     oublier comme les caractères spécieux.
     </p>
     </div>
     
     
     <div class="zdg-content">
     <h2>
     Les caractères spécieux
     </h2>
     <hr/>
     <p>
     L’HTML que nous connaissons de base, utilise principalement l'ASCII pour
     traité les différentes lettres afin d’ensuite les afficher sur
     notre page Web. Sauf que l’ASCII est capable d’encoder
     seulement sur 7 bits ce qui équivaut à 128 caractères. 128
     caractères permet de prendre en compte toutes les lettres
     minuscules et majuscule de l’alphabet, les chiffres de 0 à 9
     avec certains éléments de ponctuation mais ne suffisent pas pour
     prendre en compte toutes les caractères spécieux comme les &quot;éäæ&quot;
     et etc… 
     </p>
     <p>
     Il va donc falloir se servir de certain code afin de mettre ces
     différents caractères.
     </p>
     <p>
     Et concernant ce code voici certains code de certain caractères les
     plus répandus.
     </p>
     <p>
     	&#38;&#35;232; : è 
     	</p>
     	<p>
     	&#38;&#35;233; : é
     	</p>
     	<p>
     	&#38;&#35;171; : «
     	</p>
     	<p>
     	&#38;&#35;183; : ·
     	</p>
     	<p>
     	&#38;&#35;184; : ¸
     </p>
     <p>
     Pour placer des caractères
     spéciaux dans du texte sur notre pages web il suffira tout
     simplement de placer les bonnes lignes de code au bon endroit.
     </p>
     <div class="boximageszdg">
     
     <div class="image">
     <a href="images/tuto2/image17.png">
     <img src="images/tuto2/image17.png" height="200">
     </a>
     </div>
     <div class="image">
     <a href="images/tuto2/image18.png">
     <img src="images/tuto2/image18.png" height="200">
     </a>
     </div>
     
     </div>
     
     <p>
     Mais...
     </p>
     <p>
     Sur le HTML moderne, il est possible de changer la façon dont est
     traité les différents informations en remplacent la méthode
     ASCII par d'autre méthode beaucoup plus performant.
     </p>
     <p>
     Pour cela il suffit juste de rajouter dans &#139;meta charset="nom du traitement"/&#155; dans la balise head avec le type de traitement que nous souhaitions affectés. 
     </p>
     <p>
     Dans notre cas à nous, nous allons voir d'autres exemple comme l'ISO 8859-15 ou utf-8 qui est sont codé sur beaucoup plus de bits
     et qui ont donc la possibilité d'en traité beaucoup plus soit 256
     </p>
     <p>
     Utilisez &#139;meta charset="utf-8"/&#155;.
     </p>
     
     <div class="boximageszdg">
     
     <div class="image">
     <a href="images/tuto2/image19.png">
     <img src="images/tuto2/image19.png" height="200">
     </a>
     </div>
     </div>
     
     <p>
     Et puis voilà le résultat
     </p>
     
     <a href="etc/tuto2/www.zip">
     <p>
     Code téléchargeable
     </p>
     </a>
     
     </div>
     
     <div class="zdg-content">
     
     <p>Bon jusqu’à là on à une page entièrement opérationnelle mais
     après vous allez me dire, comment la décorée. Comment mettre un
     font avec une image ou encore comment appliquer des marges.
     </p>
     
     <p>
     Et bien pour cela il va falloir se servir d’un autre langage qui est
     le CSS et c’est ce que nous verront dans un autre chapitre.
     </p>
     </div>
     <div class="zdg-content">
     <h2>
     Chapitre 2, le CSS
     </h2>
     <hr/>
     <p>
     Le prochaine chapitre est en cours de création...
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
