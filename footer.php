<div id="footer" class="color-accueil">

	 <div class="footer">
	 <li><a href="conditionsite.php"> <?=$text_footer_use_condition?> </a></li>
	 <?php if(isset($_SESSION['prenom'])){if($_SESSION['class'] == "administrateur"){echo '<li><a href="admin/index.php">'.$text_footer_admin.'</a></li>';}}?>
     <?php if(isset($_SESSION['prenom'])){if($_SESSION['class'] == "administrateur"){echo "<li><a href='http://zimhosting.fr/nextcloud/'>".$text_footer_hosting_area."</a></li>";}}?>
    <li><a href="contacts.php"> <?=$text_footer_contacts?> </a></li>
    <li><a href="community.php"> <?=$text_footer_community?> </a></li>
    <li><a href="sources.php"> <?=$text_footer_sources?> </a></li>
    <li><a href="zimidoc/index.php"> Zimidoc </a></li>
	 </div>
	 
	 </div>