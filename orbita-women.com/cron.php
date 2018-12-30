<?php
// home/h35043/data/www/planeta-bio.com
defined('YII_DEBUG') or define('YII_DEBUG', true);

$yii=dirname(__FILE__).'/framework/yii.php';
$configFile=dirname(__FILE__).'/protected/config/console.php';

require_once($yii);
Yii::createConsoleApplication($configFile)->run();