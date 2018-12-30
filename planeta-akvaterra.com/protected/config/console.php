<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Cron',
	'preload'=>array('log'),
	'import' => array(
		'application.models.*',
		'application.helpers.CWebTools',
		'application.modules.ads.models.*',
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
			'connectionString' => 'mysql:host=localhost;dbname=akvaterra',
			'emulatePrepare' => true,
			'username' => 'u_akvaterra',
			'password' => 'gFbCc9DB',
			'charset' => 'utf8',
			'enableProfiling'=>false,
			'enableParamLogging' => false,
		),
	),
	'params'=>array(
        'spam'=>array(
            'fromEmail'=>'noreply@planeta-akvaterra.com',
            'fromName'=>'Планета Акватерра',
        ),
    ),
);