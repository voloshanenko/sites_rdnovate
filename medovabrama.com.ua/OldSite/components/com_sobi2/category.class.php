<?php
/**
* @version $Id: category.class.php 5462 2010-08-18 08:25:37Z Sigrid Suski $
* @package: Sigsiu Online Business Index 2 (Sobi2)
* ===================================================
* @author
* Name: Sigrid & Radek Suski, Sigsiu.NET GmbH
* Email: sobi[at]sigsiu.net
* Url: http://www.sigsiu.net
* ===================================================
* @copyright Copyright (C) 2006 - 2010 Sigsiu.NET GmbH (http://www.sigsiu.net). All rights reserved.
* @license see http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL.
* You can use, redistribute this file and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation.
*/
defined( '_SOBI2_' ) || exit("Restricted access");
class sobi2Category {
	var $catid 				= null;
	var $name 				= null;
	var $image 				= null;
	var $image_position 	= null;
	var $description		= null;
	var $introtext			= null;
	var $published			= null;
	var $ordering			= null;
	var $count				= null;
	var $icon				= null;
	var $params				= null;
	var $myParents			= array();
	var $myChildren			= array();
	var $tpl				= null;
	/**
	 * @var int
	 */
	var $itemsInLine		= 0;
	/**
	 * @var int
	 */
	var $lineOnSite			= 0;
	/**
	 * @var int
	 */
	var $catsListInLine		= 0;

	function sobi2Category($cid = 0)
	{
		$config =& sobi2Config::getInstance();
    	if( $cid ) {
			$this->catid = $cid;
			$this->getCategory($this->catid);
		}
    	if(count($config->S2_plugins)) {
    		foreach($config->S2_plugins as $plugin) {
				if(method_exists($plugin, "onCreateCategoryObj")) {
					$plugin->onCreateCategoryObj( $this );
    			}
    		}
    	}
    }
    function getCategory()
    {
    	$config =& sobi2Config::getInstance();
		$database = &$config->getDb();
    	$category = null;
    	$query = "SELECT * FROM `#__sobi2_categories` WHERE `catid` = {$this->catid} LIMIT 1";
    	$database->setQuery( $query );
		if( !$config->forceLegacy && class_exists( "JDatabase" ) ) {
			$category = $database->loadObject();
		}
    	else {
    		$database->loadObject( $category );
    	}
		if ( $database->getErrorNum() ) {
			trigger_error( "sobi2category::getCategory(): DB reports: ".$database->stderr(), E_USER_WARNING );
		}
    	if( $category ) {
    		$this->name = $config->getSobiStr($category->name);
    		$this->image = $category->image;
    		$this->image_position = $category->image_position;
    		$this->description = $config->getSobiStr($category->description);
    		$this->introtext = $config->getSobiStr($category->introtext);
    		$this->ordering = $category->ordering;
    		$this->count = $category->count;
    		$this->icon = $category->icon;
    		$this->params = $config->iniToArr( $category->params );
			$this->tpl 				= isset( $this->params[ 'template' ] ) 			?  $this->params[ 'template' ] : null;
			$this->itemsInLine 		= isset( $this->params[ 'itemsInLine' ] ) 		?  $this->params[ 'itemsInLine' ] : 0;
			$this->lineOnSite		= isset( $this->params[ 'lineOnSite' ] ) 		?  $this->params[ 'lineOnSite' ] : 0;
			$this->catsListInLine 	= isset( $this->params[ 'catsListInLine' ] ) 	?  $this->params[ 'catsListInLine' ] : 0;
    	}
    	$config->itemsInLine = $this->itemsInLine ? $this->itemsInLine : $config->itemsInLine;
    	$config->lineOnSite = $this->lineOnSite ? $this->lineOnSite : $config->lineOnSite;
    	$config->catsListInLine = $this->catsListInLine ? $this->catsListInLine : $config->catsListInLine;
    }
    function countVisit()
    {
    	$config =& sobi2Config::getInstance();
		$database = &$config->getDb();
		$statement = "UPDATE `#__sobi2_categories` SET `count` = count + 1 WHERE `catid` = {$this->catid} LIMIT 1 ";
		$database->setQuery($statement);
		$database->query();
		if ($database->getErrorNum()) {
			trigger_error("sobi2category::countVisit(): DB reports: ".$database->stderr(), E_USER_WARNING);
		}
    }
}
?>