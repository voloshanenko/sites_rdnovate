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
	'PHPSHOP_ACC_CUSTOMER_ACCOUNT' => 'Обліковий запис покупця:',
	'PHPSHOP_ACC_UPD_BILL' => 'Тут Ви можете змінити Вашу контактну інформацію.',
	'PHPSHOP_ACC_UPD_SHIP' => 'Тут Ви можете додати/змінити адресу доставки.',
	'PHPSHOP_ACC_ACCOUNT_INFO' => 'Інформація про обліковий запис',
	'PHPSHOP_ACC_SHIP_INFO' => 'Інформація про доставку',
	'PHPSHOP_DOWNLOADS_CLICK' => 'Клікніть по назві товару, щоби завантажити файл(и).',
	'PHPSHOP_DOWNLOADS_EXPIRED' => 'Ви вже завантажили файл(и) максимально припустиму кількість разів або період завантаження скінчився.'
); $VM_LANG->initModule( 'account', $langvars );
?>