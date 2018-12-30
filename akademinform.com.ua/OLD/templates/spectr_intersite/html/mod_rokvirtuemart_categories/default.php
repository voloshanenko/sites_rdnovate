<?php
/**
* @package mod_rokvirtuemart_categories
* @copyright	Copyright (C) 2009 RocketTheme. All rights reserved.
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL, see LICENSE.php
* RokVirtuemart Product Categories is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*
*/

$document =& JFactory::getDocument();
$js = JURI::base() . 'modules/mod_rokvirtuemart_categories/js/';

$class = $params->get('moduleclass_sfx', '');

if (!defined('ROKVIRTUEMART_CATEGORIES_JS')) {
	$document->addScript($js . 'rokvm_categories.js');
	define('ROKVIRTUEMART_CATEGORIES_JS',1);
}

echo "<ul class='rokvm_categories menu'>";
echo $category_html;
echo "</ul>";
?>