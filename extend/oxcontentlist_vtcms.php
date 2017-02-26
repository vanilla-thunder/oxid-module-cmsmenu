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

class oxcontentlist_vtcms extends oxcontentlist_vtcms_parent {

	protected $_sCustomSorting;
	protected $_sObjectsInListName = 'oxcontent';

	public function loadSubpages($loadid = null) {
		if ($loadid !== null) {
			$sViewName = $this->getBaseObject()->getViewName();
			$sSelect = "select * from $sViewName WHERE oxparentloadid = " . oxDb::getDb()->quote($loadid) . " and oxactive = 1 ORDER BY oxsort";

			$this->selectString($sSelect);
		}
		return false;
	}

}