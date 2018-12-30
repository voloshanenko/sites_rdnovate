<?php
/**
 * @version	$Id: admin.ukrainian.php 81 2010-04-17 11:37:52Z PAlexA $
 * @package	SOBI2
 * @license	GNU/GPL, see LICENSE.php
 */

// no direct access
defined( '_SOBI2_' ) || ( trigger_error("Restricted access", E_USER_ERROR) && exit() );

DEFINE('_SOBI2_ADM_EXPERIMENTAL_OPT', ' (Экспериментально)');

/*
 * added (RC 2.9.2)
 */
DEFINE('_SOBI2_MENU_ABOUT', 'О системе');
DEFINE('_SOBI2_MENU_ABOUT_SOBI', 'О Sigsiu.NET');

DEFINE('_SOBI2_SYSTEM', 'Система');

/*
 * added (RC 2.9.0.2)
 */
DEFINE('_SOBI2_SET_TPL_DEF_EXPL', 'Нажмите, чтобы установить этот шаблон по умолчанию в SOBI2.');
DEFINE('_SOBI2_SET_TPL_DEF', 'Установить по умолчанию');
DEFINE('_SOBI2_PLUGINS_DEF', 'По умолчанию');
DEFINE('_SOBI2_CONFIG_GENERAL_DEF_TMPL', 'Шаблон по умолчанию');
DEFINE('_SOBI2_CONFIG_GENERAL_DEF_TMPL_EXPL', 'Выбрать шаблон по умолчанию для SOBI2.');
DEFINE('_SOBI2_CONFIG_GENERAL_SORT_EXP_ASC', 'Сортировка срока действия по возрастанию');
DEFINE('_SOBI2_CONFIG_GENERAL_SORT_EXP_DESC', 'Сортировка срока действия по убыванию');

/*
 * added (RC 2.9)
 */
DEFINE('_SOBI2_INSTALLER_TPL_DELETE_ERROR', 'Не удается удалить некоторые файлы или каталоги');
DEFINE('_SOBI2_INSTALLER_TPL_DELETE_OK', 'Шаблон %name% удален');
DEFINE('_SOBI2_TPL_INSTALLED_OK', 'Шаблон %name% установлен');
DEFINE('_SOBI2_CONFIG_TPL_INSTALLED', 'Установленные шаблоны');
DEFINE('_SOBI2_CONFIG_TPL_PACK_UPLOAD', 'Загрузить новый шаблон');
DEFINE('_SOBI2_MENU_TPL_MANAGER', 'Менеджер шаблонов');
DEFINE('_SOBI2_MENU_TEMPLATES', 'Менеджер шаблонов');
DEFINE('_SOBI2_CAT_TPL', 'Шаблон');
DEFINE('_SOBI2_CAT_CHOOSE_TPL', 'Перезаписать шаблон');
DEFINE('_SOBI2_AVAILABLE_TPL', 'Доступные шаблоны:');
DEFINE('_SOBI2_CAT_CHOOSE_TPL_EXPL', 'Вы можете переписать стандартные шаблоны и ряд параметров по умолчанию для данной категории.');
DEFINE('_SOBI2_CHOOSE_TPL_TO_EDIT', 'Выберите шаблон для редактирования:');

/*
 * added (RC 2.8.7)
 */
DEFINE('_SOBI2_APPLY', 'Применить');

/*
 * added (RC 2.8.5)
 */
DEFINE('_SOBI2_DEFAULT_TOOLTIP_TITLE', 'Подсказка');

DEFINE('_SOBI2_CONFIG_ENTRY_NOTIFY_ADMIN_RENEW', 'Информировать администраторов о продлении срока');
DEFINE('_SOBI2_CONFIG_ENTRY_NOTIFY_ADMIN_RENEW_EXPL', 'Информировать администраторов если клиент/автор продлил запись.');
DEFINE('_SOBI2_CONFIG_ENTRY_NOTIFY_AUTHOR_RENEW', 'Отправлять подтверждение на e-mail о продлении.');
DEFINE('_SOBI2_CONFIG_ENTRY_NOTIFY_AUTHOR_RENEW_EXPL', 'Отправлять подтверждение на e-mail клиенту/автору о продлении его записи.');

DEFINE('_SOBI2_EMAIL_ON_SUBMIT_OPTGR', 'При добавлении записи');
DEFINE('_SOBI2_EMAIL_ON_UPDATE_OPTGR', 'При редактировании записи');
DEFINE('_SOBI2_EMAIL_ON_APPROVE_OPTGR', 'При одобрении записи');
DEFINE('_SOBI2_EMAIL_ON_PAYMENT_OPTGR', 'E-mail при оплате');
DEFINE('_SOBI2_EMAIL_ON_RENEW', 'При продлении записи (user)');
DEFINE('_SOBI2_EMAIL_ON_RENEW_ADMIN', 'При продлении записи (admin)');
DEFINE('_SOBI2_EMAIL_ON_RENEW_OPTGR', 'При продлении записи');

DEFINE('_SOBI2_TOOLBAR_GEN_DEB_REP', '<small>Проверить&nbsp;систему</small>');
DEFINE('_SOBI2_MENU_GEN_DEB_REP', 'Проверить систему');
DEFINE('_SOBI2_MENU_GEN_SYSCHECK_EXPL', 'Проверить, выполнены ли все требования для компонента SOBI2'. _SOBI2_ADM_EXPERIMENTAL_OPT);

DEFINE('_SOBI2_TOOLBAR_RECOUNT_NEEDED', 'Кол-во записей и категорий изменилось. Необходимо пересчитать их вновь.');
DEFINE('_SOBI2_TOOLBAR_RECOUNTED_SOFAR', ' Пересчитанные категории');
DEFINE('_SOBI2_TOOLBAR_RECOUNT_WAIT', ' Пожалуйста подождите. Временно останавливаю сервер.');
DEFINE('_SOBI2_TOOLBAR_RECOUNT_RESTART', 'Пожалуйста, подождите идет пересчет... ');
DEFINE('_SOBI2_TOOLBAR_RECOUNT_DONE', 'Пересчет выполнен. Пересчитано: ');
DEFINE('_SOBI2_TOOLBAR_RECOUNT_DONE_C', ' категорий');
DEFINE('_SOBI2_TOOLBAR_RECOUNT_CATS', 'Пересчитать');
DEFINE('_SOBI2_RECOUNT_LAST_DATE', 'Последний пересчет');
DEFINE('_SOBI2_TOOLBAR_RECOUNT_CATS_F', 'Пересчитать категории');
DEFINE('_SOBI2_RECOUNT_NOW', 'Пересчитать сейчас');
DEFINE('_SOBI2_RECOUNT_CATS_HEADER', 'Пересчитать кол-во подкатегорий и записей в категориях');

DEFINE('_SOBI2_CONFIG_L2CACHE_ON', 'Включить кеш второго уровня');
DEFINE('_SOBI2_CONFIG_L2CACHE_DV_ON', 'Включить кеширование для шаблона Details View (не рекомендуется)');
DEFINE('_SOBI2_CONFIG_L2CACHE_EXPL', '<b>Кеш второго уровня</b> - позволяет целиком кешировать сайт (отдельно список категорий и список записей). ');
DEFINE('_SOBI2_CONFIG_L2CACHE_LIFETIME', 'Срок хранения кеша второго уровня');
DEFINE('_SOBI2_CONFIG_L2CACHE_LIFETIME_SECONDS', 'секунд');
DEFINE('_SOBI2_CONFIG_L2CACHE_STRLEN', 'Максимально допустимая длина строки');
DEFINE('_SOBI2_CONFIG_L2CACHE_STRLEN_EXPL', 'Уменьшите значение, если Вы испытываете проблемы с обработкой кеша, например, если часть сайта не работает');

DEFINE('_SOBI2_CONFIG_L3CACHE_EXPL', '<b>Кеш третьего уровня</b> - кеширование объектов. Этот кеш будет обновлен для каждого объекта, если запись или категория были изменены. Не устанавливайте нулевой размер кеша, он необходим для подсчёта категорий.');
DEFINE('_SOBI2_CONFIG_L3CACHE_STRLEN', 'Максимально допустимая длина строки');
DEFINE('_SOBI2_CONFIG_L3CACHE_ON', 'Включить кеш третьего уровня');
DEFINE('_SOBI2_CONFIG_L3CACHE_CLEAR', 'Очистить кеш третьего уровня');

/*
 * added (RC 2.8.4)
 */
DEFINE('_SOBI2_QFIELD_ALLOW', 'Использовать "Быстрое редактирование"');
DEFINE('_SOBI2_QFIELD_ALLOW_ADM', 'Только для администратора');
DEFINE('_SOBI2_QFIELD_ALLOW_EXPL', 'Если Да, зарегистрированные пользователи получат возможность быстрого редактирования. Благодаря этой функции можно изменить несколько пользовательских полей непосредственно в режиме просмотра записи. Внимание: если пользователь редактирует запись, используя эту функцию, уведомление на e-mail не поступит!');

DEFINE('_SOBI2_CONFIG_ENTRY_RENEWAL', 'Продление');
DEFINE('_SOBI2_CONFIG_ENTRY_ALLOW_RENEWAL', 'Разрешить продление');
DEFINE('_SOBI2_CONFIG_ENTRY_ALLOW_RENEWAL_EXPL', 'Если Да, зарегистрированный пользователь будет иметь возможность продлевать срок записи.');
DEFINE('_SOBI2_CONFIG_ENTRY_ALLOW_REN_DAYS', 'Дней до истечения срока');
DEFINE('_SOBI2_CONFIG_ENTRY_ALLOW_REN_DAYS_EXPL', 'Введите здесь кол-во дней до истечения срока, пользователь должен иметь возможность доступ к функции продления.');
DEFINE('_SOBI2_CONFIG_ENTRY_RENEW_DISCOUNT', 'Скидка');
DEFINE('_SOBI2_CONFIG_ENTRY_RENEW_DISCOUNT_EXPL', 'Введите здесь, кол-во процентов для скидки (0-100).');
DEFINE('_SOBI2_CONFIG_ENTRY_RENEW_DAYS', 'Продлить на');
DEFINE('_SOBI2_CONFIG_ENTRY_RENEW_DAYS_EXPL', 'Установите срок публикации. Если установлено в 0, то по умолчанию запись с истекшим сроком будет опубликована');
DEFINE('_SOBI2_CONFIG_DAYS', 'дней');
DEFINE('_SOBI2_CONFIG_ENTRY_RENEWAL_HEADER', 'Настройки Обновления');
DEFINE('_SOBI2_CONFIG_ENTRY_RENEW_DELETE_FEES', 'Удалить старые платежи');
DEFINE('_SOBI2_CONFIG_ENTRY_RENEW_DELETE_FEES_EXPL', 'Если да,общая сумма всех выбранных платежей будет удалена. Если нет, все суммируется.');

DEFINE('_SOBI2_LISTING_MANAGER_STATUS_FILTER', 'Статус: ');
DEFINE('_SOBI2_LISTING_MANAGER_STATUS_FILTER_ALL', 'Все');
DEFINE('_SOBI2_LISTING_MANAGER_STATUS_FILTER_UP', 'Снятые с публикации');
DEFINE('_SOBI2_LISTING_MANAGER_STATUS_FILTER_P', 'Опубликованные');
DEFINE('_SOBI2_LISTING_MANAGER_STATUS_FILTER_UA', 'Неутвержденные');
DEFINE('_SOBI2_LISTING_MANAGER_STATUS_FILTER_A', 'Утвержденные');
DEFINE('_SOBI2_LISTING_MANAGER_STATUS_FILTER_E', 'Просроченные');

DEFINE('_SOBI2_REG_MANAGER_SAVE_ERR', 'Не удается сохранить файл реестра. Пожалуйста, попробуйте изменить его вручную.');
DEFINE('_SOBI2_REG_MANAGER_NEW_PAIR', 'Новый ключ: ');
DEFINE('_SOBI2_REG_MANAGER_ADD_PAIR', 'Добавить новый ключ');
DEFINE('_SOBI2_REG_MANAGER_NEW_SECTION', 'Новый раздел:');
DEFINE('_SOBI2_REG_MANAGER_ADD_SECTION', 'Добавить новый раздел');
DEFINE('_SOBI2_REG_MANAGER_WARNING', 'Дополнительные настройки. Экспериментальные - используете на свой страх и риск!');
DEFINE('_SOBI2_MENU_REG_MANAGER', 'Редактор реестра');
DEFINE('_SOBI2_MENU_EDIT_FORM_TEMPLATE', 'Шаблон Form');
DEFINE('_SOBI2_FORM_TEMPLATE_ENABLE','Используйте шаблон вместо стандартной функции');
DEFINE('_SOBI2_FORM_TEMPLATE_ENABLE_EXPL', 'Если Вы хотите использовать шаблон. Вы должны добавить каждую новую заказную область к шаблону вручную');

