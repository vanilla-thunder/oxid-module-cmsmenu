<?php

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