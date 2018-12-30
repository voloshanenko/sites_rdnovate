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
	'PHPSHOP_CARRIER_LIST_LBL' => 'Список варіантів доставки',
	'PHPSHOP_RATE_LIST_LBL' => 'Список тарифів доставки',
	'PHPSHOP_CARRIER_LIST_NAME_LBL' => 'Назва',
	'PHPSHOP_CARRIER_LIST_ORDER_LBL' => 'Порядок відображення',
	'PHPSHOP_CARRIER_FORM_LBL' => 'Додати/Змінити варіант доставки',
	'PHPSHOP_RATE_FORM_LBL' => 'Додати/Змінити тариф доставки',
	'PHPSHOP_RATE_FORM_NAME' => 'Опис тарифу доставки',
	'PHPSHOP_RATE_FORM_CARRIER' => 'Варіант доставки',
	'PHPSHOP_RATE_FORM_COUNTRY' => 'Країна',
	'PHPSHOP_RATE_FORM_ZIP_START' => 'Початок діапазону поштових індексів',
	'PHPSHOP_RATE_FORM_ZIP_END' => 'Кінець діапазону поштових індексів',
	'PHPSHOP_RATE_FORM_WEIGHT_START' => 'Мінімальна вага',
	'PHPSHOP_RATE_FORM_WEIGHT_END' => 'Максимальна вага',
	'PHPSHOP_RATE_FORM_PACKAGE_FEE' => 'Вартість упаковки',
	'PHPSHOP_RATE_FORM_CURRENCY' => 'Валюта',
	'PHPSHOP_RATE_FORM_LIST_ORDER' => 'Порядок відображення',
	'PHPSHOP_SHIPPING_RATE_LIST_CARRIER_LBL' => 'Варіант доставки',
	'PHPSHOP_SHIPPING_RATE_LIST_RATE_NAME' => 'Опис тарифа доставки',
	'PHPSHOP_SHIPPING_RATE_LIST_RATE_WSTART' => 'Вага від ...',
	'PHPSHOP_SHIPPING_RATE_LIST_RATE_WEND' => '... до',
	'PHPSHOP_CARRIER_FORM_NAME' => 'Компанія доставки',
	'PHPSHOP_CARRIER_FORM_LIST_ORDER' => 'Порядок відображення'
); $VM_LANG->initModule( 'shipping', $langvars );
?>