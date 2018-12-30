<?php
/**
* @version $Id: sobi2.php 5462 2010-08-18 08:25:37Z Sigrid Suski $
* @package: Sigsiu Online Business Index 2 (Sobi2)
* ===================================================
* @author
* Name: Sigrid & Radek Suski, Sigsiu.NET GmbH
* Email: sobi[at]sigsiu.net
* Url: http://www.sigsiu.net
* ===================================================
* @copyright Copyright (C) 2006 - 2010 Sigsiu.NET GmbH (http://www.sigsiu.net). All rights reserved.
* @license see http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL.
* You can use, redistribute this file and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation.
*/
defined('_JEXEC') or die();

class JElementSobi2 extends JElement
{
	function fetchTooltip( $label, $description, &$node, $control_name, $name )
	{
		$opt = JRequest::getVar( 'url', array() );
		if( isset( $opt[ 'sobi2Task'] ) ) {
			return null;
		}
		$cid = JRequest::getVar( 'cid', array() );
		if( count( $cid ) && is_numeric( $cid[0] ) ) {
			$model =& JModel::getInstance( 'MenusModelItem' );
			$table =& $model->getItem();
			if( strstr( $table->get( 'link' ), 'sobi2Task' ) ) {
				return null;
			}
		}
		if( $name == 'cid' ) {
			return JText::_( 'SOBI_SELECTED_CAT' );
		}
		else {
			return parent::fetchTooltip( $label, $node->attributes( 'msg' ), $node, $control_name, $name );
		}
	}

	function fetchElement( $name, $value, &$node, $control_name )
	{
		$opt = JRequest::getVar( 'url', array() );
		if( isset( $opt[ 'sobi2Task'] ) ) {
			return null;
		}
		static $catid = 0;
		$cid = JRequest::getVar( 'cid', array() );
		if( !$catid && count( $cid ) && is_numeric( $cid[0] ) ) {
			$model =& JModel::getInstance( 'MenusModelItem' );
			$table =& $model->getItem();
			if( strstr( $table->get( 'link' ), 'sobi2Task' ) ) {
				return null;
			}
			if( strstr( $table->get( 'link' ), 'catid' ) ) {
				$catid = explode( 'catid=', $table->get( 'link' ) );
				$catid = preg_replace( '/[^0-9_]/i', '', $catid[1] );
			}
			else {
				$catid = 0;
			}
		}
		if( $name == 'cid' ) {
			return '<span id="s2cid"><input name="urlparams[catid]" id="selectedCatID" class="inputbox" type="text" size="5" readonly="readonly" value="'.$catid.'"/></span>';
		}
		$com = DS.'components'.DS.'com_sobi2';
		defined( '_SOBI_ADM_PATH' ) || define( '_SOBI_ADM_PATH', JPATH_BASE.$com );
		defined( '_SOBI_FE_PATH' ) || define( '_SOBI_FE_PATH', JPATH_SITE.$com );
		defined( '_SOBI_CMSROOT' ) || define( '_SOBI_CMSROOT', JPATH_ROOT );
		defined( '_SOBI2_ADMIN' ) || define( '_SOBI2_ADMIN', true );

		require_once( _SOBI_FE_PATH.DS.'config.class.php' );
		sobi2Config::import( 'admin.config.class', 'adm' );
		$config =& adminConfig::getInstance();

		$mainframe	= &$config->getMainframe();
		$mainframe->addCustomHeadTag( "<link href=\"{$config->liveSite}/components/com_sobi2/includes/com_sobi2.css\" rel=\"stylesheet\" type=\"text/css\" />" );
		$mainframe->addCustomHeadTag( '<style type="text/css">td.paramlist_key { vertical-align: top; padding: 5px; } td.paramlist_key span { display: block; margin-top: 4px; } div .sigsiuTree { height: 300px; overflow-y:scroll; } </style>' );
		sobi2Config::import( 'includes|html' );
		if ( !file_exists( _SOBI_ADM_PATH.DS.'languages'.DS.'admin.'.$config->sobi2Language.'.php' )) {
			$config->sobi2Language = 'english';
		}
		require_once( _SOBI_ADM_PATH.DS.'languages'.DS.'admin.'.$config->sobi2Language.'.php' );
		include_once( _SOBI_ADM_PATH.DS.'languages'.DS.'admin.default.php' );

		sobi2Config::import( 'includes|SigsiuTree|SigsiuTree' );
		$tree 		= new SigsiuTree( $config->aTreeImages );
		$href 		= 'javascript:onSelectedCat(\'{cid}\')';
		$rootHref 	= 'javascript:onSelectedCat(\'0\')';
		$tree->init( 'SigsiuTreeCats', $href, 'div', 'SigsiuTreeCats', false, null, $catid, $rootHref );
    	$onSelctedCatJs = "\n<script type='text/javascript'>" .
    					  "\n\t" .
    					  "function onSelectedCat(id) { " .
    					  "\n\t\t" .
    					  "document.getElementById('selectedCatID').value = id;" .
    					  "\n\t }" .
    					  "\n\t" .
    					  "\n</script>";
    	echo $onSelctedCatJs;
    	echo "<script type='text/javascript'>
    			function submitbutton( pressbutton ) {
    				if( document.getElementById('selectedCatID').value == 0 ) {
	    				document.getElementById('s2cid').innerHTML = '';
	    				document.getElementsByName( 'link' )[0].value = 'index.php?option=com_sobi2';
	    				document.getElementsByName( 'link' )[1].value = 'index.php?option=com_sobi2';
    				}
    				return submitform( pressbutton );
    			}
			</script>";
    	return $tree->getTree();
	}
}
?>