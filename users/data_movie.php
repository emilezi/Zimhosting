<script>
function boxVideoOpen(){
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
	'type' => 'movie',
	'auteur' => $_SESSION['pseudo']
	]);
	$nb_sujets = $q->rowCount();
	  
	if ($nb_sujets == 0) {

	echo "dialogueBox2.innerHTML += '<p>".$message_data_movie_undefined_1."</p>';";

	}else{

	echo "var boxMovie = document.createElement('div');
	boxMovie.classList = 'boxmovie';";

	$j = 0;
	
	while($result = $q->fetch(PDO::FETCH_ASSOC)){
	
	$j++;

	echo "boxMovie.innerHTML += '<video width=250px poster onclick=addVideo".$i."();><source src=".$result['data_link']." type=video/mp4></video>';";

	}

	echo "dialogueBox2.appendChild(boxMovie);";

	}
	}

	echo "dialogueBox2.innerHTML += '<div class=dialogue-box-btn><form action=../users/my_movie.php><button type=submit formaction=../users/my_movie.php style=height:35px;>".$text_button_import."</button></form><button onclick=boxClose(); style=height:35px;>".$text_button_cancel."</button></div>';";

	?>
	dialogueBox1.appendChild(dialogueBox2);
	div.appendChild(dialogueBox1);
}
function boxClose(){
  document.getElementById('box-data').innerHTML = "";
  }
</script>