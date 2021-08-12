<?php
	session_start();
	include 'php/database.php'; 
	include 'php/infoclient.php';
	include 'php/language.php';
	include 'php/webtxt.php';
	global $db;

	echo "<html>";

	echo
	"<head>
   <meta charset='utf-8' />
   <link rel='icon' type='image/png' href='img/icones/zimhostingicone.png'>
   <link rel='stylesheet' href='style.css' />
   <title>".$titre_header_zimhosting_contacts."</title>
   </head>";
    
    echo "<body id=accueil>";
    
    echo "<div id='header'>
    <h1>
    <center>
    ".$titre_header_zimhosting_contacts."
    <center>
    </h1>
    </div>";
    
    include 'nav.php';
    
    echo "<div class='contenue-large'>";
  
	 if (isset ($_POST['submit'])) {
	 if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['commentaire'])) {
	$commentaire = htmlspecialchars($_POST['commentaire']);
	 if (preg_match("#^[a-z0-9.]+@[a-z0-9.]+$#i", $_POST['email']) && preg_match("#^[^<>]+$#i", $_POST['prenom']) && preg_match("#^[^<>]+$#i", $_POST['nom']))
	 {
	
		$id = md5(microtime(TRUE)*100000);
		
	
		$q = $db->prepare("INSERT INTO avis (nom,prenom,email,commentaire,id_avis,repondue) VALUES (:nom,:prenom,:email,:commentaire,:id_avis,:repondue)");
		$q->execute([
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'email' => $_POST['email'],
    'commentaire' => $commentaire,
    'repondue' => "no",
    'id_avis' => $id
    ]);
	echo "<h2>".$titre_compte_information."</h2>";
	echo "<hr/>";
	echo "<p>Votre avis a bien été pris en compte</p>";
		
		exit;
		
	 }else{
	echo "<h2>".$titre_compte_information."</h2>";
	echo "<hr/>";
	echo "<p>".$message_form_erreur_champs_2."</p>";
	 }
		}else{
		echo "<h2>".$titre_compte_information."</h2>";
		echo "<hr/>";
		echo "<p>".$message_form_erreur_champs_1."</p>";
		}		
		}else{
		
	 echo "<h2>".$titre_zimhosting_contacts_post."</h2>";
	 
	 echo"<hr/><br/><br/><br/>";
	 
	 echo "<div class='center'>";

	 echo "<form method='post'>
	 <input type='text' name='prenom' maxlength='50' size='50' placeholder='".$text_form_firstname."' required>
	 <br/><br/>
	 <input type='text' name='nom' maxlength='50' size='50' placeholder='".$text_form_lastname."' required>
	 <br/><br/>
	 <input type='email' name='email' maxlength='50' size='50' placeholder='".$text_form_mail."' required>
	 <br/><br/>
	 <p>".$titre_form_sujet."<p>
	 <textarea name='commentaire' cols='50' rows='10' placeholder='".$text_form_commentaire."' required></textarea>
	 <br/><br/>
	 <input type='submit' name='submit' value='".$text_button_poste."'>
	 </form>";

	 echo "<br/><br/>";


	 echo "<h2>".$titre_zimhosting_contacts_coordinate."</h2>";
	 
	 echo"<hr/>";
    
	 echo "<p>administrateur@zimhosting.fr</p>";
	 
	 echo "</div>";

	 }
	 

	 echo "</div>";

	 include 'footer.php';

	 echo 
	 "</body>
	 </html>";

?>