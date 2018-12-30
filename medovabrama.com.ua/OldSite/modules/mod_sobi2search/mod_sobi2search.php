<?php
/**
* @version $Id: mod_sobi2search.php 4833. svn: 11732-4305. 2009-01-12 09:36:50Z Radek Suski $
* @package: Sigsiu Online Business Index 2
* ===================================================
* @author
* Name: Sigrid & Radek Suski, Sigsiu.NET
* Email: sobi@sigsiu.net
* Url: http://www.sigsiu.net
* ===================================================
* @copyright Copyright (C) 2008 Sigsiu.NET (http://www.sigsiu.net). All rights reserved.
* @license This plugin is released under Proprietary Commercial License.
* You may use this extension on one SOBI2 installation only.
* To use it on more sites, you need to buy extra licenses for each.
* You may not resell, distribute or publish this extension or parts (code snippets) of it.
*/
( defined( '_VALID_MOS' ) || defined( '_JEXEC' ) ) || ( trigger_error( 'Restricted access', E_USER_ERROR ) && exit() );

$factor  = 7;
$factor2 = 6;
//ini_set("display_errors","on");
//error_reporting(E_ALL);
echo "\n<!-- Start Search Form Module --> \n\n";

defined( 'DS' )	|| define( 'DS',DIRECTORY_SEPARATOR );
$add = 	defined( 'JPATH_SITE' ) ?  DS.'mod_sobi2search' : null;
defined( '_SOBI_CMSROOT' ) || define( '_SOBI_CMSROOT', str_replace( DS.'modules'.$add, null, dirname( __FILE__ ) ) );
class_exists( 'sobi2Config' ) || require_once( _SOBI_CMSROOT.DS.'components'.DS.'com_sobi2'.DS.'config.class.php' );

if(!function_exists("sobi2trim")) { function sobi2trim( &$v ) { $v = trim( $v ); } }
if(!function_exists("ssfm2head")) {
	function ssfm2head( &$c )
	{
		static $loaded  = false;
		$sobiTask = sobi2Config::request( $_REQUEST, 'sobi2Task', null );
		if( $sobiTask == "search" ) {
			return null;
		}
		if( !$loaded ) {
			$c->addCustomHeadTag( $c->header, true );
			$c->header = null;
			$loaded = true;
		}
	}
}
$config 			=& sobi2Config::getInstance();
$sobiTask 			= sobi2Config::request($_REQUEST,'sobi2Task',null);
$opt 				= sobi2Config::request($_REQUEST,'option',null);
$class				= $params->get('moduleclass_sfx');
$ignoreTask 		= $params->get('ignoreTask');
$ignoreTask			= explode(",",$ignoreTask);
$ignorePlugins 		= $params->get('ignorePlugins');
$ignorePlugins 		= explode(",",$ignorePlugins);
$ignoreFields 		= $params->get('ignoreFields');
$selectWidth 		= (int) $params->get( 'selectWidth',175 );
$boxWidth 			= (int) $params->get( 'boxWidth', 175 );
$phrase 			= $params->get('defPhrase', 'any');
$preselectCats 		= $params->get('preselectCats', 1 );
$labelOver 			= $params->get('labelOver', 0 );
$addLabel			= $params->get('labelAdd', 0 );
$cid 				= $preselectCats ? (int) sobi2Config::request($_REQUEST,'catid',null) : 0;
$letter 			= sobi2Config::request( $_REQUEST, "letter", null );
$tag 				= sobi2Config::request( $_REQUEST, "tag", null);
$sobiTask 			= $sobiTask ? $sobiTask : ( $letter ? "alphaListing" : ( $tag ? "tagListing" : "category_{$cid}" ) ) ;
$table 				= $params->get('moduletable');
$divid 				= rand( 0, 100000 );

array_walk( $ignoreTask, "sobi2trim" );
//$ignoreTask[] = "search";
if( $sobiTask == "search" ) {
	$cid = sobi2Config::request( $_GET, "sobiCid", null );
}
if( in_array( $sobiTask , $ignoreTask ) ) {
	return false;
}
$mainframe 			=& $config->getMainframe();
$database 			=& $config->getDb();
$sobi2Frontend 		=& $config->getFrontend();
$plugins 			= $config->sobiCache->get("plugins");
sobi2Config::import("sobi2.html");
sobi2Config::import("field.class");
sobi2Config::import("includes|html");

