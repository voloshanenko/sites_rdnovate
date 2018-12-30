<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 
/**
*
* @version $Id: english.php 1071 2007-12-03 08:42:28Z thepisu $
* @package VirtueMart
* @subpackage languages
* @copyright Copyright (C) 2004-2007 soeren - All rights reserved.
* @translator soeren
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* VirtueMart is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See /administrator/components/com_virtuemart/COPYRIGHT.php for copyright notices and details.
*
* http://virtuemart.net
*/
global $VM_LANG;
$langvars = array (
	'CHARSET' => 'utf-8',
	'VM_HELP_YOURVERSION' => 'Ваша версія {product}',
	'VM_HELP_ABOUT' => '<span style="font-weight: bold;">
		VirtueMart</span> повне безкоштовне програмне забезпечення з відкритим кодом для електронної комерції. Використовується з системами Mambo і Joomla!. 
		Дане програмне забезпечення складається з компонента й більше 8 модулів і мамботів/плагінів.
		В основі VіrtueMart лежить скрипт магазина "phpShop" (Автори: Edіkon Corp. & співтовариство <a href="http://www.phpShop.org/" target="_blank">phpShop</a>).',
	'VM_HELP_LICENSE_DESC' => 'VirtueMart поширюється по ліцензії <a href="{licenseurl}" target="_blank">{licensename} </a>.',
	'VM_HELP_TEAM' => 'Дане програмне забезпечення розробляється невеликою командою.',
	'VM_HELP_PROJECTLEADER' => 'Лідер проекту',
	'VM_HELP_HOMEPAGE' => 'Домашня сторінка',
	'VM_HELP_DONATION_DESC' => 'Будь ласка, підтримайте проект, перерахувавши невелику суму на адресу проекту VіrtueMart. Це допоможе підтримувати проект і розробляти нові функції.',
	'VM_HELP_DONATION_BUTTON_ALT' => 'Зробіть переказ, використовуючи PayPal - це швидко, безкоштовно й безпечно!'
); $VM_LANG->initModule( 'help', $langvars );
?>