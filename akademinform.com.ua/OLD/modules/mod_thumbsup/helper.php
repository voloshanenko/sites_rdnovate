<?php
/**
* @version		$Id: helper.php 10857 2008-08-30 06:41:16Z willebil $
* @package		Joomla
* @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

require_once (JPATH_SITE.DS.'components'.DS.'com_content'.DS.'helpers'.DS.'route.php');

class modThumbsUpHelper
{
	function getList(&$params)
	{
		global $mainframe;
		$catCondition ="";
		$secCondition ="";
		$dirname = "";
		$docroot = "";
		$db			=& JFactory::getDBO();
		$user		=& JFactory::getUser();
		$userId		= (int) $user->get('id');
		$count		= (int) $params->get('count', 5);
		$count_pic	= (int) $params->get('count_pic', 2);
		$limit_leading	=(int) $params->get('limit_leading',0);
		$front	= (int) $params->get('front', 0);
		$pic_width	= (int) $params->get('pic_width', 50);
		$pic_height	= (int) $params->get('pic_height', 50);
		$pic_ratio	= trim($params->get('pic_ratio', "1:1"));
		$pic_default	= trim($params->get('pic_default'));
		$css_suffix	= trim($params->get('css_suffix'));
		$color	= trim($params->get('color'));
		$catid		= trim($params->get('catid'));
		$secid		= trim($params->get('secid'));
		$catid_exc		= trim($params->get('catid_exc'));
		$secid_exc		= trim($params->get('secid_exc'));
		$intro_limit		= trim($params->get('intro_limit'));
		$show_front	= $params->get('show_front', 1);
		$aid		= $user->get('aid', 0);
		$show_intro		= (int) $params->get('show_intro');
		$show_readmore		= (int) $params->get('show_readmore');
		$show_date		= (int) $params->get('show_date');
		$show_title		= (int) $params->get('show_title');
		$show_thumb		= (int) $params->get('show_thumb');
		$show_hits		= (int) $params->get('show_hits');
		$show_author	= (int) $params->get('show_author');
		$link_title	= (int) $params->get('link_title');
		$link_thumb	= (int) $params->get('link_thumb');
		$link_intro	= (int) $params->get('link_intro');
		$imgcolumn	= (int) $params->get('imgcolumn');
		$date_format = $params->get('date_format');
		$pic_align = $params->get('pic_align');
		$pic_quality = $params->get('pic_quality');
		$img_path = trim($params->get('imgpath'));
		$disp_order = trim($params->get('disp_ordering'));
		$disp_order_custom = trim($params->get('disp_ordering_custom'));
		$period		= intval($params->get('period', 61));
		$show_most  = (int) $params->get('show_most', 0);
		$archived  = $params->get('archived', '1');
		$thumbsup_hv = $params->get('thumbsup_hv', 'v');

		$contentConfig = &JComponentHelper::getParams( 'com_content' );
		$access		= !$contentConfig->get('show_noauth');

		$nullDate	= $db->getNullDate();

		$date =& JFactory::getDate();
		$now = $date->toMySQL();
		
		if($archived=="-1") {
			$state= " a.state = '-1'";	
			print "here";
		} elseif($archived=="1") {
			$state= " a.state = 1";
			
		} else {
			$state =" a.state = 1 OR a.state = '-1'";
		}
		
		$where		= $state
			. ' AND ( a.publish_up = '.$db->Quote($nullDate).' OR a.publish_up <= '.$db->Quote($now).' )'
			. ' AND ( a.publish_down = '.$db->Quote($nullDate).' OR a.publish_down >= '.$db->Quote($now).' )'
			;

		// User Filter
		switch ($params->get( 'user_id' ))
		{
			case 'by_me':
				$where .= ' AND (created_by = ' . (int) $userId . ' OR modified_by = ' . (int) $userId . ')';
				break;
			case 'not_me':
				$where .= ' AND (created_by <> ' . (int) $userId . ' AND modified_by <> ' . (int) $userId . ')';
				break;
		}

		// Ordering
		switch ($params->get( 'ordering' )) {
			case 'rand':
				$ordering		= 'RAND()';
				break;
			case 'o_dsc':
				$ordering		= 'a.ordering DESC';
				break;
			case 'o_asc':
				$ordering		= 'a.ordering ASC';
				break;
			case 'h_dsc':
				$ordering		= 'a.hits DESC';
				break;
			case 'm_dsc':
				$ordering		= 'a.modified DESC, a.created DESC';
				break;
			case 'c_asc':
				$ordering		= 'a.created ASC';
				break;
			case 'c_dsc':
			default:
				$ordering		= 'a.created DESC';
				break;
		}
		
		if ($catid)
		{
			$ids = explode( ',', $catid );
			JArrayHelper::toInteger( $ids );
			$catCondition = ' AND (cc.id=' . implode( ' OR cc.id=', $ids ) . ')';
		}
		if ($secid)
		{
			$ids = explode( ',', $secid );
			JArrayHelper::toInteger( $ids );
			$secCondition = ' AND (s.id=' . implode( ' OR s.id=', $ids ) . ')';
		}
		
		if ($catid_exc)
		{
			$ids = explode( ',', $catid_exc );
			JArrayHelper::toInteger( $ids );
			$catCondition .= ' AND (cc.id!=' . implode( ' AND cc.id!=', $ids ) . ')';
		}
		if ($secid_exc)
		{
			$ids = explode( ',', $secid_exc );
			JArrayHelper::toInteger( $ids );
			$secCondition .= ' AND (s.id!=' . implode( ' AND s.id!=', $ids ) . ')';
		}
		
		if($limit_leading)
		$limit = " LIMIT ".$limit_leading.", ".($count-$limit_leading);
		
		if($show_most){
		
		$query = 'SELECT a.*,' .
			' CASE WHEN CHAR_LENGTH(a.alias) THEN CONCAT_WS(":", a.id, a.alias) ELSE a.id END as slug,'.
			' CASE WHEN CHAR_LENGTH(cc.alias) THEN CONCAT_WS(":", cc.id, cc.alias) ELSE cc.id END as catslug'.
			' FROM #__content AS a' .
			' LEFT JOIN #__content_frontpage AS f ON f.content_id = a.id' .
			' INNER JOIN #__categories AS cc ON cc.id = a.catid' .
			' INNER JOIN #__sections AS s ON s.id = a.sectionid' .
			' WHERE ( a.state = 1 AND s.id > 0 )' .
			' AND ( a.publish_up = '.$db->Quote($nullDate).' OR a.publish_up <= '.$db->Quote($now).' )' .
			' AND ( a.publish_down = '.$db->Quote($nullDate).' OR a.publish_down >= '.$db->Quote($now).' )'.
			' AND ((TO_DAYS(' . $db->Quote(date('Y-m-d',time()+$mainframe->getCfg('offset')*60*60 )) . ') - TO_DAYS(a.created)) <= ' . $db->Quote($period) . ')'.
			($access ? ' AND a.access <= ' .(int) $aid. ' AND cc.access <= ' .(int) $aid. ' AND s.access <= ' .(int) $aid : '').
			($catid ? $catCondition : '').
			($secid ? $secCondition : '').
			($show_front == '0' ? ' AND f.content_id IS NULL' : '').
			' AND s.published = 1' .
			' AND cc.published = 1' .
			' ORDER BY a.hits DESC';
			
		} else {
		// Content Items only
		$query = 'SELECT a.*, ' .
			' CASE WHEN CHAR_LENGTH(a.alias) THEN CONCAT_WS(":", a.id, a.alias) ELSE a.id END as slug,'.
			' CASE WHEN CHAR_LENGTH(cc.alias) THEN CONCAT_WS(":", cc.id, cc.alias) ELSE cc.id END as catslug'.
			' FROM #__content AS a' .
			($show_front == '0' ? ' LEFT JOIN #__content_frontpage AS f ON f.content_id = a.id' : '') .
			' INNER JOIN #__categories AS cc ON cc.id = a.catid' .
			' INNER JOIN #__sections AS s ON s.id = a.sectionid' .
			' WHERE '. $where .' AND s.id > 0' .
			($access ? ' AND a.access <= ' .(int) $aid. ' AND cc.access <= ' .(int) $aid. ' AND s.access <= ' .(int) $aid : '').
			($catCondition ? $catCondition : '').
			($secCondition ? $secCondition : '').
			($show_front == '0' ? ' AND f.content_id IS NULL ' : '').
			' AND s.published = 1' .
			' AND cc.published = 1' .
			' ORDER BY '. $ordering;
			
		}
		
		$db->setQuery($query, $limit_leading, $count);
	//	print $query;
		$rows = $db->loadObjectList();

		$i		= 0;
		
		$lists	= array();
		foreach ( $rows as $row )
		{
			if($row->access <= $aid)
			{
				$lists[$i]->link = JRoute::_(ContentHelperRoute::getArticleRoute($row->slug, $row->catslug, $row->sectionid));
			} else {
				$lists[$i]->link = JRoute::_('index.php?option=com_user&view=login');
			}
			$lists[$i]->title = htmlspecialchars( $row->title );
			
			//get the images
			
			$pattern = '/src=[\'"]?([^\'" >]+)[\'" >]/'; 
			$matches= '';
			$imageName='';
			$imgsmall='';
			$imgbig='';
			$matches="";
			
			preg_match_all($pattern, $row->introtext.$row->fulltext, $matches);
            
            $imageName = @basename($matches[1][0]);
            
            
            $imageName = @trim(str_replace(" ","%20",$imageName));
            
            $img_parse=@parse_url(@str_replace(" ","%20",$matches[1][0]));
          
			if($imageName=='' && $pic_default) {
				$imageName="images/stories/".$pic_default;
				$img_parse=@parse_url(@str_replace(" ","%20",$imageName));
			}
			
			if($imageName!='') {
			
			if($pic_ratio)
			$cropratio="@cropratio=".$pic_ratio;
			else
			$cropratio="";
			
			if($color)
			$color="@color=".$color;
			else
			$color="";
			
			if($pic_quality)
			$quality="@quality=".$pic_quality;
			else
			$quality="";
			
			if($pic_width)
			$width="@width=".$pic_width;
			else
			$width="";
			
			if($pic_height)
			$height="@height=".$pic_height;
			else
			$height="";
			
			if($img_path!="") $docroot="@docroot=".$img_path;
			else $docroot="";
			
			if(trim($imageName) != '' && substr(@$matches[1][0],0,4)=="http" && $img_parse["host"]!=$_SERVER["HTTP_HOST"] && !file_exists(JPATH_SITE.DS."images".DS."stories".DS.trim($imageName))) { //distant image
					
                      @copy($matches[1][0], JPATH_SITE.DS."images".DS."stories".DS.str_replace("%20","",trim($imageName)));
                      $image_path=DS."images".DS."stories".DS.str_replace("%20","",trim($imageName));
                    } elseif(substr(@$matches[1][0],0,4)=="http" && $img_parse["host"]==$_SERVER["HTTP_HOST"] && file_exists(JPATH_SITE.DS."images".DS."stories".DS.trim($imageName))) {
                 $image_path=DS."images".DS."stories".DS.str_replace("%20","",trim($imageName));
                   
                    } else {
                  
                     $image_path=trim($img_parse["path"]);
                    
                    }
                
			if(substr($image_path,0,1)!="/")
			$image_path="/".$image_path;
			
			$image="@image=".$image_path;
			
			$imgsmall="<img src=\"modules/mod_thumbsup/image.php/".$imageName."?parameters=".$width.$height.$cropratio.$color.$quality.$image.$docroot."\" alt=\"".$imageName."\" align=\"".$pic_align."\" hspace=\"10\" vspace=\"5\" />";
			//print $imgsmall;
            $imgbig="<img src=\"modules/mod_thumbsup/image.php/".$imageName."?parameters=".$width.$height.$color.$quality.$image.$docroot."\" alt=\"".$imageName."\" align=\"".$pic_align."\" hspace=10 vspace=10 />";
            }      	
            
			//delete the original images
			
			
			$row->introtext=preg_replace("/<img[^>]+\>/i", "",$row->introtext);
			
			if($intro_limit) {
			$introtext=substr(strip_tags($row->introtext),0,$intro_limit);
			$intro=explode(" ",$introtext);
			array_pop($intro);
			$introtext=implode(" ",$intro)." ";
			} else {
			$introtext=$row->introtext;
			}
			
			if($show_author){
				$query="SELECT name from #__users where id='".$row->created_by."'";
				$db->setQuery($query, 0, $count);
				$authors = $db->loadObjectList();
				foreach($authors as $auth)
				$author=$auth->name;
			}
			
			$row->fulltext=preg_replace("/<img[^>]+\>/i", "",$row->fulltext,1);
			$lists[$i]->introtext = $introtext;
			$lists[$i]->fulltext = $row->fulltext;
			$lists[$i]->created = $row->created;
			$lists[$i]->imgsmall = $imgsmall;
			$lists[$i]->imgbig = $imgbig;
			$lists[$i]->imgname = $imageName;
			$lists[$i]->count_pic = $count_pic;
			$lists[$i]->front = $front;
			$lists[$i]->color = $color;
			$lists[$i]->imgdir = $dirname;
			$lists[$i]->show_intro = $show_intro;
			$lists[$i]->show_date = $show_date;
			$lists[$i]->date_f = $date_format;
			$lists[$i]->show_hits = $show_hits;
			$lists[$i]->show_author = $show_author;
			$lists[$i]->hits = $row->hits;
			@$lists[$i]->author = $author;
			$lists[$i]->show_title = $show_title;
			$lists[$i]->show_readmore = $show_readmore;
			$lists[$i]->show_thumb = $show_thumb;
			$lists[$i]->link_thumb = $link_thumb;
			$lists[$i]->link_title = $link_title;
			$lists[$i]->link_intro = $link_intro;
			$lists[$i]->disposition = $thumbsup_hv;
			$lists[$i]->imgcolumn = $imgcolumn;
			if($disp_order=="custom")
			$lists[$i]->ordering = $disp_order_custom;
			else
			$lists[$i]->ordering = $disp_order;
			if($css_suffix) $lists[$i]->css = "-".$css_suffix;
			else $lists[$i]->css = "";
			$i++;
		}

		return $lists;
	}
}