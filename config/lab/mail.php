<?php

return [
    'class' => 'yii\swiftmailer\Mailer',
    'viewPath' => '@app/views/mail',
    //'useFileTransport' => true,
    'transport' => [
        'class'      => 'Swift_SmtpTransport',
        'host'       => 'smtp.gmail.com',
        'username'   => 'workbytest@gmail.com',
        'password'   => '231401A7#',
        'port'       => '465',
        'encryption' => 'ssl', // tls or ssl
        //'authMode' => 'LOGIN' // plain, login, cram-md5 or null
    ],
];
