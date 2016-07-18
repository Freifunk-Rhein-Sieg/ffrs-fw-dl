<?php
/**
* @author    Caspar Armster
* @copyright 2016 Caspar Armster, Freifunk Hennef/Freie Netzwerker e.V. (www.freifunk-hennef.de / www.freie-netzwerker.de)
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

/** Beispiel für eine einzelne Community. Das Array entkommentieren und ausfüllen, sowie das Array der Meta-Community löschen oder auskommentieren und der Downloader leitet dann automatisch direkt auf die Firmware Download Seite um.
*	$community = array(
*		0  => array(
*			"community_id" => 0,
*			"name" => "Freifunk Hennef",
*			"head_titel" => "Freifunk Hennef Firmware",
*			"head_text" => "Auf dieser Seite können Sie die passende Firmware für ihren Router in Hennef auswählen und herunterladen!",
*			"link_text" => "Zurück zur Startseite",
*			"link_url" => "http://www.freifunk-hennef.de/",
*			"logo_alt" => "Freifunk Hennef Logo",
*			"logo_url" => "images/Freifunk-logo-hennef-klein-200.png",
*			"lang_titel" => "Freifunk Hennef Firmware Auswahl",
*			"lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal mit einer Freifunk Firmware flashen und welches Entwicklungsstadium die Firmware haben soll.<br /><br />Bitte wählen Sie -stable- im Entwicklungsstadium aus, wenn Sie nicht genau wissen was Sie sonst erwartet!",
*			"download_path" => "",
*			"sub_auswahl" => ""
*		)
*	);
*/

