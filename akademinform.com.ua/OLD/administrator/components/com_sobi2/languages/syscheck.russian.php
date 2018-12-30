<?php
/**
 * @version	$Id: syscheck.russian.php 49 2009-06-29 19:54:56Z pedrosoft $
 * @package	SOBI2
 * @license	GNU/GPL, see LICENSE.php
 */

// no direct access
defined( '_SOBI2_' ) || ( trigger_error("Restricted access", E_USER_ERROR) && exit() );

DEFINE('_SOBI2SC_STATE_0', '<span style="color: rgb(255, 0, 0); font-weight: bold;">Неизвестный</span>');
DEFINE('_SOBI2SC_STATE_1', '<span style="font-weight: bold; color: rgb(51, 204, 0);">Отлично</span>');
DEFINE('_SOBI2SC_STATE_2', '<span style="font-weight: bold; color: rgb(0, 153, 0);">OK</span>');
DEFINE('_SOBI2SC_STATE_3', '<span style="color: rgb(153, 153, 0); font-weight: bold;">Должно быть OK</span>');
DEFINE('_SOBI2SC_STATE_4', '<span style="color: rgb(255, 204, 51); font-weight: bold;">Может вызывать проблемы</span>');
DEFINE('_SOBI2SC_STATE_5', '<span style="color: rgb(255, 0, 0); font-weight: bold;"><b>Не приемлемо</b></span>');
DEFINE('_SOBI2SC_STATE_6', '<span style="color: rgb(255, 0, 0);">Должно работать, но этот каталог открыт для записи <b>ВСЕМ</b>.<br />Это может быть <b>угрозой безопасности!</b></span>');
DEFINE('_SOBI2SC_STATE_7', '<span style="color: rgb(255, 0, 0);">Должно работать, но этот файл открыт для записи <b>ВСЕМ</b>.<br />Это может быть <b>угрозой безопасности!</b></span>');
DEFINE('_SOBI2SC_HEADER_SUBJECT', 'Установка');
DEFINE('_SOBI2SC_HEADER_STATE', 'Состояние');
DEFINE('_SOBI2SC_HEADER_STATE_OK', 'Состояние OK?');
DEFINE('_SOBI2SC_PHPVER_IS', 'Версия PHP:');
DEFINE('_SOBI2SC_APACHE_IS', 'Версия Apache:');
DEFINE('_SOBI2SC_MYSQL_IS', 'Версия MySQL:');
DEFINE('_SOBI2SC_MEMLIM_IS', 'Ограничение памяти для PHP-скриптов:');
DEFINE('_SOBI2SC_TIMELIM_IS', 'Время выполнения для PHP-скриптов:');
DEFINE('_SOBI2SC_SM_IS', 'PHP Safe Mode:');
DEFINE('_SOBI2SC_RG_IS', 'PHP Register Globals:');
DEFINE('_SOBI2SC_ERG_IS', 'CMS RG эмуляция:');
DEFINE('_SOBI2SC_GD_IS', 'GD библиотека:');
DEFINE('_SOBI2SC_IM_IS', 'iconv / mbstring библиотеки:');
DEFINE('_SOBI2SC_CHARSET_IS', 'Кодировка:');
DEFINE('_SOBI2SC_DBCOL_IS', 'Сопоставление соединения с MySQL:');
DEFINE('_SOBI2SC_FILES_PERMS', 'Файловые разрешения');
DEFINE('_SOBI2SC_FILENAME', 'Имя файла');
DEFINE('_SOBI2SC_FILE_W', 'Записи');
DEFINE('_SOBI2SC_FILE_O', 'Владелец');
DEFINE('_SOBI2SC_FILE_G', 'Группа');
DEFINE('_SOBI2SC_CMS_IS', 'CMS:');
DEFINE('_SOBI2SC_AT_IS', 'Административный шаблон:');
DEFINE('_SOBI2SC_CHAT_IS', 'Чтобы включить пользовательские теги из компонентов, которые отсутствуют в этом административном шаблоне. Панель администрации SOBI2 вероятно не будет работать правильно.');
DEFINE('_SOBI2SC_WARNING', 'Предупреждение');
DEFINE('_SOBI2SC_TEMPLATE_CHECK', 'По умолчанию шаблон проверки:');
DEFINE('_SOBI2SC_JS_CONF', 'Этот шаблон включает в себя несколько JavaScripts, которые могут конфликтовать с MooTools библиотеки. SOBI2 поиска функция может не работать должным образом.');
DEFINE('_SOBI2SC_GET_FILE', 'Загрузка системы, проверка регистрации файлов');
?>