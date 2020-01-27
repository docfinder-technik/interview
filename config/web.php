<?php

$params = require(__DIR__ . "/params.php");

$config = [
    "id" => "basic",
    "basePath" => dirname(__DIR__),
    "bootstrap" => ["log"],
    'aliases' => [
        '@bower' => '@vendor/yidas/yii2-bower-asset/bower'
    ],
    "modules" => [
        "admin" => [
            "class" => "app\modules\admin\Module",
        ],
    ],
    "components" => [
        "request" => [
            "cookieValidationKey" => "5oHb3q3eSzF_bq7j9jPQjGBGN2kCV9PX",
        ],
        "cache" => [
            "class" => "yii\caching\FileCache",
        ],
        "user" => [
            "identityClass" => "app\models\User",
            "enableAutoLogin" => true,
        ],
        "errorHandler" => [
            "errorAction" => "site/error",
        ],
        "mailer" => [
            "class" => "yii\swiftmailer\Mailer",
            "useFileTransport" => true,
        ],
        "log" => [
            "traceLevel" => YII_DEBUG ? 3 : 0,
            "targets" => [
                [
                    "class" => "yii\log\FileTarget",
                    "levels" => ["error", "warning"],
                ],
            ],
        ],
        "db" => require(__DIR__ . "/db.php"),
        "urlManager" => [
            "enablePrettyUrl" => true,
            "showScriptName" => false,
            "rules" => [
                'post/<id:\d+>' => 'post/show',
                'admin/post' => 'admin/post/index',
                'admin/post/<id:\d+>' => 'admin/post/show',
                'admin/post/delete/<id:\d+>' => 'admin/post/delete',
            ],
        ],
    ],
    "params" => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for "dev" environment
    $config["bootstrap"][] = "debug";
    $config["modules"]["debug"] = [
        "class" => "yii\debug\Module",
    ];

    $config["bootstrap"][] = "gii";
    $config["modules"]["gii"] = [
        "class" => "yii\gii\Module",
    ];
}

return $config;
