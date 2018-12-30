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
	'PHPSHOP_VENDOR_LIST_LBL' => 'Список продавців',
	'PHPSHOP_VENDOR_LIST_ADMIN' => 'Налаштування',
	'PHPSHOP_VENDOR_FORM_LBL' => 'Додати інформацію',
	'PHPSHOP_VENDOR_FORM_CONTACT_LBL' => 'Контактна інформація',
	'PHPSHOP_VENDOR_FORM_FULL_IMAGE' => 'Повне зображення',
	'PHPSHOP_VENDOR_FORM_UPLOAD' => 'Завантажити зображення',
	'PHPSHOP_VENDOR_FORM_STORE_NAME' => 'Назва магазину продавця',
	'PHPSHOP_VENDOR_FORM_COMPANY_NAME' => 'Назва компанії продавця',
	'PHPSHOP_VENDOR_FORM_ADDRESS_1' => 'Адреса 1',
	'PHPSHOP_VENDOR_FORM_ADDRESS_2' => 'Адреса 2',
	'PHPSHOP_VENDOR_FORM_CITY' => 'Місто',
	'PHPSHOP_VENDOR_FORM_STATE' => 'Регіон',
	'PHPSHOP_VENDOR_FORM_COUNTRY' => 'Країна',
	'PHPSHOP_VENDOR_FORM_ZIP' => 'Індекс',
	'PHPSHOP_VENDOR_FORM_PHONE' => 'Телефон',
	'PHPSHOP_VENDOR_FORM_CURRENCY' => 'Валюта',
	'PHPSHOP_VENDOR_FORM_CATEGORY' => 'Категорія продавця',
	'PHPSHOP_VENDOR_FORM_LAST_NAME' => 'Прізвище',
	'PHPSHOP_VENDOR_FORM_FIRST_NAME' => 'Ім’я',
	'PHPSHOP_VENDOR_FORM_MIDDLE_NAME' => 'По батькові',
	'PHPSHOP_VENDOR_FORM_TITLE' => 'Заголовок',
	'PHPSHOP_VENDOR_FORM_PHONE_1' => 'Телефон 1',
	'PHPSHOP_VENDOR_FORM_PHONE_2' => 'Телефон 2',
	'PHPSHOP_VENDOR_FORM_FAX' => 'Факс',
	'PHPSHOP_VENDOR_FORM_EMAIL' => 'E-mail',
	'PHPSHOP_VENDOR_FORM_IMAGE_PATH' => 'Шлях до зображення',
	'PHPSHOP_VENDOR_FORM_DESCRIPTION' => 'Опис',
	'PHPSHOP_VENDOR_CAT_LIST_LBL' => 'Список категорій продавців',
	'PHPSHOP_VENDOR_CAT_NAME' => 'Назва категорії',
	'PHPSHOP_VENDOR_CAT_DESCRIPTION' => 'Опис категорії',
	'PHPSHOP_VENDOR_CAT_VENDORS' => 'Продавці',
	'PHPSHOP_VENDOR_CAT_FORM_LBL' => 'Форма категорії продавців',
	'PHPSHOP_VENDOR_CAT_FORM_INFO_LBL' => 'Інформація про категорію',
	'PHPSHOP_VENDOR_CAT_FORM_NAME' => 'Назва категорії',
	'PHPSHOP_VENDOR_CAT_FORM_DESCRIPTION' => 'Опис категорії'
); $VM_LANG->initModule( 'vendor', $langvars );
?>