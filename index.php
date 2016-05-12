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
EOT;

	try {
		require_once('ffrouter_parsen.function.php');
	} catch(Exception $e) {
		echo("Fehler: ".$e->getMessage());
		die();
	}

	echo <<<EOT
	<script>
function populateA(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	var s3 = document.getElementById("slct3");
	var s4 = document.getElementById("slct4");
	var s5 = document.getElementById("slct5");
	var s6 = document.getElementById("slct6");
	var img_router_front = document.getElementById("img_router_front");
	var img_router_back = document.getElementById("img_router_back");
	s2.innerHTML = "";
EOT;
	for( $i=0; $i<count($hersteller); $i++) {
		echo("\nif(s1.value == \"".$hersteller[$i]."\"){\n");
		echo("var optionArray = [\"|\"");
		$j=0;
		while( $j<count($router) ) {
			if($router[$j]->hersteller == $hersteller[$i]) {
				echo(",\"".$router[$j]->modell."|".$router[$j]->modell."\"");
				if( $j<count($router)-1 ) {
					while($router[$j]->modell == $router[$j+1]->modell) {
						if( $j<count($router)-1 ) {
							$j++;
						} else {
							break;
						}
					}
				}
			}
			$j++;
		}
		echo("];\n");
		echo("}\n");
	}
	echo <<<EOT
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
function populateB(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	var s4 = document.getElementById("slct4");
	var s5 = document.getElementById("slct5");
	var s6 = document.getElementById("slct6");
	var img_router_front = document.getElementById("img_router_front");
	var img_router_back = document.getElementById("img_router_back");
	s2.innerHTML = "";
EOT;
	$i=0;
	while( $i<count($router) ) {
		echo("\nif(s1.value == \"".$router[$i]->modell."\"){\n");
		echo("var optionArray = [\"|\"");
		echo(",\"".$i."|".$router[$i]->version."\"");
		if( $i<count($router)-1 ) {
			while($router[$i]->modell == $router[$i+1]->modell) {
				if( $i<count($router)-1 ) {
					$i++;
					echo(",\"".$i."|".$router[$i]->version."\"");
				} else {
					break;
				}
			}
		}
		echo("];\n");
		echo("}\n");
		$i++;
	}
	echo <<<EOT
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
function populateC(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	var s5 = document.getElementById("slct5");
	var s6 = document.getElementById("slct6");
	var img_router_front = document.getElementById("img_router_front");
	var img_router_back = document.getElementById("img_router_back");
	s2.innerHTML = "";
EOT;
	$i=0;
	while( $i<count($router) ) {
		echo("\nif(s1.value == \"".$i."\"){\n");
		echo("var newImageFront = \"".$router[$i]->imagefront."\";\n");
		echo("var newImageBack = \"".$router[$i]->imageback."\";\n");
		echo("var optionArray = [\"|\"");
		if( ($router[$i]->betafactory == 1) || ($router[$i]->brokenfactory == 1) || ($router[$i]->experimentalfactory == 1) || ($router[$i]->stablefactory == 1) ) {
			echo(",\"".$i."J|Ja\"");
		}
		if( ($router[$i]->betasysupgrade == 1) || ($router[$i]->brokensysupgrade == 1) || ($router[$i]->experimentalsysupgrade == 1) || ($router[$i]->stablesysupgrade == 1) ) {
			echo(",\"".$i."N|Nein\"");
		}
		echo("];\n");
		echo("}\n");
		$i++;
	}
	echo <<<EOT
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
function populateD(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	var s6 = document.getElementById("slct6");
	s2.innerHTML = "";
EOT;
	$i=0;
	while( $i<count($router) ) {
		echo("\nif(s1.value == \"".$i."J\"){\n");
		echo("var optionArray = [\"|\"");
		if( ($router[$i]->betafactory == 1) ) {
			echo(",\"".$i."Jbeta|Beta\"");
		}
		if( ($router[$i]->brokenfactory == 1) ) {
			echo(",\"".$i."Jbroken|Broken\"");
		}
		if( ($router[$i]->experimentalfactory == 1) ) {
			echo(",\"".$i."Jexp|Experimental\"");
		}
		if( ($router[$i]->stablefactory == 1) ) {
			echo(",\"".$i."Jstable|Stable\"");
		}
		echo("];\n");
		echo("}\n");
		echo("\nif(s1.value == \"".$i."N\"){\n");
		echo("var optionArray = [\"|\"");
		if( ($router[$i]->betasysupgrade == 1) ) {
			echo(",\"".$i."Nbeta|Beta\"");
		}
		if( ($router[$i]->brokensysupgrade == 1) ) {
			echo(",\"".$i."Nbroken|Broken\"");
		}
		if( ($router[$i]->experimentalsysupgrade == 1) ) {
			echo(",\"".$i."Nexp|Experimental\"");
		}
		if( ($router[$i]->stablesysupgrade == 1) ) {
			echo(",\"".$i."Nstable|Stable\"");
		}
		echo("];\n");
		echo("}\n");
		$i++;
	}
	echo <<<EOT
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
function populateE(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.innerHTML = "";
EOT;
	$i=0;
	while( $i<count($router) ) {
		if( ($router[$i]->betafactory == 1) ) {
			echo("\nif(s1.value == \"".$i."Jbeta\"){\n");
			echo("var link = \"".$router[$i]->betafactorylink."\";\n");
			echo("var linkclass = \" btn-warning\";\n");
			echo("}\n");
		}
		if( ($router[$i]->brokenfactory == 1) ) {
			echo("\nif(s1.value == \"".$i."Jbroken\"){\n");
			echo("var link = \"".$router[$i]->brokenfactorylink."\";\n");
			echo("var linkclass = \" btn-danger\";\n");
			echo("}\n");
		}
		if( ($router[$i]->experimentalfactory == 1) ) {
			echo("\nif(s1.value == \"".$i."Jexp\"){\n");
			echo("var link = \"".$router[$i]->experimentalfactorylink."\";\n");
			echo("var linkclass = \" btn-warning\";\n");
			echo("}\n");
		}
		if( ($router[$i]->stablefactory == 1) ) {
			echo("\nif(s1.value == \"".$i."Jstable\"){\n");
			echo("var link = \"".$router[$i]->stablefactorylink."\";\n");
			echo("var linkclass = \" btn-success\";\n");
			echo("}\n");
		}
		if( ($router[$i]->betasysupgrade == 1) ) {
			echo("\nif(s1.value == \"".$i."Nbeta\"){\n");
			echo("var link = \"".$router[$i]->betasysupgradelink."\";\n");
			echo("var linkclass = \" btn-warning\";\n");
			echo("}\n");
		}
		if( ($router[$i]->brokensysupgrade == 1) ) {
			echo("\nif(s1.value == \"".$i."Nbroken\"){\n");
			echo("var link = \"".$router[$i]->brokensysupgradelink."\";\n");
			echo("var linkclass = \" btn-danger\";\n");
			echo("}\n");
		}
		if( ($router[$i]->experimentalsysupgrade == 1) ) {
			echo("\nif(s1.value == \"".$i."Nexp\"){\n");
			echo("var link = \"".$router[$i]->experimentalsysupgradelink."\";\n");
			echo("var linkclass = \" btn-warning\";\n");
			echo("}\n");
		}
		if( ($router[$i]->stablesysupgrade == 1) ) {
			echo("\nif(s1.value == \"".$i."Nstable\"){\n");
			echo("var link = \"".$router[$i]->stablesysupgradelink."\";\n");
			echo("var linkclass = \" btn-success\";\n");
			echo("}\n");
		}
		$i++;
	}
	echo <<<EOT
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
				<img src="images/Freifunk-logo-hennef-klein-200.png" alt="Freifunk Hennef Logo" style="float:right;">
                <h2>
                    Freifunk Hennef Firmware
                </h2>
                <p>
                    Auf dieser Seite können Sie die passende Firmware für ihren Router in Hennef auswählen und herunterladen!
                </p>
                <p>
                    <a class="btn btn-primary btn-large" href="http://www.freifunk-hennef.de/">Zurück zur Startseite</a>
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Freifunk Hennef Firmware
                    </h3>
                </div>
                <div class="panel-body">
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
                    <select id="slct1" name="slct1" onchange="populateA(this.id,'slct2')">
						<option value=""></option>
EOT;
	for( $i=0; $i<count($hersteller); $i++) {
		echo("<option value=\"".$hersteller[$i]."\">".$hersteller[$i]."</option>");
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
					<select id="slct2" name="slct2" onchange="populateB(this.id,'slct3')"></select>
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
					<select id="slct3" name="slct3" onchange="populateC(this.id,'slct4')"></select>
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
					<select id="slct4" name="slct4" onchange="populateD(this.id,'slct5')"></select>
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
					<select id="slct5" name="slct5" onchange="populateE(this.id,'slct6')"></select>
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
                	<img src="router_images/keinbild.jpg" id="img_router_back" alt="Router Rückseite" width=200px" style="float:right;">
					<img src="router_images/keinbild.jpg" id="img_router_front" alt="Router Vorderseite" width=200px" style="float:right;">
					<a href="#" id="slct6" name="slct6" role="button" class="btn btn-primary disabled">Download Firmware</a>
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
    <script src="js/validator.min.js"></script>
    <!-- <script src="js/scripts.js"></script> -->
</body>
</html>
EOT;
?>