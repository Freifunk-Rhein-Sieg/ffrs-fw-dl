<?php
/**
* @author    Caspar Armster
* @copyright 2016 Caspar Armster, Freifunk Hennef/Freie Netzwerker e.V. (www.freifunk-hennef.de / www.freie-netzwerker.de)
* @license   Licensed under GPLv3
*/
error_reporting (E_ALL | E_STRICT);   
ini_set ('display_errors', 'On');
require_once('community-config.inc.php');
require_once('config.inc.php');
if(count($community) == 1) {
header('Location: firmware.php?id=0');
exit;
}
	echo <<<EOT
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
EOT;
  echo("<title>".$community[0]["head_titel"]."</title>");
echo <<<EOT

    <meta name="author" content="Caspar Armster">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
EOT;

    $community_json = json_encode($community);
    $texte_json = json_encode($texte);
    echo("\n<script>\n");
    echo("var community_text = '".$community_json."';\n");
    echo("var community_json = JSON.parse(community_text);\n");
    echo("var texte_text = '".$texte_json."';\n");
    echo("var texte_json = JSON.parse(texte_text);\n");
    echo("var community_anzahl = ".count($community).";\n");

	echo <<<EOT
function populateA(){
  var s1 = document.getElementById("fw-dl-1");
  var s2 = document.getElementById("fw-dl-2");
  var s3 = document.getElementById("fw-dl-3");
  s3.className = s3.className.replace( /(?:^|\s)disabled(?!\S)/g , '' );
  s3.className = s3.className.replace( /(?:^|\s)btn-primary(?!\S)/g , '' );
  s3.className = s3.className.replace( /(?:^|\s)btn-success(?!\S)/g , '' );
  var optionArray = new Array();
  s2.innerHTML = "";
  var i=1;
  var j=1;
  var skip_sub = 0;
  while(i<community_anzahl) {
  	if(s1.value == community_json[i]["name"]) {
        if(community_json[i]["sub_auswahl"] != "") {
    		optionArray[j] = i+"|"+community_json[i]["sub_auswahl"];
            $('#fw-dl-2').prop('disabled', false);
            optionArray[0] = "|"+texte_json["ebene2_text"];
        } else {
            $('#fw-dl-2').prop('disabled', true);
            optionArray[0] = "|";
            var link = "firmware.php?id="+i;
            var linkclass = " btn-success";
            skip_sub = 1;
        }
        j++;
	}
	i++;
  }
  for(var option in optionArray){
    var pair = optionArray[option].split("|");
    var newOption = document.createElement("option");
    newOption.value = pair[0];
    newOption.innerHTML = pair[1];
    s2.options.add(newOption);
  }
  s3.innerHTML = "";
  if(skip_sub == 1) {
    s3.href = link;
    s3.className += linkclass;
  } else {
    s3.href = "#";
    s3.className += " btn-primary disabled";
  }
  s3.innerHTML = texte_json["ebene3_text"];
}
function populateB(){
  var s1 = document.getElementById("fw-dl-1");
  var s2 = document.getElementById("fw-dl-2");
  var s3 = document.getElementById("fw-dl-3");
  s3.innerHTML = "";
  if(s2.value != 0) {
  	var link = "firmware.php?id="+s2.value;
  	var linkclass = " btn-success";
  }
  s3.href = link;
  s3.className = s3.className.replace( /(?:^|\s)disabled(?!\S)/g , '' );
  s3.className = s3.className.replace( /(?:^|\s)btn-primary(?!\S)/g , '' );
  s3.className = s3.className.replace( /(?:^|\s)btn-success(?!\S)/g , '' );
  s3.className += linkclass;
  s3.innerHTML = texte_json["ebene3_text"];
}
	</script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
EOT;
				echo("<img src=\"".$community[0]["logo_url"]."\" alt=\"".$community[0]["logo_alt"]."\" style=\"float:right;\">");
echo <<<EOT
                <h2>
EOT;
                    echo($community[0]["head_titel"]);
echo <<<EOT
                </h2>
                <p>
EOT;
                    echo($community[0]["head_text"]);
echo <<<EOT
                </p>
                <p>
EOT;
                    echo("<a class=\"btn btn-primary btn-large\" href=\"".$community[0]["link_url"]."\">".$community[0]["link_text"]."</a>");
echo <<<EOT
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
EOT;
                        echo($community[0]["lang_titel"]);
echo <<<EOT
                    </h3>
                </div>
                <div class="panel-body">
EOT;
                    echo($community[0]["lang_text"]);
echo <<<EOT
                </div>
                <div class="panel-footer">
                </div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
          <h3 class="panel-title">
EOT;
            echo($texte["ebene1_titel"]);
  echo <<<EOT
					</h3>
        </div>
        <div class="panel-body">
          <select id="fw-dl-1" name="fw-dl-1" class="form-control" onchange="populateA()">
EOT;
						echo("<option value=–\"\">".$texte["ebene1_text"]."</option>");
	for($i=1; $i<count($community); $i++) {
	    echo("<option value=\"".$community[$i]['name']."\">".$community[$i]['name']."</option>");
      if($i<count($community)-1) {
          while($community[$i]['name'] == $community[$i+1]['name']) {
              if($i<count($community)-1) {
                  $i++;
              } else {
                  break;
              }
          }
      }
	}
	echo <<<EOT
					</select>
        </div>
				<div class="panel-footer">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
          <h3 class="panel-title">
EOT;
						echo($texte["ebene2_titel"]);
  echo <<<EOT
					</h3>
        </div>
        <div class="panel-body">
					<select id="fw-dl-2" name="fw-dl-2" class="form-control" disabled onchange="populateB()"></select>
				</div>
				<div class="panel-footer">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">
EOT;
            echo($texte["ebene3_titel"]);
  echo <<<EOT
          </h3>
        </div>
        <div class="panel-body">
EOT;
            echo("<a href=\"#\" id=\"fw-dl-3\" name=\"fw-dl-3\" role=\"button\" class=\"btn btn-primary disabled\">".$texte["ebene3_text"]."</a>");
  echo <<<EOT
        </div>
        <div class="panel-footer">
          Licensed under GPLv3 / Copyright 2016 by Caspar Armster, <a href="http://www.freifunk-hennef.de/">Freifunk Hennef</a> / <a href="http://www.freie-netzwerker.de/">Freie Netzwerker e.V.</a>
        </div>
			</div>
		</div>
	</div>
</div>
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/scripts.js"></script> -->
</body>
</html>
EOT;
?>