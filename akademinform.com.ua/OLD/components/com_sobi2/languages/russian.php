<?php
/**
 * @version	$Id: russian.php 5237 2009-07-13 14:16:40Z Sigrid Suski $
 * @package	SOBI2
 * @license	GNU/GPL, see LICENSE.php
 */

// no direct access
defined( '_SOBI2_' ) || ( trigger_error("Restricted access", E_USER_ERROR) && exit() );

/*
 * added (RC 2.9.2)
 */
DEFINED('_SOBI2_NOENTRYINCAT') or DEFINE('_SOBI2_NOENTRYINCAT', 'Нет записей в этой категории.');

/*
 * added (RC 2.9)
 */
DEFINE('_CCOUNT_VISITED', '( посетили %count% раз )');
DEFINED('_BACK') or DEFINE('_BACK', 'Назад');

/*
 * added (RC 2.8.7.2)
 */
DEFINE('_SOBI2_GOOGLEMAPS_LABEL', 'Метки');

/*
 * added (RC 2.8.7.1)
 */
DEFINED('_PN_PREVIOUS') or DEFINE('_PN_PREVIOUS', 'Предыдущая');
DEFINED('_PN_START') or DEFINE('_PN_START', 'Начало');
DEFINED('_PN_NEXT') or DEFINE('_PN_NEXT', 'Следующая');
DEFINED('_PN_END') or DEFINE('_PN_END', 'Конец');

/*
 * added (RC 2.8.7)
 */
DEFINE('_SOBI2_RENEW_EXP_TXT', 'Срок записи истек %days% дней назад. Хотите ли Вы <a href="%href%" title="Обновить запись сейчас">обновить запись сейчас</a>?');

/*
 * added (RC 2.8.5)
 */
DEFINE('_SOBI2_DEFAULT_TOOLTIP_TITLE', 'Подсказка');
DEFINE('_SOBI2_ENTRIES_LIMIT_REACHED', 'Вы уже добавили %count% записей. Максимум можно добавить %limit% записей.');

/*
 * added (RC 2.8.4)
 */
DEFINE('_SOBI2_RENEW_TPL_TXT', 'Срок этой записи истекает через %days% дней. Хотите ли Вы <a href="%href%" title="Обновить запись сейчас">обновить запись сейчас</a>?');
DEFINE('_SOBI2_RENEW_BT_NOW', 'Обновить записи сейчас');
DEFINE('_SOBI2_RENEW_HEADER', 'Обновить записи');
DEFINE('_SOBI2_RENEW_EXPL', 'Вы собираетесь обновить запись ( %title% ). Срок будет продлен на %days% дней. Срок истекает %date%');
DEFINE('_SOBI2_RENEWED_EXPL', 'Ваша запись - ( %title% ) была продлена на %days% дней. Срок истечет через %date%');
DEFINE('_SOBI2_PAY_DISCOUNT', 'Сбросить');
DEFINE('_JS_SOBI2_QFIELD_NO_VALUE', 'Отсутствующие данные');
DEFINE('_JS_SOBI2_QFIELD_DBL_CLK_TO_EDIT', 'Нажмите дважды, чтобы приступить к редактированию');

/*
 * added (RC 2.8.1)
 */
DEFINE('_SOBI2_NEW_LABEL', 'Новые');
DEFINE('_SOBI2_UPDATED_LABEL', 'Обновленные');
DEFINE('_SOBI2_HOT_LABEL', 'Активные');

/*
 * added 16.08.2007 (RC 2.8)
 */
//to get it working in this language you need the language files of the calender too
DEFINE("_SOBI2_CALENDAR_LANG", "ru");
DEFINE("_SOBI2_CALENDAR_FORMAT", "dd-mm-y");

//use this line if  user (login) name should be used in "Show users listings" instead of the real name
DEFINE("_SOBI2_USER_OWN_LISTING", "Записи от пользователя %name%");
DEFINE("_SOBI2_USER_OWN_NO_LISTING", "Нет записей от этого пользователя");

DEFINE('_SOBI2_FIELDLIST_SELECT', '&nbsp;---- выберите ----&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');

