<?php
/**
 * User SEF extension for Joomla!
 *
 * @author      $Author: David Jozefov $
 * @copyright   ARTIO s.r.o., http://www.artio.cz
 * @package     JoomSEF
 * @license     GNU/GPLv3 http://www.gnu.org/copyleft/gpl.html
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access.');

class SefExt_com_user extends SefExt
{
    function getNonSefVars(&$uri)
    {
        $this->_createNonSefVars($uri);
        
        return array($this->nonSefVars, $this->ignoreVars);
    }
    
    function _createNonSefVars(&$uri)
    {
        if (isset($this->nonSefVars) && isset($this->ignoreVars))
            return;
            
        $this->nonSefVars = array();
        $this->ignoreVars = array();
        
        if (!is_null($uri->getVar('return')))
            $this->nonSefVars['return'] = $uri->getVar('return');
    }
    
    function create(&$uri)
    {
        $vars = $uri->getQuery(true);
        extract($vars);
        
        $title = array();
        $title[] = JoomSEF::_getMenuTitle(@$option, null, @$Itemid);

        if (isset($task)) {
            if ($task == 'register') {
                $title[] = JText::_('Register');
                unset($task);
            }
        }
        
        if (!empty($view)) {
            $title[] = JText::_($view);
        }
        
        if (!empty($layout)) {
            $title[] = JText::_($layout);
        }
        
        $newUri = $uri;
        if (count($title) > 0) {
            $this->_createNonSefVars($uri);
            $newUri = JoomSEF::_sefGetLocation($uri, $title, @$task, null, null, @$lang, $this->nonSefVars);
        }
        
        return $newUri;
    }

}
?>