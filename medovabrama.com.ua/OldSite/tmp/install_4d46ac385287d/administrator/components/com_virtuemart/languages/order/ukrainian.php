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
	'PHPSHOP_ORDER_PRINT_PAYMENT_LOG_LBL' => 'Журнал платежів',
	'PHPSHOP_ORDER_PRINT_SHIPPING_PRICE_LBL' => 'Вартість доставки',
	'PHPSHOP_ORDER_STATUS_LIST_CODE' => 'Код стану замовлення',
	'PHPSHOP_ORDER_STATUS_LIST_NAME' => 'Назва стану замовлення',
	'PHPSHOP_ORDER_STATUS_FORM_LBL' => 'Стан замовлення',
	'PHPSHOP_ORDER_STATUS_FORM_CODE' => 'Код стану замовлення',
	'PHPSHOP_ORDER_STATUS_FORM_NAME' => 'Назва стану замовлення',
	'PHPSHOP_ORDER_STATUS_FORM_LIST_ORDER' => 'Впорядкування списку',
	'PHPSHOP_COMMENT' => 'Коментар',
	'PHPSHOP_ORDER_LIST_NOTIFY' => 'Повідомити покупця?',
	'PHPSHOP_ORDER_LIST_NOTIFY_ERR' => 'Будь ласка, спочатку змініть стан замовлення!',
	'PHPSHOP_ORDER_HISTORY_INCLUDE_COMMENT' => 'Включити цей комментар?',
	'PHPSHOP_ORDER_HISTORY_DATE_ADDED' => 'Дату додано',
	'PHPSHOP_ORDER_HISTORY_CUSTOMER_NOTIFIED' => 'Покупець повідомлений?',
	'PHPSHOP_ORDER_STATUS_CHANGE' => 'Зміна стану замовлення',
	'PHPSHOP_ORDER_LIST_PRINT_LABEL' => 'Друкувати етикетку',
	'PHPSHOP_ORDER_LIST_VOID_LABEL' => 'Пропустити етикетку',
	'PHPSHOP_ORDER_LIST_TRACK' => 'Слідкувати',
	'VM_DOWNLOAD_STATS' => 'Статистика завантажень',
	'VM_DOWNLOAD_NOTHING_LEFT' => 'завантажень не лишилось',
	'VM_DOWNLOAD_REENABLE' => 'Дозволити завантаження знову',
	'VM_DOWNLOAD_REMAINING_DOWNLOADS' => 'Залишок завантажень',
	'VM_DOWNLOAD_RESEND_ID' => 'Надіслати знову ідентифікатор завантаження (download id)',
	'VM_EXPIRY' => 'Витікання (expiry)',
	'VM_UPDATE_STATUS' => 'Змінити стан',
	'VM_ORDER_LABEL_ORDERID_NOTVALID' => 'Будь ласка, вкажіть правильний числовий номер замовлення (Order ID), не "{order_id}"',
	'VM_ORDER_LABEL_NOTFOUND' => 'Запис про замовлення не знайдено в базі даних етикеток для доставки.',
	'VM_ORDER_LABEL_NEVERGENERATED' => 'Етикетку ще не було згенеровано',
	'VM_ORDER_LABEL_CLASSCANNOT' => 'Клас {ship_class} не може отримати зображення етикетки, чому ми тут?',
	'VM_ORDER_LABEL_SHIPPINGLABEL_LBL' => 'Етикетка для доставки',
	'VM_ORDER_LABEL_SIGNATURENEVER' => 'Підпис ніколи не відновлювався',
	'VM_ORDER_LABEL_TRACK_TITLE' => 'Слідкувати',
	'VM_ORDER_LABEL_VOID_TITLE' => 'Пропустити етикетку',
	'VM_ORDER_LABEL_VOIDED_MSG' => 'Етикетку для накладної {tracking_number} було пропущено.',
	'VM_ORDER_PRINT_PO_IPADDRESS' => 'IP адреса',
	'VM_ORDER_STATUS_ICON_ALT' => 'Іконка стану',
	'VM_ORDER_PAYMENT_CCV_CODE' => 'CVV код',
	'VM_ORDER_NOTFOUND' => 'Замовлення не знайдено! Можливо його видалено.',
	'PHPSHOP_ORDER_EDIT_ACTIONS' => 'Дії',
	'PHPSHOP_ORDER_EDIT' => 'Змінити деталі замовлення',
	'PHPSHOP_ORDER_EDIT_ADD' => 'Додати',
	'PHPSHOP_ORDER_EDIT_ADD_PRODUCT' => 'Додати товар',
	'PHPSHOP_ORDER_EDIT_EDIT_ORDER' => 'Змінити замовлення',
	'PHPSHOP_ORDER_EDIT_ERROR_QUANTITY_MUST_BE_HIGHER_THAN_0' => 'Кількість має бути більше за 0.',
	'PHPSHOP_ORDER_EDIT_PRODUCT_ADDED' => 'Товар додано до замовлення',
	'PHPSHOP_ORDER_EDIT_PRODUCT_DELETED' => 'Товар видалено з замовлення',
	'PHPSHOP_ORDER_EDIT_QUANTITY_UPDATED' => 'Кількість змінено',
	'PHPSHOP_ORDER_EDIT_RETURN_PARENTS' => 'Назад до батьківського товару',
	'PHPSHOP_ORDER_EDIT_CHOOSE_PRODUCT' => 'Оберіть товар',
	'PHPSHOP_ORDER_CHANGE_UPD_BILL' => 'Змінити адресу платника',
	'PHPSHOP_ORDER_CHANGE_UPD_SHIP' => 'Змінити адресу доставки',
	'PHPSHOP_ORDER_EDIT_SOMETHING_HAS_CHANGED' => ' змінено',
	'PHPSHOP_ORDER_EDIT_CHOOSE_PRODUCT_BY_SKU' => 'Оберіть артикул'
); $VM_LANG->initModule( 'order', $langvars );
?>
