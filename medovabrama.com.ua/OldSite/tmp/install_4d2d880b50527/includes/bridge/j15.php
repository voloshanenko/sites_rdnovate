<?php
/**
* @version $Id: j15.php 5462 2010-08-18 08:25:37Z Sigrid Suski $
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
defined( '_SOBI2_' ) || exit("Restricted access");
class sobi2bridge {

	function readDirectory( $path, $filter = '.', $recursiv = false, $fullpath = false )
	{
		jimport( 'joomla.filesystem.folder' );
		$files = JFolder::files( $path, $filter, $recursiv, $fullpath );
		$folders = JFolder::folders( $path, $filter, $recursiv, $fullpath );
		$dir = array_merge( $files, $folders );
		asort( $dir );
		return $dir;
	}

	function & jMenu()
	{
		sobi2Config::import( 'libraries|joomla|database|table|menu', 'root' );
		$m =& JTable::getInstance( 'menu' );
		return $m;
	}

	function & jParams( $text, $path = null )
	{
		$params = new JParameter( $text, $path );
		return $params;
	}

	/**
	 * @param sobi2Config $config
	 */
	function init( &$config )
	{
		$jConf					= new JConfig();
		$lang 					=& JFactory::getLanguage();
		$config->user			=& JFactory::getUser();
		$config->database 		=& JFactory::getDBO();
		$config->absolutePath 	= _SOBI_CMSROOT;
		$config->offset			= $jConf->offset;
		$config->sitename		= $jConf->sitename;
		$config->mailfrom		= $jConf->mailfrom;
		$config->fromname		= $jConf->fromname;
		$config->globalLang		= $lang->getBackwardLang();
		$config->secret			= $jConf->secret;
		$config->queryStart		= count( $config->database->_log );
		$config->DBprefix		= $jConf->dbprefix;
		$config->mainframe 		=& JFactory::getApplication( 'site' );
		$config->acl			=& JFactory::getACL();
		if( !file_exists( _SOBI_FE_PATH.DS.'plugins'.DS.'sobisef' ) && ( sobi2Config::request( $_REQUEST, 'option', null ) == 'com_sobi2' && !sobi2Config::request( $_REQUEST, 'no_html', 0 ) ) && $config->key( 'url', 'force_right_itemid', true ) && !defined( '_SOBI_ADM_PATH' ) ) {
			$uri	 	=& JURI::getInstance();
			$current	= $uri->getQuery();
			$cid 		= ( int ) sobi2Config::request( $_REQUEST, 'catid', 0 );
			$request	= $cid ? $cid : sobi2Config::request( $_REQUEST, 'sobi2Task', null );
			$rItemId	= $config->checkItemid( $request );
			$itemId		= /*( int ) */sobi2Config::request( $_REQUEST, 'Itemid', 0 );
			if( $rItemId != $itemId ) {
				$react = $config->key( 'url', 'on_bad_itemid', 'redirect' );
				if( $react == 'redirect' ) {
					if( strstr( $current, 'Itemid' ) ) {
						$redirect = str_replace( "Itemid={$itemId}", "Itemid={$rItemId}", $current );
					}
					else {
						$redirect = $current."&amp;Itemid={$rItemId}";
					}
					$redirect 	= html_entity_decode( JRoute::_( 'index.php?' . $redirect ) );
					if( sobi2Config::request( $_REQUEST, 'no_html', 0 ) ) {
						JRequest::setVar( 'Itemid', $rItemId );
					}
					else {
						if( headers_sent() ) {
							echo "<script>document.location.href='{$redirect}';</script>\n";
						}
						else {
							header( 'HTTP/1.1 301 Moved Permanently' );
							header( 'Location: ' . $redirect );
						}
					}
				}
				elseif ( $react == 'overwrite' ) {
					JRequest::setVar( 'Itemid', $rItemId );
				}
			}
		}
	}

	function & jUser()
	{
		$u =& JTable::getInstance( 'user' );
		return $u;
	}

	function mail( $from, $fromname, $recipient, $subject, $body, $mode = 0, $cc = null, $bcc = null, $attachment = null, $replyto = null, $replytoname = null )
	{
		return JUTility::sendMail( $from, $fromname, $recipient, $subject, $body, $mode, $cc, $bcc, $attachment, $replyto, $replytoname );
	}

	function isChmodable( $file )
	{
		jimport( 'joomla.filesystem.path' );
		return JPath::canChmod( $file );
	}

	function & jPageNav( $total, $limitstart, $limit )
	{
		jimport('joomla.html.pagination');
		$pn = new JPagination( $total, $limitstart, $limit );
		return $pn;
	}

	function writePagesLinks( &$pn )
	{
		return $pn->getPagesLinks();
	}

	function pnRowNumber( &$pn, $index )
	{
		return $index + 1 + $pn->limitstart;
	}

	function editorArea( $name, $content, $hiddenField, $width, $height, $col, $row )
	{
		jimport( 'joomla.html.editor' );
		$editor =& JFactory::getEditor();
		echo $editor->display( $hiddenField, $content, $width, $height, $col, $row );
	}

}
if( !class_exists( 'mosEmpty' ) ) {
	class mosEmpty
	{
		function def()
		{
			return 1;
		}
		function get()
		{
			return 1;
		}
	}
}
?>