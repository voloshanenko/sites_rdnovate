<?php
//don't allow other scripts to grab and execute our file
defined('_JEXEC') or die('Direct Access to this location is not allowed.');
// include the helper file
require_once(dirname(__FILE__).DS.'helper.php');
 
// get the items to display from the helper
$items = modLatestArticlesHelper::getItems($params);
 
// include the template for display
require(JModuleHelper::getLayoutPath('mod_latest_articles'));
?>