<?php

echo "<div id='social-aside'>";

    if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {
    
    echo "<h2 class='indisplay'>".$titre_header_social."</h2>";
    echo "<hr class='indisplay'/>";
    echo "<p><a href='new_poste.php'>".$titre_header_social_newposte."</a></p>";
    echo "<p><a href='discussions.php'>Message</a></p>";
    echo "<p><a href='social_profil.php'>".$titre_header_social_profil."</a></p>";
    
   }else{
    
    echo "<h2 class='indisplay'>".$titre_header_social."</h2>
    <hr class='indisplay'/>
    <p><a href='../users/compte.php'>".$message_compte_undefined."</a></p>
    ";
	
   }

    echo "</div>";

?>