if( $selectWidth ) {
	$config->addCustomHeadTag( "\n<style type=\"text/css\">\n div#ssfm{$divid} table.sobi2eSearchForm{$class} select{ width:{$selectWidth}px; }\n</style>\n", true  );
}

if( $boxWidth ) {
	$config->addCustomHeadTag( "\n<style type=\"text/css\">\n div#ssfm{$divid} table.sobi2eSearchForm{$class} input.inputbox{ width:{$boxWidth}px!important; } \n</style>\n", true );
}

if (!file_exists( _SOBI_FE_PATH.DS.'languages'.DS.$config->sobi2Language.'.php' )) {
	$config->sobi2Language = 'english';
}

require_once( _SOBI_FE_PATH.DS.'languages'.DS.$config->sobi2Language.'.php' );

if (file_exists( _SOBI_FE_PATH.DS.'languages'.DS.'default.php' )) {
	include_once( _SOBI_FE_PATH.DS.'languages'.DS.'default.php' );
}

if(!$plugins || is_integer($plugins)) {
	$query = "SELECT `init_file`, `name_id` FROM `#__sobi2_plugins` WHERE `enabled` = 1 ORDER BY `position` ASC";
	$database->setQuery( $query );
	$plugins = $database->loadObjectList();
	$config->sobiCache->add("plugins", $plugins);
}

if(count($plugins) && !is_integer($plugins)) {
	foreach($plugins as $plugin) {
		if ( file_exists( _SOBI_FE_PATH.DS."plugins".DS.$plugin->name_id.DS.$plugin->init_file ) ) {
			include_once( _SOBI_FE_PATH.DS."plugins".DS.$plugin->name_id.DS.$plugin->init_file );
		}
	}
}

$autoSearch 		= false;
$cookieValues 		= array();
$selectedCats 		= array(1);
$page 				= 0;
$fieldData 			= array();
$fieldsNames 		= array();
$dropListsArray 	= array();
$fields 			= array();
if( $params->get( "cats", true ) && $preselectCats && $cid ) {
	$selectedCats = array();
	$config->getParentCats($cid, $selectedCats);
	$selectedCats = array_reverse($selectedCats);
	array_unshift($selectedCats, 1);
}

if( $ignoreFields ) {
	$ignoreFields = " AND fieldid NOT IN({$ignoreFields}) ";
}
else {
	$ignoreFields = null;
}

$query = "SELECT `fieldid` FROM `#__sobi2_fields` " .
		 "WHERE `in_search`= 2 AND `enabled` = 1 {$ignoreFields}" .
		 "ORDER BY position";
$database->setQuery($query);
$fieldids = $database->loadObjectList();

$tdW = 0;
if($fieldids) {
	foreach($fieldids as $fieldid) {
		$f = new sobiField($fieldid->fieldid);
		$fields[] = $f;
		$tdW = $tdW > strlen( $f->label ) ? $tdW :  strlen( $f->label );
	}
}

$tdW = $tdW * $factor;

