<?php
/**
* @author    Caspar Armster
* @copyright 2016 Caspar Armster
* @license   Licensed under GPLv3
*/
class ffrouter {

	function __construct() {
		$this->hersteller = "";
		$this->modell = "";
		$this->version = "";
		$this->imagefront = "";
		$this->imageback = "";

		$this->betafactory = 0;
		$this->betasysupgrade = 0;
		$this->brokenfactory = 0;
		$this->brokensysupgrade = 0;
		$this->experimentalfactory = 0;
		$this->experimentalsysupgrade = 0;
		$this->stablefactory = 0;
		$this->stablesysupgrade = 0;

		$this->betafactorylink = "";
		$this->betasysupgradelink = "";
		$this->brokenfactorylink = "";
		$this->brokensysupgradelink = "";
		$this->experimentalfactorylink = "";
		$this->experimentalsysupgradelink = "";
		$this->stablefactorylink = "";
		$this->stablesysupgradelink = "";
	}
}
