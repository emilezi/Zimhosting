<?php

if(isset($presult['titre'])){

if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
	{
		
	?>
	
	<form method="post">
	<br/>
	<input type="button" value="B" style="font-weight:bold;" onclick="editextcommande('bold');" />
	<input type="button" value="I" style="font-style:italic;" onclick="editextcommande('italic');" />
	<input type="button" value="U" style="text-decoration:underline;" onclick="editextcommande('underline');" />
	<input type="button" value="Lien" onclick="editextcommande('createLink');" />
	<br/><br/>
	<div id="editeur" contentEditable=true></div>
	<br/><br/><br/>
	<input id="message" type="hidden" name="message" />
	<input type="submit" name="submit_txt" value="<?=$text_button_poste?>" onclick="editextresult();">
	</form>
	
	<script src="../JS/editext.js" ></script>
	
	<?php

	if (isset ($_POST['submit_txt'])) {
	if (!empty($_POST['message']) && !empty($presult['titre'])) {
		
		$id = md5(microtime(TRUE)*100000);
		
		$q = $db->prepare("INSERT INTO forum_reponses(auteur,message,correspondance_sujet,actif,id_reponses,type) VALUES(:auteur,:message,:correspondance_sujet,:actif,:id_reponses,:type)");
		$q->execute([
		'auteur' => $_SESSION['pseudo'],
		'message' => $_POST['message'],
		'correspondance_sujet'=> $presult['titre'],
		'id_reponses' => $id,
		'actif' => "yes",
		'type' => "text"
		]);

		header('Location: sujet.php?id_sujet_a_lire='.$_GET['id_sujet_a_lire']);
		exit();
	}
	else{
		echo "<p>".$message_form_erreur_champs_3."</p>";
	}
	}
	}else{
	echo "<p>".$message_forum_compte_undefined_commentaire."</p>";
	}

}

?>
