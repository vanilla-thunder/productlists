<?php

/**
 * additional product list for OXID eShop CE
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
class oxutilsview_vtproductlists extends oxutilsview_vtproductlists_parent
{

    public function getSmarty($blReload = false)
    {
        $smarty = parent::getSmarty($blReload);
        $smarty->register_function('newest_products', array($this, 'smarty_function_newestCategoryArticles'));
        $smarty->register_function('random_products', array($this, 'smarty_function_randomCategoryArticles'));
        $smarty->register_function('topseller', array($this, 'smarty_function_categoryTopseller'));
        return $smarty;
    }

    /**
     * @param string $type
     * @param array $params
     * @param smarty $smarty
     * @return string|void
     */
    function prepareVtProductList($type = "newest", $params, &$smarty)
    {
        // default values
        $oxid = ($params['oxid']) ? $params['oxid'] : oxRegistry::getConfig()->getRequestParameter('cnid');
        $am   = ($params['amount']) ? $params['amount'] : null;
        $head = ($params['head']) ? $params['head'] : oxRegistry::getLang()->translateString("vt_{$type}articles");
        $file = ($params['file']) ? $params['file'] : "widget/product/list.tpl";
        $subcats = ($params['subcats']) ? true : false;

        if (!$oxid) return "<!-- newest category products: no category id given -->"; // exit if no oxID given

        // getting new category articles
        $oArtList = oxNew('oxarticlelist');
        switch ($type)
        {
            case "newest":
                $oArtList->loadNewestCategoryArticles($oxid, $am, $subcats);
                break;
            case "random":
                $oArtList->loadRandomCategoryArticles($oxid, $am, $subcats);
                break;
            case "topseller":
                $oArtList->loadCategoryTopseller($oxid, $am, $subcats);
                break;
        }


        if (!$oArtList->count()) return "<!-- newest category products: no active products in category {$oxid} -->"; // exit if no products in category

        if ($params['assign']) $smarty->assign($params['assign'], $oArtList);
        if ($params['assign']) return;

        $smarty->assign("head", $head);
        $smarty->assign("listId",$oxid."_".$type);
        $smarty->assign("products", $oArtList);

        $html = $smarty->fetch($file);
        return $html;
    }

    function smarty_function_newestCategoryArticles($params, &$smarty) { return $this->prepareVtProductList("newest",$params, $smarty); }
    function smarty_function_randomCategoryArticles($params, &$smarty) { return $this->prepareVtProductList("random",$params, $smarty); }
    function smarty_function_categoryTopseller($params, &$smarty) { return $this->prepareVtProductList("topseller",$params, $smarty); }

}