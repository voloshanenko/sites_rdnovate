<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Планета Пищепром',
	// preloading 'log' component
	//'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.modules.ads.models.*',
		'application.modules.photos.models.*',
		'application.modules.library.models.*',
		'application.modules.whatsnews.models.*',
		'application.modules.qa.models.*',
		'application.components.*',
	),
	'modules'=>array(
		'ads'=>array(
			'class'=>'application.modules.ads.AdsModule',
			'imageWidth'=>70,
			'imageHeight'=>70,
			'monthPublished'=>2,
		),
		'whatsnews'=>array(
			'class'=>'application.modules.whatsnews.WhatsnewsModule',
			'eventImageHeight'=>125,
			'eventImageWidth'=>300,
			'newsImageHeight'=>125,
			'newsImageWidth'=>300,
			'thumbImageHeight'=>70,
			'thumbImageWidth' =>70,
		),
		'photos'=>array(
			'class'=>'application.modules.photos.PhotosModule',
			'contestsOnMainPage'=>4,
			'smallWidth'=>70,
			'smallHeight'=>70,
			'mediumWidth'=>130,
			'mediumHeight'=>130,
			'bigWidth'=>200,
			'bigHeight'=>200,
		),
		'library'=>array(
			'smallIconHeight'=>70,
			'smallIconWidth'=>70,
			'mediumIconHeight'=>130,
			'mediumIconWidth'=>130,
		),
		'qa',
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class'=>'CWebUser',
			'autoUpdateFlash'=>'false',
		),
	    'Connection'=>array(
	    	'class'=>'Connection',
		),
		'Tags'=>array(
	    	'class'=>'Tags',
		),
		'BannerShow'=>array(
			'class'=>'BannerShow',
		),
		'ih'=>array(
	        'class'=>'CImageHandler',
	    ),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				// Using Page's Url parameter. I.e. /library/article/title_of_an_article
				'/library/article/<_a:(admin|create|update|delete|tag|category|export|archive)>'=>'/library/article/<_a>',
				'/library/article/<page_url:\w+>'=>'/library/article/view/id/<page_url>',
				// Url for Partners and Sponsors
				'/photos/<_contr:(partners|sponsor)>/<_a:(admin|create|update|delete)>'=>'/photos/<_contr>/<_a>',
				'/photos/<_contr:(partners|sponsor)>/<page_url:\w+>'=>'photos/<_contr>/view/id/<page_url>',
			),
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=pischeprom',
			'emulatePrepare' => true,
			'username' => 'u_pisch',
			'password' => 'TNZWtcUy',
			'charset' => 'utf8',
			'enableProfiling'=>false,
			'enableParamLogging' => false,
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
                array(
                    'class'=>'CProfileLogRoute',
                    'levels'=>'profile',
                    'enabled'=>false,
                ),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
    'params'=>array(
    	'adminItemsPerPage'=>100,
    	'itemsPerPage' => 12,
    	'photosPerPage' => 60,
    	'contestsPerPage' => 5,
    	'questionsPerPage' => 25,
    	'adsPerPage' => 40,
        'defaultMetaTitle' => 'Планета Пищепром, мясная промышленность, молочная промышленность, кондитерская промышленность, хлебопекарная промышленность, маслосыродельная промышленность,промышленность безалкогольных напитков, консервная промышленность, плодоовощная промышленность, макаронная промышленность, спиртовая промышленность, масложировая промышленность, пивоваренная промышленность, мукомольно-крупяная промышленность, сахарная промышленность, табачная промышленность, винодельческая промышленность',
        'defaultMetaKeywords'=>'мясная промышленность, молочная промышленность, кондитерская промышленность, хлебопекарная промышленность, маслосыродельная промышленность,промышленность безалкогольных напитков, консервная промышленность, плодоовощная промышленность, макаронная промышленность, спиртовая промышленность, масложировая промышленность, пивоваренная промышленность, мукомольно-крупяная промышленность, сахарная промышленность, табачная промышленность, винодельческая промышленность',
        'defaultMetaDescription'=>'Все о пищепроме, алкогольной и табачной промышленности.',
        'spam'=>array(
            'fromEmail'=>'noreply@planeta-pischeprom.com',
            'fromName'=>'Планета Пищепром',
        ),
        'adminEmail'=>'noreply@planeta-pischeprom.com',
        'countersFile'=>'/assets/counters_prod',
    ),
);