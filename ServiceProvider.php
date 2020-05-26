<?php

declare(strict_types=1);

namespace Vdlp\Phast;

use October\Rain\Support\ServiceProvider as BaseServiceProvider;

final class ServiceProvider extends BaseServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/config.php' => config_path('phast.php'),
        ], 'config');

        $this->mergeConfigFrom(__DIR__ . '/config.php', 'phast');
    }
}
