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
class vtcms_cfg extends oxConfig
{

    public static function setupCmsStructure() {
        $sCheck = "SELECT 1 FROM oxcontents WHERE OXSORT = 9999 LIMIT 1";
        $sQuery = "ALTER TABLE oxcontents ADD OXPARENTLOADID CHAR( 32 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '', ADD OXSORT INT( 11 ) NOT NULL DEFAULT '9999'";

        $oDb = oxDb::getDb();
        $oRs = $oDb->select($sCheck);

        if ( $oRs == false || $oRs->recordCount() == 0 ) {
            $oDb->execute($sQuery);
            $oMetaData = oxNew('oxDbMetaDataHandler');
            $oMetaData->updateViews();
        }

    }

}