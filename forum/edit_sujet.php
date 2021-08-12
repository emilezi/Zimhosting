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
	<title>".$titre_header_forum_editsujet."</title>
	</head>";
    
	echo "<body id=forum>";
    
   echo
   "<div id='header'>
   <h1>
   <center>
   ".$titre_header_forum_editsujet."
   <center>
   </h1>
   </div>";
    
   include 'nav.php';

   include 'aside.php';
    
	echo "<div id='forum-element'>";
	echo "<div class='forum-content'>";

	if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
	{
	if(isset($_GET['id_sujet_a_modifier'])){
			
	$c = $db->prepare("SELECT * FROM forum_sujet WHERE id_sujet=:id_sujet");
   $c->execute([
   'id_sujet'=> $_GET['id_sujet_a_modifier']
   ]);
   
   $result1 = $c->fetch();
   
   $s = $db->prepare("SELECT * FROM forum_reponses WHERE id_reponses=:id_reponses AND actif=:actif");
   $s->execute([
   'id_reponses'=> $_GET['id_sujet_a_modifier'],
   'actif' => 'yes'
   ]);
   
   $result2 = $s->fetch();
   		
   if($result1 == true){
   if($result1['auteur'] == $_SESSION['pseudo']){
  
	if (isset ($_POST['submit'])) {
	if (!empty($_POST['titre']) && !empty($_POST['message'])) {
	if (preg_match("#^[^<>]+$#i", $_POST['titre']))
	{
	
	$k1 = $db->prepare("UPDATE forum_sujet SET titre = :titre WHERE id_sujet = :id_sujet");
	$k1->execute([
	'id_sujet' => 	$_GET['id_sujet_a_modifier'],
   	'titre' => $_POST['titre']
   	]);
	$k2 = $db->prepare("UPDATE forum_reponses SET correspondance_sujet  = :update WHERE correspondance_sujet = :titre");
	$k2->execute([
	'titre' => $result1['titre'],
   	'update' => $_POST['titre']
   	]);
   	$k3 = $db->prepare("UPDATE forum_reponses SET message = :message WHERE id_reponses = :id_reponses");
	$k3->execute([
	'id_reponses' => $_GET['id_sujet_a_modifier'],
   	'message' => $_POST['message']
   	]);
   	$k4 = $db->prepare("UPDATE search_data SET article=:article WHERE id_sujet=:id_sujet");
	$k4->execute([
	'id_sujet' => $_GET['id_sujet_a_modifier'],
   	'article' => $_POST['titre']
   ]);
   	$k5 = $db->prepare("UPDATE search_data SET contenue=:contenue WHERE id_sujet=:id_sujet");
	$k5->execute([
	'id_sujet' => $_GET['id_sujet_a_modifier'],
	'contenue' => $_POST['message']
   ]);
    
    
   echo "<p>".$message_forum_edit_sujet."</p>";
    
	}else{
	echo "<p>".$message_form_erreur_champs_2."</p>";
	}
	}else{
	echo "<p>".$message_form_erreur_champs_1."</p>";
	}
	}else{
	
	?>
	
	<form method="post"><br/>
	<p><?=$titre_form_edit_titre?><p>
	<input type="text" name="titre" maxlength="50" size="50" value="<?= $result1['titre'] ?>" required><br/>
	<p><?=$titre_form_edit_commentaire?><p>
	<input type="button" value="B" style="font-weight:bold;" onclick="editextcommande('bold');" />
	<input type="button" value="I" style="font-style:italic;" onclick="editextcommande('italic');" />
	<input type="button" value="U" style="text-decoration:underline;" onclick="editextcommande('underline');" />
	<input type="button" value="Lien" onclick="editextcommande('createLink');" />
	<br/>
	<div id="editeur" contentEditable=true><?= $result2['message'] ?></div>
	<br/><br/><br/>
	<input id="message" type="hidden" name="message" />
	<input type="submit" name="submit" value="<?=$text_button_edit?>" onclick="editextresult();">
	</form>
	
	<script src="../JS/editext.js" ></script>

	<?php
	
	}
   }else{
  	echo "<p>".$message_forum_sujet_undefined."</p>";
  	}
   }else{
	echo "<p>".$message_forum_sujet_undefined."</p>";
  	}
   }else{
	echo "<p>".$message_forum_sujet_undefined."</p>";
  	}
	}else{
	echo "<p>".$message_compte_undefined."</p>";
	}

	echo "</div>";
	echo "</div>";

	echo 
	"</body>
	</html>";
?>