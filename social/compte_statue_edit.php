<?php
	session_start();
	include '../php/database.php'; 
	include '../php/language.php';
	include '../php/webtxt.php';
	global $db;

	echo "<html>";
	
	echo
	"<head>
   <meta charset='utf-8' />
   <link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
   <link rel='stylesheet' href='../style.css' />
   <title>".$titre_header_social."</title>
   </head>";
   
   echo "<body id=social>";

   echo
    "<div id='header'>
    <h1>
    <center>
    ".$titre_header_social."
    <center>
    </h1>
    </div>";
    
    include 'nav.php';
    
    include 'aside.php';

   echo "<div id='social-element'>";
    
   if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {
    
   if(isset($_GET['id_compte']) && isset($_GET['statue_edit'])){

	if($_GET['statue_edit'] == 'delfriends'){

	$gx = $db->prepare("SELECT * FROM sociale_compte_statue WHERE name_compte=:name_compte AND with_compte=:with_compte AND statue_friends=:statue_friends AND actif=:actif");
	$gx->execute([
        'name_compte' => $_SESSION['pseudo'],
        'with_compte' => $_GET['id_compte'],
		'statue_friends' => 'friends',
        'actif' => "yes"
    ]);
    $edit_friends_statue = $gx->fetch();

	if($edit_friends_statue == true){

	echo "<div class='social-content'>";

	echo "<p>".$message_social_del_friends."</p>";

	echo "<hr/><br/>";

	echo "<form method='post'>
   <input type='radio' name='delradio' value='".$text_form_no."' checked />".$text_form_no."
   <input type='radio' name='delradio' value='".$text_form_yes."' />".$text_form_yes."<br/><br/>
   <input type='submit' name='submit' value='".$text_button_validate."'>
   </form>";

	echo "</div>";
   
    if(isset($_POST["submit"])){
	extract($_POST);
    if($delradio == $text_form_yes)
   	{
		$q1 = $db->prepare("UPDATE sociale_compte_statue SET statue_friends=:statue_friends WHERE name_compte=:name_compte AND with_compte=:with_compte");
	    $q1->execute([
            'name_compte' => $_SESSION['pseudo'],
            'with_compte' => $_GET['id_compte'],
            'statue_friends' => 'none'
        ]);

        $q2 = $db->prepare("UPDATE sociale_compte_statue SET statue_friends=:statue_friends WHERE name_compte=:name_compte AND with_compte=:with_compte");
	    $q2->execute([
            'name_compte' => $_GET['id_compte'],
            'with_compte' => $_SESSION['pseudo'],
            'statue_friends' => 'none'
        ]);
   		  	
		header("Location: social_profil.php?id_profil=".$_GET['id_compte']);
   		  }else{
	header("Location: social_profil.php?id_profil=".$_GET['id_compte']);
    }
 	}

	}else{

		header('social_profil.php');

	}

	}elseif($_GET['statue_edit'] == 'trueinvite'){

	$gy = $db->prepare("SELECT * FROM sociale_compte_statue WHERE name_compte=:name_compte AND with_compte=:with_compte AND statue_friends=:statue_friends");
	$gy->execute([
	'name_compte' => $_GET['id_compte'],
	'with_compte' => $_SESSION['pseudo'],
	'statue_friends' => 'invitation'
	]);
    $edit_friends_statue = $gy->fetch();

	if($edit_friends_statue == true){

		echo "<div class='social-content'>";

		echo "<p>".$message_social_edit_trueinvitation."</p>";

		echo "<hr/><br/>";

		echo
		  "<form method='post'>
		  <input type='radio' name='delradio' value='".$text_form_no."' checked />Non
		  <input type='radio' name='delradio' value='".$text_form_yes."' />Oui<br/><br/>
		  <input type='submit' name='submit' value='".$text_button_validate."'>
		  </form>";
	
		echo "</div>";
	   
		if(isset($_POST["submit"])){
		extract($_POST);
		if($delradio == $text_form_yes)
		   {
			$j1 = $db->prepare("UPDATE sociale_compte_statue SET statue_friends=:statue_friends WHERE with_compte=:with_compte AND name_compte=:name_compte");
	    	$j1->execute([
            'name_compte' => $_GET['id_compte'],
            'with_compte' => $_SESSION['pseudo'],
            'statue_friends' => 'friends'
        	]);

        	$j2 = $db->prepare("UPDATE sociale_compte_statue SET statue_friends=:statue_friends WHERE with_compte=:with_compte AND name_compte=:name_compte");
	    	$j2->execute([
            'name_compte' => $_SESSION['pseudo'],
            'with_compte' => $_GET['id_compte'],
            'statue_friends' => 'friends'
        	]);
					 
			header('Location: my_friends.php');
			}else{
		header('Location: my_friends.php');
		}
		}

	}else{

		header('Location: social_profil.php');

	}


	}elseif($_GET['statue_edit'] == 'falseinvite'){

	$gz = $db->prepare("SELECT * FROM sociale_compte_statue WHERE name_compte=:name_compte AND with_compte=:with_compte AND statue_friends=:statue_friends");
	$gz->execute([
	'name_compte' => $_GET['id_compte'],
	'with_compte' => $_SESSION['pseudo'],
	'statue_friends' => 'invitation'
	]);
	$edit_friends_statue = $gz->fetch();
	
	if($edit_friends_statue == true){
	
		echo "<div class='social-content'>";

		echo "<p>".$message_social_edit_falseinvitation."</p>";

		echo "<hr/><br/>";

		echo
		  "<form method='post'>
		  <input type='radio' name='delradio' value='".$text_form_no."' checked />Non
		  <input type='radio' name='delradio' value='".$text_form_yes."' />Oui<br/><br/>
		  <input type='submit' name='submit' value='".$text_button_validate."'>
		  </form>";
	
		echo "</div>";
	   
		if(isset($_POST["submit"])){
		extract($_POST);
		if($delradio == $text_form_yes)
		   {
			$j = $db->prepare("UPDATE sociale_compte_statue SET statue_friends=:statue_friends WHERE with_compte=:with_compte AND name_compte=:name_compte");
	    	$j->execute([
            'name_compte' => $_GET['id_compte'],
            'with_compte' => $_SESSION['pseudo'],
            'statue_friends' => 'none'
        	]);
					 
			header('Location: my_friends.php');
			}else{
		header('Location: my_friends.php');
		}
		}
	
	}else{
	
		header('Location: social_profil.php');
	
	}

	}else{

	header('Location: social_profil.php');

	}
   		  	
  	}else{
  	
	header('Location: social_profil.php');

  	}
  	}else{
  	
	header('../index.php');

  	}
  
  	echo "</div>";
  	
  	echo
  	"</body>
  	</html>";

?>