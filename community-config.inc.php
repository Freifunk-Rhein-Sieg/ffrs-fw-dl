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
		    "name" => "Hennef",
		    "linktoseite" => "https://images.freifunk-hennef.de/downloader/firmware.php?id=0",
		    "geojson" => "geojson/hennef.geojson"
	    ),
	    1  => array(
		    "community_id" => 1,
		    "name" => "Königswinter",
		    "head_titel" => "Freifunk Königswinter Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Königswinter Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/königswinter/",
		    "sub_auswahl" => "",
		    "geojson" => "geojson/koenigswinter.geojson"
	    ),
	    2  => array(
		    "community_id" => 2,
		    "name" => "Lohmar",
		    "head_titel" => "Freifunk Lohmar Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Lohmar Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/lohmar/",
		    "sub_auswahl" => "",
		    "geojson" => "geojson/lohmar.geojson"
	    ),
	    3 => array(
		    "community_id" => 3,
		    "name" => "Meckenheim",
		    "head_titel" => "Freifunk Meckenheim Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Meckenheim Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/meckenheim/",
		    "sub_auswahl" => "",
		    "geojson" => "geojson/meckenheim.geojson"
	    ),
	    4 => array(
		    "community_id" => 4,
		    "name" => "Much",
		    "head_titel" => "Freifunk Much Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Much Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/much/",
		    "sub_auswahl" => "",
		    "geojson" => "geojson/much.geojson"
	    ),
	    5 => array(
		    "community_id" => 5,
		    "name" => "Neunkirchen",
		    "head_titel" => "Freifunk Neunkirchen Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Neunkirchen Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/neunkirchen/",
		    "sub_auswahl" => "",
		    "geojson" => "geojson/neunkirchen.geojson"
	    ),
	    6 => array(
		    "community_id" => 6,
		    "name" => "Niederkassel",
		    "head_titel" => "Freifunk Niederkassel Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Niederkassel Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/niederkassel/",
		    "sub_auswahl" => "",
		    "geojson" => "geojson/niederkassel.geojson"
	    ),
	    7 => array(
		    "community_id" => 7,
		    "name" => "Rheinbach",
		    "head_titel" => "Freifunk Rheinbach Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Niederkassel Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/rheinbach/",
		    "sub_auswahl" => "",
		    "geojson" => "geojson/rheinbach.geojson"
	    ),
	    8 => array(
		    "community_id" => 8,
		    "name" => "Ruppichteroth",
		    "head_titel" => "Freifunk Ruppichteroth Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Ruppichteroth Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/ruppichteroth/",
		    "sub_auswahl" => "",
		    "geojson" => "geojson/ruppichteroth.geojson"
	    ),
	    9  => array(
		    "community_id" => 9,
		    "name" => "Sankt Augustin",
		    "head_titel" => "Freifunk Sankt Augustin Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Sankt Augustin Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/sanktaugustin/",
		    "sub_auswahl" => "",
		    "geojson" => "geojson/staugustin.geojson"
	    ),
        10 => array(
            "community_id" => 10,
            "name" => "Siegburg",
            "head_titel" => "Freifunk Siegburg Firmware",
            "link_text" => "Zurück zur Startseite",
            "link_url" => "http://www.freifunk-siegburg.de/",
            "lang_titel" => "Freifunk Siegburg Firmware Auswahl",
            "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
            "download_path" => "../fwuploads/siegburg/",
            "sub_auswahl" => "",
	        "geojson" => "geojson/siegburg.geojson"
        ),
        11  => array(
	        "community_id" => 11,
	        "name" => "Soziale Netzwerke",
	        "head_titel" => "Freifunk für Soziale Netzwerke Firmware",
	        "link_text" => "Zurück zur Startseite",
	        "link_url" => "http://downloader.freifunk-siegburg.de/",
	        "lang_titel" => "Freifunk Lohmar Firmware Auswahl",
	        "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
	        "download_path" => "../fwuploads/siegburg/SozialeNetzWerke/",
	        "sub_auswahl" => "",
	        "geojson" => ""
        ),
	    12  => array(
		    "community_id" => 12,
		    "name" => "Troisdorf",
		    "head_titel" => "Freifunk Troisdorf Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Troisdorf Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/troisdorf/tdf",
		    "sub_auswahl" => "",
		    "geojson" => "geojson/troisdorf.geojson"
	    ),
	    13  => array(
		    "community_id" => 13,
		    "name" => "Troisdorf - Fußgängerzone",
		    "head_titel" => "Freifunk Troisdorf Fußgänerzone Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Troisdorf Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/troisdorf/inn",
		    "sub_auswahl" => "",
		    "geojson" => ""
	    ),
	    14  => array(
		    "community_id" => 14,
		    "name" => "Wachtberg",
		    "head_titel" => "Freifunk Wachtberg Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Wachtberg Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/wachtberg",
		    "sub_auswahl" => "",
		    "geojson" => "geojson/wachtberg.geojson"
	    ),
    );
