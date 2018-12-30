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
	'PHPSHOP_USER_FORM_EMAIL' => 'е-mail',
	'PHPSHOP_SHOPPER_LIST_LBL' => 'Список покупців',
	'PHPSHOP_SHOPPER_FORM_BILLTO_LBL' => 'Контактна інформація покупця',
	'PHPSHOP_SHOPPER_FORM_USERNAME' => 'Ім’я покупця',
	'PHPSHOP_AFFILIATE_MOD' => 'Адміністрування партнерської програми',
	'PHPSHOP_AFFILIATE_LIST_LBL' => 'Список партнерів',
	'PHPSHOP_AFFILIATE_LIST_AFFILIATE_NAME' => 'Назва партнера',
	'PHPSHOP_AFFILIATE_LIST_AFFILIATE_ACTIVE' => 'Активний',
	'PHPSHOP_AFFILIATE_LIST_RATE' => 'Ставка',
	'PHPSHOP_AFFILIATE_LIST_MONTH_TOTAL' => 'Разом за місяць',
	'PHPSHOP_AFFILIATE_LIST_MONTH_COMMISSION' => 'Комісія за місяць',
	'PHPSHOP_AFFILIATE_LIST_ORDERS' => 'Список замовлень',
	'PHPSHOP_AFFILIATE_EMAIL_WHO' => 'Кому надсилати e-mail(* = Всім)',
	'PHPSHOP_AFFILIATE_EMAIL_CONTENT' => 'Ваш e-mail',
	'PHPSHOP_AFFILIATE_EMAIL_SUBJECT' => 'Тема',
	'PHPSHOP_AFFILIATE_EMAIL_STATS' => 'Включаючи поточну статистику',
	'PHPSHOP_AFFILIATE_FORM_RATE' => 'Комісійна ставка (проценти)',
	'PHPSHOP_AFFILIATE_FORM_ACTIVE' => 'Активний?',
	'VM_AFFILIATE_SHOWINGDETAILS_FOR' => 'Показати інформацію для',
	'VM_AFFILIATE_LISTORDERS' => 'Список замовлень',
	'VM_AFFILIATE_MONTH' => 'Місяць',
	'VM_AFFILIATE_CHANGEVIEW' => 'Змінити вигляд',
	'VM_AFFILIATE_ORDERSUMMARY_LBL' => 'Зведена інформація по замовленням',
	'VM_AFFILIATE_ORDERLIST_ORDERREF' => 'Замовлення щодо',
	'VM_AFFILIATE_ORDERLIST_DATEORDERED' => 'Впорядкувати по даті',
	'VM_AFFILIATE_ORDERLIST_ORDERTOTAL' => 'Замовлення разом',
	'VM_AFFILIATE_ORDERLIST_COMMISSION' => 'Комісія (ставка)',
	'VM_AFFILIATE_ORDERLIST_ORDERSTATUS' => 'Стан замовлення'
); $VM_LANG->initModule( 'affiliate', $langvars );
?>