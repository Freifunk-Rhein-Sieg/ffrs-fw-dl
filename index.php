<?php
/**
* @author    Leo Maroni, Caspar Armster
* @copyright 2017 Leo Maroni, Caspar Armster, Freifunk Hennef/Freie Netzwerker e.V. (www.freifunk-hennef.de / www.freie-netzwerker.de)
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" integrity="sha256-xbQIJkhfOw0Dry1H9lawvXRi9XcqdE8jDBZx1Op/mz8=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.css" integrity="sha256-bOWY8F32FGGbNDMPAnwWl/Lv9CKen4IQsNZ4RU9rcs0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/index.css">

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <script>
        function selectChangeCommunity(x) {
            var id = $(x).find('option:selected').attr("id")
            location.href = 'firmware.php?id=' + id
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
            <p>Die Versionen Soziale Netzwerke und Troisdorf - Fu&szlig;g&auml;ngerzone sind nur unten in der Auswahl verf&uuml;gbar</p>
            <div id="map"></div>
        </div>
        <div class="row">
            <h5>oder :</h5>
            <div class="input-field col s12">
                <select onchange="selectChangeCommunity(this)">
                    <option disabled selected value=""><?php echo $texte["ebene1_text"]?></option>
                    <?php $lastName = "" ?>
                    <?php foreach (array_slice($community, 0) as $i => $value): ?>
                        <?php if ($value['name'] != $lastName): ?>
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
                Licensed under GPLv3 / © 2017 <a class="grey-text text-lighten-4" href="https://labcode.de">Leo Maroni</a>, Caspar Armster
            </div>
        </div>
    </footer>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.js" integrity="sha256-GXUdrV9FHGDyzoSGD3O+jR3eYZaZZsjbsMvFhK3C0qg=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js" integrity="sha256-lVmbGVbzHBkNHCUK0y+z2AyJei/v7jSNYppXTcq2FtU=" crossorigin="anonymous"></script>
<script>
    var communityiesGeoJson = []
	<?php foreach (array_slice($community, 0) as $i => $value):?>
    communityiesGeoJson.push({"geojson": "<?php echo $value['geojson'] ?>", "name": "<?php echo $value['name'] ?>"})
	<?php endforeach ?>
</script>
<script src="js/comunitychoose.js"></script>
</body>
</html>
