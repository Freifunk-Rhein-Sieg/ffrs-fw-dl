Freifunk Hennef Firmware Downloader
===================================

Beschreibung
------------

Der Freifunk Hennef Firmware Downloader soll es Laien ermöglichen schneller und sicherer die zu ihrem Router passende Firmware zu finden. Der Freifunker kann nacheinander aus automatisch generierten Listen seinen Router auswählen: Hersteller -> Modell -> Version und dann festlegen ob es eine Erstinstallation ist oder nicht, sowie am Ende wählen welches Entwicklungsstadium die Firmware haben soll. Dabei wird automatisch gewarnt (Download Button verändert die Farbe) falls nicht "stable" ausgewählt wird. Zusätzlich werden etliche der Router auch als Grafik (Front & Back Ansicht) gezeigt, so dass der Freifunker auf den ersten Blick erkennen kann wenn er den falschen Router ausgewählt hat.

Technik
-------

Der Freifunk Hennef Firmware Downloader scannt das in der config.inc.php angegebene Verzeichnis auf Firmwares in den Unterverzeichnissen (beta/broken/experimental/stable) und dort in (stable/sysupgrade). Aus dem Ergebnis baut das PHP Script ein interaktives Javascript für die Auswahl und verwendet dabei Bootstrap für das Layout.

Bisher werden Router der folgenden Hersteller automatisch erkannt:

- 8devices
- Alfa
- Allnet
- Buffalo
- D-Link
- GL-Inet
- LeMaker
- Linksys
- Meraki
- Netgear
- Onion
- Openmesh
- Raspberry Pi
- TP-Link
- Ubiquiti
- Western Digital
- x86

Soll eine Firmware für Router von anderen Herstellern angeboten werden muss erst das Script geändert werden!

Bilder
------

Die Bilder der Router kommen von Daniel Krah und sind lizensiert unter einer Creative Commons Namensnennung - Nicht-kommerziell - Weitergabe unter gleichen Bedingungen 4.0 International Lizenz (CC-BY NC SA).

Installation
------------

Den Freifunk Hennef Firmware Downloader in ein eigenes Unterverzeichnis des Webservers packen, auf dem auch die Firmwares liegen. In der config.inc.php werden dann diverse Variablen gesetzt:

- $text_h1/$text_h2/$link_h2_text/$link_h2_url/$logo_url/$logo_alt Texte & Logo im Header der Seite
- $firmware_download_path = Pfad zum Hauptverzeichnis der Firmware
- $entwicklung = Entwicklungsstufen der Firmware (beta/broken/experimental/stable) - (sollte man in Ruhe lassen normalerweise)
- $installation = Art der Installation (factory/sysupgrade) - (sollte man in Ruhe lassen normalerweise)
- $hersteller = Array mit Informationen zu den Herstellern
- -> name = Name des Herstellers
- -> filename = Name des Herstellers wie er in den Dateinamen der Firmware auftaucht
- -> offset_modell = Offset für das Parsen des Modells im Dateinamen der Firmware
- -> offset_version = Offset für das Parsen der Version im Dateinamen der Firmware
- $offset_sysupgrade = Offset für "-sysupgrade" im Dateinamen der Firmware
- Die Firmware liegt in folgenden Verzeichnissen:
- firmware/
-- beta/
--- factory/
--- sysupgrade/
-- broken/
--- factory/
--- sysupgrade/
-- experimental/
--- factory/
--- sysupgrade/
-- stable/
--- factory/
--- sysupgrade/

Code
----

Der Code ist nun halbwegs aufgeräumt und generiert aus dem PHP heraus "on the fly" einen Javascript Code. Das geht sicher noch besser (JSON erzeugen in PHP und wieder ins Javascript einladen), aber so läuft es erstmal. Mittlerweile existiert eine ffrouter Klasse, die über die ganzen Eigenschaften (Hersteller, Modell, etc.) verfügt und der Großteil des PHP Codes ist ausgelagert.

Lizenz
------

author    Caspar Armster
copyright 2016 Caspar Armster, Freifunk Hennef
license   Licensed under GPLv3
