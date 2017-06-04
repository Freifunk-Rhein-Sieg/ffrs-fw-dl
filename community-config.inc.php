<?php
/**
 * @author    Leo Maroni, Caspar Armster
 * @copyright 2017 Leo Maroni, Caspar Armster, Freifunk Hennef/Freie Netzwerker e.V. (www.freifunk-hennef.de / www.freie-netzwerker.de)
 * @license   Licensed under GPLv3
 */

/** Texte für die 2 Stufige Auswahl einer Meta-Community.
*/
    $texte = array(
        "ebene1_titel" => "Freifunk Community",
        "ebene1_text" => "Freifunk Community auswählen",
        "ebene2_titel" => "Bereich der Community",
        "ebene2_text" => "Bereich der Community auswählen",
        "ebene3_titel" => "Firmware Downloader",
        "ebene3_text" => "Zur Firmware-Download Seite"
    );

    $community = array(
        0 => array(
            "community_id" => 0,
            "name" => "Freifunk Siegburg",
            "head_titel" => "Freifunk Siegburg Firmware",
            "link_text" => "Zurück zur Startseite",
            "link_url" => "http://www.freifunk-siegburg.de/",
            "logo_alt" => "Freifunk Rhein-Sieg Logo",
            "logo_url" => "images/Freifunk-logo-siegburg-klein-200.png",
            "lang_titel" => "Freifunk Siegburg Firmware Auswahl",
            "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
            "download_path" => "fwuploads/siegburg/",
            "sub_auswahl" => "",
	        "geojson" => "geojson/siegburg.geojson"
        ),
        1  => array(
	        "community_id" => 1,
	        "name" => "Freifunk Lohmar",
	        "head_titel" => "Freifunk Lohmar Firmware",
	        "link_text" => "Zurück zur Startseite",
	        "link_url" => "http://downloader.freifunk-siegburg.de/",
	        "logo_alt" => "Freifunk Lohmar Logo",
	        "logo_url" => "images/Freifunk-logo-lohmar-klein-200.png",
	        "lang_titel" => "Freifunk Lohmar Firmware Auswahl",
	        "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
	        "download_path" => "fwuploads/lohmar/",
	        "sub_auswahl" => "",
	        "geojson" => "geojson/lohmar.geojson"
        ),
    );
