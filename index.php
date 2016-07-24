<?php
/**
* @author    Caspar Armster
* @copyright 2016 Caspar Armster, Freifunk Hennef/Freie Netzwerker e.V. (www.freifunk-hennef.de / www.freie-netzwerker.de)
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
        <title><?php echo $community[0]["head_titel"]?></title>

        <meta name="author" content="Caspar Armster" />

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">

        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <script>
        <?php
            echo "var community_json   = ".json_encode($community)."\n";
            echo "var texte_json       = ".json_encode($texte)."\n";
            echo "var community_anzahl = ".count($community)."\n";
        ?>
            function populateA () {
              var s1 = document.getElementById('fw-dl-1')
              var s2 = document.getElementById('fw-dl-2')
              var s3 = document.getElementById('fw-dl-3')
              s3.classList.remove('disabled', 'btn-primary', 'btn-success')
              var optionArray = []
              s2.innerHTML = ''
              var i = 1
              var j = 1
              var skip_sub = 0
              while (i < community_anzahl) {
                if (s1.value == community_json[i]['name']) {
                  if (community_json[i]['sub_auswahl'] != '') {
                    optionArray[j] = i + '|' + community_json[i]['sub_auswahl']
                    $('#fw-dl-2').prop('disabled', false)
                    optionArray[0] = '|' + texte_json['ebene2_text']
                  } else {
                    $('#fw-dl-2').prop('disabled', true)
                    optionArray[0] = '|'
                    var link = 'firmware.php?id=' + i
                    var linkclass = 'btn-success'
                    skip_sub = 1
                  }
                  j++
                }
                i++
              }
              for (var option in optionArray) {
                var pair = optionArray[option].split('|')
                var newOption = document.createElement('option')
                newOption.value = pair[0]
                newOption.innerHTML = pair[1]
                s2.options.add(newOption)
              }
              if (skip_sub == 1) {
                s3.href = link
                s3.classList.add(linkclass)
              } else {
                s3.href = '#'
                s3.classList.add('btn-primary', 'disabled')
              }
              s3.textContent = texte_json['ebene3_text']
            }

            function populateB () {
              var s2 = document.getElementById('fw-dl-2')
              var s3 = document.getElementById('fw-dl-3')
              s3.classList.remove('disabled', 'btn-primary', 'btn-success')
              if (s2.value != 0) {
                s3.href = 'firmware.php?id=' + s2.value
                s3.classList.add('btn-success')
              }
              s3.href = link
              s3.textContent = texte_json['ebene3_text']
            }
        </script>
    </head>
    <body>
        <div class="jumbotron">
            <div class="container">
                <div class="col-xs-12">
                    <img src="<?php echo $community[0]['logo_url']?>" alt="<?php echo $community[0]['logo_alt']?>" class="pull-right img-box" />
                    <h2><?php echo $community[0]['head_titel']?></h2>
                    <p><?php echo $community[0]['head_text']?></p>
                    <p>
                        <a class="btn btn-primary btn-large" href="<?php echo $community[0]['link_url']?>"><?php echo $community[0]['link_text']?></a>
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo $community[0]["lang_titel"] ?></h3>
                        </div>
                        <div class="panel-body"><p><?php echo $community[0]["lang_text"] ?></p></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo $texte["ebene1_titel"]?></h3>
                        </div>
                        <div class="panel-body">
                            <select id="fw-dl-1" name="fw-dl-1" class="form-control" onchange="populateA()">
                                <option value=""><?php echo $texte["ebene1_text"]?></option>
                                <?php $lastName = "" ?>
                                <?php foreach (array_slice($community, 1) as $i => $value): ?>
                                    <?php if ($value['name'] != $lastName): ?>
                                        <option value="<?php echo $value['name']?>"><?php echo $value['name']?></option>
                                    <?php endif ?>
                                    <?php $lastName = $value['name'] ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo $texte["ebene2_titel"]?></h3>
                        </div>
                        <div class="panel-body">
                            <select id="fw-dl-2" name="fw-dl-2" class="form-control" disabled="disabled" onchange="populateB()"></select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo $texte["ebene3_titel"]?></h3>
                        </div>
                        <div class="panel-body">
                            <a href="#" id="fw-dl-3" name="fw-dl-3" role="button" class="btn btn-primary btn-block disabled"><?php echo $texte["ebene3_text"]?></a>
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
