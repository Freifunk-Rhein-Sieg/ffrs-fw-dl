<?php
/**
* @author    Caspar Armster
* @copyright 2016 Caspar Armster, Freifunk Hennef
* @license   Licensed under GPLv3
* 
*/

	$text_h1 = "Freifunk Hennef Firmware";
	$text_h2 = "Auf dieser Seite können Sie die passende Firmware für ihren Router in Hennef auswählen und herunterladen!";
	$link_h2_text = "Zurück zur Startseite";
	$link_h2_url = "http://www.freifunk-hennef.de/";
	$logo_url = "images/Freifunk-logo-hennef-klein-200.png";
	$logo_alt = "Freifunk Hennef Logo";

	$firmware_download_path = "../firmware/";

	$entwicklung = array(
		0 => "beta",
		1 => "broken",
		2 => "experimental",
		3 => "stable"
	);
	$installation = array(
		0 => "factory",
		1 => "sysupgrade"
	);
	
	for( $i=0; $i<count($entwicklung); $i++ ) {
		for( $j=0; $j<count($installation); $j++ ) {
			$variante[$entwicklung[$i]][$installation[$j]] = 0;
		}
	}

	$hersteller = array(
		0  => array(
			"name" => "8devices",
			"filename" => "8devices",
			"offset_modell" => 9,
			"offset_version" => 3
		),
    	1  => array(
    		"name" => "Alfa",
    		"filename" => "alfa",
    		"offset_modell" => 5,
    		"offset_version" => 4
		),
		2  => array(
			"name" => "Allnet",
			"filename" => "allnet",
			"offset_modell" => 7,
			"offset_version" => 4
		),
    	3  => array(
    		"name" => "Buffalo",
    		"filename" => "buffalo",
    		"offset_modell" => 8,
    		"offset_version" => 4
		),
    	4  => array(
    		"name" => "D-Link",
    		"filename" => "d-link",
    		"offset_modell" => 7,
    		"offset_version" => -1
		),
    	5  => array(
    		"name" => "GL-Inet",
    		"filename" => "gl-inet",
    		"offset_modell" => 8,
    		"offset_version" => -1
		),
		6  => array(
			"name" => "LeMaker",
			"filename" => "lemaker",
			"offset_modell" => 8,
			"offset_version" => 4
		),
    	7  => array(
    		"name" => "Linksys",
    		"filename" => "linksys",
    		"offset_modell" => 8,
    		"offset_version" => 4
		),
		8  => array(
			"name" => "Meraki",
			"filename" => "meraki",
			"offset_modell" => 7,
			"offset_version" => 4
		),
    	9  => array(
    		"name" => "Netgear",
    		"filename" => "netgear",
    		"offset_modell" => 8,
    		"offset_version" => 4
		),
    	10 => array(
    		"name" => "Onion",
    		"filename" => "onion",
    		"offset_modell" => 6,
    		"offset_version" => 4
		),
		11 => array(
    		"name" => "Openmesh",
    		"filename" => "openmesh",
    		"offset_modell" => 9,
    		"offset_version" => 4
		),
		12 => array(
			"name" => "Raspberry Pi",
			"filename" => "raspberry-pi",
			"offset_modell" => 13,
			"offset_version" => 4
		),
    	13 => array(
    		"name" => "TP-Link",
    		"filename" => "tp-link",
    		"offset_modell" => 8,
    		"offset_version" => -1
		),
    	14 => array(
    		"name" => "Ubiquiti",
    		"filename" => "ubiquiti",
    		"offset_modell" => 9,
    		"offset_version" => 4
		),
    	15 => array(
    		"name" => "Western Digital",
    		"filename" => "-wd-",
    		"offset_modell" => 3,
    		"offset_version" => 4
		),
    	16 => array(
    		"name" => "x86",
    		"filename" => "x86",
    		"offset_modell" => 4,
    		"offset_version" => 4
		)
	);
	$anzahl_hersteller = count($hersteller);

	$offset_sysupgrade = array(
		0 => 0,
		1 => 11
	);
?>
