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
	'PHPSHOP_USER_FORM_FIRST_NAME' => 'Ім’я',
	'PHPSHOP_USER_FORM_LAST_NAME' => 'Прізвище',
	'PHPSHOP_USER_FORM_MIDDLE_NAME' => 'По батькові',
	'PHPSHOP_USER_FORM_COMPANY_NAME' => 'Назва компанії',
	'PHPSHOP_USER_FORM_ADDRESS_1' => 'Адреса 1',
	'PHPSHOP_USER_FORM_ADDRESS_2' => 'Адреса 2',
	'PHPSHOP_USER_FORM_CITY' => 'Місто',
	'PHPSHOP_USER_FORM_STATE' => 'Регіон',
	'PHPSHOP_USER_FORM_ZIP' => 'Індекс',
	'PHPSHOP_USER_FORM_COUNTRY' => 'Країна',
	'PHPSHOP_USER_FORM_PHONE' => 'Телефон',
	'PHPSHOP_USER_FORM_PHONE2' => 'Мобільний телефон',
	'PHPSHOP_USER_FORM_FAX' => 'Факс',
	'PHPSHOP_ISSHIP_LIST_PUBLISH_LBL' => 'Активні',
	'PHPSHOP_ISSHIP_FORM_UPDATE_LBL' => 'Налаштувати варіант доставки',
	'PHPSHOP_STORE_FORM_FULL_IMAGE' => 'Повне зображення',
	'PHPSHOP_STORE_FORM_UPLOAD' => 'Завантажити зображення',
	'PHPSHOP_STORE_FORM_STORE_NAME' => 'Назва магазину',
	'PHPSHOP_STORE_FORM_COMPANY_NAME' => 'Назва компанії власника магазина',
	'PHPSHOP_STORE_FORM_ADDRESS_1' => 'Адреса 1',
	'PHPSHOP_STORE_FORM_ADDRESS_2' => 'Адреса 2',
	'PHPSHOP_STORE_FORM_CITY' => 'Місто',
	'PHPSHOP_STORE_FORM_STATE' => 'Регіон',
	'PHPSHOP_STORE_FORM_COUNTRY' => 'Країна',
	'PHPSHOP_STORE_FORM_ZIP' => 'Індекс',
	'PHPSHOP_STORE_FORM_CURRENCY' => 'Валюта',
	'PHPSHOP_STORE_FORM_LAST_NAME' => 'Прізвище',
	'PHPSHOP_STORE_FORM_FIRST_NAME' => 'Ім’я',
	'PHPSHOP_STORE_FORM_MIDDLE_NAME' => 'По батькові',
	'PHPSHOP_STORE_FORM_TITLE' => 'Звернення',
	'PHPSHOP_STORE_FORM_PHONE_1' => 'Телефон 1',
	'PHPSHOP_STORE_FORM_PHONE_2' => 'Телефон 2',
	'PHPSHOP_STORE_FORM_DESCRIPTION' => 'Опис',
	'PHPSHOP_PAYMENT_METHOD_LIST_LBL' => 'Список способів оплати',
	'PHPSHOP_PAYMENT_METHOD_LIST_NAME' => 'Назва',
	'PHPSHOP_PAYMENT_METHOD_LIST_CODE' => 'Код',
	'PHPSHOP_PAYMENT_METHOD_LIST_SHOPPER_GROUP' => 'Група покупців',
	'PHPSHOP_PAYMENT_METHOD_LIST_ENABLE_PROCESSOR' => 'Тип методу оплати',
	'PHPSHOP_PAYMENT_METHOD_FORM_LBL' => 'Форма методу оплати',
	'PHPSHOP_PAYMENT_METHOD_FORM_NAME' => 'Назва методу оплати',
	'PHPSHOP_PAYMENT_METHOD_FORM_SHOPPER_GROUP' => 'Група покупців',
	'PHPSHOP_PAYMENT_METHOD_FORM_DISCOUNT' => 'Знижка',
	'PHPSHOP_PAYMENT_METHOD_FORM_CODE' => 'Код',
	'PHPSHOP_PAYMENT_METHOD_FORM_LIST_ORDER' => 'Порядок відображення',
	'PHPSHOP_PAYMENT_METHOD_FORM_ENABLE_PROCESSOR' => 'Тип методу оплати',
	'PHPSHOP_PAYMENT_FORM_CC' => 'Кредитна картка',
	'PHPSHOP_PAYMENT_FORM_USE_PP' => 'Використати платіжний процесор',
	'PHPSHOP_PAYMENT_FORM_BANK_DEBIT' => 'Банківський дебет',
	'PHPSHOP_PAYMENT_FORM_AO' => 'Лише адреса / Готівка при отриманні',
	'PHPSHOP_STATISTIC_STATISTICS' => 'Статистика',
	'PHPSHOP_STATISTIC_CUSTOMERS' => 'Покупці',
	'PHPSHOP_STATISTIC_ACTIVE_PRODUCTS' => 'Активні товари',
	'PHPSHOP_STATISTIC_INACTIVE_PRODUCTS' => 'Не активні товари',
	'PHPSHOP_STATISTIC_NEW_ORDERS' => 'Нові замовлення',
	'PHPSHOP_STATISTIC_NEW_CUSTOMERS' => 'Нові покупці',
	'PHPSHOP_CREDITCARD_NAME' => 'Ім’я на кредитній картці',
	'PHPSHOP_CREDITCARD_CODE' => 'Кредитна картка - короткий код',
	'PHPSHOP_YOUR_STORE' => 'Ваш магазин',
	'PHPSHOP_CONTROL_PANEL' => 'Панель керування',
	'PHPSHOP_CHANGE_PASSKEY_FORM' => 'Показати/Змінити Пароль/Ключ транзакції',
	'PHPSHOP_TYPE_PASSWORD' => 'Будь ласка, введіть пароль користувача',
	'PHPSHOP_CURRENT_TRANSACTION_KEY' => 'Поточний ключ транзакції',
	'PHPSHOP_CHANGE_PASSKEY_SUCCESS' => 'Ключ транзакцій успішно змінено.',
	'VM_PAYMENT_CLASS_NAME' => 'Назва класу платежу',
	'VM_PAYMENT_CLASS_NAME_TIP' => 'наприклад, <strong>ps_netbanx</strong>):<br />
		за замовчуванням: ps_payment<br />
		<em>Оберіть ps_payment, якщо не впевнені що точно вимагається!</em>',
	'VM_PAYMENT_EXTRAINFO' => 'Додаткова інформація по платежу',
	'VM_PAYMENT_EXTRAINFO_TIP' => 'Відображається на сторінці підтвердження замовлення. Може бути: HTML код форми від Вашої платіжної системи, підказка клієнту тощо.',
	'VM_PAYMENT_ACCEPTED_CREDITCARDS' => 'Кредитні картки, що приймаються в нашому магазині',
	'VM_PAYMENT_METHOD_DISCOUNT_TIP' => 'Щоб перетворити знижку в доплату, використовуйте від’ємне число (Наприклад: <strong>-2.00</strong>).',
	'VM_PAYMENT_METHOD_DISCOUNT_MAX_AMOUNT' => 'Максимальний розмір знижки',
	'VM_PAYMENT_METHOD_DISCOUNT_MIN_AMOUNT' => 'Мінімальний розмір знижки',
	'VM_PAYMENT_FORM_FORMBASED' => 'HTML-форма (наприклад, для PayPal)',
	'VM_ORDER_EXPORT_MODULE_LIST_LBL' => 'Список модулів експорту',
	'VM_ORDER_EXPORT_MODULE_LIST_NAME' => 'Назва',
	'VM_ORDER_EXPORT_MODULE_LIST_DESC' => 'Опис',
	'VM_STORE_FORM_ACCEPTED_CURRENCIES' => 'Список припустимих валют',
	'VM_STORE_FORM_ACCEPTED_CURRENCIES_TIP' => 'Цей список визначає список валют, які Ви хочете використовувати в магазині. <strong>Примітка:</strong> Всі валюти, вказані тут, можуть використовуватись при оформленні замовлення! Якщо Ви цього не хочете, то оберіть валюти Вашої країни (=за замовчуванням).',
	'VM_EXPORT_MODULE_FORM_LBL' => 'Форма модуля експорту',
	'VM_EXPORT_MODULE_FORM_NAME' => 'Назва модуля експорту',
	'VM_EXPORT_MODULE_FORM_DESC' => 'Опис',
	'VM_EXPORT_CLASS_NAME' => 'Назва класу експорту',
	'VM_EXPORT_CLASS_NAME_TIP' => '(наприклад:  <strong>ps_orders_csv</strong>):<br /> за замовчуванням: ps_xmlexport<br /> <i>Лишіть поле пустим, якщо не впевнені що треба вказати!</i>',
	'VM_EXPORT_CONFIG' => 'Додаткові налаштування для експорту',
	'VM_EXPORT_CONFIG_TIP' => 'Вкажіть налаштування для користувацьких модулів експорту або вкажіть додаткові налаштування. Необхідно використовувати працюючий PHP-код.',
	'VM_SHIPPING_MODULE_LIST_NAME' => 'Назва',
	'VM_SHIPPING_MODULE_LIST_E_VERSION' => 'Версія',
	'VM_SHIPPING_MODULE_LIST_HEADER_AUTHOR' => 'Автор',
	'PHPSHOP_STORE_ADDRESS_FORMAT' => 'Формат адреси магазина',
	'PHPSHOP_STORE_ADDRESS_FORMAT_TIP' => 'Ви можете використовувати тут наступні мітки-заповнювачи',
	'PHPSHOP_STORE_DATE_FORMAT' => 'Формат дати магазину',
	'VM_PAYMENT_METHOD_ID_NOT_PROVIDED' => 'Помилка: Не вказано ідентифікатор (ID) методу оплати.',
	'VM_SHIPPING_MODULE_CONFIG_LBL' => 'Налаштування модуля доставки',
	'VM_SHIPPING_MODULE_CLASSERROR' => 'Не можу ініціювати клас {shipping_module}'
); $VM_LANG->initModule( 'store', $langvars );
?>
