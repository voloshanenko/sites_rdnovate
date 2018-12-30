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
	'PHPSHOP_ADMIN_CFG_PRICES_INCLUDE_TAX' => 'Показувати ціни, враховуючи податки?',
	'PHPSHOP_ADMIN_CFG_PRICES_INCLUDE_TAX_EXPLAIN' => 'Ввімкніть цю опцію, щоб показувати ціни з урахуванням податка. Якщо опцію вимкнено, то ціни будуть показані без податка.',
	'PHPSHOP_SHOPPER_FORM_ADDRESS_LABEL' => 'Мітка адреси',
	'PHPSHOP_SHOPPER_GROUP_LIST_LBL' => 'Списко груп покупців',
	'PHPSHOP_SHOPPER_GROUP_LIST_NAME' => 'Назва групи',
	'PHPSHOP_SHOPPER_GROUP_LIST_DESCRIPTION' => 'Опис групи',
	'PHPSHOP_SHOPPER_GROUP_FORM_LBL' => 'Форма групу покупців',
	'PHPSHOP_SHOPPER_GROUP_FORM_NAME' => 'Назва групи',
	'PHPSHOP_SHOPPER_GROUP_FORM_DESC' => 'Опис групи',
	'PHPSHOP_SHOPPER_GROUP_FORM_DISCOUNT' => 'Знижка для групи за замовчуванням (у %)',
	'PHPSHOP_SHOPPER_GROUP_FORM_DISCOUNT_TIP' => 'Додатнє значення Х означає: якщо товару не призначено ціну для цієї групи покупців, то ціна за замовчуванням зменшується на Х%. Від’ємне значення має протилежние ефект.'
); $VM_LANG->initModule( 'shopper', $langvars );
?>