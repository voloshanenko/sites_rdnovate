<?php
/**
 * @version	$Id: ukrainian.php 79 2010-04-17 09:26:12Z PAlexA $
 * @package	SOBI2
 * @license	GNU/GPL, see LICENSE.php
 */

// no direct access
defined( '_SOBI2_' ) || ( trigger_error("Restricted access", E_USER_ERROR) && exit() );

/*
 * added (RC 2.9.2.4)
 */
DEFINE('_SOBI2_NEVER', 'Ніколи');

/*
 * added (RC 2.9.2)
 */
DEFINED('_SOBI2_NOENTRYINCAT') or DEFINE('_SOBI2_NOENTRYINCAT', 'Немає записів в цій категорії.');

/*
 * added (RC 2.9)
 */
DEFINE('_CCOUNT_VISITED', '( відвідали %count% раз )');
DEFINED('_BACK') or DEFINE('_BACK', 'Назад');

/*
 * added (RC 2.8.7.2)
 */
DEFINE('_SOBI2_GOOGLEMAPS_LABEL', 'Мітки');

/*
 * added (RC 2.8.7.1)
 */
DEFINED('_PN_PREVIOUS') or DEFINE('_PN_PREVIOUS', 'Попередня');
DEFINED('_PN_START') or DEFINE('_PN_START', 'Початок');
DEFINED('_PN_NEXT') or DEFINE('_PN_NEXT', 'Наступна');
DEFINED('_PN_END') or DEFINE('_PN_END', 'Кінець');

/*
 * added (RC 2.8.7)
 */
DEFINE('_SOBI2_RENEW_EXP_TXT', 'Термін запису збіг %days% днів назад. Чи хочете Ви <a href="%href%" title="Відновити запис зараз">відновити запис зараз</a>?');

/*
 * added (RC 2.8.5)
 */
DEFINE('_SOBI2_DEFAULT_TOOLTIP_TITLE', 'Підказка');
DEFINE('_SOBI2_ENTRIES_LIMIT_REACHED', 'Ви вже додали %count% записів. Максимум можна додати %limit% записів.');

/*
 * added (RC 2.8.4)
 */
DEFINE('_SOBI2_RENEW_TPL_TXT', 'Термін цього запису збігає через %days% днів. Чи хочете Ви <a href="%href%" title="Відновити запис зараз">відновити запис зараз</a>?');
DEFINE('_SOBI2_RENEW_BT_NOW', 'Відновити запис зараз');
DEFINE('_SOBI2_RENEW_HEADER', 'Відновити записи');
DEFINE('_SOBI2_RENEW_EXPL', 'Ви збираєтеся відновити запис ( %title% ). Термін буде продовжений на %days% днів. Термін збігає %date%');
DEFINE('_SOBI2_RENEWED_EXPL', 'Ваш запис - ( %title% ) була продовжена на %days% днів. Термін збіжить через %date%');
DEFINE('_SOBI2_PAY_DISCOUNT', 'Скасувати');
DEFINE('_JS_SOBI2_QFIELD_NO_VALUE', 'Відсутні дані');
DEFINE('_JS_SOBI2_QFIELD_DBL_CLK_TO_EDIT', 'Натисніть двічі, щоб приступити до редагування');

/*
 * added (RC 2.8.1)
 */
DEFINE('_SOBI2_NEW_LABEL', 'Нові');
DEFINE('_SOBI2_UPDATED_LABEL', 'Оновлені');
DEFINE('_SOBI2_HOT_LABEL', 'Активні');

/*
 * added 16.08.2007 (RC 2.8)
 */
//to get it working in this language you need the language files of the calender too
DEFINE("_SOBI2_CALENDAR_LANG", "ru");
DEFINE("_SOBI2_CALENDAR_FORMAT", "dd-mm-y");

//use this line if  user (login) name should be used in "Show users listings" instead of the real name
DEFINE("_SOBI2_USER_OWN_LISTING", "Записи від користувача %name%");
DEFINE("_SOBI2_USER_OWN_NO_LISTING", "Немає записів від цього користувача");

DEFINE('_SOBI2_FIELDLIST_SELECT', '&nbsp;---- виберіть ----&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');

