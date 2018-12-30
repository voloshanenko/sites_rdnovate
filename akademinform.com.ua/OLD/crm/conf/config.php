<?php

$conf['lang']='ru';
include 'locale/' . $conf ['lang'].'.php';

if (function_exists('_')){
	// Указываем имя домена
	$domain = 'consileri';

	// Задаем каталог домена, где содержатся переводы
	bindtextdomain ($domain, './locale');

	// Выбираем домен для работы
	textdomain ($domain);

	// Если необходимо, принудительно указываем кодировку
	// (эта строка не обязательна, она нужна,
	// если вы хотите выводить текст в отличной
	// от текущей локали кодировке).
	bind_textdomain_codeset($domain, 'UTF-8');
} 
else {
	function _($str){
		return $str;
	}
}

 $dbconfig = array ('host'     => 'localhost',
                 'username' => 'u_akademcr',
                 'password' => 'leqXgGWn',
                 'dbname'   => 'akademcrm',
                 'profiler' => true );
 $mail_config = array ('mail_from' => 'info@akademinform.com.ua',
 						'admin_email' => '{dacons_admin_mail}',
 						'mailer_type' => 'mail',
 						'mailer_smtp_host' => 'localhost',
 						'mailer_smtp_port' => '25');
 $conf['siteurl'] = trim ('http://'.$_SERVER['HTTP_HOST']. dirname (str_replace ($_SERVER ['DOCUMENT_ROOT'], '', $_SERVER ['SCRIPT_NAME'])), '/');
 $conf['dir'] = dirname(str_replace ($_SERVER ['DOCUMENT_ROOT'], '', $_SERVER ['SCRIPT_NAME']));
 $conf['license'] = 'BQZZ-0ZU2-PDZA-2MN3';
 
 global $is_saas;
 $is_saas = false;
?>