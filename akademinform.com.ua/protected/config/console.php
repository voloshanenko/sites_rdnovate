<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Cron',
	'preload'=>array('log'),
	'import' => array(
		'application.models.*',
		'application.modules.ads.models.*',
		'application.helpers.CWebTools'
	),
	// application components
	'components'=>array(
		'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'logFile'=>'cron.log',
                    'levels'=>'error, warning',
                ),
                array(
                    'class'=>'CFileLogRoute',
                    'logFile'=>'cron_trace.log',
                    'levels'=>'trace',
                ),
            ),
        ),
		'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=integr',
            'emulatePrepare' => true,
            'username' => 'u_integr',
            'password' => 'Oyr74gtI',
            'charset' => 'utf8',
            'enableProfiling'=>false,
            'enableParamLogging' => false,
        ),
	),
	'params'=>array(
        'spam'=>array(
            'fromEmail'=>'noreply@akademinform.com.ua',
            'fromName'=>'Интеграция',
        ),
    ),
);