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
        'project1' => [
            'branch' => 'dev',
            'path' => '/var/www/project1/',
        ],
        
        'project2' => [
            'branch' => 'master',
            'path' => '/var/www/project2/',
        ],
        
        'project3' => [
            'branch' => 'master',
            'path' => '/var/www/project3/',
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
            'secret' => 'githook' //开源中国的项目秘钥
        ],

        'github' => [
            'secret' => '',
        ],
    ],

];
