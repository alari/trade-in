<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

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

	// application components
	'components'=>array(
        'db' => array(
            'tablePrefix' => 'tbl_',
            'connectionString' => 'mysql:host=localhost;dbname=tradein',
            'emulatePrepare' => true,
            'username' => 'tradein',
            'password' => 'tradein',
            'charset' => 'utf8',
        ),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),

    'modules'=>array(
        #...

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
                        "tiny" => "152x130 thumb",
                    )
                ),
            )
        ),
        'emailSender'=>array(
            'from'=>'scsware@yandex.ru',
            'fromTitle'=>'Trade in',

            'mode'=>'smtp',
            'host'=>'smtp.gmail.com',
            'port'=>465,
            'security'=>'ssl',
            'username'=>'taktikatest@gmail.com',
            'password'=>'aQEgn47S2LpfM',
        ),

        #...
    ),

    'commandMap' => array(
        'migrate' => array(
            // псевдоним директории, в которую распаковано расширение
            'class' => 'application.extensions.yiiext.commands.migrate.EMigrateCommand',
            // имя псевдомодуля для общих миграций. По умолчанию равно "core".
            'applicationModuleName' => 'core',
            // название компонента для подключения к базе данных
            'connectionID'=>'db',
        ),
        'pmq' => array(
            'class' => 'application.commands.EmailStackSenderCommand'
        )
    ),
    'params' => array(
        // this is used in contact page
        'httpHost' => 'http://tradein.orena.org',
    ),
);