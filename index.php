<?php
/**
* @author    Caspar Armster
* @copyright 2016 Caspar Armster, Freifunk Hennef
* @license   Licensed under GPLv3
* 
*/
	error_reporting (E_ALL | E_STRICT);   
    ini_set ('display_errors', 'On');
    require_once('config.inc.php');
	
	echo <<<EOT
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Freifunk Hennef Firmware Downloadseite</title>

    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
EOT;

	try {
		if(!is_dir($firmware_download_path)) {
			throw new Exception("Firmwareverzeichnis existiert nicht!");
		}
		if(is_dir($firmware_download_path."beta/")) {
			if(is_dir($firmware_download_path."beta/factory/")) {
				$variante['beta']['factory'] = 1;
				$files['beta']['factory'] = array_slice(scandir($firmware_download_path."beta/factory/"), 2);
				for( $i=0; $i<count($files['beta']['factory']); $i++ ) {
					$pos = stripos($files['beta']['factory'][$i], 'manifest');
					if($pos !== false) {
						array_splice($files['beta']['factory'], $i, 1);
						break;
					}
				}
			}
			if(is_dir($firmware_download_path."beta/sysupgrade/")) {
				$variante['beta']['sysupgrade'] = 1;
				$files['beta']['sysupgrade'] = array_slice(scandir($firmware_download_path."beta/sysupgrade/"), 2);
				for( $i=0; $i<count($files['beta']['sysupgrade']); $i++ ) {
					$pos = stripos($files['beta']['sysupgrade'][$i], 'manifest');
					if($pos !== false) {
						array_splice($files['beta']['sysupgrade'], $i, 1);
						break;
					}
				}
			}
		}
		if(is_dir($firmware_download_path."broken/")) {
			if(is_dir($firmware_download_path."broken/factory/")) {
				$variante['broken']['factory'] = 1;
				$files['broken']['factory'] = array_slice(scandir($firmware_download_path."broken/factory/"), 2);
				for( $i=0; $i<count($files['broken']['factory']); $i++ ) {
					$pos = stripos($files['broken']['factory'][$i], 'manifest');
					if($pos !== false) {
						array_splice($files['broken']['factory'], $i, 1);
						break;
					}
				}
			}
			if(is_dir($firmware_download_path."broken/sysupgrade/")) {
				$variante['broken']['sysupgrade'] = 1;
				$files['broken']['sysupgrade'] = array_slice(scandir($firmware_download_path."broken/sysupgrade/"), 2);
				for( $i=0; $i<count($files['broken']['sysupgrade']); $i++ ) {
					$pos = stripos($files['broken']['sysupgrade'][$i], 'manifest');
					if($pos !== false) {
						array_splice($files['broken']['sysupgrade'], $i, 1);
						break;
					}
				}
			}
		}
		if(is_dir($firmware_download_path."experimental/")) {
			if(is_dir($firmware_download_path."experimental/factory/")) {
				$variante['experimental']['factory'] = 1;
				$files['experimental']['factory'] = array_slice(scandir($firmware_download_path."experimental/factory/"), 2);
				for( $i=0; $i<count($files['experimental']['factory']); $i++ ) {
					$pos = stripos($files['experimental']['factory'][$i], 'manifest');
					if($pos !== false) {
						array_splice($files['experimental']['factory'], $i, 1);
						break;
					}
				}
			}
			if(is_dir($firmware_download_path."experimental/sysupgrade/")) {
				$variante['experimental']['sysupgrade'] = 1;
				$files['experimental']['sysupgrade'] = array_slice(scandir($firmware_download_path."experimental/sysupgrade/"), 2);
				for( $i=0; $i<count($files['experimental']['sysupgrade']); $i++ ) {
					$pos = stripos($files['experimental']['sysupgrade'][$i], 'manifest');
					if($pos !== false) {
						array_splice($files['experimental']['sysupgrade'], $i, 1);
						break;
					}
				}
			}
		}
		if(is_dir($firmware_download_path."stable/")) {
			if(is_dir($firmware_download_path."stable/factory/")) {
				$variante['stable']['factory'] = 1;
				$files['stable']['factory'] = array_slice(scandir($firmware_download_path."stable/factory/"), 2);
				for( $i=0; $i<count($files['stable']['factory']); $i++ ) {
					$pos = stripos($files['stable']['factory'][$i], 'manifest');
					if($pos !== false) {
						array_splice($files['stable']['factory'], $i, 1);
						break;
					}
				}
			}
			if(is_dir($firmware_download_path."stable/sysupgrade/")) {
				$variante['stable']['sysupgrade'] = 1;
				$files['stable']['sysupgrade'] = array_slice(scandir($firmware_download_path."stable/sysupgrade/"), 2);
				for( $i=0; $i<count($files['stable']['sysupgrade']); $i++ ) {
					$pos = stripos($files['stable']['sysupgrade'][$i], 'manifest');
					if($pos !== false) {
						array_splice($files['stable']['sysupgrade'], $i, 1);
						break;
					}
				}
			}
		}
		if($variante['stable']['factory'] == 1) {
			$i = 0;
			while($files['stable']['factory'][$i] !== false) {
				$pos_hersteller = stripos($files['stable']['factory'][$i], "tp-link");
				if ($pos_hersteller !== false) {
					break;
				}
				$i++;
			}
		} else {
			throw new Exception("Konnte nicht herausfinden wo sich der Hersteller im Dateinamen befindet!");
		}
		if($variante['beta']['factory'] == 1) {
			for( $i=0; $i<count($files['beta']['factory']); $i++) {
				if($pos = stripos($files['beta']['factory'][$i], "alfa", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Alfa";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['factory'][$i], $pos_hersteller+3, strlen($files['beta']['factory'][$i])-$pos_hersteller-7));
				}
				if($pos = stripos($files['beta']['factory'][$i], "allnet", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Allnet";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['factory'][$i], $pos_hersteller+5, strlen($files['beta']['factory'][$i])-$pos_hersteller-9));
				}
				if($pos = stripos($files['beta']['factory'][$i], "buffalo", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Buffalo";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['factory'][$i], $pos_hersteller+6, strlen($files['beta']['factory'][$i])-$pos_hersteller-10));
				}
				if($pos = stripos($files['beta']['factory'][$i], "d-link", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "D-Link";
					$router_tmp[$i]['version'] = substr($files['beta']['factory'][$i], strripos($files['beta']['factory'][$i], "rev"), -4);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['factory'][$i], $pos_hersteller+5, strlen($files['beta']['factory'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-10));
				}
				if($pos = stripos($files['beta']['factory'][$i], "gl-inet", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "GL-Inet";
					$router_tmp[$i]['version'] = substr($files['beta']['factory'][$i], strripos($files['beta']['factory'][$i], "v"), -4);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['factory'][$i], $pos_hersteller+6, strlen($files['beta']['factory'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-11));
				}
				if($pos = stripos($files['beta']['factory'][$i], "lemaker", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "LeMaker";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['factory'][$i], $pos_hersteller+6, strlen($files['beta']['factory'][$i])-$pos_hersteller-13));
				}
				if($pos = stripos($files['beta']['factory'][$i], "linksys", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Linksys";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['factory'][$i], $pos_hersteller+6, strlen($files['beta']['factory'][$i])-$pos_hersteller-10));
				}
				if($pos = stripos($files['beta']['factory'][$i], "netgear", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Netgear";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['factory'][$i], $pos_hersteller+6, strlen($files['beta']['factory'][$i])-$pos_hersteller-10));
				}
				if($pos = stripos($files['beta']['factory'][$i], "onion", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Onion";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['factory'][$i], $pos_hersteller+4, strlen($files['beta']['factory'][$i])-$pos_hersteller-8));
				}
				if($pos = stripos($files['beta']['factory'][$i], "raspberry-pi", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Raspberry Pi";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['factory'][$i], strripos($files['beta']['factory'][$i], "-")+1, 1));
				}
				if($pos = stripos($files['beta']['factory'][$i], "tp-link", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "TP-Link";
					$router_tmp[$i]['version'] = substr($files['beta']['factory'][$i], strripos($files['beta']['factory'][$i], "v"), -4);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['factory'][$i], $pos_hersteller+6, strlen($files['beta']['factory'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-11));
				}
				if($pos = stripos($files['beta']['factory'][$i], "ubiquiti", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Ubiquiti";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['factory'][$i], $pos_hersteller+7, strlen($files['beta']['factory'][$i])-$pos_hersteller-11));
				}
				if($pos = stripos($files['beta']['factory'][$i], "-wd-", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "Western Digital";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['factory'][$i], $pos_hersteller+1, strlen($files['beta']['factory'][$i])-$pos_hersteller-5));
				}
				if($pos = stripos($files['beta']['factory'][$i], "x86", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "x86";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['factory'][$i], $pos_hersteller+2, stripos($files['beta']['factory'][$i], ".", $pos_hersteller+2)-$pos_hersteller-2));
				}
				$router[$i]['hersteller'] = $router_tmp[$i]['hersteller'];
				$router[$i]['version'] = $router_tmp[$i]['version'];
				$router[$i]['modell'] = $router_tmp[$i]['modell'];
				$router[$i]['betafactory'] = 1;
				$router[$i]['betasysupgrade'] = 0;
				$router[$i]['brokenfactory'] = 0;
				$router[$i]['brokensysupgrade'] = 0;
				$router[$i]['experimentalfactory'] = 0;
				$router[$i]['experimentalsysupgrade'] = 0;
				$router[$i]['stablefactory'] = 0;
				$router[$i]['stablesysupgrade'] = 0;
				$router[$i]['betafactorylink'] = $firmware_download_path."beta/factory/".$files['beta']['factory'][$i];
			}
		}
		$router_tmp = array();
		if($variante['beta']['sysupgrade'] == 1) {
			for( $i=0; $i<count($files['beta']['sysupgrade']); $i++) {
				if($pos = stripos($files['beta']['sysupgrade'][$i], "alfa", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Alfa";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['sysupgrade'][$i], $pos_hersteller+3, strlen($files['beta']['sysupgrade'][$i])-$pos_hersteller-18));
				}
				if($pos = stripos($files['beta']['sysupgrade'][$i], "allnet", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Allnet";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['sysupgrade'][$i], $pos_hersteller+5, strlen($files['beta']['sysupgrade'][$i])-$pos_hersteller-20));
				}
				if($pos = stripos($files['beta']['sysupgrade'][$i], "buffalo", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Buffalo";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['sysupgrade'][$i], $pos_hersteller+6, strlen($files['beta']['sysupgrade'][$i])-$pos_hersteller-21));
				}
				if($pos = stripos($files['beta']['sysupgrade'][$i], "d-link", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "D-Link";
					$router_tmp[$i]['version'] = substr($files['beta']['sysupgrade'][$i], strripos($files['beta']['sysupgrade'][$i], "rev"), -15);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['sysupgrade'][$i], $pos_hersteller+5, strlen($files['beta']['sysupgrade'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-21));
				}
				if($pos = stripos($files['beta']['sysupgrade'][$i], "gl-inet", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "GL-Inet";
					$router_tmp[$i]['version'] = substr($files['beta']['sysupgrade'][$i], strripos($files['beta']['sysupgrade'][$i], "v"), -15);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['sysupgrade'][$i], $pos_hersteller+6, strlen($files['beta']['sysupgrade'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-22));
				}
				if($pos = stripos($files['beta']['sysupgrade'][$i], "lemaker", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "LeMaker";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['sysupgrade'][$i], $pos_hersteller+6, strlen($files['beta']['sysupgrade'][$i])-$pos_hersteller-24));
				}
				if($pos = stripos($files['beta']['sysupgrade'][$i], "linksys", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Linksys";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['sysupgrade'][$i], $pos_hersteller+6, strlen($files['beta']['sysupgrade'][$i])-$pos_hersteller-21));
				}
				if($pos = stripos($files['beta']['sysupgrade'][$i], "netgear", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Netgear";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['sysupgrade'][$i], $pos_hersteller+6, strlen($files['beta']['sysupgrade'][$i])-$pos_hersteller-21));
				}
				if($pos = stripos($files['beta']['sysupgrade'][$i], "onion", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Onion";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['sysupgrade'][$i], $pos_hersteller+4, strlen($files['beta']['sysupgrade'][$i])-$pos_hersteller-19));
				}
				if($pos = stripos($files['beta']['sysupgrade'][$i], "raspberry-pi", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Raspberry Pi";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['sysupgrade'][$i], strripos($files['beta']['sysupgrade'][$i], "-", -18)+1, 1));
				}
				if($pos = stripos($files['beta']['sysupgrade'][$i], "tp-link", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "TP-Link";
					$router_tmp[$i]['version'] = substr($files['beta']['sysupgrade'][$i], strripos($files['beta']['sysupgrade'][$i], "v"), -15);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['sysupgrade'][$i], $pos_hersteller+6, strlen($files['beta']['sysupgrade'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-22));
				}
				if($pos = stripos($files['beta']['sysupgrade'][$i], "ubiquiti", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Ubiquiti";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['sysupgrade'][$i], $pos_hersteller+7, strlen($files['beta']['sysupgrade'][$i])-$pos_hersteller-22));
				}
				if($pos = stripos($files['beta']['sysupgrade'][$i], "-wd-", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "Western Digital";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['sysupgrade'][$i], $pos_hersteller+1, strlen($files['beta']['sysupgrade'][$i])-$pos_hersteller-16));
				}
				if($pos = stripos($files['beta']['sysupgrade'][$i], "x86", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "x86";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['beta']['sysupgrade'][$i], $pos_hersteller+2, stripos($files['beta']['sysupgrade'][$i], ".", $pos_hersteller+2)-$pos_hersteller-13));
				}
				$router_neu = 1;
				for( $j=0; $j<count($router); $j++) {
					if((strcasecmp($router[$j]['hersteller'], $router_tmp[$i]['hersteller']) == 0) && (strcasecmp($router[$j]['modell'], $router_tmp[$i]['modell']) == 0) && (strcasecmp($router[$j]['version'], $router_tmp[$i]['version']) == 0)) {
						$router[$j]['betasysupgrade'] = 1;
						$router[$j]['betasysupgradelink'] = $firmware_download_path."beta/sysupgrade/".$files['beta']['sysupgrade'][$i];
						$router_neu = 0;
					}
				} 
				if($router_neu == 1) {
					$router[$j]['hersteller'] = $router_tmp[$i]['hersteller'];
					$router[$j]['version'] = $router_tmp[$i]['version'];
					$router[$j]['modell'] = $router_tmp[$i]['modell'];
					$router[$j]['betafactory'] = 0;
					$router[$j]['betasysupgrade'] = 1;
					$router[$j]['brokenfactory'] = 0;
					$router[$j]['brokensysupgrade'] = 0;
					$router[$j]['experimentalfactory'] = 0;
					$router[$j]['experimentalsysupgrade'] = 0;
					$router[$j]['stablefactory'] = 0;
					$router[$j]['stablesysupgrade'] = 0;
					$router[$j]['betasysupgradelink'] = $firmware_download_path."beta/sysupgrade/".$files['beta']['sysupgrade'][$i];
				}
			}
		}
		$router_tmp = array();
		if($variante['broken']['factory'] == 1) {
			for( $i=0; $i<count($files['broken']['factory']); $i++) {
				if($pos = stripos($files['broken']['factory'][$i], "alfa", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Alfa";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['factory'][$i], $pos_hersteller+5, strlen($files['broken']['factory'][$i])-$pos_hersteller-9));
				}
				if($pos = stripos($files['broken']['factory'][$i], "allnet", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Allnet";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['factory'][$i], $pos_hersteller+7, strlen($files['broken']['factory'][$i])-$pos_hersteller-11));
				}
				if($pos = stripos($files['broken']['factory'][$i], "buffalo", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Buffalo";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['factory'][$i], $pos_hersteller+8, strlen($files['broken']['factory'][$i])-$pos_hersteller-12));
				}
				if($pos = stripos($files['broken']['factory'][$i], "d-link", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "D-Link";
					$router_tmp[$i]['version'] = substr($files['broken']['factory'][$i], strripos($files['broken']['factory'][$i], "rev"), -4);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['factory'][$i], $pos_hersteller+7, strlen($files['broken']['factory'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-12));
				}
				if($pos = stripos($files['broken']['factory'][$i], "gl-inet", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "GL-Inet";
					$router_tmp[$i]['version'] = substr($files['broken']['factory'][$i], strripos($files['broken']['factory'][$i], "v"), -4);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['factory'][$i], $pos_hersteller+8, strlen($files['broken']['factory'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-13));
				}
				if($pos = stripos($files['broken']['factory'][$i], "lemaker", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "LeMaker";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['factory'][$i], $pos_hersteller+8, strlen($files['broken']['factory'][$i])-$pos_hersteller-15));
				}
				if($pos = stripos($files['broken']['factory'][$i], "linksys", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Linksys";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['factory'][$i], $pos_hersteller+8, strlen($files['broken']['factory'][$i])-$pos_hersteller-12));
				}
				if($pos = stripos($files['broken']['factory'][$i], "netgear", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Netgear";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['factory'][$i], $pos_hersteller+8, strlen($files['broken']['factory'][$i])-$pos_hersteller-12));
				}
				if($pos = stripos($files['broken']['factory'][$i], "onion", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Onion";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['factory'][$i], $pos_hersteller+6, strlen($files['broken']['factory'][$i])-$pos_hersteller-10));
				}
				if($pos = stripos($files['broken']['factory'][$i], "raspberry-pi", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Raspberry Pi";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['factory'][$i], strripos($files['broken']['factory'][$i], "-")+1, 1));
				}
				if($pos = stripos($files['broken']['factory'][$i], "tp-link", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "TP-Link";
					$router_tmp[$i]['version'] = substr($files['broken']['factory'][$i], strripos($files['broken']['factory'][$i], "v"), -4);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['factory'][$i], $pos_hersteller+8, strlen($files['broken']['factory'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-13));
				}
				if($pos = stripos($files['broken']['factory'][$i], "ubiquiti", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Ubiquiti";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['factory'][$i], $pos_hersteller+9, strlen($files['broken']['factory'][$i])-$pos_hersteller-13));
				}
				if($pos = stripos($files['broken']['factory'][$i], "-wd-", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "Western Digital";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['factory'][$i], $pos_hersteller+3, strlen($files['broken']['factory'][$i])-$pos_hersteller-7));
				}
				if($pos = stripos($files['broken']['factory'][$i], "x86", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "x86";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['factory'][$i], $pos_hersteller+4, stripos($files['broken']['factory'][$i], ".", $pos_hersteller+2)-$pos_hersteller-4));
				}
				$router_neu = 1;
				for( $j=0; $j<count($router); $j++) {
					if((strcasecmp($router[$j]['hersteller'], $router_tmp[$i]['hersteller']) == 0) && (strcasecmp($router[$j]['modell'], $router_tmp[$i]['modell']) == 0) && (strcasecmp($router[$j]['version'], $router_tmp[$i]['version']) == 0)) {
						$router[$j]['brokenfactory'] = 1;
						$router[$j]['brokenfactorylink'] = $firmware_download_path."broken/factory/".$files['broken']['factory'][$i];
						$router_neu = 0;
					}
				} 
				if($router_neu == 1) {
					$router[$j]['hersteller'] = $router_tmp[$i]['hersteller'];
					$router[$j]['version'] = $router_tmp[$i]['version'];
					$router[$j]['modell'] = $router_tmp[$i]['modell'];
					$router[$j]['betafactory'] = 0;
					$router[$j]['betasysupgrade'] = 0;
					$router[$j]['brokenfactory'] = 1;
					$router[$j]['brokensysupgrade'] = 0;
					$router[$j]['experimentalfactory'] = 0;
					$router[$j]['experimentalsysupgrade'] = 0;
					$router[$j]['stablefactory'] = 0;
					$router[$j]['stablesysupgrade'] = 0;
					$router[$j]['brokenfactorylink'] = $firmware_download_path."broken/factory/".$files['broken']['factory'][$i];
				}
			}
		}
		$router_tmp = array();
		if($variante['broken']['sysupgrade'] == 1) {
			for( $i=0; $i<count($files['broken']['sysupgrade']); $i++) {
				if($pos = stripos($files['broken']['sysupgrade'][$i], "alfa", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Alfa";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['sysupgrade'][$i], $pos_hersteller+5, strlen($files['broken']['sysupgrade'][$i])-$pos_hersteller-20));
				}
				if($pos = stripos($files['broken']['sysupgrade'][$i], "allnet", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Allnet";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['sysupgrade'][$i], $pos_hersteller+7, strlen($files['broken']['sysupgrade'][$i])-$pos_hersteller-22));
				}
				if($pos = stripos($files['broken']['sysupgrade'][$i], "buffalo", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Buffalo";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['sysupgrade'][$i], $pos_hersteller+8, strlen($files['broken']['sysupgrade'][$i])-$pos_hersteller-23));
				}
				if($pos = stripos($files['broken']['sysupgrade'][$i], "d-link", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "D-Link";
					$router_tmp[$i]['version'] = substr($files['broken']['sysupgrade'][$i], strripos($files['broken']['sysupgrade'][$i], "rev"), -15);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['sysupgrade'][$i], $pos_hersteller+7, strlen($files['broken']['sysupgrade'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-23));
				}
				if($pos = stripos($files['broken']['sysupgrade'][$i], "gl-inet", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "GL-Inet";
					$router_tmp[$i]['version'] = substr($files['broken']['sysupgrade'][$i], strripos($files['broken']['sysupgrade'][$i], "v"), -15);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['sysupgrade'][$i], $pos_hersteller+8, strlen($files['broken']['sysupgrade'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-24));
				}
				if($pos = stripos($files['broken']['sysupgrade'][$i], "lemaker", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "LeMaker";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['sysupgrade'][$i], $pos_hersteller+8, strlen($files['broken']['sysupgrade'][$i])-$pos_hersteller-26));
				}
				if($pos = stripos($files['broken']['sysupgrade'][$i], "linksys", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Linksys";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['sysupgrade'][$i], $pos_hersteller+8, strlen($files['broken']['sysupgrade'][$i])-$pos_hersteller-23));
				}
				if($pos = stripos($files['broken']['sysupgrade'][$i], "netgear", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Netgear";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['sysupgrade'][$i], $pos_hersteller+8, strlen($files['broken']['sysupgrade'][$i])-$pos_hersteller-23));
				}
				if($pos = stripos($files['broken']['sysupgrade'][$i], "onion", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Onion";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['sysupgrade'][$i], $pos_hersteller+6, strlen($files['broken']['sysupgrade'][$i])-$pos_hersteller-21));
				}
				if($pos = stripos($files['broken']['sysupgrade'][$i], "raspberry-pi", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Raspberry Pi";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['sysupgrade'][$i], strripos($files['broken']['sysupgrade'][$i], "-", -19)+1, 1));
				}
				if($pos = stripos($files['broken']['sysupgrade'][$i], "tp-link", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "TP-Link";
					$router_tmp[$i]['version'] = substr($files['broken']['sysupgrade'][$i], strripos($files['broken']['sysupgrade'][$i], "v"), -15);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['sysupgrade'][$i], $pos_hersteller+8, strlen($files['broken']['sysupgrade'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-24));
				}
				if($pos = stripos($files['broken']['sysupgrade'][$i], "ubiquiti", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "Ubiquiti";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['sysupgrade'][$i], $pos_hersteller+9, strlen($files['broken']['sysupgrade'][$i])-$pos_hersteller-24));
				}
				if($pos = stripos($files['broken']['sysupgrade'][$i], "-wd-", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "Western Digital";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['sysupgrade'][$i], $pos_hersteller+3, strlen($files['broken']['sysupgrade'][$i])-$pos_hersteller-18));
				}
				if($pos = stripos($files['broken']['sysupgrade'][$i], "x86", $pos_hersteller-2) !== false) {
					$router_tmp[$i]['hersteller'] = "x86";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['broken']['sysupgrade'][$i], $pos_hersteller+4, stripos($files['broken']['sysupgrade'][$i], ".", $pos_hersteller+2)-$pos_hersteller-15));
				}
				$router_neu = 1;
				for( $j=0; $j<count($router); $j++) {
					if((strcasecmp($router[$j]['hersteller'], $router_tmp[$i]['hersteller']) == 0) && (strcasecmp($router[$j]['modell'], $router_tmp[$i]['modell']) == 0) && (strcasecmp($router[$j]['version'], $router_tmp[$i]['version']) == 0)) {
						$router[$j]['brokensysupgrade'] = 1;
						$router[$j]['brokensysupgradelink'] = $firmware_download_path."broken/sysupgrade/".$files['broken']['sysupgrade'][$i];
						$router_neu = 0;
					}
				} 
				if($router_neu == 1) {
					$router[$j]['hersteller'] = $router_tmp[$i]['hersteller'];
					$router[$j]['version'] = $router_tmp[$i]['version'];
					$router[$j]['modell'] = $router_tmp[$i]['modell'];
					$router[$j]['betafactory'] = 0;
					$router[$j]['betasysupgrade'] = 0;
					$router[$j]['brokenfactory'] = 0;
					$router[$j]['brokensysupgrade'] = 1;
					$router[$j]['experimentalfactory'] = 0;
					$router[$j]['experimentalsysupgrade'] = 0;
					$router[$j]['stablefactory'] = 0;
					$router[$j]['stablesysupgrade'] = 0;
					$router[$j]['brokensysupgradelink'] = $firmware_download_path."broken/sysupgrade/".$files['broken']['sysupgrade'][$i];
				}
			}
		}
		$router_tmp = array();
		if($variante['experimental']['factory'] == 1) {
			for( $i=0; $i<count($files['experimental']['factory']); $i++) {
				if($pos = stripos($files['experimental']['factory'][$i], "alfa", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "Alfa";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['factory'][$i], $pos_hersteller+2, strlen($files['experimental']['factory'][$i])-$pos_hersteller-6));
				}
				if($pos = stripos($files['experimental']['factory'][$i], "allnet", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "Allnet";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['factory'][$i], $pos_hersteller+4, strlen($files['experimental']['factory'][$i])-$pos_hersteller-8));
				}
				if($pos = stripos($files['experimental']['factory'][$i], "buffalo", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "Buffalo";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['factory'][$i], $pos_hersteller+5, strlen($files['experimental']['factory'][$i])-$pos_hersteller-11));
				}
				if($pos = stripos($files['experimental']['factory'][$i], "d-link", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "D-Link";
					$router_tmp[$i]['version'] = substr($files['experimental']['factory'][$i], strripos($files['experimental']['factory'][$i], "rev"), -4);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['factory'][$i], $pos_hersteller+4, strlen($files['experimental']['factory'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-9));
				}
				if($pos = stripos($files['experimental']['factory'][$i], "gl-inet", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "GL-Inet";
					$router_tmp[$i]['version'] = substr($files['experimental']['factory'][$i], strripos($files['experimental']['factory'][$i], "v"), -4);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['factory'][$i], $pos_hersteller+5, strlen($files['experimental']['factory'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-10));
				}
				if($pos = stripos($files['experimental']['factory'][$i], "lemaker", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "LeMaker";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['factory'][$i], $pos_hersteller+5, strlen($files['experimental']['factory'][$i])-$pos_hersteller-12));
				}
				if($pos = stripos($files['experimental']['factory'][$i], "linksys", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "Linksys";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['factory'][$i], $pos_hersteller+5, strlen($files['experimental']['factory'][$i])-$pos_hersteller-9));
				}
				if($pos = stripos($files['experimental']['factory'][$i], "netgear", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "Netgear";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['factory'][$i], $pos_hersteller+5, strlen($files['experimental']['factory'][$i])-$pos_hersteller-9));
				}
				if($pos = stripos($files['experimental']['factory'][$i], "onion", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "Onion";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['factory'][$i], $pos_hersteller+3, strlen($files['experimental']['factory'][$i])-$pos_hersteller-7));
				}
				if($pos = stripos($files['experimental']['factory'][$i], "raspberry-pi", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "Raspberry Pi";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['factory'][$i], strripos($files['experimental']['factory'][$i], "-")+1, 1));
				}
				if($pos = stripos($files['experimental']['factory'][$i], "tp-link", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "TP-Link";
					$router_tmp[$i]['version'] = substr($files['experimental']['factory'][$i], strripos($files['experimental']['factory'][$i], "v"), -4);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['factory'][$i], $pos_hersteller+5, strlen($files['experimental']['factory'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-10));
				}
				if($pos = stripos($files['experimental']['factory'][$i], "ubiquiti", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "Ubiquiti";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['factory'][$i], $pos_hersteller+6, strlen($files['experimental']['factory'][$i])-$pos_hersteller-10));
				}
				if($pos = stripos($files['experimental']['factory'][$i], "-wd-", $pos_hersteller-4) !== false) {
					$router_tmp[$i]['hersteller'] = "Western Digital";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['factory'][$i], $pos_hersteller+0, strlen($files['experimental']['factory'][$i])-$pos_hersteller-4));
				}
				if($pos = stripos($files['experimental']['factory'][$i], "x86", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "x86";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['factory'][$i], $pos_hersteller+1, stripos($files['experimental']['factory'][$i], ".", $pos_hersteller+2)-$pos_hersteller-1));
				}
				$router_neu = 1;
				for( $j=0; $j<count($router); $j++) {
					if((strcasecmp($router[$j]['hersteller'], $router_tmp[$i]['hersteller']) == 0) && (strcasecmp($router[$j]['modell'], $router_tmp[$i]['modell']) == 0) && (strcasecmp($router[$j]['version'], $router_tmp[$i]['version']) == 0)) {
						$router[$j]['experimentalfactory'] = 1;
						$router[$j]['experimentalfactorylink'] = $firmware_download_path."experimental/factory/".$files['experimental']['factory'][$i];
						$router_neu = 0;
					}
				} 
				if($router_neu == 1) {
					$router[$j]['hersteller'] = $router_tmp[$i]['hersteller'];
					$router[$j]['version'] = $router_tmp[$i]['version'];
					$router[$j]['modell'] = $router_tmp[$i]['modell'];
					$router[$j]['betafactory'] = 0;
					$router[$j]['betasysupgrade'] = 0;
					$router[$j]['brokenfactory'] = 0;
					$router[$j]['brokensysupgrade'] = 0;
					$router[$j]['experimentalfactory'] = 1;
					$router[$j]['experimentalsysupgrade'] = 0;
					$router[$j]['stablefactory'] = 0;
					$router[$j]['stablesysupgrade'] = 0;
					$router[$j]['experimentalfactorylink'] = $firmware_download_path."experimental/factory/".$files['experimental']['factory'][$i];
				}
			}
		}
		$router_tmp = array();
		if($variante['experimental']['sysupgrade'] == 1) {
			for( $i=0; $i<count($files['experimental']['sysupgrade']); $i++) {
				if($pos = stripos($files['experimental']['sysupgrade'][$i], "alfa", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "Alfa";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['sysupgrade'][$i], $pos_hersteller+2, strlen($files['experimental']['sysupgrade'][$i])-$pos_hersteller-17));
				}
				if($pos = stripos($files['experimental']['sysupgrade'][$i], "allnet", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "Allnet";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['sysupgrade'][$i], $pos_hersteller+4, strlen($files['experimental']['sysupgrade'][$i])-$pos_hersteller-19));
				}
				if($pos = stripos($files['experimental']['sysupgrade'][$i], "buffalo", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "Buffalo";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['sysupgrade'][$i], $pos_hersteller+5, strlen($files['experimental']['sysupgrade'][$i])-$pos_hersteller-22));
				}
				if($pos = stripos($files['experimental']['sysupgrade'][$i], "d-link", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "D-Link";
					$router_tmp[$i]['version'] = substr($files['experimental']['sysupgrade'][$i], strripos($files['experimental']['sysupgrade'][$i], "rev"), -15);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['sysupgrade'][$i], $pos_hersteller+4, strlen($files['experimental']['sysupgrade'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-20));
				}
				if($pos = stripos($files['experimental']['sysupgrade'][$i], "gl-inet", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "GL-Inet";
					$router_tmp[$i]['version'] = substr($files['experimental']['sysupgrade'][$i], strripos($files['experimental']['sysupgrade'][$i], "v"), -15);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['sysupgrade'][$i], $pos_hersteller+5, strlen($files['experimental']['sysupgrade'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-21));
				}
				if($pos = stripos($files['experimental']['sysupgrade'][$i], "lemaker", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "LeMaker";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['sysupgrade'][$i], $pos_hersteller+5, strlen($files['experimental']['sysupgrade'][$i])-$pos_hersteller-23));
				}
				if($pos = stripos($files['experimental']['sysupgrade'][$i], "linksys", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "Linksys";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['sysupgrade'][$i], $pos_hersteller+5, strlen($files['experimental']['sysupgrade'][$i])-$pos_hersteller-20));
				}
				if($pos = stripos($files['experimental']['sysupgrade'][$i], "netgear", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "Netgear";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['sysupgrade'][$i], $pos_hersteller+5, strlen($files['experimental']['sysupgrade'][$i])-$pos_hersteller-20));
				}
				if($pos = stripos($files['experimental']['sysupgrade'][$i], "onion", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "Onion";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['sysupgrade'][$i], $pos_hersteller+3, strlen($files['experimental']['sysupgrade'][$i])-$pos_hersteller-18));
				}
				if($pos = stripos($files['experimental']['sysupgrade'][$i], "raspberry-pi", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "Raspberry Pi";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['sysupgrade'][$i], strripos($files['experimental']['sysupgrade'][$i], "-")+1, 1));
				}
				if($pos = stripos($files['experimental']['sysupgrade'][$i], "tp-link", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "TP-Link";
					$router_tmp[$i]['version'] = substr($files['experimental']['sysupgrade'][$i], strripos($files['experimental']['sysupgrade'][$i], "v"), -15);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['sysupgrade'][$i], $pos_hersteller+5, strlen($files['experimental']['sysupgrade'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-21));
				}
				if($pos = stripos($files['experimental']['sysupgrade'][$i], "ubiquiti", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "Ubiquiti";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['sysupgrade'][$i], $pos_hersteller+6, strlen($files['experimental']['sysupgrade'][$i])-$pos_hersteller-21));
				}
				if($pos = stripos($files['experimental']['sysupgrade'][$i], "-wd-", $pos_hersteller-4) !== false) {
					$router_tmp[$i]['hersteller'] = "Western Digital";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['sysupgrade'][$i], $pos_hersteller+0, strlen($files['experimental']['sysupgrade'][$i])-$pos_hersteller-15));
				}
				if($pos = stripos($files['experimental']['sysupgrade'][$i], "x86", $pos_hersteller-3) !== false) {
					$router_tmp[$i]['hersteller'] = "x86";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['sysupgrade'][$i], $pos_hersteller+1, stripos($files['experimental']['sysupgrade'][$i], ".", $pos_hersteller+2)-$pos_hersteller-12));
				}
				$router_neu = 1;
				for( $j=0; $j<count($router); $j++) {
					if((strcasecmp($router[$j]['hersteller'], $router_tmp[$i]['hersteller']) == 0) && (strcasecmp($router[$j]['modell'], $router_tmp[$i]['modell']) == 0) && (strcasecmp($router[$j]['version'], $router_tmp[$i]['version']) == 0)) {
						$router[$j]['experimentalsysupgrade'] = 1;
						$router[$j]['experimentalsysupgradelink'] = $firmware_download_path."experimental/sysupgrade/".$files['experimental']['sysupgrade'][$i];
						$router_neu = 0;
					}
				} 
				if($router_neu == 1) {
					$router[$j]['hersteller'] = $router_tmp[$i]['hersteller'];
					$router[$j]['version'] = $router_tmp[$i]['version'];
					$router[$j]['modell'] = $router_tmp[$i]['modell'];
					$router[$j]['betafactory'] = 0;
					$router[$j]['betasysupgrade'] = 0;
					$router[$j]['brokenfactory'] = 0;
					$router[$j]['brokensysupgrade'] = 0;
					$router[$j]['experimentalfactory'] = 0;
					$router[$j]['experimentalsysupgrade'] = 1;
					$router[$j]['stablefactory'] = 0;
					$router[$j]['stablesysupgrade'] = 0;
					$router[$j]['experimentalsysupgradelink'] = $firmware_download_path."experimental/sysupgrade/".$files['experimental']['sysupgrade'][$i];
				}
			}
		}
		$router_tmp = array();
		if($variante['stable']['factory'] == 1) {
			for( $i=0; $i<count($files['stable']['factory']); $i++) {
				if($pos = stripos($files['stable']['factory'][$i], "alfa", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "Alfa";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['factory'][$i], $pos_hersteller+5, strlen($files['stable']['factory'][$i])-$pos_hersteller-9));
				}
				if($pos = stripos($files['stable']['factory'][$i], "allnet", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "Allnet";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['factory'][$i], $pos_hersteller+7, strlen($files['stable']['factory'][$i])-$pos_hersteller-11));
				}
				if($pos = stripos($files['stable']['factory'][$i], "buffalo", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "Buffalo";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['factory'][$i], $pos_hersteller+8, strlen($files['stable']['factory'][$i])-$pos_hersteller-14));
				}
				if($pos = stripos($files['stable']['factory'][$i], "d-link", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "D-Link";
					$router_tmp[$i]['version'] = substr($files['stable']['factory'][$i], strripos($files['stable']['factory'][$i], "rev"), -4);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['factory'][$i], $pos_hersteller+7, strlen($files['stable']['factory'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-12));
				}
				if($pos = stripos($files['stable']['factory'][$i], "gl-inet", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "GL-Inet";
					$router_tmp[$i]['version'] = substr($files['stable']['factory'][$i], strripos($files['stable']['factory'][$i], "v"), -4);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['factory'][$i], $pos_hersteller+8, strlen($files['stable']['factory'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-13));
				}
				if($pos = stripos($files['experimental']['factory'][$i], "lemaker", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "LeMaker";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['factory'][$i], $pos_hersteller+8, strlen($files['experimental']['factory'][$i])-$pos_hersteller-15));
				}
				if($pos = stripos($files['stable']['factory'][$i], "linksys", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "Linksys";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['factory'][$i], $pos_hersteller+8, strlen($files['stable']['factory'][$i])-$pos_hersteller-12));
				}
				if($pos = stripos($files['stable']['factory'][$i], "netgear", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "Netgear";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['factory'][$i], $pos_hersteller+8, strlen($files['stable']['factory'][$i])-$pos_hersteller-12));
				}
				if($pos = stripos($files['stable']['factory'][$i], "onion", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "Onion";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['factory'][$i], $pos_hersteller+6, strlen($files['stable']['factory'][$i])-$pos_hersteller-10));
				}
				if($pos = stripos($files['stable']['factory'][$i], "raspberry-pi", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "Raspberry Pi";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['factory'][$i], strripos($files['stable']['factory'][$i], "-")+1, 1));
				}
				if($pos = stripos($files['stable']['factory'][$i], "tp-link", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "TP-Link";
					$router_tmp[$i]['version'] = substr($files['stable']['factory'][$i], strripos($files['stable']['factory'][$i], "v"), -4);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['factory'][$i], $pos_hersteller+8, strlen($files['stable']['factory'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-13));
				}
				if($pos = stripos($files['stable']['factory'][$i], "ubiquiti", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "Ubiquiti";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['factory'][$i], $pos_hersteller+9, strlen($files['stable']['factory'][$i])-$pos_hersteller-13));
				}
				if($pos = stripos($files['stable']['factory'][$i], "-wd-", $pos_hersteller-1) !== false) {
					$router_tmp[$i]['hersteller'] = "Western Digital";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['factory'][$i], $pos_hersteller+3, strlen($files['stable']['factory'][$i])-$pos_hersteller-7));
				}
				if($pos = stripos($files['stable']['factory'][$i], "x86", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "x86";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['factory'][$i], $pos_hersteller+4, stripos($files['stable']['factory'][$i], ".", $pos_hersteller+2)-$pos_hersteller-4));
				}
				$router_neu = 1;
				for( $j=0; $j<count($router); $j++) {
					if((strcasecmp($router[$j]['hersteller'], $router_tmp[$i]['hersteller']) == 0) && (strcasecmp($router[$j]['modell'], $router_tmp[$i]['modell']) == 0) && (strcasecmp($router[$j]['version'], $router_tmp[$i]['version']) == 0)) {
						$router[$j]['stablefactory'] = 1;
						$router[$j]['stablefactorylink'] = $firmware_download_path."stable/factory/".$files['stable']['factory'][$i];
						$router_neu = 0;
					}
				} 
				if($router_neu == 1) {
					$router[$j]['hersteller'] = $router_tmp[$i]['hersteller'];
					$router[$j]['version'] = $router_tmp[$i]['version'];
					$router[$j]['modell'] = $router_tmp[$i]['modell'];
					$router[$j]['betafactory'] = 0;
					$router[$j]['betasysupgrade'] = 0;
					$router[$j]['brokenfactory'] = 0;
					$router[$j]['brokensysupgrade'] = 0;
					$router[$j]['experimentalfactory'] = 0;
					$router[$j]['experimentalsysupgrade'] = 0;
					$router[$j]['stablefactory'] = 1;
					$router[$j]['stablesysupgrade'] = 0;
					$router[$j]['stablefactorylink'] = $firmware_download_path."stable/factory/".$files['stable']['factory'][$i];
				}
			}
		}
		//print_r($files['stable']['sysupgrade']);
		$router_tmp = array();
		if($variante['stable']['sysupgrade'] == 1) {
			for( $i=0; $i<count($files['stable']['sysupgrade']); $i++) {
				if($pos = stripos($files['stable']['sysupgrade'][$i], "alfa", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "Alfa";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['sysupgrade'][$i], $pos_hersteller+5, strlen($files['stable']['sysupgrade'][$i])-$pos_hersteller-20));
				}
				if($pos = stripos($files['stable']['sysupgrade'][$i], "allnet", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "Allnet";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['sysupgrade'][$i], $pos_hersteller+7, strlen($files['stable']['sysupgrade'][$i])-$pos_hersteller-22));
				}
				if($pos = stripos($files['stable']['sysupgrade'][$i], "buffalo", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "Buffalo";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['sysupgrade'][$i], $pos_hersteller+8, strlen($files['stable']['sysupgrade'][$i])-$pos_hersteller-25));
				}
				if($pos = stripos($files['stable']['sysupgrade'][$i], "d-link", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "D-Link";
					$router_tmp[$i]['version'] = substr($files['stable']['sysupgrade'][$i], strripos($files['stable']['sysupgrade'][$i], "rev"), -15);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['sysupgrade'][$i], $pos_hersteller+7, strlen($files['stable']['sysupgrade'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-23));
				}
				if($pos = stripos($files['stable']['sysupgrade'][$i], "gl-inet", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "GL-Inet";
					$router_tmp[$i]['version'] = substr($files['stable']['sysupgrade'][$i], strripos($files['stable']['sysupgrade'][$i], "v"), -15);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['sysupgrade'][$i], $pos_hersteller+8, strlen($files['stable']['sysupgrade'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-24));
				}
				if($pos = stripos($files['experimental']['sysupgrade'][$i], "lemaker", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "LeMaker";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['experimental']['sysupgrade'][$i], $pos_hersteller+8, strlen($files['experimental']['sysupgrade'][$i])-$pos_hersteller-26));
				}
				if($pos = stripos($files['stable']['sysupgrade'][$i], "linksys", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "Linksys";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['sysupgrade'][$i], $pos_hersteller+8, strlen($files['stable']['sysupgrade'][$i])-$pos_hersteller-23));
				}
				if($pos = stripos($files['stable']['sysupgrade'][$i], "netgear", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "Netgear";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['sysupgrade'][$i], $pos_hersteller+8, strlen($files['stable']['sysupgrade'][$i])-$pos_hersteller-23));
				}
				if($pos = stripos($files['stable']['sysupgrade'][$i], "onion", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "Onion";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['sysupgrade'][$i], $pos_hersteller+6, strlen($files['stable']['sysupgrade'][$i])-$pos_hersteller-21));
				}
				if($pos = stripos($files['stable']['sysupgrade'][$i], "raspberry-pi", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "Raspberry Pi";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['sysupgrade'][$i], strripos($files['stable']['sysupgrade'][$i], "-")+1, 1));
				}
				if($pos = stripos($files['stable']['sysupgrade'][$i], "tp-link", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "TP-Link";
					$router_tmp[$i]['version'] = substr($files['stable']['sysupgrade'][$i], strripos($files['stable']['sysupgrade'][$i], "v"), -15);
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['sysupgrade'][$i], $pos_hersteller+8, strlen($files['stable']['sysupgrade'][$i])-strlen($router_tmp[$i]['version'])-$pos_hersteller-24));
				}
				if($pos = stripos($files['stable']['sysupgrade'][$i], "ubiquiti", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "Ubiquiti";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['sysupgrade'][$i], $pos_hersteller+9, strlen($files['stable']['sysupgrade'][$i])-$pos_hersteller-24));
				}
				if($pos = stripos($files['stable']['sysupgrade'][$i], "-wd-", $pos_hersteller-1) !== false) {
					$router_tmp[$i]['hersteller'] = "Western Digital";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['sysupgrade'][$i], $pos_hersteller+3, strlen($files['stable']['sysupgrade'][$i])-$pos_hersteller-18));
				}
				if($pos = stripos($files['stable']['sysupgrade'][$i], "x86", $pos_hersteller) !== false) {
					$router_tmp[$i]['hersteller'] = "x86";
					$router_tmp[$i]['version'] = "Alle";
					$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['sysupgrade'][$i], $pos_hersteller+4, stripos($files['stable']['sysupgrade'][$i], ".", $pos_hersteller+2)-$pos_hersteller-15));
				}
				$router_neu = 1;
				//echo("Hersteller: ".$router_tmp[$i]['hersteller']." Modell: ".$router_tmp[$i]['modell']." Version: ".$router_tmp[$i]['version']."<br />");
				for( $j=0; $j<count($router); $j++) {
					if((strcasecmp($router[$j]['hersteller'], $router_tmp[$i]['hersteller']) == 0) && (strcasecmp($router[$j]['modell'], $router_tmp[$i]['modell']) == 0) && (strcasecmp($router[$j]['version'], $router_tmp[$i]['version']) == 0)) {
						$router[$j]['stablesysupgrade'] = 1;
						$router[$j]['stablesysupgradelink'] = $firmware_download_path."stable/sysupgrade/".$files['stable']['sysupgrade'][$i];
						$router_neu = 0;
					}
				} 
				if($router_neu == 1) {
					$router[$j]['hersteller'] = $router_tmp[$i]['hersteller'];
					$router[$j]['version'] = $router_tmp[$i]['version'];
					$router[$j]['modell'] = $router_tmp[$i]['modell'];
					$router[$j]['betafactory'] = 0;
					$router[$j]['betasysupgrade'] = 0;
					$router[$j]['brokenfactory'] = 0;
					$router[$j]['brokensysupgrade'] = 0;
					$router[$j]['experimentalfactory'] = 0;
					$router[$j]['experimentalsysupgrade'] = 0;
					$router[$j]['stablefactory'] = 0;
					$router[$j]['stablesysupgrade'] = 1;
					$router[$j]['stablesysupgradelink'] = $firmware_download_path."stable/sysupgrade/".$files['stable']['sysupgrade'][$i];
				}
			}
		}
		//print_r($router);
		//echo("i: ".$i." j: ".$j."<br />");
	} catch(Exception $e) {
		echo("Fehler: ".$e);
		die();
	}

	echo <<<EOT
	<script>
