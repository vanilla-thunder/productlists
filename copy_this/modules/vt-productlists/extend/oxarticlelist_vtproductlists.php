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
class oxarticlelist_vtproductlists extends oxarticlelist_vtproductlists_parent
{

    public function loadVtProductList($sType = "newest", $sOxid = null, $iLimit = null, $blSubcats = false)
    {
        if ($sOxid == null) return false;

        //TODO: cache?

        $cfg = oxRegistry::getConfig();
        $oDb = oxDb::getDb(true);

        $oxarticles = getViewName('oxarticles');
        $sOxid      = oxDb::getDb()->quote($sOxid);
        $iLimit     = (intval($iLimit)) ? intval($iLimit) : $cfg->getConfigParam('iNrofNewcomerArticles');

        if (!$cfg->getConfigParam('bl_perfLoadPriceForAddList')) $this->getBaseObject()->disablePriceLoad();
        if ($blSubcats) $categories = $oDb->getCol("SELECT oxid FROM oxcategories WHERE oxid = {$sOxid} OR oxrootid = {$sOxid}");

        switch ($sType) {
            case "newest":
                $order = $oxarticles . "." . ($cfg->getConfigParam('blNewArtByInsert') ? 'oxinsert' : 'oxtimestamp') . " DESC";
                break;
            case "random":
                $order = "RAND()";
                break;
            case "topseller":
                $order = "{$oxarticles}.oxsoldamount DESC, {$oxarticles}.oxtitle ASC";
                break;
        }

        $sSelect = "SELECT {$oxarticles}.* FROM {$oxarticles} JOIN oxobject2category ON {$oxarticles}.oxid = oxobject2category.oxobjectid "
            . " WHERE " . $this->getBaseObject()->getSqlActiveSnippet() . " AND {$oxarticles}.oxissearch = 1 AND oxobject2category.oxcatnid " . ($blSubcats ? " IN ('" . join("','", $categories) . "') " : " = {$sOxid}")
            . " ORDER BY {$order} LIMIT {$iLimit}";

        $this->selectString($sSelect);
    }



    public function loadNewestCategoryArticles($sOxid = null, $iLimit = null, $blSubcats = false) { $this->loadVtProductList("newest",$sOxid,$iLimit,$blSubcats); }
    public function loadRandomCategoryArticles($sOxid = null, $iLimit = null, $blSubcats = false) { $this->loadVtProductList("random",$sOxid,$iLimit,$blSubcats); }
    public function loadCategoryTopseller($sOxid = null, $iLimit = null, $blSubcats = false) { $this->loadVtProductList("topseller",$sOxid,$iLimit,$blSubcats); }

    public function loadNewestManufacturerArticles($smId = null, $iLimit = null)
    {

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
        $sSelect = "select * from $sArticleTable ";
        $sSelect .= "WHERE oxmanufacturerid = '" . $smId . "' and " . $this->getBaseObject()->getSqlActiveSnippet() . " and oxissearch = 1 order by $sType desc ";

        if (!($iLimit = (int)$iLimit)) {
            $iLimit = $myConfig->getConfigParam('iNrofNewcomerArticles');
        }
        $sSelect .= "limit " . $iLimit;
        $this->selectString($sSelect);
    }
    public function loadRandomManufacturerArticles($sId, $iAmount = 1)
    {
        //var_dump($sId);
        //var_dump($iAmount);
        $sArticleTable = getViewName('oxarticles');
        $sSelect       = "SELECT * FROM $sArticleTable WHERE oxmanufacturerid = '$sId' AND  oxactive = 1 and oxissearch = 1  ORDER BY RAND() LIMIT $iAmount";
        $this->selectString($sSelect);
    }
    public function loadManufacturerTopseller($sId, $iAmount = 1)
    {
        //var_dump($sId);
        //var_dump($iAmount);
        $sArticleTable = getViewName('oxarticles');
        $sSelect       = "SELECT * FROM $sArticleTable WHERE oxmanufacturerid = '$sId' AND  oxactive = 1 and oxissearch = 1  ORDER BY RAND() LIMIT $iAmount";
        $this->selectString($sSelect);
    }
}