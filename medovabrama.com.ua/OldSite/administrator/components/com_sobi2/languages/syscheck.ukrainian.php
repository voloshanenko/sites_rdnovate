<?php
/**
 * @version	$Id: syscheck.ukrainian.php 49 2009-06-29 19:54:56Z PAlexA $
 * @package	SOBI2
 * @license	GNU/GPL, see LICENSE.php
 */

// no direct access
defined( '_SOBI2_' ) || ( trigger_error("Restricted access", E_USER_ERROR) && exit() );

DEFINE('_SOBI2SC_STATE_0', '<span style="color: rgb(255, 0, 0); font-weight: bold;">Невідомий</span>');
DEFINE('_SOBI2SC_STATE_1', '<span style="font-weight: bold; color: rgb(51, 204, 0);">Відмінно</span>');
DEFINE('_SOBI2SC_STATE_2', '<span style="font-weight: bold; color: rgb(0, 153, 0);">OK</span>');
DEFINE('_SOBI2SC_STATE_3', '<span style="color: rgb(153, 153, 0); font-weight: bold;">Має бути OK</span>');
DEFINE('_SOBI2SC_STATE_4', '<span style="color: rgb(255, 204, 51); font-weight: bold;">Може викликати проблеми</span>');
DEFINE('_SOBI2SC_STATE_5', '<span style="color: rgb(255, 0, 0); font-weight: bold;"><b>Не прийнятно</b></span>');
DEFINE('_SOBI2SC_STATE_6', '<span style="color: rgb(255, 0, 0);">Повинно працювати, але цей каталог відкритий для запису <b>УСІМ</b>.<br />Це може бути <b>загрозою безпеки!</b></span>');
DEFINE('_SOBI2SC_STATE_7', '<span style="color: rgb(255, 0, 0);">Повинно працювати, але цей файл відкритий для запису <b>УСІМ</b>.<br />Це може бути <b>загрозою безпеки!</b></span>');
DEFINE('_SOBI2SC_HEADER_SUBJECT', 'Установка');
DEFINE('_SOBI2SC_HEADER_STATE', 'Стан');
DEFINE('_SOBI2SC_HEADER_STATE_OK', 'Стан OK?');
DEFINE('_SOBI2SC_PHPVER_IS', 'Версія PHP:');
DEFINE('_SOBI2SC_APACHE_IS', 'Версія Apache:');
DEFINE('_SOBI2SC_MYSQL_IS', 'Версія MySQL:');
DEFINE('_SOBI2SC_MEMLIM_IS', 'Обмеження памяті для PHP -скриптов:');
DEFINE('_SOBI2SC_TIMELIM_IS', 'Час виконання для PHP -скриптов:');
DEFINE('_SOBI2SC_SM_IS', 'PHP Safe Mode:');
DEFINE('_SOBI2SC_RG_IS', 'PHP Register Globals:');
DEFINE('_SOBI2SC_ERG_IS', 'CMS RG емуляція:');
DEFINE('_SOBI2SC_GD_IS', 'GD бібліотека:');
DEFINE('_SOBI2SC_IM_IS', 'iconv / mbstring библиотеки:');
DEFINE('_SOBI2SC_CHARSET_IS', 'Кодування:');
DEFINE('_SOBI2SC_DBCOL_IS', 'Зіставлення зєднання с MySQL:');
DEFINE('_SOBI2SC_FILES_PERMS', 'Файлові дозволи');
DEFINE('_SOBI2SC_FILENAME', 'Імя файлу');
DEFINE('_SOBI2SC_FILE_W', 'Записи');
DEFINE('_SOBI2SC_FILE_O', 'Власник');
DEFINE('_SOBI2SC_FILE_G', 'Група');
DEFINE('_SOBI2SC_CMS_IS', 'CMS:');
DEFINE('_SOBI2SC_AT_IS', 'Адміністративний шаблон:');
DEFINE('_SOBI2SC_CHAT_IS', 'Щоб включити призначені для користувача теги з компонентів, які відсутні в цьому адміністративному шаблоні. Панель адміністрації SOBI2 ймовірно не працюватиме правильно.');
DEFINE('_SOBI2SC_WARNING', 'Попередження');
DEFINE('_SOBI2SC_TEMPLATE_CHECK', 'За умовчанням шаблон перевірки:');
DEFINE('_SOBI2SC_JS_CONF', 'Цей шаблон включає декілька JavaScripts, які можуть конфліктувати з MooTools бібліотеки. SOBI2 пошуку функція може не працювати належним чином.');
DEFINE('_SOBI2SC_GET_FILE', 'Завантаження системи, перевірка реєстрації файлів');
?>