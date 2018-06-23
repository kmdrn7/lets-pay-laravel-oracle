<?php

return [
    'oracle' => [
        'driver'         => 'oracle',
        'host'           => 'CanYouHackThis',
        'service_name'   => 'XE',
        'port'           => '1521',
        'database'       => '',
        'username'       => 'hr',
        'password'       => 'hr',
        'charset'        => '',
        'prefix'         => '',
        'prefix_schema'  => env('DB_SCHEMA_PREFIX', ''),
        'server_version' => env('DB_SERVER_VERSION', '11g'),
    ],
];
