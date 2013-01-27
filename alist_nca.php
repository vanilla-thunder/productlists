<?php
/**
 * vt Newest Category Articles
 * Copyright (C) 2012  Marat Bedoev
 * 
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 */
class alist_nca extends alist_nca_parent {

	protected $_aNewArticleList = null;

	protected function _getLoadActionsParam() {
		if ($this->_blLoadActions === null) {
			$this->_blLoadActions = false;
			if ($this->getConfig()->getConfigParam('bl_perfLoadAktion')) {
				$this->_blLoadActions = true;
			}
		}
		return $this->_blLoadActions;
	}

	public function getNewestArticles() {
		if ($this->_aNewArticleList === null) {
			$this->_aNewArticleList = array();
			if ($this->_getLoadActionsParam()) {
				// newest articles
				$sCatId = oxConfig::getParameter('cnid');
				$oArtList = oxNew('oxarticlelist');
				$oArtList->loadNewestCategoryArticles($sCatId);
				if ($oArtList->count()) {
					$this->_aNewArticleList = $oArtList;
				}
			}
		}
		return $this->_aNewArticleList;
	}

}