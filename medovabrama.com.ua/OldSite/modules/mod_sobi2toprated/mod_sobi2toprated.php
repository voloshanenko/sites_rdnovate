<?php
/**
* @version $Id: mod_sobi2toprated.php 4848 2009-01-24 20:04:45Z Sigrid Suski $
* @package: Sigsiu Online Business Index 2 Top Rated Module
* ===================================================
* @author
* Name: Sigrid & Radek Suski, Sigsiu.NET
* Email: sobi@sigsiu.net
* Url: http://www.sigsiu.net
* ===================================================
* @copyright Copyright (C) 2007-2009 Sigsiu.NET (http://www.sigsiu.net). All rights reserved.
* @license see http://www.gnu.org/copyleft/gpl.html GNU/GPL.
* SOBI2 Top Rated Module is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation.
*/

(defined( '_VALID_MOS' ) || defined( '_JEXEC' ) ) || ( trigger_error( 'Restricted access', E_USER_ERROR ) && exit() );

defined( "DS" )	|| define( "DS",DIRECTORY_SEPARATOR);

$add = 	defined( 'JPATH_SITE' ) ?  DS.'mod_sobi2toprated' : null;
defined( '_SOBI_CMSROOT' ) || define( '_SOBI_CMSROOT', str_replace( DS.'modules'.$add, null, dirname( __FILE__ ) ) );
class_exists( 'sobi2Config' ) || require_once( _SOBI_CMSROOT.DS.'components'.DS.'com_sobi2'.DS.'config.class.php' );

if (!function_exists('sobi2cutString')) {
	function sobi2cutString($text, $max, $encoding) {
		if ($max == 0) 
			return $text;
			
		if ((function_exists("mb_strlen")) && (substr($encoding,0,3) == "UTF")) {
			$len = mb_strlen($text, $encoding);
		}
		else 
			$len = strlen($text);
			
		if ($len > $max) {
			if ((function_exists("mb_substr")) && (substr($encoding,0,3) == "UTF")) {
			   $text = mb_substr($text, 0, $max, $encoding);
			}
			else 
			   $text = substr($text, 0, $max);
			
		   $text = $text."...";
		}
		return $text;
	}
}

if (!function_exists("sobi2ShowVoteImage")){
	function sobi2ShowVoteImage($vote) {
		$config =& sobi2Config::getInstance();
		$votesImgs = array( 0 => '00-0-star.png',1 => '00-5-star.png',2 => '01-0-star.png',3 => '01-5-star.png',
			4 => '02-0-star.png',5 => '02-5-star.png',6 => '03-0-star.png',7 => '03-5-star.png',8 => '04-0-star.png',
			9 => '04-5-star.png',10 => '05-0-star.png');
	
		(float) $vote *= 2;
		$vote = round($vote);
		$voteDir = "{$config->liveSite}/components/com_sobi2/plugins/reviews/images/Star-Rating";
		$v = sobi2Config::checkPNGImage("{$voteDir}/{$votesImgs[$vote]}", $vote);
		return $v;
	}
}

$dodebug = false;

if ($dodebug) {
	error_reporting(E_ALL);
	ini_set("display_errors","on");
}

//Get the parameters
$class = $params->get('moduleclass_sfx');
$limit = $params->get('count',5);
$table = $params->get('moduletable', 0); //only J1.0
$entryicon = $params->get('entryicon',0);
$entryimage = $params->get('entryimage',0);
$showTitle = $params->get('title',1);
$maxlength = $params->get('item_length', 0);
$direction = $params->get('direction', 1);
$showNoEntries = $params->get('showNoEntries', "");
$categorydepend = $params->get('categorydepend', 0);
if(!$limit || $limit < 1)
	$limit = 5;
	
$showvotes = $params->get('showvotes', 0);
$showvotesimage = $params->get('showvotesimage');

$showlimit = $params->get('showlimit', 16);
if ($showlimit == 0)
	$showlimit = 16;
$showlimit--;
$catsignore = $params->get('catsignore');

$config =& sobi2Config::getInstance();
$database =& $config->getDb();
$S_Itemid = $config->sobi2Itemid;
$catId = sobi2Config::request( $_REQUEST,'catid',0 );

$now = $config->getTimeAndDate();

$loadfile = false;
if (!(defined("_JEXEC"))) {
	$loadfile = true;
}
if (!defined('_SOBI2_CSS_LOADED')) {
	define('_SOBI2_CSS_LOADED', true);
	$config->addCustomHeadTag( "<link rel='StyleSheet' href='{$config->liveSite}/components/com_sobi2/includes/com_sobi2.css' type='text/css' />\n",$loadfile);
}

$where = null;
if (($catId > 1) && ($categorydepend == 1)) {
	$where = "(sitem.itemid IN (SELECT itemid FROM #__sobi2_cat_items_relations WHERE catid = {$catId})) AND ";
}
$where2 = null;
if ($catsignore) {
	$catsignore = explode (",",$catsignore);	//Array erzeugen
	if (count($catsignore)) {
		$catsignore = implode(",",$catsignore);
		$where2 = "(sitem.itemid NOT IN (SELECT itemid FROM #__sobi2_cat_items_relations WHERE catid IN ({$catsignore}))) AND ";
	}
}

