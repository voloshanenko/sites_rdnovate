<?php

defined('_JEXEC') or die('Restricted access');


class modSobi2SortHelper{
	function getSobi2Sort($fieldid = array() ) {
		$db		=& JFactory::getDBO();
		
		$select	= array();
		$count = count($fieldid);
		for ($i = 0; $i < $count; $i++) {
		$query = 'SELECT fieldid, langKey, langValue FROM #__sobi2_language WHERE fieldid = '.$fieldid[$i].' AND sobi2Section = "field_opt"';
		
		$db->setQuery($query);
		$select[$i] = $db->loadObjectList();
		}
		return $select;
	}
	function getSobi2SortName($fieldid = array() ) {
		$db		=& JFactory::getDBO();
		$select	= array();
		$count = count($fieldid);
		for ($i = 0; $i < $count; $i++) {
		$query = 'SELECT fieldid, langKey, langValue FROM #__sobi2_language WHERE fieldid = '.$fieldid[$i].' AND sobi2Section = "fields"';
		
		$db->setQuery($query);
		$selectName[$i] = $db->loadObjectList();
		}
		return $selectName;
	}
	
	
	function searchSobi( $catid = 0, $cid )
	{
    	$config =& sobi2Config::getInstance();
    	$mainframe =& $config->getMainframe();
    	
    	/* ursprungscode in axsearch.class.ori1.php */

    	$database =& $config->getDb();
		$sobi2Frontend =& $config->getFrontend();
    	$autoSearch = false;
		//$cid = sobi2Config::request($_REQUEST, "sobiCid", -9);
		$reset = sobi2Config::request($_REQUEST, "reset", 0 );
		$cookieValues = array();
    	if( !$reset ) {
			$cookieValues = sobi2Config::request($_COOKIE, "sobi2SearchCookie", null);
	    	if($cookieValues) {
	    		foreach ($cookieValues as $k => $v) {
	    			$cookieValues[$k] = $v;
	    		}
	    	}
    	}
    	$selectedCats = array();
		if($cid < 0 && is_array($cookieValues) && key_exists("cid", $cookieValues) && !empty($cookieValues["cid"])) {
			$cid = (int) $cookieValues["cid"];
		}
		if( $cid > 0 ) {
			$config->getParentCats($cid, $selectedCats);
			$selectedCats = array_reverse($selectedCats);
		}
		$cid = ($cid > 0) ? $cid : 0;
		$autoSearch = $cid ? true : $autoSearch;

		array_unshift($selectedCats, 1);

		$page = (int) sobi2Config::request($_REQUEST, "SobiSearchPage", -9);

		if($page < 0 && is_array($cookieValues) && key_exists("SobiSearchPage", $cookieValues) && !empty($cookieValues["SobiSearchPage"])) {
			$page = (int) $cookieValues["SobiSearchPage"];
		}
		else {
			$page = 0;
		}

    	$searchString = sobi2Config::request($_REQUEST, "sobi2Search", null);
		$searchString = str_replace("%20", " ", $searchString);
		$phrase = sobi2Config::request($_REQUEST, 'searchphrase', null);

		if(!$searchString && is_array($cookieValues) && key_exists("sobi2Search", $cookieValues) && !empty($cookieValues["sobi2Search"]) && trim($cookieValues["sobi2Search"]) != trim(_SOBI2_SEARCH_INPUTBOX)) {
			$searchString = stripslashes( $cookieValues["sobi2Search"] );
			$searchString = $config->getSobiStr( $searchString );
		}

		if(!$phrase && is_array($cookieValues) && key_exists("searchphrase", $cookieValues) && !empty($cookieValues["searchphrase"])) {
			$phrase = $cookieValues["searchphrase"];
		}
		if (!$phrase)
			$phrase = $config->key("search", "phrase_value");
		
		$autoSearch = $searchString ? true : $autoSearch;

    	$fieldData = array();
    	$fieldsNames = array();
    	/*
    	 * at firts make the html mask
    	 */
		//echo $sobi2Frontend->getHeader();
		/*////////////////////////////////////////////////////////////////////////////////////////////
		 * build drop' down lists
		 *////////////////////////////////////////////////////////////////////////////////////////////
		$dropListsArray = array();
		/*
		 * get all fields
		 */
		$fields = array();
		$query = "SELECT `fieldid` FROM `#__sobi2_fields` " .
				 "WHERE `in_search`= 2 AND `enabled` = 1 " .
				 "ORDER BY position";
		$database->setQuery($query);
		$fieldids = $database->loadObjectList();
		if ($database->getErrorNum()) {
			trigger_error("DB reports: ".$database->stderr(), E_USER_WARNING);
		}
		if($fieldids) {
			sobi2Config::import("field.class");
			foreach($fieldids as $fieldid) {
				$fields[] = new sobiField($fieldid->fieldid);
			}
		}
		if( count( $fields ) ) {
			foreach($fields as $field) {
				$selected = sobi2Config::request($_REQUEST, $field->fieldname, null );
				$fieldsNames[] = $field->fieldname;
				if(!$selected && is_array($cookieValues) && key_exists($field->fieldname, $cookieValues) && !empty($cookieValues[$field->fieldname]) && $cookieValues[$field->fieldname] != 'all') {
					$selected = stripslashes( $cookieValues[$field->fieldname] );
				}
				$autoSearch = $selected ? true : $autoSearch;
				if(($field->fieldType == 5 || $field->fieldType == 6) && !(empty($field->definedValues))) {
					$field->definedValues = $field->getListValues( null, true, true );
					$options = array();
			   		if(!$field->selectLabel) {
			   			$options[] = sobiHTML::makeOption('all', _SOBI2_SEARCH_BOX_SELECT);
			   		}
			   		foreach ($field->definedValues as $option => $value) {
			   			$options[] = sobiHTML::makeOption(sobiAxSearch::cleanAttributes($option), sobiAxSearch::cleanAttributes($value));
			   		}
					$selectList = sobiHTML::selectList( $options, $config->getSobiStr($field->fieldname), 'size="1" class="inputbox" id="'. $field->fieldname.'"', 'value', 'text', sobi2Config::request($_REQUEST, $field->fieldname, $selected ) );
					$dropListsArray = $dropListsArray + array($field->label => $selectList);
				}
				else {
					/*
					 * get data for this fields
					 */
					if( $config->ajaxSearchCatsFieldsDepend ) {
						/**
						 * @author Richard Jones
						 * Selected category to displayed fields depency
						 */
						if ( $cid ) {
							$cids = array();
							$config->getChildCats($cid, $cids);
							$cids = implode(" , ", $cids);
						}
						$results = 0;
						if ($cid != 0) {
							$query = "SELECT DISTINCT data_txt as fielddata, sobifields.fieldType FROM `#__sobi2_cat_items_relations` AS catitems, `#__sobi2_fields` AS sobifields " .
							"LEFT JOIN `#__sobi2_fields_data` AS fielddata ON sobifields.fieldid = fielddata.fieldid " .
							"LEFT JOIN `#__sobi2_language` AS labels ON sobifields.fieldid = labels.fieldid " .
							"WHERE (sobifields.fieldid = {$field->fieldid} AND catitems.catid  IN ({$cids}) AND fielddata.itemid = catitems.itemid) ORDER BY fielddata";
						}
						else {
							$query = "SELECT DISTINCT data_txt as fielddata, sobifields.fieldType FROM `#__sobi2_fields` AS sobifields " .
							"LEFT JOIN `#__sobi2_fields_data` AS fielddata ON sobifields.fieldid = fielddata.fieldid " .
							"LEFT JOIN `#__sobi2_language` AS labels ON sobifields.fieldid = labels.fieldid " .
							"WHERE sobifields.fieldid = {$field->fieldid} ORDER BY fielddata";
						}
						$database->setQuery( $query );
						$results = $database->loadObjectList();
						if ($database->getErrorNum()) {
							trigger_error("DB reports: ".$database->stderr(), E_USER_WARNING);
						}
					}
					else {
						$query = "SELECT DISTINCT data_txt as fielddata, sobifields.fieldType FROM `#__sobi2_fields` AS sobifields " .
								 "LEFT JOIN `#__sobi2_fields_data` AS fielddata ON sobifields.fieldid = fielddata.fieldid " .
								 "LEFT JOIN `#__sobi2_language` AS labels ON sobifields.fieldid = labels.fieldid " .
								 "WHERE sobifields.fieldid = {$field->fieldid} ORDER BY fielddata";
						$database->setQuery( $query );
				    	$results = $database->loadObjectList();
						if ($database->getErrorNum()) {
							trigger_error("DB reports: ".$database->stderr(), E_USER_WARNING);
						}
					}
					/*
					 * get all options for this field
					 */
					if( count( $results ) ) {
						$fieldData = array();
						$fieldData[] = sobiHTML::makeOption( 'all', _SOBI2_SEARCH_BOX_SELECT );
						foreach($results as $result) {
							if($result->fielddata) {
								if($result->fieldType == 3) {
									$label = $result->fielddata ? _SOBI2_CHECKBOX_YES : _SOBI2_CHECKBOX_NO;
									$data = $result->fielddata ? 1 : 0;
									$fieldData[] = sobiHTML::makeOption( '-1', _SOBI2_CHECKBOX_NO);
								}
								else {
									$data = $label = $config->getSobiStr($result->fielddata);
								}
								$fieldData[] = sobiHTML::makeOption(sobiAxSearch::cleanAttributes($data), sobiAxSearch::cleanAttributes($label));
							}
						}
						$selectList = array($field->label => sobiHTML::selectList( $fieldData, $config->getSobiStr($field->fieldname), 'size="1" class="inputbox" id="'. $config->getSobiStr($field->fieldname).'"', 'value', 'text', $selected ));
						$dropListsArray = $dropListsArray + $selectList;
					}
				}
			}
		}
		/*calling plugins*
   		if(!empty($config->S2_plugins)) {
   			foreach($config->S2_plugins as $plugin) {
   				if(method_exists($plugin, "onAjaxSearchStart")) {
   					$plugin->onAjaxSearchStart($searchString, $phrase, $dropListsArray, $cookieValues, $fieldsNames, $autoSearch);
   				}
   			}
   		}*/
   		//$autoSearch = ( count( $_GET ) > 5 ) ? true : $autoSearch;
   		//$mainframe->addCustomHeadTag( modSobi2SortHelper::searchAjaxScript($autoSearch, $fieldsNames));
   		//sobiAxSearch::showSearchForm($dropListsArray, $searchString, $phrase, $cid, $page, $selectedCats);
   		//modSobi2SortHelper::showSearchForm($dropListsArray, $searchString, $phrase, $cid, $page, $selectedCats);
   		//echo $sobi2Frontend->getFooter();
		return $selectedCats;
	}
	
	
	function axSearchCatChooser( $selectedCats, $cid )
    {
		$config =& sobi2Config::getInstance();
		if( count( $selectedCats ) ) {
	    	$dropsy = '<div id="SobiSearchForm2dropsy" style="margin-left: 0px;">';
			$catsChildsJs = null;
			$count = 0;
			$lastBox = 0;
			foreach( $selectedCats as $cid ) {
				$cats = $config->getCategories( $cid );
				if( is_array( $cats ) && !empty( $cats ) ) {
					$dropsy .= "\n\n\n\n<div id='sdrops_{$count}'>";
					$Select = array();
					$Select[] = sobiHTML::makeOption( 0, _SOBI2_SEARCH_CATBOX_SELECT);
					//$js = "addSobiSearchFormCatBox(this.options[this.selectedIndex].value,{$count});";
					foreach ($cats as $cat) {
						$cat->name = str_replace("\\","",$cat->name);
						$cat->name = str_replace("\\\\","",$cat->name);
						$cat->name = $config->getSobiStr( $cat->name );
						$Select[] = sobiHTML::makeOption( $cat->catid, $cat->name);
						$c = $config->catHasChild($cat->catid) ? 1 : 0;
						//$catsChildsJs .= "\n SobiSearchFormCatsChilds[{$cat->catid}] = '{$c}';";
					}
					$selected = key_exists( $count+1, $selectedCats ) ? $selectedCats[$count+1] : $cid;
					$dropsy .= sobiHTML::selectList( $Select, "sobiCid", 'id="sobiCid" size="1" class="inputbox catChooseBox" ', 'value', 'text', $selected);
					$dropsy .= "</div>\n\n\n\n";
					$lastBox = $count;
				}
				$count++;
			}
			$dropsy .= "</div>";
			return $dropsy;
		}
		else {
			return null;
		}
    }
}
?>