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
	'PHPSHOP_BROWSE_LBL' => 'Перегляд',
	'PHPSHOP_FLYPAGE_LBL' => 'Докладніше',
	'PHPSHOP_PRODUCT_FORM_EDIT_PRODUCT' => 'Редагувати товар',
	'PHPSHOP_DOWNLOADS_START' => 'Завантажити',
	'PHPSHOP_DOWNLOADS_INFO' => 'Будь ласка, введіть ідентифікатор завантаження (download-id), який Ви отримали по e-mail і натисніть \'Завантажити\'.',
	'PHPSHOP_WAITING_LIST_MESSAGE' => 'Будь ласка, лишіть свій e-mail, щоб ми повідомили Вас, коли цей товар знову з’явиться на складі. 
		Ми не будемо продавати, передавати третім особам або іншим чином використовувати Ваш e-mail, окрім як для 
		повідомлення про те, що товар знову поступив на склад.<br /><br />Дякуємо!',
	'PHPSHOP_WAITING_LIST_THANKS' => 'Дякуємо за очікування! <br />Ми повідомимо Вам про появу товару, як тільки він поступить на склад.',
	'PHPSHOP_WAITING_LIST_NOTIFY_ME' => 'Повідомити!',
	'PHPSHOP_SEARCH_ALL_CATEGORIES' => 'Пошук по всіх категоріях',
	'PHPSHOP_SEARCH_ALL_PRODINFO' => 'Пошук у всій інформації про товар',
	'PHPSHOP_SEARCH_PRODNAME' => 'Тільки в назві товару',
	'PHPSHOP_SEARCH_MANU_VENDOR' => 'Тільки у Виробниках/Продавцях',
	'PHPSHOP_SEARCH_DESCRIPTION' => 'Тільки в описі товару',
	'PHPSHOP_SEARCH_AND' => 'і',
	'PHPSHOP_SEARCH_NOT' => 'не',
	'PHPSHOP_SEARCH_TEXT1' => 'Перший випадаючий список дозовляє Вам обрати категорію для обмеження результатів пошуку. 
        Другий випадаючий список дозовляє Вам шукати товар по окремим властивостям, наприклад, тільки по назві. 
        Обравши параметри пошуку (або залишивши їх за замовчуванням), введіть слово для пошуку.',
	'PHPSHOP_SEARCH_TEXT2' => ' Ви можете знову здійснити пошук шляхом додавання другого слова і вибору оператора І або НЕ. 
        При виборі оператора І, відобразяться товари, що містять обидва слова.
        При виборі НЕ, відобразяться товари, що містять перше слово,
        але не містять другого.',
	'PHPSHOP_CONTINUE_SHOPPING' => 'Продовжити покупки',
	'PHPSHOP_AVAILABLE_IMAGES' => 'Доступні зображення для',
	'PHPSHOP_BACK_TO_DETAILS' => 'Назад до опису товару',
	'PHPSHOP_IMAGE_NOT_FOUND' => 'Зображення не знайдено!',
	'PHPSHOP_PARAMETER_SEARCH_TEXT1' => 'Ви хочете шукати товари за їх технічними параметрами?<BR>Ви можете використовувати будь яку підготовану форму:',
	'PHPSHOP_PARAMETER_SEARCH_NO_PRODUCT_TYPE' => 'Вибачте, але категорій для пошуку нема.',
	'PHPSHOP_PARAMETER_SEARCH_BAD_PRODUCT_TYPE' => 'Вибачте, але нема опублікованих типів товару з такою назвою.',
	'PHPSHOP_PARAMETER_SEARCH_IS_LIKE' => 'Щоб був присутній',
	'PHPSHOP_PARAMETER_SEARCH_IS_NOT_LIKE' => 'Щоб був відсутній',
	'PHPSHOP_PARAMETER_SEARCH_FULLTEXT' => 'Повнотекстовий пошук',
	'PHPSHOP_PARAMETER_SEARCH_FIND_IN_SET_ALL' => 'Все обране',
	'PHPSHOP_PARAMETER_SEARCH_FIND_IN_SET_ANY' => 'Будь що з обраного',
	'PHPSHOP_PARAMETER_SEARCH_RESET_FORM' => 'Очистити форму',
	'PHPSHOP_PRODUCT_NOT_FOUND' => 'Вибачте, але запитуваний товар не знайдено!',
	'PHPSHOP_PRODUCT_PACKAGING1' => 'Кількість {unit} в упаковці:',
	'PHPSHOP_PRODUCT_PACKAGING2' => 'Кількість {unit} у коробці:',
	'PHPSHOP_CART_PRICE_PER_UNIT' => 'Ціна за шт.',
	'VM_PRODUCT_ENQUIRY_LBL' => 'Задайте питання з цього товару',
	'VM_RECOMMEND_FORM_LBL' => 'Рекомендувати товар другу',
	'PHPSHOP_EMPTY_YOUR_CART' => 'Очистити кошик',
	'VM_RETURN_TO_PRODUCT' => 'Повернутись до товару',
	'EMPTY_CATEGORY' => 'В даній категорії нема товарів.',
	'ENQUIRY' => 'Запит',
	'NAME_PROMPT' => 'Ваше ім’я',
	'EMAIL_PROMPT' => 'E-mail',
	'MESSAGE_PROMPT' => 'Ваше повідомлення',
	'SEND_BUTTON' => 'Відправити',
	'THANK_MESSAGE' => 'Дякуємо за Ваш запит. Ми зконтактуємо з Вами найближчим часом.',
	'PROMPT_CLOSE' => 'Закрити',
	'VM_RECOVER_CART_REPLACE' => 'Замінити вміст корзини на вміст збереженої корзини',
	'VM_RECOVER_CART_MERGE' => 'Додати вміст збереженої корзини до вмісту поточної корзини',
	'VM_RECOVER_CART_DELETE' => 'Видалити вміст збереженої корзини',
	'VM_EMPTY_YOUR_CART_TIP' => 'Спорожнити кошик',
	'VM_SAVED_CART_TITLE' => 'Збережений кошик',
	'VM_SAVED_CART_RETURN' => 'Повернутись'
); $VM_LANG->initModule( 'shop', $langvars );
?>