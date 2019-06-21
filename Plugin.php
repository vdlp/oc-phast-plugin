<?php

/** @noinspection PhpIncludeInspection */
/** @noinspection PhpMissingParentCallCommonInspection */

declare(strict_types=1);

namespace Vdlp\Phast;

use App;
use System\Classes\PluginBase;

/**
 * Class Plugin
 *
 * @package Vdlp\Phast
 */
final class Plugin extends PluginBase
{
    /**
     * {@inheritdoc}
     */
    public function pluginDetails(): array
    {
        return [
            'name' => 'Phast',
            'description' => 'Boost your OctoberCMS powered website load speed and rank better in search engines!',
            'author' => 'Van der Let & Partners',
            'icon' => 'icon-link',
            'homepage' => 'https://octobercms.com/plugin/vdlp-phast',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        if (!App::runningInConsole()
            && !App::runningUnitTests()
            && !App::runningInBackend()
        ) {
            $pluginLevel = __DIR__ . '/vendor/kiboit/phast/src/html-filters.php';
            $projectLevel = __DIR__ . '/../../../vendor/kiboit/phast/src/html-filters.php';

            if (file_exists($pluginLevel)) {
                require $pluginLevel;
            } elseif (file_exists($projectLevel)) {
                require $projectLevel;
            }
        }
    }
}