DEFINE('_SOBI2_CONFIG_DEBUG_TMPL', 'Обрабатывать шаблоны');
DEFINE('_SOBI2_CONFIG_GENERAL_EXSEARCH_CAT_FIELS_DEPEND', 'Показывать поля в зависимости от категорий');
DEFINE('_SOBI2_CONFIG_GENERAL_EXSEARCH_CAT_FIELS_DEPEND_EXPL', 'Показывать данные полей в результатах поиска в зависимости от предыдущей выбранной категории.');

/*
 * added (RC 2.8.3)
 */
DEFINE('_SOBI2_MENU_PLUGINS_DATATABLES', 'Таблица расширений в БД');
DEFINE('_SOBI2_PLUGINS_DATATABLES_NAME', 'Имя таблицы');
DEFINE('_SOBI2_PLUGINS_DATATABLES_PNAME', 'Имя расширения');
DEFINE('_SOBI2_PLUGINS_DATATABLES_INFO', 'Информация');
DEFINE('_SOBI2_PLUGINS_DATATABLES_ROWS', 'Ряды');
DEFINE('_SOBI2_PLUGINS_DATATABLES_CREATED', 'Создано');
DEFINE('_SOBI2_PLUGINS_DATATABLES_UPD', 'Обновлено');
DEFINE('_JS_SOBI2_PLUGINS_DATATABLE_DELETE', 'Вы действительно хотите удалить эту таблицу? Пожалуйста заметьте, что все данные будут удалены безвозвратно! ');
DEFINE('_SOBI2_PLUGINS_DATATABLE_DELETED', 'Таблица была удалена');

DEFINE('_SOBI2_MENU_TEMPLATES_AND_CSS', 'Оформление');

DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_SUBCATS_UNDER_CAT', 'Показывать список подкатегорий');
DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_SUBCATS_UNDER_CAT_EXPL', 'Показывать список подкатегорий ниже категории в стиле Yahoo.');
DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_NUMBER_SUBCATS', 'Кол-во подкатегорий');
DEFINE('_SOBI2_CONFIG_GENERAL_SORT_SUBCATS_BY', 'Сортировать подкатегории по');

DEFINE('_SOBI2_FIELD_USE_WYSIWYG_EXPL', 'Выберите, если хотите использовать TinyMCE редактор для данного поля в форме добавления или редактирования. Будет использоваться только если тип поля определен, как "textarea".');

/*
 * added (RC 2.8.2)
 */
DEFINE('_SOBI2_ABOUT_ADDONS', 'Дополнения для SOBI2');
DEFINE('_SOBI2_ABOUT_PBY', 'Ссылка "Powered by" ');
DEFINE('_SOBI2_ABOUT_NEWS',  'Новости Sigsiu.NET ');
DEFINE('_SOBI2_ABOUT_PBY_SHOW', 'Отображать ссылку "Powered by" ');
DEFINE('_SOBI2_ABOUT_PBY_SUPPORT', '<br /><strong>Если Вы удаляете ссылку "Powered by", то справедливо пожертвовать на развитие компонента.</strong><br /><br />Разработка и поддержание SOBI2 большая работа, которая должна быть соответственно вознаграждена.<br />Нажмите на кнопку &laquo;DONATE&raquo;, чтобы пожертвовать через Paypal.<br /><br /><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&amp;business=sigsiu%2enet%40sigsiu%2enet&amp;item_name=SOBI%202&amp;item_number=SOBI2-CAB&amp;no_shipping=2&amp;lc=US&amp;no_note=1&amp;tax=0&amp;currency_code=EUR&amp;bn=PP%2dDonationsBF&amp;charset=UTF%2d8" title="Пожертвовать на SOBI2" target="_blank"><img src="components/com_sobi2/images/donate_button.png" alt="Пожертвовать на SOBI2 через Paypal" title="Пожертвовать на SOBI2 через Paypal" border="0" /></a><br /><br />Спасибо!<br /><br />');
DEFINE('_SOBI2_ABOUT_PBY_JS_SUPPORT', 'Не забудьте пожертвовать!');
DEFINE('_SOBI2_CODEPRESS_TOGGLE', 'Переключить редактор');

/*
 * added (RC 2.8.1)
 */
DEFINE('_SOBI2_FPERMS_HEADER', 'Файловая система');
DEFINE('_SOBI2_FPERMS_ON', 'Измените права доступа к файлу/каталогу если необходимо <br />Если Вы испытываете проблемы с разрешениями установленными SOBI2, установите значение "Нет" и поменяйте разрешения вручную!');
DEFINE('_SOBI2_FPERMS_FMOD', 'Права доступа к файлу');
DEFINE('_SOBI2_FPERMS_DMOD', 'Права доступа к каталогу');
DEFINE('_SOBI2_FPERMS_WRITABLE', 'перезаписываемый');
DEFINE('_SOBI2_FPERMS_NWRITABLE', 'не перезаписываемый');
DEFINE('_SOBI2_CURRENT_FPERMS_HEADER', 'Права текущей директории');
DEFINE('_SOBI2_FIELDLIST_CSV_LIST', 'Добавьте список значений CSV');
DEFINE('_SOBI2_FIELDLIST_CSV_LIST_EXPL', 'Вы можете добавить список CSV опций и значений (значения разделенные запятыми): <ul><li>: только опции полей <b>опция 1; опция 2; опция 3;</b></li><li>опции полей со значениями: <b>опция_1:Значение 1; опция_1_2:Значение 2; опция_1_3:Значение 3;</b></li></ul>');
DEFINE('_SOBI2_FIELDLIST_CSV_SAVE', 'Сохранить список CSV');
DEFINE('_SOBI2_FIELDLIST_CSV_SAVE_EXPL', 'Сохранить список CSV вместо списка опций ниже.');

/*
 * added 14.08.2007 (RC 2.8)
 */
//to get it working in this language you need the language files of the calender too
DEFINED("_SOBI2_CALENDAR_LANG") || DEFINE("_SOBI2_CALENDAR_LANG", "ru");
DEFINED("_SOBI2_CALENDAR_FORMAT") || DEFINE("_SOBI2_CALENDAR_FORMAT", "dd-mm-y");

DEFINE('_SOBI2_FIELD_COLS_EXPL', 'Кол-во столбцов в поле ввода. Используется только в том случае, если выбран тип поля: textarea или же это ширина в пикселях если выбран тип ссылки на видеофайл или число столбцов типа: checkbox group');
DEFINE('_SOBI2_FIELD_PREFERRED_SIZE_EXPL', 'Размер для inputbox или select list. Действует только если inputbox или select list выбраны в качестве типа поля.');
DEFINE('_SOBI2_TOOLBAR_ADD_NEW_CAT', 'Добавить категорию');
DEFINE('_SOBI2_TOOLBAR_ADD_NEW_ITEM', 'Добавить запись');

DEFINE('_SOBI2_CHECKBOX_YES', 'Да');
DEFINE('_SOBI2_CHECKBOX_NO', 'Нет');

DEFINE('_SOBI2_CONFIG_GENERAL_FORCE_MENUID', 'Использовать уникальный ID меню');
DEFINE('_SOBI2_CONFIG_GENERAL_FORCE_MENUID_EXPL', 'Если да, то будет использоваться уникальный идентификатор меню для ссылок SOBI2. В противном случае будут использованы нынешние идентификаторы меню.');

DEFINE('_SOBI2_FIELD_ADM_ONLY', 'Административное поле');
DEFINE('_SOBI2_FIELD_ADM_ONLY_EXPL', 'Только администратор будет иметь возможность вводить данные в это поле через административную панель.');

DEFINE('_SOBI2_ALLOW_FE_ENTRIES', 'Разрешить добавление записей');
DEFINE('_SOBI2_TOOLBAR_ADD_CATS_SERIE', 'Добавить категории');
DEFINE('_SOBI2_ADD_CATS_SERIE_NAMES', 'Вставить список категорий, разделенных знаком "точка с запятой"');
DEFINE('_SOBI2_ADD_CATS_SERIE_NAMES_EXPL', 'Вставить список имен категорий, текстов  вступления и иконок категорий, разделенный знаком точки с запятой, для добавления множества категорий за раз. Имя категории, текст и иконка разделяются двоеточиями.<br /><strong>Категории добавляются в предыдущую выбранную категорию.</strong><br /><br />Примеры:<br />Только имена категорий: имя категории 1; имя категории  2; имя категории 3;<br />Имена категорий с текстом и/или иконки категорий: имя категории 1 : текст 1; имя категории 2 : текст 2; имя категории 3 : текст 3 : icon.png;<br />Только имя категории и иконка: имя категории 1 :: icon.png;');

DEFINE('_SOBI2_LANG_REMOVED', 'Язык удален');
DEFINE('_SOBI2_LANG_REM_ERROR', 'При удалении языка произошла ошибка');
DEFINE('_SOBI2_LANG_NOT_REM_ERROR', 'Язык не может быть удален');
DEFINE('_SOBI2_LANG_FOR_VER', 'Для версии');
DEFINE('_SOBI2_CONFIG_LANGMAN_LIST_CREATED', 'Дата создания');
DEFINE('_SOBI2_CONFIG_LANGMAN_INSTALLED_LANGS', 'Установленные языки');
DEFINE('_SOBI2_CONFIG_LANG_PACK_UPLOAD', 'Загрузить новый языковой пакет');
DEFINE('_SOBI2_CONFIG_LANGMAN_XML_PARSE_ERROR_NO_FILE', 'XML-файл не найден');

DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_DESCRIPTION_ON_SEARCHPAGE', 'Показывать описание компонента на странице поиска');

DEFINE('_SOBI2_CONFIG_PAYMENTS_PAY_PAL_RETURL', 'Ссылка для ответа');
DEFINE('_SOBI2_CONFIG_PAYMENTS_PAY_PAL_RETURL_EXPL', 'Ссылка на которую пользователь будет перенаправлен после оплаты.');
DEFINE('_SOBI2_CONFIG_PAYMENTS_CURRENCY_TEXT', 'Код валюты');

DEFINE('_SOBI2_CONFIG_GENERAL_EXSEARCH_CATCONT_HEIGHT', 'Высота контейнера категорий');
DEFINE('_SOBI2_CONFIG_GENERAL_EXSEARCH_CATCONT_HEIGHT_EXPL', 'Если Вы показываете/скрываете кнопку расширенного поиска, Вам нужно определить высоту контейнера категорий. Пожалуйста обратите внимание что высота должна быть достаточно большой Один контейнер имеет около 25 px (зависит от вашего шаблона CMS).');
DEFINE('_SOBI2_CONFIG_GENERAL_EXSEARCH_SEQUENCE', 'Упорядочить');
DEFINE('_SOBI2_CONFIG_GENERAL_EXSEARCH_SEQUENCE_FIELD_FIRST', 'Сначала пользовательские поля');
DEFINE('_SOBI2_CONFIG_GENERAL_EXSEARCH_SEQUENCE_CAT_FIRST', 'Сначала категории');
DEFINE('_SOBI2_CONFIG_GENERAL_EXSEARCH_SEQUENCE_EXPL', 'Выберите порядок категорий и пользовательских полей выпадающих списков в контейнере расширенных опций поиска.');

DEFINE('_SOBI2_CONFIG_ENTRY_WS_HEADER', 'Way Search');
DEFINE('_SOBI2_CONFIG_ENTRY_WS_FIELDS_ASSIGMENT', 'Назначение полей');

DEFINE('_SOBI2_CONFIG_SYSTEM_MAILS', 'Системные сообщения');
DEFINE('_SOBI2_CONFIG_SYSTEM_MAILS_ADM_MAIL_USERS', 'Посылать системные сообщения на');
DEFINE('_SOBI2_CONFIG_SYSTEM_MAILS_ADM_MAIL_USERS_EXPL', 'Укажите какой группе пользователей отправлять уведомления.');
DEFINE('_SOBI2_CONFIG_SYSTEM_MAILS_USER_MAIL', 'Использовать в качестве e-mail адреса клиента');
DEFINE('_SOBI2_CONFIG_SYSTEM_MAILS_USER_MAIL_EXPL', 'Откуда брать e-mail адрес клиента? Выберите между записью SOBI2 или "Менеджером пользователей" CMS. Заметьте, что если решение пало на "Менеджер пользователей" CMS, добавление записей должно быть разрешено только зарегистрированным пользователям.');
DEFINE('_SOBI2_CONFIG_SYSTEM_MAILS_USER_MAIL_SOBI', 'Введенный в записи SOBI2');
DEFINE('_SOBI2_CONFIG_SYSTEM_MAILS_USER_MAIL_CMS', 'Установленный во время регистрации пользователя');
DEFINE('_SOBI2_CONFIG_SYSTEM_MAILS_USER_FID', 'Поле, в котором хранится e-mail адрес');
DEFINE('_SOBI2_CONFIG_SYSTEM_MAILS_USER_FID_EXPL', 'Укажите поле, в котором хранится e-mail адрес. Используются только адреса из записи SOBI2.');