function populateA(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.innerHTML = "";
EOT;
	for( $i=0; $i<count($hersteller); $i++) {
		echo("\nif(s1.value == \"".$hersteller[$i]."\"){\n");
		echo("var optionArray = [\"|\"");
		$j=0;
		while( $j<count($router) ) {
			if($router[$j]['hersteller'] == $hersteller[$i]) {
				echo(",\"".$router[$j]['modell']."|".$router[$j]['modell']."\"");
				if( $j<count($router)-1 ) {
					while($router[$j]['modell'] == $router[$j+1]['modell']) {
						if( $j<count($router)-1 ) {
							$j++;
						} else {
							break;
						}
					}
				}
			}
			$j++;
		}
		echo("];\n");
		echo("}\n");
	}
	echo <<<EOT
	for(var option in optionArray){
		var pair = optionArray[option].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		s2.options.add(newOption);
	}
}
function populateB(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.innerHTML = "";
EOT;
	$i=0;
	while( $i<count($router) ) {
		echo("\nif(s1.value == \"".$router[$i]['modell']."\"){\n");
		echo("var optionArray = [\"|\"");
		echo(",\"".$i."|".$router[$i]['version']."\"");
		if( $i<count($router)-1 ) {
			while($router[$i]['modell'] == $router[$i+1]['modell']) {
				if( $i<count($router)-1 ) {
					$i++;
					echo(",\"".$i."|".$router[$i]['version']."\"");
				} else {
					break;
				}
			}
		}
		echo("];\n");
		echo("}\n");
		$i++;
	}
	echo <<<EOT
	for(var option in optionArray){
		var pair = optionArray[option].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		s2.options.add(newOption);
	}
}
function populateC(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.innerHTML = "";
EOT;
	$i=0;
	while( $i<count($router) ) {
		echo("\nif(s1.value == \"".$i."\"){\n");
		echo("var optionArray = [\"|\"");
		if( ($router[$i]['betafactory'] == 1) || ($router[$i]['brokenfactory'] == 1) || ($router[$i]['experimentalfactory'] == 1) || ($router[$i]['stablefactory'] == 1) ) {
			echo(",\"".$i."J|Ja\"");
		}
		if( ($router[$i]['betasysupgrade'] == 1) || ($router[$i]['brokensysupgrade'] == 1) || ($router[$i]['experimentalsysupgrade'] == 1) || ($router[$i]['stablesysupgrade'] == 1) ) {
			echo(",\"".$i."N|Nein\"");
		}
		echo("];\n");
		echo("}\n");
		$i++;
	}
	echo <<<EOT
	for(var option in optionArray){
		var pair = optionArray[option].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		s2.options.add(newOption);
	}
}
function populateD(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.innerHTML = "";
EOT;
	$i=0;
	while( $i<count($router) ) {
		echo("\nif(s1.value == \"".$i."J\"){\n");
		echo("var optionArray = [\"|\"");
		if( ($router[$i]['betafactory'] == 1) ) {
			echo(",\"".$i."Jbeta|Beta\"");
		}
		if( ($router[$i]['brokenfactory'] == 1) ) {
			echo(",\"".$i."Jbroken|Broken\"");
		}
		if( ($router[$i]['experimentalfactory'] == 1) ) {
			echo(",\"".$i."Jexp|Experimental\"");
		}
		if( ($router[$i]['stablefactory'] == 1) ) {
			echo(",\"".$i."Jstable|Stable\"");
		}
		echo("];\n");
		echo("}\n");
		echo("\nif(s1.value == \"".$i."N\"){\n");
		echo("var optionArray = [\"|\"");
		if( ($router[$i]['betasysupgrade'] == 1) ) {
			echo(",\"".$i."Nbeta|Beta\"");
		}
		if( ($router[$i]['brokensysupgrade'] == 1) ) {
			echo(",\"".$i."Nbroken|Broken\"");
		}
		if( ($router[$i]['experimentalsysupgrade'] == 1) ) {
			echo(",\"".$i."Nexp|Experimental\"");
		}
		if( ($router[$i]['stablesysupgrade'] == 1) ) {
			echo(",\"".$i."Nstable|Stable\"");
		}
		echo("];\n");
		echo("}\n");
		$i++;
	}
	echo <<<EOT
	for(var option in optionArray){
		var pair = optionArray[option].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		s2.options.add(newOption);
	}
}
function populateE(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.innerHTML = "";
EOT;
	$i=0;
	while( $i<count($router) ) {
		if( ($router[$i]['betafactory'] == 1) ) {
			echo("\nif(s1.value == \"".$i."Jbeta\"){\n");
			echo("var link = \"".$router[$i]['betafactorylink']."\";\n");
			echo("var linkclass = \" btn-warning\";\n");
			echo("}\n");
		}
		if( ($router[$i]['brokenfactory'] == 1) ) {
			echo("\nif(s1.value == \"".$i."Jbroken\"){\n");
			echo("var link = \"".$router[$i]['brokenfactorylink']."\";\n");
			echo("var linkclass = \" btn-danger\";\n");
			echo("}\n");
		}
		if( ($router[$i]['experimentalfactory'] == 1) ) {
			echo("\nif(s1.value == \"".$i."Jexp\"){\n");
			echo("var link = \"".$router[$i]['experimentalfactorylink']."\";\n");
			echo("var linkclass = \" btn-warning\";\n");
			echo("}\n");
		}
		if( ($router[$i]['stablefactory'] == 1) ) {
			echo("\nif(s1.value == \"".$i."Jstable\"){\n");
			echo("var link = \"".$router[$i]['stablefactorylink']."\";\n");
			echo("var linkclass = \" btn-success\";\n");
			echo("}\n");
		}
		if( ($router[$i]['betasysupgrade'] == 1) ) {
			echo("\nif(s1.value == \"".$i."Nbeta\"){\n");
			echo("var link = \"".$router[$i]['betasysupgradelink']."\";\n");
			echo("var linkclass = \" btn-warning\";\n");
			echo("}\n");
		}
		if( ($router[$i]['brokensysupgrade'] == 1) ) {
			echo("\nif(s1.value == \"".$i."Nbroken\"){\n");
			echo("var link = \"".$router[$i]['brokensysupgradelink']."\";\n");
			echo("var linkclass = \" btn-danger\";\n");
			echo("}\n");
		}
		if( ($router[$i]['experimentalsysupgrade'] == 1) ) {
			echo("\nif(s1.value == \"".$i."Nexp\"){\n");
			echo("var link = \"".$router[$i]['experimentalsysupgradelink']."\";\n");
			echo("var linkclass = \" btn-warning\";\n");
			echo("}\n");
		}
		if( ($router[$i]['stablesysupgrade'] == 1) ) {
			echo("\nif(s1.value == \"".$i."Nstable\"){\n");
			echo("var link = \"".$router[$i]['stablesysupgradelink']."\";\n");
			echo("var linkclass = \" btn-success\";\n");
			echo("}\n");
		}
		$i++;
	}
	echo <<<EOT
	s2.href = link;
	s2.className = s2.className.replace( /(?:^|\s)disabled(?!\S)/g , '' );
	s2.className = s2.className.replace( /(?:^|\s)btn-primary(?!\S)/g , '' );
	s2.className = s2.className.replace( /(?:^|\s)btn-danger(?!\S)/g , '' );
	s2.className = s2.className.replace( /(?:^|\s)btn-warning(?!\S)/g , '' );
	s2.className = s2.className.replace( /(?:^|\s)btn-success(?!\S)/g , '' );
	s2.className += linkclass;
	s2.innerHTML = "Download Firmware";
}
	</script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
				<img src="images/Freifunk-logo-hennef-klein-200.png" alt="Freifunk Hennef Logo" style="float:right;">
                <h2>
                    Freifunk Hennef Firmware
                </h2>
                <p>
                    Auf dieser Seite können Sie die passende Firmware für ihren Router auswählen und herunterladen!
                </p>
                <p>
                    <a class="btn btn-primary btn-large" href="http://www.freifunk-hennef.de/">Zurück zur Startseite</a>
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Freifunk Hennef Firmware
                    </h3>
                </div>
                <div class="panel-body">
                    Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />
					Legen Sie anschließend fest, ob sie den Router zum ersten Mal mit einer Freifunk Firmware flashen und welches Entwicklungsstadium die Firmware haben soll.
                </div>
                <div class="panel-footer">
					Bitte wählen Sie nur "stable" im Entwicklungsstadium aus, wenn Sie nicht genau wissen was Sie sonst erwartet!
                </div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
                    <h3 class="panel-title">
						Router Hersteller:
					</h3>
                </div>
                <div class="panel-body">
                    <select id="slct1" name="slct1" onchange="populateA(this.id,'slct2')">
						<option value=""></option>
