<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
//是否开启YII调试模式
defined('YII_ENV') or define('YII_ENV', 'dev');
//当前环境（dev:开发环境，prod:生产环境)
require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');
//加载配置文件

(new yii\web\Application($config))->run();
//创建并启动应用