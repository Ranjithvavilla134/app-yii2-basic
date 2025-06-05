<?php

// Force Yii2 into debug/dev mode for testing purposes
$debug = true;
$environment = 'dev';
$config_file = '/../config/test/test.php';  // Make sure this file exists

defined('YII_WEB_APP') or define('YII_WEB_APP', true);
defined('YII_DEBUG') or define('YII_DEBUG', $debug);
defined('YII_ENV') or define('YII_ENV', $environment);

// Autoload and Yii core
require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

// Merge main config with environment-specific config
$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../config/main.php'),
    require(__DIR__ . $config_file)
);

// Run Yii2 app
(new yii\web\Application($config))->run();
