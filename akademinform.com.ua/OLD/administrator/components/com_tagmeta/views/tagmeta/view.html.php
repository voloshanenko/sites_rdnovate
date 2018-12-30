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

// Check to ensure this file is included in Joomla!  defined('_JEXEC') or die();
jimport( 'joomla.application.component.view');

/**
 * HTML View class for the Tag Meta component
 *
 * @static
 * @package TagMeta
 *
 */
class TagMetaViewTagMeta extends JView
{
  function display($tpl = null)
  {
 global $mainframe, $option;

 $db =& JFactory::getDBO();

 $filter_state = $mainframe->getUserStateFromRequest( $option.'filter_state', 'filter_state', '', 'word' );
 $filter_order = $mainframe->getUserStateFromRequest( $option.'filter_order', 'filter_order', 'a.ordering', 'cmd' );
 $filter_order_Dir = $mainframe->getUserStateFromRequest( $option.'filter_order_Dir', 'filter_order_Dir', '', 'word' );
 $search = $mainframe->getUserStateFromRequest( $option.'search', 'search', '', 'string' );
 $search = JString::strtolower( $search );

 // Get data from the model
 $items = & $this->get( 'Data');
 $total = & $this->get( 'Total');
 $pagination = & $this->get( 'Pagination' );

 // state filter
 $lists['state']  = JHTML::_('grid.state',  $filter_state );

 // table ordering
 $lists['order_Dir'] = $filter_order_Dir;
 $lists['order'] = $filter_order;

 // search filter
 $lists['search']= $search;

 $this->assignRef('user', JFactory::getUser());
 $this->assignRef('lists', $lists);
 $this->assignRef('items', $items);
 $this->assignRef('pagination', $pagination);

 parent::display($tpl);
  }
}
?>