<?php

// Yii::setPathOfAlias('yii_bootstrap', dirname(__FILE__). '/../ext/bootstrap');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Proxy24',
	'language'=> isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'en', 

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'business plan',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'authenticate', 'i18n',
		
	),
	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>false,
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'showScriptName'=>false,
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
        'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'rbac_db',
            'itemTable'=>'auth_item',
            'itemChildTable'=>'auth_item_child',
            'assignmentTable'=>'auth_assignment',
        ),
		'db'=>array(
            'class'=>'CDbConnection',
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/dev/proxy24.dev.sqlite',
		),
        'rbac_db'=>array(
            'class'=>'CDbConnection',
            'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/dev/rbac.dev.sqlite',
        ),
        'i18n_db'=>array(
            'class'=>'CDbConnection',
            'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/dev/i18n.dev.sqlite',
        ),
        'clientScript'=>array(
                    'scriptMap'=>array(
                        'jquery.js'=>false,
                    ),
                    'packages'=>array(
                        'bootstrap'=>array(
                            'basePath'=> 'webroot.framework.bootstrap',
                            'css'=>array('css/bootstrap.css'),
                            'js'=>array('js/bootstrap.js'),
                        ),
                        'jquery'=>array(
	                        'basePath'=>'webroot.javascript.jquery',
	                        //'baseUrl'=>"//ajax.googleapis.com/ajax/libs/jquery/1.7.1/",
	                        'js'=>array('jquery-1.8.2.min.js'),
                        ),
                        'main-css'=>array(
	                        'basePath'=>'webroot.css',
	                        'css' => array('main.css'),
                        ),
                	),
        ), // end clientscript
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                    'categories'=>'app.registration.*',
                    'logFile'=>'registration.log',
                ),
                array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				array(
					'class'=>'CWebLogRoute',
				),
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);