<?php
$params = require(__DIR__ . '/params.php');
$dbParams = require(__DIR__ . '/test_db.php');

/**
 * Application configuration shared by all test types
 */
return [
    'id'         => 'basic-tests',
    'aliases'    => [
        '@bower' => '@vendor/yidas/yii2-bower-asset/bower',
    ],
    'basePath'   => dirname(__DIR__),
    'language'   => 'en-US',
    'components' => [
        'db'         => [
            'class'   => 'yii\db\Connection',
            'dsn'     => 'sqlite:@app/database_test.sqlite3',
            'charset' => 'utf8',
        ],
        'mailer'     => [
            'useFileTransport' => true,
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
        'user'       => [
            'identityClass' => 'app\models\User',
        ],
        'request'    => [
            'cookieValidationKey'  => 'test',
            'enableCsrfValidation' => false,
            // but if you absolutely need it set cookie domain to localhost
            /*
            'csrfCookie' => [
                'domain' => 'localhost',
            ],
            */
        ],
    ],
    'params'     => $params,
];
