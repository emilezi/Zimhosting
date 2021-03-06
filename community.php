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
     ??Qu?? es Zimhosting?
     </h2>
     <hr/>
     <p>
     Es simplemente una comunidad inform??tica centrada en un sitio web alojado de forma independiente
     </p>
     <p>
     El objetivo principal de esta comunidad es implementar varios servicios web para convertirla en una plataforma geek
     </p>
     <p>
     Tambi??n pretende desarrollar diversas soluciones de software totalmente de c??digo abierto para facilitar el mundo de los frikis
     </p>
     
     </div>
     
     <div class="contenue-large">
     <h2>
     ZimHosting, el origen del nombre
     </h2>
     <hr/>
     <p>
     El nombre de zimhosting es una abreviatura del nombre del creador y hosting se refiere al alojamiento en Internet. Destaca principalmente c??mo se cre?? la comunidad y el sitio.
     </p>
     
     </div>

     <div class="contenue-large">
     
     <h2>
     Proyectos realizados por la comunidad
     </h2>
     <hr/>
     <p>
     La p??gina de los diferentes proyectos realizados por la comunidad sigue despleg??ndose. Estar?? disponible muy pronto...
     </p>
          
     </div>

     <div class="contenue-large">
     <h2>
     El servidor donde est?? alojado ZimHosting
     </h2>
     <hr/>
     <p>
     Es simplemente un simple ordenador basado en el servidor Ubuntu que funciona 24/24. Equipado con un procesador Intel core i5 con 8 GB de RAM, 3 TB de almacenamiento y una conexi??n a Internet de fibra. Esto es perfectamente fiable para garantizar un buen servicio web
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
     Es ist einfach eine Computergemeinschaft, die sich um eine unabh??ngig gehostete Website dreht
     </p>
     <p>
     Das Hauptziel dieser Community ist es, verschiedene Webdienste zu implementieren, um sie zu einer Geek-Plattform zu machen
     </p>
     <p>
     Es zielt auch darauf ab, verschiedene Software-L??sungen v??llig Open-Source zu entwickeln, um die Welt der Geek zu erleichtern
     </p>
     
     </div>
     
     <div class="contenue-large">
     <h2>
     ZimHosting, die Urspr??nge des Namens
     </h2>
     <hr/>
     <p>
     Der Name zimhosting ist eine Abk??rzung des Namens des Erfinders, wobei hosting sich auf Internet-Hosting bezieht. Es wird vor allem hervorgehoben, wie die Community und der Standort entstanden sind.
     </p>
     
     </div>

     <div class="contenue-large">
     
     <h2>
     Von der Gemeinde durchgef??hrte Projekte
     </h2>
     <hr/>
     <p>
     Die Seite der verschiedenen Projekte, die von der Community realisiert wurden, befindet sich noch im Aufbau. Es wird sehr bald verf??gbar sein...
     </p>
          
     </div>

     <div class="contenue-large">
     <h2>
     Der Server, auf dem ZimHosting gehostet wird
     </h2>
     <hr/>
     <p>
     Es ist einfach ein einfacher Computer auf Basis von Ubuntu Server mit 24/24-Betrieb. Ausgestattet mit einem Intel Core i5-Prozessor mit 8 GB RAM, 3 TB Speicherplatz und einer Glasfaser-Internetverbindung. Dies ist absolut zuverl??ssig, um einen guten Webservice zu gew??hrleisten
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
     Il s'agit tout simplement d'une communaut?? informatique centr?? autour d'un site web h??berger de fa??on ind??pendant
     </p>
     <p>
     Cette communaut?? ?? pour principal but de mettre en oeuvre divers service web et vari?? afin d'en faire une plateforme geeks
     </p>
     <p>
     Elle ?? aussi pour but de d??veloppement divers solution logiciel informatique totalement open-source afin de faciliter le monde du geek
     </p>
     
     </div>
     
     <div class="contenue-large">
     <h2>
     ZimHosting, les origines du nom
     </h2>
     <hr/>
     <p>
     Le nom zimhosting est l'abr??viation du nom du cr??ateur avec hosting faisant r??f??rence ?? l'h??bergement internet. Il mets principalement en valeur la fa??on dont la communaut?? et le site ?? ??t?? cr??er.
     </p>
     
     </div>

     <div class="contenue-large">
     
     <h2>
     Les projets r??alis?? par la communaut??
     </h2>
     <hr/>
     <p>
     La page des differents projets r??aliser par la communaut?? est encore en cours de d??ploiement. Elle seras disponible tr??s prochainement...
     </p>
          
     </div>

     <div class="contenue-large">
     <h2>
     Le serveur sur lesquel ZimHosting est h??berger
     </h2>
     <hr/>
     <p>
     Il s'agit tout simplement d'un simple ordinateur bas??s sur Ubuntu server fonctionnement 24h/24. Dot?? d'un processeur Intel core i5 avec 8go de RAM, 3To de stockage et d'une connections internet fibr??. Cela est parfaitement fiable pour garantir un bon service web
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
