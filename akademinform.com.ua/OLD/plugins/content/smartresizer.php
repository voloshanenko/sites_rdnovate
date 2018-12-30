<?php
/**
 * SmartResizer Content Plugin
 *
 * @package		Joomla
 * @subpackage	SmartResizer Content Plugin
 * @copyright Copyright (C) 2009 LoT studio. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @author igort
 *
 */

// no direct access
defined( '_JEXEC' ) or die();

jimport( 'joomla.plugin.plugin' );
require_once(dirname(__FILE__) . '/smartresizer/smartimagehandler.php');

class plgContentSmartResizer extends JPlugin
{
    function plgContentSmartResizer( &$subject, $params )
	{
		parent::__construct( $subject, $params );
	}
	
	function onPrepareContent( &$article, &$params, $limitstart )
	{
		global $mainframe;
		
		$plugin =& JPluginHelper::getPlugin('content', 'smartresizer');
    	$pluginParams = new JParameter( $plugin->params );
		$option = JRequest::getVar('option', '');
		if ($option)
			$mergeparams		=& $mainframe->getPageParameters($option);
		if (isset($mergeparams))
			$pluginParams->merge($mergeparams);
		
		$processall	= (int) $pluginParams->def( 'processall', '0');

    	// simple performance check to determine whether bot should process further
    	if ( strpos( $article->text, 'smartresize' ) === false && !$processall)
    		return true;
		if ($processall && strpos( $article->text, 'img' ) === false)
    		return true;		
    	
		if ($processall)
			$runword = "";
		else
			$runword = "smartresize";
		$regex_img = "|<[\s\v]*img[\s\v]([^>]*".$runword."[^>]*)>|Ui";
		preg_match_all( $regex_img, $article->text, $matches_img);
		$count_img = count( $matches_img[0] );

     	// plugin only processes if there are any instances of the plugin in the text
     	if ( $count_img ) {
     		$this->plgContentProcessSmartResizeImages( $article, $pluginParams, $matches_img, $count_img );
    	}
	}
	
