<?php

declare(strict_types=1);

namespace Vdlp\Phast\Console;

use Illuminate\Console\Command;
use InvalidArgumentException;
use Vdlp\Phast\Cache;

final class ClearCache extends Command
{
    public function __construct()
    {
        $this->name = 'vdlp:phast:clear-cache';
        $this->description = 'Clears all caches genrated by the Phast plugin.';

        parent::__construct();
    }

    /**
     * @throws InvalidArgumentException
     */
    public function handle(Cache $cache): void
    {
        $size = $cache->size();

        if ($size !== '0B') {
            $this->output->text(sprintf('Found %s cache data.', $size));
            $cache->clear();
        }

        $this->output->text('Cache cleared.');
    }
}
