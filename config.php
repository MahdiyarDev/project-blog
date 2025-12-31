<?php

return [
    'app'=>[
        'name' => 'My blog',
        'debug' => true
    ],
    'database' =>[
        'driver' => 'sqlite',
        'dbname' => __DIR__ . '/database/blog.sqlite'
    ]
];