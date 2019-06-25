<?php

declare(strict_types=1);

use \Kibo\Phast;

/*
 * Phast configuration.
 *
 * See: `vendor/kiboit/phast/src/Environment/config-default.php`
 */

return [
    'servicesUrl' => '/plugins/vdlp/phast/phast.php',
    'outputServerSideStats' => false,
    'cache' => [
        'cacheRoot' => storage_path('temp/phast')
    ],
    'logging' => [
        'logWriters' => [
            [
                'class' => Phast\Logging\LogWriters\PHPError\Writer::class,
                'levelMask' =>
                    Phast\Logging\LogLevel::EMERGENCY
                    | Phast\Logging\LogLevel::ALERT
                    | Phast\Logging\LogLevel::CRITICAL
                    | Phast\Logging\LogLevel::ERROR
                    | Phast\Logging\LogLevel::WARNING
                // | Phast\Logging\LogLevel::INFO
                // | Phast\Logging\LogLevel::DEBUG
            ],
            [
                'enabled' => false,
                'class' => Phast\Logging\LogWriters\JSONLFile\Writer::class,
                'logRoot' => storage_path('logs/phast')
            ]
        ]
    ],
];
