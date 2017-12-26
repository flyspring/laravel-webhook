<?php

return [

    /*
    |--------------------------------------------------------------------------
    | projects path config
    |--------------------------------------------------------------------------
    |
    | Here you may config projects name and path 
    |
    */

    'projects' => [
        'guiheAdmin' => [
            'branch' => 'dev',
            'path' => '/home/www/guiheAdmin/',
        ],
        
        'guiheDoctor' => [
            'branch' => 'master',
            'path' => '/home/www/guiheDoctor/',
        ],
        
        'guihePatient' => [
            'branch' => 'master',
            'path' => '/home/www/guihePatient/',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | hooks config
    |--------------------------------------------------------------------------
    |
    | Here you may config hooks and password
    |
    */
    
    'default' => 'gitos',

    'hooks' => [
        'gitos' => [
            'secret' => 'githook135',
            'usermail' => env('GIT_USER_MAIL', ''),
            'password' => env('GIT_PASSWORD', '')
        ],

        'github' => [
            'secret' => '',
            'usermail' => '',
            'password' => ''
        ],
    ],

];
