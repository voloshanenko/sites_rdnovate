<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';

// Check site platform
switch($_SERVER['HTTP_HOST'])
{
	case 'mb23.ua':
		$config=dirname(__FILE__).'/protected/config/main.php';
		break;
	case 'planeta-bio.com':
		$config=dirname(__FILE__).'/protected/config/main_prod.php';
		break;
	case 'vipkadryapk.com.ua':
		$config=dirname(__FILE__).'/protected/config/main_dev.php';
		break;
	default:
		$config=dirname(__FILE__).'/protected/config/main_prod.php';
		break;
}

// remove the following lines when in production mode
//defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
//defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();