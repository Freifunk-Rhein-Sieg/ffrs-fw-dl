<?php
/**
* @author    Caspar Armster
* @copyright 2016 Caspar Armster, Freifunk Hennef
* @license   Licensed under GPLv3
* 
*/
	error_reporting (E_ALL | E_STRICT);   
    ini_set ('display_errors', 'On');
    require_once('config.inc.php');
	require_once('ffrouter.class.php');
	require_once('ffrouter_parsen.function.php');
	
	echo <<<EOT
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Freifunk Hennef Firmware Downloadseite</title>

    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
EOT;

	try {
		require_once('ffrouter_parsen.function.php');
	} catch(Exception $e) {
		echo("Fehler: ".$e->getMessage());
		die();
	}
	$router_json = json_encode($router);
	
	echo("\n<script>\n");
	echo("var router_text = '".$router_json."';\n");
	echo("var router_json = JSON.parse(router_text);\n");
	echo("var anzahl_hersteller = ".$anzahl_hersteller.";\n");

	echo("var herstellername = [");
	for( $i=0; $i<$anzahl_hersteller; $i++) {
		echo("\"".$hersteller[$i]['name']."\"");
		if( $i != $anzahl_hersteller-1) {
			echo(", ");
		}
	}
	echo("];\n");

	echo <<<EOT
