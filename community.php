<?php

    include 'php/language.php';
    include 'php/webtxt.php';

    echo "<html>
    <head>
    <meta charset='utf-8'/>
    <link rel='icon' type='image/png' href='img/icones/zimhostingicone.png'>
    <link rel='stylesheet' href='style.css'/>
    <title>".$titre_header_zimhosting_community."</title>
    </head>";

    echo "<body id=accueil>";
    
    echo "<div id='header'>
    <h1>
    <center>
    ".$titre_header_zimhosting_community."
    <center>
    </h1>
    </div>";

    include 'nav.php';

    if((isset($set_language)) && ($set_language == "en")){

    ?>
    
     <div class="contenue-large">
     <h2>
     What is Zimhosting ?
     </h2>
     <hr/>
     <p>
     It is simply a computer community centered around a web site hosted independently
     </p>
     <p>
     The main goal of this community is to implement various web services to make it a geek platform
     It is simply a computer community centered around a web site hosted independently
     </p>
     <p>
     It also aims to develop various software solutions totally open-source to facilitate the world of geek
     </p>
     
     </div>
     
     <div class="contenue-large">
     <h2>
     ZimHosting, the origins of the name
     </h2>
     <hr/>
     <p>
     The name zimhosting is the abbreviation of the name of the creator with hosting referring to internet hosting. It mainly highlights how the community and the site was created.
     </p>
     
     </div>

     <div class="contenue-large">
     
     <h2>
     Projects carried out by the community
     </h2>
     <hr/>
     <p>
     The page of the different projects realized by the community is still being deployed. It will be available very soon...
     </p>
          
     </div>

     <div class="contenue-large">
     <h2>
     The server where ZimHosting is hosted
     </h2>
     <hr/>
     <p>
     It is simply a simple computer based on Ubuntu server operating 24/24. Equipped with an Intel core i5 processor with 8GB of RAM, 3TB of storage and a fiber internet connection. This is perfectly reliable to guarantee a good web service
     </p>
     <p>
     <a href=img/serveur.JPG>
     The photo
     </a>
     </p>
          
     </div>

    <?php

    }elseif((isset($set_language)) && ($set_language == "es")){

    ?>

    <div class="contenue-large">
     <h2>
     ¿Qué es Zimhosting?
     </h2>
     <hr/>
     <p>
     Es simplemente una comunidad informática centrada en un sitio web alojado de forma independiente
     </p>
     <p>
     El objetivo principal de esta comunidad es implementar varios servicios web para convertirla en una plataforma geek
     </p>
     <p>
     También pretende desarrollar diversas soluciones de software totalmente de código abierto para facilitar el mundo de los frikis
     </p>
     
     </div>
     
     <div class="contenue-large">
     <h2>
     ZimHosting, el origen del nombre
     </h2>
     <hr/>
     <p>
     El nombre de zimhosting es una abreviatura del nombre del creador y hosting se refiere al alojamiento en Internet. Destaca principalmente cómo se creó la comunidad y el sitio.
     </p>
     
     </div>

     <div class="contenue-large">
     
     <h2>
     Proyectos realizados por la comunidad
     </h2>
     <hr/>
     <p>
     La página de los diferentes proyectos realizados por la comunidad sigue desplegándose. Estará disponible muy pronto...
     </p>
          
     </div>

     <div class="contenue-large">
     <h2>
     El servidor donde está alojado ZimHosting
     </h2>
     <hr/>
     <p>
     Es simplemente un simple ordenador basado en el servidor Ubuntu que funciona 24/24. Equipado con un procesador Intel core i5 con 8 GB de RAM, 3 TB de almacenamiento y una conexión a Internet de fibra. Esto es perfectamente fiable para garantizar un buen servicio web
     </p>
     <p>
     <a href=img/serveur.JPG>
     La foto
     </a>
     </p>
          
     </div>

    <?php

    }elseif((isset($set_language)) && ($set_language == "de")){

    ?>

<div class="contenue-large">
     <h2>
     Was ist Zimhosting ?
     </h2>
     <hr/>
     <p>
     Es ist einfach eine Computergemeinschaft, die sich um eine unabhängig gehostete Website dreht
     </p>
     <p>
     Das Hauptziel dieser Community ist es, verschiedene Webdienste zu implementieren, um sie zu einer Geek-Plattform zu machen
     </p>
     <p>
     Es zielt auch darauf ab, verschiedene Software-Lösungen völlig Open-Source zu entwickeln, um die Welt der Geek zu erleichtern
     </p>
     
     </div>
     
     <div class="contenue-large">
     <h2>
     ZimHosting, die Ursprünge des Namens
     </h2>
     <hr/>
     <p>
     Der Name zimhosting ist eine Abkürzung des Namens des Erfinders, wobei hosting sich auf Internet-Hosting bezieht. Es wird vor allem hervorgehoben, wie die Community und der Standort entstanden sind.
     </p>
     
     </div>

     <div class="contenue-large">
     
     <h2>
     Von der Gemeinde durchgeführte Projekte
     </h2>
     <hr/>
     <p>
     Die Seite der verschiedenen Projekte, die von der Community realisiert wurden, befindet sich noch im Aufbau. Es wird sehr bald verfügbar sein...
     </p>
          
     </div>

     <div class="contenue-large">
     <h2>
     Der Server, auf dem ZimHosting gehostet wird
     </h2>
     <hr/>
     <p>
     Es ist einfach ein einfacher Computer auf Basis von Ubuntu Server mit 24/24-Betrieb. Ausgestattet mit einem Intel Core i5-Prozessor mit 8 GB RAM, 3 TB Speicherplatz und einer Glasfaser-Internetverbindung. Dies ist absolut zuverlässig, um einen guten Webservice zu gewährleisten
     </p>
     <p>
     <a href=img/serveur.JPG>
     Das Foto
     </a>
     </p>
          
     </div>

    <?php

    }else{

    ?>

<div class="contenue-large">
     <h2>
     Zimhosting c'est quoi ?
     </h2>
     <hr/>
     <p>
     Il s'agit tout simplement d'une communauté informatique centré autour d'un site web héberger de façon indépendant
     </p>
     <p>
     Cette communauté à pour principal but de mettre en oeuvre divers service web et varié afin d'en faire une plateforme geeks
     </p>
     <p>
     Elle à aussi pour but de développement divers solution logiciel informatique totalement open-source afin de faciliter le monde du geek
     </p>
     
     </div>
     
     <div class="contenue-large">
     <h2>
     ZimHosting, les origines du nom
     </h2>
     <hr/>
     <p>
     Le nom zimhosting est l'abréviation du nom du créateur avec hosting faisant référence à l'hébergement internet. Il mets principalement en valeur la façon dont la communauté et le site à été créer.
     </p>
     
     </div>

     <div class="contenue-large">
     
     <h2>
     Les projets réalisé par la communauté
     </h2>
     <hr/>
     <p>
     La page des differents projets réaliser par la communauté est encore en cours de déploiement. Elle seras disponible très prochainement...
     </p>
          
     </div>

     <div class="contenue-large">
     <h2>
     Le serveur sur lesquel ZimHosting est héberger
     </h2>
     <hr/>
     <p>
     Il s'agit tout simplement d'un simple ordinateur basés sur Ubuntu server fonctionnement 24h/24. Doté d'un processeur Intel core i5 avec 8go de RAM, 3To de stockage et d'une connections internet fibré. Cela est parfaitement fiable pour garantir un bon service web
     </p>
     <p>
     <a href=img/serveur.JPG>
     La photo
     </a>
     </p>
          
     </div>

    <?php

    }

    include 'footer.php';
     
    echo "<body>
    </html>";

?>
