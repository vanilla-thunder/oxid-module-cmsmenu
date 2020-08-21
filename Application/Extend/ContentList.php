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

namespace VanillaThunder\Cmsmenu\Application\Extend;

use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Internal\Framework\Database\QueryBuilderFactoryInterface;

class ContentList extends ContentList_parent {

	protected $_sCustomSorting;
	protected $_sObjectsInListName = 'oxcontent';

	public function loadSubpages($loadid = null)
    {
		if ($loadid !== null)
		{
            $oDb = \OxidEsales\Eshop\Core\DatabaseProvider::getDb();
			$sViewName = $this->getBaseObject()->getViewName();
			$sSelect = "select * from $sViewName WHERE oxparentloadid = " . $oDb->quote($loadid) . " and oxactive = 1 ORDER BY oxsort";

			$this->selectString($sSelect);
		}
		return false;
	}

}