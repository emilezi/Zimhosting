<?php 
    session_start();
	include '../php/database.php'; 
	include '../php/language.php';
	include '../php/webtxt.php';
    global $db;

	echo "<html>";

    if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom']))){

    if(isset($_GET['id_profil'])){

    $q = $db->prepare("SELECT * FROM users WHERE pseudo=:pseudo AND actif=:actif");
    $q->execute([
    'pseudo' => $_GET['id_profil'],
    'actif' => "yes"
    ]);
    $p_result=$q->fetch();
    if($p_result == true){

    echo "<head>
    <meta charset='utf-8' />
    <link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
    <link rel='stylesheet' href='../style.css' />
    <title>".$titre_header_social_message."</title>
    </head>";
    
    echo "<body id=social>";
        
    echo "<div id='header'>
    <h1>
    <center>
    ".$_GET['id_profil']."
    <center>
    </h1>
    </div>";
        
    include 'nav.php';
    
    echo "<div id='social-content-message'>";

    $x = $db->prepare("SELECT * FROM sociale_discussions WHERE emetteur=:name_compte AND destinataire=:with_compte AND actif=:actif UNION SELECT * FROM sociale_discussions WHERE emetteur=:with_compte AND destinataire=:name_compte AND actif=:actif ORDER BY date_message ASC");
	$x->execute([
    'name_compte' => $_SESSION['pseudo'],
    'with_compte' => $_GET['id_profil'],
    'actif' => 'yes'
	]);
	$nb_message = $x->rowCount();

	if ($nb_message == 0) {
    echo "<div class='social-message-emetteur'>";
    echo "<p>".$message_social_compte_message_undefined.$_GET['id_profil']."</p>";
    echo "</div>";

    echo "<div class='social-content-post-message'>";

    include 'post_message.php';

    echo "</div>";

	}else{
    
    while($result = $x->fetch(PDO::FETCH_ASSOC)){

        if($result['emetteur'] == $_SESSION['pseudo']){

        echo "<div class='social-message-emetteur'>";
        
        echo "<p style='text-align: left;'>" . $result['message'] . "</p>";

	    echo "</div>";

        echo "<br/><br/><br/><br/><br/>";

        }else{

        echo "<div class='social-message-destinataire'>";
        
        echo "<p style='text-align: left;'>" . $result['message'] . "</p>";

	    echo "</div>";

        echo "<br/><br/><br/><br/><br/>";

        }
    
        }

        echo "<div class='social-content-post-message'>";

        include 'post_message.php';

        echo "</div>";
    
        }

        }else{
        echo "<head>
        <meta charset='utf-8' />
        <link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
        <link rel='stylesheet' href='../style.css' />
        <title>".$titre_header_social_message."</title>
        </head>";
        
        echo "<body id=social>";
            
        echo "<div id='header'>
        <h1>
        <center>
        ".$titre_header_social_message."
        <center>
        </h1>
        </div>";
            
        include 'nav.php';
        
            echo "<div id='social-content-message'>";
        echo "<div class='social-message-emetteur'>";
        echo "<p>" . $message_social_profil_undefined . "</p>";
        echo "</div>";
    	  }

    	  }else{
        echo "<head>
        <meta charset='utf-8' />
        <link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
        <link rel='stylesheet' href='../style.css' />
        <title>".$titre_header_social_message."</title>
        </head>";

        echo "<body id=social>";
    
        echo "<div id='header'>
        <h1>
        <center>
        ".$titre_header_social_message."
        <center>
        </h1>
        </div>";
    
        include 'nav.php';

        echo "<div id='social-content-message'>";

        echo "<div class='social-message-emetteur'>";
        echo "<p>" . $message_social_profil_undefined . "</p>";
        echo "</div>";

        echo "</div>";
        }
        }else{
        echo "<head>
        <meta charset='utf-8' />
        <link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
        <link rel='stylesheet' href='../style.css' />
        <title>".$titre_header_social_message."</title>
        </head>";

        echo "<body id=social>";
    
        echo "<div id='header'>
        <h1>
        <center>
        ".$titre_header_social_message."
        <center>
        </h1>
        </div>";
    
        include 'nav.php';

        echo "<div id='social-content-message'>";

        echo "<div class='social-message-emetteur'>";
        echo "<p>" . $message_compte_undefined . "</p>";
        echo "</div>";

        echo "</div>";
    }
	 
    echo "</body>
    </html>";
?>