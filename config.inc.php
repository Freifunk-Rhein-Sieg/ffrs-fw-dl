<?php
/**
* @author    Caspar Armster
* @copyright 2016 Caspar Armster, Freifunk Hennef
* @license   Licensed under GPLv3
* 
*/

	$firmware_download_path = "../firmware/";

	$variante['beta']['factory'] = 0;
	$variante['beta']['sysupgrade'] = 0;
	$variante['broken']['factory'] = 0;
	$variante['broken']['sysupgrade'] = 0;
	$variante['experimental']['factory'] = 0;
	$variante['experimental']['sysupgrade'] = 0;
	$variante['stable']['factory'] = 0;
	$variante['stable']['sysupgrade'] = 0;

	$hersteller = array(
		0  => "8devices",
    	1  => "Alfa",
		2  => "Allnet",
    	3  => "Buffalo",
    	4  => "D-Link",
    	5  => "GL-Inet",
		6  => "LeMaker",
    	7  => "Linksys",
		8  => "Meraki",
    	9  => "Netgear",
    	10 => "Onion",
		11 => "Raspberry Pi",
    	12 => "TP-Link",
    	13 => "Ubiquiti",
    	14 => "Western Digital",
    	15 => "x86",
	);
?>