DEFINE('_SOBI2_ALPHA_HEADER', 'Що починаються на ');
DEFINE('_SOBI2_ALPHA_CATS_WITH_LETTER', 'Категорії починаються з  ');
DEFINE('_SOBI2_ALPHA_ITEMS_WITH_LETTER', 'Записи починаються з ');
DEFINE('_SOBI2_ALPHA_LETTER', 'Записи і категорії починаються з  ');

DEFINE('_SOBI2_TAGGED_HEADER', 'Записи, помічені як ');
DEFINE('_SOBI2_ENTRIES_TAGGED_WITH', 'Записи, помічені як ');
DEFINE('_SOBI2_ENTRY_TAGGED_WITH', 'Теги: ');

DEFINE('_SOBI2_POPULAR_HEADER', 'Найпопулярніші');
DEFINE('_SOBI2_POPULAR_LISTING', 'Найпопулярніші записи');
DEFINE('_SOBI2_POPULAR_CATS', 'Найпопулярніші категорії');

DEFINE('_SOBI2_UPDATED_HEADER', 'Нещодавно оновлені записи');
DEFINE('_SOBI2_UPDATED_LISTING', 'Нещодавно оновлені записи');

DEFINE('_SOBI2_NEW_LISTINGS_HEADER', 'Нові записи');
DEFINE('_SOBI2_NEW_LISTINGS_LISTING', 'Нові записи');

DEFINED('_SEARCH_BOX') or DEFINE('_SEARCH_BOX', 'Пошук.. ');
DEFINE('_SOBI2_SEARCH_RESET_FORM', 'Очистити вибір');
DEFINE('_SOBI2_SEARCH_RESET_FORM_TITLE', 'Прибрати результати пошуку');

/*
 * added 26.07.2007 (RC 2.7.4)
 */
