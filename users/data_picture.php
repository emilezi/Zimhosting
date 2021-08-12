<script>
function boxImageOpen(){
	var div = document.getElementById('box-data');
	var dialogueBox1 = document.createElement('div');
	dialogueBox1.id = 'dialogue-box';
	var dialogueBox2 = document.createElement('div');
	dialogueBox2.classList = 'dialogue-box';
		
	<?php
	if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
	{
	$q = $db->prepare("SELECT * FROM users_data WHERE auteur=:auteur AND type=:type");
	$q->execute([
	'type' => 'picture',
	'auteur' => $_SESSION['pseudo']
	]);
	$nb_sujets = $q->rowCount();
	  
	if ($nb_sujets == 0) {

	echo "dialogueBox2.innerHTML += '<p>".$message_data_image_undefined_1."</p>';";

	}else{

	echo "var boxPicture = document.createElement('div');
	boxPicture.classList = 'boxpicture';";

	$i = 0;

	while($result = $q->fetch(PDO::FETCH_ASSOC)){
	
	$i++;

	echo "boxPicture.innerHTML += '<img src=".$result['data_link']." class=picture width=250px onclick=addImage".$i."();>';";

	}

	echo "dialogueBox2.appendChild(boxPicture);";

	}
	}

	echo "dialogueBox2.innerHTML += '<div class=dialogue-box-btn><form action=../users/my_picture.php><button type=submit formaction=../users/my_picture.php style=height:35px;>".$text_button_import."</button></form><button onclick=boxClose(); style=height:35px;>".$text_button_cancel."</button></div>';";

	?>
	dialogueBox1.appendChild(dialogueBox2);
	div.appendChild(dialogueBox1);
}
function boxClose(){
  document.getElementById('box-data').innerHTML = "";
  }
</script>