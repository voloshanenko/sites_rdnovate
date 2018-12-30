<?php
/**
 * Tag Meta component for Joomla! 1.5
 *
 * @author Luigi Balzano (info@sistemistica.it)
 * @package TagMeta
 * @copyright Copyright 2009
 * @license GNU Public License
 * @link http://www.sistemistica.it
 * @version 1.2
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Include library dependencies
jimport('joomla.filter.input');

/**
* Tag Meta Table class
*
* @package TagMeta
*
*/
class TableItemTagMeta extends JTable
{
 /**
  * Primary Key
  *
  * @var int
  */
 var $id = null;

 /**
  * @var string
  */
 var $uri = null;

 /**
  * @var string
  */
 var $title = null;

 /**
  * @var string
  */
 var $description = null;

 /**
  * @var string
  */
 var $keywords = null;

 /**
  * @var int
  */
 var $rindex = null;

 /**
  * @var int
  */
 var $rfollow = null;

 /**
  * @var int
  */
 var $rsnippet = null;

 /**
  * @var int
  */
 var $rarchive = null;

 /**
  * @var int
  */
 var $rodp = null;

 /**
  * @var int
  */
 var $ordering = null;

 /**
  * @var int
  */
 var $published = null;

  /**
   * @var boolean
   */
  var $checked_out = null;

 /**
  * Constructor
  *
  * @param object Database connector object
  * @since 1.0
  */
 function __construct(& $db) {
  parent::__construct('#__tagmeta', 'id', $db);
 }

 /**
  * Overloaded check method to ensure data integrity
  *
  * @access public
  * @return boolean True on success
  * @since 1.0
  */
 function check() {
  /** check for unique uri */
  $query = 'SELECT id FROM #__tagmeta WHERE uri = '.$this->_db->Quote($this->uri);
  $this->_db->setQuery($query);

  $xid = intval($this->_db->loadResult());
  if ($xid && $xid != intval($this->id)) {
   $this->_error = JText::sprintf('WARNNAMETRYAGAIN', JText::_('Item'));
   return false;
  }

  jimport('joomla.filter.output');

  return true;
 }
}
?>