if( count($fields) ) {
	foreach($fields as $field) {
		$selected = sobi2Config::request($_REQUEST, $field->fieldname, null );
		$fieldsNames[] = $field->fieldname;
		$autoSearch = $selected ? true : $autoSearch;
		if(($field->fieldType == 5 || $field->fieldType == 6) && !(empty($field->definedValues))) {
			$options = array();
	   		if(!$field->selectLabel) {
				if ($addLabel)
	   				$options[] = sobiHTML::makeOption('all', "- "._SOBI2_SELECT." ".$field->label." -");
				else
					$options[] = sobiHTML::makeOption('all', '- оберiть -');
	   		}
	   		foreach ($field->definedValues as $option => $value) {
	   			$options[] = sobiHTML::makeOption($option, $value);
	   		}
	   		if (($field->selectLabel) && ($addLabel))
	   			$options[0] = sobiHTML::makeOption('all', "- "._SOBI2_SELECT." ".$field->label." -");

			$selectList = sobiHTML::selectList( $options, $config->getSobiStr($field->fieldname), 'size="1" class="inputbox" id="'. $field->fieldname.'"', 'value', 'text', sobi2Config::request($_REQUEST, $field->fieldname, $selected ) );
			$dropListsArray = $dropListsArray + array($field->label => $selectList);
		}
		else {
			$query = "SELECT DISTINCT data_txt as fielddata, sobifields.fieldType FROM `#__sobi2_fields` AS sobifields " .
					 "LEFT JOIN `#__sobi2_fields_data` AS fielddata ON sobifields.fieldid = fielddata.fieldid " .
					 "LEFT JOIN `#__sobi2_language` AS labels ON sobifields.fieldid = labels.fieldid " .
					 "WHERE sobifields.fieldid = {$field->fieldid} ORDER BY fielddata";
			$database->setQuery( $query );
	    	$results = $database->loadObjectList();
			if(sizeof($results) != 0) {
				$fieldData = array();

				if ($addLabel)
	   				$fieldData[] = sobiHTML::makeOption('all', "- "._SOBI2_SELECT." ".$field->label." -"); 
				else
					$fieldData[] = sobiHTML::makeOption('all', '- оберiть -' );

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
						$fieldData[] = sobiHTML::makeOption( $data, $label);
					}
				}
				$selectList = sobiHTML::selectList( $fieldData, $config->getSobiStr($field->fieldname), 'size="1" class="inputbox" id="'. $config->getSobiStr($field->fieldname).'"', 'value', 'text', $selected );
				$dropListsArray = $dropListsArray + array($field->label => $selectList);
			}
		}
	}
}

if(!empty($config->S2_plugins)) {
	foreach($config->S2_plugins as $id => $plugin) {
		if( !in_array( $id, $ignorePlugins ) && method_exists( $plugin, "onAjaxSearchStart" ) ) {
			$searchString = null;
			$plugin->onAjaxSearchStart( $searchString, $phrase, $dropListsArray, $cookieValues, $fieldsNames, $autoSearch );
		}
	}
}

////$class = $params->get('class_sfx');
$cookieDomain = str_replace( "http://", null, $config->liveSite );
ssfm2head( $config );
?>

<script type="text/javascript">
/* <![CDATA[ */
var SobiSearchFormComboBxCounter = 0;
var SobiSearchFormCatsChilds = new Array();
var SobiSearchFormCatsNames = new Array();
function makeSearch(form) {
	jQuery.ajax({
		type: "GET",
		url: jQuery(form).attr('action'),
		dataType: 'html',
		data: jQuery(form).serialize(),
		beforeSend: function(){
			jQuery('.content-box').html('<strong>Зачекайте, будь ласка...</strong>');
		},
		success: function(resp){
			var info = resp; 
			jQuery('.content-box').html(info);
			jQuery('#res-btn').removeAttr('disabled');
		},
		error: function(){
			jQuery('.content-box').html('<strong>Ой, сталася помилка. Спробуйте, будь ласка, трохи пізніше.</strong>');
		}
	});
}

function makeReset()
{
	if (confirm("Ви впевнені, що хочете скинути результати пошуку?")) {
		jQuery("#SobiSearchForm2dropsy").children().each(function(item){
			if( jQuery(this).attr('id') != 'sdrops_0' ) {
				jQuery(this).children().remove();
			}
		});
		SobiSearchFormComboBxCounter = 0;
		jQuery('#res-btn').attr('disabled', 'disabled');
		jQuery("#SobiCatSelected_0").children().each(function(i){
			jQuery(this).removeAttr('selected');
		});
		$("#sobiCid<?php echo $divid; ?>").val(0);
		jQuery('.content-box').html('<strong>Виберіть параметри пошуку у формі вище і натисніть "Пошук"</strong>');
	}
}
			function sobiSearchRes(page) {
	 			$('#SobiSearchPage').val(page);
				$('.jvsobi-buttons .button').click();
			}
			function resetSobi2Cookies()
			{
				var SobiCookieRemove = " = 0; expires=0; path=/; domain=<?php echo $cookieDomain;?>";
				var sobiCookieStr = document.cookie.split(";");
				for(i = 0; i < sobiCookieStr.length; i++) {
					if( sobiCookieStr[i].indexOf("sobi2SearchCookie") != -1 ) {
						cookieVal = sobiCookieStr[i].split("=");
						document.cookie = cookieVal[0] + SobiCookieRemove;
					}
				}
			}
