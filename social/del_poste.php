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
   <title>".$titre_header_social_delposte."</title>
   </head>";
   
   echo "<body id=social>";

   echo
    "<div id='header'>
    <h1>
    <center>
    ".$titre_header_social_delposte."
    <center>
    </h1>
    </div>";
    
    include 'nav.php';
    
    include 'aside.php';

   echo "<div id='social-element'>";
    
   if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {
    
   if(isset($_GET['id_poste_a_supprimer'])){
   		  	
   		  	$c = $db->prepare("SELECT * FROM sociale_poste WHERE id_poste=:id_poste");
   		  	$c->execute([
   		  	'id_poste'=> $_GET['id_poste_a_supprimer']
   		  	]);
   		  	$result = $c->fetch();
   		  	
   		  	if($result == true){
   		  	if(($result['auteur'] == $_SESSION['pseudo']) || ($_SESSION['class'] == "administrateur")){
    
  
    echo "<div class='social-content'>";

    echo "<p>".$message_social_del_poste."</p>";

    echo "<br/>";
      
    echo "<p>" . $result['poste'] . "</p>";

    echo "<br/>";
  
	echo "<form method='post'>
	<input type='radio' name='delradio' value='".$text_form_no."' checked />".$text_form_no."
	<input type='radio' name='delradio' value='".$text_form_yes."' />".$text_form_yes."<br/><br/>
	<input type='submit' name='submit' value='".$text_button_validate."'>
	</form>";
   
   if(isset($_POST["submit"])){
   	extract($_POST);
   if($delradio == $text_form_yes)
   	{
   	 	$d = $db->prepare("DELETE FROM `sociale_poste` WHERE id_poste=:id_poste");
   		  	$d->execute([
   		  	'id_poste' => $result['id_poste']
   		  	]);
   		  	
   		  	header('Location: my_poste.php');
   		  }else{
   header('Location: my_poste.php');
   }
 	}
  
  	echo "</div>";
  
  	}else{
  	
	echo "<div class='social-content'>";
  	
  	echo "<p>".$message_social_poste_undefined."</p>";
  
  	echo "</div>";
  	}
  	}else{
  	
	echo "<div class='social-content'>";
  	
	echo "<p>".$message_social_poste_undefined."</p>";
  
  	echo "</div>";
  	}
  	}else{
  	
	echo "<div class='social-content'>";
  	
	echo "<p>".$message_social_poste_undefined."</p>";
  
  	echo "</div>";
  	}
  	}else{
	header('Location: ../index.php');
	}
  
  	echo "</div>";
  	
  	echo
  	"</body>
  	</html>";

?>