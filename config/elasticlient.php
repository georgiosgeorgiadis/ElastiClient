<?php
/**
 * Created by PhpStorm.
 * User: georgios
 * Date: 10/4/2016
 * Time: 9:00 AM
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Hashids Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'main' => [
            'host' => 'foo.com',
            'port' => '9200',
            'scheme' => 'https',
            'user' => 'username',
            'password' => 'password!#$?*abc'
        ],

        'alternative' => [
            '192.168.1.1:9200',         // IP + Port
            '192.168.1.2',              // Just IP
            'mydomain.server.com:9201', // Domain + Port
            'mydomain2.server.com',     // Just Domain
            'https://localhost',        // SSL to localhost
            'https://192.168.1.3:9200'  // SSL to IP + Port
        ],

    ],

];