DEFINE('_SOBI2_SEARCH_CAT_REMOVED', 'Вибрана категорія видалена');
DEFINE('_SOBI2_SEARCH_TOOGLE_EXTENDED', 'Розширені опції пошуку');
DEFINE('_SOBI2_SEARCH_TOOGLE_CATS', 'Виберіть категорію');
DEFINE('_SOBI2_SEARCH_CATBOX_SELECT', '&nbsp;--- виберіть ---&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
DEFINE('_SOBI2_SEARCH_BOX_SELECT', '&nbsp;--- виберіть ---&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');

/*
 * added 16.06.2007 (RC 2.7.2)
 */
DEFINE('_SOBI2_FILE_NOT_UPLOADED', 'Неможливо завантажити файл, спробуйте ще раз.');
DEFINE('_SOBI2_FILE_UPLOADED', 'Файл завантажений');
DEFINE('_SOBI2_UPLOAD_FILE', 'Завантажений файл: ');
DEFINE('_SOBI2_UPLOAD', 'Завантажити');
DEFINE('_SOBI2_UPLOAD_DISSALLOWED_FILETYPE', 'Заборонений формат файлу');

/*
 * added 11.11.2006 (RC 2.5.4)
 */
DEFINE('_SOBI2_NEW_ENTRY_AWAITING_APP', "Ваш запис був успішно доданий і після схвалення адміністрацією буде доступний для перегляду відвідувачами.");

/*
 * added 26.10.2006 (RC 2.5)
 */
DEFINE('_SOBI2_CHECKBOX_YES', 'Так');
DEFINE('_SOBI2_CHECKBOX_NO', 'Ні');
DEFINE('_SOBI2_FORM_SELECT_BG', 'Виберіть фонове зображення');
DEFINE('_SOBI2_FORM_SELECT_BG_EXPL', 'Виберіть фонове зображення для перегляду подробиць і зовнішній вигляд запису при перегляді категорій.');
DEFINE('_SOBI2_FORM_BG_PREVIEW', 'Передперегляд фонового зображення');
DEFINE('_SOBI2_NOT_LOGGED_FOR_DETAILS', 'Ви маєте бути авторизовані для перегляду цієї інформації. Увійдіть на сайті або реєструйтеся');
DEFINE('_SOBI2_JS_NOT_LOGGED_FOR_DETAILS', 'Ви маєте бути авторизовані для перегляду цієї інформації. Увійдіть на сайті або реєструйтеся');
DEFINE('_SOBI2_SEARCH_INPUTBOX', _SEARCH_BOX);
DEFINE('_SOBI2_SEARCH_ALL_ENTRIES', 'Будь-які записи');

/*
 * added 11.10.2006 (RC 2)
 */
DEFINE('_SOBI2_FORM_JS_CAT_NO_PARENT_CAT', 'Ви не можете додати запис, якщо категорія має підкатегорії. Будь ласка, виберіть підкатегорію.');
DEFINE('_SOBI2_SUBCATS_IN_THIS_CAT', 'К-ть підкатегорій в цій категорії: ');
DEFINE('_SOBI2_SUBCATS_IN_CAT', 'Підкатегорій в категорії ');
DEFINE('_SOBI2_ITEMS_IN_THIS_CAT', 'К-ть записів в цій категорії: ');
DEFINE('_SOBI2_ITEMS_IN_CAT', 'Записів в категорії ');
DEFINE('_SOBI2_ITEMS_CATS_SEPARATOR', '/');

/*
 * added 02.10.2006 (RC 1)
 */
DEFINE('_SOBI2_GOOGLEMAPS_GET_DIR', 'Визначити напрям');
DEFINE('_SOBI2_GOOGLEMAPS_FROM', 'З');
DEFINE('_SOBI2_GOOGLEMAPS_TO', 'В');
DEFINE('_SOBI2_GOOGLEMAPS_ADDR', 'Адреса: ');
DEFINE('_SOBI2_GOOGLEMAPS_DIR', 'Напрям: ');

/*
 * added 26.09.2006 (Beta 2.2)
 */
DEFINE('_SOBI2_CANCEL', 'Відмінити');

/*
 * added 23.09.2006 (Beta 2.1)
 */
DEFINE('_SOBI2_SAVE_IMG_TO_BIG', 'Невдале завантаження зображення! Завантажуваний файл занадто великий. Розмір файлу: ');
DEFINE('_SOBI2_EF_MAX_FILE_SIZE', ' Розмір файлу має бути не більш ');
DEFINE('_SOBI2_EF_KB_FILE_SIZE', ' кб');

/*
 * General Labels
 */
DEFINE('_SOBI2_SEND_L', 'Відправити');
DEFINE('_SOBI2_ADD_U', 'Додати');
DEFINE('_SOBI2_CATEGORY_L', 'категорія');
DEFINE('_SOBI2_CATEGORY_H', 'категорія');
DEFINE('_SOBI2_CATEGORIES_L', 'категорії');
DEFINE('_SOBI2_CATEGORIES_H', 'категорії');
DEFINE('_SOBI2_IS_FREE_L', 'безкоштовна');
DEFINE('_SOBI2_IS_NOT_FREE_L', 'не безкоштовна.');
DEFINE('_SOBI2_COST_L', 'Розміщення тут інформації коштує');
DEFINE('_SOBI2_NOT_AUTH', 'Ви не авторизовані для перегляду цієї сторінки');
DEFINE('_SOBI2_SELECT', 'виберіть');
DEFINE('_SOBI2_SEARCH_H', 'Пошук');
DEFINE('_SOBI2_ADD_NEW_ENTRY', 'Додати');
DEFINE('_SOBI2_NUMBER_H', 'Число');
DEFINE('_SOBI2_CONFIRM_DELETE', 'Ви дійсно хочете видалити цей запис? \n' .
'Увага! Дані після видалення не можуть бути відновлені!');
DEFINE('_SOBI2_SEND_MAIL', 'Відправити e-mail');
DEFINE('_SOBI2_VISIT_WEBSITE', 'Перейти на сайт');
DEFINE('_SOBI2_HITS', 'Переглядів: ');
DEFINE('_SOBI2_DATE_ADDED', 'Додано:');

DEFINE('_SOBI2_NOT_LOGGED', '<h4>Ви не авторизовані і тому не можете додавати інформацію.</h4>');
DEFINE('_SOBI2_NOT_LOGGED_CANNOT_EDIT', '<h4>Ви не авторизовані.</h4>' .
'<h4>Ви можете додавати нові записи, але не зможете їх редагувати в наступному. Увійдіть або реєструйтеся для великих можливостей.</h4>');
DEFINE('_SOBI2_PLEASE_REGISTER_OR_LOGIN', '<h4>Увійдіть або реєструйтеся.</h4>');

/*
 * Formular Labels
 */
DEFINE('_SOBI2_FORM_TITLE_ADD_NEW_ENTRY', 'Додати');
DEFINE('_SOBI2_FORM_TITLE_EDIT_ENTRY', 'Редагувати');

DEFINE('_SOBI2_FORM_YOUR_IMG_LABEL', 'Ваш ');
DEFINE('_SOBI2_FORM_IMG_CHANGE_LABEL', 'Замінити ');
DEFINE('_SOBI2_FORM_IMG_REMOVE_LABEL', 'Видалити ');
DEFINE('_SOBI2_FORM_IMG_EXPL', 'Це зображення буде показано при детальному перегляді запису.');
DEFINE('_SOBI2_FORM_YOUR_ICO_LABEL', 'Ваша ');
DEFINE('_SOBI2_FORM_ICO_CHANGE_LABEL', 'Змінити ');
DEFINE('_SOBI2_FORM_ICO_REMOVE_LABEL', 'Видалити ');

DEFINE('_SOBI2_FORM_ICO_EXPL', 'Це зображення буде показано при перегляді категорії.');
DEFINE('_SOBI2_FORM_SAFETY_CODE', 'Код &nbsp;');
DEFINE('_SOBI2_FORM_ENTER_SAFETY_CODE', 'Будь ласка введіть код: ');
DEFINE('_SOBI2_FORM_NOT_FREE_OPTION', 'Цей параметр не безкоштовний.');
DEFINE('_SOBI2_FORM_SELECT_CATEGORY', 'Будь ласка виберіть категорію');
DEFINE('_SOBI2_FORM_CAN_ADD_TO_NR_CATS', "Ви можете додати Ваш запис одночасно в наступну к-ть категорій: {$config->maxCatsForEntry}");
DEFINE('_SOBI2_FORM_CAT_1', 'Перша категорія');
DEFINE('_SOBI2_FORM_ADD_CAT_BT', _SOBI2_ADD_U.' '._SOBI2_CATEGORY_H);
DEFINE('_SOBI2_FORM_REMOVE_CAT_BT','Видалити '._SOBI2_CATEGORY_H);
DEFINE('_SOBI2_FORM_SELECTED_CAT_DESC', _SOBI2_CATEGORY_H.' з описом:');
DEFINE('_SOBI2_FORM_PRICE_IS', 'Ціна');
DEFINE('_SOBI2_FORM_FIELD_REQ_MARK', ' * ');
DEFINE('_SOBI2_FORM_FIELD_REQ_INFO', 'Поля, відмічені зірочкою ('._SOBI2_FORM_FIELD_REQ_MARK.'), обовязкові для заповнення.');
DEFINE('_SOBI2_FORM_META_KEYS_LABEL', 'Ключові слова');
DEFINE('_SOBI2_FORM_META_KEYS_EXPL', 'Введений текст буде доданий в META-тег "description".');
DEFINE('_SOBI2_FORM_META_DESC_LABEL', 'Опис');
DEFINE('_SOBI2_FORM_META_DESC_EXPL', 'Введений текст буде доданий в META-тег "description".');
DEFINE('_SOBI2_FORM_JS_SELECT_CAT', 'Будь ласка, виберіть хоч би одну категорію.');
DEFINE('_SOBI2_FORM_JS_ACC_ENTRY_RULES', 'Ви повинні прийняти умови використання.');
DEFINE('_SOBI2_FORM_JS_ALL_REQUIRED_FIELDS', 'Будь ласка, заповните усі обовязкові поля.');
DEFINE('_SOBI2_FORM_JS_CAT_ALLREADY_ADDED', 'Ця категорія вже додана.');
DEFINE('_SOBI2_SEC_CODE_WRONG', 'Неправильний код безпеки. Спробуйте ще раз. Будь ласка, уважно вводите цифри!');
DEFINE('_SOBI2_LISTING_CHECKED_OUT', 'Цей запис, в даний момент, редагується іншим користувачем');

/*
 * On Saving
 */
DEFINE('_SOBI2_SAVE_DUPLICATE_ENTRY', 'Запис з такою назвою вже існує.');
DEFINE('_SOBI2_SAVE_NOT_ALLOWED_IMG_EXT', 'Розширення завантажуваного зображення не дозволене і зображення не може бути завантажене.');
DEFINE('_SOBI2_SAVE_UPLOAD_IMG_FILED', 'Помилка завантаження файлу!');
DEFINE('_SOBI2_SAVE_UPLOAD_IMG_OK', 'Файл із зображенням для логотипу компанії був завантажений успішно!');
DEFINE('_SOBI2_SAVE_UPLOAD_ICO_OK', 'Файл із зображенням для іконки компанії був завантажений успішно!');
DEFINE('_SOBI2_SAVE_UPLOAD_IMG_FAILED', 'Помилка завантаження файлу із зображенням для логотипу компанії!');
DEFINE('_SOBI2_SAVE_UPLOAD_ICO_FAILED', 'Помилка завантаження файлу із зображенням для іконки компанії!');
DEFINE('_SOBI2_SAVE_NOT_ALL_REQ_FIELDS_FILLED', 'Не усі обовязкові поля заповнені!');
DEFINE('_SOBI2_SAVE_ICON_FEES', 'Іконка компанії');
DEFINE('_SOBI2_SAVE_IMAGE_FEES', 'Логотип компанії');
DEFINE('_SOBI2_CHANGES_SAVED', 'Усі зміни збережені.');

/*
 * Entry Labels
 */
DEFINE('_SOBI2_LISTING_EDIT_PROMOTED_ITEMS', 'Рекомендовані записи');
DEFINE('_SOBI2_LISTING_EDIT_ENTRY_BT', 'Редагувати');
DEFINE('_SOBI2_LISTING_DELET_ENTRY_BT', 'Видалити');
DEFINE('_SOBI2_LISTING_GO_UP_ICO', '');
DEFINE('_SOBI2_LISTING_GO_UP_TXT', '');

/*
 * Payment Class
 */
DEFINE('_SOBI2_PAY_CHOSEN_OPTIONS', 'Ви вибрали наступні платні параметри');
DEFINE('_SOBI2_PAY_TOTAL_AMOUNT', 'Всього сума: ');
DEFINE('_SOBI2_PAY_WITH_BANK', 'Я сплачу за допомогою банківського переказу:');
DEFINE('_SOBI2_PAY_WITH_PAYPAL', 'Я сплачу через PayPal');
DEFINE('_SOBI2_PAY_BANK_DATA_SEND_EMAIL', 'Інформація про банківський рахунок Вам відправлена');
DEFINE('_SOBI2_PAY_BANK_DATA_JS_HEADER', 'Будь ласка, відправте гроші на один з наступних рахунків : ');
DEFINE('_SOBI2_PAY_BANK_DATA_JS_TITLE', 'Посилання: ');

/*
 * Search Form
 */
DEFINE('_SOBI2_SEARCH_FOR', _SOBI2_SEARCH_H.': ');
DEFINE('_SOBI2_SEARCH_ANY', 'Будь-яке слово');
DEFINE('_SOBI2_SEARCH_ALL', 'Усі слова');
DEFINE('_SOBI2_SEARCH_EXACT', 'Точна фраза');
DEFINE('_SOBI2_SEARCH_RESULTS', 'Результати пошуку:');
DEFINE('_SOBI2_SEARCH_RESULTS_FOUND', 'Знайдено');
DEFINE('_SOBI2_SEARCH_RESULTS_FOUND_RESULTS', 'результатів при пошуку:');

/*
 * Deleting
 */
DEFINE('_SOBI2_DEL_UNPUBLISHED', 'Ваш запис тепер не опублікований!');
DEFINE('_SOBI2_DEL_NOT_DELETED', 'Ваш запис не може бути видалений. З усіх питань звертайтеся до адміністрації.');
DEFINE('_SOBI2_DEL_DELETED', 'Інформація видалена!');
?>