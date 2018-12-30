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
 
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport('joomla.application.component.model');

class TagMetaModelItemTagMeta extends JModel
{
  /**
   * ItemTagMeta id
   *
   * @var int
   */
  var $_id = null;

  /**
   * ItemTagMeta data
   *
   * @var array
   */
  var $_data = null;

  /**
   * Constructor
   *
   * @since 1.5
   */
  function __construct()
  {
    parent::__construct();

    $array = JRequest::getVar('cid', array(0), '', 'array');
    $edit  = JRequest::getVar('edit',true);
    if($edit)
      $this->setId((int)$array[0]);
  }

  /**
   * Method to set the itemtagmeta identifier
   *
   * @access  public
   * @param int itemtagmeta identifier
   */
  function setId($id)
  {
    // Set itemtagmeta id and wipe data
    $this->_id    = $id;
    $this->_data  = null;
  }

  /**
   * Method to get a itemtagmeta
   *
   * @since 1.5
   */
  function &getData()
  {
    // Load the itemtagmeta data
    if ($this->_loadData())
    {
      // Initialize some variables
      $user = &JFactory::getUser();
    }
    else  $this->_initData();

    return $this->_data;
  }

  /**
   * Tests if itemtagmeta is checked out
   *
   * @access  public
   * @param  int  A user id
   * @return  boolean  True if checked out
   * @since  1.5
   */
  function isCheckedOut( $uid=0 )
  {
    if ($this->_loadData())
    {
      if ($uid) {
        return ($this->_data->checked_out && $this->_data->checked_out != $uid);
      } else {
        return $this->_data->checked_out;
      }
    }
  }

  /**
   * Method to checkin/unlock the itemtagmeta
   *
   * @access  public
   * @return  boolean  True on success
   * @since  1.5
   */
  function checkin()
  {
    if ($this->_id)
    {
      $itemtagmeta = & $this->getTable();
      if(! $itemtagmeta->checkin($this->_id)) {
        $this->setError($this->_db->getErrorMsg());
        return false;
      }

      return true;
    }
    return false;
  }

  /**
   * Method to checkout/lock the itemtagmeta
   *
   * @access  public
   * @param  int  $uid  User ID of the user checking the item out
   * @return  boolean  True on success
   * @since  1.5
   */
  function checkout($uid = null)
  {
    if ($this->_id)
    {
      // Make sure we have a user id to checkout the item with
      if (is_null($uid)) {
        $user  =& JFactory::getUser();
        $uid  = $user->get('id');
      }
      // Lets get to it and checkout the thing...
      $itemtagmeta = & $this->getTable();
      if(!$itemtagmeta->checkout($uid, $this->_id)) {
        $this->setError($this->_db->getErrorMsg());
        return false;
      }

      return true;
    }
    return false;
  }

  /**
   * Method to store the itemtagmeta
   *
   * @access  public
   * @return  boolean  True on success
   * @since  1.5
   */
  function store($data)
  {
    $row =& $this->getTable();

    // Bind the form fields to the itemtagmeta table
    if (!$row->bind($data)) {
      $this->setError($this->_db->getErrorMsg());
      return false;
    }

    // if new item, order last in appropriate group
    if (!$row->id) {
      $where = '';
      $row->ordering = $row->getNextOrder( $where );
    }

    // Make sure the itemtagmeta table is valid
    if (!$row->check()) {
      $this->setError($this->_db->getErrorMsg());
      return false;
    }

    // Store the itemtagmeta table to the database
    if (!$row->store()) {
      $this->setError($this->_db->getErrorMsg());
      return false;
    }

    return true;
  }

  /**
   * Method to remove a itemtagmeta
   *
   * @access  public
   * @return  boolean  True on success
   * @since  1.5
   */
  function delete($cid = array())
  {
    $result = false;

    if (count( $cid ))
    {
      JArrayHelper::toInteger($cid);
      $cids = implode( ',', $cid );
      $query = 'DELETE FROM #__tagmeta'
        . ' WHERE id IN ( '.$cids.' )';
      $this->_db->setQuery( $query );
      if(!$this->_db->query()) {
        $this->setError($this->_db->getErrorMsg());
        return false;
      }
    }

    return true;
  }

  /**
   * Method to (un)publish a itemtagmeta
   *
   * @access  public
   * @return  boolean  True on success
   * @since  1.5
   */
  function publish($cid = array(), $publish = 1)
  {
    $user   =& JFactory::getUser();

    if (count( $cid ))
    {
      JArrayHelper::toInteger($cid);
      $cids = implode( ',', $cid );

      $query = 'UPDATE #__tagmeta'
        . ' SET published = '.(int) $publish
        . ' WHERE id IN ( '.$cids.' )'
        . ' AND ( checked_out = 0 OR ( checked_out = '.(int) $user->get('id').' ) )'
      ;
      $this->_db->setQuery( $query );
      if (!$this->_db->query()) {
        $this->setError($this->_db->getErrorMsg());
        return false;
      }
    }

    return true;
  }

  /**
   * Method to move a itemtagmeta
   *
   * @access  public
   * @return  boolean  True on success
   * @since  1.5
   */
  function move($direction)
  {
    $row =& $this->getTable();
    if (!$row->load($this->_id)) {
      $this->setError($this->_db->getErrorMsg());
      return false;
    }

    if (!$row->move( $direction, ' published >= 0 ' )) {
      $this->setError($this->_db->getErrorMsg());
      return false;
    }

    return true;
  }

  /**
   * Method to move a tag meta list
   *
   * @access  public
   * @return  boolean  True on success
   * @since  1.5
   */
  function saveorder($cid = array(), $order)
  {
    $row =& $this->getTable();

    // update ordering values
    for( $i=0; $i < count($cid); $i++ )
    {
      $row->load( (int) $cid[$i] );

      if ($row->ordering != $order[$i])
      {
        $row->ordering = $order[$i];
        if (!$row->store()) {
          $this->setError($this->_db->getErrorMsg());
          return false;
        }
      }
    }

    $row->reorder();

    return true;
  }

  /**
   * Method to load content itemtagmeta data
   *
   * @access  private
   * @return  boolean  True on success
   * @since  1.5
   */
  function _loadData()
  {
    // Lets load the content if it doesn't already exist
    if (empty($this->_data))
    {
      $query = 'SELECT * FROM #__tagmeta WHERE id = '.(int) $this->_id;
      $this->_db->setQuery($query);
      $this->_data = $this->_db->loadObject();
      return (boolean) $this->_data;
    }
    return true;
  }

  /**
   * Method to initialise the itemtagmeta data
   *
   * @access  private
   * @return  boolean  True on success
   * @since  1.5
   */
  function _initData()
  {
    // Lets load the content if it doesn't already exist
    if (empty($this->_data))
    {
      $itemtagmeta = new stdClass();
      $itemtagmeta->id = 0;
      $itemtagmeta->uri = '';
      $itemtagmeta->title = null;
      $itemtagmeta->description = null;
      $itemtagmeta->keywords = null;
      $itemtagmeta->rindex = 1;
      $itemtagmeta->rfollow = 1;
      $itemtagmeta->rsnippet = 2;
      $itemtagmeta->rarchive = 2;
      $itemtagmeta->rodp = 2;
      $itemtagmeta->ordering = 0;
      $itemtagmeta->published = 0;
      $itemtagmeta->checked_out = 0;
      $itemtagmeta->checked_out_time = 0;
      $this->_data = $itemtagmeta;
      return (boolean) $this->_data;
    }
    return true;
  }
}
?>