$query = "SELECT sitem.itemid, sitem.title, sitem.icon, sitem.image, SUM(vote) / COUNT(*) AS votingResult, COUNT(*) AS reviews FROM #__sobi2_plugin_reviews AS rev LEFT JOIN  #__sobi2_item AS sitem ON sitem.itemid = rev.itemid WHERE {$where} {$where2} (vote > 0 AND rev.published = 1 AND sitem.published = 1 AND (sitem.publish_down > '{$now}' OR sitem.publish_down = '{$config->nullDate}')) GROUP BY itemid HAVING COUNT( * ) > {$showlimit} ORDER BY votingResult DESC LIMIT 0, {$limit}";

$database->setQuery( $query );
$s_results = $database->loadObjectList();
if ($dodebug) {
	if ($database->getErrorNum())
		echo $database->getErrorMsg();
	//echo $database->getQuery();
}

$iso = explode( '=', _ISO );
$encoding = strtoupper($iso[1]);

echo "\n";
echo "<!-- Start of SOBI2 Top Rated Module -->\n";
if( !( defined( "_JEXEC" ) ) ) {
	if ($table)
		echo "<table cellpadding=\"0\" cellspacing=\"0\" class=\"moduletable{$class}\"><tr><td>\n";
}
if(count($s_results)) {
	if ($direction == 1)
		echo "<ul class=\"sobi2toprated{$class}\">\n";

	$imagepath = $config->key('general', 'images_folder');
	if (!$imagepath)
		$imagepath = '/images/com_sobi2/clients/';

	foreach($s_results as $s_result) {
		$url = "index.php?option=com_sobi2&amp;sobi2Task=sobi2Details&amp;sobi2Id={$s_result->itemid}&amp;Itemid={$S_Itemid}";
		$url = sobi2Config::sef($url);

		$myTitle = $config->getSobiStr($s_result->title);
		$myFullTitle = $myTitle;
		
		$icon = null;
		if ($entryicon) {
			$imagename = $s_result->icon;
			if ((!$imagename) && ($config->key('frontpage', 'default_ico'))) {
				$imagename = $config->key( 'frontpage', 'default_ico' );
			}
			if($imagename && file_exists("{$config->absolutePath}{$imagepath}{$imagename}")) {
				$icon = "<a href=\"{$url}\" title=\"{$myFullTitle}\"><img style=\"border-style:none;\" src=\"{$config->liveSite}{$imagepath}{$imagename}\" title=\"{$myFullTitle}\" alt=\"{$myFullTitle}\"/></a>&nbsp;";
			}
		}
		$image = null;
		if ($entryimage) {
			$imagename = $s_result->image;
			if ((!$imagename) && ($config->key('frontpage', 'default_img'))) {
				$imagename = $config->key( 'frontpage', 'default_img' );
			}
			if($imagename && file_exists("{$config->absolutePath}{$imagepath}{$imagename}")) {
				$image = "<a href=\"{$url}\" title=\"{$myFullTitle}\"><img style=\"border-style:none;\" src=\"{$config->liveSite}{$imagepath}{$imagename}\" title=\"{$myFullTitle}\" alt=\"{$myFullTitle}\"/></a>&nbsp;";
			}
		}
		
		$e = null;
		if ($showTitle) {
			$myTitle = sobi2cutString($myTitle, $maxlength, $encoding);
			$e = "<a href=\"{$url}\" title=\"{$myFullTitle}\">{$myTitle}</a>";
		}

		$ratenumber = "";
		$votes = number_format($s_result->votingResult,1);
		if ($showvotes || $showvotesimage) {
			$ratenumber .= "&nbsp;<span class=\"votes\">";
			if ($showvotes) {
				$ratenumber .= "({$votes})";
			}
			if ($showvotesimage) {
				$ratenumber .= sobi2ShowVoteImage($votes);
			}
			$ratenumber .= "</span>";
		}

		if ($icon || $image || $e) {
			if ($direction == 1)
				echo "<li class=\"sobi2toprated{$class}\">{$icon}{$image}{$e}{$ratenumber}</li>\n";
			else {
				echo "<div class=\"sobi2toprated{$class}\" style=\"float:left; margin: 5px;\">{$icon}{$image}{$e}{$ratenumber}</div>\n";
			}
		}
	}
	
	if ($direction == 1)
		echo "</ul>\n";
	else 
		echo "<div style=\"clear:both;\"></div>\n";
}
else { //no matching entries
	if ($showNoEntries) {
		echo "<div class=\"sobi2toprated_empty{$class}\" style=\"margin: 5px;\">{$showNoEntries}</div>\n";
	}
}
	
if( !( defined( "_JEXEC" ) ) ) {
	if ($table) 
		echo "</td></tr></table>\n";
}
echo "<!-- End of SOBI2 Top Rated Module -->\n";
?>