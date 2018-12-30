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
jimport('joomla.application.component.model');

class TagMetaModelTagMeta extends JModel
{
  /**
   * Category data array
   *
   * @var array
   */
  var $_data = null;

  /**
   * Category total
   *
   * @var integer
   */
  var $_total = null;

  /**
   * Pagination object
   *
   * @var object
   */
  var $_pagination = null;

  /**
   * Constructor
   *
   * @since 1.5
   */
  function __construct()
  {
 parent::__construct();

 global $mainframe, $option;

 // Get the pagination request variables
 $limit = $mainframe->getUserStateFromRequest( 'global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int' );
 $limitstart  = $mainframe->getUserStateFromRequest( $option.'limitstart', 'limitstart', 0, 'int' );

 $this->setState('limit', $limit);
 $this->setState('limitstart', $limitstart);
  }

  /**
   * Method to get tag meta item data
   *
   * @access public
   * @return array
   */
  function getData()
  {
 // Lets load the content if it doesn't already exist
 if (empty($this->_data))
 {
   $query = $this->_buildQuery();
   $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));
 }

 return $this->_data;
  }

  /**
   * Method to get the total number of tag meta items
   *
   * @access public
   * @return integer
   */
  function getTotal()
  {
 // Lets load the content if it doesn't already exist
 if (empty($this->_total))
 {
   $query = $this->_buildQuery();
   $this->_total = $this->_getListCount($query);
 }

 return $this->_total;
  }

  /**
   * Method to get a pagination object for the tag meta
   *
   * @access public
   * @return integer
   */
  function getPagination()
  {
 // Lets load the content if it doesn't already exist
 if (empty($this->_pagination))
 {
   jimport('joomla.html.pagination');
   $this->_pagination = new JPagination( $this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );
 }

 return $this->_pagination;
  }

  function _buildQuery()
  {
 // Get the WHERE and ORDER BY clauses for the query
 $where = $this->_buildContentWhere();
 $orderby  = $this->_buildContentOrderBy();

 $query = ' SELECT a.id, a.uri, a.title, a.description, a.keywords, a.rindex, '
   . 'a.rfollow, a.rsnippet, a.rarchive, a.rodp, a.ordering, a.published, a.checked_out'
   . ' FROM #__tagmeta AS a '
   . $where
   . $orderby
 ;

 return $query;
  }

  function _buildContentOrderBy()
  {
 global $mainframe, $option;

 $filter_order = $mainframe->getUserStateFromRequest( $option.'filter_order', 'filter_order', 'a.ordering',  'cmd' );
 $filter_order_Dir  = $mainframe->getUserStateFromRequest( $option.'filter_order_Dir',  'filter_order_Dir',  '',  'word' );

 if ($filter_order == 'a.ordering'){
   $orderby   = ' ORDER BY a.ordering '.$filter_order_Dir;
 } else {
   $orderby   = ' ORDER BY '.$filter_order.' '.$filter_order_Dir.' , a.ordering ';
 }

 return $orderby;
  }

  function _buildContentWhere()
  {
 global $mainframe, $option;

 $filter_state = $mainframe->getUserStateFromRequest( $option.'filter_state', 'filter_state', '', 'word' );
 $filter_order = $mainframe->getUserStateFromRequest( $option.'filter_order', 'filter_order', 'a.ordering', 'cmd' );
 $filter_order_Dir  = $mainframe->getUserStateFromRequest( $option.'filter_order_Dir',  'filter_order_Dir', '', 'word' );
 $search  = $mainframe->getUserStateFromRequest( $option.'search', 'search', '', 'string' );
 $search  = JString::strtolower( $search );

 $where = array();

 if ($search) {
   $where[] = 'LOWER(a.uri) LIKE '.$this->_db->Quote('%'.$search.'%');
 }
 if ( $filter_state ) {
   if ( $filter_state == 'P' ) {
  $where[] = 'a.published = 1';
   } else if ($filter_state == 'U' ) {
  $where[] = 'a.published = 0';
   }
 }

 $where  = ( count( $where ) ? ' WHERE '. implode( ' AND ', $where ) : '' );

 return $where;
  }
}
?>