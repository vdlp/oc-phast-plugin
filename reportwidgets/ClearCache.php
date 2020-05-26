<?php

declare(strict_types=1);

namespace Vdlp\Phast\ReportWidgets;

use Backend\Classes\ReportWidgetBase;
use InvalidArgumentException;
use SystemException;
use Vdlp\Phast\Cache;

final class ClearCache extends ReportWidgetBase
{
    /**
     * @return bool|mixed|string
     * @throws SystemException|InvalidArgumentException
     */
    public function render()
    {
        /** @var Cache $cache */
        $cache = resolve(Cache::class);

        $this->vars['cacheSize'] = $cache->size();

        return $this->makePartial('widget');
    }

    /**
     * @throws SystemException|InvalidArgumentException
     */
    public function onClearCache(): array
    {
        /** @var Cache $cache */
        $cache = resolve(Cache::class);
        $cache->clear();

        return [
            '#' . $this->getId() . '-cacheSize' => $this->makePartial('cache', [
                'cacheSize' => $cache->size(),
            ]),
        ];
    }
}
