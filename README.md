# vt CMS Structure for OXID eSales 4.7
## actual version 1.1 from 5th september 2014
* provides the cms pages a simple category-like structure with some main and subpages 
![simple category-like structure](https://raw.github.com/vanilla-thunder/vt-cmsstructure/screenshots/screenshot1.jpg)

* assign a cms page as a subpage of another cms page simply by setting a parent load id
![resetting module caches](https://raw.github.com/vanilla-thunder/vt-cmsstructure/screenshots/screenshot2.jpg)

* no editing of admin templates needed. 



## INSTALLATION
copy the content of the "copy_this" folder into the shop root directory  
**if you are uploading files via ftp, switch to the binary transfer mode**  
### ssh shell + git client:
navigate into the modules directory
clone remote git repo and switch to the "module" branch.  
this commands works for debian and centos:
<pre>$ git clone -b module git://github.com/vanilla-thunder/vt-cmsstructure.git</pre>

## USAGE
### top categories
edit template:  **widget/header/categorylist.tpl**
somewhere at lines 31-40 you will find:
```php
[{if $iCatCnt <= $oView->getTopNavigationCatCnt()}]
    <li><a href="[{$oTopCont->getLink()}]">[{$oTopCont->oxcontents__oxtitle->value}]</a></li>
[{else}]
   [{capture append="moreLinks"}]
      <li><a href="[{$oTopCont->getLink()}]">[{$oTopCont->oxcontents__oxtitle->value}]</a></li>
   [{/capture}]
[{/if}]
```


insert this code between </a> and </li> on line 32:
<pre>[{if $oTopCont->hasSubpages()}][{include file="cmssubpages.tpl" cat=$oTopCont iTotalNavigationLevels=4 }][{/if}]</pre>
so you will get this:
```php
[{if $iCatCnt <= $oView->getTopNavigationCatCnt()}]
   <li><a href="[{$oTopCont->getLink()}]">[{$oTopCont->oxcontents__oxtitle->value}]</a>
      [{if $oTopCont->hasSubpages()}][{include file="cmssubpages.tpl" cat=$oTopCont iTotalNavigationLevels=4 }][{/if}]
   </li>
[{else}]
   [{capture append="moreLinks"}]
      <li><a href="[{$oTopCont->getLink()}]">[{$oTopCont->oxcontents__oxtitle->value}]</a></li>
   [{/capture}]
[{/if}]
```
Look at the paramater **iTotalNavigationLevels=4**, it sets the amount of subcategory navigation levels, in this case **4** means, that there will be **5** (!) sub-levels:
![navigation levels](https://raw.github.com/vanilla-thunder/vt-cmsstructure/screenshots/screenshot3.jpg)

### sidebar tree
have a loot at the included file demo_template.tpl  
it contains some code to create tree navigation like categories tree.



##LICENSE AGREEMEN
Copyright (C) 2012-2013  Marat Bedoev

This program is free software;
you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
