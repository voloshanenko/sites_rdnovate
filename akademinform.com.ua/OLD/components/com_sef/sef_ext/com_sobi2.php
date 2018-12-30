<?php
/**
 * SEF module for Joomla!
 *
 * @author      $Author: Vladas Freimanas $
 * @copyright   http://ewebdev.com
 * @package     JoomSEF for SOBI2
 */

// Security check to ensure this file is being included by a parent file.
if (!defined('_VALID_MOS')) die('Direct Access to this location is not allowed.');

class SefExt_com_sobi2 extends SefExt
{
    function create(&$uri) {
        $vars = $uri->getQuery(true);
        extract($vars);
		// JF translate extension.
        global $sefConfig, $database, $debug, $debug_string;
        $jfTranslate = $sefConfig->translateNames ? ', id' : '';

        $title = array();

		$title[] = 'pages';
		$title[] = '/';

		if ($sobi2Task){

			switch($sobi2Task){
				case "search":
					$title[] = "search";
					break;

				case "addNew":
					$title[] = "add-entry";
					break;

				case "sobi2Details":
					$title[] = "details";
					if ($catid){
						$sql = "SELECT name FROM #__sobi2_categories WHERE catid=".$catid." LIMIT 1";
						$database->setQuery($sql);
						$category_name = $database->loadResult();
						$title[] = $category_name;
					}
					if ($sobi2Id)
						$sql = "SELECT title FROM #__sobi2_item WHERE itemid=".$sobi2Id." LIMIT 1";
						$database->setQuery($sql);
						$item_name = $database->loadResult();
						$title[] = $item_name;
					break;
			}//switch end

		} else {
			
		//if no sibi2Task found
			if ($catid){
				//$sql = "SELECT name FROM #__sobi2_categories WHERE catid=".$catid." LIMIT 1";
				//$database->setQuery($sql);
				//$category_name = $database->loadResult();
				$title[] = "page".$catid;
			} else  {
				$title[] = "index";
			}

		}


		if (count($title) > 0) 
			$string = JoomSEF::_sefGetLocation($uri, $title, null, null, null, @$vars['lang'], $this->nonSefVars, null, $metatags);



	return $string;
	}
}
?>