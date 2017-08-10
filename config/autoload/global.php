<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

function var_dump_pre($mixed)
{
    echo '<pre>';
    var_dump($mixed);
    echo '</pre>';
}

return [
    'db' => [
        'adapters' => [
            'installl' => [
                'driver'         => 'Pdo',
                'dsn'            => 'mysql:dbname=installl;host=localhost',
                'driver_options' => [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
                ],
            ],
        ],
    ],
];
