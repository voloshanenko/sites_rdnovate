<?php

// no direct access
defined('_JEXEC') or die('Restricted access');
//define( '_SOBI2_', 1 );
defined('_SOBI_FE_PATH') ||  define('_SOBI_FE_PATH', JPATH_SITE.DS.'components'.DS.'com_sobi2' );
require_once (JPATH_SITE.DS.'components'.DS.'com_sobi2'.DS.'config.class.php');
require_once (JPATH_SITE.DS.'components'.DS.'com_sobi2'.DS.'languages'.DS.'default.php');
require_once (JPATH_SITE.DS.'components'.DS.'com_sobi2'.DS.'includes'.DS.'html.php');
require_once (JPATH_SITE.DS.'components'.DS.'com_sobi2'.DS.'axsearch.class.php');

class modjv_sobi2searchHelper
{
	var $_addvant;
	
	var $_search_box;
	
	var $_header_text;
	
	var $_footer_text;

	var $_text_button;
	
	function __construct($params) {		

		$this->_addvant 	= $params->get('addvant', $this->_addvant);		
		$this->_search_box 	= $params->get('search_box', $this->_search_box);
		$this->_header_text 	= $params->get('header_text', $this->_header_text);
		$this->_footer_text 	= $params->get('footer_text', $this->_footer_text);
		$this->_text_button		= $params->get('text_button', $this->_text_button);
		
	}
	function searchSobi($id_mod)
	{
    	$config =& sobi2Config::getInstance();
    	$mainframe =& $config->getMainframe(); 		
    	$database =& $config->getDb();
		$sobi2Frontend =& $config->getFrontend();
		$query = 'SELECT id FROM #__menu WHERE type="component" AND link like "%index.php?option=com_sobi2%" and published =1';
		$database->setQuery($query);
		$load = $database->loadObject();
		$Itemid = $load->id;
    	$autoSearch = false;
		$cid = sobi2Config::request($_REQUEST, "sobiCid", -9);
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
    	//$Itemid = ( int ) sobi2Config::request( $_REQUEST, "Itemid", 0 );
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

		$autoSearch = $searchString ? true : $autoSearch;
    	$fieldData = array();
    	$fieldsNames = array();
		$dropListsArray = array();
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
				$autoSearch = false;
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
					if( $config->ajaxSearchCatsFieldsDepend ) {
						/**
						 * @author ducthach
						 * Selected category to displayed fields depency
						 */
						if ( $cid ) {
							$cids = array();
							$config->getChildCats($cid, $cids);
							$cids = implode(" , ", $cids);
							var_dump($cids);
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
		
   		$mainframe->addCustomHeadTag( modjv_sobi2searchHelper::searchAjaxScript($autoSearch, $fieldsNames, $id_mod));
   		
   		modjv_sobi2searchHelper::showSearchForm($dropListsArray, $searchString, $phrase, $cid, $page, $selectedCats, $Itemid, $id_mod);
	}
	
	function showSearchForm($dropListsArray, $searchString, $phrase, $cid, $page, $selectedCats, $Itemid, $id_mod)
    {
    	$config =& sobi2Config::getInstance();
    	
		$iso = defined("_ISO") ? explode( '=', _ISO ) : array( null, "UTF-8");
		//$index = $config->key( "search", "search", "index2.php" );
		$index = 'index.php';
		if(!$searchString) {
			$String = '';
		}
		else {
			$String = $searchString;
		}
		
	?>
	<form id="sobiSearchFormContainer" onsubmit="resetSobi2Cookies();" accept-charset="<?php echo $iso[1];?>" action="<?php echo $config->liveSite; ?>/<?php echo $index;?>" method="get" name="sobiSearchFormContainer">
		<div class="jvsobi-search">
			<?php if($this->_header_text){?>
			<div class="jvsobe-des"><?php echo $this->_header_text;?></div>
			<?php }?>
			<?php if($this->_search_box>0){?>
				<div class="jvsobi-keyword">
					<div class="jvsobi-keyword-label">Ключове слово:</div>
					<div class="jvsobi-keyword-input">
						<input name="sobi2Search" size="32" id="sobi2Search" class="inputbox" value="<?php echo $String; ?>" onclick="if (this.value == '<?php echo 'Поиск'; ?>') this.value = '';" onblur="if (this.value == '') this.value = '<?php echo 'Поиск'; ?>';"/>
					</div>
				</div>
			<?php }?>	
			<?php
				if(!$config->ajaxSearchCatsForFields) {
					if(count($dropListsArray)) {
						foreach($dropListsArray as $label => $dropList) {
							echo "
								<div class=\"jvsobi-select\">
									<div class=\"jvsobi-select-label\">{$label}</div>
									<div class=\"jvsobi-select-list\">{$dropList}</div>
								</div>
							";
						}
					}
				}
			?>
			<div class="jvsobi-select">
				<div class="jvsobi-select-label">У категорії</div>
				<div class="jvsobi-select-list">
				<?php 
   					if( !$config->key( "search", "do_not_show_search_form" ) ) {
						echo sobiAxSearch::axSearchCatChooser( $selectedCats, $cid );
					}
				?>
				</div>
			</div>						
			<div class="jvsobi-submit">
				<input type="submit" value="Пошук" class="button" name="search" id="sobiSearchSubmitBtBt"/> 
				<?php if($this->_footer_text){?>
				<p><?php echo $this->_footer_text;?></p>
				<?php }?>
			</div>
		</div>	
		
		<input type="hidden" name="option" value="com_sobi2"/>
		<input type="hidden" name="sobi2Task" value="search"/>
		<input type="hidden" name="Itemid" value="<?php echo $Itemid;?>"/>		
		<input type="hidden" value="any" name="searchphrase"/>			
		<input type="hidden" value="2" name="reset"/>
		<input type="hidden" name="sobiCid" id="sobiCid<?php echo $id_mod;?>" value="<?php echo $cid; ?>"/>
		<input type="hidden" id="SobiSearchPage" name="SobiSearchPage" value="<?php echo $page;?>"/>
	</form>
	<?php 
	}
	function searchAjaxScript( $autoSearch, $fieldsNames, $id_mod )
    {
    	$config =& sobi2Config::getInstance();		
    	$config =& sobi2Config::getInstance();
		$pluginReset = null;
		if(count($config->S2_plugins)) {
    		foreach($config->S2_plugins as $plugin) {
    			if(method_exists($plugin, "addToSearchJsResetScript")) {
					$pluginReset .= $plugin->addToSearchJsResetScript();
    			}
    		}
    	}
    	
    	//$index = $config->key( "search", "search", "index.php" );
		$index = 'index.php';
		$url = "{$config->liveSite}/{$index}?option=com_sobi2&no_html=1&sobi2Task=SigsiuTreeMenu&Itemid={$config->sobi2Itemid}&catid=";
    	?>
		 <script type="text/javascript">
		 /* <![CDATA[ */
		
			function resetSobi2Cookies()
			{
				var SobiCookieRemove = " = 0; expires=0; path=/; <?php echo JURI::base();?>";
				var sobiCookieStr = document.cookie.split(";");
				for(i = 0; i < sobiCookieStr.length; i++) {
					if( sobiCookieStr[i].indexOf("sobi2SearchCookie") != -1 ) {
						cookieVal = sobiCookieStr[i].split("=");
						document.cookie = cookieVal[0] + SobiCookieRemove;
					}
				}
			}
			var SobiSearchFormComboBxCounter = 0;
			var SobiSearchFormCatsChilds = new Array();
			var SobiSearchFormCatsNames = new Array();
			function $_( id )
			{
				return document.getElementById(id);
			}
			function addSobiSearchFormCatBox(cid, c)
			{
				if(cid == 0) {
					if(c == 0) {
						$_("sobiCid<?php echo $id_mod;?>").value = cid;
					}
					else {
						box = c - 1;
						$_("sobiCid<?php echo $id_mod;?>").value = $_("SobiCatSelected_" + box).options[$_("SobiCatSelected_" + box).selectedIndex].value;
					}
					if(c < SobiSearchFormComboBxCounter) {
						for(SobiSearchFormComboBxCounter; SobiSearchFormComboBxCounter > c; SobiSearchFormComboBxCounter--) {
							if(SobiSearchFormComboBxCounter > 0) {
								chBox = document.getElementById("sdrops_" + SobiSearchFormComboBxCounter);
								chBox.parentNode.removeChild(chBox);
							}
						}
						SobiSearchFormComboBxCounter = c;
					}
				}
				if(cid != 0) {
					$_("sobiCid<?php echo $id_mod;?>").value = cid;
					url = "<?php echo $url; ?>" + cid;
					SobiSearchFormComboSendRequest(url,c);
				}
			}
			function SobiSearchFormComboSendRequest(url,c)
			{
		    	var SobiSearchFormCatHttpRequest;
		        if (window.XMLHttpRequest) {
		            SobiSearchFormCatHttpRequest = new XMLHttpRequest();
		            if (SobiSearchFormCatHttpRequest.overrideMimeType) {
		                SobiSearchFormCatHttpRequest.overrideMimeType('text/xml');
		            }
		        }
		        else if (window.ActiveXObject) {
		            try { SobiSearchFormCatHttpRequest = new ActiveXObject("Msxml2.XMLHTTP"); }
		                catch (e) {
                           try { SobiSearchFormCatHttpRequest = new ActiveXObject("Microsoft.XMLHTTP"); }
		                   catch (e) {}
		                 }
		        }
		        if (!SobiSearchFormCatHttpRequest) {
		            alert('Sorry but I Cannot create an XMLHTTP instance');
		            return false;
		        }
		        SobiSearchFormCatHttpRequest.onreadystatechange = function() { SobiSearchFormCatGetSubcats(SobiSearchFormCatHttpRequest,c); };
		        SobiSearchFormCatHttpRequest.open('GET', url, true);
		        SobiSearchFormCatHttpRequest.send(null);
			}
			function SobiSearchFormCatGetSubcats(XMLDoc,c)
			{
				if(!XMLDoc.responseXML) {
					return null;
				}
				var r = XMLDoc.responseXML;
				var categories = r.getElementsByTagName("category");
				if(c < SobiSearchFormComboBxCounter) {
					for(SobiSearchFormComboBxCounter; SobiSearchFormComboBxCounter > c; SobiSearchFormComboBxCounter--) {
						if(SobiSearchFormComboBxCounter > 0) {
							chBox = document.getElementById("sdrops_" + SobiSearchFormComboBxCounter);
							chBox.parentNode.removeChild(chBox);
						}
					}
					SobiSearchFormComboBxCounter = c;
				}
				if(categories.length > 0) {
					SobiSearchFormComboBxCounter++;
					html = "";
					html = html + "<div id='sdrops_"+SobiSearchFormComboBxCounter+"'><select class='inputbox catChooseBox' id='SobiCatSelected_" + SobiSearchFormComboBxCounter + "' onclick='addSobiSearchFormCatBox(this.options[this.selectedIndex].value," + SobiSearchFormComboBxCounter + ");'><option value='0'>&nbsp;---- Выберите ----&nbsp;<\/option>"
					for(i = 0; i < categories.length; i++) {
						var category = categories[i];
						var catid = category.getElementsByTagName('catid').item(0).firstChild.data;
						var name = category.getElementsByTagName('name').item(0).firstChild.data;
						var childs = category.getElementsByTagName('childs').item(0).firstChild.data;
						var pid = category.getElementsByTagName('parentid').item(0).firstChild.data;
						name = name.replace("\\", "");
						SobiSearchFormCatsNames[catid] = name;
						html = html + "<option value='"+catid+"'>"+name+"<\/option>"
						SobiSearchFormCatsChilds[catid] = childs;
					}
					html = html + "<\/select>\n\n<\/div>";
					span = document.createElement("span");
					
					span.innerHTML = html;
					document.getElementById("SobiSearchForm2dropsy").appendChild(span);
				}
			}			
		/* ]]> */
		</script>		
    	<?php
		
    }
}
?>