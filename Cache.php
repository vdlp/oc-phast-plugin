<?php

declare(strict_types=1);

namespace Vdlp\Phast;

use Illuminate\Filesystem\Filesystem;
use InvalidArgumentException;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

final class Cache
{
    private const BYTE_UNITS = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
    private const BYTE_PRECISION = [0, 0, 1, 2, 2, 3, 3, 4, 4];
    private const BYTE_NEXT = 1024;

    /**
     * @var string
     */
    private $path;

    public function __construct()
    {
        $this->path = config('phast.cache.cacheRoot');
    }

    public function clear(): void
    {
        $fs = new Filesystem();
        $fs->cleanDirectory($this->path);
    }

    /**
     * @throws InvalidArgumentException
     */
    public function size(): string
    {
        $iterator = Finder::create()
            ->files()
            ->ignoreDotFiles(true)
            ->in($this->path);

        $totalSize = 0;

        /** @var SplFileInfo $file */
        foreach ($iterator as $file) {
            $totalSize += $file->getSize();
        }

        return self::humanReadableBytes($totalSize, 2);
    }

    private static function humanReadableBytes($bytes, ?int $precision = null): string
    {
        for ($i = 0; ($bytes / self::BYTE_NEXT) >= 0.9 && $i < count(self::BYTE_UNITS); $i++) {
            $bytes /= self::BYTE_NEXT;
        }

        return round($bytes, is_null($precision) ? self::BYTE_PRECISION[$i] : $precision) . self::BYTE_UNITS[$i];
    }
}
