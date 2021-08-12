<?php

echo "<div id='blog-aside'>";

    
    if((isset($_SESSION['pseudo'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['nom'])))
   {
    
    echo "<h2 class='indisplay'>".$titre_header_blog."</h2>
    <hr class='indisplay'/>
    <p><a href='new_article.php'>".$titre_header_blog_newarticle."</a></p>
    <p><a href='my_article.php'>".$titre_header_blog_myarticle."</a></p>
	";
    
   }else{
    
    echo "<h2 class='indisplay'>".$titre_header_blog."</h2>
    <hr class='indisplay'/>
    <p><a href='../users/compte.php'>".$message_blog_compte_undefined."</a></p>
    ";
	
   }

    echo "</div>";

?>