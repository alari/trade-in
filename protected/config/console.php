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

        'imagesHolder',

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
    ),
);