<?php
/**
 * @version     $Id$ 2.0.3 0
 * @package     Joomla
 * @copyright   Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license     GNU/GPL, see LICENSE.php
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

class JElementAiSobiSearchItemsOrder extends JElement {

	var	$_name = 'aiSobiSearchItemsOrder';

	function fetchElement($name, $value, &$node, $control_name) {
		$db =& JFactory::getDBO();

		$query = 'SELECT l.langValue as name, f.fieldid as id FROM #__sobi2_fields f LEFT JOIN #__sobi2_language l ON f.fieldid = l.fieldid AND l.sobi2Section = \'fields\' AND sobi2Lang = \'english\' WHERE f.enabled = 1 ORDER BY l.langValue';
		$db->setQuery($query);
		$select_combo = $db->loadObjectList();

		$txtSelect = new stdClass;
		$txtSelect->name = 'Items title';
		$txtSelect->id = -1;
		array_unshift($select_combo, $txtSelect);

		$txtSelect = new stdClass;
		$txtSelect->name = 'Items order';
		$txtSelect->id = 0;
		array_unshift($select_combo, $txtSelect);

		$value = (int)$value;
		$htmlTag = JHTML::_('select.genericlist',  $select_combo, 'params['.$name.']', 'class="inputbox" size="1"', 'id', 'name', $value);

		return $htmlTag;
	}

}

?>
