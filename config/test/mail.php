<?php

return [
    'class' => 'yii\swiftmailer\Mailer',
    'viewPath' => '@app/views/mail',
    'useFileTransport' => true,
    /*'transport' => [
        'class'      => 'Swift_SmtpTransport',
        'host'       =>  'HOST',
        'username'   => 'USER_NAME',
        'password'   => 'PASSWORD',
        'port'       => 'PORT',
        'encryption' => 'tls', // tls or ssl
        'authMode'   => 'login', // plain, login, cram-md5 or null
        // if user PHP5.6 and later and have error with SSL
        'streamOptions' => [
            'ssl' => [
                'verify_peer_name' => false,
                'verify_peer'      => false
            ]
        ]
    ],*/
];
