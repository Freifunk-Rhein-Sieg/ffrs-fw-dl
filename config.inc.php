<?php
/**
* @author    Caspar Armster, Leo Maroni
* @copyright 2017 Leo Maroni, Caspar Armster Freifunk Hennef/Freie Netzwerker e.V. (www.freifunk-hennef.de / www.freie-netzwerker.de), Freifunk Siegburg (www.frefunk-siegburg.de)
* @license   Licensed under GPLv3
*/

    $entwicklung = array(
        "beta",
        "experimental",
        "stable"
    );
    $installation = array(
        "factory",
        "sysupgrade"
    );

    for ($i = 0; $i < count($entwicklung); $i++) {
        for ($j = 0; $j < count($installation); $j++) {
            $variante[$entwicklung[$i]][$installation[$j]] = 0;
        }
    }

    $hersteller = array(
        array(
            "name" => "8devices",
            "filename" => "8devices",
            "offset_modell" => 9,
            "offset_version" => 4
        ),
        array(
            "name" => "Aerohive",
            "filename" => "aerohive",
            "offset_modell" => 9,
            "offset_version" => 4
        ),
        array(
            "name" => "Alfa",
            "filename" => "alfa",
            "offset_modell" => 5,
            "offset_version" => 4
        ),
        array(
            "name" => "Allnet",
            "filename" => "allnet",
            "offset_modell" => 7,
            "offset_version" => 4
        ),
        array(
            "name" => "Aruba",
            "filename" => "aruba",
            "offset_modell" => 6,
            "offset_version" => 4
        ),
        array(
            "name" => "Asus",
            "filename" => "asus",
            "offset_modell" => 4,
            "offset_version" => 4
        ),
        array(
            "name" => "AVM",
            "filename" => "avm",
            "offset_modell" => 4,
            "offset_version" => 4
        ),
        array(
            "name" => "Buffalo",
            "filename" => "buffalo",
            "offset_modell" => 8,
            "offset_version" => 4
        ),
        array(
            "name" => "China",
            "filename" => "zbt",
            "offset_modell" => 4,
            "offset_version" => 4
        ),
        array(
            "name" => "China (alt)",
            "filename" => "-a5-",
            "offset_modell" => 0,
            "offset_version" => 4
        ),
        array(
            "name" => "D-Link",
            "filename" => "d-link",
            "offset_modell" => 7,
            "offset_version" => -1
        ),
        array(
            "name" => "Devolo",
            "filename" => "devolo",
            "offset_modell" => 7,
            "offset_version" => -1
        ),
        array(
            "name" => "Enterasys",
            "filename" => "enterasys",
            "offset_modell" => 7,
            "offset_version" => -1
        ),
        array(
            "name" => "GL-Inet",
            "filename" => "gl",
            "offset_modell" => 3,
            "offset_version" => 4
        ),
        array(
            "name" => "GL-Inet (alt)",
            "filename" => "gl-inet",
            "offset_modell" => 8,
            "offset_version" => -1
        ),
        array(
            "name" => "LeMaker",
            "filename" => "lemaker",
            "offset_modell" => 8,
            "offset_version" => 4
        ),
        array(
            "name" => "Linksys",
            "filename" => "linksys",
            "offset_modell" => 8,
            "offset_version" => 4
        ),
        array(
            "name" => "Meraki",
            "filename" => "meraki",
            "offset_modell" => 7,
            "offset_version" => 4
        ),
        array(
            "name" => "Netgear",
            "filename" => "netgear",
            "offset_modell" => 8,
            "offset_version" => 4
        ),
        array(
            "name" => "Nexx",
            "filename" => "nexx",
            "offset_modell" => 5,
            "offset_version" => 4
        ),
        array(
            "name" => "Ocedo",
            "filename" => "ocedo",
            "offset_modell" => 6,
            "offset_version" => 4
        ),
        array(
            "name" => "Onion",
            "filename" => "onion",
            "offset_modell" => 6,
            "offset_version" => 4
        ),
        array(
            "name" => "Openmesh",
            "filename" => "openmesh",
            "offset_modell" => 9,
            "offset_version" => 4
        ),
        array(
            "name" => "Raspberry Pi",
            "filename" => "raspberry-pi",
            "offset_modell" => 13,
            "offset_version" => 4
        ),
        array(
            "name" => "Raspberry Pi",
            "filename" => "raspberrypi",
            "offset_modell" => 12,
            "offset_version" => 4
        ),
        array(
            "name" => "TP-Link",
            "filename" => "tp-link",
            "offset_modell" => 8,
            "offset_version" => -1
        ),
        array(
            "name" => "Ubiquiti",
            "filename" => "ubiquiti",
            "offset_modell" => 9,
            "offset_version" => 4
        ),
        array(
            "name" => "UBNT",
            "filename" => "ubnt",
            "offset_modell" => 5,
            "offset_version" => 4
        ),
        array(
            "name" => "VoCore",
            "filename" => "vocore",
            "offset_modell" => 0,
            "offset_version" => 4
        ),
        array(
            "name" => "Western Digital",
            "filename" => "-wd-",
            "offset_modell" => 3,
            "offset_version" => 4
        ),
        array(
            "name" => "x86",
            "filename" => "x86",
            "offset_modell" => 4,
            "offset_version" => 4
        ),
        array(
            "name" => "Xiaomi",
            "filename" => "xiaomi",
            "offset_modell" => 4,
            "offset_version" => 4
        ),
        array(
            "name" => "Zyxel",
            "filename" => "zyxel",
            "offset_modell" => 6,
            "offset_version" => 4
        )
    );
    $anzahl_hersteller = count($hersteller);

    $offset_sysupgrade = array(
        0 => 0,
        1 => 11
    );
