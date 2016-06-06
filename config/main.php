<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'language' => 'en',
    'sourceLanguage' => 'en_GB',
    //'timeZone' => 'Europe/Kiev',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'app\modules\admin\Bootstrap',
    ],
    'modules' => [
        'admin' => [
            'class'          => 'app\modules\admin\Module',
            'panelName'      => 'Admin Panel',
            'panelShortName' => 'AP',
            //'adminPath'      => 'admin-q7y'
        ],
        // if user kartik/export-menu
        /*'gridview' => [
            'class' => '\kartik\grid\Module',
        ],*/
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'v7nyFN50T55lU3ay9lfigi33qt0_kuIE',
            'baseUrl'             => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass'   => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'assetManager' => [
            'linkAssets'      => false,
            'appendTimestamp' => true,
            //'bundles' => require(__DIR__ . '/assets/assets-dev.php'),
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules'           => [
            ],
        ],
        'authManager' => [
            'class'           => 'yii\rbac\DbManager',
            'defaultRoles'    => ['Guest', 'user'],
            'cache'           => 'yii\caching\FileCache',
            'itemTable'       => 'auth_item',
            'itemChildTable'  => 'auth_item_child',
            'assignmentTable' => 'auth_assignment',
            'ruleTable'       => 'auth_rule',
        ],
        'formatter' => [
            'dateFormat'             => 'dd.MM.yyyy',
            'datetimeFormat'         => 'dd.MM.yyyy HH:mm',
            'timeFormat'             => 'HH:mm:ss',
            'timeZone'               => 'UTC',
            'locale'                 => 'en',
            'decimalSeparator'       => '.',
            'thousandSeparator'      => ' ',
            'numberFormatterOptions' => [
                NumberFormatter::MIN_FRACTION_DIGITS => 0,
                NumberFormatter::MAX_FRACTION_DIGITS => 0,
            ],
            // if not show "(not set)"
            'nullDisplay' => '',
        ],
    ],
    'params' => $params,
];

return $config;
