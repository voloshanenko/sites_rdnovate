<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main_prod.php';

defined('YII_DEBUG') or define('YII_DEBUG',false);

require_once($yii);
Yii::createWebApplication($config)->run();