<?php
/**
* @author    Caspar Armster
* @copyright 2016 Caspar Armster, Freifunk Hennef/Freie Netzwerker e.V. (www.freifunk-hennef.de / www.freie-netzwerker.de)
* @license   Licensed under GPLv3
*/
function remoteFileExists($url) {
    $curl = curl_init($url);

    //don't fetch the actual page, you only want to check the connection is ok
    curl_setopt($curl, CURLOPT_NOBODY, true);

    //do request
    $result = curl_exec($curl);

    $ret = false;

    //if request did not fail
    if ($result !== false) {
        //if request was ok, check response code
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);  

        if ($statusCode == 200) {
            $ret = true;
        }
    }

    curl_close($curl);

    return $ret;
}

if (filter_var($community[$community_id]["download_path"], FILTER_VALIDATE_URL) === FALSE) {
    if(!is_dir($firmware_download_path)) {
//        throw new Exception("Firmwareverzeichnis existiert nicht!");
	    throw new Exception($firmware_download_path);
    }
    $err = 0;
    $entwicklung_count = count($entwicklung);    
    $installation_count = count($installation);
    for( $i=0; $i<$entwicklung_count; $i++ ) {
        for( $j=0; $j<$installation_count; $j++ ) {
            if(is_dir($firmware_download_path.$entwicklung[$i]."/")) {
                if(is_dir($firmware_download_path.$entwicklung[$i]."/".$installation[$j]."/")) {
                    $variante[$entwicklung[$i]][$installation[$j]] = 1;
                    $files[$entwicklung[$i]][$installation[$j]] = array_slice(scandir($firmware_download_path.$entwicklung[$i]."/".$installation[$j]."/"), 2);
                    $file_count = count($files[$entwicklung[$i]][$installation[$j]]);
                    for( $x=0; $x<$file_count; $x++ ) {
                        if(is_dir($firmware_download_path.$entwicklung[$i]."/".$installation[$j]."/".$files[$entwicklung[$i]][$installation[$j]][$x])) {
                            array_splice($files[$entwicklung[$i]][$installation[$j]], $x, 1);
                            $x--;
                            $file_count--;
                        } else {
                            $pos = stripos($files[$entwicklung[$i]][$installation[$j]][$x], 'manifest');
                            if($pos !== false) {
                                array_splice($files[$entwicklung[$i]][$installation[$j]], $x, 1);
                                $x--;
                                $file_count--;
                            }
                        }
                    }
                }
            }
        }
    }
    for( $i=0; $i<$entwicklung_count; $i++ ) {
        for( $j=0; $j<$installation_count; $j++ ) {
            if($variante[$entwicklung[$i]][$installation[$j]] == 1) {
                $x = 0;
                while($files[$entwicklung[$i]][$installation[$j]][$x] !== false) {
                    $pos_hersteller[$entwicklung[$i]][$installation[$j]] = stripos($files[$entwicklung[$i]][$installation[$j]][$x], "tp-link");
                    if ($pos_hersteller[$entwicklung[$i]][$installation[$j]] !== false) {
                        break;
                    }
                    $x++;
                }
            } else {
                $pos_hersteller[$entwicklung[$i]][$installation[$j]] = 0;
            }
        }
    }
    $router = array();
    for( $i=0; $i<$entwicklung_count; $i++ ) {
        for( $j=0; $j<$installation_count; $j++ ) {
            if($variante[$entwicklung[$i]][$installation[$j]] == 1) {
                $file_count = count($files[$entwicklung[$i]][$installation[$j]]);
                for( $x=0; $x<$file_count; $x++) {
                    for( $y=0; $y<$anzahl_hersteller; $y++) {
                        if($pos = stripos($files[$entwicklung[$i]][$installation[$j]][$x], $hersteller[$y]['filename'], $pos_hersteller[$entwicklung[$i]][$installation[$j]]-1) !== false) {
                            $router_tmp[$x]['hersteller'] = $hersteller[$y]['name'];
                            switch($router_tmp[$x]['hersteller']) {
                                case "D-Link":
                                    $router_tmp[$x]['version'] = substr($files[$entwicklung[$i]][$installation[$j]][$x], strripos($files[$entwicklung[$i]][$installation[$j]][$x], "rev"), -4-$offset_sysupgrade[$j]);
                                    break;
                                case "GL-Inet (alt)":
                                    $router_tmp[$x]['version'] = substr($files[$entwicklung[$i]][$installation[$j]][$x], strripos($files[$entwicklung[$i]][$installation[$j]][$x], "v"), -4-$offset_sysupgrade[$j]);
                                    break;
                                case "TP-Link":
                                    $router_tmp[$x]['version'] = substr($files[$entwicklung[$i]][$installation[$j]][$x], strripos($files[$entwicklung[$i]][$installation[$j]][$x], "v"), -4-$offset_sysupgrade[$j]);
                                    break;
                                default:
                                    $router_tmp[$x]['version'] = "Alle";
                            }
                            $router_tmp[$x]['modell'] = strtoupper(substr($files[$entwicklung[$i]][$installation[$j]][$x], $pos_hersteller[$entwicklung[$i]][$installation[$j]]+$hersteller[$y]['offset_modell'], strripos($files[$entwicklung[$i]][$installation[$j]][$x], ".", -4)-strlen($files[$entwicklung[$i]][$installation[$j]][$x])-strlen($router_tmp[$x]['version'])+$hersteller[$y]['offset_version']-$offset_sysupgrade[$j]));
                        }
                    }
                    if(isset($router_tmp[$x]['hersteller']) != true) {
//                        $error_text[$err]="Unbekannten Hersteller im Dateinamen gefunden, bitte Script updaten! (".$files[$entwicklung[$i]][$installation[$j]][$x].")";
                        $err++;
                    } else {
                        $router_neu = 1;
                        $router_count = count($router);
                        for( $z=0; $z<$router_count; $z++) {
                            if(isset($router[$z])) {
                                if((strcasecmp($router[$z]->hersteller, $router_tmp[$x]['hersteller']) == 0) && (strcasecmp($router[$z]->modell, $router_tmp[$x]['modell']) == 0) && (strcasecmp($router[$z]->version, $router_tmp[$x]['version']) == 0)) {
                                    $entinst = $entwicklung[$i].$installation[$j];
                                    $entinstlink = $entwicklung[$i].$installation[$j]."link";
                                    $router[$z]->$entinst = 1;
                                    $router[$z]->$entinstlink = $firmware_download_path.$entwicklung[$i]."/".$installation[$j]."/".$files[$entwicklung[$i]][$installation[$j]][$x];
                                    $router_neu = 0;
                                    break;
                                }
                            }
                        }
                        if($router_neu == 1) {
                            $z = count($router);
                            $router[$z] = new ffrouter();
                            $router[$z]->hersteller = $router_tmp[$x]['hersteller'];
                            $router[$z]->version = $router_tmp[$x]['version'];
                            $router[$z]->modell = $router_tmp[$x]['modell'];
                            $entinst = $entwicklung[$i].$installation[$j];
                            $entinstlink = $entwicklung[$i].$installation[$j]."link";
                            $router[$z]->$entinst = 1;
                            $router[$z]->$entinstlink = $firmware_download_path.$entwicklung[$i]."/".$installation[$j]."/".$files[$entwicklung[$i]][$installation[$j]][$x];
                        }
                    }
                }
            }
            $router_tmp = array();
        }
    }
}else{
    //Check if URL is reachable
    if (!remoteFileExists($firmware_download_path)) {
        throw new Exception("Firmwareverzeichnis offline oder nicht existent!");
    }
    $err = 0;
    $entwicklung_count = count($entwicklung);    
    $installation_count = count($installation);
    for( $i=0; $i<$entwicklung_count; $i++ ) {
        if (remoteFileExists($firmware_download_path.$entwicklung[$i]."/")) {
            for( $j=0; $j<$installation_count; $j++ ) {
                //Check if URL has index file (refer to https://forums.phpfreaks.com/topic/112764-using-scandir-on-other-websites/?p=579166  <- scandir has problem with index files)
                if ((@remoteFileExists($firmware_download_path.$entwicklung[$i]."/".$installation[$j]."/index.htm"))||(@remoteFileExists($firmware_download_path.$entwicklung[$i]."/".$installation[$j]."/index.html"))||(@remoteFileExists($firmware_download_path.$entwicklung[$i]."/".$installation[$j]."/index.php"))) {
                    throw new Exception("Firmwareverzeichnis darf keine index files besitzen!");
                }
                $variante[$entwicklung[$i]][$installation[$j]] = 1;
                preg_match_all('/href=[\'"]?([^\'" >]+)/', file_get_contents($firmware_download_path.$entwicklung[$i]."/".$installation[$j]."/"), $files_in_HTTP);
                foreach($files_in_HTTP["0"] as $key=>$value){
                    if ((strpos($value, 'manifest') !== false) || (strpos($value, '?C=M;O=A') !== false) || (strpos($value, '?C=S;O=A') !== false) || (strpos($value, '?C=S;O=A') !== false)) {
                        unset($files_in_HTTP["0"][$key]);
                    }
                }
                foreach($files_in_HTTP["0"] as $key=>$value){
                    $files_in_HTTP["0"][$key]=substr($value, 6);
                }
                $files[$entwicklung[$i]][$installation[$j]] = array_slice($files_in_HTTP["0"], 1);
            }
        }
    }

    for( $i=0; $i<$entwicklung_count; $i++ ) {
        for( $j=0; $j<$installation_count; $j++ ) {
            if($variante[$entwicklung[$i]][$installation[$j]] == 1) {
                $x = 0;
                while($files[$entwicklung[$i]][$installation[$j]][$x] !== false) {
                    $pos_hersteller[$entwicklung[$i]][$installation[$j]] = stripos($files[$entwicklung[$i]][$installation[$j]][$x], "tp-link");
                    if ($pos_hersteller[$entwicklung[$i]][$installation[$j]] !== false) {
                        break;
                    }
                    $x++;
                }
            } else {
                $pos_hersteller[$entwicklung[$i]][$installation[$j]] = 0;
            }
        }
    }
    $router = array();
    for( $i=0; $i<$entwicklung_count; $i++ ) {
        for( $j=0; $j<$installation_count; $j++ ) {
            if($variante[$entwicklung[$i]][$installation[$j]] == 1) {
                $file_count = count($files[$entwicklung[$i]][$installation[$j]]);
                for( $x=0; $x<$file_count; $x++) {
                    $anzahl_hersteller = count($hersteller);
                    for( $y=0; $y<$anzahl_hersteller; $y++) {
                        if($pos = stripos($files[$entwicklung[$i]][$installation[$j]][$x], $hersteller[$y]['filename'], $pos_hersteller[$entwicklung[$i]][$installation[$j]]-1) !== false) {
                            $router_tmp[$x]['hersteller'] = $hersteller[$y]['name'];
                            switch($router_tmp[$x]['hersteller']) {
                                case "D-Link":
                                    $router_tmp[$x]['version'] = substr($files[$entwicklung[$i]][$installation[$j]][$x], strripos($files[$entwicklung[$i]][$installation[$j]][$x], "rev"), -4-$offset_sysupgrade[$j]);
                                    break;
                                case "GL-Inet (alt)":
                                    $router_tmp[$x]['version'] = substr($files[$entwicklung[$i]][$installation[$j]][$x], strripos($files[$entwicklung[$i]][$installation[$j]][$x], "v"), -4-$offset_sysupgrade[$j]);
                                    break;
                                case "TP-Link":
                                    $router_tmp[$x]['version'] = substr($files[$entwicklung[$i]][$installation[$j]][$x], strripos($files[$entwicklung[$i]][$installation[$j]][$x], "v"), -4-$offset_sysupgrade[$j]);
                                    break;
                                default:
                                    $router_tmp[$x]['version'] = "Alle";
                            }
                            $router_tmp[$x]['modell'] = strtoupper(substr($files[$entwicklung[$i]][$installation[$j]][$x], $pos_hersteller[$entwicklung[$i]][$installation[$j]]+$hersteller[$y]['offset_modell'], strripos($files[$entwicklung[$i]][$installation[$j]][$x], ".", -4)-strlen($files[$entwicklung[$i]][$installation[$j]][$x])-strlen($router_tmp[$x]['version'])+$hersteller[$y]['offset_version']-$offset_sysupgrade[$j]));
                        }
                    }
                    if(isset($router_tmp[$x]['hersteller']) != true) {
                        $error_text[$err]="Unbekannten Hersteller im Dateinamen gefunden, bitte Script updaten! (".$files[$entwicklung[$i]][$installation[$j]][$x].")";
                        $err++;
                    } else {
                        $router_neu = 1;
                        $router_count = count($router);
                        for( $z=0; $z<$router_count; $z++) {
                            if(isset($router[$z])) {
                                if((strcasecmp($router[$z]->hersteller, $router_tmp[$x]['hersteller']) == 0) && (strcasecmp($router[$z]->modell, $router_tmp[$x]['modell']) == 0) && (strcasecmp($router[$z]->version, $router_tmp[$x]['version']) == 0)) {
                                    $entinst = $entwicklung[$i].$installation[$j];
                                    $entinstlink = $entwicklung[$i].$installation[$j]."link";
                                    $router[$z]->$entinst = 1;
                                    $router[$z]->$entinstlink = $firmware_download_path.$entwicklung[$i]."/".$installation[$j]."/".$files[$entwicklung[$i]][$installation[$j]][$x];
                                    $router_neu = 0;
                                    break;
                                }
                            }
                        }
                        if($router_neu == 1) {
                            $z = count($router);
                            $router[$z] = new ffrouter();
                            $router[$z]->hersteller = $router_tmp[$x]['hersteller'];
                            $router[$z]->version = $router_tmp[$x]['version'];
                            $router[$z]->modell = $router_tmp[$x]['modell'];
                            $entinst = $entwicklung[$i].$installation[$j];
                            $entinstlink = $entwicklung[$i].$installation[$j]."link";
                            $router[$z]->$entinst = 1;
                            $router[$z]->$entinstlink = $firmware_download_path.$entwicklung[$i]."/".$installation[$j]."/".$files[$entwicklung[$i]][$installation[$j]][$x];
                        }
                    }
                }
            }
            $router_tmp = array();
        }
    }
}
$router_count = count($router);
for( $i=0; $i<$router_count; $i++ ) { // Routerbilder einbauen
    if(is_dir(strtolower("router_images/".$router[$i]->hersteller))) {
        if(is_file(strtolower("router_images/".$router[$i]->hersteller."/".$router[$i]->modell."-".$router[$i]->version.".jpg"))) {
            $router[$i]->imagefront = strtolower("router_images/".$router[$i]->hersteller."/".$router[$i]->modell."-".$router[$i]->version.".jpg");
        } else {
            $router[$i]->imagefront = "router_images/keinbild.jpg";
        }
        if(is_file(strtolower("router_images/".$router[$i]->hersteller."/".$router[$i]->modell."-".$router[$i]->version."_back.jpg"))) {
            $router[$i]->imageback = strtolower("router_images/".$router[$i]->hersteller."/".$router[$i]->modell."-".$router[$i]->version."_back.jpg");
        } else {
            $router[$i]->imageback = "router_images/keinbild.jpg";
        }
    } else {
        $router[$i]->imagefront = "router_images/keinbild.jpg";
        $router[$i]->imageback = "router_images/keinbild.jpg";
    }
}