DEFINE('_SOBI2_ALL_LISTING_NON_FREE_OPT', 'Общее количество');
DEFINE('_SOBI2_CONFIG_SEARCH_OPT', 'Настройки поиска');
DEFINE('_SOBI2_CONFIG_GENERAL_EXSEARCH_USE_SLIDER', 'Использовать кнопку расширенных опций поиска');
DEFINE('_SOBI2_CONFIG_GENERAL_EXSEARCH_USE_SLIDER_EXPL', 'Если да, будет показана кнопка для показа/скрытия контейнера расширенных возможностей поиска.');
DEFINE('_SOBI2_CONFIG_GENERAL_EXSEARCH_SLIDER_FADE_ON_START', 'Скрывать при запуске');
DEFINE('_SOBI2_CONFIG_GENERAL_EXSEARCH_SLIDER_FADE_ON_START_EXPL', 'Если Да, контейнер выборов расширенного поиска спрятан в начале (только если кнопка выбора расширенного поиска использована).');
DEFINE('_SOBI2_CONFIG_GENERAL_EXSEARCH_SLIDER_FADE_AFTER_SEARCH', 'Скрывать после поиска');
DEFINE('_SOBI2_CONFIG_GENERAL_EXSEARCH_SLIDER_FADE_AFTER_SEARCH_EXPL', 'Если Да, контейнер выборов расширенного поиска будет спрятан после поиска (только если кнопка выборов расширенного поиска использована).');

DEFINE('_SOBI2_LISTING_MANAGER_SEARCH_ONLY_START', 'Только пункты, которые начинаются с указанного слова');
DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_ALPHA', 'Показывать алфавитный указатель');

