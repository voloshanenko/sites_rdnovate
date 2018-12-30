<?php
/**
 * Joomla! 1.5 module Latest Articles
 *
 * @version $Id: helper.php 2009-05-10 01:47:01 svn $
 * @author Maverick
 * @package modules
 * @subpackage mod_latest_articles
 * @license GNU/GPL
 *
 * This module displays the latest articles published on the site.
 */
defined('_JEXEC') or die('Direct Access to this location is not allowed.');
require_once(JPATH_SITE.DS.'components'.DS.'com_content'.DS.'helpers'.DS.'route.php');
class modLatestArticlesHelper
{
    function getItems(&$params)
    {
	    global $mainframe;
        // get a reference to the database
        $db				=& JFactory::getDBO();
        $user			=& JFactory::getUser();
		$componentused  = trim($params->get('componentused', 'com_content'));
 		$count		    = intval($params->get('count', 5));
		$menuid		    = intval($params->get('itemidmenu'), 0);
		$username		= trim($params->get('username', 'name'));		
		$adminflag		= intval($params->get('adminflag', 1));
		$frontpage		= intval($params->get('frontpage', 0));
		$sortorder		= intval($params->get('sortorder', 1));
		$incl_excl      = intval($params->get('incl_excl', '1'));
		$sec_cat_ids	= trim($params->get('sec_cat_ids', ',^,'));
		$aid	   	    = $user->get('aid', 0);
		$nullDate		= $db->getNullDate();
		
		$date =& JFactory::getDate();
		$now  = $date->toMySQL();

        $where = '';
        if(preg_match('/^[0-9\^\,]*$/', $sec_cat_ids)){
            $sec_cats = explode("^",$sec_cat_ids);
            $sections = substr($sec_cats[0], 1, strlen($sec_cats[0])-2);
            $categories = substr($sec_cats[1], 1, strlen($sec_cats[1])-2);
            $where = '';
            if(strlen($sections) > 0){
                $where = ' AND a.sectionid ' . (($incl_excl == '0')?'NOT':'') . ' IN (' . $sections . ')';
            }
            if(strlen($categories) > 0){
                $where = ' AND a.catid ' . (($incl_excl == '0')?'NOT':'') . ' IN (' . $categories . ')';
            }
        }
		$query = 'SELECT a.id, a.alias, a.title, cc.title as category, s.title as section, a.sectionid as sectionid,'.
				' u.'. $username .' as username, cc.access AS cat_access, s.access AS sec_access, cc.published AS cat_state, s.published AS sec_state,' .
				' CASE WHEN CHAR_LENGTH(a.alias) THEN CONCAT_WS(":", a.id, a.alias) ELSE a.id END as slug,'.
				' CASE WHEN CHAR_LENGTH(cc.title) THEN CONCAT_WS(":", cc.id, cc.title) ELSE cc.id END as catslug'.
				' FROM #__content AS a' .
				' LEFT JOIN #__content_frontpage AS f ON f.content_id = a.id' .
				' LEFT JOIN #__categories AS cc ON cc.id = a.catid' .
				' LEFT JOIN #__sections AS s ON s.id = a.sectionid' .
				' LEFT JOIN #__users AS u ON u.id = a.created_by' .
				' WHERE a.state > 0' . $where .
				' AND a.access <= ' .(int) $user->get('aid', 0) .
				' AND ( a.publish_up = '.$db->Quote($nullDate).' OR a.publish_up <= '.$db->Quote($now).' )' .
				' AND ( a.publish_down = '.$db->Quote($nullDate).' OR a.publish_down >= '.$db->Quote($now).' )' .
				($frontpage == '0' ? ' AND f.content_id IS NULL' : '').
				' ORDER BY a.'. ($sortorder == '0' ? 'modified' : 'created'). ' DESC';

        $db->setQuery($query ,0 , $count);
		$rows = $db->loadObjectList();
		
		$i = 0;
		$items = array();
		
		if ( $rows )
		{
			foreach ( $rows as $row )
			{
				if (($row->cat_state == 1 || $row->cat_state == '') && ($row->sec_state == 1 || $row->sec_state == '') && ($row->cat_access <= $user->get('aid', 0) || $row->cat_access == '') && ($row->sec_access <= $user->get('aid', 0) || $row->sec_access == ''))
				{
					$items[$i]->href = JRoute::_(ContentHelperRoute::getArticleRoute($row->slug, $row->catslug, $row->sectionid));
				}
				$items[$i]->title = $row->title;
				$items[$i]->category = $row->category;
				$items[$i]->section = $row->section;
				$items[$i]->author = $row->username;
				$i++;
			}
		}
        return $items;
    } //end getItems
 
} //end