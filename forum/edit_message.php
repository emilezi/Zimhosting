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
   <title>".$titre_header_forum_editcommentaire."</title>
  	</head>";
  
  	echo "<body id=forum>";
  	
  	echo
   "<div id='header'>
   <h1>
   <center>
   ".$titre_header_forum_editcommentaire."
   <center>
   </h1>
   </div>";
    
   include 'nav.php';

   include 'aside.php';
  
   echo "<div id='forum-element'>";
   
   echo "<div class='forum-content'>";
    
   if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {
    
   if(isset($_GET['message_a_modifier'])){
   		  	
   		  	$c = $db->prepare("SELECT * FROM forum_reponses WHERE id_reponses=:id_reponses AND actif=:actif");
   		  	$c->execute([
   		  	'id_reponses'=> $_GET['message_a_modifier'],
			'actif' => "yes"
   		  	]);
   		  	$result = $c->fetch();
   		  	
   		  	if($result == true){
   		  	if($result['auteur'] == $_SESSION['pseudo']){
    
	if (isset($_POST['submit'])){
	if (!empty($_POST['message'])){
	
   $v = $db->prepare("UPDATE forum_reponses SET message = :message WHERE id_reponses = :id_reponses");
	$v->execute([
	'id_reponses' => $_GET['message_a_modifier'],
   'message' => $_POST['message']
   ]);
    
   echo "<p>".$message_forum_edit_commentaire."</p>";
   
	}else{
	echo "<p>".$message_form_erreur_champs_1."</p>";
	}
	}else{
	
	?>
	
	<form method="post"><br/>
	<p><?=$titre_form_edit_commentaire?><p>
	<input type="button" value="B" style="font-weight:bold;" onclick="editextcommande('bold');" />
	<input type="button" value="I" style="font-style:italic;" onclick="editextcommande('italic');" />
	<input type="button" value="U" style="text-decoration:underline;" onclick="editextcommande('underline');" />
	<input type="button" value="Lien" onclick="editextcommande('createLink');" />
	<br/>
	<div id="editeur" contentEditable=true><?= $result['message'] ?></div>
	<br/><br/><br/>
	<input id="message" type="hidden" name="message"/>
	<input type="submit" name="submit" value="<?=$text_button_edit?>" onclick="editextresult();">
	</form>
	
	<script src="../JS/editext.js" ></script>

	<?php
	
	}
  	}else{
  	echo "<p>".$message_forum_commentaire_undefined."</p>";
  	}
  	}else{
	echo "<p>".$message_forum_commentaire_undefined."</p>";
  	}
  	}else{
	echo "<p>".$message_forum_commentaire_undefined."</p>";
  	}
  	}else{
	header('Location: ../index.php');
	}
  
  	echo "</div>";
  
  	echo "</div>";
  
  echo
  "</body>
  </html>";
  
?>
