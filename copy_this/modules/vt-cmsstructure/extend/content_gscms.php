<?php

class content_gscms extends content_gscms_parent {

	public function getBreadCrumb() {
		$oContent = $this->getContent();

		$aPaths = array();
		$aPath = array();

		if ($oContent->oxcontents__oxparentloadid->value) {
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

}