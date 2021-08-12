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
	<title>".$titre_header_blog_newarticle."</title>
	</head>";
    
	echo "<body id=blog>";
    
   echo
   "<div id='header-blog'>
   <h1>
   <center>
   ".$titre_header_blog_newarticle."
   <center>
   </h1>
   </div>";
    
   	include 'nav.php';

	echo "<div id='box-data'>";

	echo "</div>";

	include '../users/data_picture.php';
	include '../users/data_movie.php';

	if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
	{
	
	echo "<div id='blog-element-article'>";
	echo "<div class='blog-content'>";
  
	if (isset($_POST['submit'])) {
	if (!empty($_POST['titre']) && !empty($_POST['message'])) {
	if (preg_match("#^[^<>]+$#i", $_POST['titre']))
	{
		
	$id = md5(microtime(TRUE)*100000);
	
	if(!empty($_FILES['file']['name']))
	{
	$dossier = "../web-data/".$_SESSION['pseudo']."/";
	$fichier = basename($_FILES['file']['name']);
	$taille_maxi = 2000000;
	$taille = filesize($_FILES['file']['tmp_name']);
	$extensions = array('.png', '.gif', '.jpg', '.jpeg');
	$extension = strrchr($_FILES['file']['name'], '.'); 
	if(!in_array($extension, $extensions))
	{
		$erreur = "yes";
	}
	if($taille>$taille_maxi)
	{
		$erreur = "yes";
	}
	if(!isset($erreur))
	{
	$fichier = md5(microtime(TRUE)*1000);
	$files = $dossier . $fichier . $extension;
	if(file_exists($files)){
		unlink($files);
	}
     if(move_uploaded_file($_FILES['file']['tmp_name'], $dossier . $fichier . $extension))
     {
		  
		$execut_import_img = "yes";
          
     }
	}
	}

	if(empty($execut_import_img)){

		$qx = $db->prepare("INSERT INTO blog_poste (auteur,fonds,titre,article,id_article,actif,langue) VALUES (:auteur,:fonds,:titre,:article,:id_article,:actif,:langue)");
		$qx->execute([
		'auteur' => $_SESSION['pseudo'],
		'fonds' => "../img/fonds/fond_blog.jpg",
		'titre' => $_POST['titre'],
		'article' => $_POST['message'],
		'id_article' => $id,
		'actif' => 'yes',
		'langue' => $set_language
		]);
		
		$dx = $db->prepare("INSERT INTO search_data(element,article,contenue,auteur,link,id_sujet,actif) VALUES (:element,:article,:contenue,:auteur,:link,:id_sujet,:actif)");
		$dx->execute([
		'element' => 'blog',
		'article' => $_POST['titre'],
		'contenue' => $_POST['message'],
		'auteur' => $_SESSION['pseudo'],
		'link' => "blog/article.php?id_article_a_lire=".$id,
		'id_sujet' => $id,
		'actif' => "yes"
		]);
		
		echo "<p>".$message_blog_post_article."</p>";

	}else{

		$qx = $db->prepare("INSERT INTO blog_poste (auteur,fonds,titre,article,id_article,actif,langue) VALUES (:auteur,:fonds,:titre,:article,:id_article,:actif,:langue)");
		$qx->execute([
		'auteur' => $_SESSION['pseudo'],
		'fonds' => $files,
		'titre' => $_POST['titre'],
		'article' => $_POST['message'],
		'id_article' => $id,
		'actif' => 'yes',
		'langue' => $set_language
		]);
		
		$dx = $db->prepare("INSERT INTO search_data(element,article,contenue,auteur,link,id_sujet,actif) VALUES (:element,:article,:contenue,:auteur,:link,:id_sujet,:actif)");
		$dx->execute([
		'element' => 'blog',
		'article' => $_POST['titre'],
		'contenue' => $_POST['message'],
		'auteur' => $_SESSION['pseudo'],
		'link' => "blog/lire_article.php?id_article_a_lire=".$id,
		'id_sujet' => $id,
		'actif' => "yes"
		]);

		$ex = $db->prepare("INSERT INTO users_data(auteur,data_link,type,id_data) VALUES(:auteur,:data_link,:type,:id_data)");
		$ex->execute([
		'auteur' => $_SESSION['pseudo'],
		'data_link' => $dossier . $fichier . $extension,
		'type'=> 'picture',
        'id_data' => $id
		]);
		
		echo "<p>".$message_blog_post_article."</p>";

	}
	
	}else{
	echo "<p>".$message_form_erreur_champs_2."</p>";
	}
	}else{
	echo "<p>".$message_form_erreur_champs_1."</p>";
	}
	}else{
	
	?>
	<form enctype='multipart/form-data' method="post">
	<h2><?=$titre_form_titre_article?></h2>
	<input type="text" name="titre" maxlength="50" size="50" style="width:100%;" placeholder="<?=$text_form_titre_article?>" required>
	<br/><br/>
	<h2><?=$titre_form_image_article?></h2>
	<br/>
	<input type='hidden' name='MAX_FILE_SIZE' value='5000000' />
	<input type='file' name='file'/>
	<br/><br/>
	<h2><?=$titre_form_article?></h2>
		<input type='button' value='↩' onclick="editextcommande('undo');"/>
		<input type='button' value='↪' onclick="editextcommande('redo');"/>
		<input type='button' value='hr' onclick="editextcommande('insertHorizontalRule');"/>
		<input type='button' value='B' style="font-weight:bold;" onclick="editextcommande('bold');"/>
		<input type='button' value='I' style="font-style:italic;" onclick="editextcommande('italic');"/>
		<input type='button' value='U' style="text-decoration:underline;" onclick="editextcommande('underline');"/>
		<input type='button' value='S' style="text-decoration:line-through;" onclick="editextcommande('strikeThrough');"/>
		<select name='edit-text' onclick="editextcommande('heading', this.value);"" size='1'>
			<option value="p">Par default
			<option value="h1">Titre 1
			<option value="h2">Titre 2
			<option value="h3">Titre 3
			</select>
		<input type='button' value='Aligner à gauche' onclick="editextcommande('justifyLeft');"/>
		<input type='button' value='Centrer' onclick="editextcommande('justifyCenter');"/>
		<input type='button' value='Aligner à droite' onclick="editextcommande('justifyRight');"/>
		<input type='button' value='•' onclick="editextcommande('insertUnorderedList');"/>
		<input type='button' value='x.' onclick="editextcommande('insertOrderedList');"/>
		<input type='button' value='x²' onclick="editextcommande('superscript');"/>
		<input type="button" value="Lien" onclick="editextcommande('createLink');" />
		<input type="button" value="Image" onclick="boxImageOpen();" />
		<input type="button" value="Video" onclick="boxVideoOpen();" />
	<br/><br/>
	<div id="editeur-post" contenteditable="true"></div>
	<br/><br/>
	<input id="message" type="hidden" name="message" />
	<input type="submit" name="submit" value="<?=$text_button_poste?>" onclick="editextresult();"/>
	</form>

	<script src="../JS/editpost.js" ></script>

	<?php

	echo "<script>";
	
	if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
	{
	$qx = $db->prepare("SELECT * FROM users_data WHERE auteur=:auteur AND type=:type");
	$qx->execute([
	'type' => 'picture',
	'auteur' => $_SESSION['pseudo']
	]);
	$nb_sujets = $qx->rowCount();
	if ($nb_sujets == 0) {
	}else{

	$i = 0;

	while($result1 = $qx->fetch(PDO::FETCH_ASSOC)){

	$i++;

	echo "function addImage".$i."(){
	var divEditeur = document.getElementById('editeur-post');
	divEditeur.innerHTML += '<p></p><br/><br/><img src=".$result1['data_link']." width=350px><br/><br/><p></p>';
	boxClose();
	}";

	}
	}

	$qy = $db->prepare("SELECT * FROM users_data WHERE auteur=:auteur AND type=:type");
	$qy->execute([
	'type' => 'movie',
	'auteur' => $_SESSION['pseudo']
	]);
	$nb_sujets = $qy->rowCount();
	if ($nb_sujets == 0) {
	}else{

	$j = 0;

	while($result2 = $qy->fetch(PDO::FETCH_ASSOC)){

	$j++;

	echo "
	function addVideo".$j."(){
	var div = document.getElementById('editeur-post');
	div.innerHTML += '<p></p><video controls width=450px><source src=".$result2['data_link']." type=video/mp4></video><br/><br/><p></p>';
	boxClose();
	}";

	}
	}
	}

	echo "</script>";
	
	}

	echo "</div>";
	echo "</div>";

	}else{

	include 'aside.php';

	echo "<div id='blog-element'>";
	echo "<div class='blog-content'>";

	echo "<p>".$message_compte_undefined."</p>";

	echo "</div>";
	echo "</div>";

	}

	echo 
	"</body>
	</html>";
?>