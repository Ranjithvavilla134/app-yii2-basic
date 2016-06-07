<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests/codeception');

if (getenv('HTTP_WS') === 'lab')
{
    $debug = true;
    $environment = 'dev';
    $db_conf = '/lab/db.php';
    $mail_conf = '/lab/mail.php';
    $baseUrl = 'SET_BASE_URL';
}
elseif (getenv('APP_ENV') === 'test')
{
    $debug = false;
    $environment = 'test';
    $db_conf = '/test/db.php';
    $mail_conf = '/test/mail.php';
    $baseUrl = 'SET_BASE_URL';
}
else
{
    $debug = false;
    $environment = 'prod';
    $db_conf = '/prod/db.php';
    $mail_conf = '/prod/mail.php';
    $baseUrl = 'SET_BASE_URL';
}

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . $db_conf),
        'mailer' => require(__DIR__ . $mail_conf),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'baseUrl'         => '',
            'hostInfo'        => $baseUrl,
            'rules'           => [],
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'sourceLanguage' => 'en-US',
                    //'enableCaching' => true,
                    //'cachingDuration' => 60,
                    'on missingTranslation' => ['app\components\TranslationEventHandler', 'handleMissingTranslation']
                ],
            ],
        ],
    ],
    'params' => $params,
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
];

return $config;