function populateA(){
  var s1 = document.getElementById("fw-dl-1");
  var s2 = document.getElementById("fw-dl-2");
  var s3 = document.getElementById("fw-dl-3");
  var s4 = document.getElementById("fw-dl-4");
  var s5 = document.getElementById("fw-dl-5");
  var s6 = document.getElementById("fw-dl-6");
  var img_router_front = document.getElementById("img_router_front");
  var img_router_back = document.getElementById("img_router_back");
  var optionArray = new Array();
  s2.innerHTML = "";
  for(i=0; i<anzahl_hersteller; i++) {
  	if(s1.value == herstellername[i]) {
  		optionArray[0] = "|Modell auswählen";
  		var j = 0;
  		while(j < router_json.length) {
  			if(router_json[j].hersteller == herstellername[i]) {
  				optionArray[j+1] = router_json[j].modell+"|"+router_json[j].modell;
  				if(j<router_json.length-1) {
	  				while(router_json[j].modell == router_json[j+1].modell) {
	  					if(j<router_json.length-1) {
	  						j++;
	  					} else {
	  						break;
	  					}
  					}
  				}
  			}
  			j++;
  		}
  	}
  }
  for(var option in optionArray){
    var pair = optionArray[option].split("|");
    var newOption = document.createElement("option");
    newOption.value = pair[0];
    newOption.innerHTML = pair[1];
    s2.options.add(newOption);
  }
  while(s3.length > 1) {
    s3.remove(s3.length-1);
  }
  while(s4.length > 1) {
    s4.remove(s4.length-1);
  }
  while(s5.length > 1) {
    s5.remove(s5.length-1);
  }
  s6.href = "#";
  s6.className = s6.className.replace( /(?:^|\s)disabled(?!\S)/g , '' );
  s6.className = s6.className.replace( /(?:^|\s)btn-primary(?!\S)/g , '' );
  s6.className = s6.className.replace( /(?:^|\s)btn-danger(?!\S)/g , '' );
  s6.className = s6.className.replace( /(?:^|\s)btn-warning(?!\S)/g , '' );
  s6.className = s6.className.replace( /(?:^|\s)btn-success(?!\S)/g , '' );
  s6.className += " btn-primary disabled";
  s6.innerHTML = "Download Firmware";
  img_router_front.src = "router_images/keinbild.jpg";
  img_router_back.src = "router_images/keinbild.jpg";
}
function populateB(){
  var s1 = document.getElementById("fw-dl-2");
  var s2 = document.getElementById("fw-dl-3");
  var s4 = document.getElementById("fw-dl-4");
  var s5 = document.getElementById("fw-dl-5");
  var s6 = document.getElementById("fw-dl-6");
  var img_router_front = document.getElementById("img_router_front");
  var img_router_back = document.getElementById("img_router_back");
  var optionArray = new Array();
  optionArray[0] = "|Modell auswählen";
  s2.innerHTML = "";
  var i = 0;
  while(i < router_json.length) {
  	if(router_json[i].modell == s1.value) {
  		optionArray[i+1] = i+"|"+router_json[i].version;
  		if(i<router_json.length-1) {
	  		while(router_json[i].modell == router_json[i+1].modell) {
	  			if(i<router_json.length-1) {
	  				i++;
	  				optionArray[i+1] = i+"|"+router_json[i].version;
	  			} else {
	  				break;
	  			}
	  		}
  		}
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
  while(s4.length > 1) {
    s4.remove(s4.length-1);
  }
  while(s5.length > 1) {
    s5.remove(s5.length-1);
  }
  s6.href = "#";
  s6.className = s6.className.replace( /(?:^|\s)disabled(?!\S)/g , '' );
  s6.className = s6.className.replace( /(?:^|\s)btn-primary(?!\S)/g , '' );
  s6.className = s6.className.replace( /(?:^|\s)btn-danger(?!\S)/g , '' );
  s6.className = s6.className.replace( /(?:^|\s)btn-warning(?!\S)/g , '' );
  s6.className = s6.className.replace( /(?:^|\s)btn-success(?!\S)/g , '' );
  s6.className += " btn-primary disabled";
  s6.innerHTML = "Download Firmware";
  img_router_front.src = "router_images/keinbild.jpg";
  img_router_back.src = "router_images/keinbild.jpg";
}
function populateC(){
  var s1 = document.getElementById("fw-dl-3");
  var s2 = document.getElementById("fw-dl-4");
  var s5 = document.getElementById("fw-dl-5");
  var s6 = document.getElementById("fw-dl-6");
  var img_router_front = document.getElementById("img_router_front");
  var img_router_back = document.getElementById("img_router_back");
  var optionArray = new Array();
  optionArray[0] = "|Erstinstallation?";
  s2.innerHTML = "";
  var newImageFront = router_json[s1.value].imagefront;
  var newImageBack = router_json[s1.value].imageback;
  var i = 1;
  if((router_json[s1.value].betafactory == 1) || (router_json[s1.value].brokenfactory == 1) || (router_json[s1.value].experimentalfactory == 1) || (router_json[s1.value].stablefactory == 1)) {
  	optionArray[i] = s1.value+"J|Ja";
  	i++;
  }
  if((router_json[s1.value].betasysupgrade == 1) || (router_json[s1.value].brokensysupgrade == 1) || (router_json[s1.value].experimentalsysupgrade == 1) || (router_json[s1.value].stablesysupgrade == 1)) {
  	optionArray[i] = s1.value+"N|Nein";
  }
  for(var option in optionArray){
    var pair = optionArray[option].split("|");
    var newOption = document.createElement("option");
    newOption.value = pair[0];
    newOption.innerHTML = pair[1];
    s2.options.add(newOption);
  }
  while(s5.length > 1) {
    s5.remove(s5.length-1);
  }
  s6.href = "#";
  s6.className = s6.className.replace( /(?:^|\s)disabled(?!\S)/g , '' );
  s6.className = s6.className.replace( /(?:^|\s)btn-primary(?!\S)/g , '' );
  s6.className = s6.className.replace( /(?:^|\s)btn-danger(?!\S)/g , '' );
  s6.className = s6.className.replace( /(?:^|\s)btn-warning(?!\S)/g , '' );
  s6.className = s6.className.replace( /(?:^|\s)btn-success(?!\S)/g , '' );
  s6.className += " btn-primary disabled";
  s6.innerHTML = "Download Firmware";
  img_router_front.src = newImageFront;
  img_router_back.src = newImageBack;
}
function populateD(){
  var s1 = document.getElementById("fw-dl-4");
  var s2 = document.getElementById("fw-dl-5");
  var s6 = document.getElementById("fw-dl-6");
  var optionArray = new Array();
  optionArray[0] = "|Entwicklungsstadium?";
  s2.innerHTML = "";
  var id = parseInt(s1.value.slice(0,s1.value.length));
  var jein = s1.value.slice(-1);
  var i = 1;
  if(jein == "J") {
	if(router_json[id].betafactory == 1) {
  		optionArray[i] = id+"Jbeta|Beta";
	  	i++;
  	}
	if(router_json[id].brokenfactory == 1) {
  		optionArray[i] = id+"Jbroken|Broken";
	  	i++;
  	}
	if(router_json[id].experimentalfactory == 1) {
  		optionArray[i] = id+"Jexp|Experimental";
	  	i++;
  	}
	if(router_json[id].stablefactory == 1) {
  		optionArray[i] = id+"Jstable|Stable";
	  	i++;
  	}
  }
  if(jein == "N") {
	if(router_json[id].betasysupgrade == 1) {
  		optionArray[i] = id+"Nbeta|Beta";
	  	i++;
  	}
	if(router_json[id].brokensysupgrade == 1) {
  		optionArray[i] = id+"Nbroken|Broken";
	  	i++;
  	}
	if(router_json[id].experimentalsysupgrade == 1) {
  		optionArray[i] = id+"Nexp|Experimental";
	  	i++;
  	}
	if(router_json[id].stablesysupgrade == 1) {
  		optionArray[i] = id+"Nstable|Stable";
	  	i++;
  	}
  }
  for(var option in optionArray){
    var pair = optionArray[option].split("|");
    var newOption = document.createElement("option");
    newOption.value = pair[0];
    newOption.innerHTML = pair[1];
    s2.options.add(newOption);
  }
  s6.href = "#";
  s6.className = s6.className.replace( /(?:^|\s)disabled(?!\S)/g , '' );
  s6.className = s6.className.replace( /(?:^|\s)btn-primary(?!\S)/g , '' );
  s6.className = s6.className.replace( /(?:^|\s)btn-danger(?!\S)/g , '' );
  s6.className = s6.className.replace( /(?:^|\s)btn-warning(?!\S)/g , '' );
  s6.className = s6.className.replace( /(?:^|\s)btn-success(?!\S)/g , '' );
  s6.className += " btn-primary disabled";
  s6.innerHTML = "Download Firmware";
}
function populateE(){
  var s1 = document.getElementById("fw-dl-5");
  var s2 = document.getElementById("fw-dl-6");
  s2.innerHTML = "";
  if(s1.value.lastIndexOf("Jbeta") != -1) {
  	var id = parseInt(s1.value.slice(0,s1.value.length-4));
  	var link = router_json[id].betafactorylink;
  	var linkclass = " btn-warning";
  }
  if(s1.value.lastIndexOf("Jbroken") != -1) {
  	var id = parseInt(s1.value.slice(0,s1.value.length-6));
  	var link = router_json[id].brokenfactorylink;
  	var linkclass = " btn-danger";
  }
  if(s1.value.lastIndexOf("Jexp") != -1) {
  	var id = parseInt(s1.value.slice(0,s1.value.length-3));
  	var link = router_json[id].experimentalfactorylink;
  	var linkclass = " btn-warning";
  }
  if(s1.value.lastIndexOf("Jstable") != -1) {
  	var id = parseInt(s1.value.slice(0,s1.value.length-6));
  	var link = router_json[id].stablefactorylink;
  	var linkclass = " btn-success";
  }
  if(s1.value.lastIndexOf("Nbeta") != -1) {
  	var id = parseInt(s1.value.slice(0,s1.value.length-4));
  	var link = router_json[id].betasysupgradelink;
  	var linkclass = " btn-warning";
  }
  if(s1.value.lastIndexOf("Nbroken") != -1) {
  	var id = parseInt(s1.value.slice(0,s1.value.length-6));
  	var link = router_json[id].brokensysupgradelink;
  	var linkclass = " btn-danger";
  }
  if(s1.value.lastIndexOf("Nexp") != -1) {
  	var id = parseInt(s1.value.slice(0,s1.value.length-3));
  	var link = router_json[id].experimentalsysupgradelink;
  	var linkclass = " btn-warning";
  }
  if(s1.value.lastIndexOf("Nstable") != -1) {
  	var id = parseInt(s1.value.slice(0,s1.value.length-6));
  	var link = router_json[id].stablesysupgradelink;
  	var linkclass = " btn-success";
  }
  s2.href = link;
  s2.className = s2.className.replace( /(?:^|\s)disabled(?!\S)/g , '' );
  s2.className = s2.className.replace( /(?:^|\s)btn-primary(?!\S)/g , '' );
  s2.className = s2.className.replace( /(?:^|\s)btn-danger(?!\S)/g , '' );
  s2.className = s2.className.replace( /(?:^|\s)btn-warning(?!\S)/g , '' );
  s2.className = s2.className.replace( /(?:^|\s)btn-success(?!\S)/g , '' );
  s2.className += linkclass;
  s2.innerHTML = "Download Firmware";
}
	</script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
EOT;
				echo("<img src=\"".$logo_url."\" alt=\"".$logo_alt."\" style=\"float:right;\">");
echo <<<EOT
                <h2>
EOT;
                    echo($text_h1);
echo <<<EOT
                </h2>
                <p>
EOT;
                    echo($text_h2);
echo <<<EOT
                </p>
                <p>
EOT;
                    echo("<a class=\"btn btn-primary btn-large\" href=\"".$link_h2_url."\">".$link_h2_text."</a>");
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
                        echo($text_h1);
echo <<<EOT
                    </h3>
                </div>
                <div class="panel-body">
                <img src="router_images/keinbild.jpg" id="img_router_back" alt="Router Rückseite" width=200px" style="float:right;">
				<img src="router_images/keinbild.jpg" id="img_router_front" alt="Router Vorderseite" width=200px" style="float:right;">
                    Bitte suchen Sie den passenden Router aus, indem Sie den Hersteller, das Modell und die Version auswählen.<br />
					Legen Sie anschließend fest, ob sie den Router zum ersten Mal mit einer Freifunk Firmware flashen und welches Entwicklungsstadium die Firmware haben soll.
                </div>
                <div class="panel-footer">
					Bitte wählen Sie "stable" im Entwicklungsstadium aus, wenn Sie nicht genau wissen was Sie sonst erwartet!
                </div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
                    <h3 class="panel-title">
						Router Hersteller
					</h3>
                </div>
                <div class="panel-body">
                    <select id="fw-dl-1" name="fw-dl-1" onchange="populateA()">
						<option value="">Hersteller auswählen</option>
EOT;
	for( $i=0; $i<$anzahl_hersteller; $i++) {
		echo("<option value=\"".$hersteller[$i]['name']."\">".$hersteller[$i]['name']."</option>");
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
						Router Modell
					</h3>
                </div>
                <div class="panel-body">
					<select id="fw-dl-2" name="fw-dl-2" onchange="populateB()"></select>
				</div>
				<div class="panel-footer">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
                    <h3 class="panel-title">
						Router Version
					</h3>
                </div>
                <div class="panel-body">
					<select id="fw-dl-3" name="fw-dl-3" onchange="populateC()"></select>
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
						Firmware Erstinstallation
					</h3>
                </div>
                <div class="panel-body">
					<select id="fw-dl-4" name="fw-dl-4" onchange="populateD()"></select>
				</div>
				<div class="panel-footer">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
                    <h3 class="panel-title">
						Firmware Entwicklungsstadium
					</h3>
                </div>
                <div class="panel-body">
					<select id="fw-dl-5" name="fw-dl-5" onchange="populateE()"></select>
				</div>
				<div class="panel-footer">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
                    <h3 class="panel-title">
						Firmware Download
					</h3>
                </div>
                <div class="panel-body">
					<a href="#" id="fw-dl-6" name="fw-dl-6" role="button" class="btn btn-primary disabled">Download Firmware</a>
				</div>
				<div class="panel-footer">
					<img src="images/ccbyncsa.png" alt="CC BY-NC-SA" width="60px"> Die Router Bilder sind von Daniel Krah und sind lizensiert unter einer <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target:"_blank">Creative Commons Namensnennung - Nicht-kommerziell - Weitergabe unter gleichen Bedingungen 4.0 International Lizenz</a>
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