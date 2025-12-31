<?php

return [
    'app'=>[
        'name' => 'My blog',
        'debug' => true
    ],
    'database' =>[
        'driver' => 'sqlite',
        'path' => __DIR__ . '/database/blog.sqlite'
    ]
];