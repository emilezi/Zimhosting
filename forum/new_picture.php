<?php

if(isset($presult['titre'])){

if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
	{
		
	?>

<p><?=$titre_form_image?></p>
<hr class='hr-form'><br/>
<form enctype="multipart/form-data" action="" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
<input type="file" name="file"/>
<input type="submit" name="submit_img" value="<?=$text_button_poste?>" />
</form>

<?php
if(!empty($_POST['submit_img']))
{
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
     $erreur = '<p>'.$message_data_image_erreur1.'</p>';
}
if($taille>$taille_maxi)
{
     $erreur = '<p>'.$message_data_erreur.'</p>';
}
if(!isset($erreur))
{
     $fichier = md5(microtime(TRUE)*1000);
     if(move_uploaded_file($_FILES['file']['tmp_name'], $dossier . $fichier . $extension))
     {
          $id = md5(microtime(TRUE)*100000);

          $link = "<img src='" . $dossier . $fichier . $extension . "'>";
		
		$q1 = $db->prepare("INSERT INTO forum_reponses(auteur,message,correspondance_sujet,actif,id_reponses,type) VALUES(:auteur,:message,:correspondance_sujet,:actif,:id_reponses,:type)");
		$q1->execute([
		'auteur' => $_SESSION['pseudo'],
		'message' => $link,
		'correspondance_sujet'=> $presult['titre'],
		'id_reponses' => $id,
          'actif' => "yes",
          'type' => "img"
		]);

          $q2 = $db->prepare("INSERT INTO users_data(auteur,data_link,type,id_data) VALUES(:auteur,:data_link,:type,:id_data)");
		$q2->execute([
		'auteur' => $_SESSION['pseudo'],
		'data_link' => $dossier . $fichier . $extension,
		'type'=> 'picture',
          'id_data' => $id
		]);

		header('Location: sujet.php?id_sujet_a_lire='.$_GET['id_sujet_a_lire']);
          exit();
          
          echo '<p>'.$message_data_image_posted.'</p>';
     }
     else
     {
          echo '<p>'.$message_data_image_erreur2.'</p>';
     }
}
else
{
     echo $erreur;
}
}else{
     echo "<p>".$message_data_image_erreur3."</p>";
}
}
}else{
	echo "<p>".$message_forum_compte_undefined_image."</p>";
}

}

?>