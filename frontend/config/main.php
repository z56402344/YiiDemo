<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute'=>'post/index',
    'language'=>'zh-CN',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            //开启URL美化,可以去掉 index.php?r=
            'enablePrettyUrl' => true,
            //如果开启叫本命,会显示  index.php
            'showScriptName' => false,
            //实现伪静态
            'suffix'=>'.html',
            'rules' => [
                //文章详细页面的美化规则
                '<controller:\w=>/<id:\d+>'=>'<controller>/detail',
                //文章列表页面的美化规则
                'posts'=>'post/index',
        ],
        ],
        */
    ],
    'params' => $params,
];
