<?php
/**
* @version $Id: mod_sobi2latest.php 4847 2009-01-23 17:42:35Z Sigrid Suski $
* @package: Sigsiu Online Business Index 2 Latest Module
* ===================================================
* @author
* Name: Sigrid & Radek Suski, Sigsiu.NET
* Email: sobi@sigsiu.net
* Url: http://www.sigsiu.net
* ===================================================
* @copyright Copyright (C) 2007-2009 Sigsiu.NET (http://www.sigsiu.net). All rights reserved.
* @license see http://www.gnu.org/copyleft/gpl.html GNU/GPL.
* SOBI2 Latest Module is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation.
*/

(defined( '_VALID_MOS' ) || defined( '_JEXEC' ) ) || ( trigger_error( 'Restricted access', E_USER_ERROR ) && exit() );

defined( "DS" )	|| define( "DS",DIRECTORY_SEPARATOR);

$add = 	defined( 'JPATH_SITE' ) ?  DS.'mod_sobi2latest' : null;
defined( '_SOBI_CMSROOT' ) || define( '_SOBI_CMSROOT', str_replace( DS.'modules'.$add, null, dirname( __FILE__ ) ) );
class_exists( 'sobi2Config' ) || require_once( _SOBI_CMSROOT.DS.'components'.DS.'com_sobi2'.DS.'config.class.php' );

//error_reporting(E_ALL);
//ini_set("display_errors","on");

//Get the parameters
$class = $params->get('moduleclass_sfx');
$limit = $params->get('count',5);
$table = $params->get('moduletable', 0); //only J1.0
$entryicon = $params->get('entryicon',0);
$entryimage = $params->get('entryimage',0);
$showTitle = $params->get('title',1);
$maxlength = $params->get('item_length', 50);
$direction = $params->get('direction', 1);
$categorydepend = $params->get('categorydepend', 0);
if(!$limit || $limit < 1)
	$limit = 5;

$config =& sobi2Config::getInstance();
$database =& $config->getDb();
$S_Itemid = $config->sobi2Itemid;
$catId = sobi2Config::request( $_REQUEST,'catid',0 );

$now = $config->getTimeAndDate();

if (($catId > 1) && ($categorydepend == 1)) {
	$query = "SELECT `title`, `itemid`, `icon`, `image` FROM `#__sobi2_item` WHERE (itemid IN (SELECT itemid FROM #__sobi2_cat_items_relations WHERE catid = {$catId})) AND `published` = 1 AND (`publish_down` > '{$now}' OR `publish_down` = '{$config->nullDate}') ORDER BY `publish_up` DESC LIMIT {$limit}";
}
else {	
	$query = "SELECT `title`, `itemid`, `icon`, `image` FROM `#__sobi2_item` WHERE `published` = 1 AND (`publish_down` > '{$now}' OR `publish_down` = '{$config->nullDate}') ORDER BY `publish_up` DESC LIMIT {$limit}";
}

$database->setQuery( $query );
$s_results = $database->loadObjectList();

$iso = explode( '=', _ISO );
$encoding = strtoupper($iso[1]);

echo "\n";
echo "<!-- Start of SOBI2 Latest Entries Module -->\n";
if( !( defined( "_JEXEC" ) ) ) {
	if ($table)
		echo "<table cellpadding=\"0\" cellspacing=\"0\" class=\"moduletable{$class}\"><tr><td>\n";
}
if ($direction == 1)
	echo "<ul class=\"sobi2latest{$class}\">\n";

if(count($s_results)) {
	foreach($s_results as $s_result) {
		$url = "index.php?option=com_sobi2&amp;sobi2Task=sobi2Details&amp;sobi2Id={$s_result->itemid}&amp;Itemid={$S_Itemid}";
		$url = sobi2Config::sef($url);

		$myTitle = $config->getSobiStr($s_result->title);
		$myFullTitle = $myTitle;

		$icon = null;
		if($entryicon) {
			if($s_result->icon && file_exists("{$config->absolutePath}/images/com_sobi2/clients/{$s_result->icon}")) {
				$icon = "<a href=\"{$url}\" title=\"{$myFullTitle}\"><img style=\"border-style:none;\" src=\"{$config->liveSite}/images/com_sobi2/clients/{$s_result->icon}\" title=\"{$myFullTitle}\" alt=\"{$myFullTitle}\"/></a>&nbsp;";
			}
		}
		$image = null;
		if($entryimage) {
			if($s_result->image && file_exists("{$config->absolutePath}/images/com_sobi2/clients/{$s_result->image}")) {
				$image = "<a href=\"{$url}\" title=\"{$myFullTitle}\"><img style=\"border-style:none;\" src=\"{$config->liveSite}/images/com_sobi2/clients/{$s_result->image}\" title=\"{$myFullTitle}\" alt=\"{$myFullTitle}\"/></a>&nbsp;";
			}
		}
		$e = null;
		if($showTitle) {
			if ((function_exists("mb_strlen")) && (substr($encoding,0,3) == "UTF")) {
				$len = mb_strlen($myTitle, $encoding);
			}
			else 
				$len = strlen($myTitle);
				
			if ($len > $maxlength) {
				if ((function_exists("mb_substr")) && (substr($encoding,0,3) == "UTF")) {
				   $myTitle = mb_substr($myTitle, 0,  $maxlength, $encoding);
				}
				else 
				   $myTitle = substr($myTitle, 0,  $maxlength);
				
			   $myTitle = $myTitle."...";
			}
			$e = "<a href=\"{$url}\" title=\"{$myFullTitle}\">{$myTitle}</a>";
		}
		if ($icon || $image || $e) {
			if ($direction == 1)
				echo "<li class=\"sobi2latest{$class}\">{$icon}{$image}{$e}</li>\n";
			else {
				echo "<div class=\"sobi2latest{$class}\" style=\"float:left; margin: 5px;\">{$icon}{$image}{$e}</div>\n";
			}
		}
	}
}
if ($direction == 1)
	echo "</ul>\n";
else 
	echo "<div style=\"clear:both;\"></div>\n";
	
if( !( defined( "_JEXEC" ) ) ) {
	if ($table) 
		echo "</td></tr></table>\n";
}
echo "<!--End of SOBI2 Latest Entries Module -->\n";
?>