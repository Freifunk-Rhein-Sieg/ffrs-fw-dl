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
		    "shortlinkname" => 'alfter',
		    "name" => "Alfter",
		    "linktoseite" => "https://images.ffkbu.de/umgebung/",
		    "geojson" => "geojson/alfter.geojson",
		    "show" => true
	    ),
	    1 => array(
		    "community_id" => 1,
		    "shortlinkname" => 'altenkirchen',
		    "name" => "Altenkirchen",
		    "head_titel" => "Freifunk Altenkirchen Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Altenkirchen Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/altenkirchen/images",
		    "modules_path" => "http://images.freifunk-rhein-sieg.de/altenkirchen/packages",
		    "geojson" => "geojson/altenkirchen.geojson",
		    "show" => true
	    ),
	    2 => array(
		    "community_id" => 2,
		    "shortlinkname" => 'badhonnef',
		    "name" => "Bad Honnef",
		    "linktoseite" => "https://images.ffkbu.de/umgebung/",
		    "geojson" => "geojson/badhonnef.geojson",
		    "show" => true
	    ),
	    3 => array(
		    "community_id" => 3,
		    "shortlinkname" => 'bonn',
		    "name" => "Bonn",
		    "linktoseite" => "https://images.ffkbu.de/bonn/",
		    "geojson" => "geojson/bonn.geojson",
		    "show" => true
	    ),
	    4 => array(
		    "community_id" => 4,
		    "name" => "Bornheim",
		    "shortlinkname" => 'bornheim',
		    "linktoseite" => "https://images.ffkbu.de/umgebung/",
		    "geojson" => "geojson/bornheim.geojson",
		    "show" => true
	    ),
	    5 => array(
		    "community_id" => 5,
		    "name" => "Hennef",
		    "shortlinkname" => 'hennef',
		    "linktoseite" => "https://images.freifunk-hennef.de/downloader/firmware.php?id=0",
		    "geojson" => "geojson/hennef.geojson",
		    "show" => true
	    ),
	    6  => array(
		    "community_id" => 6,
		    "name" => "Königswinter",
		    "shortlinkname" => 'koenigswinter',
		    "head_titel" => "Freifunk Königswinter Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Königswinter Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/königswinter/images/",
		    "modules_path" => "http://images.freifunk-rhein-sieg.de/königswinter/packages",
		    "geojson" => "geojson/koenigswinter.geojson",
		    "show" => true
	    ),
	    7  => array(
		    "community_id" => 7,
		    "name" => "Lohmar",
		    "shortlinkname" => 'lohmar',
		    "head_titel" => "Freifunk Lohmar Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Lohmar Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/lohmar/images/",
		    "modules_path" => "http://images.freifunk-rhein-sieg.de/lohmar/packages",
		    "geojson" => "geojson/lohmar.geojson",
		    "show" => true
	    ),
	    8 => array(
		    "community_id" => 8,
		    "shortlinkname" => 'meckenheim',
		    "name" => "Meckenheim",
		    "head_titel" => "Freifunk Meckenheim Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Meckenheim Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/meckenheim/images/",
		    "modules_path" => "http://images.freifunk-rhein-sieg.de/meckenheim/packages",
		    "geojson" => "geojson/meckenheim.geojson",
		    "show" => true
	    ),
	    9 => array(
		    "community_id" => 9,
		    "name" => "Much",
		    "shortlinkname" => 'much',
		    "head_titel" => "Freifunk Much Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Much Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/much/images/",
		    "modules_path" => "http://images.freifunk-rhein-sieg.de/much/packages",
		    "geojson" => "geojson/much.geojson",
		    "show" => true
	    ),
	    10 => array(
		    "community_id" => 10,
		    "name" => "Neunkirchen",
		    "shortlinkname" => 'neunkirchen',
		    "head_titel" => "Freifunk Neunkirchen Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Neunkirchen Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/neunkirchen/images/",
		    "modules_path" => "http://images.freifunk-rhein-sieg.de/neunkirchen/packages",
		    "geojson" => "geojson/neunkirchen.geojson",
		    "show" => true
	    ),
	    11 => array(
		    "community_id" => 11,
		    "name" => "Niederkassel",
		    "shortlinkname" => 'niederkassel',
		    "head_titel" => "Freifunk Niederkassel Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Niederkassel Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/niederkassel/images/",
		    "modules_path" => "http://images.freifunk-rhein-sieg.de/niederkassel/packages",
		    "geojson" => "geojson/niederkassel.geojson",
		    "show" => true
	    ),
	    12 => array(
		    "community_id" => 12,
		    "name" => "Rheinbach",
		    "shortlinkname" => 'rheinbach',
		    "head_titel" => "Freifunk Rheinbach Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Niederkassel Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/rheinbach/images/",
		    "modules_path" => "http://images.freifunk-rhein-sieg.de/rheinbach/packages",
		    "geojson" => "geojson/rheinbach.geojson",
		    "show" => true
	    ),
	    13 => array(
		    "community_id" => 13,
		    "shortlinkname" => 'ruppichteroth',
		    "name" => "Ruppichteroth",
		    "head_titel" => "Freifunk Ruppichteroth Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Ruppichteroth Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/ruppichteroth/images/",
		    "modules_path" => "http://images.freifunk-rhein-sieg.de/ruppichteroth/packages",
		    "geojson" => "geojson/ruppichteroth.geojson",
		    "show" => true
	    ),
	    14  => array(
		    "community_id" => 14,
		    "shortlinkname" => 'staugustin',
		    "name" => "Sankt Augustin",
		    "head_titel" => "Freifunk Sankt Augustin Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Sankt Augustin Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/sanktaugustin/images/",
		    "modules_path" => "http://images.freifunk-rhein-sieg.de/sanktaugustin/packages",
		    "geojson" => "geojson/staugustin.geojson",
		    "show" => true
	    ),
        15 => array(
            "community_id" => 15,
            "shortlinkname" => 'siegburg',
            "name" => "Siegburg",
            "head_titel" => "Freifunk Siegburg Firmware",
            "link_text" => "Zurück zur Startseite",
            "link_url" => "http://www.freifunk-siegburg.de/",
            "lang_titel" => "Freifunk Siegburg Firmware Auswahl",
            "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
            "download_path" => "../fwuploads/siegburg/images/",
            "modules_path" => "http://images.freifunk-rhein-sieg.de/siegburg/packages",
	        "geojson" => "geojson/siegburg.geojson",
            "show" => true
        ),
        16  => array(
	        "community_id" => 16,
	        "shortlinkname" => 'snw',
	        "name" => "Soziale Netzwerke",
	        "head_titel" => "Freifunk für SozLiale Netzwerke Firmware",
	        "link_text" => "Zurück zur Startseite",
	        "link_url" => "http://downloader.freifunk-siegburg.de/",
	        "lang_titel" => "Freifunk Lohmar Firmware Auswahl",
	        "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
	        "download_path" => "../fwuploads/sozialenetzwerke/images/",
	        "modules_path" => "http://images.freifunk-rhein-sieg.de/sozialenetzwerke/packages",
	        "geojson" => "",
	        "show" => true
        ),
	    17 => array(
		    "community_id" => 17,
		    "shortlinkname" => 'swisttal',
		    "name" => "Swisttal",
		    "linktoseite" => "https://images.ffkbu.de/umgebung/",
		    "geojson" => "geojson/swisttal.geojson",
		    "show" => true
	    ),
	    18  => array(
		    "community_id" => 18,
		    "shortlinkname" => 'troisdorf',
		    "name" => "Troisdorf",
		    "head_titel" => "Freifunk Troisdorf Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Troisdorf Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/troisdorf/tdf/images/",
		    "modules_path" => "http://images.freifunk-rhein-sieg.de/troisdorf/tdf/packages",
		    "sub_auswahl" => array(18,19,20),
		    "geojson" => "geojson/troisdorf.geojson",
		    "show" => true
	    ),
	    19  => array(
		    "community_id" => 19,
		    "shortlinkname" => 'troisdorf-inn',
		    "name" => "Troisdorf - Fußgängerzone",
		    "head_titel" => "Freifunk Troisdorf Fußgänerzone Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Troisdorf Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/troisdorf/inn/images/",
		    "modules_path" => "http://images.freifunk-rhein-sieg.de/troisdorf/inn/packages",
		    "show" => false,
		    "geojson" => ""
	    ),

	    20  => array(
		    "community_id" => 20,
		    "shortlinkname" => 'troisdorf-snw',
		    "name" => "Troisdorf - Soziale Netzwerke",
		    "head_titel" => "Freifunk für Troisdorfer Soziale Netzwerke Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk für Troisdorfer Soziale Netzwerke Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/troisdorf/flu/images/",
		    "modules_path" => "http://images.freifunk-rhein-sieg.de/troisdorf/flu/packages",
		    "show" => false,
		    "geojson" => ""
	    ),
	    21  => array(
		    "community_id" => 21,
		    "shortlinkname" => 'wachtberg',
		    "name" => "Wachtberg",
		    "head_titel" => "Freifunk Wachtberg Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "http://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Wachtberg Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/wachtberg/images/",
		    "modules_path" => "http://images.freifunk-rhein-sieg.de/wachtberg/packages",
		    "geojson" => "geojson/wachtberg.geojson",
		    "show" => true
	    ),
	    22 => array(
		    "community_id" => 22,
		    "shortlinkname" => 'windeck',
		    "name" => "Windeck",
		    "linktoseite" => "https://images.ffkbu.de/umgebung/",
		    "geojson" => "geojson/windeck.geojson",
		    "show" => true
	    ),
    );
