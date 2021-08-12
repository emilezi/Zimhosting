<div id='nav' class='color-zdg'>
    
	 <ul class="topnav">
    
    <li class="nav">
    
    <a href="../index.php"> <?=$text_nav_home?> </a>
    
    </li>
    
    <li class="nav">
    
    <a href="../forum/index.php"> <?=$text_nav_forum?> </a>
    
    <ul class="nav-content" style='background-color: #a19e97;'>
    <li><a href="../forum/my_sujets.php"> <?=$text_nav_forum_mysujet?> </a></li>
    <li><a href="../forum/new_sujet.php"> <?=$text_nav_forum_newsujet?> </a></li>
    </ul>
    
    </li>
    
    <li class="nav">
    
    <a href="../geek/index.php"> <?=$text_nav_zdg?> </a>
    <ul class="nav-content" style='background-color: #a19e97;'>
    <li><a href="https://www.youtube.com/channel/UCHAM5J1G3PEqnlFgi_YdL1A"><?=$text_nav_zdg_youtube?></a></li>
    </ul>
    
    </li>
    
    <li class="nav">
    
    <a href="../social/index.php"> <?=$text_nav_social?> </a>
    
    </li>
    
    <li class="nav">
    
    <a href="../game/index.php"> <?=$text_nav_game?> </a>
    
    <ul class="nav-content" style='background-color: #a19e97;'>
    <li><a href="../game/hextris/"> Hextris </a></li>
    <li><a href="../game/snake/"> Snake </a></li>
    </ul>
    
    </li>
    
    <li class="nav">
    
    <a href="../blog/index.php"> <?=$text_nav_blogs?> </a>
    
    </li>
    
    <li class="nav">
    
    <a href="../users/compte.php"> <?=$text_nav_compte?> </a>
    
    </li>
    
    <div id='searchbox'>
    <form id='searchbox' method='get' action='../search.php'>
    <input type="search" name='q' size='15' placeholder='<?=$text_form_q?>' style='width:250px;' />
    <input id='search-submit' type='submit' value='Search' />
    </form>
    </div>
    
	 </ul>
    
	 <ul class="topnav-responsive">
    
    <a href="../index.php" class="active"><?=$text_nav_site?></a>
    </a>
    
    <a class="icon" onclick="display1()">
    <div class="burger">
    <span></span>
    </div>
    </a>
    <div class="topnav-responsive" id="links1" style='background-color: #a19e97;'>
    <li><a onclick="display2()"> <?=$text_nav_about?> </a></li>
    <li><a href="../forum/index.php"> <?=$text_nav_forum?> </a></li>
    <li><a href="../geek/index.php"> <?=$text_nav_zdg?> </a></li>
    <li><a href="../social/index.php"> <?=$text_nav_social?> </a></li>
    <li><a href="../game/index.php"> <?=$text_nav_game?> </a></li>
    <li><a href="../users/compte.php"> <?=$text_nav_compte?> </a></li>
    <li><a href="../blog/index.php"> <?=$text_nav_blogs?> </a></li>
    <li><a href="../zimidoc/index.php"> Zimidoc </a></li>
  	</div>
    <div class="topnav-responsive" id="links2" style='background-color: #a19e97;'>
    <li><a href="../conditionsite.php"> <?=$text_footer_use_condition?> </a></li>
    <li><a href="../contacts.php"> <?=$text_footer_contacts?> </a></li>
    <li><a href="../community.php"> <?=$text_footer_community?> </a></li>
    <li><a href="../sources.php"> <?=$text_footer_sources?> </a></li>
    </div>
  
	 </ul>

 	 </div>

	 <script src="../JS/burger.js" ></script>