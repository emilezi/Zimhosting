<?php 
    session_start();
	include '../php/database.php'; 
	include '../php/language.php';
	include '../php/webtxt.php';
    global $db;

	echo "<html>";
    ?>

    <head>
    <meta charset="utf-8" />
    <link rel='icon' type='image/png' href='../img/icones/zimhostingicone.png'>
    <link rel="stylesheet" href="../style.css" />
    <title><?=$titre_header_social_newposte?></title>
    </head>

    <?php

    echo "<body id=social>";
    
    echo "<div id='header'>
    <h1>
    <center>
    ".$titre_header_social_newposte."
    <center>
    </h1>
    </div>";
    
    include 'nav.php';

    include 'aside.php';

    echo "<div id='social-element'>";
     
    echo "<div class='social-content'>";
     
    if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
	{
  
	if (isset ($_POST['submit'])) {
	if (!empty($_POST['message'])) {
		
		$id = md5(microtime(TRUE)*100000);
		
	
		$q = $db->prepare("INSERT INTO sociale_poste (auteur,poste,confidentiality,actif,id_poste) VALUES (:auteur,:poste,:confidentiality,:actif,:id_poste)");
		$q->execute([
    'auteur' => $_SESSION['pseudo'],
    'poste' => $_POST['message'],
    'confidentiality' => 'friends',
    'actif' => "yes",
    'id_poste' => $id
    ]);
    
    echo "<p>".$message_social_poste."</p>";
    
    }else{
        echo "<p>".$message_form_erreur_champs_3."</p>";
    }
    }else{
	
	?>

	<form method="post">
	<div id="editeur" contentEditable=true></div>
    <br/>
    <input type="button" value="B" style="font-weight:bold;" onclick="editextcommande('bold');" />
	<input type="button" value="I" style="font-style:italic;" onclick="editextcommande('italic');" />
	<input type="button" value="U" style="text-decoration:underline;" onclick="editextcommande('underline');" />
	<input type="button" value="Lien" onclick="editextcommande('createLink');" />
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
	 
    echo "</body>
    </html>";
?>