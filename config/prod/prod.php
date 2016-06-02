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
        'assetManager' => [
            'linkAssets' => false,
            'appendTimestamp' => true,
        ],
        'db' => require(__DIR__ . '/db.php'),
        'mailer' => require(__DIR__ . '/mail.php'),
    ],
    'params' => $params,
];

return $config;
