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
                'file' => [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                /*'db' => [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                ],*/
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

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['192.168.33.1', '192.168.1.*']
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['192.168.33.1']
    ];
}

return $config;