DEFINE('_SOBI2_FORM_JS_CAT_NO_PARENT_CAT', 'Вы не можете добавить запись к категории имеющей подкатегории. Пожалуйста, выберите одну из подкатегорий.');
DEFINE('_SOBI2_FIELDLIST_SELECT', '&nbsp;---- выберите ----&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
DEFINE('_SOBI2_FIELDLIST_LIST_OF_VALUES', 'Список встроенного выбора список/чекбокс групп');
DEFINE('_SOBI2_FIELDLIST_NEW_VALUE_PAIR', 'Добавьте новую пару случайных величин ');
DEFINE('_SOBI2_FIELDLIST_OPT_NAME', 'Выбор имени');
DEFINE('_SOBI2_FIELDLIST_OPT_VALUE', 'Выбор значения');
DEFINE('_SOBI2_FIELDLIST_DELETE_VALUE_PAIR', 'Удаление пары случайных величин');
DEFINE('_SOBI2_FIELDLIST_SORT_VALUES', 'Выбор сортировки');
DEFINE('_SOBI2_FIELDLIST_SORT_VALUES_EXPL', 'Выбор сортировки добавляет форму сортировки записей в алфавитном порядке.');
DEFINE('_SOBI2_FIELDLIST_ADD_SELECT_LABEL', 'Добавить выбор');
DEFINE('_SOBI2_FIELDLIST_ADD_SELECT_LABEL_EXPL', 'Если есть текст "Выбор", выбор должен быть показан.');

DEFINE('_SOBI2_SAVE_IMG_TO_BIG', 'Неудачная загрузка изображения! Загружаемый файл слишком большой. Размер файла: ');
DEFINE('_SOBI2_EF_MAX_FILE_SIZE', ' Размер файла должен быть не более ');
DEFINE('_SOBI2_EF_KB_FILE_SIZE', ' кб');

/*
 * added 24.07.2007 (RC 2.7.4)
 */
DEFINE('_SOBI2_MENU_EULA', 'Соглашение');
DEFINE('_SOBI2_CONFIG_GENERAL_USE_EXSEARCH', 'Использовать расширенный поиск');
DEFINE('_SOBI2_CONFIG_GENERAL_USE_EXSEARCH_EXPL', 'Использовать расширенный поиск вместо обычного.');
DEFINE('_SOBI2_CONFIG_ENTRY_GMAPS_NOTICE', 'Google Maps (необходимы географические координаты для каждой записи)');

/*
 * added 8.06.2007 (RC 2.7.2)
 */
DEFINE('_SOBI2_CONFIG_GENERAL_USE_ATREE', 'Использование SigsiuTree');
DEFINE('_SOBI2_CONFIG_GENERAL_USE_ATREE_EXPL', 'Используйте SigsiuTree вместо нормального dTree. Это полезное если у Вас есть много категорий и окно просмотра оставляет в синтаксическом анализе код javascript.');
DEFINE('_SOBI2_CONFIG_GENERAL_ATREE_IMAGES', 'Изображения SigsiuTree');

/*
 * added 18.05.2007 (RC 2.7.1)
 */
DEFINE('_SOBI2_CONFIG_CUSTOM_FIELD_CUSTOM_CODE', 'Текстовый код');
DEFINE('_SOBI2_CONFIG_CUSTOM_FIELD_CUSTOM_CODE_EXPL', '
В текстовых полях нормальный текст с тегами html может быть отображен в форме "добавить/редактировать запись". Вы также можете добавить описание. <br /><br /><strong> Описание отображается ТОЛЬКО в форме добавления записи. Ничего не сохраняется в базе данных!</strong><br /><br />
Вставьте ваш текстовый код в поле ввода текста. Он может быть выведен вместо нормального поля. Вы можете использовать следующие шаблоны замены: <br />
<ul>
<li>{componentName} -  Заменяется именем SOBI2 (настраивается в Глобальная конфигурация - Имя компонента)</li>
<li>{sitename} - Заменяется именем сайта</li>
<li>{sobi2Lang} - Заменяется выбранным языком</li>
<li>{currency} - Заменяется валютой (настраивается- параметры оплаты- выбор валюты)</li>
<li>{entryExpirationTime} - Заменяется количеством дней публикации</li>
<li>{imgLabel} - Заменяется изображением (настраивается в параметрах добавления  - Image Label) </li>
<li>{priceForImg} - Заменяется ценой на изображение (настраивается в параметрах добавления  - Цена для изображения)</li>
<li>{icoLabel} - Заменяется иконкой (настраивается в параметрах добавления  - Icon Label) </li>
<li>{priceForIco} - Заменяется ценой на иконку (настраивается в параметрах добавления - Цена на иконку)</li>
<li>{bankData} - Заменяется данными банковского платежа</li>
<li>{payPalMail} - Заменяется e-mail адресом для PayPal (настраивается - параметры платежа - E-mail адрес для PayPal) </li>
<li>{payPalUrl} - Заменяется ссылку на PayPal (настраивается - параметры платежа - Ссылка на Paypal) </li>
<li>{paymentReference} - Заменяется ссылкой для оплаты(настраивается - параметры платежа - ссылка для оплаты)</li>
<li>{basicPrice} - Заменяется стоимостью основного поля (настраивается в конфигурации Поля - Стоимость для основного поля)</li>
<li>{basicPriceLabel} - Заменяется заголовком основного поля (настраивается в конфигурации Поля - Заголовок для главного поля)</li>
<li>{googleApiKey} - Заменяется ключом  API Google(настраивается в конфигурации Вид - Google Maps - ключ API)</li>
</ul>
');

/*
 * added 17.04.2007 (RC 2.7.0)
 */
DEFINE('_SOBI2_CONFIG_CACHE_DESCRIPTION_TEXT', 'Настройки кеша');
DEFINE('_SOBI2_CONFIG_CACHE_ON', 'Кеширование включено');
DEFINE('_SOBI2_CONFIG_CACHE_LIFETIME', 'Время жизни кеша');
DEFINE('_SOBI2_CONFIG_CACHE_LIFETIME_EXPL', 'Срок хранения кеша может быть установлен на длительный срок, поскольку кеш будет обновлен после любого изменения в SOBI2. Например, если пользователь отредактировал запись или администратор изменил конфигурацию.');
DEFINE('_SOBI2_CONFIG_CACHE_LIFETIME_SEC', 'Секунд');
DEFINE('_SOBI2_CONFIG_CACHE_LIFETIME_MIN', 'Минут');
DEFINE('_SOBI2_CONFIG_CACHE_LIFETIME_HOURS', 'Часов');
DEFINE('_SOBI2_CONFIG_CACHE_LIFETIME_DAYS', 'Дней');
DEFINE('_SOBI2_CONFIG_CACHE_EMPTY', 'Очистить кеш');
DEFINE('_SOBI2_CONFIG_CACHE_REMOVED', 'Кеш удален');
DEFINE('_SOBI2_CONFIG_CACHE_DIR', 'Каталог кеш');
DEFINE('_SOBI2_CONFIG_CACHE_DIR_EXPL', 'В котором кеш должен храниться. Для абсолютного пути адрес должен начинаться с символа /. В противном случае адрес связан с корнем CMS.');
DEFINE('_SOBI2_CONFIG_PAYMENTS_PAY_PAL_URL', 'Ссылка на Paypal');
DEFINE('_SOBI2_CONFIG_PAYMENTS_PAY_PAL_URL_EXPL', 'Вы можете изменить ссылку на PayPal здесь. Например Вы можете использовать режим Paypal sandbox. По умолчанию он должен быть по адресу https://www.paypal.com/cgi-bin/webscr');

DEFINE('_SOBI2_MENU_EDIT_VC_TEMPLATE', 'Шаблон V-Card');
DEFINE('_SOBI2_VC_TEMPLATE_ENABLE', 'Использовать шаблон вместо стандартной функции');
DEFINE('_SOBI2_VC_TEMPLATE_ENABLE_EXPL', 'Если Вы хотите использовать шаблон, вам нужно добавить любое произвольное поле в шаблон вручную. Настройки New-Line из диспетчера полей не будут работать если используется шаблон V-Card.');
DEFINE('_SOBI2_CONFIG_GENERAL_USE_RSS', 'Использовать ленту RSS');

/*
 * added 16.02.2007 (RC 2.6.1)
 */
DEFINE('_SOBI2_MENU_ERRLOG', 'Журнал ошибок');
DEFINE('_SOBI2_ERRLOG_FILE_SIZE', 'Размер журнала: ');
DEFINE('_SOBI2_ERRLOG_FILE_TOO_BIG', '<big>Размер журнала очень большой (более 500 кб). Это может замедлить работу сервера и браузера.</big>');
DEFINE('_SOBI2_ERRLOG_FILE_SHOW', 'Показывать файл в любом случае');
DEFINE('_SOBI2_ERRLOG_FILE_DOWNLOAD_FULL', 'Загрузить журнал');
DEFINE('_SOBI2_ERRLOG_FILE_DELETE', 'Удалить');
DEFINE('_SOBI2_ERRLOG_FILE_DOWNLOAD', 'Загрузка');
DEFINE('_SOBI2_ERRLOG_NO_FILE', '<big>Не удалось открыть журнал ошибок, либо журнала нет из-за отсутствия ошибок.</big>');
DEFINE('_SOBI2_ERRLOG_FILE_DELETED', 'Журнал ошибок удален');
DEFINE('_SOBI2_ERRLOG_FILE_NOT_DELETED', 'Не удалось удалить журнал ошибок ');

DEFINE('_SOBI2_ERR_NOTICE', 'PHP Notice - Не паникуйте. Уведомление может помочь вам/нам найти решение, если что-то пойдет не так');
DEFINE('_SOBI2_ERR_WARNING', 'PHP Warning - Вы должны уведомить нас о предупреждении на форуме SOBI2');
DEFINE('_SOBI2_ERR_ERROR', 'PHP Error - Критическая ошибка. Пожалуйста, сообщите нам об этом на форуме SOBI2');
DEFINE('_SOBI2_ERR_INTERN', 'Internal SOBI2 Error - Внутренняя ошибка SOBI2. Эта информация полезна при поиске решения, если что-то пойдет не так');
DEFINE('_SOBI2_CONFIG_DEBUG_DESCRIPTION_TEXT', 'Отладка и обработка ошибок');
DEFINE('_SOBI2_CONFIG_DEBUG_LEVEL', 'Уровень отладки');
DEFINE('_SOBI2_CONFIG_DEBUG_SHOW_ERR', 'Показывать ошибки');
DEFINE('_SOBI2_CONFIG_DEBUG_LEVEL_0', 'Нет');
DEFINE('_SOBI2_CONFIG_DEBUG_LEVEL_7', 'Только критические ошибки');
DEFINE('_SOBI2_CONFIG_DEBUG_LEVEL_8', 'Ошибки и предупреждения (рекомендуется)');
DEFINE('_SOBI2_CONFIG_DEBUG_LEVEL_9', 'Все ошибки, предупреждения и уведомления');

/*
 * added 19.11.06 (RC 2.5.7)
 */
DEFINE('_SOBI2_FIELD_VIDEO', 'медиа файл');
DEFINE('_SOBI2_BASE_ENTRY_FEES', 'Стоимость заполнения общих полей');
DEFINE('_SOBI2_BASE_ENTRY_FEES_EXPL', 'Оставьте пустым или введите 0, если общие поля бесплатны для заполнения.');
DEFINE('_SOBI2_BASE_ENTRY_FEES_LABEL', 'Название для обозначения стоимости общих полей');
DEFINE('_SOBI2_BASE_ENTRY_FEES_LABEL_EXPL', 'Данное название будет показано при отображении экрана с общей суммой.');
DEFINE('_SOBI2_FIELD_IS_URL_EXPL', 'Выберите если данное поле предназначено для отображения интернет ссылки, e-mail адреса, ссылки на изображение или ссылки на видео/аудио файл.');
DEFINE('_SOBI2_FIELD_ROWS_EXPL', 'Кол-во строк в поле ввода. Используется только в том случае, если выбран тип поля: textarea или же это высота в пикселях, если выбран тип ссылки на видео файл.');

/*
 * added 28.10.06 (RC 2.5)
 */
DEFINE('_SOBI2_FIELD_IMG', 'изображение');
DEFINE('_SOBI2_LISTING_FILTER', 'Фильтр: ');
DEFINE('_SOBI2_CONFIG_ENTRY_ALLOW_BACKGROUND', 'Разрешить выбор фонового изображения');
DEFINE('_SOBI2_CONFIG_ENTRY_ALLOW_BACKGROUND_EXPL', 'Разрешить пользователям выбирать фоновое изображение при отображение подробностей и записей в категориях.');
DEFINE('_SOBI2_CONFIG_VIEW_ALLOW_ANO', 'Незарегистрированные пользователи могут видеть запись с подробностями');
DEFINE('_SOBI2_CONFIG_VIEW_ALLOW_ANO_EXPL', 'Разрешить незарегистрированным пользователям просматривать запись с подробностями.');

DEFINE('_SOBI2_PLUGIN_ENABLED', 'Расширение опубликовано');
DEFINE('_SOBI2_PLUGIN_DISABLED', 'Расширение отключено');
DEFINE('_SOBI2_PLUGINS_INSTALLER_PI_DELETE_FILES_ERROR', 'Невозможно удалить некоторые файлы или папки');
DEFINE('_SOBI2_PLUGINS_INSTALLER_PI_DELETE_ERROR', 'Невозможно удалить данные о расширении из базы данных');
DEFINE('_SOBI2_PLUGINS_INSTALLER_PI_DROP_ERROR', 'Невозможно вставить данные в базу данных');
DEFINE('_SOBI2_PLUGINS_INSTALLER_PI_NOT_FOUND', 'Невозможно найти данные о расширении в базе данных');
DEFINE('_SOBI2_PLUGINS_INSTALLER_REMOVED', ' Расширение успешно удалено');
DEFINE('_SOBI2_PLUGINS_INSTALLER_PID_MISSING', 'Пожалуйста, выберите из списка');
DEFINE('_SOBI2_PLUGINS_INSTALLER_COPY_ERROR', 'Ошибка при копировании файлов');
DEFINE('_SOBI2_PLUGINS_INSTALLER_INSTALLED', ' Расширение установлено успешно');
DEFINE('_SOBI2_PLUGINS_INSTALLER_ERROR', 'Ошибка при установке нового расширения');
DEFINE('_SOBI2_PLUGINS_INSTALLER_ALLREADY_EXISTST', 'Расширение с таким названием уже установлено');
DEFINE('_SOBI2_PLUGINS_ENABLED', 'Опубликован');
DEFINE('_SOBI2_PLUGINS_POSITION', 'Порядок');
DEFINE('_SOBI2_PLUGINS_INIT_FILE', 'Файл');
DEFINE('_SOBI2_PLUGINS_AUTHOR', 'Автор');
DEFINE('_SOBI2_PLUGINS_AUTHOR_URL', 'Сайт автора');
DEFINE('_SOBI2_PLUGINS_VER', 'Версия');
DEFINE('_SOBI2_CONFIG_PLUGINS_INSTALLED_PLUGINS', 'Установленные расширения');
DEFINE('_SOBI2_CONFIG_PLUGINS_INSTALL_NEW', 'Установить новое расширение');
DEFINE('_SOBI2_CONFIG_PLUGINS_UPLOAD', 'Загрузка файла пакета с последующей установкой расширения');
DEFINE('_SOBI2_MENU_PLUGINS_HEADER', 'Расширения');
DEFINE('_SOBI2_MENU_PLUGINS_MANAGER', 'Менеджер расширений');
DEFINE('_SOBI2_PLUGIN_HEADER', 'Расширения');

/*
 * added 10.10.2006 (RC 2)
 */
DEFINE('_SOBI2_MENU_EDIT_TEMPLATE', 'Шаблон Details View');

DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_COUNTER', 'Подсчитывать кол-во записей и подкатегорий');
DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_COUNTER_EXPL', 'Отображать кол-во записей и подкатегорий сразу за названием категории в списке категорий.');
DEFINE('_SOBI2_CONFIG_ENTRY_ALLOW_ADDING_TO_PARENT', 'Разрешить добавлять записи в родительскую категорию');
DEFINE('_SOBI2_CONFIG_ENTRY_ALLOW_ADDING_TO_PARENT_EXPL', 'Разрешить добавлять записи в категории имеющие подкатегории');

DEFINE('_SOBI2_MENU_VER_CHECKER', 'Проверить обновления');
DEFINE('_SOBI2_CONFIG_CHECK_VER', 'Проверить Вашу версию SOBI2');
DEFINE('_SOBI2_CONFIG_ACT_VER', 'Ваша версия: ');
DEFINE('_SOBI2_CONFIG_VER_CHECK', 'Проверить на наличие новой версии');
DEFINE('_SOBI2_CONFIG_VER_CHECK_ERROR', 'Невозможно соединится с сервером. Пожалуйста? проверьте Ваше интернет соединение или попробуйте позже!');

DEFINE('_SOBI2_MENU_EMAILS', 'Шаблоны сообщений');
DEFINE('_SOBI2_CONFIG_MAIL_LINK_MARKERS', 'Описание маркеров');
DEFINE('_SOBI2_CONFIG_MAIL_ABOUT_MARKERS', 'Следующие маркеры могут быть использованы при составлении шаблонов почтовых сообщений: ' .
'<ul>' .
'<li>{sobi} - будет заменено на заголовок компонента SOBI2 (настраивается в \"Общие параметры\" - \"Заголовок для компонента\")</li>' .
'<li>{sitename} - будет заменено на название сайта</li>' .
'<li>{user} - будет заменено на имя пользователя</li>' .
'<li>{id} - будет заменено на SOBI2 ID</li>' .
'<li>{title} - будет заменено на заголовок записи</li>' .
'<li>{link_details} - будет заменено на ссылку на просмотр подробностей</li>' .
'<li>{link_edit} - будет заменено на ссылку на функцию редактирования</li>' .
'<li>{expiration_date} - будет заменено на дату окончания публикации записи</li>' .
'<li>{expiration_time} - будет заменено на кол-во дней публикации</li>' .
'<li>{selected_options}  - будет заменено на выбранные платные параметры (только для сообщений об оплате)</li>' .
'<li>{total}  - будет заменено на итоговую сумму для оплаты платных параметров (только для сообщений об оплате)</li>' .
'<li>{paypal_url}  - будет заменено ссылкой на PayPal (только для сообщений об оплате)</li>' .
'<li>{bank_data}  - будет заменено на банковскую информацию об оплате (только для сообщений об оплате)</li>' .
'</ul>' .
'Вы так же можете использовать любое из существующих полей, как маркер. К примеру: {field_email} будет заменено на значение данного поля для field_email. В данном случае на адрес электронной почты.');

DEFINE('_SOBI2_CONFIG_EMAILS', 'Текст сообщения');
DEFINE('_SOBI2_CONFIG_FOOTER', 'Подпись в сообщении');
DEFINE('_SOBI2_CONFIG_FOOTER_EXPL', 'Данный текст будет добавлен к каждому сообщению.');
DEFINE('_SOBI2_PLEASE_WAIT', 'Пожалуйста подождите... ');
DEFINE('_SOBI2_READY', 'Готово: ');
DEFINE('_SOBI2_SELECT_OPTION_TO_EDIT', 'Выберите шаблон для редактирования: ');
DEFINE('_SOBI2_EMAIL_ON_SUBMIT', 'При добавлении записи (пользователю)');
DEFINE('_SOBI2_EMAIL_ON_UPDATE', 'При редактировании записи (пользователю)');
DEFINE('_SOBI2_EMAIL_ON_APPROVE', 'При одобрении записи (пользователю)');
DEFINE('_SOBI2_EMAIL_ON_PAYMENT', 'Сообщение об оплате (пользователю)');
DEFINE('_SOBI2_EMAIL_ON_SUBMIT_ADMIN', 'При добавлении записи (администратору)');
DEFINE('_SOBI2_EMAIL_ON_UPDATE_ADMIN', 'При редактировании записи (администратору)');
DEFINE('_SOBI2_EMAIL_ON_PAYMENT_ADMIN', 'Сообщение об оплате (администратору)');
DEFINE('_SOBI2_EMAIL_TEXT', 'Текст сообщения: ');
DEFINE('_SOBI2_EMAIL_TITLE', 'Тема сообщения: ');
DEFINE('_SOBI2_CONFIG_MAIL_LANG_EXPL', 'Выберите язык для редактирования поля.');
DEFINE('_SOBI2_CONFIG_MAIL_LANG', 'Выберите язык:');

DEFINE('_SOBI2_CONFIG_ENTRY_NOTIFY_ADMIN_PAYMENT_EXPL', 'Пересылать сообщение администраторам, если добавлена новая запись, требующая оплаты некоторых параметров.');

/*
 * added 02.10.2006 (RC 1)
 */
DEFINE('_SOBI2_CONFIG_ENTRY_NOTIFY_ADMIN_PAYMENT', 'Переслать сообщение об оплате администраторам');
DEFINE('_SOBI2_CONFIG_FIELDS_EDIT_TO_CHANGE', 'Вы должны отредактировать поле для изменения данного параметра');
DEFINE('_SOBI2_CONFIG_FIELDS_CANNOT_BE_CHANGE', 'Данный параметр не может быть изменен');
DEFINE('_SOBI2_CONFIG_ENTRY_GMAPS_ON', 'Отображать Google Maps');
DEFINE('_SOBI2_CONFIG_ENTRY_GMAPS_ON_EXPL', 'Отображать/Спрятать карту (обязателен Google Api Ключ)');
DEFINE('_SOBI2_CONFIG_ENTRY_GMAPS_API', 'API ключ');
DEFINE('_SOBI2_CONFIG_ENTRY_GMAPS_API_EXPL', 'Google Maps API ключ для сайта');
DEFINE('_SOBI2_CONFIG_ENTRY_GMAPS_W', 'Ширина карты');
DEFINE('_SOBI2_CONFIG_ENTRY_GMAPS_W_EXPL', 'Ширина карты в пикселях.');
DEFINE('_SOBI2_CONFIG_ENTRY_GMAPS_H', 'Высота карты');
DEFINE('_SOBI2_CONFIG_ENTRY_GMAPS_H_EXPL', 'Высота карты в пикселях.');
DEFINE('_SOBI2_CONFIG_ENTRY_GMAPS_LAT', 'Поле для значения широты карты');
DEFINE('_SOBI2_CONFIG_ENTRY_GMAPS_LAT_EXPL', 'Выберите поле, в котором будет сохранена широта для карты.');
DEFINE('_SOBI2_CONFIG_ENTRY_GMAPS_LON', 'Поле для значения долготы карты');
DEFINE('_SOBI2_CONFIG_ENTRY_GMAPS_LON_EXPL', 'Выберите поле, в котором будет сохранена долгота для карты.');
DEFINE('_SOBI2_CONFIG_ENTRY_GMAPS_BUBBLE', 'Информационное окно');
DEFINE('_SOBI2_CONFIG_ENTRY_GMAPS_BUBBLE_EXPL', 'Разрешить информационное окно с формой "Узнать направление".');
DEFINE('_SOBI2_CONFIG_ENTRY_GMAPS_BUBBLE_DISABLE', 'Отключить информационное окно направления');
DEFINE('_SOBI2_CONFIG_ENTRY_GMAPS_BUBBLE_EN_WAIT', 'Разрешить, но открывать информационное окно по нажатию маркера');
DEFINE('_SOBI2_CONFIG_ENTRY_GMAPS_BUBBLE_EN_OPEN', 'Разрешить, но открывать информационное окно, когда будет загружена карта');
DEFINE('_SOBI2_CONFIG_ENTRY_GMAPS_ZOOM', 'Масштаб увеличения');
DEFINE('_SOBI2_CONFIG_ENTRY_GMAPS_ZOOM_EXPL', 'Начальный уровень масштабирования карты.');

/*
 * added 26.09.2006 (Beta 2.2)
 */
DEFINE('_SOBI2_CONFIG_SECIMG_USING_FAILED', 'Ваш сервер не поддерживает необходимые возможности для создания кода безопасности и поэтому данная функция у Вас отключена.');

/*
 * added 23.09.2006 (Beta 2.1)
 */
DEFINE('_SOBI2_CONFIG_ENTRY_MAX_FILE_SIZE', 'Максимальный размер загружаемых файлов');
DEFINE('_SOBI2_CONFIG_ENTRY_FILE_SIZE_BYTES', 'кб');

/*
 * added 18.09.2006
 */
DEFINE('_SOBI2_MENU_LANG_MANAGER', 'Менеджер языков');
DEFINE('_SOBI2_CONFIG_LANGMAN_INSTALL_NEW', 'Установить новый языковой пакет');
DEFINE('_SOBI2_CONFIG_LANGMAN_INSTALL_BT', 'Установка');
DEFINE('_SOBI2_CONFIG_LANGMAN_NO_FILE', 'Ошибка: невозможно найти загруженный языковой пакет');
DEFINE('_SOBI2_CONFIG_LANGMAN_FILE_EXT_ERROR', 'Ошибка: не разрешенные расширения файлов. Установка отменена.');
DEFINE('_SOBI2_CONFIG_LANGMAN_FILE_UPLOAD_ERROR', 'Ошибка: невозможно скопировать языковой пакет в установочную папку. Установка отменена.');
DEFINE('_SOBI2_CONFIG_LANGMAN_FILE_EXTRACT_ERROR', 'Ошибка: невозможно распаковать языковой пакет. Установка отменена.');
DEFINE('_SOBI2_CONFIG_LANGMAN_XML_PARSE_ERROR', 'Ошибка: невозможно обработать XML файл. Установка отменена.');
DEFINE('_SOBI2_CONFIG_LANGMAN_FP_FILE_COPY_ERROR', 'Ошибка: невозможно скопировать файл для публичной части сайта. Установка отменена.');
DEFINE('_SOBI2_CONFIG_LANGMAN_BE_FILE_COPY_ERROR', 'Нет файла для административной части сайта. ');
DEFINE('_SOBI2_CONFIG_LANGMAN_LABELS_MISSING_ERROR', 'Внимание: отсутствуют надписи для полей. ');
DEFINE('_SOBI2_CONFIG_LANGMAN_ALL_LABELS_INSTALLED', 'Новый языковой пакет установлен успешно.');
DEFINE('_SOBI2_CONFIG_LANGMAN_NOT_ALL_LABELS_INSTALLED', 'Внимание: некоторые из надписей отсутствуют. ');

/*
 * added 14.09.2006
 */
DEFINE('_SOBI2_CONFIG_ENTRY_NOTIFY_ADMIN_EDIT', 'Информировать администратора об изменениях');
DEFINE('_SOBI2_CONFIG_ENTRY_NOTIFY_ADMIN_EDIT_EXPL', 'Информировать администратора об изменении записи пользователем/автором.');
DEFINE('_SOBI2_CONFIG_ENTRY_NOTIFY_AUTHOR_NEW', 'Отправлять подтверждающее сообщение');
DEFINE('_SOBI2_CONFIG_ENTRY_NOTIFY_AUTHOR_NEW_EXPL', 'Отправлять подтверждающее сообщение о записи пользователю/автору.');
DEFINE('_SOBI2_CONFIG_ENTRY_NOTIFY_AUTHOR_EDIT', 'Отправлять подтверждающее сообщение об изменениях');
DEFINE('_SOBI2_CONFIG_ENTRY_NOTIFY_AUTHOR_EDIT_EXPL', 'Отправлять подтверждающее сообщение об его изменениях пользователю/автору. Сообщение не будет отослано, если запись редактировал администратор через административную часть сайта.');
DEFINE('_SOBI2_CONFIG_ENTRY_NOTIFY_AUTHOR_APPROVED', 'Отправлять подтверждающее сообщение об одобрении');
DEFINE('_SOBI2_CONFIG_ENTRY_NOTIFY_AUTHOR_APPROVED_EXPL', 'Информировать пользователя/автора о том, что его запись одобрена.');

/*
 * general labels
 */
DEFINE('_SOBI2_SEND_L', 'Отправить');
DEFINE('_SOBI2_YES_U', 'Да');
DEFINE('_SOBI2_NO_U', 'Нет');
DEFINE('_SOBI2_ADD_U', 'Добавить');
DEFINE('_SOBI2_ALL_U', 'Все');
DEFINE('_SOBI2_CATEGORY_L', 'категория');
DEFINE('_SOBI2_CATEGORY_H', 'Категория');
DEFINE('_SOBI2_CATEGORIES_L', 'категорий');
DEFINE('_SOBI2_CATEGORIES_H', 'Категории');
DEFINE('_SOBI2_IS_FREE_L', 'бесплатная');
DEFINE('_SOBI2_IS_NOT_FREE_L', 'платная');
DEFINE('_SOBI2_COST_L', 'Размещение здесь информации стоит');
DEFINE('_SOBI2_NOT_AUTH', 'Данная страница доступна только зарегистрированным пользователям.');
DEFINE('_SOBI2_SELECT', 'выберите');
DEFINE('_SOBI2_SEARCH_H', 'Поиск');
DEFINE('_SOBI2_ADD_NEW_ENTRY', 'Добавить');
DEFINE('_SOBI2_NUMBER_H', 'Число');
DEFINE('_SOBI2_NEVER_U', 'Никогда');
DEFINE('_SOBI2_CONFIRM_DELETE', 'Вы действительно хотите удалить данную запись? \n' .
'Внимание! Данные после удаления не могут быть восстановлены!');
DEFINE('_SOBI2_PUBLISHED', 'Опубликовано');
DEFINE('_SOBI2_CONFIRMED', 'Подтверждено');
DEFINE('_SOBI2_APPROVED', 'Одобрено');
DEFINE('_SOBI2_REORDER', 'Сортировка');
DEFINE('_SOBI2_ORDER', 'Порядок');
DEFINE('_SOBI2_GUEST', 'Гость');
DEFINE('_SOBI2_LANGUAGE_L', 'язык');
DEFINE('_SOBI2_CANCEL', 'Отменить');
DEFINE('_SOBI2_SAVE', 'Сохранить');
DEFINE('_SOBI2_IMAGE_U', 'Изображение');
DEFINE('_SOBI2_IMAGES_U', 'Изображения');
DEFINE('_SOBI2_META_U', 'Мета-информация');
DEFINE('_SOBI2_PUBLISHING_U', 'Опубликовано');
DEFINE('_SOBI2_MOVE_UP', 'Двигать вверх');
DEFINE('_SOBI2_MOVE_DOWN', 'Двигать вниз');
DEFINE('_SOBI2_MENU', 'Навигация');
DEFINE('_SOBI2_SAVING_ERROR', 'Внутренняя ошибка при сохранении данных. Пожалуйста, попробуйте еще раз!');
DEFINE('_SOBI2_GENERAL_FILE_ERROR', 'Невозможно открыть');
DEFINE('_SOBI2_DAYS_L', 'дней');

/*
 * menu
 */
DEFINE('_SOBI2_MENU_LISTING_AND_CATS', 'Категории и записи');
DEFINE('_SOBI2_MENU_AWAITING_APPR', 'Ожидают одобрения');
DEFINE('_SOBI2_MENU_CONFIG', 'Параметры');
DEFINE('_SOBI2_MENU_GENERAL_CONFIG', 'Общие параметры');
DEFINE('_SOBI2_MENU_GENERAL_NEW_ENTRIES_CONFIG', 'Параметры добавления');
DEFINE('_SOBI2_MENU_GENERAL_NEW_VIEW_CONFIG', 'Параметры отображения');
DEFINE('_SOBI2_MENU_FIELDS_DATA', 'Поля и Время');
DEFINE('_SOBI2_MENU_EDIT_CSS', 'Шаблон CSS');
DEFINE('_SOBI2_MENU_UNINSTALL_SOBI', 'Удалить SOBI2');

/*
 * tabs
 */
DEFINE('_SOBI2_TABHR_CATS', 'Категории');
DEFINE('_SOBI2_TABHR_ITEMS', 'Записи');

/*
 * Category Manager
 */
DEFINE('_SOBI2_CATS_MANAGER', 'Управление категориями');
DEFINE('_SOBI2_CAT_NAME', 'Название категории');
DEFINE('_SOBI2_CAT_INTROTEXT', 'Вводный текст');
DEFINE('_SOBI2_CAT_INTROTEXT_EXPL', 'Отображать текст о данной категории. Так же этот текст будет добавлен в мета-описание. Пожалуйста, не добавляйте HTML-код или новые строки');
DEFINE('_SOBI2_CAT_DESCRIPTION', 'Описание категории');
DEFINE('_SOBI2_NO_CATS_IN_CAT', '<h3>&nbsp; &nbsp; В данной категории нет (под)категорий</h3>');

/*
 * Entry Manager
 */
DEFINE('_SOBI2_LISTING_MANAGER', 'Управление записями');
DEFINE('_SOBI2_NO_ITEMS_IN_CAT', '<h3>&nbsp; &nbsp; В данной категории нет записей</h3>');
DEFINE('_SOBI2_LISTING_TITLE', 'Заголовок');
DEFINE('_SOBI2_LISTING_ADDED', 'Дата');
DEFINE('_SOBI2_NEW_ORDERING_SAVED', 'Новый порядок сохранен');
DEFINE('_SOBI2_UNAPPROVED_MANAGER', 'Неодобренные записи');
DEFINE('_SOBI2_NO_ITEMS_AW_APP', '<h3>Записей ожидающих одобрения сейчас нет</h3>');
DEFINE('_SOBI2_LISTING_OWNER', 'Автор');
DEFINE('_SOBI2_LISTING_OWNER_TYPE', 'Группа');
DEFINE('_SOBI2_LISTING_UPDATING_USER', 'Последнее изменение от');
DEFINE('_SOBI2_LISTING_ALL_ENTRIES', 'Все записи');

/*
 * toolbar
 */
DEFINE('_SOBI2_TOOLBAR_EDIT', 'Редактировать');
DEFINE('_SOBI2_TOOLBAR_ADD_NEW', 'Добавить: ');
DEFINE('_SOBI2_TOOLBAR_REMOVE', 'Убрать');
DEFINE('_SOBI2_TOOLBAR_REMOVE_EXPL', 'Убирает запись из категории');
DEFINE('_SOBI2_TOOLBAR_DEL', 'Удалить');
DEFINE('_SOBI2_TOOLBAR_DEL_EXPL', 'Удаляет безвозвратно запись');
DEFINE('_SOBI2_TOOLBAR_MOVE', 'Переместить');
DEFINE('_SOBI2_TOOLBAR_COPY', 'Копировать');
DEFINE('_SOBI2_TOOLBAR_PUBLISH', 'Опубликовать');
DEFINE('_SOBI2_TOOLBAR_UNPUBLISH', 'Снять опубликование');
DEFINE('_SOBI2_TOOLBAR_APPROVE', 'Одобрить');
DEFINE('_SOBI2_TOOLBAR_UNAPPROVE', 'Снять одобрение');
DEFINE('_SOBI2_TOOLBAR_CONFIRMED', 'Подтвердить');
DEFINE('_SOBI2_TOOLBAR_UNCONFIRMED', 'Снять подтверждение');

/*
 * edit / delete etc
 */
DEFINE('_SOBI2_ITEM_REMOVED_FROM_CAT', 'Записи успешно вырезаны из данной категории ');
DEFINE('_SOBI2_CANNOT_REMOVE_CAT', 'Категории не могут быть вырезаны, они могут быть только удалены');
DEFINE('_SOBI2_CAT_DELETED', 'Категории удалены');
DEFINE('_SOBI2_ITEM_DELETED', 'Записи успешно удалены');
DEFINE('_SOBI2_ITEM_MOVE', 'Переместить записи');
DEFINE('_SOBI2_ITEM_COPY', 'Копировать записи');
DEFINE('_SOBI2_ITEMS_MOVED', 'Все записи успешно перемещены');
DEFINE('_SOBI2_NOT_ALL_ITEMS_MOVED', 'Не все записи могут быть перемещены. Некоторые записи уже находятся в целевой категории');
DEFINE('_SOBI2_ITEMS_COPIED', 'Все записи успешно скопированы');
DEFINE('_SOBI2_NOT_ALL_ITEMS_COPIED', 'Не все записи могут быть скопированы. Некоторые записи уже находятся в целевой категории');
DEFINE('_SOBI2_ITEMS_TO_MOVE', 'Записи для перемещения:');
DEFINE('_SOBI2_ITEMS_TO_COPY', 'Записи для копирования:');
DEFINE('_SOBI2_SELECT_TARGER_CAT', 'Выберите целевую категорию');
DEFINE('_SOBI2_CATS_MOVED', 'Все категории перемещены');
DEFINE('_SOBI2_NOT_ALL_CATS_MOVED', 'Не все категории могут быть перемещены');
DEFINE('_SOBI2_CAT_COPY', 'Копировать категории');
DEFINE('_SOBI2_CATS_TO_COPY', 'Категории был скопированы:');
DEFINE('_SOBI2_CAT_COPY_ITEMS_TOO', 'Так же копировать записи');
DEFINE('_SOBI2_CAT_MOVE', 'Переместить категории');
DEFINE('_SOBI2_CATS_TO_MOVE', 'Категории были перемещены:');
DEFINE('_SOBI2_CATS_COPIED', 'Все категории были скопированы');
DEFINE('_SOBI2_NOT_ALL_CATS_COPIED', 'Не все категории были скопированы.');

/*
 * editing entry
 */
DEFINE('_SOBI2_FORM_TITLE_ADD_NEW_ENTRY', 'Добавить запись');
DEFINE('_SOBI2_FORM_TITLE_EDIT_ENTRY', 'Редактировать запись');
DEFINE('_SOBI2_FORM_ENTRY_DETAILS', 'Добавить подробности');
DEFINE('_SOBI2_FORM_IMG_LABEL', 'Логотип компании');
DEFINE('_SOBI2_FORM_IMG_EXPL', 'Данное изображение будет показано при подробном просмотре записи.');
DEFINE('_SOBI2_FORM_YOUR_IMG_LABEL', 'Логотип компании: ');
DEFINE('_SOBI2_FORM_IMG_CHANGE_LABEL', 'Заменить логотип компании: ');
DEFINE('_SOBI2_FORM_IMG_REMOVE_LABEL', 'Удалить логотип компании');
DEFINE('_SOBI2_FORM_ICO_LABEL', 'Иконка для публичной VCard');
DEFINE('_SOBI2_FORM_ICO_EXPL', 'Данное изображение будет показано при отображении списка категорий.');
DEFINE('_SOBI2_FORM_YOUR_ICO_LABEL', 'Иконка: ');
DEFINE('_SOBI2_FORM_ICO_CHANGE_LABEL', 'Заменить иконку: ');
DEFINE('_SOBI2_FORM_ICO_REMOVE_LABEL', 'Удалить иконку');
DEFINE('_SOBI2_FORM_SAFETY_CODE', 'Код безопасности');
DEFINE('_SOBI2_FORM_NOT_FREE_OPTION', 'Данный параметр платный.');
DEFINE('_SOBI2_FORM_SELECT_CATEGORY', 'Пожалуйста, выберите категории для записи');
DEFINE('_SOBI2_FORM_CAN_ADD_TO_NR_CATS', "Вы можете добавить данную запись в такое кол-во категорий: <strong> {$config->maxCatsForEntry}");
DEFINE('_SOBI2_FORM_CAT_1', 'Первая категория');
DEFINE('_SOBI2_FORM_ADD_CAT_BT', _SOBI2_ADD_U.' '._SOBI2_CATEGORY_L);
DEFINE('_SOBI2_FORM_REMOVE_CAT_BT','Вырезать '._SOBI2_CATEGORY_L);
DEFINE('_SOBI2_FORM_SELECTED_CAT_DESC', _SOBI2_CATEGORY_H.', которая выбрана, и ее описание:');
DEFINE('_SOBI2_FORM_PRICE_IS', 'Цена');
DEFINE('_SOBI2_FORM_FIELD_REQ_MARK', ' * ');
DEFINE('_SOBI2_FORM_FIELD_REQ_INFO', 'Все поля с маркером ( '._SOBI2_FORM_FIELD_REQ_MARK.' ) обязательны для заполнения.');
DEFINE('_SOBI2_FORM_ENTRY_TITLE', 'Название компании'._SOBI2_FORM_FIELD_REQ_MARK);
DEFINE('_SOBI2_FORM_META_KEYS_LABEL', 'Ключевые слова: ');
DEFINE('_SOBI2_FORM_META_KEYS_EXPL', 'Введенные ключевые слова будут добавлены в META-тег "keywords"');
DEFINE('_SOBI2_FORM_META_DESC_LABEL', 'Описание: ');
DEFINE('_SOBI2_FORM_META_DESC_EXPL', 'Введенный текст будет добавлен в META-тег "description"');
DEFINE('_SOBI2_FORM_JS_SELECT_CAT', 'Пожалуйста, выберите сначала хотя бы одну категорию для записи');
DEFINE('_SOBI2_FORM_JS_ACC_ENTRY_RULES', 'Вы должны принять условия использования');
DEFINE('_SOBI2_FORM_JS_ALL_REQUIRED_FIELDS', 'Пожалуйста, заполните все обязательные для заполнения поля');
DEFINE('_SOBI2_FORM_JS_CAT_ALLREADY_ADDED', 'Данная категория уже добавлена');
DEFINE('_SOBI2_LISTING_EXPIRES', 'Дата окончания публикации');
DEFINE('_SOBI2_UPDATED_AT', 'Дата обновления');
DEFINE('_SOBI2_HITS', 'Просмотров');
DEFINE('_SOBI2_HITS_RESET', 'Сбросить счетчик просмотров');
DEFINE('_SOBI2_SELECTED_CATS', 'Выберите категории');
DEFINE('_SOBI2_EDITING_LISTING', 'Редактировать запись в SOBI2 ');
DEFINE('_SOBI2_CHANGES_SAVED', 'Все изменения успешно сохранены');
DEFINE('_SOBI2_LISTING_CHECKED_OUT', 'Данная запись в данный момент редактируется другим пользователем');

/*
 * editing category
 */
DEFINE('_SOBI2_CAT_DETAILS', 'Описание категории');
DEFINE('_SOBI2_IMAGE_POS', 'Расположение изображения');
DEFINE('_SOBI2_ICON', 'Иконка');
DEFINE('_SOBI2_CAT_ICON_EXPL', 'Иконка, это маленькое изображение, которое будет отображаться рядом с категорией в списке категорий');
DEFINE('_SOBI2_PREVIEW', 'Предпросмотр изображения');
DEFINE('_SOBI2_CAT_WITHOUT_NAME', 'Категория должна иметь название');
DEFINE('_SOBI2_CAT_WITHOUT_PARENT', 'Пожалуйста, выберите родительскую категорию');
DEFINE('_SOBI2_CATEGORY_CHECKED_OUT', 'Данная категория в данный момент редактируется другим администратором');
DEFINE('_SOBI2_ADD_NEW_CAT', 'Добавить новую категорию');
DEFINE('_SOBI2_SELECTED_PARENT_ID', 'ID родительской категории');
DEFINE('_SOBI2_NOT_ALL_CHANGES_SAVED', 'Не все изменения могут быть сохранены');
DEFINE('_SOBI2_PARENT_CAT', 'Родительская категория');
DEFINE('_SOBI2_SELECT_PARENT_CAT', 'Выберите родительскую категорию');
DEFINE('_SOBI2_EDITING_CAT', 'Категория успешно отредактирована');

/*
 * fields manager
 */
DEFINE('_SOBI2_FIELDS_MANAGER', 'Настройка полей');
DEFINE('_SOBI2_FIELD_NAME', 'Название поля');
DEFINE('_SOBI2_FIELD_NAME_EXPL', 'Уникальное название для поля.');
DEFINE('_SOBI2_FIELD_LABEL', 'Заголовок поля');
DEFINE('_SOBI2_FIELD_LABEL_EXPL', 'Заголовок поля. Отображается при создании новой записи или редактировании существующей, а так же в форме категории или просмотре подробностей, если данные параметры выбраны ниже.');
DEFINE('_SOBI2_FIELD_TYPE', 'Тип поля');
DEFINE('_SOBI2_FIELD_TYPE_EXPL', 'Выберите тип поля.');
DEFINE('_SOBI2_FIELD_FREE', 'Бесплатное');
DEFINE('_SOBI2_FIELD_FREE_EXPL', 'Выберите бесплатное данное поле или нет.');
DEFINE('_SOBI2_FIELD_ENABLED', 'Опубликовано');
DEFINE('_SOBI2_FIELD_ENABLED_EXPL', 'Выберите - опубликовано данное поле или нет.');
DEFINE('_SOBI2_FIELD_REQUIRED', 'Обязательное');
DEFINE('_SOBI2_FIELD_REQUIRED_EXPL', 'Выберите, если данное поле обязательное для заполнения.');
DEFINE('_SOBI2_FIELD_IN_VCARD', 'При просмотре категории');
DEFINE('_SOBI2_FIELD_IN_DETAILS', 'При просмотре подробностей');
DEFINE('_SOBI2_ALL_FIELDS_NAMES', 'Подписи полей отображаются на  ');
DEFINE('_SOBI2_ALL_FIELDS_NAMES2', '. Чтобы редактировать поля для другого языка, необходимо изменить текущий язык SOBI2 на желаемый.');
DEFINE('_SOBI2_FIELD_CONSTANT', 'Удаляемое');
DEFINE('_SOBI2_FIELD_NOT_FREE', 'Платное');
DEFINE('_SOBI2_FIELD_DISABLED', 'Не опубликовано');
DEFINE('_SOBI2_FIELD_NOT_REQUIRED', 'Не обязательное');
DEFINE('_SOBI2_TOOLBAR_ADD_NEW_FIELD', 'Добавить новое поле');
DEFINE('_SOBI2_FIELD_CHECKED_OUT', 'Данное поле в настоящий момент редактируется другим администратором');
DEFINE('_SOBI2_FIELD_DETAILS', 'Параметры поля');
DEFINE('_SOBI2_FIELD_HELP', 'Описание');
DEFINE('_SOBI2_FIELD_NOT_EDITABLE_EXPL', 'Встроенное Поле. Поэтому некоторые параметры не доступны.');
DEFINE('_SOBI2_FIELD_CSS_CLASS', 'Класс CSS');
DEFINE('_SOBI2_FIELD_CSS_CLASS_EXPL', 'CSS класс используется в форме редактирования/добавления записей.<br />CSS классы для категорий и при просмотре подробностей будут созданы автоматически, используя имя поля.<br />Для списка категорий : span.sobi2Listing_field_xxx<br />Для просмотра подробностей: span#sobi2Details_field_xxx');
DEFINE('_SOBI2_FIELD_PREFERRED_SIZE', 'Предпочитаемый размер');
DEFINE('_SOBI2_FIELD_MAX_LENGTH', 'Максимальная длина');
DEFINE('_SOBI2_FIELD_MAX_LENGTH_EXPL', 'Максимальное кол-во символов. Используется только если выбран тип поля: inputbox.');
DEFINE('_SOBI2_FIELD_PAYMENT', 'Цена');
DEFINE('_SOBI2_FIELD_PAYMENT_EXPL', 'Стоимость данного поля, если оно не бесплатное.');
DEFINE('_SOBI2_FIELD_DISPLAYING', 'Отображать поле');
DEFINE('_SOBI2_FIELD_DISPLAYING_EXPL', 'Выберите, где поле должно отображаться. Выберите Скрытое, если хотите, что бы поле нигде не отображалось.');
DEFINE('_SOBI2_FIELD_DO_NOT_DISPLAY', 'Скрытое');
DEFINE('_SOBI2_FIELD_IS_URL', 'Интернет ссылка');
DEFINE('_SOBI2_FIELD_IN_NEW_LINE', 'Добавить новую строку');
DEFINE('_SOBI2_FIELD_IN_NEW_LINE_EXPL', 'Новая строка будет добавлена перед данным полем.');
DEFINE('_SOBI2_FIELD_WITH_LABEL', 'Отображать поле');
DEFINE('_SOBI2_FIELD_WITH_LABEL_EXPL', 'Поле будет отображаться и при просмотре категорий и при просмотре подробностей.');
DEFINE('_SOBI2_FIELD_IN_SEARCH', 'Способ поиска');
DEFINE('_SOBI2_FIELD_IN_SEARCH_EXPL', 'Выберите способ поиска для данного поля, общий способ поиска или с помощью выпадающего меню. Если выбрано Нет, поиск по полю осуществляться не будет.');
DEFINE('_SOBI2_FIELD_SEARCH_SELECT_BOX', 'Выпадающее меню');
DEFINE('_SOBI2_FIELD_SEARCH_SEARCH_IN', 'Общий поиск');
DEFINE('_SOBI2_FIELD_DESCRIPTION', 'Описание поля');
DEFINE('_SOBI2_FIELD_DESCRIPTION_EXPL', 'Если введено описание для поля, то оно будет отображаться, при добавлении/редактировании записи, как подсказка при наведении на информационный символ.');
DEFINE('_SOBI2_FIELD_WITHOUT_NAME', 'Поле должно иметь заголовок');
DEFINE('_SOBI2_FIELD_USE_WYSIWYG', 'Использовать визуальный редактор');
DEFINE('_SOBI2_FIELD_ROWS', 'Строк');
DEFINE('_SOBI2_FIELD_COLS', 'Колонок');
DEFINE('_SOBI2_ADD_NEW_FIELD', 'Добавить новое поле');
DEFINE('_SOBI2_FIELD_NAME_DUPLICAT', 'Поле с таким названием уже существует. Необходимо проверить новое название поля, так как оно было создано автоматически.');
DEFINE('_SOBI2_FIELDS_DELETED', 'Поля удалены');
DEFINE('_SOBI2_NOT_ALL_FIELDS_DELETED', 'Не все поля могут быть удалены');

/*
 * configuration
 */
DEFINE('_SOBI2_CONFIG', 'Параметры');
DEFINE('_SOBI2_CONFIG_GEN', 'Общие');
DEFINE('_SOBI2_CONFIG_GEN_OPTION', 'Основные параметры');
DEFINE('_SOBI2_CONFIG_COMPONENT_NAME', 'Заголовок для компонента');
DEFINE('_SOBI2_CONFIG_COMPONENT_NAME_EXPL', 'Отображается в меню SOBI2, как ссылка на сам компонент. Так же будет добавлен в мета-теги и др.');
DEFINE('_SOBI2_CONFIG_FRONTPAGE', 'Главная');
DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_DESCRIPTION', 'Отображать описание компонента');
DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_DESCRIPTION_TEXT', 'Описание компонента');
DEFINE('_SOBI2_CONFIG_GENERAL_IMG_FOR_DESCRIPTION', 'Изображение к описанию компонента');
DEFINE('_SOBI2_CONFIG_LANGUAGE', 'Язык по умолчанию');
DEFINE('_SOBI2_CONFIG_LANGUAGE_EXPL', 'Выберите default, если хотите использовать значения языка по умолчанию в Joomla!/Mambo.');
DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_HP_LINK', 'Отображать ссылку на сам компонент');
DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_NEW_ENTRY_LINK', 'Отображать ссылку на "Добавить запись"');
DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_SEARCH_LINK', 'Отображать ссылку на  "Поиск"');
DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_LISTING_ON_FP', 'Отображать записи на главной странице компонента');
DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_LISTING_ON_FP_EXPL', 'Если Да, все записи будут отображаться на главной странице компонента SOBI2 (Общий просмотр).');
DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_ENTRIES_IN_LINE', 'Кол-во записей в строке');
DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_LINES_IN_SITE', 'Кол-во строк на странице');
DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_CAT_LISTING_ON_FP', 'Отображать категории на главной странице');
DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_CAT_LISTING_ON_FP_EXPL', 'Если Да, все категории будут отображаться на главной странице компонента SOBI2 (Общий просмотр).');
DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_CATS_IN_LINE', 'Кол-во категорий в одной строке');
DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_FROM_SUBCATS', 'Отображать записи из подкатегорий');
DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_FROM_SUBCATS_EXPL', 'Если Да, то все записи подкатегорий будут также отображаться в родительской категории.');
DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_ICO_IN_VC', 'Отображать иконку при просмотре категорий');
DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_LOGO_IN_VC', 'Отображать изображение при просмотре категорий');
DEFINE('_SOBI2_CONFIG_GENERAL_USE_META', 'Использовать мета-теги');
DEFINE('_SOBI2_CONFIG_GENERAL_USE_META_EXPL', 'Разрешить пользователям добавлять свои мета-теги.');
DEFINE('_SOBI2_CONFIG_GENERAL_SHOW_CAT_INFO', 'Отображать описание категории');
DEFINE('_SOBI2_CONFIG_GENERAL_SORT_TITLE_ASC', 'заголовки по возрастанию');
DEFINE('_SOBI2_CONFIG_GENERAL_SORT_TITLE_DESC', 'заголовки по убыванию');
DEFINE('_SOBI2_CONFIG_GENERAL_SORT_ADDED_ASC', 'дата добавления по возрастанию');
DEFINE('_SOBI2_CONFIG_GENERAL_SORT_ADDED_DESC', 'дата добавления по убыванию');
DEFINE('_SOBI2_CONFIG_GENERAL_SORT_HITS_ASC',  'просмотры по возрастанию');
DEFINE('_SOBI2_CONFIG_GENERAL_SORT_HITS_DESC', 'просмотры по убыванию');
DEFINE('_SOBI2_CONFIG_GENERAL_SORT_NAME_ASC', 'названия по возрастанию');
DEFINE('_SOBI2_CONFIG_GENERAL_SORT_NAME_DESC', 'названия по убыванию');
DEFINE('_SOBI2_CONFIG_GENERAL_SORT_COUNT_ASC', 'просмотры по возрастанию');
DEFINE('_SOBI2_CONFIG_GENERAL_SORT_COUNT_DESC', 'просмотры по убыванию');
DEFINE('_SOBI2_CONFIG_GENERAL_SORT_ORDER_ASC', 'порядок по возрастанию');
DEFINE('_SOBI2_CONFIG_GENERAL_SORT_ORDER_DESC', 'порядок по убыванию');
DEFINE('_SOBI2_CONFIG_GENERAL_PERMS', 'Права редактирования');
DEFINE('_SOBI2_CONFIG_GENERAL_PERMS_EDIT', 'Разрешить пользователям редактировать созданные ими записи');
DEFINE('_SOBI2_CONFIG_GENERAL_PERMS_DEL', 'Разрешить удаление');
DEFINE('_SOBI2_CONFIG_GENERAL_PERMS_DEL_EXPL', 'Разрешить пользователям удалять или только снимать с публикации созданные ими записи.');
DEFINE('_SOBI2_CONFIG_GENERAL_PERMS_UNPUBLISH', 'Только снимать с публикации');
DEFINE('_SOBI2_CONFIG_GENERAL_SORT_LISTING_BY', 'Сортировать записи по');
DEFINE('_SOBI2_CONFIG_GENERAL_SORT_CATS_BY', 'Сортировать категории по');
DEFINE('_SOBI2_CONFIG_GENERAL_BACKGROUNDS', 'Фон');
DEFINE('_SOBI2_CONFIG_GENERAL_BACKGROUNDS_AND_BORDERS', 'Фоновое изображение и цвет обрамления');
DEFINE('_SOBI2_CONFIG_GENERAL_BORDERS', 'Цвет обрамления');
DEFINE('_SOBI2_CONFIG_GENERAL_BORDER_EXPL', 'Цвет обрамления записей при просмотре категорий и подробностей записей');
DEFINE('_SOBI2_CONFIG_GENERAL_BACKGROUND', 'Фоновое изображение');
DEFINE('_SOBI2_CONFIG_GENERAL_BACKGROUND_EXPL', 'Фоновое изображение записей при просмотре категорий и подробностей записей');
DEFINE('_SOBI2_CONFIG_FIELDS', 'Поля');
DEFINE('_SOBI2_CONFIG_FIELDS_DESC', 'Параметры статичных полей (заголовок, изображение и иконка)');
DEFINE('_SOBI2_CONFIG_ENTRY_T_LABEL', 'Заголовок');
DEFINE('_SOBI2_CONFIG_ENTRY_T_LABEL_EXPL', 'Заголовок первого поля в форме добавлении/редактировании записи (заголовок записи).');
DEFINE('_SOBI2_CONFIG_ENTRY_T_LENGTH', 'Длина первого поля ');
DEFINE('_SOBI2_CONFIG_ENTRY_T_LENGTH_EXPL', 'Длина первого поля в форме добавлении/редактировании записи (заголовок записи)');
DEFINE('_SOBI2_CONFIG_ENTRY_ALLOW_MULTI', 'Разрешить дублирование заголовков');
DEFINE('_SOBI2_CONFIG_ENTRY_ALLOW_MULTI_EXPL', 'Разрешить добавлять более одной записи с одним и тем же заголовком');
DEFINE('_SOBI2_CONFIG_ENTRY_ALLOW_IMG', 'Разрешить добавлять изображения');
DEFINE('_SOBI2_CONFIG_ENTRY_ALLOW_ICO', 'Разрешить добавлять иконки');
DEFINE('_SOBI2_CONFIG_ENTRY_RESIZE_IMG', 'Масштабировать изображение');
DEFINE('_SOBI2_CONFIG_ENTRY_RESIZE_IMG_EXPL', 'Установите максимальную высоту и ширину изображения. Если будет загружено изображение большего размера, оно будет отмасштабировано к данному.');
DEFINE('_SOBI2_CONFIG_ENTRY_W', 'Ширина: ');
DEFINE('_SOBI2_CONFIG_ENTRY_H', 'Высота: ');
DEFINE('_SOBI2_CONFIG_ENTRY_RESIZE_ICO', 'Масштабировать иконку');
DEFINE('_SOBI2_CONFIG_ENTRY_RESIZE_ICO_EXPL', 'Установите максимальную высоту и ширину для иконки. Если будет загружена икона большего размера, она будет отмасштабирована к данному.');
DEFINE('_SOBI2_CONFIG_ENTRY_ALLOW_NOT_FREE', 'Да, но не бесплатно ');
DEFINE('_SOBI2_CONFIG_ENTRY_IMG_LABEL', 'Подпись изображения');
DEFINE('_SOBI2_CONFIG_ENTRY_IMG_LABEL_EXPL', 'Подпись для строки изображения в форме добавления/редактирования записи.');
DEFINE('_SOBI2_CONFIG_ENTRY_PRICE_IMG', 'Стоимость добавления изображения');
DEFINE('_SOBI2_CONFIG_ENTRY_PRICE_ICO', 'Стоимость добавления иконки');
DEFINE('_SOBI2_CONFIG_ENTRY_ICO_LABEL', 'Подпись иконки');
DEFINE('_SOBI2_CONFIG_ENTRY_ICO_LABEL_EXPL', 'Подпись для строки иконки в форме добавления/редактирования записи. Иконка обычно отображается при просмотре категорий.');
DEFINE('_SOBI2_CONFIG_ENTRY_UP_TO_CATS', "Разрешить добавлять запись в данное кол-во категорий");
DEFINE('_SOBI2_CONFIG_ENTRY_2_CAT', 'Вторая категория');
DEFINE('_SOBI2_CONFIG_ENTRY_2_CAT_PRICE', 'Стоимость добавления записи во вторую категорию');
DEFINE('_SOBI2_CONFIG_ENTRY_3_CAT', 'Третья категория');
DEFINE('_SOBI2_CONFIG_ENTRY_3_CAT_PRICE', 'Стоимость добавления записи в третью категорию');
DEFINE('_SOBI2_CONFIG_ENTRY_4_CAT', 'Четвертая категория');
DEFINE('_SOBI2_CONFIG_ENTRY_4_CAT_PRICE', 'Стоимость добавления записи в четвертую категорию');
DEFINE('_SOBI2_CONFIG_ENTRY_5_CAT', 'Пятая категория');
DEFINE('_SOBI2_CONFIG_ENTRY_5_CAT_PRICE', 'Стоимость добавления записи в пятую категорию');
DEFINE('_SOBI2_CONFIG_ENTRY_SAFETY', 'Безопасность');
DEFINE('_SOBI2_CONFIG_ENTRY_SAFETY_OPTIONS', 'Параметры безопасности');
DEFINE('_SOBI2_CONFIG_ENTRY_ALLOW_ANO', 'Разрешить добавление записей гостями');
DEFINE('_SOBI2_CONFIG_ENTRY_ALLOW_ANO_EXPL', 'Разрешить не авторизированным пользователям добавлять записи.');
DEFINE('_SOBI2_CONFIG_ENTRY_AUTOPUBLISH', 'Опубликовать записи автоматически');
DEFINE('_SOBI2_CONFIG_ENTRY_AUTOPUBLISH_EXPL', 'Новая запись будет опубликована автоматически, без одобрения администратором.');
DEFINE('_SOBI2_CONFIG_ENTRY_NOTIFY_ADMIN', 'Информировать администратора');
DEFINE('_SOBI2_CONFIG_ENTRY_NOTIFY_ADMIN_EXPL', 'Информировать администратора о новых записях.');

DEFINE('_SOBI2_CONFIG_ENTRY_EXP_TIME', 'Дата истечения публикации записи');
DEFINE('_SOBI2_CONFIG_ENTRY_EXP_TIME_EXPL', 'Сколько дней запись должна быть опубликована. Установите значение 0 или оставьте пустым, если хотите чтобы запись не имела даты окончания ее публикации.');
DEFINE('_SOBI_CONFIG_ENTRY_USE_SEC_IMG', 'Использовать код безопасности');
DEFINE('_SOBI_CONFIG_ENTRY_SEC_IMG', 'Код безопасности');
DEFINE('_SOBI_CONFIG_ENTRY_USE_SEC_IMG_EXPL', 'Включите данный параметр, если хотите предотвратить добавление записей роботами.');
DEFINE('_SOBI_CONFIG_ENTRY_SEC_IMG_FONTCOLOR', 'Цвет текста');
DEFINE('_SOBI_CONFIG_ENTRY_SEC_IMG_LINECOLOR', 'Цвет сетки');
DEFINE('_SOBI_CONFIG_ENTRY_SEC_IMG_BGCOLOR', 'Цвет фона');
DEFINE('_SOBI_CONFIG_ENTRY_SEC_IMG_BORDERCOLOR', 'Цвет обрамления');
DEFINE('_SOBI_CONFIG_ENTRY_ACCEPT_RULES', 'Условия использования');
DEFINE('_SOBI_CONFIG_ENTRY_NEED_TO_ACCEPT_RULES', 'Пользователь должен принять условия использования');
DEFINE('_SOBI_CONFIG_ENTRY_NEED_TO_ACCEPT_RULES_EXPL', 'Выберите, должен ли пользователь принимать условия использования компонента при добавлении новых записей.');
DEFINE('_SOBI_CONFIG_ENTRY_ENTRY_RULES_LABEL_1', 'Надпись перед ссылкой на страницу с правилами использования');
DEFINE('_SOBI_CONFIG_ENTRY_ENTRY_RULES_URL', 'Ссылка на страницу с правилами использования');
DEFINE('_SOBI_CONFIG_ENTRY_ENTRY_RULES_TXT', 'Текст ссылки на страницу с правилами использования');
DEFINE('_SOBI_CONFIG_ENTRY_ENTRY_RULES_LABEL_2', 'Надпись после ссылки на страницу с правилами использования');
DEFINE('_SOBI_CONFIG_ENTRY_ENTRY_RULES_LABELS_EXPL', '<h4>Таким образом будет создана строка, примерно такого вида: <BR> <span class="editlinktip">' .
sobiHTML::toolTip(addslashes(_SOBI_CONFIG_ENTRY_ENTRY_RULES_LABEL_1),addslashes(_SOBI_CONFIG_ENTRY_ENTRY_RULES_LABEL_1),'','','Я принимаю', '#',0 )
.'</span>&nbsp;&nbsp;<span class="editlinktip"><a href="#">' .
sobiHTML::toolTip(addslashes(_SOBI_CONFIG_ENTRY_ENTRY_RULES_URL),addslashes(_SOBI_CONFIG_ENTRY_ENTRY_RULES_TXT),'','','условия использования', '#',0 )
.'</a></span>&nbsp;&nbsp;<span class="editlinktip">' .
sobiHTML::toolTip(addslashes(_SOBI_CONFIG_ENTRY_ENTRY_RULES_LABEL_2),addslashes(_SOBI_CONFIG_ENTRY_ENTRY_RULES_LABEL_2),'','','данной системы', '#',0 )
.'</h4>');
DEFINE('_SOBI2_CONFIG_VIEW_OPTIONS', 'Параметры просмотра подробностей');
DEFINE('_SOBI2_CONFIG_VIEW_OPTIONS_ICO', 'Отображать иконку при просмотре подробностей');
DEFINE('_SOBI2_CONFIG_VIEW_OPTIONS_ICO_EXPL', 'Если Да, маленькое изображение (иконка) будет отображено при просмотре подробностей.');
DEFINE('_SOBI2_CONFIG_VIEW_OPTIONS_IMG', 'Отображать изображение при просмотре подробностей');
DEFINE('_SOBI2_CONFIG_VIEW_OPTIONS_IMG_EXPL', 'Если Да, большое изображение будет отображено при просмотре подробностей.');
DEFINE('_SOBI2_CONFIG_VIEW_OPTIONS_ADDED_DATE', 'Отображать дату добавления');
DEFINE('_SOBI2_CONFIG_VIEW_OPTIONS_HITS', 'Отображать кол-во просмотров');
DEFINE('_SOBI2_CONFIG_VIEW_OPTIONS_WAY_SEARCH', 'Отображать ссылку "Найти на карте"');
DEFINE('_SOBI2_CONFIG_VIEW_OPTIONS_WAY_SEARCH_URL', 'Ссылка "Найти на карте"');
DEFINE('_SOBI2_CONFIG_VIEW_OPTIONS_WAY_SEARCH_LABEL', 'Текст ссылки');
DEFINE('_SOBI2_CONFIG_VIEW_OPTIONS_WAY_SEARCH_LABEL_EXPL', 'Как ссылка будет отображаться. К примеру: Найти на карте. Для вставки изображения используйте HTML-теги вставки изображения.');
DEFINE('_SOBI2_CONFIG_VIEW_OPTIONS_WAY_SEARCH_URL_VAR_EXPL', 'Обычно, такая интернет ссылка выглядит так:' .
'<div align="left">http://route.com/index.php?tocity=samplecity&toplz=12345&tostreet=sample%20street%2099</div><br />' .
'Следующие переменные доступны для подстановки:' .
'<ul>' .
'<li>STREET - вулиця</li>' .
'<li>ZIPCODE - індекс</li>' .
'<li>CITY - місто</li>' .
'<li>COUNTRY - країна</li>' .
'<li>FEDSTATE - область</li>' .
'<li>COUNTY - район</li>' .
'</ul>' .
'Что бы получить ссылку как приведено выше нужно подставить переменные примерно так:' .
'<div align="left">http://route.com/index.php?tocity=CITY&toplz=ZIPCODE&tostreet=STREET</div>');
DEFINE('_SOBI2_CONFIG_PAYMENTS_OPTIONS', 'Параметры оплаты');
DEFINE('_SOBI2_CONFIG_PAYMENTS_CURRENCY', 'Обозначение денежной единицы');
DEFINE('_SOBI2_CONFIG_PAYMENTS_CURRENCY_SEPARATOR', 'Разделитель целой и дробной части');
DEFINE('_SOBI2_CONFIG_PAYMENTS_CURRENCY_SEPARATOR_EXPL', 'Должен быть либо запятая (,) либо точка (.) К примеру, 100.99 РУБ или 100,99 РУБ');
DEFINE('_SOBI2_CONFIG_PAYMENTS_TITLE', 'Текст назначения об оплате');
DEFINE('_SOBI2_CONFIG_PAYMENTS_TITLE_EXPL', 'Данный текст будет использован, как назначение банковского платежа или как назначение PayPal платежа. The SOBI2 ID number will be appended.');
DEFINE('_SOBI2_CONFIG_PAYMENTS_BANK_TRANSFER', 'Параметры банковского перевода');
DEFINE('_SOBI2_CONFIG_PAYMENTS_USE_BANK_TRANSFER', 'Использовать банковский платеж');
DEFINE('_SOBI2_CONFIG_PAYMENTS_USE_BANK_TRANSFER_EXPL', 'Если Да, пользователь сможет использовать оплату через банковский платеж. Банковские реквизиты будут отображены, на итоговой странице или отправлены по электронной почте.');
DEFINE('_SOBI2_CONFIG_PAYMENTS_USE_BANK_TRANSFER_YES_OVER_EMAIL', 'Да, но отправлять банковские реквизиты по электронной почте');
DEFINE('_SOBI2_CONFIG_PAYMENTS_USE_BANK_TRANSFER_YES_ON_PAGE', 'Да, но отображать банковские реквизиты на итоговой странице');
DEFINE('_SOBI2_CONFIG_PAYMENTS_BANK_DATA', 'Банковские реквизиты');
DEFINE('_SOBI2_CONFIG_PAYMENTS_BANK_DATA_EXPL', 'Вставьте Ваши банковские реквизиты');
DEFINE('_SOBI2_CONFIG_PAYMENTS_PAY_PAL', 'Параметры PayPal');
DEFINE('_SOBI2_CONFIG_PAYMENTS_USE_PAY_PAL', 'Использовать PayPal');
DEFINE('_SOBI2_CONFIG_PAYMENTS_USE_PAY_PAL_EXPL', 'Если Да, пользователь может оплачивать стоимость полей через PayPal.');
DEFINE('_SOBI2_CONFIG_PAYMENTS_PAY_PAL_EMAIL', 'E-mail адрес для PayPal');
DEFINE('_SOBI2_GENERAL_FILE_IS', ' файл: ');
DEFINE('_SOBI2_GENERAL_FILE_WRITABLE', '<span style="color: rgb(0, 128, 0); font-weight: bold;">Доступен к записи</span>');
DEFINE('_SOBI2_GENERAL_FILE_UNWRITABLE', '<span style="color: rgb(255, 0, 0); font-weight: bold;">Невозможно записать данные в файл</span>');
DEFINE('_SOBI2_GENERAL_DO_FILE_UNWRITABLE', 'Сделать недоступным для записи после сохранения');
DEFINE('_SOBI2_GENERAL_DO_FILE_WRITABLE', 'Перезаписать защиту от записи');

DEFINE('_SOBI2_UNINSTALL_DB_TXT', '<div style="text-align:left">' .
'<h2>Удаление SOBI2 </h2>' .
'Существует два способа удаления компонента SOBI2:<br />' .
'<ul>' .
'  <li>Только компонент: в данном случае, будет удален только сам' .
' компонент. Записи в базе данных будут сохранены.' .
' Данная возможность может быть использована для дальнейшего обновления компонента. ' .
' В принципе, для этого достаточно удалить компонента' .
' через стандартную форму "Удаления/Установки" Joomla! CMS.<br /></li>' .
'  <li>Полное удаление: для тех, кто хочет удалить сначала все таблицы компонента ' .
' из базы данных. После этого компонент может быть удален' .
' через стандартную форму "Удаления/Установки" Joomla! CMS.' .
' </li>' .
'</ul>' .
'</div>');
DEFINE('_SOBI2_UNINSTALL_DB_LINK', 'Удалить таблицы SOBI2 из базы данных');
DEFINE('_SOBI2_UNINSTALL_DB_CONFIRM', 'Вы действительно хотите удалить таблицы SOBI2 из базы данных?');
DEFINE('_SOBI2_DB_REMOVED_MSG', 'Таблицы SOBI2 были успешно удалены из базы данных. Удалите теперь компонент.');
DEFINE('_SOBI2_DB_REMOVE_ERROR_MSG', 'Таблицы SOBI2 не были удалены из базы данных. Удалите их вручную и затем удалите компонент.');
?>