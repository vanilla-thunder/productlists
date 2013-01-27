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
$aModule = array(
    'id' => 'vt-nca',
    'title' => '<strong style="color:#c700bb;border: 1px solid #c700bb;padding: 0 2px;background:white;">VT</strong> Newest Category Articles',
    'description' => 'getting list of newest articles from a specal category<hr/>
			<h2>usage:</h2>put this code into list.tpl to insert the list of newest articles
			<textarea cols="80" rows="2">[{block name="category_newestarticles"}][{/block}]</textarea><br/>
edit the vt-nca/out/blocks/category_newestarticles.tpl file to change the appearance',
    'thumbnail' => 'oxid-vt.jpg',
    'version' => '1.0.1 (2013-01-27)</dd><dt>newest version</dt><dd><img src="https://raw.github.com/vanilla-thunder/vt-nca/module/version.jpg" /><br/>
		 <a style="display: inline-block; padding: 1px 15px; background: #f0f0f0; border: 1px solid gray" href="https://github.com/vanilla-thunder/vt-nca/" target="_blank">info</a>
		 <a style="display: inline-block; padding: 1px 15px; background: #f0f0f0; border: 1px solid gray" href="https://github.com/vanilla-thunder/vt-nca/archive/master.zip">download</a>',
    'author' => 'Marat Bedoev',
    'email' => 'oxid@marat-bedoev.net',
    'url' => 'https://github.com/vanilla-thunder/',
    'extend' => array(
        'alist' => 'vt-nca/alist_nca',
        'manufacturerlist' => 'vt-nca/manufacturerlist_nca',
        'start' => 'vt-nca/start_nca',
        'oxarticlelist' => 'vt-nca/oxarticlelist_nca',
    ),
    'blocks' => array(
        array('template' => 'page/list/list.tpl', 'block' => 'category_newestarticles', 'file' => 'category_newestarticles.tpl')
    )
);