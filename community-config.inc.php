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
		3  => array(
			"community_id" => 2,
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
		4  => array(
			"community_id" => 2,
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
		)
	);
?>
