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
class oxutilsview_nca extends oxutilsview_nca_parent
{

    public function getSmarty($blReload = false)
    {
        $smarty = parent::getSmarty($blReload);
        $smarty->register_function('vt_nca', array($this, 'smarty_function_newestCategoryArticles'));
        return $smarty;
    }

    function smarty_function_newestCategoryArticles($params, &$smarty)
    {

        // default values
        $oxid   = ($params['oxid']) ? $params['oxid'] : oxRegistry::getConfig()->getRequestParameter('cnid');
        $am     = ($params['amount']) ? $params['amount'] : null;
        $head = ($params['head']) ? $params['head'] : "vtnca_newestarticles";
        $file   = ($params['file']) ? $params['file'] : "widget/product/boxproducts.tpl";

        //_oBoxProducts=$oView->getTop5ArticleList() _sHeaderIdent="TOP_OF_THE_SHOP"}]

        if (!$oxid) return "<!-- vt-nca: no category id given -->"; // exit if no oxID given

        // getting newest category articles
        $oArtList = oxNew('oxarticlelist');
        $oArtList->loadNewestCategoryArticles($oxid, $am);

        if (!$oArtList->count()) return; // exit if no products in category

        if ($params['assign']) {

            $smarty->assign($params['assign'], $oArtList);
            return;
        }

        // for default boxproducts
        $smarty->assign("_sHeaderIdent", $head);
        $smarty->assign("_oBoxProducts", $oArtList);

        // for stabdard list.tpl
        $smarty->assign("head", $head);
        $smarty->assign("products", $oArtList);

        $html = $smarty->fetch($file);
        //$smarty->clear_assign("__nca_".$oxid);
        return $html;

    }

}