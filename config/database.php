<?php

return [
    'default' => [
        'driver' => 'pdo_mysql',
        'host' => 'recipe-game.dev',
        'dbname' => 'recipe-game',
        'user' => 'recipe-game',
        'password' => 'recipe-game',
        'charset' => 'utf8',
    ],
    'test' => [
        'driver' => 'pdo_sqlite',
        'path' => __DIR__ . '/../var/db/app.db',
    ],
];
