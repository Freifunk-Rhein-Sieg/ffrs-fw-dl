<?php
/**
 * @author    Leo Maroni, Caspar Armster
 * @copyright 2017 Leo Maroni, Caspar Armster
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
		    "linktoseite" => "https://kbu.freifunk.net/",
		    "geojson" => "geojson/alfter.geojson",
		    "show" => true
	    ),
	    1 => array(
		    "community_id" => 1,
		    "shortlinkname" => 'altenkirchen',
		    "name" => "Altenkirchen",
		    "head_titel" => "Freifunk Altenkirchen Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "https://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Altenkirchen Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/altenkirchen/",
		    "modules_path" => "https://images.freifunk-rhein-sieg.net/altenkirchen/packages",
		    "geojson" => "geojson/altenkirchen.geojson",
		    "sub_auswahl" => array(1,16),
		    "show" => true
	    ),
	    2 => array(
		    "community_id" => 2,
		    "shortlinkname" => 'badhonnef',
		    "name" => "Bad Honnef",
		    "linktoseite" => "https://kbu.freifunk.net/",
		    "geojson" => "geojson/badhonnef.geojson",
		    "show" => true
	    ),
	    3 => array(
		    "community_id" => 3,
		    "shortlinkname" => 'bonn',
		    "name" => "Bonn",
		    "linktoseite" => "https://kbu.freifunk.net/",
		    "geojson" => "geojson/bonn.geojson",
		    "show" => true
	    ),
	    4 => array(
		    "community_id" => 4,
		    "name" => "Bornheim",
		    "shortlinkname" => 'bornheim',
		    "linktoseite" => "https://kbu.freifunk.net/",
		    "geojson" => "geojson/bornheim.geojson",
		    "show" => true
	    ),
	    5 => array(
		    "community_id" => 5,
		    "name" => "Hennef",
		    "shortlinkname" => 'hennef',
		    "linktoseite" => "https://firmware.freifunk-hennef.de/firmware.php?id=0",
		    "geojson" => "geojson/hennef.geojson",
		    "show" => true
	    ),
	    6  => array(
		    "community_id" => 6,
		    "name" => "Königswinter",
		    "shortlinkname" => 'koenigswinter',
		    "linktoseite" => 'https://freifunk-koenigswinter.de',
		    "geojson" => "geojson/koenigswinter.geojson",
		    "show" => true
	    ),
	    7  => array(
		    "community_id" => 7,
		    "name" => "Lohmar",
		    "shortlinkname" => 'lohmar',
		    "head_titel" => "Freifunk Lohmar Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "https://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Lohmar Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/lohmar/",
		    "modules_path" => "https://images.freifunk-rhein-sieg.net/lohmar/packages",
		    "geojson" => "geojson/lohmar.geojson",
		    "sub_auswahl" => array(7,16),
		    "show" => true
	    ),
	    8 => array(
		    "community_id" => 8,
		    "shortlinkname" => 'meckenheim',
		    "name" => "Meckenheim",
		    "head_titel" => "Freifunk Meckenheim Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "https://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Meckenheim Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/troisdorf/multi/",
		    "modules_path" => "https://images.freifunk-rhein-sieg.net/troisdorf/multi/packages",
		    "geojson" => "geojson/meckenheim.geojson",
		    "show" => true
	    ),
	    9 => array(
		    "community_id" => 9,
		    "name" => "Much",
		    "shortlinkname" => 'much',
		    "head_titel" => "Freifunk Much Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "https://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Siegburg Umland Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/siegburg/uml/",
		    "modules_path" => "https://images.freifunk-rhein-sieg.net/siegburg/uml/packages",
		    "geojson" => "geojson/much.geojson",
		    "sub_auswahl" => array(9,22),
		    "show" => true
	    ),
	    10 => array(
		    "community_id" => 10,
		    "name" => "Neunkirchen",
		    "shortlinkname" => 'neunkirchen',
		    "head_titel" => "Freifunk Neunkirchen Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "https://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Siegburg Umland Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/siegburg/uml/",
		    "modules_path" => "https://images.freifunk-rhein-sieg.net/siegburg/uml/packages",
		    "geojson" => "geojson/neunkirchen.geojson",
		    "sub_auswahl" => array(10,22),
		    "show" => true
	    ),
	    11 => array(
		    "community_id" => 11,
		    "name" => "Niederkassel",
		    "shortlinkname" => 'niederkassel',
		    "head_titel" => "Freifunk Niederkassel Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "https://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Niederkassel Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/niederkassel/",
		    "modules_path" => "https://images.freifunk-rhein-sieg.net/niederkassel/packages",
		    "geojson" => "geojson/niederkassel.geojson",
		    "sub_auswahl" => array(11,16),
		    "show" => true
	    ),
	    12 => array(
		    "community_id" => 12,
		    "name" => "Rheinbach",
		    "shortlinkname" => 'rheinbach',
		    "linktoseite" => "http://images.freifunk-rheinbach.de/",
		    "geojson" => "geojson/rheinbach.geojson",
		    "show" => true
	    ),
	    13 => array(
		    "community_id" => 13,
		    "shortlinkname" => 'ruppichteroth',
		    "name" => "Ruppichteroth",
		    "head_titel" => "Freifunk Ruppichteroth Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "https://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Siegburg Umland Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/siegburg/uml/",
		    "modules_path" => "https://images.freifunk-rhein-sieg.net/siegburg/uml/packages",
		    "geojson" => "geojson/ruppichteroth.geojson",
		    "sub_auswahl" => array(13,22),
		    "show" => true
	    ),
	    14  => array(
		    "community_id" => 14,
		    "shortlinkname" => 'staugustin',
		    "name" => "Sankt Augustin",
		    "head_titel" => "Freifunk Sankt Augustin Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "https://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Sankt Augustin Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/sanktaugustin/",
		    "modules_path" => "https://images.freifunk-rhein-sieg.net/sanktaugustin/packages",
		    "geojson" => "geojson/staugustin.geojson",
		    "sub_auswahl" => array(14,16),
		    "show" => true
	    ),
        15 => array(
            "community_id" => 15,
            "shortlinkname" => 'siegburg-inn',
            "name" => "Siegburg",
            "head_titel" => "Freifunk Siegburg Firmware",
            "link_text" => "Zurück zur Startseite",
            "link_url" => "https://www.freifunk-siegburg.de/",
            "lang_titel" => "Freifunk Siegburg Firmware Auswahl",
            "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
            "download_path" => "../fwuploads/siegburg/inn/",
            "modules_path" => "https://images.freifunk-rhein-sieg.net/siegburg/inn/packages",
	        "geojson" => "geojson/siegburg.geojson",
            "sub_auswahl" => array(15,21,22),
            "show" => true
        ),
        16  => array(
	        "community_id" => 16,
	        "shortlinkname" => 'snw',
	        "name" => "Soziale Netzwerke",
	        "head_titel" => "Freifunk für Soziale Netzwerke Firmware",
	        "link_text" => "Zurück zur Startseite",
	        "link_url" => "https://downloader.freifunk-siegburg.de/",
	        "lang_titel" => "Freifunk LO SNW Firmware Auswahl",
	        "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
	        "download_path" => "../fwuploads/sozialenetzwerke/",
	        "modules_path" => "https://images.freifunk-rhein-sieg.net/sozialenetzwerke/packages",
	        "geojson" => "",
	        "show" => false
        ),
	    17 => array(
		    "community_id" => 17,
		    "shortlinkname" => 'swisttal',
		    "name" => "Swisttal",
		    "linktoseite" => "https://kbu.freifunk.net/",
		    "geojson" => "geojson/swisttal.geojson",
		    "show" => true
	    ),
	    18  => array(
		    "community_id" => 18,
		    "shortlinkname" => 'troisdorf',
		    "name" => "Troisdorf",
		    "head_titel" => "Freifunk Troisdorf Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "https://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Troisdorf Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/troisdorf/multi/",
		    "modules_path" => "https://images.freifunk-rhein-sieg.net/troisdorf/multi/packages",
		    "geojson" => "geojson/troisdorf.geojson",
		    "show" => true,

	    ),
	    19  => array(
		    "community_id" => 19,
		    "shortlinkname" => 'wachtberg',
		    "name" => "Wachtberg",
		    "head_titel" => "Freifunk Wachtberg Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "https://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Siegburg Umland Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/siegburg/uml/",
		    "modules_path" => "https://images.freifunk-rhein-sieg.net/siegburg/uml/packages",
		    "geojson" => "geojson/wachtberg.geojson",
		    "sub_auswahl" => array(19,22),
		    "show" => true
	    ),
	    20 => array(
		    "community_id" => 20,
		    "shortlinkname" => 'windeck',
		    "name" => "Windeck",
		    "head_titel" => "Freifunk Windeck Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "https://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Siegburg Umland Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/siegburg/uml/",
		    "modules_path" => "https://images.freifunk-rhein-sieg.net/siegburg/uml/packages",
		    "geojson" => "geojson/windeck.geojson",
		    "sub_auswahl" => array(20,22),
		    "show" => true
	    ),
	    21  => array(
		    "community_id" => 21,
		    "shortlinkname" => 'siegburg-uml',
		    "name" => "Siegburg - Umland",
		    "head_titel" => "Freifunk Siegburg Umland Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "https://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Siegburg Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/siegburg/uml/",
		    "modules_path" => "https://images.freifunk-rhein-sieg.net/siegburg/uml/packages",
		    "show" => false,
		    "geojson" => ""
	    ),
	    22  => array(
		    "community_id" => 22,
		    "shortlinkname" => 'siegburg-snw',
		    "name" => "Siegburg - Soziale Netzwerke",
		    "head_titel" => "Freifunk Siegburg Soziale Netzwerke Firmware",
		    "link_text" => "Zurück zur Startseite",
		    "link_url" => "https://downloader.freifunk-siegburg.de/",
		    "lang_titel" => "Freifunk Siegburg Soziale Netzwerke Firmware Auswahl",
		    "lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal auf dem Router eine Freifunk Firmware installieren und welches Entwicklungsstadium die Firmware haben soll.",
		    "download_path" => "../fwuploads/siegburg/snw/",
		    "modules_path" => "https://images.freifunk-rhein-sieg.net/siegburg/snw/packages",
		    "show" => false,
		    "geojson" => ""
	    ),		
    );
