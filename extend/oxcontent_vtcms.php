<?php

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
