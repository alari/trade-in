<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Trade In',

    'language' => 'ru',
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
                        "logo" => "150x150 thumb",
                        "tiny" => "78x78 thumb",
                    )
                ),
                'list' => array(
                    'maxNum' => 4,
                    'preview' => 'tiny',
                    'default' => 'big',
                    'sizes' => array(
                        "big" => "800x600",
                        "tiny" => "148x148 thumb",
                    )
                ),
            ),
        ),

        'emailSender'=>array(
            'from'=>'scsware@yandex.ru',
            'fromTitle'=>'Trade in',

            'mode'=>'smtp',
            'host'=>'smtp.yandex.ru',
            'port'=>465,
            'security'=>'ssl',
            'username'=>'',
            'password'=>'',
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
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(

                'update-account/<hash:[\w\-]+>' => 'tradeIn/accountUpdate',
                'account/<hash:[\w\-]+>' => 'tradeIn/account',
                'denial/<hash:[\w\-]+>' => 'tradeIn/denial',

                'services/<carBrand:[\w\-]+>' => 'tradeIn/getServices',
                'services/' => 'tradeIn/getServices',
                'autosalon/<id:[\w\-]+>' => 'service/view',

				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                '' => 'tradeIn/index',
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
        ),
        'i18n2ascii' => array(
            'class' => 'application.extensions.i18n2ascii.I18n2ascii'
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
        'statusNegotiation' => array(
            'wait' => 'Ожидание',
            'denial' => 'Отказ',
            'tender' => 'Предложение',
        ),
        'appliance' => array(
            'form'=>array(
                'engine' =>array(
                    'benzine'=>'бензиновый',
                    'diesel'=>'дизельный',
                    'hybrid'=>'гибридный',
                ),
                'volume' => array(
                    'startVolume' => '0.8',
                    'endVolume' => '6.0',
                ),
                'gearbox' => array(
                    'mechanic'=>'МКПП',
                    'automatic'=>'АКПП',
                    'robotic_mechanic'=>'Роботизированная механика',
                    'variator'=>'Вариатор',
                ),
                'transmission'=>array(
                    'front'=>'передний',
                    'rear'=>'задний',
                    'full'=>'полный',
                ),
                'salon' => array(
                    'fabric'=>'ткань',
                    'velvet'=>'велюр',
                    'skin'=>'кожа',
                    'mixed'=>'комбинированный',
                ),
                'condition' => array(
                    'excellent'=>'отличное',
                    'good'=>'хорошее',
                    'medium'=>'среднее',
                    'needs repair'=>'требует ремонта',
                ),
                'year' => array(
                    'start' => '1990',
                ),
            ),
        ),
	),
);