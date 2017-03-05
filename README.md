# vt CMS Structure for OXID eShop 4.9+
## current version: 2.0.1
* no editing of admin templates needed. 
* provides the cms pages a simple category-like structure with some main and subpages 
![simple category-like structure](https://raw.github.com/vanilla-thunder/vt-cmsstructure/screenshots/screenshot1.jpg)





## INSTALLATION
upload contents of "copy_this" folder into your shop root directory.
  
## TEMPLATE CHANGES : tpl/widget/header/categorylist.tpl
### Flow
````php
33|  [{foreach from=$ocat->getContentCats() item="oTopCont" name="MoreTopCms"}]
34|    [{block name="cmsmenu_dropdown"}] <!-- insert block opening tag before <li> -->
35|      <li>
36|        <a href="[{$oTopCont->getLink()}]">[{$oTopCont->oxcontents__oxtitle->value}]</a>
37|      </li>
38|    [{/block}]<!-- insert block closing tag after </li> -->
39|  [{/foreach}]
````
### Glow
 ````php
48|  [{foreach from=$ocat->getContentCats() item="oTopCont" name="MoreTopCms"}]
49|    [{block name="cmsmenu_dropdown"}] <!-- insert block opening tag before <li> -->
50|      <li [{if $cl == 'content' && $cms == $oTopCont->getId()}]class="active"[{/if}]>
51|        <a href="[{$oTopCont->getLink()}]">[{$oTopCont->oxcontents__oxtitle->value}]</a>
52|      </li>
53|    [{/block}]<!-- insert block closing tag after </li> -->
54|  [{/foreach}]
````
### eComTheme
 ````php
128|  [{if $iCatCnt <= $oView->getTopNavigationCatCnt()}]
129|    [{block name="cmsmenu_dropdown"}] <!-- insert block opening tag before <li> -->
130|      <li>
131|        <a href="[{$oTopCont->getLink()}]">[{$oTopCont->oxcontents__oxtitle->value}]</a>
132|      </li>
133|    [{/block}]<!-- insert block closing tag after </li> -->
134|  [{else}]
````

##LICENSE AGREEMEN
Copyright (C) 2017  Marat Bedoev

This program is free software;
you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
