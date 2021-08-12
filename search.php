<?php
session_start();
include 'php/database.php'; 
include 'php/infoclient.php';
include 'php/language.php';
include 'php/webtxt.php';
global $db;
?>
<html>
    <head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="img/icones/zimhostingicone.png">
    <link rel="stylesheet" href="style.css"/>
    <title><?=$titre_header_zimhosting_search?></title>
    </head>
    
    <body id=accueil>

    <div id="header">
    
    <center><h1><?=$titre_header_zimhosting_search?></h1></center>
    
    </div>
    
    <?php include 'nav.php';
  
  if(isset($_GET['q']) && !empty($_GET['q'])) {
    $q = htmlspecialchars($_GET['q']);
    $q1 = $db->prepare("SELECT * FROM search_data WHERE element=:element AND actif=:actif ORDER BY id DESC");
    $q1->execute([
       'element'=> $q,
       'actif' => 'yes'
       ]);
    $q2 = $db->prepare("SELECT * FROM search_data WHERE article=:article AND actif=:actif ORDER BY id DESC");
    $q2->execute([
        'article'=> $q,
        'actif' => 'yes'
        ]);
    $q3 = $db->prepare("SELECT * FROM search_data WHERE contenue=:contenue AND actif=:actif ORDER BY id DESC");
    $q3->execute([
        'contenue'=> $q,
        'actif' => 'yes'
        ]);
    $q4 = $db->prepare("SELECT * FROM search_data WHERE auteur=:auteur AND actif=:actif ORDER BY id DESC");
    $q4->execute([
        'auteur'=> $q,
        'actif' => 'yes'
        ]);
    $q5 = $db->prepare("SELECT * FROM search_data WHERE link=:link AND actif=:actif ORDER BY id DESC");
    $q5->execute([
        'link'=> $q,
        'actif' => 'yes'
        ]);
    $q6 = $db->prepare("SELECT * FROM search_data WHERE data_date=:data_date AND actif=:actif ORDER BY id DESC");
    $q6->execute([
        'data_date'=> $q,
        'actif' => 'yes'
        ]);
    $q7 = $db->prepare("SELECT * FROM `search_data` WHERE `element` LIKE '%".$q."%' AND actif='yes' ORDER BY id DESC");
    $q7->execute();
		$q8 = $db->prepare("SELECT * FROM `search_data` WHERE `article` LIKE '%".$q."%' AND actif='yes' ORDER BY id DESC");
    $q8->execute();
		$q9 = $db->prepare("SELECT * FROM `search_data` WHERE `contenue` LIKE '%".$q."%' AND actif='yes' ORDER BY id DESC");
    $q9->execute();
		$q10 = $db->prepare("SELECT * FROM `search_data` WHERE `data_date` LIKE '%".$q."%' AND actif='yes' ORDER BY id DESC");
    $q10->execute();
    if($q1->rowCount() == !0) {
      $search_data = $q1;
    }elseif($q2->rowCount() == !0){
      $search_data = $q2;
    }elseif($q3->rowCount() == !0){
      $search_data = $q3;
    }elseif($q4->rowCount() == !0){
      $search_data = $q4;
    }elseif($q5->rowCount() == !0){
      $search_data = $q5;
    }elseif($q6->rowCount() == !0){
      $search_data = $q6;
    }elseif($q7->rowCount() == !0){
      $search_data = $q7;
    }elseif($q8->rowCount() == !0){
      $search_data = $q8;
    }elseif($q9->rowCount() == !0){
      $search_data = $q9;
    }else{
      $search_data = $q10;
    }
    if($search_data->rowCount() > 0) {

        echo "<div id='search'>";
        echo "<h3>".$titre_zimhosting_q_result."</h3>";
        echo"<hr/>";

      while($a = $search_data->fetch(PDO::FETCH_ASSOC)) { 
         
         echo "<a href='" . $a['link'] . "'><p>" . $message_zimhosting_q_result_categories . $a['element'] . " | " . $message_zimhosting_q_result_article . $a['article'] . " | " . $message_zimhosting_q_result_auteur . $a['auteur'] . " | " .$a['data_date']. "</p></a>";
         
       }

       echo "</div>";

        }else{ 
         echo "<div id='search'>";
         echo "<h3>".$titre_zimhosting_q_result."</h3>";
         echo"<hr/>";
         echo "<p>".$message_zimhosting_q_noresult . $_GET['q'] . "...</p>";
         echo "</div>";
    }
 }else{
   echo "<div id='search'>";

   echo "<form method='GET'>
   <input id=search-barre type='search' name='q' placeholder='".$message_zimhosting_q."' style='float:left; width:85%;' required/>
   <input type='submit' value='".$text_button_validate."' style='float:right' />
  </form>";

  echo "<br/>";

  echo "</div>";

 }

 ?>
	 
    </body>
</html>
