<?php
/**
 * SEF component for Joomla! 1.5
 *
 * @author      ARTIO s.r.o.
 * @copyright   ARTIO s.r.o., http://www.artio.cz
 * @package     JoomSEF
 * @version     3.1.0
 * @license     GNU/GPLv3 http://www.gnu.org/copyleft/gpl.html
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view' );

class SEFViewSEFUrls extends JView
{
	function display($tpl = null)
	{
	    $mainframe =& JFactory::getApplication();
	    $viewmode = $mainframe->getUserStateFromRequest('sef.sefurls.viewmode', 'viewmode', 0);
	    if ($viewmode == 2) {
	        $icon = 'url-user.png';
	    }
	    else if( $viewmode == 1 ) {
	        $icon = '404-logs.png';
	    }
	    else {
	        $icon = 'url-edit.png';
	    }
		JToolBarHelper::title(JText::_('JoomSEF URL Manager'), $icon);
		
        $this->assign($this->getModel());
        $lists =& $this->get('Lists');
        
		$bar =& JToolBar::getInstance();
		
		// Actions
		$bar->appendButton('Custom', $lists['selection']);
		$bar->appendButton('Custom', $lists['actions']);
		$bar->appendButton('Custom', '<input type="button" value="'.JText::_('Proceed').'" onclick="doAction();" />');
		JToolBarHelper::divider();
		
		if ($this->viewmode != _COM_SEF_VIEWMODE_TRASH) {
            if ($this->viewmode == _COM_SEF_VIEWMODE_404) {
                // 404 log
                JToolBarHelper::addNew('create301', JText::_('Create 301'));
            }
            else {
    		    JToolBarHelper::addNew();
        		JToolBarHelper::editList();
        		JToolBarHelper::spacer();
        		JToolBarHelper::custom('showimport', 'import', '', 'Import', false);
            }
            JToolBarHelper::spacer();
		}
		JToolBarHelper::back('Back', 'index.php?option=com_sef');
		
		// Get data from the model
        $this->assignRef('items', $this->get('Data'));
        $this->assignRef('total', $this->get('Total'));
        $this->assignRef('lists', $lists);
        $this->assignRef('pagination', $this->get('Pagination'));
        
        JHTML::_('behavior.tooltip');
        
		parent::display($tpl);
	}

	function showUpdated()
	{
	    JToolBarHelper::title( JText::_('JoomSEF URLs Update'), 'url-update.png' );
	    JToolBarHelper::back('Back', 'index.php?option=com_sef');
	    
	    $this->setLayout('urlsupdated');
	    
        $total = intval(JRequest::getVar('result', 0));
	    $this->assign('success', ($total > 0));
        $this->assignRef('total', $total);
	    
	    parent::display();
	}
	
	function showGenerate()
	{
	    JToolBarHelper::title( JText::_('JoomSEF URLs Generation'), 'url-edit.png' );
	    
	    $this->setLayout('generate');
	    
	    parent::display();
	}
}