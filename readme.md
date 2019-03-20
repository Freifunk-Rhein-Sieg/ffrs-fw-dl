Freifunk Firmware Downloader
============================

Beschreibung
------------

Der Freifunk Firmware Downloader soll es Laien ermöglichen schneller und sicherer die zu ihrem Router passende Firmware zu finden. Der Freifunker kann nacheinander aus automatisch generierten Listen seinen Router auswählen: Hersteller -> Modell -> Version und dann festlegen ob es eine Erstinstallation ist oder nicht, sowie am Ende wählen welches Entwicklungsstadium die Firmware haben soll. Dabei wird automatisch gewarnt (Download Button verändert die Farbe) falls nicht "stable" ausgewählt wird. Zusätzlich werden etliche der Router auch als Grafik (Front & Back Ansicht) gezeigt, so dass der Freifunker auf den ersten Blick erkennen kann wenn er den falschen Router ausgewählt hat. Einmal anschauen kann man sich den Firmware Downlaoder unter http://downloader.freifunk-siegburg.de/.

Der Freifunk Firmware Downloader kann auch mit Metacommunities umgehen, bei der, vor der Auswahl der eigentlichen Firmware, noch eine Auswahl der Community/Subcommunity oder Technologie auszuwählen ist. Als Beispiel kann hier die Metacommunity Troisdorf dienen, unter http://downloader.freifunk-troisdorf.de/ könnt ihr euch das anschauen.

Technik
-------

Der Freifunk Firmware Downloader erzeugt auf Grund der angegebenen Metadaten in der community-config.inc.php eine Auswahlseite für die Metacommunity (oder bei nur einer vorhandenen Community Konfiguration überspringt er diese Vorauswahl). Nach der Auswahl der Community (plus optionaler Subauswahl) erscheint der Link der zum eigentlichen Firmware Downloader führt. Der Freifunk Firmware Downloader scannt dann das in der community-config.inc.php angegebene Verzeichnis auf Firmwares in den Unterverzeichnissen (beta/broken/experimental/stable) und dort in (factory/sysupgrade). Aus dem Ergebnis baut das PHP Script ein interaktives Javascript für die Auswahl und verwendet dabei Bootstrap für das Layout.

Bisher werden Router der folgenden Hersteller automatisch erkannt:

- 8devices
- Alfa
- Allnet
- AVM
- Buffalo
- D-Link
- GL-Inet
- LeMaker
- Linksys
- Meraki
- Netgear
- Nexx
- Onion
- Openmesh
- Raspberry Pi
- TP-Link
- Ubiquiti
- Western Digital
- x86

Soll eine Firmware für Router von anderen Herstellern angeboten werden muss erst das Script geändert werden! Bitte informiere uns dann über GitHub oder kontakt@freifunk-troisdorf.de.

Bilder
------

Die Bilder der Router kommen von Daniel Krah und sind lizensiert unter einer Creative Commons Namensnennung - Nicht-kommerziell - Weitergabe unter gleichen Bedingungen 4.0 International Lizenz (CC-BY NC SA).

Installation
------------

Den Freifunk Firmware Downloader in ein eigenes Unterverzeichnis des Webservers kopieren/entpacken, auf dem auch die Firmwares liegen. In der community-config.inc.php werden dann diverse Variablen gesetzt:

- $texte ist das Array mit den einzelnen Überschriften/Texten für die Auswahlstufen
- $community ist das Array mit den Metadaten für die Metacommunity und die einzelnen Subcommunites. Wenn hier nur eine Community angegeben wird wird die Communtiyauswahl übersprungen und direkt auf die Firmware Downloader Seite verwiesen.
```
0 => array( // ID die bei 0 Anfängt und hochgezählt wird
	"community_id" => 0, // ID der Community, wiederholt sich bei den zusammengehörigen Subcommunities
	"name" => "Name der Community",
	"head_titel" => "Header Titel",
	"head_text" => "Header Text",
	"link_text" => "Header Link Text",
	"link_url" => "Header Link URL",
	"logo_alt" => "Logo Alt Text",
	"logo_url" => "Logo URL",
	"lang_titel" => "Langtext Titel",
	"lang_text" => "Langtext Text",
	"download_path" => "Pfad zur Firmware", // Bleibt bei der Metacommunity leer
	"sub_auswahl" => "Name der Subcommunity" // Wird nur verwendet wenn die Community Subcommunites/Technologien als Auswahl hat,
	"geojson" => "geojson/filename.geojson"
),
```

In der config.inc.php sind die Angaben über die Hersteller, Entwicklungsstufen & Art der Firmware Installation. Hier muss man normalerweise nichts anpassen, außer man verwendet Firmwares für Router von Herstellern, die noch nicht integriert sind, dann bitten wir allerdings auch um Kontaktaufnahme (kontakt@freifunk-troisdorf.de, bzw. im github).
- $entwicklung = Entwicklungsstufen der Firmware (beta/broken/experimental/stable) - (sollte man in Ruhe lassen normalerweise)
- $installation = Art der Installation (factory/sysupgrade) - (sollte man in Ruhe lassen normalerweise)
- $hersteller = Array mit Informationen zu den Herstellern
- -> name = Name des Herstellers
- -> filename = Name des Herstellers wie er in den Dateinamen der Firmware auftaucht
- -> offset_modell = Offset für das Parsen des Modells im Dateinamen der Firmware
- -> offset_version = Offset für das Parsen der Version im Dateinamen der Firmware
- $offset_sysupgrade = Offset für "-sysupgrade" im Dateinamen der Firmware

Die Firmware liegt in folgenden Unterverzeichnissen:
* firmware/
	* beta/
		* factory/
		* sysupgrade/
	* broken/
		* factory/
		* sysupgrade/
	* experimental/
		* factory/
		* sysupgrade/
	* stable/
		* factory/
		* sysupgrade/
		
Das Layout der Seite baut auf Bootstrap (http://getbootstrap.com/) auf und kann mittels eigener angepaster StyleSheets sehr einfach verändert werden. Dank Bootstrap ist das Layout von sich aus direkt responsive.

Code
----

Der Code ist nun halbwegs aufgeräumt und generiert aus dem PHP heraus ein Objekt ($router der Klasse: ffrouter) und übergibt ein daraus erzeugtes JSON an den Javascript Code zum erzeugen der Menustruktur.

Lizenz
------

* author    Leo Maroni Ursprung: Caspar Armster
* copyright 2017 by Leo Maroni, Caspar Armster, [Freifunk Hennef](http://www.freifunk-hennef.de/ "Freifunk Hennef") / [Freie Netzwerker e.V.](http://www.freie-netzwerker.de/ "Freie Netzwerker e.V.")
* license   Licensed under GPLv3
