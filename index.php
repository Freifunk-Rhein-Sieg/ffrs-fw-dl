<?php
/**
* @author    Leo Maroni, Caspar Armster
* @copyright 2017 Leo Maroni, Caspar Armster
* @license   Licensed under GPLv3
*/
error_reporting (E_ALL ^ E_NOTICE);
require_once('community-config.inc.php');
require_once('config.inc.php');
if (count($community) == 1) {
    header('Location: firmware.php?id=0');
    exit;
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Freifunk Rhein-Sieg Firmware Downloader</title>

    <meta name="author" content="Leo Maroni, Caspar Armster" />

    <link rel="stylesheet" href="css/materialize.min.css" />
    <link rel="stylesheet" href="css/leaflet.css" />
    <link rel="stylesheet" href="css/index.css" />

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <script>
        function selectChangeCommunity(x) {
            var id = $(x).find('option:selected').attr("id")
            location.href = 'subauswahl.php?id=' + id
        }
    </script>
</head>
<body>
<div class="container z-depth-3" id="outer-container">
    <div id="inner-container">
        <header class="center">
            <h3 class="thin">Freifunk Rhein-Sieg Firmware Downloader</h3>
        </header>
        <div class="row">
            <h5>W&auml;hle von der Karte: </h5>
            <div id="map"></div>
        </div>
        <div class="row">
            <h5>oder :</h5>
            <div class="input-field col s12">
                <select onchange="selectChangeCommunity(this)">
                    <option disabled selected value=""><?php echo $texte["ebene1_text"]?></option>
                    <?php $lastName = "" ?>
                    <?php foreach (array_slice($community, 0) as $i => $value): ?>
                        <?php if ($value['name'] != $lastName and $value['show']): ?>
                            <option id="<?php echo $value['community_id'] ?>" value="<?php echo $value['name']?>"><?php echo $value['name']?></option>
                        <?php endif ?>
                        <?php $lastName = $value['name'] ?>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
    </div>
    <footer class="page-footer">
        <div class="footer-copyright">
            <div class="container">
                © 2017 <a class="grey-text text-lighten-4" href="https://labcode.de">Leo Maroni</a>, Caspar Armster / Licensed under GPLv3. Dies ist ein Community-Projekt von Freifunk Rhein-Sieg. Alle Firmwares sind Eigenentwicklungen der jeweiligen Communities. Direkten Zugriff auf die Firmwares des Freifunk Rhein-Sieg e.V. gibt es auch über <a href="http://images.freifunk-rhein-sieg.net/" class="grey-text text-lighten-4">images.freifunk-rhein-sieg.net</a>. 
                <a href="https://freifunk-rhein-sieg.net/impressum/" class="grey-text text-lighten-4">Impressum</a>
            </div>
        </div>
    </footer>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/leaflet.js"></script>
<script src="js/materialize.min.js"></script><script>
    var communityiesGeoJson = []
	<?php foreach (array_slice($community, 0) as $i => $value):?>
    communityiesGeoJson.push({"geojson": "<?php echo $value['geojson'] ?>", "name": "<?php echo $value['name'] ?>"})
	<?php endforeach ?>
</script>
<script src="js/comunitychoose.js"></script>
</body>
</html>
