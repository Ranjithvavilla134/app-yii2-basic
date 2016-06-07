<?php

return [
    'modules' => [
        'rbac' => [
            'class' => 'app\modules\rbac\Module',
            //Some controller property maybe need to change.
            'controllerMap' => [
                'assignment' => [
                    'class'         => 'app\modules\rbac\controllers\AssignmentController',
                    'userClassName' => 'app\modules\admin\models\AdminAuth',
                ]
            ]
        ],
        'setting' => [
            'class' => 'app\modules\setting\Module',
        ],
    ],
];