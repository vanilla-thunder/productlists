<?php

/*
 * ###_COMPANY_### - ###_MODULE_###
 * Copyright (C) ###_YEAR_###  ###_COMPANY_###
 * info:  ###_EMAIL_###
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
 
$v = "https://raw.githubusercontent.com/vanilla-thunder/vt-nca/master/copy_this/modules/vt-nca/version.jpg";

$sMetadataVersion = '1.1';
$aModule = array(
    'id'          => 'vt-nca',
    'title'       => '<strong style="color:#c700bb;border: 1px solid #c700bb;padding: 0 2px;background:white;">vt</strong> Newest Category Articles',
    'description' => '###_MODULE_### 4.9<br/><b style="display:inline-block;float:left;line-height:18px;">newest version:</b><img src="' . $v . '"/><br/>(no need to update if you already have this version)',
    'thumbnail'   => 'oxid-vt.jpg',
    'version'     => '###_VERSION_###',
    'author'      => 'Marat Bedoev, ###_COMPANY_###',
    'email'       => '###_EMAIL_###',
    'url'         => 'https://github.com/vanilla-thunder/vt-nca',
    'extend'      => array(
        'oxutilsview'      => 'vt-nca/extend/oxutilsview_nca',
        'manufacturerlist' => 'vt-nca/extend/manufacturerlist_nca',
        'oxarticlelist'    => 'vt-nca/extend/oxarticlelist_nca',
    )
);