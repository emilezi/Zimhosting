<?php

function getIp()  {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else
            $ip = $_SERVER['REMOTE_ADDR'];
                    
        return $ip;
     }
     
     $ip = getIp();

    $useragent = $_SERVER['HTTP_USER_AGENT'];
    if(stristr($useragent,'Macintosh')){$machine="Mac";}
    elseif(stristr($useragent,'Win')){$machine="Windows";}

    elseif(stristr($useragent,'iPhone')){$machine="iPhone";}
    elseif(stristr($useragent,'iPod')){$machine="iPod";}
    elseif(stristr($useragent,'Android')){$machine="Android";}
    elseif(stristr($useragent,'iPad')){$machine="iPad";}

    elseif(stristr($useragent,'linux')){$machine="Linux";}
    else{$machine="inconnu";}

    if(stristr($useragent,'Chrome')){$navigateur="Chrome";}
    elseif(stristr($useragent,'Camino')){$navigateur="Camino";}
    elseif(stristr($useragent,'Firefox')){$navigateur="Firefox";}
    elseif(stristr($useragentr,'Safari')){$navigateur="Safari";}
    elseif(stristr($useragent,'MSIE')){$navigateur="Explorer";}
    elseif(stristr($useragent,'Opera')){$navigateur="Opera";}
    elseif(stristr($useragent,'Epiphany')){$navigateur="Epiphany";}
    elseif(stristr($useragent,'ChromePlus')){$navigateur="ChromePlus";}
    elseif(stristr($useragent,'Lynx')){$navigateur="Lynx";}


    else{$navigateur="inconnu";}

    /*

    $pays = geoip_country_code3_by_name('zimhosting.fr');

    if($pays == true){

    }else{
        $pays = 'inconnue';
    }

    */

    $pays = 'inconnue';

    $q = $db->prepare("SELECT * FROM ip_client WHERE ip = :ip");
    $q->execute(['ip' => $ip]);
    $result = $q->fetch();
    
if($result == true){
    
if(($result['ip'] == $ip) || ($result['appareil'] == $machine) || ($result['navigateur'] == $navigateur) || ($result['pays'] == $pays)){
    sscanf($result['lastconnexion'], "%4s-%2s-%2s-%2s", $lastannee, $lastmois, $lastjour, $lasthour);
    sscanf(date('Y-m-d h:i:s'), "%4s-%2s-%2s-%2s", $annee, $mois, $jour, $hour);
    if(($lastannee == $annee) && ($lastmois == $mois) && ($lastjour == $jour) && ($lasthour == $hour))
    {  

    }else{
    $conumber = $result['connexions'] + 1;
    $date = date('Y-m-d h:i:s');
    $q = $db->prepare("UPDATE ip_client SET connexions = :connexions, lastconnexion = :lastconnexion WHERE ip = :ip");
	$q->execute([
    'connexions' => $conumber,
    'ip' => $ip,
    'lastconnexion' => $date
   ]);
    }
}else{
    $date = date('Y-m-d h:i:s');
    $q = $db->prepare("INSERT INTO ip_client(ip,appareil,navigateur,pays,connexions,lastconnexion) VALUES(:ip,:appareil,:navigateur,:pays,:connexions,:lastconnexion)");
    $q->execute([
    'ip' => $ip,
    'appareil' => $machine,
    'navigateur'=> $navigateur,
    'pays' => $pays,
    'connexions' => '1',
    'lastconnexion' => $date
    ]);
}
}else{
    $date = date('Y-m-d h:i:s');
    $q = $db->prepare("INSERT INTO ip_client(ip,appareil,navigateur,pays,connexions,lastconnexion) VALUES(:ip,:appareil,:navigateur,:pays,:connexions,:lastconnexion)");
    $q->execute([
    'ip' => $ip,
    'appareil' => $machine,
    'navigateur'=> $navigateur,
    'pays' => $pays,
    'connexions' => '1',
    'lastconnexion' => $date
    ]);
}
?>