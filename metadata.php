<?php

/**
 * vanilla-thunder/oxid-module-cmsmenu
 * create navigation menu from cms pages
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 *  without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 */


$sMetadataVersion = '2.1';
$aModule = [
    'id' => 'vt-cmsmenu',
    'title' => '[VT] CMS Menu',
    'description' => 'assign parent-child relations to cms pages to create category-like cms menu in main navigation',
    'thumbnail' => 'thumbnail.jpg',
    'version' => '3.0.1 ( 2021-05-06 )',
    'author' => 'Marat Bedoev',
    'email' => openssl_decrypt("Az6pE7kPbtnTzjHlPhPCa4ktJLphZ/w9gKgo5vA//p4=", str_rot13("nrf-128-pop"), str_rot13("gvalzpr")),
    'url' => 'https://github.com/vanilla-thunder/oxid-module-cmsmenu',
    'extend' => [
        \OxidEsales\Eshop\Application\Controller\ContentController::class => VanillaThunder\Cmsmenu\Application\Extend\ContentController::class,
        \OxidEsales\Eshop\Application\Model\Content::class => VanillaThunder\Cmsmenu\Application\Extend\Content::class,
        \OxidEsales\Eshop\Application\Model\ContentList::class => VanillaThunder\Cmsmenu\Application\Extend\ContentList::class
    ],
    'blocks' => [
        // admin
        [
            //'theme' => 'admin',
            'template' => 'content_list.tpl',
            'block' => 'admin_content_list_colgroup',
            'file' => '/Application/views/blocks/admin/admin_content_list_colgroup.tpl'
        ], [
            //'theme' => 'admin',
            'template' => 'content_list.tpl',
            'block' => 'admin_content_list_filter',
            'file' => '/Application/views/blocks/admin/admin_content_list_filter.tpl'
        ], [
            //'theme' => 'admin',
            'template' => 'content_list.tpl',
            'block' => 'admin_content_list_sorting',
            'file' => '/Application/views/blocks/admin/admin_content_list_sorting.tpl'
        ], [
            //'theme' => 'admin',
            'template' => 'content_list.tpl',
            'block' => 'admin_content_list_item',
            'file' => '/Application/views/blocks/admin/admin_content_list_item.tpl'
        ], [
            //'theme' => 'admin',
            'template' => 'content_main.tpl',
            'block' => 'admin_content_main_form',
            'file' => '/Application/views/blocks/admin/admin_content_main_form.tpl'
        ],
        // frontend
        [
            'theme' => 'wave',
            'template' => 'widget/header/categorylist.tpl',
            'block' => 'cmsmenu_dropdown',
            'file' => '/Application/views/blocks/wave_dropdown.tpl'
        ], [
            'theme' => 'wave',
            'template' => 'layout/sidebar.tpl',
            'block' => 'cmsmenu_sidebar',
            'file' => '/Application/views/blocks/wave_sidebar.tpl'
        ], [
            'theme' => 'flow',
            'template' => 'widget/header/categorylist.tpl',
            'block' => 'cmsmenu_dropdown',
            'file' => '/Application/views/blocks/flow_dropdown.tpl'
        ], [
            'theme' => 'flow',
            'template' => 'layout/sidebar.tpl',
            'block' => 'cmsmenu_sidebar',
            'file' => '/Application/views/blocks/flow_sidebar.tpl'
        ]

    ],
    'events' => [
        'onActivate' => 'VanillaThunder\Cmsmenu\Application\Events::onActivate',
        //'onDeactivate' => 'vtcms_cfg::onDeactivate'
    ]
];
