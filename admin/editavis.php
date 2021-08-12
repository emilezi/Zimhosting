<?php
	session_start();
	include '../php/database.php'; 
	include '../php/language.php';
	include '../php/webtxt.php';
	global $db;

	echo "<html>";
  
	echo "<head>
   <meta charset='utf-8' />
   <link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
   <link rel='stylesheet' href='../style.css' />
   <title>".$titre_header_admin."</title>
   </head>";
  
   echo "<body id=accueil>";
    
   echo "<div class='contenue-small'>";
    
   if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {   
   if($_SESSION['class'] == "administrateur"){
    
   if(isset($_GET['avis_a_valider'])){
   		  	
   		  	$c = $db->prepare("SELECT * FROM avis WHERE id_avis=:id_avis");
   		  	$c->execute([
   		  	'id_avis' => $_GET['avis_a_valider']
   		  	]);
   		  	$result = $c->fetch();
   		  	
   		  	if($result == true){
   
   echo "<h2>".$titre_zimhosting_warning."</h2>";
   echo "<hr/>";
  
   echo "<p>".$message_admin_avis_edit."</p>";
  
   echo "<form method='post'>
   <input type='radio' name='delradio' value='".$text_form_no."' checked />Non
   <input type='radio' name='delradio' value='".$text_form_yes."' />Oui<br/><br/>
   <input type='submit' name='submit' value='".$text_button_validate."'>
   </form>";
   
   if(isset($_POST["submit"])){
   	extract($_POST);
   if($delradio == $text_form_yes)
   	{
   	 $q = $db->prepare("UPDATE avis SET repondue = :repondue WHERE id_avis = :id_avis");
    	 $q->execute([
    	'repondue' => "yes",
    	'id_avis' => $_GET['avis_a_valider']
    ]);
   		  	
   		  	header('Location: avis.php');
   		  }else{
   header('Location: avis.php');
   }
   }
 
   }else{
     
   echo "<h2>".$titre_compte_information."</h2>";
   echo "<hr/>";
   echo "<p>".$message_admin_avis_nofond."</p>";
     
   }
   }
   }else{
   
   echo "<h2>".$titre_compte_information."</h2>";
   echo "<hr/>";
  	echo "<p>".$message_admin_compte_admin_undefined."</p>";
  	
  	}
   }else{
	header('Location: ../index.php');
   }
  
   echo "</div>";
  
   echo"
   </body>
   </html>";

?>