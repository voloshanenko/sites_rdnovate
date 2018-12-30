<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 
/**
*
* @package VirtueMart
* @subpackage languages
* @copyright Copyright (C) 2004-2008 soeren - All rights reserved.
* @translator soeren
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* VirtueMart is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distriалеed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See /administrator/components/com_virtuemart/COPYRIGHT.php для copyright notices and details.
*
* http://virtuemart.net
*/
global $VM_LANG;
$langvars = array (
	'CHARSET' => 'utf-8',
	'PHPSHOP_NO_CUSTOMER' => 'Ви не є зареєстрованим клієнтом. Будь ласка, введіть інформацію для оформлення замовлення.',
	'PHPSHOP_THANKYOU' => 'Дякуємо за Ваше замовлення.',
	'PHPSHOP_EMAIL_SENDTO' => 'Лист підтвердження було надіслано на адресу',
	'PHPSHOP_CHECKOUT_NEXT' => 'Наступний',
	'PHPSHOP_CHECKOUT_CONF_BILLINFO' => 'Контактна інформація покупця',
	'PHPSHOP_CHECKOUT_CONF_COMPANY' => 'Компанія',
	'PHPSHOP_CHECKOUT_CONF_NAME' => 'Ім’я',
	'PHPSHOP_CHECKOUT_CONF_ADDRESS' => 'Адреса',
	'PHPSHOP_CHECKOUT_CONF_EMAIL' => 'E-mail',
	'PHPSHOP_CHECKOUT_CONF_SHIPINFO' => 'Інформація про доставку',
	'PHPSHOP_CHECKOUT_CONF_SHIPINFO_COMPANY' => 'Компанія',
	'PHPSHOP_CHECKOUT_CONF_SHIPINFO_NAME' => 'Ім’я',
	'PHPSHOP_CHECKOUT_CONF_SHIPINFO_ADDRESS' => 'Адреса',
	'PHPSHOP_CHECKOUT_CONF_SHIPINFO_PHONE' => 'Телефон',
	'PHPSHOP_CHECKOUT_CONF_SHIPINFO_FAX' => 'Факс',
	'PHPSHOP_CHECKOUT_CONF_PAYINFO_METHOD' => 'Спосіб оплати',
	'PHPSHOP_CHECKOUT_CONF_PAYINFO_REQINFO' => 'необхідна інформація для оплати кредитною карткою',
	'PHPSHOP_PAYPAL_THANKYOU' => 'Дякуємо за оплату. 
         Операція пройшла успішно. Ви отримаєте підтвердження на e-mail по оплаті через PayPal. 
         Ви можете продовжити або перейти на <a href=http://www.paypal.com>www.paypal.com</a>, щоб побачити подробиці операції.',
	'PHPSHOP_PAYPAL_ERROR' => 'При обробці операції сталась помилка. Стан Вашого замовлення не може бути зміннено.',
	'PHPSHOP_THANKYOU_SUCCESS' => 'Ваше замовлення прийнято!',
	'VM_CHECKOUT_TITLE_TAG' => 'Оформлення замовлення: Крок %s з %s',
	'VM_CHECKOUT_ORDERIDNOTSET' => 'Номер замовлення (order ID) не встановлено або він пустий!',
	'VM_CHECKOUT_FAILURE' => 'Відмова',
	'VM_CHECKOUT_SUCCESS' => 'Успішно',
	'VM_CHECKOUT_PAGE_GATEWAY_EXPLAIN_1' => 'Ця сторінка розташована на сайті веб-магазину.',
	'VM_CHECKOUT_PAGE_GATEWAY_EXPLAIN_2' => 'Результати виконання запиту буде відображено на зашифрованій сторінці (SSL).',
	'VM_CHECKOUT_CCV_CODE' => 'Код перевірки кредитної картки (CCV)',
	'VM_CHECKOUT_CCV_CODE_TIPTITLE' => 'Що таке код перевірки кредитної картки (CCV)?',
	'VM_CHECKOUT_MD5_FAILED' => 'Контрольна сума MD5 не співпадає',
	'VM_CHECKOUT_ORDERNOTFOUND' => 'Замовлення не знайдено',
	'PHPSHOP_EPAY_PAYMENT_CARDTYPE' => 'Платіж 
створено %s <img
src="/components/com_virtuemart/shop_image/ps_image/epay_images/%s"
border="0">'
); $VM_LANG->initModule( 'checkout', $langvars );
?>