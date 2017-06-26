<?php
/**
 * @author    Leo Maroni
 * @copyright 2017 Leo Maroni
 * @license   Licensed under GPLv3
 */
require_once('community-config.inc.php');
$community_shortlink = $_REQUEST['name'];
foreach ($community as $item) {
	if ($community_shortlink == $item['shortlinkname']) {
		header("Location: subauswahl.php?id=" . $item['community_id']);
	}
}