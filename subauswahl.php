<?php
/**
 * @author    Leo Maroni
 * @copyright 2017 Leo Maroni
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

	<meta name="author" content="Leo Maroni" />

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" integrity="sha256-xbQIJkhfOw0Dry1H9lawvXRi9XcqdE8jDBZx1Op/mz8=" crossorigin="anonymous" />
	<link rel="stylesheet" href="css/community.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js" integrity="sha256-lVmbGVbzHBkNHCUK0y+z2AyJei/v7jSNYppXTcq2FtU=" crossorigin="anonymous"></script>
	<script src="js/firmware.js"></script>

	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<?php
		if (!isset($community[$community_id]["sub_auswahl"])) {
			header("Location: firmware.php?id=" . $community_id);
		}
	?>
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
		<div class="col s12">
			<h5>Auswahl Stadtteilnetz</h5>
			<select id="stadtteil" onchange="change('stadtteil', this)">
				<option disabled selected value="">Stadtteilnetz ausw&auml;hlen</option>
				<?php foreach ($community[$community_id]["sub_auswahl"] as $value): ?>
					<option value="<?php echo $value ?>"><?php echo $community[$value]['name']?></option>
				<?php endforeach ?>
			</select>
		</div>
	</div>
	<footer class="page-footer">
		<div class="footer-copyright">
			<div class="container">
				Licensed under GPLv3 / © 2017 <a class="grey-text text-lighten-4" href="https://labcode.de">Leo Maroni</a>
			</div>
		</div>
	</footer>
</div>
</body>
</html>