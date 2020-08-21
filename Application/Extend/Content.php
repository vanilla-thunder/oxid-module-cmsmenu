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

class Content extends Content_parent
{
    protected $_blHasSubpages = null;
    protected $_aSubpages = array();

    public function getLink($iLang = null)
    {
        //echo $this->oxcontents__external->value;
        if ($this->oxcontents__external->value == 1) {
            return oxRegistry::get("oxUtilsView")->parseThroughSmarty($this->oxcontents__oxcontent->value, "cmsmenu_".$this->getId());
        }
        return parent::getLink($iLang);
    }

    public function hasSubpages()
    {
        if ($this->_blHasSubpages === null) {
            $queryBuilder = ContainerFactory::getInstance()->getContainer()->get(QueryBuilderFactoryInterface::class)->create();

            // SELECT 1 FROM oxcontents WHERE oxparentloadid = $ident AND oxactive = 1
            $queryBuilder
                ->select("1")
                ->from($this->getViewName())
                ->where("oxparentloadid = :oxparentloadid")
                ->andWhere('oxshopid = :oxshopid')
                ->andWhere("oxactive = 1")
                ->setMaxResults(1)
                ->setParameters([
                    'oxparentloadid' => $this->oxcontents__oxloadid->value,
                    'oxshopid' => \OxidEsales\Eshop\Core\Registry::getConfig()->getShopId()
                ]);

            //var_dump($queryBuilder->getSql());

            $blocksData = $queryBuilder->execute();
            $blocksData = $blocksData->fetchAll();

            //var_dump($blocksData);

            return !empty($blocksData);
        }
    }
    
    public function getSubpages()
    {
        if (sizeof($this->_aSubpages) == 0)
        {
            $aList = oxNew(\OxidEsales\Eshop\Application\Model\ContentList::class);
            $aList->loadSubpages($this->oxcontents__oxloadid->value);
            $this->_aSubpages = $aList;
        }
        
        return $this->_aSubpages;
    }
}
