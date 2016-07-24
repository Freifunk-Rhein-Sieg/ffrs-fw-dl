<?php
/**
* @author    Caspar Armster
* @copyright 2016 Caspar Armster, Freifunk Hennef/Freie Netzwerker e.V. (www.freifunk-hennef.de / www.freie-netzwerker.de)
* @license   Licensed under GPLv3
*/
error_reporting (E_ALL ^ E_NOTICE);
require_once('community-config.inc.php');
require_once('config.inc.php');
require_once('ffrouter.class.php');
$community_id = $_REQUEST['id'];
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title><?php echo $community[$community_id]["head_titel"]?></title>

        <meta name="author" content="Caspar Armster" />

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">

        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <?php
        $firmware_download_path = $community[$community_id]["download_path"];

        try {
            require_once('ffrouter_parsen.function.php');
        } catch(Exception $e) {
            echo("Fehler: ".$e->getMessage());
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
        ?>

            function populateA () {
              var s1 = document.getElementById('fw-dl-1')
              var s2 = document.getElementById('fw-dl-2')
              var s3 = document.getElementById('fw-dl-3')
              var s4 = document.getElementById('fw-dl-4')
              var s5 = document.getElementById('fw-dl-5')
              var s6 = document.getElementById('fw-dl-6')
              var img_router_front = document.getElementById('img_router_front')
              var img_router_back = document.getElementById('img_router_back')
              var optionArray = [ ]
              s2.innerHTML = ''
              for (var i = 0; i < anzahl_hersteller; i++) {
                if (s1.value == herstellername[i]) {
                  optionArray[0] = '|Modell auswählen'
                  var j = 0
                  while (j < router_json.length) {
                    if (router_json[j].hersteller == herstellername[i]) {
                      optionArray[j + 1] = router_json[j].modell + '|' + router_json[j].modell
                      if (j < router_json.length - 1) {
                        while (router_json[j].modell == router_json[j + 1].modell) {
                          if (j < router_json.length - 1) {
                            j++
                          } else {
                            break
                          }
                        }
                      }
                    }
                    j++
                  }
                }
              }
              for (var option in optionArray) {
                var pair = optionArray[option].split('|')
                var newOption = document.createElement('option')
                newOption.value = pair[0]
                newOption.innerHTML = pair[1]
                s2.options.add(newOption)
              }
              while (s3.length > 1) {
                s3.remove(s3.length - 1)
              }
              while (s4.length > 1) {
                s4.remove(s4.length - 1)
              }
              while (s5.length > 1) {
                s5.remove(s5.length - 1)
              }
              s6.href = '#'
              s6.classList.remove('disabled', 'btn-primary', 'btn-danger', 'btn-warning', 'btn-success')
              s6.className.add('btn-primary', 'disabled')
              s6.textContent = 'Download Firmware'
              img_router_front.src = 'router_images/keinbild.jpg'
              img_router_back.src = 'router_images/keinbild.jpg'
            }
            function populateB () {
              var s2 = document.getElementById('fw-dl-2')
              var s3 = document.getElementById('fw-dl-3')
              var s4 = document.getElementById('fw-dl-4')
              var s5 = document.getElementById('fw-dl-5')
              var s6 = document.getElementById('fw-dl-6')
              var img_router_front = document.getElementById('img_router_front')
              var img_router_back = document.getElementById('img_router_back')
              var optionArray = [ ]
              optionArray[0] = '|Modell auswählen'
              s3.innerHTML = ''
              var i = 0
              while (i < router_json.length) {
                if (router_json[i].modell == s2.value) {
                  optionArray[i + 1] = i + '|' + router_json[i].version
                  if (i < router_json.length - 1) {
                    while (router_json[i].modell == router_json[i + 1].modell) {
                      if (i < router_json.length - 1) {
                        i++
                        optionArray[i + 1] = i + '|' + router_json[i].version
                      } else {
                        break
                      }
                    }
                  }
                }
                i++
              }
              for (var option in optionArray) {
                var pair = optionArray[option].split('|')
                var newOption = document.createElement('option')
                newOption.value = pair[0]
                newOption.innerHTML = pair[1]
                s3.options.add(newOption)
              }
              while (s4.length > 1) {
                s4.remove(s4.length - 1)
              }
              while (s5.length > 1) {
                s5.remove(s5.length - 1)
              }
              s6.href = '#'
              s6.classList.remove('disabled', 'btn-primary', 'btn-danger', 'btn-warning', 'btn-success')
              s6.className.add('btn-primary', 'disabled')
              s6.textContent = 'Download Firmware'
              img_router_front.src = 'router_images/keinbild.jpg'
              img_router_back.src = 'router_images/keinbild.jpg'
            }
            function populateC () {
              var s3 = document.getElementById('fw-dl-3')
              var s4 = document.getElementById('fw-dl-4')
              var s5 = document.getElementById('fw-dl-5')
              var s6 = document.getElementById('fw-dl-6')
              var img_router_front = document.getElementById('img_router_front')
              var img_router_back = document.getElementById('img_router_back')
              var optionArray = [ ]
              optionArray[0] = '|Erstinstallation?'
              s4.innerHTML = ''
              var newImageFront = router_json[s3.value].imagefront
              var newImageBack = router_json[s3.value].imageback
              var i = 1
              if ((router_json[s3.value].betafactory == 1) || (router_json[s3.value].brokenfactory == 1) || (router_json[s3.value].experimentalfactory == 1) || (router_json[s3.value].stablefactory == 1)) {
                optionArray[i] = s3.value + 'J|Ja'
                i++
              }
              if ((router_json[s3.value].betasysupgrade == 1) || (router_json[s3.value].brokensysupgrade == 1) || (router_json[s3.value].experimentalsysupgrade == 1) || (router_json[s3.value].stablesysupgrade == 1)) {
                optionArray[i] = s3.value + 'N|Nein'
              }
              for (var option in optionArray) {
                var pair = optionArray[option].split('|')
                var newOption = document.createElement('option')
                newOption.value = pair[0]
                newOption.innerHTML = pair[1]
                s4.options.add(newOption)
              }
              while (s5.length > 1) {
                s5.remove(s5.length - 1)
              }
              s6.href = '#'
              s6.classList.remove('disabled', 'btn-primary', 'btn-danger', 'btn-warning', 'btn-success')
              s6.className.add('btn-primary', 'disabled')
              s6.textContent = 'Download Firmware'
              img_router_front.src = newImageFront
              img_router_back.src = newImageBack
            }
            function populateD () {
              var s4 = document.getElementById('fw-dl-4')
              var s5 = document.getElementById('fw-dl-5')
              var s6 = document.getElementById('fw-dl-6')
              var optionArray = [ ]
              optionArray[0] = '|Entwicklungsstadium?'
              s5.innerHTML = ''
              var id = parseInt(s4.value.slice(0, s4.value.length))
              var jein = s4.value.slice(-1)
              var i = 1
              if (jein == 'J') {
                if (router_json[id].betafactory == 1) {
                  optionArray[i] = id + 'Jbeta|Beta'
                  i++
                }
                if (router_json[id].brokenfactory == 1) {
                  optionArray[i] = id + 'Jbroken|Broken'
                  i++
                }
                if (router_json[id].experimentalfactory == 1) {
                  optionArray[i] = id + 'Jexp|Experimental'
                  i++
                }
                if (router_json[id].stablefactory == 1) {
                  optionArray[i] = id + 'Jstable|Stable'
                  i++
                }
              }
              if (jein == 'N') {
                if (router_json[id].betasysupgrade == 1) {
                  optionArray[i] = id + 'Nbeta|Beta'
                  i++
                }
                if (router_json[id].brokensysupgrade == 1) {
                  optionArray[i] = id + 'Nbroken|Broken'
                  i++
                }
                if (router_json[id].experimentalsysupgrade == 1) {
                  optionArray[i] = id + 'Nexp|Experimental'
                  i++
                }
                if (router_json[id].stablesysupgrade == 1) {
                  optionArray[i] = id + 'Nstable|Stable'
                  i++
                }
              }
              for (var option in optionArray) {
                var pair = optionArray[option].split('|')
                var newOption = document.createElement('option')
                newOption.value = pair[0]
                newOption.innerHTML = pair[1]
                s5.options.add(newOption)
              }
              s6.href = '#'
              s6.classList.remove('disabled', 'btn-primary', 'btn-danger', 'btn-warning', 'btn-success')
              s6.className.add('btn-primary', 'disabled')
              s6.textContent = 'Download Firmware'
            }
            function populateE () {
              var s5 = document.getElementById('fw-dl-5')
              var s6 = document.getElementById('fw-dl-6')
              var id = 0
              var link = '#'
              var linkclass = ''
              if (s5.value.lastIndexOf('Jbeta') != -1) {
                id = parseInt(s5.value.slice(0, s5.value.length - 4))
                link = router_json[id].betafactorylink
                linkclass = ' btn-warning'
              }
              if (s5.value.lastIndexOf('Jbroken') != -1) {
                id = parseInt(s5.value.slice(0, s5.value.length - 6))
                link = router_json[id].brokenfactorylink
                linkclass = ' btn-danger'
              }
              if (s5.value.lastIndexOf('Jexp') != -1) {
                id = parseInt(s5.value.slice(0, s5.value.length - 3))
                link = router_json[id].experimentalfactorylink
                linkclass = ' btn-warning'
              }
              if (s5.value.lastIndexOf('Jstable') != -1) {
                id = parseInt(s5.value.slice(0, s5.value.length - 6))
                link = router_json[id].stablefactorylink
                linkclass = ' btn-success'
              }
              if (s5.value.lastIndexOf('Nbeta') != -1) {
                id = parseInt(s5.value.slice(0, s5.value.length - 4))
                link = router_json[id].betasysupgradelink
                linkclass = ' btn-warning'
              }
              if (s5.value.lastIndexOf('Nbroken') != -1) {
                id = parseInt(s5.value.slice(0, s5.value.length - 6))
                link = router_json[id].brokensysupgradelink
                linkclass = ' btn-danger'
              }
              if (s5.value.lastIndexOf('Nexp') != -1) {
                id = parseInt(s5.value.slice(0, s5.value.length - 3))
                link = router_json[id].experimentalsysupgradelink
                linkclass = ' btn-warning'
              }
              if (s5.value.lastIndexOf('Nstable') != -1) {
                id = parseInt(s5.value.slice(0, s5.value.length - 6))
                link = router_json[id].stablesysupgradelink
                linkclass = ' btn-success'
              }
              s6.href = link
              s6.classList.remove('disabled', 'btn-primary', 'btn-danger', 'btn-warning', 'btn-success')
              s6.className.add(linkclass)
              s6.textContent = 'Download Firmware'
            }
        </script>
    </head>
    <body>
        <div class="jumbotron">
            <div class="container">
                <div class="col-xs-12">
                    <img src="<?php echo $community[$community_id]['logo_url']?>" alt="<?php echo $community[$community_id]['logo_alt']?>" class="pull-right img-box" />
                    <h2><?php echo $community[$community_id]['head_titel']?></h2>
                    <p><?php echo $community[$community_id]['head_text']?></p>
                    <p>
                        <a class="btn btn-primary btn-large" href="<?php echo $community[$community_id]['link_url']?>"><?php echo $community[$community_id]['link_text']?></a>
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
        <?php for ($i = 0; $i < $err; $i++): ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Warning:</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Warning!</strong> <?php echo $error_text[$i] ?>
            </div>
        <?php endfor ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo $community[$community_id]["lang_title"]?></h3>
                        </div>
                        <div class="panel-body">
                            <img src="router_images/keinbild.jpg" class="pull-right img-box" id="img_router_back" alt="Router Rückseite" />
                            <img src="router_images/keinbild.jpg" class="pull-right img-box" id="img_router_front" alt="Router Vorderseite" />
                            <p><?php echo $community[$community_id]["lang_text"]?></p>
                        </div>
                        <div class="panel-footer">
                            <img src="images/ccbyncsa.png" alt="CC BY-NC-SA" class="pull-left" style="width: 60px; margin-right: 15px;" />
                            <p>Die Router Bilder sind von Daniel Krah und unter <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target:"_blank">Creative Commons Namensnennung - Nicht-kommerziell - Weitergabe unter gleichen Bedingungen 4.0 International Lizenz</a>  lizensiert.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Router Hersteller</h3>
                        </div>
                        <div class="panel-body">
                            <select id="fw-dl-1" name="fw-dl-1" class="form-control" onchange="firmwarePage.onUpdate_1()">
                                <option value="">Hersteller auswählen</option>
                            <?php foreach ($hersteller as $value): ?>
                                <option value="<?php echo $value['name']?>"><?php echo $value['name']?></option>
                            <?php endforeach ?>
					        </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Router Modell</h3>
                        </div>
                        <div class="panel-body">
                            <select id="fw-dl-2" name="fw-dl-2" class="form-control" onchange="populateB()"></select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Router Version</h3>
                        </div>
                        <div class="panel-body">
                            <select id="fw-dl-3" name="fw-dl-3" class="form-control" onchange="populateC()"></select>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Firmware Erstinstallation</h3>
                        </div>
                        <div class="panel-body">
                            <select id="fw-dl-4" name="fw-dl-4" class="form-control" onchange="populateD()"></select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Firmware Entwicklungsstadium</h3>
                        </div>
                        <div class="panel-body">
                            <select id="fw-dl-5" name="fw-dl-5" class="form-control" onchange="populateE()"></select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Firmware Download</h3>
                        </div>
                        <div class="panel-body">
                            <a href="#" id="fw-dl-6" name="fw-dl-6" role="button" class="btn btn-primary btn-block disabled">Download Firmware</a>
                        </div>
                    </div>
                </div>
            </div>

            <hr />

            <footer>
                <div class="col-xs-12 text-muted text-center">
                    <p>Licensed under GPLv3 / Copyright 2016 by Caspar Armster, <a href="http://www.freifunk-hennef.de/">Freifunk Hennef</a> / <a href="http://www.freie-netzwerker.de/">Freie Netzwerker e.V.</a></p>
                </div>
            </footer>
        </div>
        <script src="js/jquery-2.2.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
