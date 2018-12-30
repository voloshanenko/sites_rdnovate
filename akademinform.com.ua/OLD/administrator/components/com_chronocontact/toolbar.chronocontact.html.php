<?php
/*
/**
* CHRONOFORMS version 3.0 stable
* Copyright (c) 2006 Chrono_Man, ChronoEngine.com. All rights reserved.
* Author: Chrono_Man (ChronoEngine.com)
* @license		GNU/GPL
* Visit http://www.ChronoEngine.com for regular update and information.
**/

/* ensure that this file is called from another file */
defined('_JEXEC') or die('Restricted access'); 
class menuChronoContact {
	function MENU_Default() {
		JToolBarHelper::title( JText::_( 'Forms Manager' ));
		JToolBarHelper::publishList();
		JToolBarHelper::unpublishList();
		//JToolBarHelper::divider();
		JToolBarHelper::addNew();
		JToolBarHelper::custom($task = 'copy', $icon = 'copy_f2.png', $iconOver = 'copy_f2.png', $alt = 'Copy form', $listSelect = true) ;
		JToolBarHelper::editList();
		JToolBarHelper::deleteList();
		JToolBarHelper::divider();
		JToolBarHelper::custom($task = 'transform', $icon = 'transform.png', $iconOver = 'transform.png', $alt = 'Transform Form', $listSelect = true) ;
		JToolBarHelper::custom($task = 'wizardedit', $icon = 'wizardedit.png', $iconOver = 'wizardedit.png', $alt = 'Wizard Edit', $listSelect = true) ;
		JToolBarHelper::divider();
		//JToolBarHelper::custom($task = 'adminview', $icon = 'person2_f2.png', $iconOver = 'person2_f2.png', $alt = 'Admin View', $listSelect = true) ;
		//JToolBarHelper::custom($task = 'show', $icon = 'extensions_f2.png', $iconOver = 'extensions_f2.png', $alt = 'Show Data', $listSelect = true) ;
		JToolBarHelper::custom($task = 'createtable', $icon = 'properties_f2.png', $iconOver = 'properties_f2.png', $alt = 'Create table', $listSelect = true) ;
		JToolBarHelper::custom($task = 'tablemanager', $icon = 'properties_f2.png', $iconOver = 'properties_f2.png', $alt = 'Tables Manager', $listSelect = false) ;
		//JToolBarHelper::deleteList('','deletetable','Remove Table');
		JToolBarHelper::custom($task = 'backup', $icon = 'downloads_f2.png', $iconOver = 'downloads_f2.png', $alt = 'Backup Form', $listSelect = true) ;
		JToolBarHelper::custom($task = 'backupall', $icon = 'downloads_f2.png', $iconOver = 'downloads_f2.png', $alt = 'Backup Forms', $listSelect = false) ;
		JToolBarHelper::custom($task = 'restore1', $icon = 'restore_f2.png', $iconOver = 'restore_f2.png', $alt = 'Restore Form(s)', $listSelect = false) ;
		JToolBarHelper::divider();
		JToolBarHelper::preferences('com_chronocontact', '500' , '750');
		JToolBarHelper::home();		
	}
	function MENU_Edit() {
		
		JToolBarHelper::save();
		JToolBarHelper::apply('applychanges', "Apply");
		JToolBarHelper::cancel();
		JToolBarHelper::spacer();
		JToolBarHelper::home();
		
	}
	function MENU_Show() {
		
		JToolBarHelper::cancel('cancelview', "Cancel");
		JToolBarHelper::home();
		
	}
	function MENU_Show2() {
		
		JToolBarHelper::cancel('cancel', "Cancel");
		//JToolBarHelper::editList('editdata','Edit Data');
		JToolBarHelper::spacer();
		JToolBarHelper::deleteList('','deleterecord','Delete');
		//JToolBarHelper::spacer();
		JToolBarHelper::spacer();
		JToolBarHelper::custom($task = 'backexcel', $icon = 'downloads_f2.png', $iconOver = 'downloads_f2.png', $alt = 'Backup to Excel', $listSelect = false) ;
		JToolBarHelper::custom($task = 'backcsv', $icon = 'downloads_f2.png', $iconOver = 'downloads_f2.png', $alt = 'Backup to CSV', $listSelect = false) ;
		JToolBarHelper::home();
		
	}
	function CONFIG_MENU() {
		
		JToolBarHelper::save('saveconfig', "Save");
		JToolBarHelper::spacer();
		JToolBarHelper::cancel('cancelconfig', "Cancel");
		JToolBarHelper::home();
		
	}
	function MENU_Cancel() {
		
		JToolBarHelper::cancel();
		JToolBarHelper::spacer();
		JToolBarHelper::home();
		
	}
	function CREATE_MENU() {
		
		JToolBarHelper::save('menu_save', "Create");
		JToolBarHelper::home();
		
	}
	function DELETE_MENU() {
		
		JToolBarHelper::deleteList('','menu_delete', "Delete");
		JToolBarHelper::home();
		
	}
	function MENU_Plugins_2() {
		JToolBarHelper::save('save_conf', "Save");
		JToolBarHelper::spacer();
		JToolBarHelper::cancel();
		JToolBarHelper::home();
	}
	function MENU_Plugins() {
		$directory = JPATH_SITE.'/components/com_chronocontact/plugins/';
		$results = array();
		$handler = opendir($directory);
		while ($file = readdir($handler)) {
			if ( $file != '.' && $file != '..' && substr($file, -4) == '.php' && substr($file, 0, 3) == 'cf_')
				$results[] = str_replace(".php","", $file);
		}
		closedir($handler);
		foreach($results as $result){
			require_once(JPATH_SITE."/components/com_chronocontact/plugins/".$result.".php");
			${$result} = new $result();
			JToolBarHelper::custom($task = 'plugin_'.$result, $icon = 'extensions_f2.png', $iconOver = 'extensions_f2.png', $alt = ${$result}->result_TITLE, $listSelect = true) ;
			
		}
		JToolBarHelper::home();
		
	}
	
	function MENU_WizardElements() {		
		JToolBarHelper::addNew('newelement', 'New');
		JToolBarHelper::editList('editelement', 'Edit');
		JToolBarHelper::deleteList('', 'deleteelement', 'Remove');		
		JToolBarHelper::home();
	}
	function MENU_EditElements() {
		JToolBarHelper::save('saveelement', 'Save');
		JToolBarHelper::apply('applyelement', 'Apply');
		JToolBarHelper::cancel('cancelelement', 'Cancel');		
		JToolBarHelper::home();
	}
}
?>