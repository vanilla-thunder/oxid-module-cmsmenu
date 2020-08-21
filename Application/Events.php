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

namespace VanillaThunder\Cmsmenu\Application;

class Events
{
    private static $update = false;
    private static function addTableFields(\OxidEsales\Eshop\Core\DbMetaDataHandler $oDbMetaDataHandler)
    {
        if (!$oDbMetaDataHandler->fieldExists("oxparentloadid", "oxcontents")) {
            $oDbMetaDataHandler->executeSql("ALTER TABLE oxcontents ADD OXPARENTLOADID CHAR( 32 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'vt-cmsmenu - parent cms page ident'");
            self::$update = true;
        }

        if (!$oDbMetaDataHandler->fieldExists("oxsort", "oxcontents")) {
            $oDbMetaDataHandler->executeSql("ALTER TABLE oxcontents ADD OXSORT INT( 11 ) NOT NULL DEFAULT '9999' COMMENT 'vt-cmsmenu - sorting order'");
            self::$update = true;
        }

        if (!$oDbMetaDataHandler->fieldExists("external", "oxcontents")) {
            $oDbMetaDataHandler->executeSql("ALTER TABLE oxcontents ADD EXTERNAL INT( 1 ) NOT NULL DEFAULT '0' COMMENT 'vt-cmsmenu - external cms'");
            self::$update = true;
        }
    }

    private static function addDemoCmsPages()
    {
        // demo data
        $cmsmenu_top1 = array(
            "oxcontents__oxactive" => 1,
            "oxcontents__oxtype" => 2,
            "oxcontents__oxid" => "cmsmenutop1",
            "oxcontents__oxtitle" => "CMS Menu Top 1",
            "oxcontents__oxloadid" => "cmsmenu_top1"
        );
        $cmsmenu_top1_sub1 = array(
            "oxcontents__oxactive" => 1,
            "oxcontents__oxtype" => 1,
            "oxcontents__oxid" => "cmsmenutop1sub1",
            "oxcontents__oxtitle" => "CMS Menu Top 1 - Sub 1",
            "oxcontents__oxloadid" => "cmsmenu_top1_sub1",
            "oxcontents__oxparentloadid" => "cmsmenu_top1",
            "oxcontents__oxsort" => 1
        );
        $cmsmenu_top1_sub2 = array(
            "oxcontents__oxactive" => 1,
            "oxcontents__oxtype" => 1,
            "oxcontents__oxid" => "cmsmenutop1sub2",
            "oxcontents__oxtitle" => "CMS Menu Top 1 - Sub 2",
            "oxcontents__oxloadid" => "cmsmenu_top1_sub2",
            "oxcontents__oxparentloadid" => "cmsmenu_top1",
            "oxcontents__oxsort" => 2
        );
        $cmsmenu_top1_sub2_sub1 = array(
            "oxcontents__oxactive" => 1,
            "oxcontents__oxtype" => 3,
            "oxcontents__oxid" => "cmsmenutop1sub2sub1",
            "oxcontents__oxtitle" => "CMS Menu Top 1 - Sub 2 - Sub 1",
            "oxcontents__oxloadid" => "cmsmenu_top1_sub2_sub1",
            "oxcontents__oxparentloadid" => "cmsmenu_top1_sub2",
            "oxcontents__oxsort" => 1
        );
        $cmsmenu_top1_sub2_sub2 = array(
            "oxcontents__oxactive" => 1,
            "oxcontents__oxtype" => 3,
            "oxcontents__oxid" => "cmsmenutop1sub2sub2",
            "oxcontents__oxtitle" => "CMS Menu Top 1 - Sub 2 - Sub 2",
            "oxcontents__oxloadid" => "cmsmenu_top1_sub2_sub2",
            "oxcontents__oxparentloadid" => "cmsmenu_top1_sub2",
            "oxcontents__oxsort" => 2
        );
        $placeholder_contact = array(
            "oxcontents__oxactive" => 1,
            "oxcontents__oxtype" => 3,
            "oxcontents__oxid" => "placeholdercontact",
            "oxcontents__oxtitle" => "Contact",
            "oxcontents__oxloadid" => "placeholder_contact",
            "oxcontents__oxparentloadid" => "cmsmenu_top1_sub2",
            "oxcontents__external" => 1,
            "oxcontents__oxcontent" => '[{ oxgetseourl ident=$oViewConf->getSslSelfLink()|cat:"cl=contact" }]',
            "oxcontents__oxsort" => 3
        );

        $cms = oxNew(\OxidEsales\Eshop\Application\Model\Content::class);
        $cms->assign($cmsmenu_top1);
        $cms->save();
        $cms->assign($cmsmenu_top1_sub1);
        $cms->save();
        $cms->assign($cmsmenu_top1_sub2);
        $cms->save();
        $cms->assign($cmsmenu_top1_sub2_sub1);
        $cms->save();
        $cms->assign($cmsmenu_top1_sub2_sub2);
        $cms->save();
        $cms->assign($placeholder_contact);
        $cms->save();
    }

    public static function onActivate()
    {
        //$oDbMetaDataHandler = ContainerFactory::getInstance()->getContainer()->get(\OxidEsales\Eshop\Core\DbMetaDataHandler::class);
        $oDbMetaDataHandler = oxNew(\OxidEsales\Eshop\Core\DbMetaDataHandler::class);

        self::addTableFields($oDbMetaDataHandler);

        if (self::$update) {
            $oDbMetaDataHandler->updateViews();
            self::addDemoCmsPages();
        }
    }
}
