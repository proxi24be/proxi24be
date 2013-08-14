<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// application components
	'components'=>array(
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
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                    'categories'=>'app.migration.*',
                    'logFile'=>'migration.log',
                ),
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
);