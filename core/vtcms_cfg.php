<?php
/**
 * vt CMS Structure
 * Copyright (C) 2012-2014  Marat Bedoev
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

    public static function setupCmsStructure() {
        
        $sQuery = "ALTER TABLE oxcontents ADD OXPARENTLOADID CHAR( 32 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '', ADD OXSORT INT( 11 ) NOT NULL DEFAULT '9999'";

        $oDb = oxDb::getDb();
        $oRs = $oDb->metaColumnNames( "oxcontents" );
        
        $update = false;
        
        if ( !array_key_exists( "oxparentloadid", $oRs ) && !array_key_exists( "OXPARENTLOADID", $oRs ) )
        {
            $oDb->execute( "ALTER TABLE oxcontents ADD OXPARENTLOADID CHAR( 32 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '' COMMENT 'vt-cmsstructure - parent cms page ident'" );
            $update = true;
        }
        
        if ( !array_key_exists( "oxsort", $oRs ) && !array_key_exists( "OXSORT", $oRs ) )
        {
            $oDb->execute( "ALTER TABLE oxcontents ADD OXSORT INT( 11 ) NOT NULL DEFAULT '9999' COMMENT 'vt-cmsstructure - sorting order'" );
            $update = true;
        }

        // update views
        if( $update )
        {
            $oMetaData = oxNew('oxDbMetaDataHandler');
            $oMetaData->updateViews();
        }

    }

}