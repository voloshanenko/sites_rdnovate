<?php
/**
 * @version $Id: mod_sobi2menu.php 909 2007-06-24 13:29:03Z Radek Suski $
 * @package Menu Module for Sigsiu Online Business Index 2
 * @authorName Sigrid & Radek Suski, Sigsiu.NET
 * @authorEmail sobi@sigsiu.net
 * @authorUrl http://www.sigsiu.net
 * @copyright Copyright (C) 2007 Sigsiu.NET (http://www.sigsiu.net). All rights reserved.
 * @license see http://www.gnu.org/copyleft/gpl.html GNU/GPL.
 * SOBI2 menu module is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation.
 * mod_sobi2menu.php February-2008 Sigrid Suski
 */

(defined( '_VALID_MOS' ) || defined( '_JEXEC' ) ) || ( trigger_error( 'Restricted access', E_USER_ERROR ) && exit() );

defined( "DS" )	|| define( "DS",DIRECTORY_SEPARATOR);

$add = 	defined( 'JPATH_SITE' ) ?  DS.'mod_sobi2menu' : null;
$modulepath = DS.'modules'.$add;

defined( '_SOBI_CMSROOT' ) || define( '_SOBI_CMSROOT', str_replace($modulepath, null, dirname( __FILE__ )));
class_exists( 'sobi2Config' ) || require_once( _SOBI_CMSROOT.DS.'components'.DS.'com_sobi2'.DS.'config.class.php' );

//error_reporting(E_ALL);
//ini_set("display_errors","on");

if(!function_exists("sobi2trim")) { function sobi2trim( &$v ) { $v = trim( $v ); } }

if(!function_exists("sobi2entrycount")) {
	function sobi2entrycount($catid) {
		$config =& sobi2Config::getInstance();
		$cache =& $config->sobiCache;
		$counter = $cache->getObj( 0, 0, $catid, 0, true, true );
		return (isset($counter['items'])?$counter['items']:0);
	}
}

$loadfile = false;
if (!(defined("_JEXEC"))) {
	$loadfile = true;
}

$config =& sobi2Config::getInstance();

if (!defined('_SOBI2_CSS_LOADED')) {
	define('_SOBI2_CSS_LOADED', true);
	$config->addCustomHeadTag( "<link rel='StyleSheet' href='{$config->liveSite}/components/com_sobi2/includes/com_sobi2.css' type='text/css' />\n",$loadfile);
}
$modulepath = str_replace(DS,'/',$modulepath);
$config->addCustomHeadTag( "<script type='text/javascript' src='{$config->liveSite}{$modulepath}/mod_sobi2dtree.js'></script>\n", $loadfile);

if (!file_exists( _SOBI_FE_PATH.DS.'languages'.DS.$config->sobi2Language.'.php' )) {
	$config->sobi2Language = 'english';
}
require_once( _SOBI_FE_PATH.DS.'languages'.DS.$config->sobi2Language.'.php' );
if ( file_exists( _SOBI_FE_PATH.DS.'languages'.DS.'default.php' ) ) {
	include_once( _SOBI_FE_PATH.DS.'languages'.DS.'default.php' );
}

$database =& $config->getDb();
$class = $params->get('moduleclass_sfx');
$menu_dtree = $params->get('menu_dtree',1);
$menu_search = $params->get('search',1);
$new_entry = $params->get('new_entry',1);
$ignoreTask = $params->get('ignoreTask');
$ignoreTask	= explode( ",",$ignoreTask );

$sobiTask = sobi2Config::request( $_REQUEST,'sobi2Task',null, 2 );
array_walk( $ignoreTask, "sobi2trim" );
if ($sobiTask && in_array($sobiTask , $ignoreTask)) {
	return false;
}

$count_entries = $params->get('count_entries',0);
$showimage = $params->get('show_image',0);
$folderopen_img = $params->get('folderopen_img',"");
$folder_img = $params->get('folder_img',"");
$image_new = $params->get('image_new',"");
$image_search = $params->get('image_search',"");
$root_img = $params->get('root_img',"");
$useIcons = $params->get('useIcons',1);
$addCatId = $params->get('addCatId',0);

