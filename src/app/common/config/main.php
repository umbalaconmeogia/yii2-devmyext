<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/../yii2/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'i18n' => [
            'translations' => [
                'simpledatasystem' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en',
                    'forceTranslation' => true,
                    'basePath' => '@umbalaconmeogia/simpledatasystem/messages',
                    'fileMap' => [
                        'simpledatasystem' => 'simpledatasystem.php',
                    ],
                ],
            ],
        ],
    ],
    'modules' => [
        'systemuser' => [
            'class' => 'umbalaconmeogia\systemuser\Module',
        ],
        'simpledatasystem' => [
            'class' => 'umbalaconmeogia\simpledatasystem\Module',
        ],
    ],
];
