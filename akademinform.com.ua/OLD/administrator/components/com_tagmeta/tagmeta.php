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
defined( '_JEXEC' ) or die( 'Restricted access' );

/*
 * Make sure the user is authorized to view this page
 */
//$user = & JFactory::getUser();
//if (!$user->authorize( 'com_tagmeta', 'manage' )) {
//    $mainframe->redirect( 'index.php', JText::_('ALERTNOTAUTH') );
//}

// Set the table directory
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_tagmeta'.DS.'tables');

// Require the base controller
require_once (JPATH_COMPONENT.DS.'controller.php');

$controller = new TagMetaController();

// Perform the Request task
$controller->execute( JRequest::getCmd('task') );
$controller->redirect();

?>