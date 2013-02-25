<?php
/**
 * vt CMS Structure
 * Copyright (C) 2012-2013  Marat Bedoev
 * 
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 */
$sMetadataVersion = '1.1';
$aModule = array(
	'id' => 'vt-cmsstructure',
	'title' => '<strong style="color:#c700bb;border: 1px solid #c700bb;padding: 0 2px;background:white;">VT</strong> CMS Structure',
	'description' => 'gives you a possibility to assign a cms page as a sub-page of another cms page',
	'thumbnail' => 'oxid-vt.jpg',
	'version' => '1.0 from 2013-02-22</dd>
	<dt>newest version</dt><dd><img src="https://raw.github.com/vanilla-thunder/vt-cmsstructure/module/version.jpg" /><br/><a style="display: inline-block; padding: 1px 15px; background: #f0f0f0; border: 1px solid gray" href="https://github.com/vanilla-thunder/vt-cmsstructure/" target="_blank">info</a> <a style="display: inline-block; padding: 1px 15px; background: #f0f0f0; border: 1px solid gray" href="https://github.com/vanilla-thunder/vt-cmsstructure/archive/master.zip">download</a>',
	'author' => 'Marat Bedoev',
	'email' => 'oxid@marat-bedoev.net',
	'url' => 'https://github.com/vanilla-thunder/',
	'extend' => array(
        'content' => 'vt-cmsstructure/extend/content_vtcms',
        'oxcontent' => 'vt-cmsstructure/extend/oxcontent_vtcms',
        'oxcontentlist' => 'vt-cmsstructure/extend/oxcontentlist_vtcms'
	),
    'files' => array(
        'vtcms_cfg'=>'vt-cmsstructure/core/vtcms_cfg.php'
    ),
    'templates' => array(
        'cmssubpages.tpl' => 'vt-cmsstructure/out/tpl/cmssubpages.tpl'
    ),
	'blocks' => array(
        array('template' => 'content_list.tpl', 'block' => 'admin_content_list_colgroup', 'file' => 'admin_content_list_colgroup.tpl'),
        array('template' => 'content_list.tpl', 'block' => 'admin_content_list_filter',   'file' => 'admin_content_list_filter.tpl'),
        array('template' => 'content_list.tpl', 'block' => 'admin_content_list_sorting',  'file' => 'admin_content_list_sorting.tpl'),
        array('template' => 'content_list.tpl', 'block' => 'admin_content_list_item',     'file' => 'admin_content_list_item.tpl'),
        array('template' => 'content_main.tpl', 'block' => 'admin_content_main_form',     'file' => 'admin_content_main_form.tpl'),
    ),
    'events' => array(
        'onActivate'   => 'vtcms_cfg::setupCmsStructure',
        //'onDeactivate' => 'vtcms_cfg::onDeactivate'
    ),
);