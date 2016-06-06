<?php

// comment out the following two lines when deployed to production
if (getenv('HTTP_WS') === 'lab')
{
    $debug = true;
    $environment = 'dev';
    $config_file = '/../config/lab/lab.php';
}
elseif (getenv('APP_ENV') === 'test')
{
    $debug = true;
    $environment = 'test';
    $config_file = '/../config/test/test.php';
}
else
{
    $debug = false;
    $environment = 'prod';
    $config_file = '/../config/prod/prod.php';
}

defined('YII_DEBUG') or define('YII_DEBUG', $debug);
defined('YII_ENV') or define('YII_ENV', $environment);

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../config/main.php'),
    require(__DIR__ . $config_file)
);

(new yii\web\Application($config))->run();
