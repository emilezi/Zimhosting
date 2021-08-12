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
   <title>".$titre_header_admin."</title>
   </head>";
  
   echo "<body id=accueil>";
  
   echo "<div id='header'>";
    
   echo "<h1><center>".$titre_header_admin_security."</center></h1>";
    
   echo "</div>";
  
   include 'nav.php';
 
   if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {
   if($_SESSION['class'] == "administrateur"){

   echo "<div id='admin-nav'>";

   echo "<h3>".$titre_admin."</h3>";
   
   echo "<hr/>";
   
   echo "<a href='index.php'><p>".$message_admin_return_index."</p></a>";
   
   echo "<br/><br/>";
   
   echo "</div>";
       
   echo "<div id='admin-element'>";
       
   echo "<div class='admin-content'>";
    
   echo "<h1>".$titre_admin_setting."</h1>";

   echo "<hr/>";
  
   echo "<h2>".$message_admin_setting_display_emilezytb."<br/></h2>";
  
   $q1 = $db->prepare("SELECT * FROM setting WHERE parametre = :parametre");
   $q1->execute(['parametre' => "pageytbdisplay"]);
   $result = $q1->fetch();
   if($result['value'] == "yes"){
  
   echo "<p>".$message_admin_setting_display_no."</p>";
  
   }else{
  
   echo "<p>".$message_admin_setting_display_yes."</p>";
  
   }
  
   echo "<form method='post'>
   <input type='radio' name='ytbsecureradio' value='".$text_button_display."' checked />Masquer
   <input type='radio' name='ytbsecureradio' value='".$text_button_hide."' />Afficher<br/><br/>
   <input type='submit' name='submit1' value='".$text_button_edit."'>
   </form>";
	
	if(isset($_POST["submit1"]))
	{
		extract($_POST);
	if($ytbsecureradio == $text_button_hide){
	
	$q1 = $db->prepare("UPDATE setting SET value=:value WHERE parametre=:parametre");
  	$q1->execute([
  	'value' => "no",
   'parametre' => "pageytbdisplay"
   ]);
	
	header('Location: security.php');
	
	}else{
	
	$q1 = $db->prepare("UPDATE setting SET value=:value WHERE parametre=:parametre");
  	$q1->execute([
  	'value' => "yes",
   'parametre' => "pageytbdisplay"
   ]);
   
   header('Location: security.php');
	
	}
   }
   
   echo "<hr/>";
  
   echo "<h2>".$message_admin_setting_display_cv."<br/></h2>";
  
   $q2 = $db->prepare("SELECT * FROM setting WHERE parametre = :parametre");
   $q2->execute(['parametre' => "pagecvdisplay"]);
   $result = $q2->fetch();
   if($result['value'] == "yes"){
  
   echo "<p>".$message_admin_setting_display_no."</p>";
  
   }else{
  
   echo "<p>".$message_admin_setting_display_yes."</p>";
  
   }
  
   echo "<form method='post'>
   <input type='radio' name='cvsecureradio' value='".$text_button_display."' checked />Masquer
   <input type='radio' name='cvsecureradio' value='".$text_button_hide."' />Afficher<br/><br/>
   <input type='submit' name='submit2' value='".$text_button_edit."'>
   </form>";
	
	if(isset($_POST["submit2"]))
	{
		extract($_POST);
	if($cvsecureradio == $text_button_hide){
	
	$q2 = $db->prepare("UPDATE setting SET value=:value WHERE parametre=:parametre");
  	$q2->execute([
  	'value' => "no",
   'parametre' => "pagecvdisplay"
   ]);
	
	header('Location: security.php');
	
	}else{
	
	$q2 = $db->prepare("UPDATE setting SET value=:value WHERE parametre=:parametre");
  	$q2->execute([
  	'value' => "yes",
   'parametre' => "pagecvdisplay"
   ]);
   
   header('Location: security.php');
	
	}
	}

   echo "</div>";
  
   echo "</div>";
	
  	}else{
  	
      echo "<div id='admin-nav'>";

      echo "<h3>".$titre_admin."</h3>";

      echo "<hr/>";

      echo "<p>".$message_admin_compte_admin_undefined_2."</p>";

      echo "</div>";

      echo "<div id='admin-element'>";
       
      echo "<div class='admin-content'>";	
       
      echo "<p>".$message_admin_compte_admin_undefined."</p>";
    
      echo "</div>";

      echo "</div>";

  	}

   }else{
    header('Location: ../index.php');
    }
  
   echo 
   "</body>
	</html>";

?>