# [vt] cmsmenu - Module for OXID eShop 6.2+
## current version: 3.0.0 ( 2020-08-20 )
assign parent-child relations to cms pages to create category-like cms menu in main navigation  

### INSTALLATION
`composer require -n vanilla-thunder/oxid-module-cmsmenu`
  
### TEMPLATE CHANGES
#### WAVE : application/views/wave/tpl/widget/header/categorylist.tpl
````php
32|  [{foreach from=$ocat->getContentCats() item="oTopCont" name="MoreTopCms"}]
33|    [{block name="cmsmenu_dropdown"}] <!-- insert block opening tag before <li> -->
34|      <li class="nav-item">
35|        <a class="nav-link[{if $oContent->oxcontents__oxloadid->value === $oTopCont->oxcontents__oxloadid->value}] active[{/if}]" href="[{$oTopCont->getLink()}]">[{$oTopCont->oxcontents__oxtitle->value}]</a>
36|      </li>
37|    [{/block}]<!-- insert block closing tag after </li> -->
38|  [{/foreach}]
````

#### FLOW : application/views/flow/tpl/widget/header/categorylist.tpl
````php
33|  [{foreach from=$ocat->getContentCats() item="oTopCont" name="MoreTopCms"}]
34|    [{block name="cmsmenu_dropdown"}] <!-- insert block opening tag before <li> -->
35|      <li[{if $oContent->oxcontents__oxloadid->value === $oTopCont->oxcontents__oxloadid->value}] class="active"[{/if}]>
36|        <a href="[{$oTopCont->getLink()}]">[{$oTopCont->oxcontents__oxtitle->value}]</a>
37|      </li>
38|    [{/block}]<!-- insert block closing tag after </li> -->
39|  [{/foreach}]
````

### LICENSE AGREEMENT
   [vt] cmsmenu - Module for OXID eShop 6.2+  
   Copyright (C) 2020 Marat Bedoev    
  
   This program is free software;  
   you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
   either version 3 of the License, or (at your option) any later version.
  
   This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;  
   without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
   You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>