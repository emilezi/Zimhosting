<?php

	if(isset($id_page)){

	echo "<h2>".$titre_commentaire."</h2>";

	include '../php/database.php';
	global $db;

	$q = $db->prepare("SELECT * FROM commentaire WHERE id_page=:id_page AND actif=:actif");
	$q->execute([
		'id_page'=> $id_page,
		'actif' => "yes"
		]);
	$nb_sujets = $q->rowCount();

	if ($nb_sujets == 0) {
	echo '<p>'.$message_commentaire_undefined.'</p>';
	}
	else {
	
	while($result = $q->fetch(PDO::FETCH_ASSOC)){
	
	echo "<p>" . $result['auteur'] . "<br/><p>";
	
	echo "<p>" . $result['message'] . "<br/><br/><p>";
	}
	}
	
	}

?>
