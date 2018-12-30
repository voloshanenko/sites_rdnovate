<?php
/**
* @version $Id: syscheck.english.php 5073 2009-04-29 10:28:30Z Sigrid Suski $
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
define('_SOBI2SC_STATE_0', '<span style="color: rgb(255, 0, 0); font-weight: bold;">Unknown</span>');
define('_SOBI2SC_STATE_1', '<span style="font-weight: bold; color: rgb(51, 204, 0);">Perfect</span>');
define('_SOBI2SC_STATE_2', '<span style="font-weight: bold; color: rgb(0, 153, 0);">OK</span>');
define('_SOBI2SC_STATE_3', '<span style="color: rgb(153, 153, 0); font-weight: bold;">Should be OK</span>');
define('_SOBI2SC_STATE_4', '<span style="color: rgb(255, 204, 51); font-weight: bold;">May cause problems</span>');
define('_SOBI2SC_STATE_5', '<span style="color: rgb(255, 0, 0); font-weight: bold;"><b>Not acceptable</b></span>');
define('_SOBI2SC_STATE_6', '<span style="color: rgb(255, 0, 0);">Should work but the folder is writable for <b>ALL</b><br/>Possible <b>security risk</b></span>');
define('_SOBI2SC_STATE_7', '<span style="color: rgb(255, 0, 0);">Should work but the file is writable for <b>ALL</b><br/>Possible <b>security risk</b></span>');
define('_SOBI2SC_HEADER_SUBJECT', 'Setting');
define('_SOBI2SC_HEADER_STATE', 'State');
define('_SOBI2SC_HEADER_STATE_OK', 'State OK?');
define('_SOBI2SC_PHPVER_IS', 'PHP Version:');
define('_SOBI2SC_APACHE_IS', 'Apache Version:');
define('_SOBI2SC_MYSQL_IS', 'MySQL Version:');
define('_SOBI2SC_MEMLIM_IS', 'PHP Memory Limit:');
define('_SOBI2SC_TIMELIM_IS', 'PHP Script Execution Time:');
define('_SOBI2SC_SM_IS', 'PHP Safe Mode:');
define('_SOBI2SC_RG_IS', 'PHP Register Globals:');
define('_SOBI2SC_ERG_IS', 'CMS RG Emulation:');
define('_SOBI2SC_GD_IS', 'GD Library:');
define('_SOBI2SC_IM_IS', 'iconv/mbstring Library:');
define('_SOBI2SC_CHARSET_IS', 'Charset:');
define('_SOBI2SC_DBCOL_IS', 'Database Collation:');
define('_SOBI2SC_FILES_PERMS', 'Folder and File Permissions');
define('_SOBI2SC_FILENAME', 'Folder or File Name');
define('_SOBI2SC_FILE_W', 'Writable');
define('_SOBI2SC_FILE_O', 'Owner');
define('_SOBI2SC_FILE_G', 'Group');
define('_SOBI2SC_CMS_IS', 'CMS:');
define('_SOBI2SC_AT_IS', 'Admin Template:');
define('_SOBI2SC_CHAT_IS', 'The workaround to include custom head tags from components seems to be missing in this admin template. Sobi2 Admin Panel will probably not work properly.');
define('_SOBI2SC_WARNING', 'Warning');
define('_SOBI2SC_TEMPLATE_CHECK', 'Default Template Check:');
define('_SOBI2SC_JS_CONF', 'This template includes several JavaScripts which may conflict with the MooTools library. The Sobi2 search function may not work properly.');
define('_SOBI2SC_GET_FILE', 'Download System Check Log File');
?>