<?php if( $params->get( "cats", true )) { ?>
			
			function $_( id )
			{
				return document.getElementById(id);
			}
			function addSobiSearchFormCatBox(cid, c)
			{
				if(cid == 0) {
					if(c == 0) {
						$_("sobiCid<?php echo $divid; ?>").value = cid;
					}
					else {
						box = c - 1;
						$_("sobiCid<?php echo $divid; ?>").value = $_("SobiCatSelected_" + box).options[$_("SobiCatSelected_" + box).selectedIndex].value;
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
					$_("sobiCid<?php echo $divid; ?>").value = cid;
					url = "<?php echo $config->liveSite;?>/index2.php?option=com_sobi2&no_html=1&sobi2Task=SigsiuTreeMenu&catid=" + cid;
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
					html = html + "<div id='sdrops_"+SobiSearchFormComboBxCounter+"'><select class='inputbox catChooseBox' id='SobiCatSelected_" + SobiSearchFormComboBxCounter + "' onclick='addSobiSearchFormCatBox(this.options[this.selectedIndex].value," + SobiSearchFormComboBxCounter + ");'><option value='0'>&nbsp;- оберiть -</option>"
					for(i = 0; i < categories.length; i++) {
						var category = categories[i];
						var catid = category.getElementsByTagName('catid').item(0).firstChild.data;
						var name = category.getElementsByTagName('name').item(0).firstChild.data;
						var childs = category.getElementsByTagName('childs').item(0).firstChild.data;
						var pid = category.getElementsByTagName('parentid').item(0).firstChild.data;
						name = name.replace("\\", "");
						SobiSearchFormCatsNames[catid] = name;
						html = html + "<option value='"+catid+"'>"+name+"</option>"
						SobiSearchFormCatsChilds[catid] = childs;
					}
					html = html + "</select>\n\n</div>";
					span = document.createElement("span");
					span.innerHTML = html;
					document.getElementById("SobiSearchForm2dropsy").appendChild(span);
				}
			}
<?php } ?>
/* ]]> */
</script>
<?php
	$wT = strlen( _SOBI2_SEARCH_FOR ) * $factor2 ;
	if( $boxWidth ) {
		$bT = $boxWidth + 2;
	}
	$searchFor = sobi2Config::request( $_GET, "sobi2Search", null );
	$searchFor = $searchFor ? $searchFor : _SOBI2_SEARCH_INPUTBOX;
	if( $sobiTask == "search" ) {
		$phrase = sobi2Config::request( $_GET, "searchphrase", null );
//		$cid = sobi2Config::request( $_GET, "sobiCid", null );
	}

if ($table)
	echo "<table cellpadding=\"0\" cellspacing=\"0\" class=\"moduletable{$class}\">\n<tr>\n<td>";

?>
<div class="sobi2SearchMod<?php echo $class; ?>" id="ssfm<?php echo $divid;?>" >
	<form action="<?php echo $config->liveSite; ?>/index2.php" onreset="makeReset();" onsubmit="resetSobi2Cookies();makeSearch(this);return false;" method="get" name="ModsobiSearchFormContainer">
			<div class="jvsobi-keyword">
				<div class="jvsobi-keyword-label">Ключове слово:</div>
				<div class="jvsobi-keyword-input">	
					<?php if( $params->get( "search_box", true ) ) { ?>
						<input name="sobi2Search" id="sobi2Search<?php echo $divid; ?>" class="inputbox" value="<?php echo $searchFor; ?>" onclick="if (this.value == '<?php echo _SOBI2_SEARCH_INPUTBOX; ?>') this.value = '';" onblur="if (this.value == '') this.value = '<?php echo _SOBI2_SEARCH_INPUTBOX; ?>';"/>
					<?php } ?>
				</div>
			</div>
			<?php if( $params->get( "search_button_top", true ) ) { ?>
			<div class="jvsobi-keyword">
				<input type="submit" id="sobiSearchSubmitBt<?php echo $divid; ?>" name="search" class="button" value="<?php echo _SOBI2_SEARCH_H; ?>"/>
			</div>
			<?php } ?>
			<?php if( $params->get( "search_box", true ) ) { ?>
			<div class="jvsobi-keyword">
				<?php if( $params->get( "phrase_any", true ) ) { ?>
					<input type="radio" <?php if($phrase == 'any' || $phrase != 'all' || $phrase != 'exact' ) echo "checked=\"checked\"" ?> name="searchphrase" id="searchphraseany" value="any"   />
					<label for="searchphraseany"><?php echo _SOBI2_SEARCH_ANY ?></label>
				<?php } ?>
				<?php if( $params->get( "phrase_all", true )) { ?>
					<input type="radio" <?php if($phrase == 'all') echo "checked=\"checked\"" ?> name="searchphrase" id="searchphraseall" value="all"  />
					<label for="searchphraseall"><?php echo _SOBI2_SEARCH_ALL ?></label>
				<?php } ?>
				<?php if( $params->get( "phrase_exact", true )) { ?>
					<input type="radio" <?php if($phrase == 'exact') echo "checked=\"checked\"" ?> name="searchphrase" id="searchphraseexact" value="exact"  />
					<label for="searchphraseexact"><?php echo _SOBI2_SEARCH_EXACT ?></label>
				<?php } ?>
			</div>
			<?php } ?>

			<?php
				if(!$config->ajaxSearchCatsForFields) {
					if(count($dropListsArray)) {
						$i = 0;
						foreach($dropListsArray as $label => $dropList) {
							$i++;
							echo "<div class=\"jvsobi-select jvsobi-".$i."\">";
								echo "<div class=\"jvsobi-select-label\">";
								echo $addLabel ? null : $label;
								echo "</div>";
								echo "<div class=\"jvsobi-select-list\">";
								echo $dropList;
								echo "</div>";
							echo "</div>";
						}
					}
				}
			?>
			<?php if( $params->get( "cats", true )) { ?>
			<div class="jvsobi-select">
				<div class="jvsobi-select-label">Каталог</div>
				<div class="jvsobi-select-list">
					<?php echo HTML_SOBI::axSearchCatChooser( $selectedCats, $cid ); ?>
				</div>
			</div>
			<?php } ?>
			<?php
				if($config->ajaxSearchCatsForFields) {
					if(count($dropListsArray)) {
						foreach($dropListsArray as $label => $dropList) {
							echo "<div class=\"jvsobi-select\">";
								echo "<div class=\"jvsobi-select-label\">";
								echo $addLabel ? null : $label;
								echo "</div>";
								echo "<div class=\"jvsobi-select-list\">";
								echo $dropList;
								echo "</div>";
							echo "</div>";
						}
					}
				}
			?>
			<?php if( $params->get( "search_button_bottom", false ) ) { ?>
			<div class="jvsobi-buttons">
				<input type="submit" id="sobiSearchSubmitBtBt<?php echo $divid; ?>" name="search" class="button" value="<?php echo _SOBI2_SEARCH_H; ?>"/>
				<input type="reset" name="reset" id="res-btn" value="Скинути результати пошуку" disabled="disabled" />
			</div>
			<?php } ?>


			<?php
				if( !$params->get( "phrase_any", true ) && $phrase == "any") {
					echo '<input type="hidden" name="searchphrase" value="any"/>';
				}
				elseif( !$params->get( "phrase_all", true ) && $phrase == "all") {
					echo '<input type="hidden" name="searchphrase" value="all"/>';
				}
				elseif( !$params->get( "phrase_exact", true ) && $phrase == "exact") {
					echo '<input type="hidden" name="searchphrase" value="exact"/>';
				}
			?>
			<input type="hidden" name="option" value="com_sobi2"/>
			<!--<input type="hidden" name="sobiCid" id="sobiCid<?php echo $divid; ?>" value="<?php echo $cid;?>"/>-->
			<input type="hidden" id="SobiSearchPage" name="SobiSearchPage" value="<?php echo $page;?>"/>
			<input type="hidden" name="sobiCid" id="sobiCid<?php echo $divid; ?>" value="0"/>
			<input type="hidden" name="sobi2Task" value="axSearch"/>
			<input type="hidden" name="reset" value="2"/>
			<input type="hidden" name="Itemid" value="<?php echo $config->sobi2Itemid;?>"/>
			<input type="hidden" name="no_html" value="1"/>
	</form>
</div>

<?php
if ($table)
	echo "</td>\n</tr>\n</table>";

?>

<!-- End of Search Form Module -->
