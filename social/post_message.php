<?php

if(isset($_GET['id_profil'])){

	if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
	{

	echo "<form method='post' style='padding:0 10px;'>
	<input type='text' name='discussions' id='discussions' placeholder='".$text_form_commentaire."' style='float:left;' required>
	<input type='submit' name='submit' value='".$text_button_poste."' style='float:right'/>
	</form>";



	if (isset($_POST['submit'])) {
	if (!empty($_POST['discussions'])){

		$message = htmlspecialchars($_POST['discussions']);
		
		$id = md5(microtime(TRUE)*100000);
		
		$t = $db->prepare("INSERT INTO sociale_discussions(emetteur,destinataire,message,actif,id_message,type) VALUES(:emetteur,:destinataire,:message,:actif,:id_message,:type)");
		$t->execute([
		'emetteur' => $_SESSION['pseudo'],
		'destinataire' => $_GET['id_profil'],
        'message' => $message,
		'actif' => 'yes',
		'id_message' => $id,
        'type' => 'text',
		]);
		header('Location: messages.php?id_profil='.$_GET['id_profil']);
	}
	}
	}

}

?>