<?php

use common\components\LanguageDropdown;
use codemix\localeurls\UrlManager;
use yii\i18n\Formatter;
use yii\i18n\PhpMessageSource;

return [
    'language' => 'de-DE',
    'name' => 'CYGRESS',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(__DIR__, 2) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => PhpMessageSource::class,
                    'basePath' => '@common/messages',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php'
                    ],
                ],
            ],
        ],
        'urlManager' => [
            'class' => UrlManager::class,

            // List all supported languages here
            // Make sure, you include your app's default language.
            'languages' => ['en', 'ms'],
        ],
        'LanguageDropdown' => [
            'class' => LanguageDropdown::class
        ],
        'formatter' => [
            'class' => Formatter::class,
            'nullDisplay' => '<span class="label label-danger">NOT SET</span>',
            'decimalSeparator' => '.',
            'thousandSeparator' => ',',
            'currencyCode' => 'RM',
            'timeZone' => 'Asia/Kuala_Lumpur',
            'dateFormat' => 'php:l, d F Y',

        ],
    ],
];