DEFINE('_SOBI2_ALPHA_HEADER', 'Письмо ');
DEFINE('_SOBI2_ALPHA_CATS_WITH_LETTER', 'Категории начинающиеся с  ');
DEFINE('_SOBI2_ALPHA_ITEMS_WITH_LETTER', 'Записи начинающиеся с ');
DEFINE('_SOBI2_ALPHA_LETTER', 'Записи и категории начинающиеся с  ');

DEFINE('_SOBI2_TAGGED_HEADER', 'Записи, помеченные как ');
DEFINE('_SOBI2_ENTRIES_TAGGED_WITH', 'Записи, помеченные как ');
DEFINE('_SOBI2_ENTRY_TAGGED_WITH', 'Теги: ');

DEFINE('_SOBI2_POPULAR_HEADER', 'Самые популярные');
DEFINE('_SOBI2_POPULAR_LISTING', 'Самые популярные записи');
DEFINE('_SOBI2_POPULAR_CATS', 'Самые популярные категории');

DEFINE('_SOBI2_UPDATED_HEADER', 'Недавно обновленные записи');
DEFINE('_SOBI2_UPDATED_LISTING', 'Недавно обновленные записи');

DEFINE('_SOBI2_NEW_LISTINGS_HEADER', 'Новые записи');
DEFINE('_SOBI2_NEW_LISTINGS_LISTING', 'Новые записи');

DEFINED('_SEARCH_BOX') or DEFINE('_SEARCH_BOX', 'Поиск... ');
DEFINE('_SOBI2_SEARCH_RESET_FORM', 'Очистить выбор');
DEFINE('_SOBI2_SEARCH_RESET_FORM_TITLE', 'Убрать результаты поиска');

/*
 * added 26.07.2007 (RC 2.7.4)
 */
