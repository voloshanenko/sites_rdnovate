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
	'PHPSHOP_RB_INDIVIDUAL' => 'Звіт по окремому товару',
	'PHPSHOP_RB_SALE_TITLE' => 'Звіт про продажах', // not used?
	'PHPSHOP_RB_SALES_PAGE_TITLE' => 'Аналіз продажів', // not used?
	'PHPSHOP_RB_INTERVAL_TITLE' => 'Встановити інтервал',
	'PHPSHOP_RB_INTERVAL_MONTHLY_TITLE' => 'Щомісяця',
	'PHPSHOP_RB_INTERVAL_WEEKLY_TITLE' => 'Щотижня',
	'PHPSHOP_RB_INTERVAL_DAILY_TITLE' => 'Щодня',
	'PHPSHOP_RB_THISMONTH_BUTTON' => 'За поточний місяць',
	'PHPSHOP_RB_LASTMONTH_BUTTON' => 'За останній місяць',
	'PHPSHOP_RB_LAST60_BUTTON' => 'За останні 60 днів',
	'PHPSHOP_RB_LAST90_BUTTON' => 'За останні 90 днів',
	'PHPSHOP_RB_START_DATE_TITLE' => 'Початок',
	'PHPSHOP_RB_END_DATE_TITLE' => 'Кінець',
	'PHPSHOP_RB_SHOW_SEL_RANGE' => 'Показати обраний період',
	'PHPSHOP_RB_REPORT_FOR' => 'Звіт за ',
	'PHPSHOP_RB_DATE' => 'Дата',
	'PHPSHOP_RB_ORDERS' => 'Замовлення',
	'PHPSHOP_RB_TOTAL_ITEMS' => 'Всього продано',
	'PHPSHOP_RB_REVENUE' => 'Виторг',
	'PHPSHOP_RB_PRODLIST' => 'Список товарів'
); $VM_LANG->initModule( 'reportbasic', $langvars );
?>