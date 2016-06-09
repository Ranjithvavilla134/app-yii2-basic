<?php

$params = \yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../params.php'),
    require(__DIR__ . '/params.php')
);

$config = [
    'components' => [
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                /*[
                    'class' => 'yii\log\EmailTarget',
                    'levels' => ['error'],
                    'categories' => ['SET_CATEGORY'],
                    'message' => [
                        'from' => $params['noreplyEmail'],
                        'to' => $params['bugReport'],
                        'subject' => 'SET_SUBJECT',
                    ],
                ],*/
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'mailer' => require(__DIR__ . '/mail.php'),
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class'                 => 'yii\i18n\DbMessageSource',
                    'sourceLanguage'        => 'en-US',
                    'enableCaching'         => true,
                    'cachingDuration'       => 60,
                    'on missingTranslation' => ['mistim\components\TranslationEventHandler', 'handleMissingTranslation']
                ],
                'admin*' => [
                    'class'                 => 'yii\i18n\DbMessageSource',
                    'sourceLanguage'        => 'en-US',
                    'enableCaching'         => true,
                    'cachingDuration'       => 60,
                    'on missingTranslation' => ['mistim\components\TranslationEventHandler', 'handleMissingTranslation']
                ]
            ],
        ],
    ],
    'params' => $params,
];

return $config;
