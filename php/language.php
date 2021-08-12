<?php

if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == "en"){

    $set_language = "en";

}elseif(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == "es"){

    $set_language = "es";

}elseif(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == "de"){

    $set_language = "de";

}else{

    $set_language = "fr";

}

?>