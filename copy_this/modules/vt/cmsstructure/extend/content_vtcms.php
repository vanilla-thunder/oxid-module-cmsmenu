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

class content_vtcms extends content_vtcms_parent
{

	public function getBreadCrumb()
	{
		$oContent = $this->getContent();

		$aPaths = array();
		$aPath = array();

		if ($oContent->oxcontents__oxparentloadid->value)
        {
			$oParent = oxNew("oxContent");
			$oParent->loadByIdent($oContent->oxcontents__oxparentloadid->value);

			$aParent['title'] = $oParent->oxcontents__oxtitle->value;
			$aParent['link'] = $oParent->getLink();
			$aPaths[] = $aParent;
		}

		$aPath['title'] = $oContent->oxcontents__oxtitle->value;
		$aPath['link'] = $this->getLink();
		$aPaths[] = $aPath;

		return $aPaths;
	}

    public function getRootContent()
    {
        /** @var oxContent $act */
        $act = $this->getContent();
        // only first level of "upper menu" content pages should have this type, all other arer just subpages
        $sParent = ($act->oxcontents__oxtype->value == 1) ? false : $act->oxcontents__oxparentloadid->value ;

        while($sParent)
        {
            $act = oxNew("oxcontent");
            $act->loadByIdent($sParent);
            $sParent = ($act->oxcontents__oxtype->value == 1) ? false : $act->oxcontents__oxparentloadid->value;
        }

        return $act;
    }

    public function getRootContentId()
    {
        return $this->getRootContent()->getId();
    }

    public function getRootContentLoadId()
    {
        return $this->getRootContent()->getLoadId();
    }

}