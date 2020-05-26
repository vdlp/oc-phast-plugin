<?php

/** @noinspection PhpMissingParentCallCommonInspection */
/** @noinspection PhpIncludeInspection */

declare(strict_types=1);

namespace Vdlp\Phast;

use App;
use System\Classes\PluginBase;
use Vdlp\Phast\Console;
use Vdlp\Phast\ReportWidgets;

final class Plugin extends PluginBase
{
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

    public function boot(): void
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

    public function register(): void
    {
        $this->app->register(ServiceProvider::class);

        $this->registerConsoleCommand(Console\ClearCache::class, Console\ClearCache::class);
    }

    public function registerPermissions(): array
    {
        return [
            'vdlp.phast.clear_cache' => [
                'label' => 'Allowed to clear Phast Cache.',
                'tab' => 'Phast',
            ],
        ];
    }

    public function registerReportWidgets(): array
    {
        return [
            ReportWidgets\ClearCache::class => [
                'label' => 'Clear Phast Cache',
                'context' => 'dashboard',
                'permissions' => [
                    'vdlp.phast.clear_cache'
                ],
            ],
        ];
    }
}
