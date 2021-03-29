<?php
/**
 * @author    Leo Maroni, Caspar Armster
 * @copyright 2017 Leo Maroni, Caspar Armster
 * @license   Licensed under GPLv3
 */
error_reporting (E_ALL ^ E_NOTICE);
require_once('community-config.inc.php');
require_once('config.inc.php');
require_once('ffrouter.class.php');
$community_id = $_REQUEST['id'];
?>
<!DOCTYPE html>
<html lang="de" xmlns:target="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title><?php echo $community[$community_id]["head_titel"]?></title>

        <meta name="author" content="Leo Maroni, Caspar Armster" />

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/materialize.min.css" />
        <link rel="stylesheet" href="css/community.css" />

        <script src="js/jquery.min.js"></script>
        <script src="js/materialize.min.js"></script>
        <script src="js/firmware.js"></script>

        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <?php
        if($community[$community_id]["linktoseite"] != null) {
	        header("Location: ".$community[$community_id]['linktoseite']);
	        die();
        }
        $firmware_download_path = $community[$community_id]["download_path"];

        try {
            require_once('ffrouter_parsen.function.php');
        } catch(Exception $e) {
            echo("Fehler: ".$e->getMessage());
            echo(" Bitte kontaktiere leo@freifunk-siegburg.de");
            die();
        }
        ?>

		<script>
        <?php
            echo "var router_json       = ".json_encode($router)."\n";
            echo "var texte_json        = ".json_encode($texte)."\n";
        	echo "var anzahl_hersteller = ".$anzahl_hersteller."\n";
            $manufacturer = array();
            foreach ($hersteller as $i => $value) {
                array_push($manufacturer, $value['name']);
            }
            echo "var herstellername    = ".json_encode($manufacturer)."\n";

            $modelle = array();
            for ($i = 0; $anzahl_hersteller > $i; $i++) {
                if($manufacturer == '<script>$("#hersteller").value</script>') {
                    $x = 0;
                    while ($x < sizeof($router)) {
                        if($manufacturer[$i] == $router[$x]['hersteller']) {
                            array_push($modelle, $router[$x]['modell']);
                        }
                    }
                }
            }
        ?>
        </script>
    </head>
    <body>
        <div class="container z-depth-3" id="outer-container">
            <header class="center">
                <h3 class="thin"><?php echo $community[$community_id]['head_titel']?></h3>
                <p>
                    <a id="backtohome" class="btn waves-effect waves-light" href="<?php echo $community[$community_id]['link_url']?>"><?php echo $community[$community_id]['link_text']?></a>
                    <a id="backtomap" class="btn waves-effect waves-light" href="/">Zur&uuml;ck zur Auswahl</a>
                </p>
            </header>

            <div class="container row" id="inner-container">
            <?php for ($i = 0; $i < $err; $i++): ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Warning:</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Warning!</strong> <?php echo $error_text[$i] ?>
                </div>
            <?php endfor ?>
                <div class="row">
                    <div class="col s12 m6">
                        <h5>Beschreibung</h5>
                        <p><?php echo $community[$community_id]["lang_text"]?></p>
                    </div>
                    <div class="col s12 m6">
                        <div class="row">
                                <img class="col s6 m12" src="router_images/keinbild.jpg" id="img_router_front" alt="Router Vorderseite" />
                                <img class="col s6 m12" src="router_images/keinbild.jpg" id="img_router_back" alt="Router Rückseite" />
                        </div>
                        <div class="row">
                            <img src="images/ccbyncsa.png" alt="CC BY-NC-SA" style="width: 60px; margin-right: 15px;" />
                        </div>
                    </div>
                </div>
                <div class="col s12 m6">
                    <h5>Hersteller</h5>
                    <select id="hersteller" onchange="change('hersteller', this)">
                        <option disabled selected value="">Hersteller auswählen</option>
                        <?php foreach ($hersteller as $value): ?>
                            <option value="<?php echo $value['name']?>"><?php echo $value['name']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col s12 m6">
                    <h5>Modell</h5>
                    <select disabled onchange="change('modell', this)" id="modell">
                        <option disabled selected value="">Modell auswählen</option>
                    </select>
                </div>
                <div class="col s12 m6">
                    <h5>Version</h5>
                    <select disabled onchange="change('version', this)" id="version">
                        <option disabled selected value="">Version auswählen</option>
                    </select>
                </div>
                <div class="col s12 m6">
                    <h5>Erstinstallation</h5>
                    <select disabled onchange="change('erstinstallation', this)" id="erstinstallation">
                        <option disabled selected value="">Firmware Erstinstallation?</option>
                    </select>
                </div>
                <div class="col s12 m6">
                    <h5>Entwicklungsstadium</h5>
                    <select disabled onchange="change('entwicklungsstadium', this)" id="entwicklungsstadium">
                        <option disabled selected value="">Entwicklungsstadium auswählen</option>
                    </select>
                </div>
                <div class="col s12 center">
                    <a disabled id="download" class="waves-effect waves-light btn-large"><i class="material-icons left">file_download</i>Herunterladen</a>
                    <br><span>Passende Kernelmodule bitte seperat laden von <a class="blue-grey-text text-darken-4" href="<?php echo $community[$community_id]['modules_path']?>"><?php echo $community[$community_id]['modules_path']?></a></span>
                </div>
            </div>
            <footer class="page-footer">
                <div class="footer-copyright">
                    <div class="container">
                        © 2018 <a class="grey-text text-lighten-4" href="https://labcode.de">Leo Maroni</a>, Caspar Armster / Licensed under GPLv3 / Die Router Bilder sind von Daniel Krah und unter <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/" class="grey-text text-lighten-4" target="_blank">Creative Commons Namensnennung - Nicht-kommerziell - Weitergabe unter gleichen Bedingungen 4.0 International Lizenz</a>  lizensiert. Dies ist ein Community-Projekt von Freifunk Rhein-Sieg. Alle Firmwares sind Eigenentwicklungen der jeweiligen Communities. <a href="https://www.freifunk-rhein-sieg.net/impressum/" class="grey-text text-lighten-4">Impressum</a>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
