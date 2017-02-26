<?php

/**
 * [vt] cmsstructure for OXID eShop 4.9+
 * Copyright (C) 2017  Marat Bedoev
 * info:  m@marat.ws
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 *
 * author: Marat Bedoev
 */

class oxcontent_vtcms extends oxcontent_vtcms_parent
{

	protected $_blHasSubpages = null;
	protected $_aSubpages = array();

    public function getLink($iLang = null)
    {
        //echo $this->oxcontents__external->value;
        if($this->oxcontents__external->value == 1)
        {
            return oxRegistry::get("oxUtilsView")->parseThroughSmarty($this->oxcontents__oxcontent->value, "cmsmenu_".$this->getId());
        }
        return parent::getLink($iLang);
    }

	public function hasSubpages()
	{
		if($this->_blHasSubpages === null) {
			$oDb = oxDb::getDb();
			$sViewName  = $this->getViewName();
			$ident = $oDb->quote($this->oxcontents__oxloadid->value);
			$sSelect = "SELECT 1 FROM oxcontents WHERE oxparentloadid = $ident AND oxactive = 1";

			return (bool)$oDb->getOne($sSelect);
		}
	}
	
	public function getSubpages()
	{
		if(sizeof($this->_aSubpages) == 0)
		{
			$aList = oxNew("oxContentlist");
			$aList->loadSubpages($this->oxcontents__oxloadid->value);
			$this->_aSubpages = $aList;
		}

		
		return $this->_aSubpages;
	}

}