DEFINE('_SOBI2_SEARCH_CAT_REMOVED', 'Выбранная категория удалена');
DEFINE('_SOBI2_SEARCH_TOOGLE_EXTENDED', 'Расширенные опции поиска');
DEFINE('_SOBI2_SEARCH_TOOGLE_CATS', 'Выберите категорию');
DEFINE('_SOBI2_SEARCH_CATBOX_SELECT', '&nbsp;--- выберите ---&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
DEFINE('_SOBI2_SEARCH_BOX_SELECT', '&nbsp;--- выберите ---&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');

/*
 * added 16.06.2007 (RC 2.7.2)
 */
DEFINE('_SOBI2_FILE_NOT_UPLOADED', 'Невозможно загрузить файл, попробуйте еще раз.');
DEFINE('_SOBI2_FILE_UPLOADED', 'Файл загружен');
DEFINE('_SOBI2_UPLOAD_FILE', 'Загруженный файл: ');
DEFINE('_SOBI2_UPLOAD', 'Загрузить');
DEFINE('_SOBI2_UPLOAD_DISSALLOWED_FILETYPE', 'Запрещенный формат файла');

/*
 * added 11.11.2006 (RC 2.5.4)
 */
DEFINE('_SOBI2_NEW_ENTRY_AWAITING_APP', "Ваша запись была успешно добавлена и после одобрения администрацией будет доступна для просмотра посетителями.");

/*
 * added 26.10.2006 (RC 2.5)
 */
DEFINE('_SOBI2_CHECKBOX_YES', 'Да');
DEFINE('_SOBI2_CHECKBOX_NO', 'Нет');
DEFINE('_SOBI2_FORM_SELECT_BG', 'Выберите фоновое изображение');
DEFINE('_SOBI2_FORM_SELECT_BG_EXPL', 'Выберите фоновое изображение для просмотра подробностей и внешний вид записи при просмотре категорий.');
DEFINE('_SOBI2_FORM_BG_PREVIEW', 'Предпросмотр фонового изображения');
DEFINE('_SOBI2_NOT_LOGGED_FOR_DETAILS', 'Вы должны быть авторизованы для просмотра данной информации. Войдите на сайте или зарегистрируйтесь');
DEFINE('_SOBI2_JS_NOT_LOGGED_FOR_DETAILS', 'Вы должны быть авторизованы для просмотра данной информации. Войдите на сайте или зарегистрируйтесь');
DEFINE('_SOBI2_SEARCH_INPUTBOX', _SEARCH_BOX);
DEFINE('_SOBI2_SEARCH_ALL_ENTRIES', 'Любые записи');

/*
 * added 11.10.2006 (RC 2)
 */
DEFINE('_SOBI2_FORM_JS_CAT_NO_PARENT_CAT', 'Вы не можете добавить запись, если категория имеет подкатегории. Пожалуйста, выберите подкатегорию.');
DEFINE('_SOBI2_SUBCATS_IN_THIS_CAT', 'Кол-во подкатегорий в данной категории: ');
DEFINE('_SOBI2_SUBCATS_IN_CAT', 'Подкатегорий в категории ');
DEFINE('_SOBI2_ITEMS_IN_THIS_CAT', 'Кол-во записей в данной категории: ');
DEFINE('_SOBI2_ITEMS_IN_CAT', 'Записей в категории ');
DEFINE('_SOBI2_ITEMS_CATS_SEPARATOR', '/');

/*
 * added 02.10.2006 (RC 1)
 */
DEFINE('_SOBI2_GOOGLEMAPS_GET_DIR', 'Определить направление');
DEFINE('_SOBI2_GOOGLEMAPS_FROM', 'Из');
DEFINE('_SOBI2_GOOGLEMAPS_TO', 'В');
DEFINE('_SOBI2_GOOGLEMAPS_ADDR', 'Адрес: ');
DEFINE('_SOBI2_GOOGLEMAPS_DIR', 'Направление: ');

/*
 * added 26.09.2006 (Beta 2.2)
 */
DEFINE('_SOBI2_CANCEL', 'Отменить');

/*
 * added 23.09.2006 (Beta 2.1)
 */
DEFINE('_SOBI2_SAVE_IMG_TO_BIG', 'Неудачная загрузка изображения! Загружаемый файл слишком большой. Размер файла: ');
DEFINE('_SOBI2_EF_MAX_FILE_SIZE', ' Размер файла должен быть не более ');
DEFINE('_SOBI2_EF_KB_FILE_SIZE', ' кб');

/*
 * General Labels
 */
DEFINE('_SOBI2_SEND_L', 'Отправить');
DEFINE('_SOBI2_ADD_U', 'Добавить');
DEFINE('_SOBI2_CATEGORY_L', 'категория');
DEFINE('_SOBI2_CATEGORY_H', 'Категория');
DEFINE('_SOBI2_CATEGORIES_L', 'категории');
DEFINE('_SOBI2_CATEGORIES_H', 'Категории');
DEFINE('_SOBI2_IS_FREE_L', 'бесплатна');
DEFINE('_SOBI2_IS_NOT_FREE_L', 'не бесплатная.');
DEFINE('_SOBI2_COST_L', 'Размещение здесь информации стоит');
DEFINE('_SOBI2_NOT_AUTH', 'Вы не авторизованы для просмотра данной страницы');
DEFINE('_SOBI2_SELECT', 'выберите');
DEFINE('_SOBI2_SEARCH_H', 'Поиск');
DEFINE('_SOBI2_ADD_NEW_ENTRY', 'Добавить');
DEFINE('_SOBI2_NUMBER_H', 'Число');
DEFINE('_SOBI2_CONFIRM_DELETE', 'Вы действительно хотите удалить данную запись? \n' .
'Внимание! Данные после удаления не могут быть восстановлены!');
DEFINE('_SOBI2_SEND_MAIL', 'Отправить e-mail');
DEFINE('_SOBI2_VISIT_WEBSITE', 'Перейти на сайт');
DEFINE('_SOBI2_HITS', 'Просмотров: ');
DEFINE('_SOBI2_DATE_ADDED', 'Добавлено:');

DEFINE('_SOBI2_NOT_LOGGED', '<h4>Вы не авторизованы и поэтому не можете добавлять информацию.</h4>');
DEFINE('_SOBI2_NOT_LOGGED_CANNOT_EDIT', '<h4>Вы не авторизованы.</h4>' .
'<h4>Вы можете добавлять новые записи, но не сможете их редактировать в последующем. Войдите или зарегистрируйтесь для больших возможностей.</h4>');
DEFINE('_SOBI2_PLEASE_REGISTER_OR_LOGIN', '<h4>Войдите или зарегистрируйтесь.</h4>');

/*
 * Formular Labels
 */
DEFINE('_SOBI2_FORM_TITLE_ADD_NEW_ENTRY', 'Добавить');
DEFINE('_SOBI2_FORM_TITLE_EDIT_ENTRY', 'Редактировать');

DEFINE('_SOBI2_FORM_YOUR_IMG_LABEL', 'Ваш ');
DEFINE('_SOBI2_FORM_IMG_CHANGE_LABEL', 'Заменить ');
DEFINE('_SOBI2_FORM_IMG_REMOVE_LABEL', 'Удалить ');
DEFINE('_SOBI2_FORM_IMG_EXPL', 'Данное изображение будет показано при подробном просмотре записи.');
DEFINE('_SOBI2_FORM_YOUR_ICO_LABEL', 'Ваша ');
DEFINE('_SOBI2_FORM_ICO_CHANGE_LABEL', 'Изменить ');
DEFINE('_SOBI2_FORM_ICO_REMOVE_LABEL', 'Удалить ');

DEFINE('_SOBI2_FORM_ICO_EXPL', 'Данное изображение будет показано при просмотре категории.');
DEFINE('_SOBI2_FORM_SAFETY_CODE', 'Код &nbsp;');
DEFINE('_SOBI2_FORM_ENTER_SAFETY_CODE', 'Пожалуйста введите код: ');
DEFINE('_SOBI2_FORM_NOT_FREE_OPTION', 'Данный параметр не бесплатный.');
DEFINE('_SOBI2_FORM_SELECT_CATEGORY', 'Пожалуйста выберите категорию');
DEFINE('_SOBI2_FORM_CAN_ADD_TO_NR_CATS', "Вы можете добавить Вашу запись одновременно в следующее кол-во категорий: {$config->maxCatsForEntry}");
DEFINE('_SOBI2_FORM_CAT_1', 'Первая категория');
DEFINE('_SOBI2_FORM_ADD_CAT_BT', _SOBI2_ADD_U.' '._SOBI2_CATEGORY_H);
DEFINE('_SOBI2_FORM_REMOVE_CAT_BT','Удалить '._SOBI2_CATEGORY_H);
DEFINE('_SOBI2_FORM_SELECTED_CAT_DESC', _SOBI2_CATEGORY_H.' с описанием:');
DEFINE('_SOBI2_FORM_PRICE_IS', 'Цена');
DEFINE('_SOBI2_FORM_FIELD_REQ_MARK', ' * ');
DEFINE('_SOBI2_FORM_FIELD_REQ_INFO', 'Поля, отмеченные звездочкой ('._SOBI2_FORM_FIELD_REQ_MARK.'), обязательны для заполнения.');
DEFINE('_SOBI2_FORM_META_KEYS_LABEL', 'Ключевые слова тега &lt;meta&gt;');
DEFINE('_SOBI2_FORM_META_KEYS_EXPL', 'Введенные ключевые слова будут добавлены в список ключевых слов мета-тегов.');
DEFINE('_SOBI2_FORM_META_DESC_LABEL', 'Описание тега &lt;meta&gt;');
DEFINE('_SOBI2_FORM_META_DESC_EXPL', 'Введенный текст будет добавлен в Данные мета-тегов.');
DEFINE('_SOBI2_FORM_JS_SELECT_CAT', 'Пожалуйста, выберите хотя бы одну категорию.');
DEFINE('_SOBI2_FORM_JS_ACC_ENTRY_RULES', 'Вы должны принять условия использования.');
DEFINE('_SOBI2_FORM_JS_ALL_REQUIRED_FIELDS', 'Пожалуйста, заполните все обязательные поля.');
DEFINE('_SOBI2_FORM_JS_CAT_ALLREADY_ADDED', 'Данная категория уже добавлена.');
DEFINE('_SOBI2_SEC_CODE_WRONG', 'Неправильный код безопасности. Попробуйте еще раз. Пожалуйста, внимательно вводите цифры!');
DEFINE('_SOBI2_LISTING_CHECKED_OUT', 'Данная запись, в данный момент, редактируется другим пользователем');

/*
 * On Saving
 */
DEFINE('_SOBI2_SAVE_DUPLICATE_ENTRY', 'Запись с таким названием уже существует.');
DEFINE('_SOBI2_SAVE_NOT_ALLOWED_IMG_EXT', 'Расширение загружаемого изображения не разрешено и изображение не может быть загружено.');
DEFINE('_SOBI2_SAVE_UPLOAD_IMG_FILED', 'Ошибка загрузки файла!');
DEFINE('_SOBI2_SAVE_UPLOAD_IMG_OK', 'Файл с изображением для логотипа компании был загружен успешно!');
DEFINE('_SOBI2_SAVE_UPLOAD_ICO_OK', 'Файл с изображением для иконки компании был загружен успешно!');
DEFINE('_SOBI2_SAVE_UPLOAD_IMG_FAILED', 'Ошибка загрузки файла с изображением для логотипа компании!');
DEFINE('_SOBI2_SAVE_UPLOAD_ICO_FAILED', 'Ошибка загрузки файла с изображением для иконки компании!');
DEFINE('_SOBI2_SAVE_NOT_ALL_REQ_FIELDS_FILLED', 'Не все обязательные поля заполнены!');
DEFINE('_SOBI2_SAVE_ICON_FEES', 'Иконка компании');
DEFINE('_SOBI2_SAVE_IMAGE_FEES', 'Логотип компании');
DEFINE('_SOBI2_CHANGES_SAVED', 'Все изменения сохранены.');

/*
 * Entry Labels
 */
DEFINE('_SOBI2_LISTING_EDIT_PROMOTED_ITEMS', 'Рекомендуемые записи');
DEFINE('_SOBI2_LISTING_EDIT_ENTRY_BT', 'Редактировать');
DEFINE('_SOBI2_LISTING_DELET_ENTRY_BT', 'Удалить');
DEFINE('_SOBI2_LISTING_GO_UP_ICO', '');
DEFINE('_SOBI2_LISTING_GO_UP_TXT', '');

/*
 * Payment Class
 */
DEFINE('_SOBI2_PAY_CHOSEN_OPTIONS', 'Вы выбрали следующие платные параметры');
DEFINE('_SOBI2_PAY_TOTAL_AMOUNT', 'Всего сумма: ');
DEFINE('_SOBI2_PAY_WITH_BANK', 'Я оплачу с помощью банковского перевода:');
DEFINE('_SOBI2_PAY_WITH_PAYPAL', 'Я оплачу через PayPal');
DEFINE('_SOBI2_PAY_BANK_DATA_SEND_EMAIL', 'Информация о банковском счете Вам отправлена');
DEFINE('_SOBI2_PAY_BANK_DATA_JS_HEADER', 'Пожалуйста, отправьте деньги на один из следующих счетов: ');
DEFINE('_SOBI2_PAY_BANK_DATA_JS_TITLE', 'Ссылка: ');

/*
 * Search Form
 */
DEFINE('_SOBI2_SEARCH_FOR', _SOBI2_SEARCH_H.': ');
DEFINE('_SOBI2_SEARCH_ANY', 'Любое слово');
DEFINE('_SOBI2_SEARCH_ALL', 'Все слова');
DEFINE('_SOBI2_SEARCH_EXACT', 'Точная фраза');
DEFINE('_SOBI2_SEARCH_RESULTS', 'Результаты поиска:');
DEFINE('_SOBI2_SEARCH_RESULTS_FOUND', 'Найдено');
DEFINE('_SOBI2_SEARCH_RESULTS_FOUND_RESULTS', 'результатов при поиске:');

/*
 * Deleting
 */
DEFINE('_SOBI2_DEL_UNPUBLISHED', 'Ваша запись теперь не опубликована!');
DEFINE('_SOBI2_DEL_NOT_DELETED', 'Ваша запись не может быть удалена. По всем вопросам обращайтесь к администрации.');
DEFINE('_SOBI2_DEL_DELETED', 'Информация удалена!');
?>