<?php
/**
* @version $Id: tab.class.php 5462 2010-08-18 08:25:37Z Sigrid Suski $
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
class sobiTabs {
	var $useCookies = true;
	var $prefix = null;
	/**
	 * @param bool $useCookies
	 * @param string $cssFile
	 * @param string $prefix
	 * @return sobiTabs
	 */
	function sobiTabs( $useCookies = true, $cssFile = null, $prefix = null)
	{
		sobiTabs::loadScripts( $cssFile );
		$this->useCookies = $useCookies ? 1 : 0;
		$this->prefix = $prefix;
	}
	/**
	 * @param string $cssFile
	 */
	function loadScripts( $cssFile = null )
	{
		static $loaded = false;
		static $cssFiles = array();
		$config =& sobi2Config::getInstance();
		if(!$loaded) {
			$loaded = true;
			$config->loadScript("tabpane");
		}
		if( !$cssFile ) {
			$cssFile = "components/com_sobi2/includes/tab.webfx.css";
		}
		if(!in_array($cssFile, $cssFiles)) {
			$cssFiles[] = $cssFile;
			$config->loadCSS( $cssFile );
		}
	}
	/**
	* creates a tab pane and creates JS obj
	* @param string The Tab Pane Name
	*/
	function startPane( $id )
	{
		echo "<div class=\"tab-page{$this->prefix}\" id=\"{$id}\">";
		echo "<script type=\"text/javascript\">\n";
		echo "	var SobiTabPane{$this->prefix} = new WebFXTabPane( document.getElementById( \"{$id}\" ), {$this->useCookies} )\n";
		echo "</script>\n";
	}
	/**
	* Ends Tab Pane
	*/
	function endPane()
	{
		echo "</div>
		<script type=\"text/javascript\"> setupAllTabs();</script>";
	}
	/**
	* Creates a tab with title text and starts that tabs page
	* @param tabText - This is what is displayed on the tab
	* @param paneid - This is the parent pane to build this tab on
	*/
	function startTab( $tabText, $paneid )
	{
		echo "<div class=\"tab-page{$this->prefix}\" id=\"{$paneid}\">";
		echo "<h2 class=\"tab{$this->prefix}\">".$tabText."</h2>";
		echo "<script type=\"text/javascript\">\n";
		echo "  SobiTabPane{$this->prefix}.addTabPage( document.getElementById( \"{$paneid}\" ) );";
		echo "</script>";
	}

	/*
	* Ends a tab page
	*/
	function endTab()
	{
		echo "</div>";
	}
}
?>