EOT;
	for( $i=0; $i<count($hersteller); $i++) {
		echo("<option value=\"".$hersteller[$i]."\">".$hersteller[$i]."</option>");
	}
	echo <<<EOT
					</select>
                </div>
				<div class="panel-footer">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
                    <h3 class="panel-title">
						Router Modell:
					</h3>
                </div>
                <div class="panel-body">
					<select id="slct2" name="slct2" onchange="populateB(this.id,'slct3')"></select>
				</div>
				<div class="panel-footer">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
                    <h3 class="panel-title">
						Router Version:
					</h3>
                </div>
                <div class="panel-body">
					<select id="slct3" name="slct3" onchange="populateC(this.id,'slct4')"></select>
				</div>
				<div class="panel-footer">
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
                    <h3 class="panel-title">
						Firmware Erstinstallation:
					</h3>
                </div>
                <div class="panel-body">
					<select id="slct4" name="slct4" onchange="populateD(this.id,'slct5')"></select>
				</div>
				<div class="panel-footer">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
                    <h3 class="panel-title">
						Firmware Entwicklungsstadium:
					</h3>
                </div>
                <div class="panel-body">
					<select id="slct5" name="slct5" onchange="populateE(this.id,'slct6')"></select>
				</div>
				<div class="panel-footer">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
                    <h3 class="panel-title">
						Firmware Download:
					</h3>
                </div>
                <div class="panel-body">
					<a href="#" id="slct6" name="slct6" role="button" class="btn btn-primary disabled">Download Firmware</a>
				</div>
				<div class="panel-footer">
				</div>
			</div>
		</div>
	</div>
</div>
	
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/validator.min.js"></script>
    <!-- <script src="js/scripts.js"></script> -->
</body>
</html>
EOT;
?>