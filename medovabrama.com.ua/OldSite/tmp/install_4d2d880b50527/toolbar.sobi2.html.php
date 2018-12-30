<?php
/**
* @version $Id: toolbar.sobi2.html.php 5462 2010-08-18 08:25:37Z Sigrid Suski $
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
require_once(_SOBI_ADM_PATH.DS.'admtoolbar.class.php' );
/**
* @package Joomla
* @subpackage Sobi2
*/
class TOOLBAR_SOBI {
	function _LISTING() {
		$catId = (int) sobi2Config::request($_REQUEST, "catid", 0);
		sobiAdmToolbar::startTable();
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'edit', 'edit.png', 'edit.png', _SOBI2_TOOLBAR_EDIT, true );
		if($catId != -1) {
			sobiAdmToolbar::spacer();
			sobiAdmToolbar::custom( 'remove', 'remove.png', 'remove.png', _SOBI2_TOOLBAR_REMOVE, true );
		}
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'delete', 'trash.png', 'trash.png', _SOBI2_TOOLBAR_DEL, true );
		sobiAdmToolbar::spacer();
		if($catId != -1) {
			sobiAdmToolbar::custom( 'move', 'move.png', 'move.png', _SOBI2_TOOLBAR_MOVE, true );
			sobiAdmToolbar::spacer();
			sobiAdmToolbar::custom( 'copy', 'copy.png', 'copy.png', _SOBI2_TOOLBAR_COPY, true );
			sobiAdmToolbar::spacer();
		}
		sobiAdmToolbar::custom( 'publish', 'publish.png', 'publish.png', _SOBI2_TOOLBAR_PUBLISH, true );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'unpublish', 'unpublish.png', 'unpublish.png', _SOBI2_TOOLBAR_UNPUBLISH, true );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'approve', 'approve.png', 'approve.png', _SOBI2_TOOLBAR_APPROVE, true );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'unapprove', 'unapprove.png', 'unapprove.png', _SOBI2_TOOLBAR_UNAPPROVE, true );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'recount', 'recount.png', 'recount.png', _SOBI2_TOOLBAR_RECOUNT_CATS, false );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::endTable();
	}
	function _FIELDS()
	{
		sobiAdmToolbar::startTable();
		sobiAdmToolbar::custom( 'addField', 'new.png', 'new.png', _SOBI2_TOOLBAR_ADD_NEW_FIELD, false );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'editField', 'edit.png', 'edit.png', _SOBI2_TOOLBAR_EDIT, true );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'deleteField', 'trash.png', 'trash.png', _SOBI2_TOOLBAR_DEL, true );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::endTable();
	}
	function _MOVING()
	{
		sobiAdmToolbar::startTable();
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'move', 'save.png', 'save.png', _SOBI2_SAVE, false );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'cancel', 'close.png', 'close.png', _SOBI2_CANCEL, false );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::endTable();
	}
	function _APPROVE() {
		sobiAdmToolbar::startTable();
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'edit', 'edit.png', 'edit.png', _SOBI2_TOOLBAR_EDIT, true );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'delete', 'trash.png', 'trash.png', _SOBI2_TOOLBAR_DEL, true );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'publish', 'publish.png', 'publish.png', _SOBI2_TOOLBAR_PUBLISH, true );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'unpublish', 'unpublish.png', 'unpublish.png', _SOBI2_TOOLBAR_UNPUBLISH, true );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'approve', 'approve.png', 'approve.png', _SOBI2_TOOLBAR_APPROVE, true );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'unapprove', 'unapprove.png', 'unapprove.png', _SOBI2_TOOLBAR_UNAPPROVE, true );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::endTable();
	}
	function _COPY()
	{
		sobiAdmToolbar::startTable();
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'copy', 'save.png', 'save.png', _SOBI2_SAVE, false );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'cancel', 'close.png', 'close.png', _SOBI2_CANCEL, false );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::endTable();
	}
	function _EDIT( $task )
	{
		sobiAdmToolbar::startTable();
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'save', 'save.png', 'save.png', _SOBI2_SAVE, false );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'apply', 'apply.png', 'apply.png', _SOBI2_APPLY, false );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'cancel', 'close.png', 'close.png', _SOBI2_CANCEL, false );
		sobiAdmToolbar::spacer();
		if( $task == 'edit category' ) {
			sobiAdmToolbar::spacer();
			sobiAdmToolbar::media_manager();
			sobiAdmToolbar::spacer();
		}
		sobiAdmToolbar::endTable();
	}
	function _ADDCATS()
	{
		sobiAdmToolbar::startTable();
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'saveCats', 'save.png', 'save.png', _SOBI2_SAVE, false );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'cancel', 'close.png', 'close.png', _SOBI2_CANCEL, false );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::endTable();
	}
	function _CONFIG( $task )
	{
		sobiAdmToolbar::startTable();
		sobiAdmToolbar::spacer();
		if($task != 'emails') {
			sobiAdmToolbar::custom( 'saveConfig', 'save.png', 'save.png', _SOBI2_SAVE, false );
		}
		sobiAdmToolbar::spacer();
		if($task == 'genConf') {
			sobiAdmToolbar::spacer();
			sobiAdmToolbar::custom( 'emptyCache', 'refresh.png', 'refresh.png', _SOBI2_CONFIG_CACHE_EMPTY, false );
			sobiAdmToolbar::spacer();
			sobiAdmToolbar::custom( 'recount', 'recount.png', 'recount.png', _SOBI2_TOOLBAR_RECOUNT_CATS, false );
			sobiAdmToolbar::spacer();
		}
		sobiAdmToolbar::endTable();
	}
	function _PLUGINS() {
		sobiAdmToolbar::startTable();
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::custom( 'savePluginConfig', 'save.png', 'save.png', _SOBI2_SAVE, false );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::endTable();
	}
	function _PLUGINSMANAGER() {
		sobiAdmToolbar::startTable();
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::deleteList( '', 'removePlugin', _SOBI2_TOOLBAR_REMOVE );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::endTable();
	}
	function _LANGMAN( $task ) {
		sobiAdmToolbar::startTable();
		$task = $task == 'templates' ? 'removeTpl' :  'removeLang';
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::deleteList( '', $task, _SOBI2_TOOLBAR_REMOVE );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::endTable();
	}
	function _UNINSTALL() {
		sobiAdmToolbar::startTable();
		sobiAdmToolbar::cancel();
		sobiAdmToolbar::endTable();
	}
	function _ERRORLOGFLE() {
		$file = _SOBI_ADM_PATH.DS."error_logfile.txt";
		sobiAdmToolbar::startTable();
		if( is_file( $file ) ) {
			sobiAdmToolbar::custom( 'deletelogfile', 'trash.png', 'trash.png', _SOBI2_ERRLOG_FILE_DELETE,false );
			sobiAdmToolbar::spacer();
			sobiAdmToolbar::custom( 'getlogfile', 'upload.png', 'upload.png', _SOBI2_ERRLOG_FILE_DOWNLOAD,false );
		}
		sobiAdmToolbar::custom( 'syscheck', 'monitor1.png', 'monitor1.png', _SOBI2_TOOLBAR_GEN_DEB_REP, false );
		sobiAdmToolbar::spacer();
		sobiAdmToolbar::endTable();
	}
}
?>