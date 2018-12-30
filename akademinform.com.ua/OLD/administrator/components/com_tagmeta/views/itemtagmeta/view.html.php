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
 * @since 1.0
 */
class TagMetaViewItemTagMeta extends JView
{
  function display($tpl = null)
  {
    global $mainframe;

    if($this->getLayout() == 'form') {
      $this->_displayForm( $tpl );
      return;
    }

    //get the itemtagmeta
    $itemtagmeta =& $this->get('data');

    parent::display($tpl);
  }

  function _displayForm($tpl)
  {
    global $mainframe, $option;

    $user   =& JFactory::getUser();
    $model  =& $this->getModel( 'itemtagmeta' );

    $lists = array();

    //get the itemtagmeta
    $itemtagmeta  =& $this->get('data');
    $isNew = ($itemtagmeta->id < 1);

    // Fails if checked out not by 'me'
    if ($model->isCheckedOut( $user->get('id') )) {
      $msg = JText::sprintf( 'DESCBEINGEDITTED', JText::_( 'The list' ), $itemtagmeta->uri );
      $mainframe->redirect( 'index.php?option='. $option, $msg );
    }

    // Edit or Create?
    if (!$isNew)
    {
      $model->checkout( $user->get('id') );
    }
    else
    {
      // Initialise new record
      $itemtagmeta->published = 1;
      $itemtagmeta->approved = 1;
      $itemtagmeta->order = 0;
    }

    // build the html select list for ordering
    $query = 'SELECT ordering AS value, uri AS text'
      . ' FROM #__tagmeta'
      . ' ORDER BY ordering';

    $lists['ordering'] = JHTML::_('list.specificordering',  $itemtagmeta, $itemtagmeta->id, $query, 1 );
    $lists['published'] = JHTML::_('select.booleanlist',  'published', 'class="inputbox"', $itemtagmeta->published );

    //clean itemtagmeta data
    jimport('joomla.filter.output');
    JFilterOutput::objectHTMLSafe( $itemtagmeta, ENT_QUOTES, 'text' );

    $this->assignRef('lists',    $lists);
    $this->assignRef('itemtagmeta',    $itemtagmeta);

    parent::display($tpl);
  }
}
?>