echo "\n";
echo "<!-- Start of SOBI2 Menu Module -->\n";

if( !( defined( "_JEXEC" ) ) ) {
	echo "<div class=\"sobi2MenuMod{$class}\">\n";
}

$dobr = "";
if ($new_entry) {
	$href = sobi2Config::sef("index.php?option=com_sobi2&amp;sobi2Task=addNew&amp;Itemid={$config->sobi2Itemid}");
	$showtext = _SOBI2_ADD_NEW_ENTRY;
	if ($showimage && $image_new) {
		$showtext = "<img src=\"{$image_new}\" alt=\""._SOBI2_ADD_NEW_ENTRY."\" />";
	}
	echo "<div class=\"sobi2MenuModNew{$class}\"><a href=\"{$href}\" title=\""._SOBI2_ADD_NEW_ENTRY."\">".$showtext."</a></div>\n";
	$dobr = "<br/>";
}
if ($menu_search) {
	$href = sobi2Config::sef("index.php?option=com_sobi2&amp;sobi2Task=search&amp;Itemid={$config->sobi2Itemid}");
	$showtext = _SOBI2_SEARCH_H;
	if ($showimage && $image_search) {
		$showtext = "<img src=\"{$image_search}\" alt=\""._SOBI2_SEARCH_H."\" />";
	}
	echo "<div class=\"sobi2MenuModSearch{$class}\"><a href=\"{$href}\" title=\""._SOBI2_SEARCH_H."\">".$showtext."</a></div>\n";
	$dobr = "<br/>";
}
if ($dobr) {
	echo "<div style=\"clear:both; margin:0px; padding:0px;\"></div>\n";
}

