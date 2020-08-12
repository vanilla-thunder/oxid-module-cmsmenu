<?php

/**
 *  cmsmenu
 *  Copyright (C) 2018  Marat Bedoev
 *  info:  schwarzarbyter@gmail.com
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 **/

$sMetadataVersion = '1.1';
$aModule = [
   'id'          => 'cmsmenu',
   'title'       => '[vt] CMS Structure',
   'description' => 'assign parent-child relations to cms pages to create category-like cms menu in main navigation',
   'thumbnail'   => '',
   'version'     => '2.1.0 ( 2018-10-23 )',
   'author'      => 'Marat Bedoev',
   'email'       => 'schwarzarbyter@gmail.com',
   'url'         => 'https://github.com/vanilla-thunder/oxid-module-cmsmenu',
   'extend'      => [
      'content'       => 'vt/cmsmenu/application/extend/content_vtcms',
      'oxcontent'     => 'vt/cmsmenu/application/extend/oxcontent_vtcms',
      'oxcontentlist' => 'vt/cmsmenu/application/extend/oxcontentlist_vtcms'
   ],
   'files'       => [
      'vtcms_cfg' => 'vt/cmsmenu/application/core/vtcms_cfg.php'
   ],
   'blocks'      => [
      // BE
      [
         'template' => 'content_list.tpl',
         'block'    => 'admin_content_list_colgroup',
         'file'     => '/application/views/blocks/admin/admin_content_list_colgroup.tpl'
      ], [
         'template' => 'content_list.tpl',
         'block'    => 'admin_content_list_filter',
         'file'     => '/application/views/blocks/admin/admin_content_list_filter.tpl'
      ], [
         'template' => 'content_list.tpl',
         'block'    => 'admin_content_list_sorting',
         'file'     => '/application/views/blocks/admin/admin_content_list_sorting.tpl'
      ], [
         'template' => 'content_list.tpl',
         'block'    => 'admin_content_list_item',
         'file'     => '/application/views/blocks/admin/admin_content_list_item.tpl'
      ], [
         'template' => 'content_main.tpl',
         'block'    => 'admin_content_main_form',
         'file'     => '/application/views/blocks/admin/admin_content_main_form.tpl'
      ],
      // FE
       ['theme' => 'wave','template' => 'widget/header/categorylist.tpl', 'block' => 'cmsmenu_dropdown', 'file' => '/application/views/wave_dropdown.tpl'],
       ['template' => 'widget/header/categorylist.tpl', 'block' => 'cmsmenu_dropdown', 'file' => '/application/views/blocks/cmsmenu_dropdown.tpl'],
       ['template' => 'layout/sidebar.tpl', 'block' => 'cmsmenu_sidebar', 'file' => '/application/views/blocks/cmsmenu_sidebar.tpl']

   ],
   'events'      => [
      'onActivate' => 'vtcms_cfg::setupCmsmenu',
      //'onDeactivate' => 'vtcms_cfg::onDeactivate'
   ]
];
