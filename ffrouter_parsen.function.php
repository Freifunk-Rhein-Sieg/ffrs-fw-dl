<?php
/**
* @author    Caspar Armster
* @copyright 2016 Caspar Armster, Freifunk Hennef
* @license   Licensed under GPLv3
* 
*/
if(!is_dir($firmware_download_path)) {
	throw new Exception("Firmwareverzeichnis existiert nicht!");
}
if(is_dir($firmware_download_path."beta/")) {
	if(is_dir($firmware_download_path."beta/factory/")) {
		$variante['beta']['factory'] = 1;
		$files['beta']['factory'] = array_slice(scandir($firmware_download_path."beta/factory/"), 2);
		for( $i=0; $i<count($files['beta']['factory']); $i++ ) {
			if(is_dir($firmware_download_path."beta/factory/".$files['beta']['factory'][$i])) {
				array_splice($files['beta']['factory'], $i, 1);
				$i--;
			} else {
				$pos = stripos($files['beta']['factory'][$i], 'manifest');
				if($pos !== false) {
					array_splice($files['beta']['factory'], $i, 1);
					$i--;
				}
			}
		}
	}
	if(is_dir($firmware_download_path."beta/sysupgrade/")) {
		$variante['beta']['sysupgrade'] = 1;
		$files['beta']['sysupgrade'] = array_slice(scandir($firmware_download_path."beta/sysupgrade/"), 2);
		for( $i=0; $i<count($files['beta']['sysupgrade']); $i++ ) {
			if(is_dir($firmware_download_path."beta/sysupgrade/".$files['beta']['sysupgrade'][$i])) {
				array_splice($files['beta']['sysupgrade'], $i, 1);
				$i--;
			} else {
				$pos = stripos($files['beta']['sysupgrade'][$i], 'manifest');
				if($pos !== false) {
					array_splice($files['beta']['sysupgrade'], $i, 1);
					$i--;
				}
			}
		}
	}
}
if(is_dir($firmware_download_path."broken/")) {
	if(is_dir($firmware_download_path."broken/factory/")) {
		$variante['broken']['factory'] = 1;
		$files['broken']['factory'] = array_slice(scandir($firmware_download_path."broken/factory/"), 2);
		for( $i=0; $i<count($files['broken']['factory']); $i++ ) {
			if(is_dir($firmware_download_path."broken/factory/".$files['broken']['factory'][$i])) {
				array_splice($files['broken']['factory'], $i, 1);
				$i--;
			} else {
				$pos = stripos($files['broken']['factory'][$i], 'manifest');
				if($pos !== false) {
					array_splice($files['broken']['factory'], $i, 1);
					$i--;
				}
			}
		}
	}
	if(is_dir($firmware_download_path."broken/sysupgrade/")) {
		$variante['broken']['sysupgrade'] = 1;
		$files['broken']['sysupgrade'] = array_slice(scandir($firmware_download_path."broken/sysupgrade/"), 2);
		for( $i=0; $i<count($files['broken']['sysupgrade']); $i++ ) {
			if(is_dir($firmware_download_path."broken/sysupgrade/".$files['broken']['sysupgrade'][$i])) {
				array_splice($files['broken']['sysupgrade'], $i, 1);
				$i--;
			} else {
				$pos = stripos($files['broken']['sysupgrade'][$i], 'manifest');
				if($pos !== false) {
					array_splice($files['broken']['sysupgrade'], $i, 1);
					$i--;
				}
			}
		}
	}
}
if(is_dir($firmware_download_path."experimental/")) {
	if(is_dir($firmware_download_path."experimental/factory/")) {
		$variante['experimental']['factory'] = 1;
		$files['experimental']['factory'] = array_slice(scandir($firmware_download_path."experimental/factory/"), 2);
		for( $i=0; $i<count($files['experimental']['factory']); $i++ ) {
			if(is_dir($firmware_download_path."experimental/factory/".$files['experimental']['factory'][$i])) {
				array_splice($files['experimental']['factory'], $i, 1);
				$i--;
			} else {
				$pos = stripos($files['experimental']['factory'][$i], 'manifest');
				if($pos !== false) {
					array_splice($files['experimental']['factory'], $i, 1);
					$i--;
				}
			}
		}
	}
	if(is_dir($firmware_download_path."experimental/sysupgrade/")) {
		$variante['experimental']['sysupgrade'] = 1;
		$files['experimental']['sysupgrade'] = array_slice(scandir($firmware_download_path."experimental/sysupgrade/"), 2);
		for( $i=0; $i<count($files['experimental']['sysupgrade']); $i++ ) {
			if(is_dir($firmware_download_path."experimental/sysupgrade/".$files['experimental']['sysupgrade'][$i])) {
				array_splice($files['experimental']['sysupgrade'], $i, 1);
				$i--;
			} else {
				$pos = stripos($files['experimental']['sysupgrade'][$i], 'manifest');
				if($pos !== false) {
					array_splice($files['experimental']['sysupgrade'], $i, 1);
					$i--;
				}
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
			if(is_dir($firmware_download_path."stable/factory/".$files['stable']['factory'][$i])) {
				array_splice($files['stable']['factory'], $i, 1);
				$i--;
			} else {
				$pos = stripos($files['stable']['factory'][$i], 'manifest');
				if($pos !== false) {
					array_splice($files['stable']['factory'], $i, 1);
					$i--;
				}
			}
		}
	}
	if(is_dir($firmware_download_path."stable/sysupgrade/")) {
		$variante['stable']['sysupgrade'] = 1;
		$files['stable']['sysupgrade'] = array_slice(scandir($firmware_download_path."stable/sysupgrade/"), 2);
		for( $i=0; $i<count($files['stable']['sysupgrade']); $i++ ) {
			if(is_dir($firmware_download_path."stable/sysupgrade/".$files['stable']['sysupgrade'][$i])) {
				array_splice($files['stable']['sysupgrade'], $i, 1);
				$i--;
			} else {
				$pos = stripos($files['stable']['sysupgrade'][$i], 'manifest');
				if($pos !== false) {
					array_splice($files['stable']['sysupgrade'], $i, 1);
					$i--;
				}
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
		if(isset($router_tmp[$i]['hersteller']) != true) {
			echo("Unbekannten Hersteller im Dateinamen gefunden, bitte Script updaten! (".$files['beta']['factory'][$i].")<br />");
		} else {
			$router[$i] = new ffrouter();
			$router[$i]->hersteller = $router_tmp[$i]['hersteller'];
			$router[$i]->version = $router_tmp[$i]['version'];
			$router[$i]->modell = $router_tmp[$i]['modell'];
			$router[$i]->betafactory = 1;
			$router[$i]->betafactorylink = $firmware_download_path."beta/factory/".$files['beta']['factory'][$i];
		}
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
		if(isset($router_tmp[$i]['hersteller']) != true) {
			echo("Unbekannten Hersteller im Dateinamen gefunden, bitte Script updaten! (".$files['beta']['sysupgrade'][$i].")<br />");
		} else {
			$router_neu = 1;
			for( $j=0; $j<count($router); $j++) {
				if((strcasecmp($router[$j]->hersteller, $router_tmp[$i]['hersteller']) == 0) && (strcasecmp($router[$j]->modell, $router_tmp[$i]['modell']) == 0) && (strcasecmp($router[$j]->version, $router_tmp[$i]['version']) == 0)) {
					$router[$j]->betasysupgrade = 1;
					$router[$j]->betasysupgradelink = $firmware_download_path."beta/sysupgrade/".$files['beta']['sysupgrade'][$i];
					$router_neu = 0;
				}
			} 
			if($router_neu == 1) {
				$router[$j] = new ffrouter();
				$router[$j]->hersteller = $router_tmp[$i]['hersteller'];
				$router[$j]->version = $router_tmp[$i]['version'];
				$router[$j]->modell = $router_tmp[$i]['modell'];
				$router[$j]->betasysupgrade = 1;
				$router[$j]->betasysupgradelink = $firmware_download_path."beta/sysupgrade/".$files['beta']['sysupgrade'][$i];
			}
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
		if(isset($router_tmp[$i]['hersteller']) != true) {
			echo("Unbekannten Hersteller im Dateinamen gefunden, bitte Script updaten! (".$files['broken']['factory'][$i].")<br />");
		} else {
			$router_neu = 1;
			for( $j=0; $j<count($router); $j++) {
				if((strcasecmp($router[$j]->hersteller, $router_tmp[$i]['hersteller']) == 0) && (strcasecmp($router[$j]->modell, $router_tmp[$i]['modell']) == 0) && (strcasecmp($router[$j]->version, $router_tmp[$i]['version']) == 0)) {
					$router[$j]->brokenfactory = 1;
					$router[$j]->brokenfactorylink = $firmware_download_path."broken/factory/".$files['broken']['factory'][$i];
					$router_neu = 0;
				}
			} 
			if($router_neu == 1) {
				$router[$j] = new ffrouter();
				$router[$j]->hersteller = $router_tmp[$i]['hersteller'];
				$router[$j]->version = $router_tmp[$i]['version'];
				$router[$j]->modell = $router_tmp[$i]['modell'];
				$router[$j]->brokenfactory = 1;
				$router[$j]->brokenfactorylink = $firmware_download_path."broken/factory/".$files['broken']['factory'][$i];
			}
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
		if(isset($router_tmp[$i]['hersteller']) != true) {
			echo("Unbekannten Hersteller im Dateinamen gefunden, bitte Script updaten! (".$files['broken']['sysupgrade'][$i].")<br />");
		} else {
			$router_neu = 1;
			for( $j=0; $j<count($router); $j++) {
				if((strcasecmp($router[$j]->hersteller, $router_tmp[$i]['hersteller']) == 0) && (strcasecmp($router[$j]->modell, $router_tmp[$i]['modell']) == 0) && (strcasecmp($router[$j]->version, $router_tmp[$i]['version']) == 0)) {
					$router[$j]->brokensysupgrade = 1;
					$router[$j]->brokensysupgradelink = $firmware_download_path."broken/sysupgrade/".$files['broken']['sysupgrade'][$i];
					$router_neu = 0;
				}
			} 
			if($router_neu == 1) {
				$router[$j] = new ffrouter();
				$router[$j]->hersteller = $router_tmp[$i]['hersteller'];
				$router[$j]->version = $router_tmp[$i]['version'];
				$router[$j]->modell = $router_tmp[$i]['modell'];
				$router[$j]->brokensysupgrade = 1;
				$router[$j]->brokensysupgradelink = $firmware_download_path."broken/sysupgrade/".$files['broken']['sysupgrade'][$i];
			}
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
		if(isset($router_tmp[$i]['hersteller']) != true) {
			echo("Unbekannten Hersteller im Dateinamen gefunden, bitte Script updaten! (".$files['experimental']['factory'][$i].")<br />");
		} else {
			$router_neu = 1;
			for( $j=0; $j<count($router); $j++) {
				if((strcasecmp($router[$j]->hersteller, $router_tmp[$i]['hersteller']) == 0) && (strcasecmp($router[$j]->modell, $router_tmp[$i]['modell']) == 0) && (strcasecmp($router[$j]->version, $router_tmp[$i]['version']) == 0)) {
					$router[$j]->experimentalfactory = 1;
					$router[$j]->experimentalfactorylink = $firmware_download_path."experimental/factory/".$files['experimental']['factory'][$i];
					$router_neu = 0;
				}
			} 
			if($router_neu == 1) {
				$router[$j] = new ffrouter();
				$router[$j]->hersteller = $router_tmp[$i]['hersteller'];
				$router[$j]->version = $router_tmp[$i]['version'];
				$router[$j]->modell = $router_tmp[$i]['modell'];
				$router[$j]->experimentalfactory = 1;
				$router[$j]->experimentalfactorylink = $firmware_download_path."experimental/factory/".$files['experimental']['factory'][$i];
			}
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
		if(isset($router_tmp[$i]['hersteller']) != true) {
			echo("Unbekannten Hersteller im Dateinamen gefunden, bitte Script updaten! (".$files['experimental']['sysupgrade'][$i].")<br />");
		} else {
			$router_neu = 1;
			for( $j=0; $j<count($router); $j++) {
				if((strcasecmp($router[$j]->hersteller, $router_tmp[$i]['hersteller']) == 0) && (strcasecmp($router[$j]->modell, $router_tmp[$i]['modell']) == 0) && (strcasecmp($router[$j]->version, $router_tmp[$i]['version']) == 0)) {
					$router[$j]->experimentalsysupgrade = 1;
					$router[$j]->experimentalsysupgradelink = $firmware_download_path."experimental/sysupgrade/".$files['experimental']['sysupgrade'][$i];
					$router_neu = 0;
				}
			} 
			if($router_neu == 1) {
				$router[$j] = new ffrouter();
				$router[$j]->hersteller = $router_tmp[$i]['hersteller'];
				$router[$j]->version = $router_tmp[$i]['version'];
				$router[$j]->modell = $router_tmp[$i]['modell'];
				$router[$j]->experimentalsysupgrade = 1;
				$router[$j]->experimentalsysupgradelink = $firmware_download_path."experimental/sysupgrade/".$files['experimental']['sysupgrade'][$i];
			}
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
		if($pos = stripos($files['stable']['factory'][$i], "lemaker", $pos_hersteller) !== false) {
			$router_tmp[$i]['hersteller'] = "LeMaker";
			$router_tmp[$i]['version'] = "Alle";
			$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['factory'][$i], $pos_hersteller+8, strlen($files['stable']['factory'][$i])-$pos_hersteller-15));
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
		if(isset($router_tmp[$i]['hersteller']) != true) {
			echo("Unbekannten Hersteller im Dateinamen gefunden, bitte Script updaten! (".$files['stable']['factory'][$i].")<br />");
		} else {
			$router_neu = 1;
			for( $j=0; $j<count($router); $j++) {
				if((strcasecmp($router[$j]->hersteller, $router_tmp[$i]['hersteller']) == 0) && (strcasecmp($router[$j]->modell, $router_tmp[$i]['modell']) == 0) && (strcasecmp($router[$j]->version, $router_tmp[$i]['version']) == 0)) {
					$router[$j]->stablefactory = 1;
					$router[$j]->stablefactorylink = $firmware_download_path."stable/factory/".$files['stable']['factory'][$i];
					$router_neu = 0;
				}
			} 
			if($router_neu == 1) {
				$router[$j] = new ffrouter();
				$router[$j]->hersteller = $router_tmp[$i]['hersteller'];
				$router[$j]->version = $router_tmp[$i]['version'];
				$router[$j]->modell = $router_tmp[$i]['modell'];
				$router[$j]->stablefactory = 1;
				$router[$j]->stablefactorylink = $firmware_download_path."stable/factory/".$files['stable']['factory'][$i];
			}
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
		if($pos = stripos($files['stable']['sysupgrade'][$i], "lemaker", $pos_hersteller) !== false) {
			$router_tmp[$i]['hersteller'] = "LeMaker";
			$router_tmp[$i]['version'] = "Alle";
			$router_tmp[$i]['modell'] = strtoupper(substr($files['stable']['sysupgrade'][$i], $pos_hersteller+8, strlen($files['stable']['sysupgrade'][$i])-$pos_hersteller-26));
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
		if(isset($router_tmp[$i]['hersteller']) != true) {
			echo("Unbekannten Hersteller im Dateinamen gefunden, bitte Script updaten! (".$files['stable']['sysupgrade'][$i].")\n\r");
		} else {
			$router_neu = 1;
			//echo("Hersteller: ".$router_tmp[$i]['hersteller']." Modell: ".$router_tmp[$i]['modell']." Version: ".$router_tmp[$i]['version']."<br />");
			for( $j=0; $j<count($router); $j++) {
				if((strcasecmp($router[$j]->hersteller, $router_tmp[$i]['hersteller']) == 0) && (strcasecmp($router[$j]->modell, $router_tmp[$i]['modell']) == 0) && (strcasecmp($router[$j]->version, $router_tmp[$i]['version']) == 0)) {
					$router[$j]->stablesysupgrade = 1;
					$router[$j]->stablesysupgradelink = $firmware_download_path."stable/sysupgrade/".$files['stable']['sysupgrade'][$i];
					$router_neu = 0;
				}
			} 
			if($router_neu == 1) {
				$router[$j] = new ffrouter();
				$router[$j]->hersteller = $router_tmp[$i]['hersteller'];
				$router[$j]->version = $router_tmp[$i]['version'];
				$router[$j]->modell = $router_tmp[$i]['modell'];
				$router[$j]->stablesysupgrade = 1;
				$router[$j]->stablesysupgradelink = $firmware_download_path."stable/sysupgrade/".$files['stable']['sysupgrade'][$i];
			}
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
?>