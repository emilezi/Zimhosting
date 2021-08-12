<?php

	if(isset($id_page)){

	if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
	{

	echo "<form method='post'>
	<p>".$titre_commentaire_message."</p>
	<input type='text' name='message' id='message' placeholder='".$text_form_commentaire."' required>
	<input type='submit' name='submit' value='".$text_button_poste."'>
	</form>";



	if (isset ($_POST['submit'])) {
	if (!empty($_POST['message'])){

		$message = htmlspecialchars ($_POST['message']);
		
		$id = md5(microtime(TRUE)*100000);
		
		$q = $db->prepare("INSERT INTO commentaire(auteur,message,id_page,actif,id_commentaire,name_page) VALUES(:auteur,:message,:id_page,:actif,:id_commentaire,:name_page)");
		$q->execute([
		'auteur' => $_SESSION['pseudo'],
		'message' => $message,
		'id_commentaire' => $id,
		'name_page' => $name_page,
		'id_page'=> $id_page,
		'actif' => "yes"
		]);
	}else {
	echo "<p>".$message_form_erreur_champs_3."</p>";
	}
	}
	}else{
	echo "<p>".$message_commentaire_commentaire_compte_undefined."</p>";
	}

	}
?>
