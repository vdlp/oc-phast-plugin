<?php

declare(strict_types=1);

namespace Vdlp\Phast\ServiceProviders;

use October\Rain\Support\ServiceProvider;

/**
 * Class PhastServiceProvider
 *
 * @package Vdlp\Phast\ServiceProviders
 */
final class PhastServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config.php' => config_path('phast.php'),
        ], 'config');
    }
}
