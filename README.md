## ###_MODULE_###
by ###_AUTHOR_###  
###_URL_###
module version ###_VERSION_###

## How to use:
inseret follwing code into your template or cms page and set oxID of a category as _oxid=""_ parameter:  
__newest category products / neuste Produkte der Kategorie:__  
``[{ newest_products oxid=""  }]``   
__random category products / zufällige Produkte der Kategorie:__  
``[{ random_products oxid=""  }]``  
__category topseller / Topseller der Kategorie:__  
``[{ topseller oxid=""  }]``

### additional parameters / zusätzliche Parameter:
* add ``[{ ... subcats=true}]`` for loading products from this category and all its children.  
  
* add ``[{ ... amount="2"}]`` for custom amount of products to show.  
  the default value is taken from oxid setting "amount of newest articles"
  
* add ``[{ ... file="widget/product/list.tpl"}]`` to use custom template  
  default template is _widet/product/list.tpl_
  
* add ``[{ ... head=""}]`` for custom title  
  apply __|oxmultilangassign__ when using language idents: ``[{ ... head="LANG_IDENT"|oxmultilangassign }]``
    
* add ``[{ ... assign=""}]`` to assign products to a variable instead of direct output in template 

##  Installation [DE]
  * Archiv herunterladen und entpacken
  * Inhalt von copy_this/ in den Hauptverzeichnis des Shop hochladen
  * Modul aktivieren
  
##  installation [EN]
  * download and unzip the archive
  * upload contents of copy_this/ into your shop root directory
  * activate module
   
##  Инсталляциа [RU]
  * Скачать и распаковать архив
  * загрузить содержимое copy_this/ на сервер
  * активировать модуль


### LICENSE AGREEMENT
   ###_MODULE_###  
   Copyright (C) ###_YEAR_### ###_COMPANY_###  
   info:  ###_EMAIL_###  
     
   GNU GENERAL PUBLIC LICENSE  
     
   This program is free software;  
   you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
   either version 3 of the License, or (at your option) any later version.
  
   This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;  
   without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
   You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
