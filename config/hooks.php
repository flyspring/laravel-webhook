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
            'branch' => 'dev',
            'path' => '/home/www/guiheDoctor/',
        ],
        
        'guihePatient' => [
            'branch' => 'dev',
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
            'password' => ''
        ],

        'github' => [
            'password' => '',
        ],
    ],

];
