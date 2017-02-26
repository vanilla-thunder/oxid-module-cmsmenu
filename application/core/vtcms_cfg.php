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
 */
class vtcms_cfg extends oxConfig
{

   public static function setupCmsStructure()
   {

      $sQuery = "ALTER TABLE oxcontents ADD OXPARENTLOADID CHAR( 32 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '', ADD OXSORT INT( 11 ) NOT NULL DEFAULT '9999'";

      $oDb = oxDb::getDb(FETCH_MODE_ASSOC);
      $aColumns = $oDb->getRow("SELECT * FROM oxcontents LIMIT 1");

      $update = false;

      if (!array_key_exists("oxparentloadid", $aColumns) && !array_key_exists("OXPARENTLOADID", $aColumns)) {
         $oDb->execute("ALTER TABLE oxcontents ADD OXPARENTLOADID CHAR( 32 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'vt cmsstructure - parent cms page ident'");
         $update = true;
      }

      if (!array_key_exists("oxsort", $aColumns) && !array_key_exists("OXSORT", $aColumns)) {
         $oDb->execute("ALTER TABLE oxcontents ADD OXSORT INT( 11 ) NOT NULL DEFAULT '9999' COMMENT 'vt cmsstructure - sorting order'");
         $update = true;
      }

      if (!array_key_exists("external", $aColumns) && !array_key_exists("EXTERNAL", $aColumns)) {
         $oDb->execute("ALTER TABLE oxcontents ADD EXTERNAL INT( 1 ) NOT NULL DEFAULT '0' COMMENT 'vt cmsstructure - external cms'");
         $update = true;
      }

      // update views
      if ($update) {
         $oMetaData = oxNew('oxDbMetaDataHandler');
         $oMetaData->updateViews();

         foreach (glob(oxRegistry::get("oxconfig")->getConfigParam("sCompileDir") . "/*.txt") as $item) if (is_file($item)) unlink($item);
         //sleep(5); // views werden nicht aktualiert oder vielleicht zui langsam?

         // demo data
         $cmsmenu_top1 = array(
            "oxcontents__oxactive" => 1,
            "oxcontents__oxtype"   => 2,
            "oxcontents__oxid"     => "cmsmenutop1",
            "oxcontents__oxtitle"  => "CMS Menu Top 1",
            "oxcontents__oxloadid" => "cmsmenu_top1"
         );
         $cmsmenu_top1_sub1 = array(
            "oxcontents__oxactive"       => 1,
            "oxcontents__oxtype"         => 1,
            "oxcontents__oxid"           => "cmsmenutop1sub1",
            "oxcontents__oxtitle"        => "CMS Menu Top 1 - Sub 1",
            "oxcontents__oxloadid"       => "cmsmenu_top1_sub1",
            "oxcontents__oxparentloadid" => "cmsmenu_top1",
            "oxcontents__oxsort"         => 1
         );
         $cmsmenu_top1_sub2 = array(
            "oxcontents__oxactive"       => 1,
            "oxcontents__oxtype"         => 1,
            "oxcontents__oxid"           => "cmsmenutop1sub2",
            "oxcontents__oxtitle"        => "CMS Menu Top 1 - Sub 2",
            "oxcontents__oxloadid"       => "cmsmenu_top1_sub2",
            "oxcontents__oxparentloadid" => "cmsmenu_top1",
            "oxcontents__oxsort"         => 2
         );
         $cmsmenu_top1_sub2_sub1 = array(
            "oxcontents__oxactive"       => 1,
            "oxcontents__oxtype"         => 3,
            "oxcontents__oxid"           => "cmsmenutop1sub2sub1",
            "oxcontents__oxtitle"        => "CMS Menu Top 1 - Sub 2 - Sub 1",
            "oxcontents__oxloadid"       => "cmsmenu_top1_sub2_sub1",
            "oxcontents__oxparentloadid" => "cmsmenu_top1_sub2",
            "oxcontents__oxsort"         => 1
         );
         $cmsmenu_top1_sub2_sub2 = array(
            "oxcontents__oxactive"       => 1,
            "oxcontents__oxtype"         => 3,
            "oxcontents__oxid"           => "cmsmenutop1sub2sub2",
            "oxcontents__oxtitle"        => "CMS Menu Top 1 - Sub 2 - Sub 2",
            "oxcontents__oxloadid"       => "cmsmenu_top1_sub2_sub2",
            "oxcontents__oxparentloadid" => "cmsmenu_top1_sub2",
            "oxcontents__oxsort"         => 2
         );
         $placeholder_contact = array(
            "oxcontents__oxactive"       => 1,
            "oxcontents__oxtype"         => 3,
            "oxcontents__oxid"           => "placeholdercontact",
            "oxcontents__oxtitle"        => "Contact",
            "oxcontents__oxloadid"       => "placeholder_contact",
            "oxcontents__oxparentloadid" => "cmsmenu_top1_sub2",
            "oxcontents__external"       => 1,
            "oxcontents__oxcontent"      => '[{ oxgetseourl ident=$oViewConf->getSslSelfLink()|cat:"cl=contact" }]',
            "oxcontents__oxsort"         => 3
         );

         $cms = oxNew("oxcontent");
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
   }

}
