<?php

/** @noinspection PhpIncludeInspection */

declare(strict_types=1);

require_once __DIR__ . '/common.php';

$pluginLevel = __DIR__ . '/vendor/kiboit/phast/src/services.php';
$projectLevel = __DIR__ . '/../../../vendor/kiboit/phast/src/services.php';

if (file_exists($pluginLevel)) {
    require $pluginLevel;
} elseif (file_exists($projectLevel)) {
    require $projectLevel;
}
