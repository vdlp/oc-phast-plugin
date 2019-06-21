<?php

/** @noinspection PhpIncludeInspection */

declare(strict_types=1);

if (!defined('PHAST_CONFIG_FILE')) {
    define('PHAST_CONFIG_FILE', __DIR__ . '/config/config.php');
}

$pluginLevel = __DIR__ . '/vendor/kiboit/phast/src/services.php';
$projectLevel = __DIR__ . '/../../../vendor/kiboit/phast/src/services.php';

if (file_exists($pluginLevel)) {
    require $pluginLevel;
} elseif (file_exists($projectLevel)) {
    require $projectLevel;
}
