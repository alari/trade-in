<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        // For giix
        'ext.giix.components.*',
        'application.modules.imagesHolder.models.*',
        'ext.shared-core.form.*',
        'ext.shared-core.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '12345',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('*'),
            'generatorPaths' => array(
                'ext.giix.generators', // giix generators
            ),
        ),

        'imagesHolder' => array(
            'types' => array(
                'pic' => array(
                    'maxNum' => 1,
                    'preview' => 'tiny',
                    'default' => 'big',
                    'sizes' => array(
                        "big" => "800x600",
                        "tiny" => "152x130 thumb",
                    )
                ),
                'list' => array(
                    'maxNum' => 0,
                    'preview' => 'tiny',
                    'default' => 'big',
                    'sizes' => array(
                        "big" => "800x600",
                        "tiny" => "152x130 thumb",
                    )
                ),
            )
        ),

	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(

                'account/<hash:[\w\-]+>' => 'tradeIn/account',
                'denial/<hash:[\w\-]+>' => 'tradeIn/denial',

				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database

        'db' => array(
            'tablePrefix' => 'tbl_',
            'connectionString' => 'mysql:host=localhost;dbname=tradein',
            'emulatePrepare' => true,
            'username' => 'tradein',
            'password' => 'tradein',
            'charset' => 'utf8',
        ),

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
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

        'imagine' => array(
            'class' => "ext.imagine.ImagineYii"
        )
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);