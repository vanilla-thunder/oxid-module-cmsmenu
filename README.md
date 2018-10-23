# [vt] cmsmenu - Module for OXID eShop 4.9+
## current version: 2.1.0 ( 2018-10-23 )
assign parent-child relations to cms pages to create category-like cms menu in main navigation  

### Installation
* [https://github.com/vanilla-thunder/oxid-module-cmsmenu/archive/master.zip](https://github.com/vanilla-thunder/oxid-module-cmsmenu/archive/master.zip) herunterladen und entpacken
* Inhalt von "copy_this" in den Shop hochladen
* Modul aktivieren und Moduleinstellungen konfigurieren
* Views aktualisieren
  
### TEMPLATE CHANGES
### FLOW : application/views/flow/tpl/widget/header/categorylist.tpl
````php
33|  [{foreach from=$ocat->getContentCats() item="oTopCont" name="MoreTopCms"}]
34|    [{block name="cmsmenu_dropdown"}] <!-- insert block opening tag before <li> -->
35|      <li>
36|        <a href="[{$oTopCont->getLink()}]">[{$oTopCont->oxcontents__oxtitle->value}]</a>
37|      </li>
38|    [{/block}]<!-- insert block closing tag after </li> -->
39|  [{/foreach}]
````

### LICENSE AGREEMENT
   [vt] cmsmenu - Module for OXID eShop 4.9+  
   Copyright (C) 2018 Marat Bedoev  
   info:  schwarzarbyter@gmail.com  
  
   This program is free software;  
   you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
   either version 3 of the License, or (at your option) any later version.
  
   This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;  
   without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
   You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>