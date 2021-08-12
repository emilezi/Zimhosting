<?php 
    session_start();
	include '../php/database.php'; 
	include '../php/language.php';
	include '../php/webtxt.php';
    global $db;

	echo "<html>";
    ?>

    <head>
    <meta charset="utf-8" />
    <link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
    <link rel="stylesheet" href="../style.css" />
    <title><?=$titre_header_social_profil?></title>
    </head>

    <?php

    echo "<body id=social>";
    
    echo "<div id='header'>
    <h1>
    <center>
    ".$titre_header_social_profil."
    <center>
    </h1>
    </div>";
    
    include 'nav.php';

    include 'aside.php';

    echo "<div id='social-element'>";

    if(isset($_GET['id_profil'])){

    if($_GET['id_profil'] == $_SESSION['pseudo']){
    	
    	$q = $db->prepare("SELECT * FROM users WHERE pseudo=:pseudo AND actif=:actif");
    $q->execute([
    'pseudo' => $_GET['id_profil'],
	'actif' => "yes"
    ]);
    $p_result=$q->fetch();
    if(($p_result == true) && ($p_result['actif'] == "yes")){

    echo "<div class='social-content'>";
    
    echo "<div class='boxsocialprofil'>";

    echo "<div class='boxsocialelements'>";

    echo $p_result['profil_picture'];

    echo "</div>";
    echo "<div class='boxsocialelements'>";

    echo "<h2>" . $p_result['prenom'] . " - " . $p_result['nom'] . "</h2>";

    echo "</div>";

    echo "</div>";

    echo "</div>";

    $n = $db->prepare("SELECT * FROM sociale_compte_statue WHERE name_compte=:name_compte AND with_compte=:with_compte AND actif=:actif");
	$n->execute([
    'name_compte' => $_GET['id_profil'],
    'with_compte' => $_SESSION['pseudo'],
    'actif' => "yes"
    ]);
    $x_result = $n->fetch();

    if($x_result['statue_friends'] == "friends"){

    $q = $db->prepare("SELECT * FROM sociale_poste WHERE auteur=:auteur AND actif=:actif");
	$q->execute([
    'auteur' => $_GET['id_profil'],
    'actif' => "yes"
	]);
	$nb_postes = $q->rowCount();

	if ($nb_postes == 0) {
    echo "<div class='social-content'>";
    echo '<p>'.$message_social_undefined.'</p>';
    echo "</div>";
	}else{
    
    while($result = $q->fetch(PDO::FETCH_ASSOC)){
	
        sscanf($result['date_poste'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde); 
        
        echo "<div class='social-content'>";
        
        echo "<p>" . $result['poste'] . "</p>";

        echo "<br/";

        echo "<p>" . $message_social_poste_date . $annee . " - " . $mois . " - " . $jour . "</p>";
        
        echo "</div>";
    
        }
    
    }

    }else{

    $q = $db->prepare("SELECT * FROM sociale_poste WHERE auteur=:auteur AND confidentiality=:confidentiality AND actif=:actif");
	$q->execute([
    'auteur' => $_GET['id_profil'],
    'confidentiality' => "public",
    'actif' => "yes"
	]);
	$nb_postes = $q->rowCount();

	if ($nb_postes == 0) {
    echo "<div class='social-content'>";
    echo '<p>'.$message_social_undefined.'</p>';
    echo "</div>";
	}else{
    
    while($result = $q->fetch(PDO::FETCH_ASSOC)){
	
        sscanf($result['date_poste'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde); 
        
        echo "<div class='social-content'>";
        
        echo "<p>" . $result['poste'] . "</p>";

        echo "<br/";

        echo "<p>" . $message_social_poste_date . $annee . " - " . $mois . " - " . $jour . "</p>";
        
        echo "</div>";
    
        }
    
    }

    }

    }else{

        echo "<div class='social-content'>";

        echo "<p>".$message_social_profil_undefined."</p>";

        echo "</div>";

    }

    }else{

    $q = $db->prepare("SELECT * FROM users WHERE pseudo=:pseudo AND actif=:actif");
    $q->execute([
    'pseudo' => $_GET['id_profil'],
	'actif' => "yes"
    ]);
    $p_result=$q->fetch();
    if($p_result == true){

    echo "<div class='social-content'>";
    
    echo "<div class='boxsocialprofil'>";

    echo "<div class='boxsocialelements'>";

    echo $p_result['profil_picture'];

    echo "</div>";
    echo "<div class='boxsocialelements'>";

    echo "<h2>" . $p_result['prenom'] . " - " . $p_result['nom'] . "</h2>";

    echo "</div>";

    echo "</div>";

    echo "<br/><br/>";

    if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom']))){

    echo "<div class='btn-content-profil'>";

    $date = date('Y-m-d h:i:s');

    $g = $db->prepare("SELECT * FROM sociale_compte_statue WHERE name_compte=:name_compte AND with_compte=:with_compte AND actif=:actif");
	$g->execute([
        'name_compte' => $_SESSION['pseudo'],
        'with_compte' => $p_result['pseudo'],
        'actif' => "yes"
    ]);
    $compte_friends_statue = $g->fetch();

    if($compte_friends_statue == true){

    if($compte_friends_statue['statue_friends'] == 'invitation'){

    echo "<form method='post'>
    <input type='submit' name='addfriend1' value='".$text_button_invitation_submit."'>
    </form>";

    if(isset ($_POST['addfriend1'])) {
        
        $q = $db->prepare("UPDATE sociale_compte_statue SET statue_friends=:statue_friends WHERE name_compte=:name_compte AND with_compte=:with_compte");
	    $q->execute([
            'name_compte' => $_SESSION['pseudo'],
            'with_compte' => $p_result['pseudo'],
            'statue_friends' => 'none'
        ]);

        header("Location: social_profil.php?id_profil=".$_GET['id_profil']);
        
        }

    }elseif($compte_friends_statue['statue_friends'] == 'friends'){

    echo "<form action='compte_statue_edit.php?id_compte=".$_GET['id_profil']."&statue_edit=delfriends' method='post'>
    <input type='submit' name='addfriend1' value='".$text_button_friends."'>
    </form>";

    }else{

    echo "<form method='post'>
    <input type='submit' name='addfriend1' value='".$text_button_addfriends."'>
    </form>";

    if(isset ($_POST['addfriend1'])) {
        
        $q = $db->prepare("UPDATE sociale_compte_statue SET statue_friends=:statue_friends WHERE name_compte=:name_compte AND with_compte=:with_compte");
	    $q->execute([
            'name_compte' => $_SESSION['pseudo'],
            'with_compte' => $p_result['pseudo'],
            'statue_friends' => 'invitation'
        ]);

        header("Location: social_profil.php?id_profil=".$_GET['id_profil']);
        
        }

    }

    if($compte_friends_statue['statue_follow'] == 'follow'){

    echo "<form method='post'>
    <input type='submit' name='follow1' value='".$text_button_follow."'>
    </form>";

    if(isset ($_POST['follow1'])) {

        $q = $db->prepare("UPDATE sociale_compte_statue SET statue_follow=:statue_follow WHERE name_compte=:name_compte AND with_compte=:with_compte");
	    $q->execute([
            'name_compte' => $_SESSION['pseudo'],
            'with_compte' => $p_result['pseudo'],
            'statue_follow' => 'none'
        ]);

        header("Location: social_profil.php?id_profil=".$_GET['id_profil']);
        
        }

    }else{

    echo "<form method='post'>
    <input type='submit' name='follow1' value='".$text_button_addfollow."'>
    </form>";

    if(isset ($_POST['follow1'])) {

        $q = $db->prepare("UPDATE sociale_compte_statue SET statue_follow=:statue_follow WHERE name_compte=:name_compte AND with_compte=:with_compte");
	    $q->execute([
            'name_compte' => $_SESSION['pseudo'],
            'with_compte' => $p_result['pseudo'],
            'statue_follow' => 'follow'
        ]);

        header("Location: social_profil.php?id_profil=".$_GET['id_profil']);
        
        }

    }

    }else{

    echo "<form method='post'>
    <input type='submit' name='addfriend2' value='".$text_button_addfriends."'>
    </form>";

    if(isset ($_POST['addfriend2'])) {
        
        $q1 = $db->prepare("INSERT INTO sociale_compte_statue (name_compte,with_compte,statue_friends,date_statue_friends,statue_follow,date_statue_follow,actif) VALUES (:name_compte,:with_compte,:statue_friends,:date_statue_friends,:statue_follow,:date_statue_follow,:actif)");
        $q1->execute([
            'name_compte' => $_SESSION['pseudo'],
            'with_compte' => $p_result['pseudo'],
            'statue_friends' => 'invitation',
            'date_statue_friends' => $date,
            'statue_follow' => 'none',
            'date_statue_follow' => $date,
            'actif' => "yes"
        ]);

        $q2 = $db->prepare("INSERT INTO sociale_compte_statue (name_compte,with_compte,statue_friends,date_statue_friends,statue_follow,date_statue_follow,actif) VALUES (:name_compte,:with_compte,:statue_friends,:date_statue_friends,:statue_follow,:date_statue_follow,:actif)");
        $q2->execute([
            'name_compte' => $p_result['pseudo'],
            'with_compte' => $_SESSION['pseudo'],
            'statue_friends' => 'none',
            'date_statue_friends' => $date,
            'statue_follow' => 'none',
            'date_statue_follow' => $date,
            'actif' => "yes"
        ]);

        header("Location: social_profil.php?id_profil=".$_GET['id_profil']);
        
        }
	
	echo "<form method='post'>
    <input type='submit' name='follow2' value='".$text_button_addfollow."'>
    </form>";

    if(isset ($_POST['follow2'])) {
        
        $q = $db->prepare("INSERT INTO sociale_compte_statue (name_compte,with_compte,statue_friends,date_statue_friends,statue_follow,date_statue_follow,actif) VALUES (:name_compte,:with_compte,:statue_friends,:date_statue_friends,:statue_follow,:date_statue_follow,:actif)");
        $q->execute([
            'name_compte' => $_SESSION['pseudo'],
            'with_compte' => $p_result['pseudo'],
            'statue_friends' => 'none',
            'date_statue_friends' => $date,
            'statue_follow' => 'follow',
            'date_statue_follow' => $date,
            'actif' => "yes"
        ]);

        $q = $db->prepare("INSERT INTO sociale_compte_statue (name_compte,with_compte,statue_friends,date_statue_friends,statue_follow,date_statue_follow,actif) VALUES (:name_compte,:with_compte,:statue_friends,:date_statue_friends,:statue_follow,:date_statue_follow,:actif)");
        $q->execute([
            'name_compte' => $p_result['pseudo'],
            'with_compte' => $_SESSION['pseudo'],
            'statue_friends' => 'none',
            'date_statue_friends' => $date,
            'statue_follow' => 'none',
            'date_statue_follow' => $date,
            'actif' => "yes"
        ]);

        header("Location: social_profil.php?id_profil=".$_GET['id_profil']);
        
        }
    }

    echo "<form action='messages.php?id_profil=".$_GET['id_profil']."' method='post'>
    <input type='submit' name='message' value='Message'>
    </form>";

	echo "</div>";

    }

    echo "</div>";

    $n = $db->prepare("SELECT * FROM sociale_compte_statue WHERE name_compte=:name_compte AND with_compte=:with_compte AND actif=:actif");
	$n->execute([
    'name_compte' => $_GET['id_profil'],
    'with_compte' => $_SESSION['pseudo'],
    'actif' => "yes"
    ]);
    $x_result = $n->fetch();

    if($x_result['statue_friends'] == "friends"){

    $q = $db->prepare("SELECT * FROM sociale_poste WHERE auteur=:auteur AND actif=:actif");
	$q->execute([
    'auteur' => $_GET['id_profil'],
    'actif' => "yes"
	]);
	$nb_postes = $q->rowCount();

	if ($nb_postes == 0) {
    echo "<div class='social-content'>";
    echo '<p>'.$message_social_undefined.'</p>';
    echo "</div>";
	}else{
    
    while($result = $q->fetch(PDO::FETCH_ASSOC)){
	
        sscanf($result['date_poste'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde); 
        
        echo "<div class='social-content'>";
        
        echo "<p>" . $result['poste'] . "</p>";

        echo "<br/>";

        echo "<p>" . $message_social_poste_date . $annee . " - " . $mois . " - " . $jour . "</p>";
        
        echo "</div>";
    
        }
    
    }

    }else{

    $q = $db->prepare("SELECT * FROM sociale_poste WHERE auteur=:auteur AND confidentiality=:confidentiality AND actif=:actif");
	$q->execute([
    'auteur' => $_GET['id_profil'],
    'confidentiality' => "public",
    'actif' => "yes"
	]);
	$nb_postes = $q->rowCount();

	if ($nb_postes == 0) {
    echo "<div class='social-content'>";
    echo "<p>".$message_social_profil_poste_undefined."</p>";
    echo "</div>";
	}else{
    
    while($result = $q->fetch(PDO::FETCH_ASSOC)){
	
        sscanf($result['date_poste'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde); 
        
        echo "<div class='social-content'>";
        
        echo "<p>" . $result['poste'] . "</p>";

        echo "<br/";

        echo "<p>" . $message_social_poste_date . $annee . " - " . $mois . " - " . $jour . "</p>";
        
        echo "</div>";
    
        }
    
    }

    }

    }else{

        echo "<div class='social-content'>";

        echo "<p>".$message_social_profil_undefined."</p>";

        echo "</div>";

    }

}

    }else{
     
    if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {
    
    echo "<div class='social-content'>";
    
    echo "<div class='boxsocialprofil'>";

    echo "<div class='boxsocialelements'>";

    echo "<a href='../users/edit_picture.php'>".$_SESSION['profil_picture']."</a>";

    echo "</div>";
    echo "<div class='boxsocialelements'>";

    echo "<h2>" . $_SESSION['prenom'] . " - " . $_SESSION['nom'] . "</h2>";

    echo "</div>";

    echo "</div>";

    echo "</div>";

    echo "<div class='social-content'>";
    
    echo "<form action='q_social.php'>
   <input id=search-barre type='search' name='q_social' placeholder='".$message_social_search_q."' style='float:left; width:75%;' required/>
   <input type='submit' value='".$text_button_search."' style='float:right' />
  </form>";

  echo "<br/>";

    echo "</div>";

    echo "<div class='social-content'>";

    echo "<h2>".$titre_social_editcompte."</h2>";
    echo "<hr/>";
    echo "<div class='boxsocialprofil'>";
    echo "<div class='boxsocialelements'><h3><a href='my_poste.php'>".$titre_header_social_mypostes."</a></h3></div>";
    echo "<div class='boxsocialelements'><h3><a href='my_follow.php'>".$titre_header_social_myfollow."</a></h3></div>";
    echo "<div class='boxsocialelements'><h3><a href='my_friends.php'>".$titre_header_social_myfriends."</a></h3></div>";

    echo "</div>";
    echo "</div>";

    echo "<div class='social-content'>";
    
    echo "<h2>".$titre_header_social_myfriends."</h2>";

    echo "<hr/>";

    $x1 = $db->prepare("SELECT * FROM sociale_compte_statue WHERE name_compte=:name_compte AND statue_friends=:statue_friends AND actif=:actif");
	$x1->execute([
    'name_compte' => $_SESSION['pseudo'],
    'statue_friends' => 'friends',
    'actif' => 'yes'
	]);
	$number_friends_statue = $x1->rowCount();

	if ($number_friends_statue == 0) {
    echo "<p>".$message_social_compte_friends_undefined."</p>";
	}else{

    echo "<br/>";

    echo "<div class='boxsocialprofil'>";
    
    while($result_friends_statue = $x1->fetch(PDO::FETCH_ASSOC)){

        $y1 = $db->prepare("SELECT * FROM users WHERE pseudo=:pseudo AND actif=:actif");
	    $y1->execute([
        'pseudo' => $result_friends_statue['with_compte'],
        'actif' => 'yes'
        ]);
        
        $result_friends = $y1->fetch();

        echo "<div class='boxsocialelements'><a href='social_profil.php?id_profil=".$result_friends['pseudo']."'>";
    
        echo $result_friends['profil_picture'];
          
        echo "</a></div>";
          
        }

        echo "</div><br/>";
    
   }

    echo "<br/>";

    echo "<h2>".$titre_social_follow."</h2>";

    echo "<hr/>";

    $x2 = $db->prepare("SELECT * FROM sociale_compte_statue WHERE name_compte=:name_compte AND statue_follow=:statue_follow AND actif=:actif");
	$x2->execute([
    'name_compte' => $_SESSION['pseudo'],
    'statue_follow' => 'follow',
    'actif' => 'yes'
	]);
	$number_follow_statue = $x2->rowCount();

	if ($number_follow_statue == 0) {
    echo "<p>".$message_social_compte_follow_undefined."</p>";
	}else{

        echo "<br/>";

        echo "<div class='boxsocialprofil'>";
    
    while($result_follow_statue = $x2->fetch(PDO::FETCH_ASSOC)){


        $y2 = $db->prepare("SELECT * FROM users WHERE pseudo=:pseudo AND actif=:actif");
	    $y2->execute([
        'pseudo' => $result_follow_statue['with_compte'],
        'actif' => 'yes'
        ]);
        
        $result_follow = $y2->fetch();

        echo "<div class='boxsocialelements'><a href='social_profil.php?id_profil=".$result_follow['pseudo']."'>";
    
        echo $result_follow['profil_picture'];
          
        echo "</a></div>";
          
        }

        echo "</div>";
    
   }

    echo "</div>";
    
    $q = $db->prepare("SELECT * FROM sociale_poste WHERE auteur=:auteur");
	$q->execute([
    'auteur' => $_SESSION['pseudo'],
	]);
	$nb_postes = $q->rowCount();

	if ($nb_postes == 0) {
    echo "<div class='social-content'>";
    echo "<h2>".$titre_header_social_mypostes."</h2>";
    echo "<hr/>";
    echo '<p>'.$message_social_undefined.'</p>';
    echo "</div>";
	}else{
    
    while($result = $q->fetch(PDO::FETCH_ASSOC)){
	
        sscanf($result['date_poste'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde); 
        
        echo "<div class='social-content'>";
        
        echo "<p>" . $result['poste'] . "</p>";

        echo "<br/";

        echo "<p>" . $message_social_poste_date . $annee . " - " . $mois . " - " . $jour . "</p>";

        echo "<br/>";

        echo "</div>";
    
        }
    
   }
    
   }else{
    
    echo "<div class='social-content'>";
    
    echo "<p>".$message_social_profil_compte_undefined."</p>";

    echo "</div>";
	
   }
}

    echo "</div>";
	 
    echo "</body>
    </html>";
?>