/** Beispiel für eine Meta-Community.
*/
	$community = array(
		0  => array(
			"community_id" => 0,
			"name" => "Freifunk Rhein-Sieg",
			"head_titel" => "Freifunk Rhein-Sieg Firmware",
			"head_text" => "Auf dieser Seite können Sie die passende Community für die Firmware für ihren Router aus dem Rhein-Sieg-Kreis auswählen!",
			"link_text" => "Zurück zur Startseite",
			"link_url" => "http://www.freifunk-rhein-sieg.de/",
			"logo_alt" => "Freifunk Rhein-Sieg-Kreis Logo",
			"logo_url" => "images/Freifunk-logo-rhein-sieg-klein-200.png",
			"lang_titel" => "Freifunk Rhein-Sieg Community Auswahl",
			"lang_text" => "Bitte suchen Sie die passende Community aus, indem Sie die Community und gegebenenfalls noch einen Bereich in der Community auswählen.<br />Sie werden dann weitergeleitet auf die eigentliche Firmware Download Seite für die gewähle Community.",
			"download_path" => "",
			"sub_auswahl" => ""
		),
		1  => array(
			"community_id" => 1,
			"name" => "Freifunk Hennef",
			"head_titel" => "Freifunk Hennef Firmware",
			"head_text" => "Auf dieser Seite können Sie die passende Firmware für ihren Router in Hennef auswählen und herunterladen!",
			"link_text" => "Zurück zur Startseite",
			"link_url" => "http://downloader.freifunk-rhein-sieg.de/downloader/",
			"logo_alt" => "Freifunk Hennef Logo",
			"logo_url" => "images/Freifunk-logo-hennef-klein-200.png",
			"lang_titel" => "Freifunk Hennef Firmware Auswahl",
			"lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal mit einer Freifunk Firmware flashen und welches Entwicklungsstadium die Firmware haben soll.<br /><br />Bitte wählen Sie -stable- im Entwicklungsstadium aus, wenn Sie nicht genau wissen was Sie sonst erwartet!",
			"download_path" => "../fwuploads/hennef/",
			"sub_auswahl" => ""
		),
		2  => array(
			"community_id" => 2,
			"name" => "Freifunk Lohmar",
			"head_titel" => "Freifunk Lohmar Firmware",
			"head_text" => "Auf dieser Seite können Sie die passende Firmware für ihren Router in Lohmar auswählen und herunterladen!",
			"link_text" => "Zurück zur Startseite",
			"link_url" => "http://downloader.freifunk-rhein-sieg.de/downloader/",
			"logo_alt" => "Freifunk Lohmar Logo",
			"logo_url" => "images/Freifunk-logo-lohmar-klein-200.png",
			"lang_titel" => "Freifunk Lohmar Firmware Auswahl",
			"lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal mit einer Freifunk Firmware flashen und welches Entwicklungsstadium die Firmware haben soll.<br /><br />Bitte wählen Sie -stable- im Entwicklungsstadium aus, wenn Sie nicht genau wissen was Sie sonst erwartet!",
			"download_path" => "../fwuploads/lohmar/",
			"sub_auswahl" => ""
		),
		3  => array(
			"community_id" => 3,
			"name" => "Freifunk Meckenheim",
			"head_titel" => "Freifunk Meckenheim Firmware",
			"head_text" => "Auf dieser Seite können Sie die passende Firmware für ihren Router in Meckenheim auswählen und herunterladen!",
			"link_text" => "Zurück zur Startseite",
			"link_url" => "http://downloader.freifunk-rhein-sieg.de/downloader/",
			"logo_alt" => "Freifunk Meckenheim Logo",
			"logo_url" => "images/Freifunk-logo-meckenheim-klein-200.png",
			"lang_titel" => "Freifunk Meckenheim Firmware Auswahl",
			"lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal mit einer Freifunk Firmware flashen und welches Entwicklungsstadium die Firmware haben soll.<br /><br />Bitte wählen Sie -stable- im Entwicklungsstadium aus, wenn Sie nicht genau wissen was Sie sonst erwartet!",
			"download_path" => "../fwuploads/meckenheim/",
			"sub_auswahl" => ""
		),
		4  => array(
			"community_id" => 4,
			"name" => "Freifunk Much",
			"head_titel" => "Freifunk Much Firmware",
			"head_text" => "Auf dieser Seite können Sie die passende Firmware für ihren Router in Much auswählen und herunterladen!",
			"link_text" => "Zurück zur Startseite",
			"link_url" => "http://downloader.freifunk-rhein-sieg.de/downloader/",
			"logo_alt" => "Freifunk Rhein-Sieg Logo",
			"logo_url" => "images/Freifunk-logo-rhein-sieg-klein-200.png",
			"lang_titel" => "Freifunk Much Firmware Auswahl",
			"lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal mit einer Freifunk Firmware flashen und welches Entwicklungsstadium die Firmware haben soll.<br /><br />Bitte wählen Sie -stable- im Entwicklungsstadium aus, wenn Sie nicht genau wissen was Sie sonst erwartet!",
			"download_path" => "../fwuploads/much/",
			"sub_auswahl" => ""
		),
		5  => array(
			"community_id" => 5,
			"name" => "Freifunk Neunkirchen-Seelscheid",
			"head_titel" => "Freifunk Neunkirchen-Seelscheid Firmware",
			"head_text" => "Auf dieser Seite können Sie die passende Firmware für ihren Router in Neunkirchen-Seelscheid auswählen und herunterladen!",
			"link_text" => "Zurück zur Startseite",
			"link_url" => "http://downloader.freifunk-rhein-sieg.de/downloader/",
			"logo_alt" => "Freifunk Rhein-Sieg Logo",
			"logo_url" => "images/Freifunk-logo-rhein-sieg-klein-200.png",
			"lang_titel" => "Freifunk Neunkirchen-Seelscheid Firmware Auswahl",
			"lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal mit einer Freifunk Firmware flashen und welches Entwicklungsstadium die Firmware haben soll.<br /><br />Bitte wählen Sie -stable- im Entwicklungsstadium aus, wenn Sie nicht genau wissen was Sie sonst erwartet!",
			"download_path" => "../fwuploads/neunkirchen/",
			"sub_auswahl" => ""
		),
		6  => array(
			"community_id" => 6,
			"name" => "Freifunk Niederkassel",
			"head_titel" => "Freifunk Niederkassel Firmware",
			"head_text" => "Auf dieser Seite können Sie die passende Firmware für ihren Router in Niederkassel auswählen und herunterladen!",
			"link_text" => "Zurück zur Startseite",
			"link_url" => "http://downloader.freifunk-rhein-sieg.de/downloader/",
			"logo_alt" => "Freifunk Rhein-Sieg Logo",
			"logo_url" => "images/Freifunk-logo-rhein-sieg-klein-200.png",
			"lang_titel" => "Freifunk Niederkassel Firmware Auswahl",
			"lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal mit einer Freifunk Firmware flashen und welches Entwicklungsstadium die Firmware haben soll.<br /><br />Bitte wählen Sie -stable- im Entwicklungsstadium aus, wenn Sie nicht genau wissen was Sie sonst erwartet!",
			"download_path" => "../fwuploads/niederkassel/",
			"sub_auswahl" => ""
		),
		7  => array(
			"community_id" => 7,
			"name" => "Freifunk Rheinbach",
			"head_titel" => "Freifunk Rheinbach Firmware",
			"head_text" => "Auf dieser Seite können Sie die passende Firmware für ihren Router in Rheinbach auswählen und herunterladen!",
			"link_text" => "Zurück zur Startseite",
			"link_url" => "http://downloader.freifunk-rhein-sieg.de/downloader/",
			"logo_alt" => "Freifunk Rheinbach Logo",
			"logo_url" => "images/Freifunk-logo-rheinbach-klein-200.png",
			"lang_titel" => "Freifunk Rheinbach Firmware Auswahl",
			"lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal mit einer Freifunk Firmware flashen und welches Entwicklungsstadium die Firmware haben soll.<br /><br />Bitte wählen Sie -stable- im Entwicklungsstadium aus, wenn Sie nicht genau wissen was Sie sonst erwartet!",
			"download_path" => "../fwuploads/rheinbach/",
			"sub_auswahl" => ""
		),
		8  => array(
			"community_id" => 8,
			"name" => "Freifunk Ruppichteroth",
			"head_titel" => "Freifunk Ruppichteroth Firmware",
			"head_text" => "Auf dieser Seite können Sie die passende Firmware für ihren Router in Ruppichteroth auswählen und herunterladen!",
			"link_text" => "Zurück zur Startseite",
			"link_url" => "http://downloader.freifunk-rhein-sieg.de/downloader/",
			"logo_alt" => "Freifunk Ruppichteroth Logo",
			"logo_url" => "images/Freifunk-logo-ruppichteroth-klein-200.png",
			"lang_titel" => "Freifunk Ruppichteroth Firmware Auswahl",
			"lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal mit einer Freifunk Firmware flashen und welches Entwicklungsstadium die Firmware haben soll.<br /><br />Bitte wählen Sie -stable- im Entwicklungsstadium aus, wenn Sie nicht genau wissen was Sie sonst erwartet!",
			"download_path" => "../fwuploads/ruppichteroth/",
			"sub_auswahl" => ""
		),
		9  => array(
			"community_id" => 9,
			"name" => "Freifunk Sankt Augustin",
			"head_titel" => "Freifunk Sankt Augustin Firmware",
			"head_text" => "Auf dieser Seite können Sie die passende Firmware für ihren Router in Sankt Augustin auswählen und herunterladen!",
			"link_text" => "Zurück zur Startseite",
			"link_url" => "http://downloader.freifunk-rhein-sieg.de/downloader/",
			"logo_alt" => "Freifunk Rhein-Sieg Logo",
			"logo_url" => "images/Freifunk-logo-rhein-sieg-klein-200.png",
			"lang_titel" => "Freifunk Sankt Augustin Firmware Auswahl",
			"lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal mit einer Freifunk Firmware flashen und welches Entwicklungsstadium die Firmware haben soll.<br /><br />Bitte wählen Sie -stable- im Entwicklungsstadium aus, wenn Sie nicht genau wissen was Sie sonst erwartet!",
			"download_path" => "../fwuploads/sanktaugustin/",
			"sub_auswahl" => ""
		),
		10 => array(
			"community_id" => 10,
			"name" => "Freifunk Siegburg",
			"head_titel" => "Freifunk Siegburg Firmware",
			"head_text" => "Auf dieser Seite können Sie die passende Firmware für ihren Router in Siegburg auswählen und herunterladen!",
			"link_text" => "Zurück zur Startseite",
			"link_url" => "http://downloader.freifunk-rhein-sieg.de/downloader/",
			"logo_alt" => "Freifunk Rhein-Sieg Logo",
			"logo_url" => "images/Freifunk-logo-rhein-sieg-klein-200.png",
			"lang_titel" => "Freifunk Siegburg Firmware Auswahl",
			"lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal mit einer Freifunk Firmware flashen und welches Entwicklungsstadium die Firmware haben soll.<br /><br />Bitte wählen Sie -stable- im Entwicklungsstadium aus, wenn Sie nicht genau wissen was Sie sonst erwartet!",
			"download_path" => "../fwuploads/siegburg/",
			"sub_auswahl" => ""
		),
		11 => array(
			"community_id" => 11,
			"name" => "Freifunk Troisdorf",
			"head_titel" => "Freifunk Troisdorf Fußgängerzone Firmware",
			"head_text" => "Auf dieser Seite können Sie die passende Firmware für ihren Router in der Troisdorfer Fußgängerzone auswählen und herunterladen!",
			"link_text" => "Zurück zur Startseite",
			"link_url" => "http://downloader.freifunk-rhein-sieg.de/downloader/",
			"logo_alt" => "Freifunk Troisdorf Logo",
			"logo_url" => "images/Freifunk-logo-troisdorf-klein-200.png",
			"lang_titel" => "Freifunk Troisdorf Fußgängerzone Firmware Auswahl",
			"lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal mit einer Freifunk Firmware flashen und welches Entwicklungsstadium die Firmware haben soll.<br /><br />Bitte wählen Sie -stable- im Entwicklungsstadium aus, wenn Sie nicht genau wissen was Sie sonst erwartet!",
			"download_path" => "../fwuploads/troisdorf/inn/",
			"sub_auswahl" => "Fußgängerzone"
		),
		12 => array(
			"community_id" => 11,
			"name" => "Freifunk Troisdorf",
			"head_titel" => "Freifunk Troisdorf Firmware",
			"head_text" => "Auf dieser Seite können Sie die passende Firmware für ihren Router in Troisdorf auswählen und herunterladen!",
			"link_text" => "Zurück zur Startseite",
			"link_url" => "http://downloader.freifunk-rhein-sieg.de/downloader/",
			"logo_alt" => "Freifunk Troisdorf Logo",
			"logo_url" => "images/Freifunk-logo-troisdorf-klein-200.png",
			"lang_titel" => "Freifunk Troisdorf Firmware Auswahl",
			"lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal mit einer Freifunk Firmware flashen und welches Entwicklungsstadium die Firmware haben soll.<br /><br />Bitte wählen Sie -stable- im Entwicklungsstadium aus, wenn Sie nicht genau wissen was Sie sonst erwartet!",
			"download_path" => "../fwuploads/troisdorf/tdf/",
			"sub_auswahl" => "Troisdorf"
		),
		13 => array(
			"community_id" => 11,
			"name" => "Freifunk Troisdorf",
			"head_titel" => "Freifunk Troisdorf Flüchtlingsunterkunft Firmware",
			"head_text" => "Auf dieser Seite können Sie die passende Firmware für ihren Router in einer Troisdorfer Flüchtlingsunterkunft auswählen und herunterladen!",
			"link_text" => "Zurück zur Startseite",
			"link_url" => "http://downloader.freifunk-rhein-sieg.de/downloader/",
			"logo_alt" => "Freifunk Troisdorf Logo",
			"logo_url" => "images/Freifunk-logo-troisdorf-klein-200.png",
			"lang_titel" => "Freifunk Troisdorf Flüchtlingsunterkunft Firmware Auswahl",
			"lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal mit einer Freifunk Firmware flashen und welches Entwicklungsstadium die Firmware haben soll.<br /><br />Bitte wählen Sie -stable- im Entwicklungsstadium aus, wenn Sie nicht genau wissen was Sie sonst erwartet!",
			"download_path" => "../fwuploads/troisdorf/flu/",
			"sub_auswahl" => "Flüchtlingsunterkunft"
		),
		14 => array(
			"community_id" => 12,
			"name" => "Freifunk Wachtberg",
			"head_titel" => "Freifunk Wachtberg Firmware",
			"head_text" => "Auf dieser Seite können Sie die passende Firmware für ihren Router in Wachtberg auswählen und herunterladen!",
			"link_text" => "Zurück zur Startseite",
			"link_url" => "http://downloader.freifunk-rhein-sieg.de/downloader/",
			"logo_alt" => "Freifunk Wachtberg Logo",
			"logo_url" => "images/Freifunk-logo-wachtberg-klein-200.png",
			"lang_titel" => "Freifunk Wachtberg Firmware Auswahl",
			"lang_text" => "Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />Legen Sie anschließend fest, ob sie den Router zum ersten Mal mit einer Freifunk Firmware flashen und welches Entwicklungsstadium die Firmware haben soll.<br /><br />Bitte wählen Sie -stable- im Entwicklungsstadium aus, wenn Sie nicht genau wissen was Sie sonst erwartet!",
			"download_path" => "../fwuploads/wachtberg/",
			"sub_auswahl" => ""
		)
	);
?>
