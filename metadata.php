<?php
    /**
     * vt CMS Structure
     * Copyright (C) 2012-2015  Marat Bedoev
     *
     * This program is free software;
     * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
     * either version 3 of the License, or (at your option) any later version.
     *
     * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
     * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
     * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
     *
     * Version:    1.5
     * Author:     Marat Bedoev <oxid@marat.ws>
     */
     
$sMetadataVersion = '1.1';
$v = 'https://raw.githubusercontent.com/vanilla-thunder/vt-cmsstructure/master/vt-cmsstructure/version.jpg';
$aModule = array(
	'id' => 'vt-cmsstructure',
	'title' => '<strong style="color:#c700bb;border: 1px solid #c700bb;padding: 0 2px;background:white;">VT</strong> CMS Structure',
	'description' => 'gives you a possibility to assign a cms page as a sub-page of another cms page<p>edit modules/vt-cmsstructure/views/</p><hr/><b style="display: inline-block; float:left;">newest version:</b><img src="' . $v . '" style=" float:left;"/> (no need to update if you already have this version)',
	'thumbnail' => 'oxid-vt.jpg',
	'version' => '1.5 (2015-05-28)',
	'author' => 'Marat Bedoev',
	'email' => 'oxid@marat.ws',
	'url' => 'https://github.com/vanilla-thunder/vt-cmsstructure/',
	'extend' => array(
        'content' => 'vt-cmsstructure/extend/content_vtcms',
        'oxcontent' => 'vt-cmsstructure/extend/oxcontent_vtcms',
        'oxcontentlist' => 'vt-cmsstructure/extend/oxcontentlist_vtcms'
	),
    'files' => array(
        'vtcms_cfg'=>'vt-cmsstructure/core/vtcms_cfg.php'
    ),
    'templates' => array(
        'header_cmsmenu.tpl'  => 'vt-cmsstructure/views/tpl/header_cmsmenu.tpl',
        'sidebar_cmsmenu.tpl' => 'vt-cmsstructure/views/tpl/sidebar_cmsmenu.tpl'
    ),
	'blocks' => array(
        array('template' => 'content_list.tpl',   'block' => 'admin_content_list_colgroup', 'file' => '/views/blocks/admin/admin_content_list_colgroup.tpl'),
        array('template' => 'content_list.tpl',   'block' => 'admin_content_list_filter',   'file' => '/views/blocks/admin/admin_content_list_filter.tpl'),
        array('template' => 'content_list.tpl',   'block' => 'admin_content_list_sorting',  'file' => '/views/blocks/admin/admin_content_list_sorting.tpl'),
        array('template' => 'content_list.tpl',   'block' => 'admin_content_list_item',     'file' => '/views/blocks/admin/admin_content_list_item.tpl'),
        array('template' => 'content_main.tpl',   'block' => 'admin_content_main_form',     'file' => '/views/blocks/admin/admin_content_main_form.tpl'),
        array('template' => 'widget/header/categorylist.tpl', 'block' => 'categorylist_cmsmenu', 'file' => '/views/blocks/categorylist_cmsmenu.tpl'),
        array('template' => 'layout/sidebar.tpl', 'block' => 'sidebar_categoriestree',      'file' => '/views/blocks/sidebar_categoriestree.tpl'),
        
    ),
    'events' => array(
        'onActivate'   => 'vtcms_cfg::setupCmsStructure',
        //'onDeactivate' => 'vtcms_cfg::onDeactivate'
    ),
);
