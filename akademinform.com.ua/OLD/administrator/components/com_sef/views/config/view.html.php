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

class SEFViewConfig extends JView
{

	function display($tpl = null)
	{
		JToolBarHelper::title( JText::_('JoomSEF Configuration'), 'config.png' );
		
		JToolBarHelper::save();
		JToolBarHelper::apply();
		JToolBarHelper::spacer();
		JToolBarHelper::cancel();
		
		// Get data from the model
		$lists = & $this->get('Lists');

		$this->assignRef('lists', $lists);
		
		// Which tab to show?
		$i = SEFTools::JoomFishInstalled() ? 1 : 0;
		$tabs = array('basic' => 0, 'advanced' => 1, 'cache' => 2, 'metas' => 3, 'seo' => 4, 'sitemap' => 5, '404' => ($i + 6), 'registration' => ($i + 7));
		if ($i > 0) {
			$tabs['joomfish'] = 6;
		}
		$tab = JRequest::getVar('tab', 'basic');
		
		if (isset($tabs[$tab])) {
			$this->assign('tab', $tabs[$tab]);
		}
		else {
			$this->assign('tab', 0);
		}
		
		JHTML::_('behavior.tooltip');

		parent::display($tpl);
	}

}
?>