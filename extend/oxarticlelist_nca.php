<?php

/**
 * vt Newest Category Articles
 * Copyright (C) 2013  Marat Bedoev
 * 
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 */
class oxarticlelist_nca extends oxarticlelist_nca_parent {

	public function loadNewestCategoryArticles($soxId = null) {

		if ($soxId == null) {
			return false;
		}

		$myConfig = $this->getConfig();

		if (!$myConfig->getConfigParam('bl_perfLoadPriceForAddList')) {
			$this->getBaseObject()->disablePriceLoad();
		}

		$this->_aArray = array();

		$sArticleTable = getViewName('oxarticles');
		if ($myConfig->getConfigParam('blNewArtByInsert')) {
			$sType = 'oxinsert';
		} else {
			$sType = 'oxtimestamp';
		}
		$sSelect = "select * from oxobject2category ";
		$sSelect .= "RIGHT JOIN $sArticleTable ON $sArticleTable.oxid = oxobject2category.oxobjectid ";
		$sSelect .= "WHERE oxobject2category.oxcatnid = '" . $soxId . "' and " . $this->getBaseObject()->getSqlActiveSnippet() . " and oxissearch = 1 order by $sType desc ";

		if (!($iLimit = (int) $iLimit)) {
			$iLimit = $myConfig->getConfigParam('iNrofNewcomerArticles');
		}
		$sSelect .= "limit " . $iLimit;
		$this->selectString($sSelect);
	}
	public function loadNewestManufacturerArticles($smId = null) {

		if ($smId == null) {
			return false;
		}

		$myConfig = $this->getConfig();

		if (!$myConfig->getConfigParam('bl_perfLoadPriceForAddList')) {
			$this->getBaseObject()->disablePriceLoad();
		}

		$this->_aArray = array();

		$sArticleTable = getViewName('oxarticles');
		if ($myConfig->getConfigParam('blNewArtByInsert')) {
			$sType = 'oxinsert';
		} else {
			$sType = 'oxtimestamp';
		}
		$sSelect  = "select * from $sArticleTable ";
		$sSelect .= "WHERE oxmanufacturerid = '". $smId ."' and " . $this->getBaseObject()->getSqlActiveSnippet() . " and oxissearch = 1 order by $sType desc ";

		if (!($iLimit = (int) $iLimit)) {
			$iLimit = $myConfig->getConfigParam('iNrofNewcomerArticles');
		}
		$sSelect .= "limit " . $iLimit;
		$this->selectString($sSelect);
	}

}