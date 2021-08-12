<?php
echo "<div id='forum-aside'>";

    if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {
    
    echo "<h2 class='indisplay'>".$titre_header_forum."</h2>
    <hr class='indisplay'/>
    <p><a href='new_sujet.php'>".$titre_header_forum_newsujet."</a></p>
    <p><a href='my_sujets.php'>".$titre_header_forum_mysujet."</a></p>
	";
    
   }else{
    
    echo "<h2 class='indisplay'>".$titre_header_forum."</h2>
    <hr class='indisplay'/>
    <p><a href='../users/compte.php'>".$message_forum_compte_undefined."</a></p>
    ";
	
   }
    
    echo "</div>";
?>