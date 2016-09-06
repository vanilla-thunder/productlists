<?php

/*
 *  - additional product list for OXID eShop
 * Copyright (C) 2016  
 * info:  m@marat.ws
 *
 * GNU GENERAL PUBLIC LICENSE  
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 *  without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 */
 
$v = "https://raw.githubusercontent.com/vanilla-thunder/vt-productlists/master/copy_this/modules/vt-productlists/version.jpg";

$sMetadataVersion = '1.1';
$aModule = array(
    'id'          => 'vt-productlists',
    'title'       => '[vt] product lists',
    'description' => 'additional product list for OXID eShop 4.9<br/><b style="display:inline-block;float:left;line-height:18px;">newest version:</b><img src="' . $v . '"/><br/>(no need to update if you already have this version)',
    'thumbnail'   => 'oxid-vt.jpg',
    'version'     => '1.3.0',
    'author'      => 'Marat Bedoev, ',
    'email'       => 'm@marat.ws',
    'url'         => 'https://github.com/vanilla-thunder/vt-productlists',
    'extend'      => array(
        'oxutilsview'      => 'vt-productlists/extend/oxutilsview_vtproductlists',
        'manufacturerlist' => 'vt-productlists/extend/manufacturerlist_vtproductlists',
        'oxarticlelist'    => 'vt-productlists/extend/oxarticlelist_vtproductlists'
    )
);