if ($menu_dtree) {
	if (false) {
			sobi2Config::import("includes|SigsiuTree|SigsiuTree");
			$tree = new SigsiuTree($config->aTreeImages);		
			$tree->init("SigsiuTreeMenu", "{sobi2}&amp;catid={cid}&amp;Itemid={Itemid}", "div","sobi2CatsMenu");
			$SigsiuTree = $tree->getTree();
			echo $SigsiuTree;
	}
	else {
		$query = "SELECT `#__sobi2_cats_relations`.catid, parentid, name,  ordering " .
				 "FROM `#__sobi2_cats_relations` " .
				 "LEFT JOIN `#__sobi2_categories` ON `#__sobi2_categories`.catid = `#__sobi2_cats_relations`.catid " .
				 "WHERE published = 1 ".
				 "ORDER BY {$config->catsOrdering}";
		$database->setQuery( $query );
		$categoryList = $database->loadObjectList();
		if(sizeof($categoryList) > 0) {
			$fixed = $params->get('menu_height', 50);
			if(( $params->get( 'menu_resize' ))) {	//keine dynamische Höhenanpassung
				$size = count($categoryList) * 12;
				if($size > $fixed)
					$size = $fixed;
				$size = "style=\"height:{$size}px;\"";
			}
			else
				$size = '';
	
			$href = sobi2Config::sef("index.php?option=com_sobi2&amp;Itemid={$config->sobi2Itemid}");
			$componentname = $config->jsAddSlashes($config->componentName);
			echo    "{$dobr}\n" .
					"<div class=\"dtree\" {$size}>\n" .
					"<script type='text/javascript'>\n" .
					"\tsobi2Cats = new dTree('sobi2Cats');\n" .
					"\tsobi2Cats.config.useCookies = true;\n" .
					"\tsobi2Cats.config.useIcons = {$useIcons};\n" .
					"\tsobi2Cats.add(0,-1,'{$componentname}', '{$href}');\n";
					
			echo 	"\tsobi2Cats.icon.root = '{$config->liveSite}/components/com_sobi2/images/base.gif';\n" .
					"\tsobi2Cats.icon.folder = '{$config->liveSite}/components/com_sobi2/images/folder.gif';\n" .
					"\tsobi2Cats.icon.folderOpen = '{$config->liveSite}/components/com_sobi2/images/folderopen.gif';\n" .
					"\tsobi2Cats.icon.node = '{$config->liveSite}/components/com_sobi2/images/page.gif';\n" .
					"\tsobi2Cats.icon.empty = '{$config->liveSite}/components/com_sobi2/images/empty.gif';\n" .
					"\tsobi2Cats.icon.line = '{$config->liveSite}/components/com_sobi2/images/line.gif';\n" .
					"\tsobi2Cats.icon.join = '{$config->liveSite}/components/com_sobi2/images/join.gif';\n" .
					"\tsobi2Cats.icon.joinBottom = '{$config->liveSite}/components/com_sobi2/images/joinbottom.gif';\n" .
					"\tsobi2Cats.icon.plus = '{$config->liveSite}/components/com_sobi2/images/plus.gif';\n" .
					"\tsobi2Cats.icon.plusBottom = '{$config->liveSite}/components/com_sobi2/images/plusbottom.gif';\n" .
					"\tsobi2Cats.icon.minus = '{$config->liveSite}/components/com_sobi2/images/minus.gif';\n" .
					"\tsobi2Cats.icon.minusBottom = '{$config->liveSite}/components/com_sobi2/images/minusbottom.gif';\n" .
					"\tsobi2Cats.icon.nlPlus = '{$config->liveSite}/components/com_sobi2/images/nolines_plus.gif';\n" .
					"\tsobi2Cats.icon.nlMinus = '{$config->liveSite}/components/com_sobi2/images/nolines_minus.gif';\n";					if ($root_img) {
				echo "\tsobi2Cats.icon.root = '{$root_img}';\n";
			}
			
			foreach($categoryList as $category) {
				$category->name = $config->jsAddSlashes($config->getSobiStr($category->name));
				if($category->parentid == 1)
					$category->parentid--;
				$href = sobi2Config::sef("index.php?option=com_sobi2&amp;catid={$category->catid}&amp;Itemid={$config->sobi2Itemid}");
				if ($count_entries) {
					$entrycount = " (".sobi2entrycount($category->catid).")";
				}
				else {
					$entrycount = "";	
				}
				$addedCatId = (!$addCatId)?"":$category->catid;
				$folder = ($folder_img)?$folder_img:"/components/com_sobi2/images/folder{$addedCatId}.gif";
				$folderopen = ($folderopen_img)?$folderopen_img:"/components/com_sobi2/images/folderopen{$addedCatId}.gif";
				echo "\tsobi2Cats.add({$category->catid},{$category->parentid},'{$category->name}{$entrycount}','{$href}','','','{$config->liveSite}{$folder}' ,'{$config->liveSite}{$folderopen}');\n";
			}
			echo "\tdocument.write(sobi2Cats);\n</script>\n</div>\n";
		}
	}
}
else {
	$query = "SELECT  relations.catid, name,  ordering " .
			 "FROM `#__sobi2_categories` " .
			 "LEFT JOIN `#__sobi2_cats_relations` AS relations ON `#__sobi2_categories`.catid = relations.catid " .
			 "WHERE published = 1 AND relations.parentid = '1' ".
			 "ORDER BY {$config->catsOrdering}";
	$database->setQuery( $query );
	$categoryList = $database->loadObjectList();
	if(sizeof($categoryList) > 0) {
		echo "<ul>\n";
		foreach($categoryList as $category) {
			$href = sobi2Config::sef("index.php?option=com_sobi2&amp;catid={$category->catid}&amp;Itemid={$config->sobi2Itemid}");
			$name = $config->getSobiStr($category->name);
			if ($count_entries) {
				$entrycount = " (".sobi2entrycount($category->catid).")";
			}
			else {
				$entrycount = "";	
			}
			echo "<li><a href='{$href}'>{$name}{$entrycount}</a></li>\n";
		}
		echo "</ul>\n";
	}
}

if( !( defined( "_JEXEC" ) ) ) {
	echo "</div>\n";
}
echo "<!--End of SOBI2 Menu Module -->\n";
?>
