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
	<title>".$titre_header_forum_newsujet."</title>
	</head>";
    
	echo "<body id=forum>";
    
   echo
   "<div id='header'>
   <h1>
   <center>
   ".$titre_header_forum_newsujet."
   <center>
   </h1>
   </div>";
    
   include 'nav.php';

   include 'aside.php';
    
	echo "<div id='forum-element'>";
	echo "<div class='forum-content'>";

	if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
	{
  
	if (isset ($_POST['submit'])) {
	if (!empty($_POST['categorie']) && !empty($_POST['titre']) && !empty($_POST['message'])) {
	if (preg_match("#^[^<>]+$#i", $_POST['titre']) && preg_match("#^[^<>]+$#i", $_POST['categorie']))
	{
		
		$id = md5(microtime(TRUE)*100000);
		
	
		$q = $db->prepare("INSERT INTO forum_sujet (auteur,categorie,titre,actif,id_sujet,langue) VALUES (:auteur,:categorie,:titre,:actif,:id_sujet,:langue)");
		$q->execute([
    'auteur' => $_SESSION['pseudo'],
    'categorie' => $_POST['categorie'],
    'titre' => $_POST['titre'],
    'id_sujet' => $id,
    'actif' => "yes",
	'langue' => $set_language
    ]);
		$c = $db->prepare("INSERT INTO forum_reponses(auteur,message,correspondance_sujet,actif,id_reponses,type) VALUES (:auteur,:message,:correspondance_sujet,:actif,:id_reponses,:type)");
		$c->execute([
    'auteur' => $_SESSION['pseudo'],
    'message' => $_POST['message'],
    'correspondance_sujet' => $_POST['titre'],
    'id_reponses' => $id,
	'actif' => "yes",
	'type' => "text"
	]);
		$d = $db->prepare("INSERT INTO search_data(element,article,contenue,auteur,link,id_sujet,actif) VALUES (:element,:article,:contenue,:auteur,:link,:id_sujet,:actif)");
		$d->execute([
	'element' => 'forum',
	'article' => $_POST['titre'],
	'contenue' => $_POST['message'],
	'auteur' => $_SESSION['pseudo'],
	'link' => "forum/sujet.php?id_sujet_a_lire=".$id,
	'id_sujet' => $id,
	'actif' => "yes"
	]);
    
    echo "<p>".$message_forum_post_sujet."</p>";
	
	}else{
	echo "<p>".$message_form_erreur_champs_2."</p>";
	}
	}else{
	echo "<p>".$message_form_erreur_champs_1."</p>";
	}
	}else{
	
	?>
	<form method="post"><br/>
	<input type="text" name="titre" maxlength="50" size="50" placeholder='<?= $text_form_titre_sujet
	?>' required>
	<br/><br/>
   	<select name='categorie' size='1'>
   	<option value="autres"><?= $text_form_categorie?>
  	<option value="informatique">Informatique
  	<option value="programmation">Programmation
  	<option value="social">Social
    <option value="autres">Autres
    </select>
	<br/><br/>
	<p><?=$titre_form_sujet?><p>
	<input type="button" value="B" style="font-weight:bold;" onclick="editextcommande('bold');" />
	<input type="button" value="I" style="font-style:italic;" onclick="editextcommande('italic');" />
	<input type="button" value="U" style="text-decoration:underline;" onclick="editextcommande('underline');" />
	<input type="button" value="Lien" onclick="editextcommande('createLink');" />
	<br/>
	<div id="editeur" contentEditable=true></div>
	<br/><br/><br/>
	<input id="message" type="hidden" name="message" />
	<input type="submit" name="submit" value="<?=$text_button_poste?>" onclick="editextresult();">
	</form>
	
	<script src="../JS/editext.js" ></script>
	
	<?php
	
	}
	}else{
	echo "<p>".$message_compte_undefined."</p>";
	}

	echo "</div>";
	echo "</div>";

	echo "</div>";


	echo 
	"</body>
	</html>";
?>