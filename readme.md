Freifunk Hennef Firmware Downloader
===================================

Beschreibung
------------

Der Freifunk Hennef Firmware Downloader soll es Laien ermöglichen schneller und sicherer die zu ihrem Router passende Firmware zu finden. Der Freifunker kann nacheinander aus automatisch generierten Listen seinen Router auswählen: Hersteller -> Modell -> Version und dann festlegen ob es eine Erstinstallation ist oder nicht, sowie am Ende wählen welches Entwicklungsstadium die Firmware haben soll. Dabei wird automatisch gewarnt (Download Button verändert die Farbe) falls nicht "stable" ausgewählt wird. Zusätzlich werden etliche der Router auch als Grafik (Front & Back Ansicht) gezeigt, so dass der Freifunker auf den ersten Blick erkennen kann wenn er den falschen Router ausgewählt hat.

Technik
-------

Der Freifunk Hennef Firmware Downloader scannt das in der config.inc.php angegebene Verzeichnis auf Firmwares in den Unterverzeichnissen (beta/broken/experimental/stable) und dort in (stable/sysupgrade). Aus dem Ergebnis baut das PHP Script ein interaktives Javascript für die Auswahl und verwendet dabei Bootstrap für das Layout.

Bisher werden Router der folgenden Hersteller automatisch erkannt:

- Alfa
- Allnet
- Buffalo
- D-Link
- GL-Inet
- LeMaker
- Linksys
- Netgear
- Onion
- Raspberry Pi
- TP-Link
- Ubiquiti
- Western Digital
- x86

Soll eine Firmware für Router von anderen Herstellern angeboten werden muss erst das Script geändert werden!

Bilder
------

Die Bilder der Router kommen von Daniel Krah und sind lizensiert unter einer Creative Commons Namensnennung - Nicht-kommerziell - Weitergabe unter gleichen Bedingungen 4.0 International Lizenz (CC-BY NC SA).

Code
----

Der Code ist grausam und generiert einen Haufen Variablen/Arrays in PHP aus denen dann "on the fly" ein Javascript Code erzeugt wird. Das geht sicher besser (JSON erzeugen in PHP und wieder ins Javascript einladen) und Fehlertoleranter - aber es ist die erste Version, die erstmal "läuft". Mittlerweile existiert wenigstens eine ffrouter Klasse, die über die ganzen Eigenschaften (Hersteller, Modell, etc.) verfügt und der Großteil des PHP Codes ist ausgelagert.

Lizenz
------

@author    Caspar Armster
@copyright 2016 Caspar Armster, Freifunk Hennef
@license   Licensed under GPLv3
