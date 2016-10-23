<?php
/**
* @author    Caspar Armster
* @copyright 2016 Caspar Armster, Freifunk Hennef/Freie Netzwerker e.V. (www.freifunk-hennef.de / www.freie-netzwerker.de)
* @license   Licensed under GPLv3
*/
if (filter_var($community[$community_id]["download_path"], FILTER_VALIDATE_URL) === FALSE) {
    if(!is_dir($firmware_download_path)) {
        throw new Exception("Firmwareverzeichnis existiert nicht!");
    }
    $err = 0;
    for( $i=0; $i<count($entwicklung); $i++ ) {
        for( $j=0; $j<count($installation); $j++ ) {
            if(is_dir($firmware_download_path.$entwicklung[$i]."/")) {
                if(is_dir($firmware_download_path.$entwicklung[$i]."/".$installation[$j]."/")) {
                    $variante[$entwicklung[$i]][$installation[$j]] = 1;
                    $files[$entwicklung[$i]][$installation[$j]] = array_slice(scandir($firmware_download_path.$entwicklung[$i]."/".$installation[$j]."/"), 2);
                    for( $x=0; $x<count($files[$entwicklung[$i]][$installation[$j]]); $x++ ) {
                        if(is_dir($firmware_download_path.$entwicklung[$i]."/".$installation[$j]."/".$files[$entwicklung[$i]][$installation[$j]][$x])) {
                            array_splice($files[$entwicklung[$i]][$installation[$j]], $x, 1);
                            $x--;
                        } else {
                            $pos = stripos($files[$entwicklung[$i]][$installation[$j]][$x], 'manifest');
                            if($pos !== false) {
                                array_splice($files[$entwicklung[$i]][$installation[$j]], $x, 1);
                                $x--;
                            }
                        }
                    }
                }
            }
        }
    }
    for( $i=0; $i<count($entwicklung); $i++ ) {
        for( $j=0; $j<count($installation); $j++ ) {
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
    for( $i=0; $i<count($entwicklung); $i++ ) {
        for( $j=0; $j<count($installation); $j++ ) {
            if($variante[$entwicklung[$i]][$installation[$j]] == 1) {
                for( $x=0; $x<count($files[$entwicklung[$i]][$installation[$j]]); $x++) {
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
                        for( $z=0; $z<count($router); $z++) {
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
    if (!@fopen($firmware_download_path,"r")) {
        throw new Exception("Firmwareverzeichnis offline oder nicht existent!");
    }
    
    //Check if URL has index file (refer to https://forums.phpfreaks.com/topic/112764-using-scandir-on-other-websites/?p=579166  <- scandir has problem with index files)
    if ((@fopen($firmware_download_path."/index.htm","r"))||(@fopen($firmware_download_path."/index.html","r"))||(@fopen($firmware_download_path."/index.php","r"))) {
        throw new Exception("Firmwareverzeichnis darf keine index files besitzen!");
    }
    
    $err = 0;
    for( $i=0; $i<count($entwicklung); $i++ ) {
        for( $j=0; $j<count($installation); $j++ ) {
            if(is_dir($firmware_download_path.$entwicklung[$i]."/")) {
                if(is_dir($firmware_download_path.$entwicklung[$i]."/".$installation[$j]."/")) {
                    //Check if URL has index file (refer to https://forums.phpfreaks.com/topic/112764-using-scandir-on-other-websites/?p=579166  <- scandir has problem with index files)
                    if ((@fopen($firmware_download_path.$entwicklung[$i]."/".$installation[$j]."/index.htm","r"))||(@fopen($firmware_download_path.$entwicklung[$i]."/".$installation[$j]."/index.html","r"))||(@fopen($firmware_download_path.$entwicklung[$i]."/".$installation[$j]."/index.php","r"))) {
                        throw new Exception("Firmwareverzeichnis darf keine index files besitzen!");
                    }
                    $variante[$entwicklung[$i]][$installation[$j]] = 1;
                    $files[$entwicklung[$i]][$installation[$j]] = array_slice(scandir($firmware_download_path.$entwicklung[$i]."/".$installation[$j]."/"), 2);
                    for( $x=0; $x<count($files[$entwicklung[$i]][$installation[$j]]); $x++ ) {
                        if(is_dir($firmware_download_path.$entwicklung[$i]."/".$installation[$j]."/".$files[$entwicklung[$i]][$installation[$j]][$x])) {
                            array_splice($files[$entwicklung[$i]][$installation[$j]], $x, 1);
                            $x--;
                        } else {
                            $pos = stripos($files[$entwicklung[$i]][$installation[$j]][$x], 'manifest');
                            if($pos !== false) {
                                array_splice($files[$entwicklung[$i]][$installation[$j]], $x, 1);
                                $x--;
                            }
                        }
                    }
                }
            }
        }
    }
    for( $i=0; $i<count($entwicklung); $i++ ) {
        for( $j=0; $j<count($installation); $j++ ) {
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
    for( $i=0; $i<count($entwicklung); $i++ ) {
        for( $j=0; $j<count($installation); $j++ ) {
            if($variante[$entwicklung[$i]][$installation[$j]] == 1) {
                for( $x=0; $x<count($files[$entwicklung[$i]][$installation[$j]]); $x++) {
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
                        for( $z=0; $z<count($router); $z++) {
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

for( $i=0; $i<count($router); $i++ ) { // Routerbilder einbauen
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
