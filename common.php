<?php

declare(strict_types=1);

if (!defined('PHAST_CONFIG_FILE')) {
    /*
     * CAUTION: Nasty work-around.
     *
     * The plugin ServiceProvider loads/merges the Phast config file for use in the
     * plugin itself. Later on Phast loads the config file using `require_once`,
     * which is perfectly fine, but it will return `TRUE` which will break the application.
     *
     * Therefore we make a copy of the configuration for the Phast library to use.
     */

    // The custom Phast configuration (if developer wants to override values).
    $custom = __DIR__ . '/../../../config/phast.php';

    // The actual config file which contains the configuration.
    $config = file_exists($custom) ? $custom : __DIR__ . '/config.php';

    // The config file for the Phast library to use.
    $cache = __DIR__ . '/config.cache.php';

    if (!file_exists($cache) || time() - filemtime($cache) > 60) {
        copy($config, $cache);
    }

    define('PHAST_CONFIG_FILE', $cache);
}
