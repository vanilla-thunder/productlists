## [vt] - Newest Category Articles for OXID eShop
### module version 1.1.0
display newest category articles for the current active or another particular category

## examples of usage / Anwendungsbeispiele:
  * ``[{ vt_nca }]``  
  in __list.tpl__ it will add small widget with newest category articles  
  for __start.tpl__ you have to set an active category in general settings
  * ``[{ vt_nca amount="2"}]``  
  use __amount=""__ to adjust the amount of articles to show  
  the default value is taken from oxid setting "amount of newest articles"
  * ``[{ vt_nca file="widget/product/list.tpl"}]``  
  use __file=""__ to set custom template  
  default template is _widet/product/boxproducts.tpl_  
  also fully supported is _widget/product/list.tpl_
  * ``[{ vt_nca head=""}]``  
  use __head=""__ to customize widget title  
  default template _widet/product/boxproducts.tpl_ requires a multilanguage ident  
  _widget/product/list.tpl_ accepts titles directly
  * ``[{ vt_nca assign=""}]``  
  use __assign=""__ to assign the oxArticleList to a custom variable in template.    
  you can use it with a foreach loop to iterate through all articles.
  
  * you can combine __file__ + __head__ + __amount__  
  or __amount__ + __assign__

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

## more info here: [http:/marat.ws/vt-nca/](http:/marat.ws/vt-nca/)

### LICENSE AGREEMENT
   [vt] - Newest Category Articles for OXID eShop  
   Copyright (C) 2015  Marat Bedoev  
   info:  m@marat.ws  
     
   GNU GENERAL PUBLIC LICENSE  
     
   This program is free software;  
   you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
   either version 3 of the License, or (at your option) any later version.
  
   This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;  
   without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
   You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