	function plgContentProcessSmartResizeImages( &$row, &$botParams, &$matches_img, $count_img ) {
    	global $mainframe;
		
		$view		= JRequest::getCmd('view');
		$option = JRequest::getVar('option', '');

		
		$processall	= (int) $botParams->def( 'processall', '0');
		$readmorelink	= (int) $botParams->def( 'readmorelink', '1');
		$ignoreindividual = (int) $botParams->def( 'ignoreindividual', '0');
		$openstyle = (int) $botParams->def( 'openstyle', '0');
    	$thumb_ext	= $botParams->def( 'thumb_ext', '_thumb');
		
    	$thumb_width = $botParams->def( 'thumb_width', '');
    	$thumb_height = $botParams->def( 'thumb_height', '');
		if (!$thumb_width && !$thumb_height)
		 	$thumb_width = "100";
			
    	$thumb_quality = $botParams->def( 'thumb_quality', '90');
    	$compatibility = $botParams->def( 'compatibility', 'rokbox');
		

		$defthumb_medium_width =  (int) $botParams->def( 'thumb_medium_width', '');
		$defthumb_medium_height = (int) $botParams->def( 'thumb_medium_height', '');
		
		if (!$defthumb_medium_width && !$defthumb_medium_height)
			$defthumb_medium_width = 250;
			
		$defthumb_other_width =  (int) $botParams->def( 'thumb_other_width', '');
		$defthumb_other_height = (int) $botParams->def( 'thumb_other_height', '');
		
		if (!$defthumb_other_width && !$defthumb_other_height)
			$defthumb_other_width = 250;
			

    	$improve_thumbnails = false; // Auto Contrast, Unsharp Mask, Desaturate,  White Balance
    	$thumb_quality = $thumb_quality;
		
		if ($option == 'com_content') {
			if ($view == 'article' || !isset($row->slug)) {
		    	$athwidth = $defthumb_medium_width;
		    	$athheight = $defthumb_medium_height;
				$aththumb_ext = $thumb_ext.'_medium';
			
				$is_blog = 0;
			}
			else {
		    	$athwidth = $thumb_width;
		    	$athheight = $thumb_height;
				$aththumb_ext = $thumb_ext;
				$is_blog = 1;
			}
		} else {
	    	$athwidth = $defthumb_other_width;
	    	$athheight = $defthumb_other_height;
			$aththumb_ext = $thumb_ext.'_other';
		
			$is_blog = 0;
		}
		
		for ( $i=0; $i < $count_img; $i++ )
		{
			if (strpos( $matches_img[0][$i], 'nosmartresize' ))
	    		continue;		

    	    if (@$matches_img[1][$i]) {
        		$inline_params = $matches_img[1][$i];

        		$awidth = array();

        		preg_match( "#width=\"(.*?)\"#s", $inline_params, $awidth );
        		if (isset($awidth[1])) $individ_width = trim($awidth[1]);
				  else $individ_width="";
				
        		$aheight = array();
        		preg_match( "#height=\"(.*?)\"#s", $inline_params, $aheight );
        		if (isset($aheight[1])) $individ_height = trim($aheight[1]);
				  else $individ_height="";
				
        		$src = array();
        		preg_match( "#src=\"(.*?)\"#s", $inline_params, $src );
        		if (isset($src[1])) $src = trim($src[1]);
				  else $src = "";

        		$thetitle = array();
        		preg_match( "#title=\"(.*?)\"#s", $inline_params, $thetitle );
        		if (isset($thetitle[1])) $thetitle = trim($thetitle[1]);
				  else $thetitle = "";
				  
        		$alt = array();
        		preg_match( "#alt=\"(.*?)\"#s", $inline_params, $alt );
        		if (isset($alt[1])) $alt = trim($alt[1]);
				  else $alt = "";
				
				//if (stristr($src,"http://"))
				//	continue;
				$link = $src;
				
				// Prevent thumbs of thumbs
				if ( strpos( $link, $thumb_ext ) )	  
					continue;

				//Check remote pic or local					
				$onsite=1;
				$tmp = @glob(trim($link));
				$urlbase = str_replace('www.','',strtolower( JURI::base() ));
				$searchlink = str_replace('www.','',strtolower( $link ));
				
				if (count($tmp) < 1) {
					if (strpos($searchlink,$urlbase ) === false ) {
						$onsite=0;
						// if remote url then ignore image
						continue;
					}
				}

				if (!$is_blog && (!$ignoreindividual || strpos( $matches_img[0][$i], 'smartresizeindividual' ) ) ) { // this is article or other
					if ($individ_width || $individ_height) {
				    	$athwidth = $individ_width;
				    	$athheight = $individ_height;
					}
				}
				
				$thumbprefix = $athwidth . '_' . $athheight;
				$calcthumb_width = (int)$athwidth;
				$calcthumb_height = (int)$athheight;
				
				list($image_width,$image_height)=getimagesize($link);
				
	        	$extension = substr($link,strrpos($link,"."));
					
				$isimage = ($extension == '.jpg' || $extension == '.jpeg' || $extension == '.png' || $extension == '.gif' ||
					    $extension == '.JPG' || $extension == '.JPEG' || $extension == '.PNG' || $extension == '.GIF');
				if (!$isimage || $image_width==0 || $image_height==0)
					  continue;

				$thesize = "[" . $image_width . " " . $image_height . "]";
				if ($calcthumb_width  && !$calcthumb_height) {
					$calcthumb_height = round($calcthumb_width * ($image_height/$image_width));
				} else
				if (!$calcthumb_width  && $calcthumb_height) {
					$calcthumb_width = round($calcthumb_height * ($image_width/$image_height));
				}
				
				$text = '';
				
				if ( strpos( $link, $aththumb_ext ) === false && ($image_width > $calcthumb_width && $image_height > $calcthumb_height) ) {
				
					$uri =& JURI::getInstance($link);
					$relpath = $uri->toString(array('path'));
					$image_name = substr($relpath,0,strrpos($relpath, "."));
		        	$just_name = substr($image_name,strrpos($image_name,DS));
		        	
					if ($onsite) {
						$full_path = JPATH_ROOT . DS . $relpath;
						$thumb_path = JPATH_ROOT . DS . $image_name . $aththumb_ext . $thumbprefix . $extension;
						$thethumb = JURI::base() . $image_name .  $aththumb_ext . $thumbprefix . $extension;
					} else {
			        	$full_path = $link;
			        	$thumb_path = JPATH_ROOT . DS . 'images'  . DS . 'stories' . DS .  $just_name . $aththumb_ext . $thumbprefix . $extension;
						$thethumb = JURI::base() . 'images'  . DS . 'stories' . DS .  $just_name . $aththumb_ext . $thumbprefix . $extension;
					}
//echo $full_path. ' : '. $thumb_path . ' : '. $thethumb;
					
					$thesize = "[" . $image_width . " " . $image_height . "]";

					if (!file_exists($thumb_path)) {
		        		$rd = new smartimgRedim(false, $improve_thumbnails, JPATH_CACHE);
		        		$rd->loadImage($full_path);
		        		$rd->redimToSize($calcthumb_width, $calcthumb_height, true);
		        		$rd->saveImage($thumb_path, $thumb_quality);
					}
//echo $link. ' : '.$matches_img[0][$i];
					$text = str_replace($link, $thethumb, $matches_img[0][$i]);
//echo $text;
					//$text = str_replace("smartresize", "nosmartresize", $text);
					$text = preg_replace( "#width=\".*?\"#s", "", $text );
					$text = preg_replace( "#height=\".*?\"#s", "", $text );
					if ($alt && $thetitle) $thetitle = $thetitle . ' :: '. $alt;
						else if ($alt) $thetitle = $alt;

					if (!$is_blog) {
						if ($openstyle == 1) {
							$doc =& JFactory::getDocument();
							$doc->addScript( "plugins/content/smartresizer/js/multithumb.js" );
							if (!stristr($link,"http://")) 
								$link = JURI::base().$link;
							$text = '<a target="_self" href="#" onclick = "smartthumbWindow(\''.$link.'\',\''.$alt.'\','.$image_width.','.$image_height.',0,0);" title="' . $thetitle . '">'.$text.'</a>';
						}
						else
							$text = '<a target="_blank" href="' . $link . '" rel="' . $compatibility . $thesize . '" title="' . $thetitle . '">'.$text.'</a>';
					}
					else if ($readmorelink) {
 						$link = JRoute::_(ContentHelperRoute::getArticleRoute($row->slug, $row->catslug, $row->sectionid));
						$text = '<a href="' . $link . '" title="' . $thetitle . '">'.$text.'</a>';
			
					}
					$row->text = str_replace( $matches_img[0][$i], $text, $row->text );
				}
			}
		}
    }
}

?>